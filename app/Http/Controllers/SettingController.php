<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class SettingController extends Controller
{
    ## Show Data
    public function index()
    {
        $title = "Pengaturan";
        $setting = Setting::find(1);
        return view('admin.setting.index', compact('title', 'setting'));
    }

    public function validate(Request $request)
    {
        if ($request->ajax()) {

            $request->validate([
                'application_name' => 'required',
                'short_application_name' => 'required',
                'small_icon' => 'image',
                'large_icon' => 'image',
                'background_login' => 'image'
            ]);

            return response()->json(['success' => true]);
        }
    }

    ## Edit Data
    public function update(Request $request, Setting $setting)
    {
        if ($request->ajax()) {
            $setting->address = $request->address;
            $setting->phone = $request->phone;
            $setting->email = $request->email;
            $setting->application_name = $request->application_name;
            $setting->short_application_name = $request->short_application_name;
            $setting->youtube = $request->youtube;
            $setting->instagram = $request->instagram;
            $setting->facebook = $request->facebook;
            $setting->whatsapp = $request->whatsapp;

            if ($request->file('small_icon')) {
                $oldSmallIcon = $setting->small_icon;
                $fileName  = '1' . time() . '.webp'; // paksa jadi webp

                $manager = new ImageManager(new Driver());
                $image = $manager->read($request->small_icon->getRealPath())
                    ->resize(500, 500, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });

                // Simpan tanpa kompresi
                $encoded = $image->toWebp(100);
                Storage::put('upload/setting/' . $fileName, (string) $encoded);

                // pastikan file benar-benar ada
                if (Storage::exists('upload/setting/' . $fileName)) {

                    $setting->small_icon = $fileName;

                    // baru hapus file lama
                    if ($oldSmallIcon) {
                        Storage::delete('upload/setting/' . $oldSmallIcon);
                    }
                }
            }

            if ($request->file('large_icon')) {
                $oldlargeIcon = $setting->large_icon;
                $fileName  = '2' . time() . '.webp'; // paksa jadi webp

                $manager = new ImageManager(new Driver());
                $image = $manager->read(
                    $request->file('large_icon')->getRealPath()
                );

                // Simpan tanpa kompresi
                $encoded = $image->toWebp(100);
                Storage::put('upload/setting/' . $fileName, (string) $encoded);

                // pastikan file benar-benar ada
                if (Storage::exists('upload/setting/' . $fileName)) {

                    $setting->large_icon = $fileName;

                    // baru hapus file lama
                    if ($oldlargeIcon) {
                        Storage::delete('upload/setting/' . $oldlargeIcon);
                    }
                }
            }
            
            if ($request->file('background_login')) {
                $oldBackgorundLogin = $setting->background_login;
                $fileName  = '3' . time() . '.webp'; // paksa jadi webp

                $manager = new ImageManager(new Driver());
                $image = $manager->read(
                    $request->file('background_login')->getRealPath()
                );

                // Simpan tanpa kompresi
                $encoded = $image->toWebp(100);
                Storage::put('upload/setting/' . $fileName, (string) $encoded);

                // pastikan file benar-benar ada
                if (Storage::exists('upload/setting/' . $fileName)) {

                    $setting->background_login = $fileName;

                    // baru hapus file lama
                    if ($oldBackgorundLogin) {
                        Storage::delete('upload/setting/' . $oldBackgorundLogin);
                    }
                }
            }

            $setting->save();

            activity()->log('Edit Data Setting With ID = ' . $setting->id);
            return response()->json(['success' => true, 'message' => 'Ubah Data Berhasil']);
        }
    }
}
