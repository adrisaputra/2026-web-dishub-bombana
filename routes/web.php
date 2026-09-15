<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PopupController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


Route::get('/clear-cache-all', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    dd("Cache Clear All");
});

Route::get('/buat_storage', function () {
    Artisan::call('storage:link');
    dd("Storage Berhasil Di Buat");
});


Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);


Route::middleware(['role:Administrator,Operator'])->group(function () {

    Route::get('/dashboard', [HomeController::class, 'index']);
    Route::post('/logout', [LoginController::class, 'logout']);

    ## Slider
    Route::get('/slider', [SliderController::class, 'index'])->name('slider.index');
    Route::get('/slider/list', [SliderController::class, 'get_slider_index'])->name('slider.list');
    Route::post('/slider/store', [SliderController::class, 'store']);
    Route::post('/slider/validate/{action}', [SliderController::class, 'validate']);
    Route::get('/slider/edit/{slider}', [SliderController::class, 'edit']);
    Route::put('/slider/edit/{slider}', [SliderController::class, 'update']);
    Route::get('/slider/delete/{slider}', [SliderController::class, 'delete']);

    ## Pop Up
    Route::get('/popup', [PopupController::class, 'index'])->name('popup.index');
    Route::get('/popup/list', [PopupController::class, 'get_popup_index'])->name('popup.list');
    Route::post('/popup/store', [PopupController::class, 'store']);
    Route::post('/popup/validate/{action}', [PopupController::class, 'validate']);
    Route::get('/popup/edit/{popup}', [PopupController::class, 'edit']);
    Route::put('/popup/edit/{popup}', [PopupController::class, 'update']);
    Route::get('/popup/delete/{popup}', [PopupController::class, 'delete']);

    ## Profiles
    Route::get('/about', [ProfileController::class, 'index']);
    Route::get('/vision_mission', [ProfileController::class, 'index']);
    Route::get('/main_tasks', [ProfileController::class, 'index']);
    Route::get('/structure', [ProfileController::class, 'index']);
    Route::post('/profile/validate', [ProfileController::class, 'validation']);
    Route::put('/profile/edit/{profile}', [ProfileController::class, 'update']);

    ## Information
    Route::get('/information/{category}', [InformationController::class, 'index'])->name('information.index');
    Route::get('/information/list/{category}', [InformationController::class, 'get_information_index'])->name('information.list');
    Route::post('/information/upload_image', [InformationController::class, 'upload_image'])->name('upload_information');
    Route::post('/information/store', [InformationController::class, 'store']);
    Route::post('/information/validate/{action}', [InformationController::class, 'validate']);
    Route::get('/information/edit/{information}', [InformationController::class, 'edit']);
    Route::put('/information/edit/{information}', [InformationController::class, 'update']);
    Route::get('/information/delete/{information}', [InformationController::class, 'delete']);

    ## Album
    Route::get('/album', [AlbumController::class, 'index'])->name('album.index');
    Route::get('/album/list', [AlbumController::class, 'get_album_index'])->name('album.list');
    Route::post('/album/store', [AlbumController::class, 'store']);
    Route::post('/album/validate/{action}', [AlbumController::class, 'validate']);
    Route::get('/album/edit/{album}', [AlbumController::class, 'edit']);
    Route::put('/album/edit/{album}', [AlbumController::class, 'update']);
    Route::get('/album/delete/{album}', [AlbumController::class, 'delete']);

    ## Photo
    Route::get('/photo/{album}', [PhotoController::class, 'index'])->name('photos.index');
    Route::get('/photo/list/{album}', [PhotoController::class, 'get_photo_index'])->name('photos.list');
    Route::post('/photo/store', [PhotoController::class, 'store']);
    Route::post('/photo/validate/{action}', [PhotoController::class, 'validate']);
    Route::get('/photo/edit/{photo}', [PhotoController::class, 'edit']);
    Route::put('/photo/edit/{photo}', [PhotoController::class, 'update']);
    Route::get('/photo/delete/{photo}', [PhotoController::class, 'delete']);

    ## Video
    Route::get('/video', [VideoController::class, 'index'])->name('video.index');
    Route::get('/video/list', [VideoController::class, 'get_video_index'])->name('video.list');
    Route::post('/video/store', [VideoController::class, 'store']);
    Route::post('/video/validate/{action}', [VideoController::class, 'validate']);
    Route::get('/video/edit/{video}', [VideoController::class, 'edit']);
    Route::put('/video/edit/{video}', [VideoController::class, 'update']);
    Route::get('/video/delete/{video}', [VideoController::class, 'delete']);

});


Route::middleware(['role:Administrator,Operator'])->group(function () {
    
    ## User
    Route::get('/user', [UserController::class, 'index'])->name('users.index');
    Route::get('/user/list', [UserController::class, 'get_user_index'])->name('users.list');
    Route::post('/user/store', [UserController::class, 'store']);
    Route::post('/user/validate/{action}', [UserController::class, 'validate']);
    Route::get('/user/edit/{user}', [UserController::class, 'edit']);
    Route::put('/user/edit/{user}', [UserController::class, 'update']);
    Route::get('/user/delete/{user}', [UserController::class, 'delete']);

    ## Log
    Route::get('/log', [LogController::class, 'index'])->name('logs.index');
    Route::get('/log/list', [LogController::class, 'get_log_index'])->name('logs.list');
    Route::get('/log/detail/{user}', [LogController::class, 'detail']);

    ## Setting
    Route::get('/setting', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/setting/validate', [SettingController::class, 'validate']);
    Route::put('/setting/edit/{setting}', [SettingController::class, 'update']);


});