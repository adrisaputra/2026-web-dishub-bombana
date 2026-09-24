<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Slider;

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

}
