<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Sales\StockController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\GalleryController;
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

Route::get('/home-admin', [HomeController::class, 'index'])->name('home');

Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::post('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('gallery', GalleryController::class);
    Route::get('product/select', [ProductController::class, 'selectProduct'])->name('product.select');
    Route::post('productExport', [ProductController::class, 'export'])->name('product.export');
    Route::post('productShowDate', [ProductController::class, 'showProduct'])->name('product.showDate');
    Route::get('stocks', [StockController::class, 'index'])->name('stocks');
    Route::post('searchProduct', [StockController::class, 'searchProduct'])->name('product.search');
    Route::post('updateProduct', [StockController::class, 'updateProduct'])->name('product.update');
    Route::get('showProduct/{id}', [StockController::class, 'showProduct'])->name('product.show');
    Route::get('product/import', [ProductController::class, 'importProduct'])->name('product.import');
    Route::post('product/import/store', [ProductController::class, 'importProductStore'])->name('product.import.store');

    Route::get('image', [ImageController::class, 'index'])->name('images');
    Route::get('image/upload', [ImageController::class, 'upload'])->name('images.upload');
    Route::post('image/upload/store', [ImageController::class, 'uploadStore'])->name('images.upload.store');
    Route::post('image/upload/delete', [ImageController::class, 'uploadDestory'])->name('images.upload.destroy');
});
