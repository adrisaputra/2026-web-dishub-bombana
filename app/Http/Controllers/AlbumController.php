<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Yajra\DataTables\Facades\DataTables;
use Intervention\Image\ImageManager;

class AlbumController extends Controller
{
    
    ## Show Data
    public function index()
    {
        $title = "Album";
		return view('admin.album.index',compact('title'));
    }

    ## Get Data
    public function get_album_index(Request $request)
    {

        if ($request->ajax()) {
            $counter = 1;

            $album = Album::limit(10);

            return DataTables::of($album)
            ->addIndexColumn()
            ->addColumn('number', function () use (&$counter) {
                return $counter++;
            })
            ->addColumn('cover', function ($v){
                $url_cover = asset('storage/upload/album/'.$v->cover);
                $cover = '<img src='.$url_cover.' width="150px" height="100%">';
                return $cover;
            })
            ->addColumn('action', function ($v) {
                $photo = url('photo', Crypt::encrypt($v->id));

                $btn = '<a href="'.$photo.'" data-toggle="tooltip" data-placement="top" title="Photo">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image text-info"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                        </a>';
                $btn .= '<a href="#" onClick="getData('.$v->id.')" id="'.$v->id.'" data-toggle="tooltip" data-placement="top" title="Edit" data-bs-toggle="modal" data-bs-target="#kt_modal_add_album">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                        </a>';
                $btn .= '<a href="#" onclick="deleteData('.$v->id.')" id="'.$v->id.'" class="warning confirm" data-toggle="tooltip" data-placement="top" title="Hapus">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        </a>';
                return $btn;
            })
            ->rawColumns(['cover','action'])->make(true);
        }
        
    }

    public function validate(Request $request, $action)
    {
        if ($request->ajax()) {
            
            $attributes = [
                'title' => 'Nama Kegiatan',
                'cover' => 'Cover',
            ];

            if($action==="Simpan"){
                $rules = [
                    'title' => 'required',
                    'cover' => 'required|image'
                ];
            } else {
                $rules = [
                    'title' => 'required',
                    'cover' => 'image'
                ];
            }

            $request->validate($rules, [],$attributes);
    
            return response()->json(['success' => true]);
        }
    }

    ## Save Data
	public function store(Request $request)
    {
        if ($request->ajax()) {
            $album = New Album();
            $album->fill($request->all());
            
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

                // Simpan tanpa kompresi
                $encoded = $cover->toWebp(75);

                // Simpan ke storage
                Storage::put('upload/album/' . $fileName, (string) $encoded);

                // Simpan nama file ke database
                $album->cover = $fileName;
            }


            $album->save();
            
            activity()->log('Create Data Album');
            return response()->json(['success' => true,'message' => 'Tambah Data Berhasil']);
        }
    }

    ## Get Data
    public function edit(Request $request,$id)
    {
        if ($request->ajax()) {
            $album = Album::where('id',$id)->first();
            return response()->json(['success' => true,'data' => $album]);
        }
    }

    ## Edit Data
    public function update(Request $request, Album $album)
    {
        if ($request->ajax()) {
            $album->title = $request->title;
            $album->text = $request->text;

            if ($request->hasFile('cover')) {

                // simpan nama file lama
                $oldImage = $album->cover;

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
                Storage::put('upload/album/' . $fileName, (string) $encoded);

                // pastikan file benar-benar ada
                if (Storage::exists('upload/album/' . $fileName)) {

                    $album->cover = $fileName;

                    // baru hapus file lama
                    if ($oldImage) {
                        Storage::delete('upload/album/' . $oldImage);
                    }
                }
            }

		
            $album->save();
    
            activity()->log('Edit Data Album With ID = '.$album->id);
            return response()->json(['success' => true,'message' => 'Ubah Data Berhasil']);
        }
    }

    ## Delete Data
    public function delete(Request $request, Album $album)
    {
        if ($request->ajax()) {
            $cover = $album->cover;
            $photo = Photo::where('album_id',$album->id)->get();

            foreach($photo as $v){
                Storage::delete('upload/photo/'.$v->image);
            }

            $album->delete();
            
            if ($cover) {
                Storage::delete('upload/album/' . $cover);
            }

            activity()->log('Delete Data Album With ID = '.$album->id);
            return response()->json(['success' => true,'message' => 'Hapus Data Berhasil']);
        }
    }

}
