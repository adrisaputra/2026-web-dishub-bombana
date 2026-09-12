<?php

namespace App\Http\Controllers;

use App\Models\Popup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Yajra\DataTables\DataTables;

class PopupController extends Controller
{
    ## Show Data
    public function index()
    {
        $title = "Pop Up";
        return view('admin.popup.index', compact('title'));
    }

    ## Get Data
    public function get_popup_index(Request $request)
    {

        if ($request->ajax()) {
            $counter = 1;

            $popup = Popup::limit(10);

            return DataTables::of($popup)
                ->addIndexColumn()
                ->addColumn('number', function () use (&$counter) {
                    return $counter++;
                })
                ->addColumn('display_image', function ($v) {
                    $url_image = asset('storage/upload/popup/' . $v->image);
                    $image = '<a href=' . $url_image . ' target="_blank">' . $v->image . '</a>';
                    return $image;
                })
                ->addColumn('action', function ($v) {
                    $btn = '<a href="#" onClick="getData(' . $v->id . ')" id="' . $v->id . '" data-toggle="tooltip" data-placement="top" title="Edit" data-bs-toggle="modal" data-bs-target="#kt_modal_add_popup">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                        </a>';
                    $btn .= '<a href="#" onclick="deleteData(' . $v->id . ')" id="' . $v->id . '" class="warning confirm" data-toggle="tooltip" data-placement="top" title="Hapus">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        </a>';
                    return $btn;
                })
                ->rawColumns(['display_image', 'action'])->make(true);
        }
    }

    public function validate(Request $request, $action)
    {

        if ($request->ajax()) {

            $attributes = [
                'title'  => 'Judul Pop Up',
                'image'  => 'Gambar'
            ];

            if ($action === "Simpan") {
                $rules = [
                    'title' => 'required|max:255',
                    'image' => 'required|image'
                ];
            } else {
                $rules = [
                    'title' => 'required|max:255',
                    'image' => 'image'
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
            $popup = new Popup();
            $popup->fill($request->all());

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '.webp'; // paksa jadi webp

                $manager = new ImageManager(new Driver());

                $image = $manager->read($file->getRealPath());

                // Konversi ke WebP tanpa mengubah ukuran
                $encoded = $image->toWebp(75);

                Storage::put('upload/popup/' . $fileName, (string) $encoded);

                $popup->image = $fileName;
            }

            $popup->save();

            activity()->log('Create Data Popup');
            return response()->json(['success' => true, 'message' => 'Tambah Data Berhasil']);
        }
    }

    ## Get Data
    public function edit(Request $request, $id)
    {
        if ($request->ajax()) {
            $popup = Popup::where('id', $id)->first();
            return response()->json(['success' => true, 'data' => $popup]);
        }
    }

    ## Edit Data
    public function update(Request $request, Popup $popup)
    {
        if ($request->ajax()) {

            $popup->title = $request->title;

            if ($request->hasFile('image')) {

                // simpan nama file lama
                $oldImage = $popup->image;

                $file = $request->file('image');
                $fileName = time() . '.webp'; // paksa jadi webp

                $manager = new ImageManager(new Driver());

                $image = $manager->read($file->getRealPath());

                // Konversi ke WebP tanpa mengubah ukuran
                $encoded = $image->toWebp(75);

                // Simpan ke storage
                Storage::put('upload/popup/' . $fileName, (string) $encoded);

                // pastikan file benar-benar ada
                if (Storage::exists('upload/popup/' . $fileName)) {

                    $popup->image = $fileName;

                    // baru hapus file lama
                    if ($oldImage) {
                        Storage::delete('upload/popup/' . $oldImage);
                    }
                }
            }

            $popup->save();

            activity()->log('Edit Data Popup With ID = ' . $popup->id);
            return response()->json(['success' => true, 'message' => 'Ubah Data Berhasil']);
        }
    }

    ## Delete Data
    public function delete(Request $request, Popup $popup)
    {
        if ($request->ajax()) {
            $image = $popup->image;
            $popup->delete();

            if ($image) {
                Storage::delete('upload/popup/' . $image);
            }
            activity()->log('Delete Data Popup With ID = ' . $popup->id);
            return response()->json(['success' => true, 'message' => 'Hapus Data Berhasil']);
        }
    }
}
