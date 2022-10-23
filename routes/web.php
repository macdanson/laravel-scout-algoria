<?php

use App\Http\Controllers\TextSearchController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [TextSearchController::class, 'index'])->name('products');
Route::post('/create-product', [TextSearchController::class, 'createProduct'])->name('createProduct');
