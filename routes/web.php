<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CScontroller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnrollmenController;
use App\Http\Controllers\ExportUsers;
use App\Http\Controllers\importSiswaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ModuleDetailController;
use App\Http\Controllers\ModuleSiswaController;
use App\Http\Controllers\moduletugasController;
use App\Http\Controllers\MyCourseController;
use App\Http\Controllers\MycourseSiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SelfenrollController;
use App\Http\Controllers\TambahGuruController;
use App\Http\Controllers\TambahMateriController;
use App\Http\Controllers\TambahSiswaController;
use App\Imports\ImportTeacher;
use App\Imports\ImportUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

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
Route::middleware(['auth', "userAccess:student,teacher"])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/cs', [CScontroller::class, 'index'])->name('cs');
    Route::post('/profile/editprofile/{id}', [Profilecontroller::class, 'update'])->name('updateProfileProses');    Route::post('/profile/editpassword/{id}', [Profilecontroller::class, 'updatePassword'])->name('updatePasswordProses');

});

Route::middleware(['auth', "userAccess:student"])->group(function () {
    Route::get('/course', [CourseController::class, 'index'])->name('course');
    Route::get('/mycourse', [MycourseSiswaController::class, 'index'])->name('siswacourse');
    Route::get('/detailcourse/{id}', [SelfenrollController::class, 'index'])->name('detail-course');
    Route::post('/enroll-proses/{id}', [SelfenrollController::class, 'enroll'])->name('proses-enroll');
    Route::get('/module-siswa/{id}', [ModuleSiswaController::class, 'index'])->name('module-siswa');
    Route::get('/module-detail/{id}/{week}', [ModuleDetailController::class, 'show'])->name('module-detail');
});

Route::middleware(['auth', "userAccess:teacher"])->group(function () {
    Route::get('/my-course', [MyCourseController::class, 'index'])->name('mycourse');
    Route::post('/add-course', [MyCourseController::class, 'store'])->name('add-course');
    Route::get('/reset-course/{id}', [EnrollmenController::class, 'reset'])->name('delete-course');

    Route::get('/add-materi/{id}/{week}', [MateriController::class, 'index'])->name('add-materi');
    Route::post('/add-materi-proses/{id}', [MateriController::class, 'store'])->name('add-materi-proses');
    Route::get('/materi/{id}/{week}', [MateriController::class, 'show'])->name('materi');
    Route::get('/delete-materi/{id}', [MateriController::class, 'delete'])->name('delete-materi');

    Route::get('/moduletugas/{id}', [moduletugasController::class, 'index'])->name('moduletugas');
    Route::post('/enroll', [EnrollmenController::class, 'store'])->name('enroll');

    Route::get('/delete-course/{id}', [MyCourseController::class, 'delete'])->name('delete-course');
    Route::post('/edit-course', [MyCourseController::class, 'update'])->name('edit-course');
});

Route::middleware(['auth', "userAccess:admin"])->group(function () {

    // Import siswa dan guru
    Route::post('/import-siswa', function () {
        Excel::import(new ImportUser, request()->file('file'));
        return back();
    })->name('import-siswa');
    Route::post('/import-guru', function () {
        Excel::import(new ImportTeacher, request()->file('file'));
        return back();
    })->name('import-guru');

    // export Siswa dan guru
    Route::get('/expot-siswa', [ExportUsers::class, 'exportsiswa'])->name('export-siswa');
    Route::get('/expot-guru', [ExportUsers::class, 'exportguru'])->name('export-guru');
    
    Route::get('/list-siswa', [AdminController::class, 'listsiswa'])->name('list-siswa');
    Route::get('/delete-siswa/{id}', [AdminController::class, 'deletesiswa'])->name('delete-siswa');

    Route::get('/list-guru', [AdminController::class, 'listguru'])->name('list-guru');
    Route::get('/delete-guru/{id}', [AdminController::class, 'deleteguru'])->name('delete-guru');

    Route::get('/Tambah-siswa', [TambahSiswaController::class, 'index'])->name('addSiswa');
    Route::get('/Tambah-guru', [TambahGuruController::class, 'index'])->name('addGuru');
    Route::post('/Tambah-guru-proses', [TambahGuruController::class, 'store'])->name('addGuruProses');
    Route::post('/Tambah-siswa-proses', [TambahSiswaController::class, 'store'])->name('addSiswaProses');

});
