<?php

use App\Http\Controllers\KlasemenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KlubController;
use App\Http\Controllers\PertandinganController;

Route::get('/', [KlasemenController::class, 'index'])->name('klasemen.index');

Route::get('/klub', [KlubController::class, 'index'])->name('klub.index');
Route::post('/klub', [KlubController::class, 'store'])->name('klub.store');
Route::get('/klub/{klub}/edit', [KlubController::class, 'edit'])->name('klub.edit');
Route::put('/klub/{klub}', [KlubController::class, 'update'])->name('klub.update');
Route::delete('/klub/{klub}', [KlubController::class, 'destroy'])->name('klub.destroy');

Route::get('/pertandingan', [PertandinganController::class, 'index'])->name('pertandingan.index');
Route::post('/pertandingan', [PertandinganController::class, 'store'])->name('pertandingan.store');
Route::get('/pertandingan/{pertandingan}/edit', [PertandinganController::class, 'edit'])->name('pertandingan.edit');
Route::put('/pertandingan/{pertandingan}', [PertandinganController::class, 'update'])->name('pertandingan.update');
