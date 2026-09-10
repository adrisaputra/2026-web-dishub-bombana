<?php

namespace App\Helpers;

use App\Models\ComodityCategory;
use App\Models\Complaint;
use App\Models\EconomicPublish;
use App\Models\Link;
use App\Models\Lkd;
use App\Models\News;
use App\Models\PotentialCategory;
use App\Models\RequestData;
use App\Models\RequestLetter;
use App\Models\ResidentPublish;
use App\Models\Setting;   //nama model
use App\Models\Task;

class Helpers
{
    
    public static function setting()
    {
        $setting = Setting::first();
        return $setting;
    }
    
    public static function format_number($value)
    {
        $value = number_format($value,0,",",".");
        return $value;
    }

    public static function date($value)
    {
        $value = date('d M Y', strtotime($value));
        return $value;
    }

    public static function day_name($day) {
        switch ($day) {
            case "Monday":
                return "Senin";
            case "Tuesday":
                return "Selasa";
            case "Wednesday":
                return "Rabu";
            case "Thursday":
                return "Kamis";
            case "Friday":
                return "Jumat";
            case "Saturday":
                return "Sabtu";
            case "Sunday":
                return "Minggu";
            default:
                return "Nomor hari tidak valid. Masukkan nomor antara 1 dan 7.";
        }
    }

    public static function month_name($month) {
        switch ($month) {
            case "01":
                return "Januari";
            case "02":
                return "Februari";
            case "03":
                return "Maret";
            case "04":
                return "April";
            case "05":
                return "Mei";
            case "06":
                return "Juni";
            case "07":
                return "Juli";
            case "08":
                return "Agustus";
            case "09":
                return "September";
            case "10":
                return "Oktober";
            case "11":
                return "November";
            case "12":
                return "Desember";
            default:
                return "Nomor bulan tidak valid. Masukkan nomor antara 1 dan 12.";
        }
    }

    public static function date_indo_full($value)
    {
        if (!$value) return '-';

        $timestamp = strtotime($value);
        $day_name  = self::day_name(date('l', $timestamp));
        $day       = date('d', $timestamp);
        $month     = self::month_name(date('m', $timestamp));
        $year      = date('Y', $timestamp);

        return $day_name . '/ ' . $day . ' ' . $month . ' ' . $year;
    }

    public static function month_indo_full($value)
    {
        if (!$value) return '-';

        $timestamp = strtotime($value);
        $day       = date('d', $timestamp);
        $month     = self::month_name(date('m', $timestamp));
        $year      = date('Y', $timestamp);

        return $day . ' ' . $month . ' ' . $year;
    }

    // public static function new_news() {
    //     $village = app('currentVillage');
    //     $news = News::where('village_id', $village->id)->orderBy('id','DESC')->limit(4)->get();
    //     return $news;
    // }

    // public static function popular_news() {
    //     $village = app('currentVillage');
    //     $news2 = News::where('village_id', $village->id)->orderBy('count_view','DESC')->limit(4)->get();
    //     return $news2;
    // }

}
