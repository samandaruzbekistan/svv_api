<?php

use App\Http\Controllers\AdminConrtoller;
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

Route::view('/', 'login')->name('admin_login');
Route::post('auth', [AdminConrtoller::class, 'auth'])->name('adminAuth');

Route::middleware(['admin_role'])->group(function () {
    Route::get('home', [AdminConrtoller::class,'home'])->name('home');
    Route::post('add-new', [AdminConrtoller::class, 'add'])->name('add');
});
