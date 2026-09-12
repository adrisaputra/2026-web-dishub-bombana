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
        $title = "Dashboard";
        $news = $this->count_news();
        $user = User::count();
        // $message = Message::orderBy('id','DESC')->limit('3')->get();
		return view('admin.home',compact('title','news','user'));
    }
    
    function count_news(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://ppid.bombanakab.go.id/api/count_news/21',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        return $response;
        
    }
}
