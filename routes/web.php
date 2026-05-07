<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\JuriController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| WEB ROUTE
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return match (auth()->user()->role) {
        'admin' => redirect()->route('admin.dashboard'),
        'juri' => redirect()->route('juri.dashboard'),
        default => redirect()->route('peserta.dashboard'),
    };
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn () => redirect()->route('admin.dashboard'))->name('home');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/peserta', [AdminController::class, 'peserta'])->name('peserta');
    Route::get('/karya', [AdminController::class, 'karya'])->name('karya');
    Route::get('/ranking', [AdminController::class, 'ranking'])->name('ranking');
    Route::post('/approve/{id}', [AdminController::class, 'approve'])->name('approve');
    Route::delete('/delete/{id}', [AdminController::class, 'delete'])->name('delete');
});

Route::middleware(['auth', 'role:juri'])->prefix('juri')->name('juri.')->group(function () {
    Route::get('/', fn () => redirect()->route('juri.dashboard'))->name('home');
    Route::get('/dashboard', [JuriController::class, 'dashboard'])->name('dashboard');
    Route::get('/karya', [JuriController::class, 'karya'])->name('karya');
    Route::get('/ranking', [JuriController::class, 'ranking'])->name('ranking');
    Route::post('/nilai/{karya_id}', [JuriController::class, 'simpanNilai'])->name('nilai');
});

Route::middleware(['auth', 'role:peserta'])->prefix('peserta')->name('peserta.')->group(function () {
    Route::get('/', fn () => redirect()->route('peserta.dashboard'))->name('home');
    Route::get('/dashboard', [PesertaController::class, 'dashboard'])->name('dashboard');
    Route::get('/upload-karya', [PesertaController::class, 'uploadPage'])->name('upload.page');
    Route::get('/karya-saya', [PesertaController::class, 'karya'])->name('karya');
    Route::get('/ranking', [PesertaController::class, 'ranking'])->name('ranking');
    Route::post('/upload', [PesertaController::class, 'upload'])->name('upload');
});

require __DIR__.'/auth.php';
