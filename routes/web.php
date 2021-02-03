<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
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

Route::get('/login', function () {
    return view('login');
});


Route::get('/', function () {
    return view('login');
});

Route::get('admin/home', [ProductController::class, 'index'])->middleware('auth')->name('home');

Route::get('admin/home/{id}', [ProductController::class, 'destroy'])->middleware('auth');


Route::post('admin/charge', [ProductController::class, 'charge']);
Route::post('admin/sale', [ProductController::class, 'store']);//manejo de ventas del los productos

Route::get('admin/create', function () {
    return view('admin.create');
})->middleware('auth');

Route::post('admin/create', [UserController::class, 'create']);

Route::put('admin/logout', [LoginController::class, 'logout']);
//rute products


Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
