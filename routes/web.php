<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\sales\StockController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::get('stocks', [StockController::class, 'index'])->name('stocks');
    Route::post('searchProduct', [StockController::class, 'searchProduct'])->name('product.search');
    Route::post('updateProduct', [StockController::class, 'updateProduct'])->name('product.update');
    Route::get('showProduct/{id}', [StockController::class, 'showProduct'])->name('product.show');
});
