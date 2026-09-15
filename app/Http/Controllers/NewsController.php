<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    ## Show Data
    public function index()
    {
        $title = "Berita";
        return view('admin.news.index', compact('title'));
    }

    ## Get Data
    public function get_news_index(Request $request)
    {

        if ($request->ajax()) {
            $counter = 1;

            $news = News::limit(10);

            return DataTables::of($news)
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
                    $btn = '<a href="#" onClick="getData(' . $v->id . ')" id="' . $v->id . '" data-toggle="tooltip" data-placement="top" title="Edit" data-bs-toggle="modal" data-bs-target="#kt_modal_add_news">
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
            $news = new News();
            $news->fill($request->all());
            $news->slug = Str::slug($request->title);
            $news->user_id = Auth::user()->id;

            if ($request->hasFile('cover')) {
                $file = $request->file('cover');
                $fileName = time() . '.webp'; // paksa jadi webp

                // Tentukan ukuran
                $width = 1600;
                $height = 1068;

                // Baca file langsung dari upload (tanpa pindah ke temp folder)
                $manager = new ImageManager(new Driver());
                // $cover = $manager->read($file->getRealPath())
                //     ->resize($width, $height, function ($constraint) {
                //         $constraint->aspectRatio();
                //         $constraint->upsize();
                //     });

                $cover = $manager->read($file->getRealPath());

                // Simpan tanpa kompresi
                $encoded = $cover->toWebp(75);

                // Simpan ke storage
                Storage::put('upload/news/' . $fileName, (string) $encoded);

                // Simpan nama file ke database
                $news->cover = $fileName;
            }

            $news->save();

            activity()->log('Create Data News');
            return response()->json(['success' => true, 'message' => 'Tambah Data Berhasil']);
        }
    }

    ## Get Data
    public function edit(Request $request, News $news)
    {
        if ($request->ajax()) {
            return response()->json(['success' => true, 'data' => $news]);
        }
    }

    ## Edit Data
    public function update(Request $request, News $news)
    {
        if ($request->ajax()) {
            $news->title = $request->title;
            $news->text = $request->text;
            $news->slug = Str::slug($request->title);

            if ($request->hasFile('cover')) {

                // simpan nama file lama
                $oldImage = $news->cover;

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
                Storage::put('upload/news/' . $fileName, (string) $encoded);

                // pastikan file benar-benar ada
                if (Storage::exists('upload/news/' . $fileName)) {

                    $news->cover = $fileName;

                    // baru hapus file lama
                    if ($oldImage) {
                        Storage::delete('upload/news/' . $oldImage);
                    }
                }
            }

            $news->save();

            activity()->log('Edit Data News With ID = ' . $news->id);
            return response()->json(['success' => true, 'message' => 'Ubah Data Berhasil']);
        }
    }

    ## Delete Data
    public function delete(Request $request, News $news)
    {
        if ($request->ajax()) {
            $cover = $news->cover;
            $news->delete();

            if ($cover) {
                Storage::delete('upload/news/' . $cover);
            }

            activity()->log('Delete Data News With ID = ' . $news->id);
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
            Storage::disk('public')->put('upload/news_image/' . $fileName, $encoded);

            $url = asset('storage/upload/news_image/' . $fileName);

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
