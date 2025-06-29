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
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PemenangController;
use App\Http\Controllers\PreorderController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PasswordController;
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

Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');


//routing untuk penyelenggara
Route::resource('/penyelenggara', PenyelenggaraController::class);

//routing untuk admin
Route::resource('/admin', AdminController::class);

// Authentication routes
Auth::routes();

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


//untuk fitur search saat sudah login 
// Main route for both landing page (guests) and home page (authenticated users)
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Search functionality (works for both authenticated and guest users)
Route::post('/search', [HomeController::class, 'search'])->name('home.search');

// Get all events (AJAX endpoint)
Route::get('/events', [HomeController::class, 'getAllEvents'])->name('home.events');

// My tickets route (only for authenticated users)
Route::get('/my-tickets', [HomeController::class, 'myTicket'])->name('my.tickets');

// Keep the original /home route for backward compatibility (optional)
Route::get('/home', [HomeController::class, 'index']);

//change password
Route::get('change-password', [PasswordController::class, 'showChangePasswordForm'])->name('password.change');
Route::post('change-password', [PasswordController::class, 'changePassword'])->name('password.update');

Route::post('/generate-snap-token', [TransaksiController::class, 'generateSnapToken'])->name('generate.snap.token');