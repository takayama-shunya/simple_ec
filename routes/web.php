<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\MycartController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [ShopController::class, 'index'])->name('home');
Route::post('/mycart', [MycartController::class, 'store'])->middleware(['auth']);
Route::get('/mycart', [MycartController::class, 'index'])->middleware(['auth'])->name('mycart');
Route::delete('/mycart{id}', [MycartController::class, 'destroy'])->middleware(['auth']);
Route::get('/mycart/payment', [MycartController::class, 'payment'])->middleware(['auth'])->name('payment');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
