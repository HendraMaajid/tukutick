<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenyelenggaraController;
use Illuminate\Support\Facades\Auth;

/*Route::get('/', function () {
  return view('admin.dashboard');
});*/


//halaman awal masuk ke login
Route::get('/', function () {
  return redirect('/login');
});


Route::get('/event', [EventController::class, 'index'])->name('event.index');
Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
Route::post('/event/store', [EventController::class, 'store'])->name('event.store');
Route::get('/event/{id}/edit', [EventController::class, 'edit'])->name('event.edit');
Route::put('/event/update/{id}', [EventController::class, 'update'])->name('event.update');
Route::delete('/event/destroy/{id}', [EventController::class, 'destroy'])->name('event.destroy');

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


//routing untuk coba navbar
Route::get('/apps', [AppsController::class, 'index'])->name('apps.index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
