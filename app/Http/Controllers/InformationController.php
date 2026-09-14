<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class InformationController extends Controller
{
    ## Show Data
    public function index()
    {
        $title = "Informasi";
        return view('admin.information.index', compact('title'));
    }

    ## Get Data
    public function get_information_index(Request $request)
    {

        if ($request->ajax()) {
            $counter = 1;

            $information = Information::limit(10);

            return DataTables::of($information)
                ->addIndexColumn()
                ->addColumn('number', function () use (&$counter) {
                    return $counter++;
                })
                ->addColumn('created_at', function ($v) {
                    return Helpers::month_indo_full($v->created_at);
                })
                ->addColumn('user', function ($v) {
                    return $v->user ? $v->user->name : '';
                })
                ->addColumn('action', function ($v) {
                    $btn = '<a href="#" onClick="getData(' . $v->id . ')" id="' . $v->id . '" data-toggle="tooltip" data-placement="top" title="Edit" data-bs-toggle="modal" data-bs-target="#kt_modal_add_information">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                        </a>';
                    $btn .= '<a href="#" onclick="deleteData(' . $v->id . ')" id="' . $v->id . '" class="warning confirm" data-toggle="tooltip" data-placement="top" title="Hapus">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        </a>';
                    return $btn;
                })
                ->rawColumns(['cover', 'action'])->make(true);
        }
    }

    public function validate(Request $request, $action)
    {
        if ($request->ajax()) {

            $attributes = [
                'title' => 'Judul',
                'text'  => 'Isi',
                'cover' => 'Cover',
            ];

            if ($action === "Simpan") {
                $rules = [
                    'title' => 'required',
                    'text' => 'required',
                    'cover' => 'required|image'
                ];
            } else {
                $rules = [
                    'title' => 'required',
                    'text' => 'required',
                    'cover' => 'image'
                ];
            }

            $request->validate($rules, [], $attributes);

            return response()->json(['success' => true]);
        }
    }

    ## Save Data
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $information = new Information();
            $information->fill($request->all());
            $information->category = $request->category;
            $information->slug = Str::slug($request->title);
            $information->user_id = Auth::user()->id;

            if ($request->hasFile('cover')) {
                $file = $request->file('cover');
                $fileName = time() . '.webp'; // paksa jadi webp

                // Tentukan ukuran
                $width = 1600;
                $height = 1068;

                // Baca file langsung dari upload (tanpa pindah ke temp folder)
                $manager = new ImageManager(new Driver());
                $cover = $manager->read($file->getRealPath())
                    ->resize($width, $height, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });

                // $cover = $manager->read($file->getRealPath());

                // Simpan tanpa kompresi
                $encoded = $cover->toWebp(75);

                // Simpan ke storage
                Storage::put('upload/information/' . $fileName, (string) $encoded);

                // Simpan nama file ke database
                $information->cover = $fileName;
            }

            $information->save();

            activity()->log('Create Data Information');
            return response()->json(['success' => true, 'message' => 'Tambah Data Berhasil']);
        }
    }

    ## Get Data
    public function edit(Request $request, $id)
    {
        if ($request->ajax()) {
            $information = Information::where('id', $id)->first();
            return response()->json(['success' => true, 'data' => $information]);
        }
    }

    ## Edit Data
    public function update(Request $request, Information $information)
    {
        if ($request->ajax()) {
            $information->title = $request->title;
            $information->text = $request->text;
            $information->slug = Str::slug($request->title);

            if ($request->hasFile('cover')) {

                // simpan nama file lama
                $oldImage = $information->cover;

                $file = $request->file('cover');
                $fileName = time() . '.webp'; // paksa jadi webp

                // Tentukan ukuran
                $width = 1600;
                $height = 1068;

                // Baca file langsung dari upload (tanpa pindah ke temp folder)
                $manager = new ImageManager(new Driver());
                $cover = $manager->read($file->getRealPath())
                    ->resize($width, $height, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });

                // Simpan tanpa kompresi
                $encoded = $cover->toWebp(75);

                // Simpan ke storage
                Storage::put('upload/information/' . $fileName, (string) $encoded);

                // pastikan file benar-benar ada
                if (Storage::exists('upload/information/' . $fileName)) {

                    $information->cover = $fileName;

                    // baru hapus file lama
                    if ($oldImage) {
                        Storage::delete('upload/information/' . $oldImage);
                    }
                }
            }

            $information->save();

            activity()->log('Edit Data Information With ID = ' . $information->id);
            return response()->json(['success' => true, 'message' => 'Ubah Data Berhasil']);
        }
    }

    ## Delete Data
    public function delete(Request $request, Information $information)
    {
        if ($request->ajax()) {
            $cover = $information->cover;
            $information->delete();

            if ($cover) {
                Storage::delete('upload/information/' . $cover);
            }

            activity()->log('Delete Data Information With ID = ' . $information->id);
            return response()->json(['success' => true, 'message' => 'Hapus Data Berhasil']);
        }
    }

    public function upload_image(Request $request)
    {
        $funcNum = $request->input('CKEditorFuncNum');

        if (!$request->hasFile('upload')) {
            return "<script>
            window.parent.CKEDITOR.tools.callFunction($funcNum, '', 'Tidak ada file');
        </script>";
        }

        try {

            $file = $request->file('upload');

            // Nama file
            $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $name . '_' . time() . '.webp';

            $manager = new ImageManager(new Driver());

            // 🔥 WAJIB pakai getPathname()
            $image = $manager->read($file->getPathname());

            // Resize optional
            // if ($image->width() > 1200) {
            //     $image->scale(width: 1200);
            // }

            // Encode ke webp
            $encoded = $image->toWebp(75);

            // 🔥 WAJIB pakai disk public
            Storage::disk('public')->put('upload/information_image/' . $fileName, $encoded);

            $url = asset('storage/upload/information_image/' . $fileName);

            return "<script>
            window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', 'Upload berhasil');
        </script>";
        } catch (\Exception $e) {

            return "<script>
            window.parent.CKEDITOR.tools.callFunction($funcNum, '', 'Error: {$e->getMessage()}');
        </script>";
        }
    }
}
