<?php

use App\Http\Controllers\CostumerController;
use App\Http\Controllers\DataForDashboardController;
use App\Http\Controllers\FinanceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HargaLaundryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PendapatanContoller;
use App\Http\Controllers\PendapatanController;

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

Route::get('/', function () {
    return view('pages.landing_page');
});

Route::get('/login', function () {
    return view('pages.auth.auth-login');
})->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        return view('pages.dashboard', ['type_menu' => 'home']);
    })->name('home');

    Route::resource('user', UserController::class);
    Route::resource('costumer', CostumerController::class);
    Route::resource('laundry', HargaLaundryController::class);
    Route::resource('order', OrderController::class);
    Route::resource('profile', ProfileController::class);
    Route::get('/home', [DataForDashboardController::class, 'index'])->name('home');
    Route::get('/Finance', [FinanceController::class, 'FinanceFix'])->name('finance');
});
