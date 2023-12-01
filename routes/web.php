<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LanguageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('language',LanguageController::class);
Route::resource('course',CourseController::class);
Route::get('/index',[PageController::class,'index'])->name('index');
Route::get('/detail/{slug}',[PageController::class,'detail'])->name('post.detail');
Route::resource('post',PostController::class);
Route::resource('gallery',GalleryController::class);

Route::get('edit-profile',[HomeController::class,'editProfile'])->name('edit-profile');
Route::post('update-profile',[HomeController::class,'updateProfile'])->name('update-profile');
Route::get('change-password',[HomeController::class,'changePassword'])->name('change-password');
Route::post('update-password',[HomeController::class,'updatePassword'])->name('update-password');

Route::resource('comment',CommentController::class);