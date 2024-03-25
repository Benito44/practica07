<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfoliControllerWelcome;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\EditController;




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


Route::view('/', 'welcome')->name('welcome');
Route::get('/', [PortfoliControllerWelcome::class,'index']);
Route::view('/dashboard', 'dashboard')->name('dashboard');

Route::get('/dashboard', [DashBoardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    ->name('password.request');

Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    ->name('password.email');
Route::middleware('auth')->group(function () {
    Route::get('/profille', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::view('/new', 'new')->name('new');
Route::post('new', [MessageController::class, 'store']);

Route::view('/edit', 'edit')->name('edit');
Route::get('edit', [EditController::class, 'index'])->name('index');
Route::put('/proyecto', [EditController::class, 'update'])->name('update');

require __DIR__.'/auth.php';
