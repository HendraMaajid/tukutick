<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EOController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GachaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenyelenggaraController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PemenangController;
use App\Http\Controllers\PreorderController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\TransaksiController;
use App\Models\Pemenang;
use Illuminate\Support\Facades\Auth;

/*Route::get('/', function () {
  return view('admin.dashboard');
});*/


//halaman awal masuk ke landingpage
Route::get('/', function () {
  return view('tukutick.landingpage');
});



//untuk event
Route::resource('/event', EventController::class);

Route::get('/event', [EventController::class, 'index'])->name('event.index');
Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
Route::post('/event/store', [EventController::class, 'store'])->name('event.store');
Route::get('/event/{id}/edit', [EventController::class, 'edit'])->name('event.edit');
Route::put('/event/update/{id}', [EventController::class, 'update'])->name('event.update');
Route::delete('/event/destroy/{id}', [EventController::class, 'destroy'])->name('event.destroy');
Route::get('/', [EventController::class, 'home'])->name('event.home');
Route::get('/home', [EventController::class, 'landing'])->name('event.landing');

Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
Route::get('/', [KategoriController::class, 'landing'])->name('kategori.landing');


//routing untuk penyelenggara
Route::resource('/penyelenggara', PenyelenggaraController::class);

//routing untuk admin
Route::resource('/admin', AdminController::class);

Auth::routes();

Route::resource('/home', HomeController::class);

//routing untuk ghaca
Route::get('gacha/{id_event}/{jml_ticket}/{jml_po}', [GachaController::class, 'store'])->name('gacha');

//routing untuk pemenang
Route::resource('/pemenang', PemenangController::class);


//routing untuk melakukan preorder
Route::resource('/preorder', PreorderController::class);

//url untuk menampilkan halaman pemenang
Route::get('event/{id_event}/pemenang', function () {
  return view('tukutick.pemenang');
});



//routing untuk transaksi
Route::resource('/transaksi', TransaksiController::class);

//url untuk menampilkan halaman transaksi
Route::get('/pembayaran', function () {
  return view('tukutick.pembayaran');
});

Route::resource('/tiket', TiketController::class);


//route untuk controller tiket
//Route::resource('/tiket', TiketController::class);

//url untuk menampilkan halaman detailtiket
Route::get('/detailtiket', function () {
  return view('tukutick.detailTiket');
});

//url untuk menampilkan halaman profile
Route::get('/profile', function () {
  return view('tukutick.profile');
});
Route::put('/profil/{id}', [CustomerController::class, 'update'])->name('profil.update');
Route::resource('/profil', CustomerController::class);


//route untuk EO / Event Organizer
Route::resource('/EO', EOController::class);


//url untuk menuju ke dashboard penyelenggara
Route::get('/dashboard_penyelenggara', function () {
  return view('admin.dashboardPenyelenggara');
});

//url untuk menuju ke transactions penyelenggara
Route::get('/transactions', function () {
  return view('menu.transaksi');
});
//url untuk menuju ke preorders penyelenggara
Route::get('/preorders', function () {
  return view('menu.pre-order');
});
//url untuk menuju ke winners penyelenggara
Route::get('/winners', function () {
  return view('menu.pemenang');
});
//url untuk menuju ke preorders penyelenggara
Route::get('/users', function () {
  return view('menu.users');
});
//url untuk menuju ke winners penyelenggara
Route::get('/customers', function () {
  return view('menu.customers');
});