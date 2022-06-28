<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TambahGuruController;
use App\Http\Controllers\TambahSiswaController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/login', [LoginController::class, 'index'])->middleware("guest")->name('login');
Route::post('/login-proses', [LoginController::class, 'authentikasi'])->name('login-post');


Route::middleware(['auth', "userAccess:student,teacher,admin"])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [LoginController::class, 'Logout'])->name('logout');

});

Route::middleware(['auth', "userAccess:student"])->group(function () {
    Route::get('/student', function () {
        return "student";
    });
});

Route::middleware(['auth', "userAccess:teacher"])->group(function () {
    Route::get('/teacher', function () {
        return "teacher";
    });
});

Route::middleware(['auth', "userAccess:admin"])->group(function () {


    Route::get('/list-siswa', [AdminController::class, 'listsiswa'])->name('list-siswa');
    Route::get('/delete-siswa/{id}', [AdminController::class, 'deletesiswa'])->name('delete-siswa');

    Route::get('/list-guru', [AdminController::class, 'listguru'])->name('list-guru');
    Route::get('/delete-guru/{id}', [AdminController::class, 'deleteguru'])->name('delete-guru');


    Route::get('/Tambah-siswa', [TambahSiswaController::class, 'index'])->name('addSiswa');
    Route::get('/Tambah-guru', [TambahGuruController::class, 'index'])->name('addGuru');
    Route::post('/Tambah-guru-proses', [TambahGuruController::class, 'store'])->name('addGuruProses');
    Route::post('/Tambah-siswa-proses', [TambahSiswaController::class, 'store'])->name('addSiswaProses');

});
