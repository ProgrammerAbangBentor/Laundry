<?php

use App\Http\Controllers\CostumerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HargaLaundryController;
use App\Http\Controllers\OrderController;

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

});
