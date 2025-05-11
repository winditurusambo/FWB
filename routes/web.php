<?php
use App\Http\Controllers\HalamanController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });


Route::get('/index', [HalamanController::class, 'index']);
Route::get('/about', [HalamanController::class, 'about']);
Route::get('/contact', [HalamanController::class, 'contact']);
Route::get('/sear', [HalamanController::class, 'searvices']);
Route::get('/shop', [HalamanController::class, 'shop']);

// Route::Controller(HalamanController::class)->group(function(){
//     Route::get('/','index')->name('index');
//     Route::get('/about','about')->name('about');
//     Route::get('/contact','contact')->name('contact');
//     Route::get('/searvices','sear')->name('searvices');
//     Route::get('/shop','shop')->name('shop');
// });
