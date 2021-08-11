<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserRfidController;

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

//Route::get('/listkeluar',[AbsenController::class, 'proseskeluar']);

Route::get('/', [AuthController::class, 'showFormLogin']);   
Route::get('/login', [AuthController::class, 'showFormLogin']);  
Route::get('/registrasi', [AuthController::class, 'showFormRegister']);
Route::get('/taplogin', [AuthController::class, 'taplogin']); 
Route::get('/rfid', [DashboardController::class, 'rfid']);

Route::group(['middleware' => 'auth'], function(){
    Route::get('/emp_list',[AbsenController::class, 'proses']);
    Route::get('/log', [AbsenController::class, 'log']);
    Route::get('/log/print', [AbsenController::class, 'print']);
    Route::get('/absenmasuk', [AbsenController::class, 'index'])->name('masuk');
    Route::post('/absenmasuk/simpan/', [AbsenController::class, 'insert']);

    Route::get('/absenkeluar', [AbsenController::class, 'keluar'])->name('keluar');
    Route::get('/absenkeluar/search', [AbsenController::class, 'search']);
    Route::get('/absenkeluar/simpan/{id}', [AbsenController::class, 'update']);
    Route::get('/absenkeluar/detail/{id}', [AbsenController::class, 'lihat']);

    Route::get('/report', [AbsenController::class, 'report']);
    Route::get('/report/pdf/{tgl_awal}/{tgl_akhir}', [AbsenController::class, 'pdf']);

    Route::get('/get', [AbsenController::class, 'get']);
    Route::get('/absentap', [AbsenController::class, 'absentap']);
    Route::get('/tapping', [AbsenController::class, 'tapping']);
    Route::post('/absentap/simpan/', [AbsenController::class, 'simpantap']);
    Route::get('/absentapkeluar', [AbsenController::class, 'absentapkeluar']);
    Route::get('/tapkeluar', [AbsenController::class, 'tapkeluar']);

    Route::get('/user', [UserController::class, 'index'])->name('index');
    Route::get('/user/edit/{id}', [UserController::class, 'edit']);
    Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);
    Route::get('/user/tambah/', [UserController::class, 'tambah']);
    Route::post('/user/simpan/', [UserController::class, 'simpan']);
    Route::post('/user/update/{id}', [UserController::class, 'update']);
    Route::get('/user/search', [UserController::class, 'search']);

    Route::get('/userrfid', [UserRfidController::class, 'index']);
    Route::get('/prosesid',[UserRfidController::class, 'prosesid']);
    //Route::get('/userrfid/edit/{id}',[UserRfidController::class, 'edit']);
    Route::get('/userrfid/tambah/',[UserRfidController::class, 'tambah']);
    Route::post('/userrfid/simpan/',[UserRfidController::class, 'simpan']);

});


Auth::routes();

Route::get('/home', [HomeController::class, 'index']);

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});