<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Resident;
use App\Models\ResidentMember;
use App\Models\Subdistrict;
use App\Models\User;
use App\Models\Village;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    ## Show Data
    public function index()
    {
        // echo $this->village->id;
        $title = "Dashboard";
        if(Auth::user()->group_id == 1){
            $subdistrict = Subdistrict::count();
            $village = Village::count();
            $user = User::count();
            return view('admin.home',compact('title','subdistrict','village','user'));
        } else {
            $news = News::where('village_id', $this->village->id)->count();
            $resident_member = ResidentMember::whereHas('resident', function ($query){
                                    $query->where('village_id', $this->village->id)
                                        ->where('year', date('Y'));
                                })->count();
            return view('admin.home',compact('title','news','resident_member'));
        }
    }
}
