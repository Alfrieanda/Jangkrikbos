<?php

use App\Http\Controllers\CetakController;
use App\Http\Controllers\CetakJangkrikController;
use App\Http\Controllers\ChartController;
use App\Models\Jangkrik;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\JangkrikController;
use App\Http\Controllers\RmJangkrikController;
use App\Http\Controllers\GrafikController;


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
    return view('auth.login');
});

Route::get('/vw_tambah', function () {
    return view('vw_tambah');
})->name('vw_tambah');



Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('jangkrik', JangkrikController::class);
    Route::resource('data_user', DataUserController::class);
    Route::resource('rm_jangkrik', RmJangkrikController::class);
    Route::get('/tambah_rm_jangkrik', [RmJangkrikController::class, 'create'])->name('tambah_rm_jangkrik');
    
    Route::get('/home', [ChartController::class, 'loadChartData'])->name('home');
    // Route::get('/grafik', [GrafikController::class, 'index'])->name('grafik.index');
    Route::resource('cetak', CetakController::class);
    Route::resource('cetakjangkrik', CetakJangkrikController::class);
    Route::resource('cetakchart', ChartController::class);
    // Route::resource('/show-chart', ChartController::class);
    // Route::get('/jangkrik', JangkrikController::class)->name('jangkrik.index');

});

