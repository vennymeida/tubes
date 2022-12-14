<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\MasterviewController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RiwayatController;
use App\Http\Middleware\CekLevel;
use Illuminate\Http\Request;

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
Auth::routes();
Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => ['auth','CekLevel:Ardha Nur Azizah']], function(){
    Route::resource('produk', ProdukController::class);
    Route::resource('pembeli', PembeliController::class);
    Route::resource('transaksi', TransaksiController::class);
});
Route::group(['middleware' => ['auth','CekLevel:Ayu Puspita']], function(){
    Route::resource('profil', ProfilController::class);
});

Route::get('/Produk/cetak_pdf', [ProdukController::class,'cetak_pdf'])->name('cetak_pdf');
Route::get('/Produk/tampilan', [ProdukController::class,'tampilan'])->name('tampilan');
Route::resource('detail', MasterviewController::class);
Route::resource('transaksi', TransaksiController::class);



Route::get('/a', function () {
    return view('masterview');
});

Route::get('/keranjang/{id}', [TransaksiController::class, 'keranjang'])->name('keranjang');
Route::post('/keranjang/{id}', [TransaksiController::class, 'pesan'])->name('check-out');
Route::get('/checkout', [TransaksiController::class, 'checkout'])->name('checkout');
Route::get('/konfirmasi', [TransaksiController::class, 'konfirmasi'])->name('konfirmasi');
Route::get('pesan/{id}', [RiwayatController::class, 'detail'])->name('pesan');
Route::get('riwayat', [RiwayatController::class, 'index'])->name('riwayat');
Route::delete('/checkout/{id}', [TransaksiController::class, 'destroy'])->name('destroy');
Route::get('transaksi/{id}', [TransaksiController::class, 'show'])->name('transaksi');
Route::get('/Transaksi/cetak_transaksi', [TransaksiController::class,'cetak_transaksi'])->name('cetak_transaksi');
Route::get('/cetak_nota/{id}', [RiwayatController::class,'cetak_nota'])->name('cetak_nota');
// Route::get('/a', function () {
//     return view('masterview');
// });
// Route::get('/detail', function () {
//     return view('detail');
// });


// Route::prefix('a')->group(function(){
//     Route::get('/produk', function(){
//         return view('produk.index');
//     });
// });

// Auth::routes();

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', function () {
//     return view('masterview');
//  });
Auth::routes();

Route::get('/home', [App\Http\Controllers\MasterviewController::class, 'index'])->name('home');


Route::get('/Pembeli/cetak', [PembeliController::class,'cetak_pdf'])->name('cetak');





// Route::get('/detail/{id}', [MasterviewController::class, 'show'])->name('show');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

