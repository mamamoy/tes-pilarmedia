<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DependentDropdownController;
use App\Http\Controllers\OOPController;
use App\Http\Controllers\TestingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Route::middleware(['auth'])->group(function() {

    Route::get('dashboard/data', [DashboardController::class, 'getProducts'])->name('dashboard.data');
    Route::resource('dashboard', DashboardController::class);
    Route::get('oop', [OOPController::class, 'index'])->name('oop.index');
    Route::get('dropdown', [DependentDropdownController::class, 'index'])->name('dropdown.index');
    Route::get('testing', [TestingController::class, 'index'])->name('testing.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
