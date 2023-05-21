<?php

use App\Http\Controllers\menuController;
use App\Http\Controllers\pesananController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function (){
    Route::get('/', function () {
        return view('welcome');
    });

    Route::prefix('menu')->name('menu.')->group(function (){
        Route::get('/', [menuController::class, 'index'])->name('show');
        Route::get('/api/{id}', [menuController::class, 'api'])->name('api');
        Route::post('/', [menuController::class, 'store'])->name('store');
        Route::patch('/edit/{id}', [menuController::class, 'update'])->name('update');
    });

    Route::prefix('pesanan')->name('pesanan.')->group(function (){
        Route::get('/', [pesananController::class, 'index'])->name('show');
        Route::get('/makan-di-tempat', [pesananController::class, 'makanDitempat'])->name('show.makan-di-tempat');
        Route::get('/bawa-pulang', [pesananController::class, 'bawaPulang'])->name('show.bawa-pulang');
        Route::get('/tambah', [pesananController::class, 'add'])->name('add');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
