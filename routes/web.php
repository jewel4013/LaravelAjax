<?php

use App\Http\Controllers\productControl;
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

Route::get('/', [productControl::class, 'index'])->name('product');
Route::post('/add-product', [productControl::class, 'store'])->name('porductStore');
Route::post('/update-product', [productControl::class, 'update'])->name('porductUpdate');
Route::post('/delete-product', [productControl::class, 'destroy'])->name('porductDelete');
