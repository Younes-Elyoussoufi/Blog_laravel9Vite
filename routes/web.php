<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\AdminController;
use App\Http\Controllers\HomeSliderController;
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

Route::get('/', function () {return view('frontend.index');});
Route::get('/about', function () {return view('frontend.parts.about');});
Route::get('/blog', function () {return view('frontend.parts.blog');});
Route::get('/blog-details', function () {return view('frontend.parts.blog-details');});
Route::get('/contact', function () {return view('frontend.parts.contact');});
Route::get('/portfolio', function () {return view('frontend.parts.portfolio');});
Route::get('/portfolio-details', function () {return view('frontend.parts.portfolio-details');});
Route::get('/services-details', function () {return view('frontend.parts.services-details');});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/admin/logout', [App\Http\Controllers\AdminController::class,'destroy'])->name('admin.logout');
Route::get('/admin/profile', [App\Http\Controllers\AdminController::class,'profile'])->name('admin.profile');
Route::put('/admin/profile', [App\Http\Controllers\AdminController::class,'update'])->name('admin.profile.update');
Route::get('/admin/showPasswod', [App\Http\Controllers\AdminController::class,'showPasswod'])->name('admin.showPasswod');
Route::post('/admin/showPasswod', [App\Http\Controllers\AdminController::class,'updatePasswod'])->name('admin.updatePasswod');

Route::get('/home/slide', [HomeSliderController::class,'HomeSlider'])->name('home.slide');
Route::put('/home/slide', [HomeSliderController::class,'updateSlider'])->name('update.slide');


require __DIR__.'/auth.php';
