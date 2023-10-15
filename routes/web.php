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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('auth/login', [
        'title' => "login",
    ]);
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
    Route::get('/tambah_ruangan', [Controller::class, 'tambah_ruangan'])->name('tambah_ruangan');
    Route::post('/tambah_ruangan/store', [Controller::class, 'tambah_ruangan_store'])->name('tambah_ruangan_store');
    /* delete ruangan ruangan_delete*/
    Route::post('/ruangan_del}', [Controller::class, 'ruangan_del'])->name('ruangan_del');

    Route::get('/hotel_detail/{id}', [Controller::class, 'hotel_detail'])->name('hotel_detail');
    Route::post('/hotel_detail/update', [Controller::class, 'hotel_detail_update'])->name('hotel_detail_update');

    Route::get('/tambah_pelanggan', [Controller::class, 'tambah_pelanggan'])->name('tambah_pelanggan');
    Route::post('/tambah_pelanggan/store', [Controller::class, 'tambah_pelanggan_store'])->name('tambah_pelanggan_store');
    Route::get('/pelanggan_detail/{id}', [Controller::class, 'pelanggan_detail'])->name('pelanggan_detail');
    Route::post('/pelanggan_detail/update', [Controller::class, 'pelanggan_detail_update'])->name('pelanggan_detail_update');
    Route::post('/pelanggan_del/', [Controller::class, 'pelanggan_del'])->name('pelanggan_del');

    Route::get('/tambah_booking', [Controller::class, 'tambah_booking'])->name('tambah_booking');
    Route::get('/tambah_booking_pelanggan/{id}', [Controller::class, 'tambah_booking_pelanggan'])->name('tambah_booking_pelanggan');
    Route::post('/tambah_booking/store', [Controller::class, 'tambah_booking_store'])->name('tambah_booking_store');
    Route::get('/booking_detail/{id}', [Controller::class, 'booking_detail'])->name('booking_detail');
    Route::post('/booking_detail/update', [Controller::class, 'booking_detail_update'])->name('booking_detail_update');
    Route::post('/booking_del/', [Controller::class, 'booking_del'])->name('booking_del');

    Route::get('/tambah_transaksi', [Controller::class, 'tambah_transaksi'])->name('tambah_transaksi');
    Route::post('/tambah_transaksi/store', [Controller::class, 'tambah_transaksi_store'])->name('tambah_transaksi_store');
    Route::get('/transaksi_detail/{id}', [Controller::class, 'transaksi_detail'])->name('transaksi_detail');
    Route::post('/transaksi_detail/update', [Controller::class, 'transaksi_detail_update'])->name('transaksi_detail_update');
    Route::post('/transaksi_del/', [Controller::class, 'transaksi_del'])->name('transaksi_del');

    Route::get('/laporan/ruangan', [Controller::class, 'laporanRuangan'])->name('laporanRuangan');
    Route::get('/laporan/pelanggan', [Controller::class, 'laporanPelanggan'])->name('laporanPelanggan');
    Route::get('/laporan/booking', [Controller::class, 'laporanBooking'])->name('laporanBooking');
    Route::get('/laporan/transaksi', [Controller::class, 'laporanTransaksi'])->name('laporanTransaksi');

    /* for get data */
    Route::get('/get-room-price/{id}', [Controller::class, 'getRoomPrice'])->name('get-room-price');
    Route::get('/get-booking-price/{id}', [Controller::class, 'getBookingPrice'])->name('get-booking-price');
});

Route::get('/foo', function () {
    Artisan::call('storage:link');
});
