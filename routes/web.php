<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Route::get('/', [Controller::class, 'dashboard'])->name('dashboard'); */

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');

    Route::get('/ruangan', [Controller::class, 'ruangan'])->name('ruangan');

    Route::get('/pelanggan', [Controller::class, 'pelanggan'])->name('pelanggan');

    Route::get('/booking', [Controller::class, 'booking'])->name('booking');

    Route::get('/transaksi', [Controller::class, 'transaksi'])->name('transaksi');

    /* Route::get('/ruangan_detail', [Controller::class, 'ruangan_detail'])->name('ruangan_detail'); */

    Route::get('/ruangan_detail/{id}', [Controller::class, 'ruangan_detail'])->name('ruangan_detail');

    Route::get('/ruangan_detail/{id}/edit', [Controller::class, 'ruangan_detail_edit'])->name('ruangan_detail_edit');

    Route::post('/ruangan_detail/update', [Controller::class, 'ruangan_detail_update'])->name('ruangan_detail_update');

    Route::get('/ruangan_detail/{id}/delete', [Controller::class, 'ruangan_detail_delete'])->name('ruangan_detail_delete');

    /* tambah_ruangan */
    Route::get('/tambah_ruangan', [Controller::class, 'tambah_ruangan'])->name('tambah_ruangan');

    Route::post('/tambah_ruangan/store', [Controller::class, 'tambah_ruangan_store'])->name('tambah_ruangan_store');
});

Route::get('/foo', function () {
    Artisan::call('storage:link');
});
