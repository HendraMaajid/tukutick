<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/event', [EventController::class, 'index'])->name('events.index');
Route::get('/event/create', [EventController::class, 'create'])->name('events.create');
Route::post('/event/store', [EventController::class, 'store'])->name('events.store');


