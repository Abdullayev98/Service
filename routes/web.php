<?php

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostResourceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource('posts', PostResourceController::class);

Route::get('/register', [UserController::class, 'index'])->name('reg')->middleware('backisnot');
Route::get('/login', [UserController::class, 'show'])->name('login')->middleware('backisnot');

Route::post('/signup', [UserController::class, 'registration']);
Route::post('/signin', [UserController::class, 'login']);

Route::get('/currency', [CurrencyController::class, 'getCur'])->name('currency');


Route::middleware('auth')->group(function () {
    Route::get('/', [PostController::class, 'index'])->middleware('backisnot');
    Route::get('/create', [PostController::class, 'create']);
    Route::post('/create', [PostController::class, 'store']);
    Route::get('/edit/{id}', [PostController::class, 'edit']);
    Route::put('/update/{id}', [PostController::class, 'update']);
    Route::delete('/delete/{id}', [PostController::class, 'destroy']);
    Route::delete('/deleteimage/{id}', [PostController::class, 'deleteimage']);
    Route::delete('/deletecover/{id}', [PostController::class, 'deletecover']);
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});

// Route::get('/products', function () {
//     return view('products.products');
// });
Route::get('/products', [ProductController::class, 'index']);
Route::post('/add-products', [ProductController::class, 'addProduct'])->name('addProduct');
