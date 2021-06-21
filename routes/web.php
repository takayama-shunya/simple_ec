<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopsController;
use App\Http\Controllers\MycartsController;


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

Route::middleware(['admin'])->group(function () {
    Route::resource('shops', ShopsController::class);
});

Route::get('/', [ShopsController::class, 'home'])->name('home');

Route::post('/mycart', [MycartsController::class, 'store'])->middleware(['auth']);
Route::get('/mycart', [MycartsController::class, 'index'])->middleware(['auth'])->name('mycart');
Route::delete('/mycart{id}', [MycartsController::class, 'destroy'])->middleware(['auth']);
Route::get('/mycart/payment', [MycartsController::class, 'payment'])->middleware(['auth'])->name('payment');
Route::post('/mycart/settlement', [MycartsController::class, 'settlement'])->middleware(['auth']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
