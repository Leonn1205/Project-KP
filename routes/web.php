<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TempatWisataController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/wisata/create', [TempatWisataController::class, 'create'])->name('wisata.create');
Route::post('/wisata', [TempatWisataController::class, 'store'])->name('wisata.store');
Route::get('/api/wisata', [TempatWisataController::class, 'api'])->name('wisata.api');

Route::get('/peta', function () {
    return view('peta.index');
})->name('peta.index');

Route::get('/tempat', function () {
    return view('tempat.index');
})->name('tempat.index');

Route::get('/dashboard_user', function () {
    return view('dashboard_user');
});


