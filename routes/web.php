<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/event', [EventController::class, 'index'])->name('event.index');
Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
Route::post('/event/store', [EventController::class, 'store'])->name('event.store');
Route::get('/event/edit/{id}', [EventController::class, 'edit'])->name('event.edit');
Route::post('/event/update/{id}', [EventController::class, 'update'])->name('event.update');


