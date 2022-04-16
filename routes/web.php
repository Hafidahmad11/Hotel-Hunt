<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomtypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FasilitasController;


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
    return view('dashboard');
});


// //  halaman admin (dashboard)
// Route::get('admin', function () {
//     return view('dashboard');
// });

// //home
// Route::get('/dashboard',[HomeController::class,'index']);



//home
Route::get('admin', [HomeController::class, 'index'])->name('dashboard');

//admin login route
Route::get('admin/login', [AdminController::class, 'login']);
Route::post('admin/login', [AdminController::class, 'check_login']);
Route::get('admin/logout', [AdminController::class, 'login']);


//  roomType route
Route::get('admin/roomtype/{id}/delete', [RoomtypeController::class, 'destroy']);
Route::resource('admin/roomtype', RoomtypeController::class);

//  room route
Route::get('admin/room/{id}/delete', [RoomController::class, 'destroy']);
Route::resource('admin/room', RoomController::class);


//  customer route
Route::get('admin/customer/{id}/delete', [CustomerController::class, 'destroy']);
Route::resource('admin/customer', CustomerController::class);


//  Fasilitas route
Route::get('admin/fasilitas/{id}/delete', [FasilitasController::class, 'destroy']);
Route::resource('admin/fasilitas', FasilitasController::class);
