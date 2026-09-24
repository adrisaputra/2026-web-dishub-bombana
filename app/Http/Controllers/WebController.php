<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsViewer;
use App\Models\Profile;
use App\Models\Slider;
use Illuminate\Http\Request;

class WebController extends Controller
{
      public function index()
      {
          $slider = Slider::get();
          return view('web.home', compact('slider'));
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
        if ($menu=='about') {
            $title = "Tentang Kami";
            $profile = Profile::where('menu', 'about')->first();
            return view('web.profile_list', compact('title','profile'));
        } elseif ($menu=='vision_mission') {
            $title = "Visi dan Misi";
            $profile = Profile::where('menu', 'vision_mission')->first();
            return view('web.profile_list', compact('title','profile'));
        } elseif ($menu=='main_tasks') {
            $title = "Tugas Pokok dan Fungsi";
            $profile = Profile::where('menu', 'main_tasks')->first();
            return view('web.profile_list', compact('title','profile'));
        } elseif ($menu=='structure') {
            $title = "Struktur Organisasi";
            $profile = Profile::where('menu', 'structure')->first();
            return view('web.profile_list', compact('title','profile'));
        }

    }

    public function news()
    {
        $title = "Berita";
        return view('web.news', compact('title'));
    }

    public function news_list(Request $request)
    {
        $search =  $request->search;
        $news = News::where(function ($query) use ($search) {
            $query->where('title', 'LIKE', '%' . $search . '%');
        })->latest()->paginate(6)->onEachSide(1);

        if ($request->ajax()) {
            return view('web.news_list', compact('news'))->render();
        }

        return view('web.news', compact('news','social','article'));
    }

    public function news_detail(Request $request)
    {
        $title = "Berita";

        $news = $request->get('q');
        $news = News::where('slug', $news)->first();
        $get_news = News::where('id', '!=', $news->id)->limit(5)->get();
        $ipAddress = $request->ip();
        $viewer = NewsViewer::where('news_id', $news->id)
            ->where('ip_address', $ipAddress)
            ->first();

        if (!$viewer) {
            $news->news_viewer()->create([
                'ip_address' => $ipAddress,
            ]);

            $news->count_view = $news->count_view + 1;
            $news->save();
        }

        return view('web.news_detail', compact('title', 'news', 'get_news','get_article'));
    }

}
