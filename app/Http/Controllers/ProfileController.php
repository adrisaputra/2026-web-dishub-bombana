<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProfileController extends Controller
{

    ## Show Data
    public function index(Request $request)
    {
        $profile = Profile::where('menu',  $request->segment(1))->first();
        $title =  $profile->title;
        return view('admin.profile.index', compact('title', 'profile'));
    }

    public function validation(Request $request)
    {
        if ($request->ajax()) {

            $attributes = [
                'text' => 'Teks',
                'image' => 'Gambar'
            ];

            $rules = [
                'text' => 'required',
                'image' => 'image',
            ];

            $request->validate($rules, [],$attributes);
    
            return response()->json(['success' => true]);
        }
    }

    
    ## Edit Data
    public function update(Request $request, Profile $profile)
    {
        if ($request->ajax()) {
            $profile->text = $request->text;
            $profile->url = $request->url;
            
        ## Ubah width dan Height
        if ($request->file('image')) {
                
            // simpan nama file lama
            $oldImage = $profile->image;

            $fileName = time() . '.webp'; // paksa jadi webp

            // Baca file langsung dari upload (tanpa pindah ke temp folder)
            $manager = new ImageManager(new Driver());
            $image = $manager->read(
                    $request->file('image')->getRealPath()
                );

            // Simpan tanpa kompresi
            $encoded = $image->toWebp(75);

            // Simpan ke storage
            Storage::put('upload/profile/' . $fileName, (string) $encoded);

            // pastikan file benar-benar ada
            if (Storage::exists('upload/profile/' . $fileName)) {

                $profile->image = $fileName;

                // baru hapus file lama
                if ($oldImage) {
                    Storage::delete('upload/profile/' . $oldImage);
                }
            }
            
        }
            $profile->save();
    
            activity()->log('Edit Data Profile With ID = '.$profile->id);
            return response()->json(['success' => true,'message' => 'Ubah Data Berhasil']);
        }
    }


}
