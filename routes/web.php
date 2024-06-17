<?php

use App\Http\Controllers\LiteDashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ProductController::class, 'index']);

Route::get('/lite_dashboard', [LiteDashboardController::class, 'index'])->name('dashboard.home');
Route::post('/lite_dashboard', [LiteDashboardController::class, 'store'])->name('products.store');
Route::delete('/lite_dashboard/{product}', [LiteDashboardController::class, 'destroy'])->name('products.destroy');
