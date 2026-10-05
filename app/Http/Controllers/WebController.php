<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Information;
use App\Models\InformationViewer;
use App\Models\News;
use App\Models\Popup;
use App\Models\Viewer;
use App\Models\Profile;
use App\Models\Slider;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WebController extends Controller
{
    public function index()
    {
        $slider = Slider::get();
        $popup = Popup::where('is_active', true)->orderBy('id', 'DESC')->get();
        $profile = Profile::where('menu', 'opening_speech')->first();
        $news = News::where('office_id', 14)->latest()->take(3)->get();
        $information = Information::latest()->take(6)->get();
        return view('web.home', compact('slider','popup', 'profile', 'news', 'information'));
    }

    public function index2()
    {
        return view('web.index');
    }

    public function profile()
    {
        if (request()->is('page-about')) {
            $title = "Tentang Kami";
        } elseif (request()->is('page-vision-mission')) {
            $title = "Visi dan Misi";
        } elseif (request()->is('page-main-tasks')) {
            $title = "Tugas Pokok dan Fungsi";
        } elseif (request()->is('page-structure')) {
            $title = "Struktur Organisasi";
        }
        return view('web.profile', compact('title'));
    }

    public function profile_list($menu)
    {
        if ($menu == 'about') {
            $title = "Tentang Kami";
            $profile = Profile::where('menu', 'about')->first();
            return view('web.profile_list', compact('title', 'profile'));
        } elseif ($menu == 'vision_mission') {
            $title = "Visi dan Misi";
            $profile = Profile::where('menu', 'vision_mission')->first();
            return view('web.profile_list', compact('title', 'profile'));
        } elseif ($menu == 'main_tasks') {
            $title = "Tugas Pokok dan Fungsi";
            $profile = Profile::where('menu', 'main_tasks')->first();
            return view('web.profile_list', compact('title', 'profile'));
        } elseif ($menu == 'structure') {
            $title = "Struktur Organisasi";
            $profile = Profile::where('menu', 'structure')->first();
            return view('web.profile_list', compact('title', 'profile'));
        }
    }

    public function information($category = null)
    {
        if ($category == 'program-dan-kegiatan') {
            $title = "Program dan Kegiatan";
        } else if ($category == 'pelayanan-publik') {
            $title = "Pelayanan Publik";
        } else if ($category == 'transportasi-dan-fasilitas-perhubungan') {
            $title = "Transportasi dan Fasilitas Perhubungan";
        } else if ($category == 'perizinan-dan-persyaratan-pelayanan') {
            $title = "Perizinan dan Persyaratan Pelayanan";
        } else if ($category == 'lainnya') {
            $title = "Lainnya";
        }
        return view('web.information', compact('title', 'category'));
    }

    public function information_list(Request $request, $category = null)
    {

        $search =  $request->search;
        if ($category == 'program-dan-kegiatan') {
            $title = "Program dan Kegiatan";
            $category_id = 1;
        } else if ($category == 'pelayanan-publik') {
            $category_id = 2;
        } else if ($category == 'transportasi-dan-fasilitas-perhubungan') {
            $category_id = 3;
        } else if ($category == 'perizinan-dan-persyaratan-pelayanan') {
            $category_id = 4;
        } else if ($category == 'lainnya') {
            $category_id = 5;
        }
        $information = Information::where('category', $category_id)
            ->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', '%' . $search . '%');
            })->latest()->paginate(6)->onEachSide(1);

        if ($request->ajax()) {
            return view('web.information_list', compact('information'))->render();
        }

        return view('web.information', compact('title', 'category', 'information'));
    }

    public function information_detail(Request $request)
    {
        $title = "Informasi";

        $information = $request->get('q');
        $information = Information::where('slug', $information)->first();
        $get_information = Information::where('id', '!=', $information->id)->where('category', $information->category)->limit(5)->get();
        $get_information_popular = Information::where('category', $information->category)->orderBy('count_view', 'desc')->limit(5)->get();
        $ipAddress = $request->ip();
        $viewer = InformationViewer::where('information_id', $information->id)
            ->where('ip_address', $ipAddress)
            ->first();

        if (!$viewer) {
            $information->information_viewer()->create([
                'ip_address' => $ipAddress,
            ]);

            $information->count_view = $information->count_view + 1;
            $information->save();
        }

        return view('web.information_detail', compact('title', 'information', 'get_information','get_information_popular'));
    }

    public function news()
    {
        $title = "Berita";
        return view('web.news', compact('title'));
    }

    public function news_list(Request $request)
    {
        $search =  $request->search;
        $news = News::where('office_id', 14)->where(function ($query) use ($search) {
            $query->where('title', 'LIKE', '%' . $search . '%');
        })->latest()->paginate(6)->onEachSide(1);

        if ($request->ajax()) {
            return view('web.news_list', compact('news'))->render();
        }

        return view('web.news', compact('news'));
    }

    public function news_detail(Request $request)
    {
        $title = "Berita";

        $news = $request->get('q');
        $news = News::where('slug', $news)->first();
        $get_news = News::where('id', '!=', $news->id)->where('office_id', 14)->limit(5)->get();
        $get_news_popular = News::where('office_id', 14)->orderBy('count_view', 'desc')->limit(5)->get();
        $ipAddress = $request->ip();
        $viewer = Viewer::where('news_id', $news->id)
            ->where('ip_address', $ipAddress)
            ->first();

        if (!$viewer) {
            $news->viewer()->create([
                'ip_address' => $ipAddress,
            ]);

            $news->count_view = $news->count_view + 1;
            $news->save();
        }

        return view('web.news_detail', compact('title', 'news', 'get_news','get_news_popular'));
    }


    public function album()
    {
        $title = "Galeri Foto";
        return view('web.album', compact('title'));
    }

    public function album_list(Request $request)
    {
        $title = "Galeri Foto";

        $album = Album::latest()->paginate(6)->onEachSide(1);

        if ($request->ajax()) {
            return view('web.album_list', compact('album'))->render();
        }

        return view('web.album', compact('title', 'album'));
    }

    public function video()
    {
        $title = "Galeri Video";
        $video = Video::orderBy('id', 'DESC')->paginate(6)->onEachSide(1);
        return view('web.video', compact('title', 'video'));
    }

    public function video_list(Request $request)
    {
        $title = "Galeri Video";

        $video = Video::where('village_id', $this->village->id)->latest()->paginate(6)->onEachSide(1);

        if ($request->ajax()) {
            return view('web.video_list', compact('video'))->render();
        }

        return view('web.video', compact('title', 'video'));
    }

    public function weather()
    {
        $response = Http::timeout(10)->get(
            'https://api.open-meteo.com/v1/forecast',
            [
                'latitude' => -4.633,
                'longitude' => 121.935,
                'current' => 'temperature_2m,relative_humidity_2m,apparent_temperature,weather_code,wind_speed_10m',
                'timezone' => 'Asia/Makassar',
            ]
        );

        if (!$response->successful()) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data cuaca'
            ], 500);
        }

        $data = $response->json()['current'];

        $weatherCode = $data['weather_code'];

        $weather = match ($weatherCode) {
            0 => 'Cerah',
            1 => 'Cerah Berawan',
            2 => 'Cerah Berawan',
            3 => 'Berawan',
            45, 48 => 'Berkabut',
            51, 53, 55 => 'Gerimis',
            61, 63, 65 => 'Hujan',
            66, 67 => 'Hujan Beku',
            71, 73, 75, 77 => 'Salju',
            80, 81, 82 => 'Hujan Deras',
            95 => 'Badai Petir',
            96, 99 => 'Badai Petir + Hujan Es',
            default => 'Tidak diketahui',
        };

        return response()->json([
            'temperature' => round($data['temperature_2m']),
            'feels_like' => round($data['apparent_temperature']),
            'humidity' => $data['relative_humidity_2m'],
            'wind_speed' => $data['wind_speed_10m'],
            'weather' => $weather,
            'weather_code' => $weatherCode,
        ]);
    }
}
