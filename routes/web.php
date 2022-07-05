<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseGuruController;
use App\Http\Controllers\CourseSiswaController;
use App\Http\Controllers\CScontroller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailKelasController;
use App\Http\Controllers\EnrollmenController;
use App\Http\Controllers\ExportUsers;
use App\Http\Controllers\importSiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\MateriSiswaController;
use App\Http\Controllers\ModuleDetailController;
use App\Http\Controllers\ModuleSiswaController;
use App\Http\Controllers\moduletugasController;
use App\Http\Controllers\ModuletugasControllerSiswa;
use App\Http\Controllers\MyCourseController;
use App\Http\Controllers\MycourseSiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SelfenrollController;
use App\Http\Controllers\SubmissionSiswaController;
use App\Http\Controllers\TambahGuruController;
use App\Http\Controllers\TambahMateriController;
use App\Http\Controllers\TambahSiswaController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\TugasSiswaController;
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
    Route::post('/editgambar/{id}', [Profilecontroller::class, 'editgambar'])->name('updateFotoProses');
    Route::post('/profile/editprofile/{id}', [Profilecontroller::class, 'update'])->name('updateProfileProses');
    Route::post('/profile/editpassword/{id}', [Profilecontroller::class, 'updatePassword'])->name('updatePasswordProses');
    Route::get('/download-materi/{id}', [MateriController::class, 'download'])->name('download-materi');
    Route::get('/download-tugas/{id}', [TugasController::class, 'download'])->name('download-tugas');
    Route::get('/download-submissions/{id}', [SubmissionSiswaController::class, 'download'])->name('download-subs');
});

Route::middleware(['auth', "userAccess:student"])->group(function () {
    Route::get('/course/siswa', [CourseSiswaController::class, 'index'])->name('siswacourse');
    Route::get('/detailcourse/{id}', [SelfenrollController::class, 'index'])->name('detail-course');
    Route::post('/enroll-proses/{id}', [SelfenrollController::class, 'enroll'])->name('proses-enroll');
    Route::get('/module-siswa/{id}', [ModuleSiswaController::class, 'index'])->name('module-siswa');
    Route::get('/module-detail/{id}/{week}', [ModuleDetailController::class, 'show'])->name('module-detail');
    Route::get('/moduletugas/siswa/{id}', [ModuletugasControllerSiswa::class, 'index'])->name('moduletugas');

    Route::get('/detail-materi-siswa/{id}', [MateriSiswaController::class, 'show'])->name('detail-materi-siswa');
    Route::get('/detail-tugas-siswa/{id}', [TugasSiswaController::class, 'show'])->name('detail-tugas-siswa');

    //add submissions
    Route::post('/add-submission', [SubmissionSiswaController::class, 'add'])->name('add-submission');
    Route::get('/delete-subs/{id}', [SubmissionSiswaController::class, 'delete'])->name('delete-submission');
});

Route::middleware(['auth', "userAccess:teacher"])->group(function () {
    Route::get('/my-course', [CourseGuruController::class, 'index'])->name('mycourse');
    // Route::post('/add-courses-old', [MyCourseController::class, 'store']);
    // Route::get('/reset-course/{id}', [EnrollmenController::class, 'reset'])->name('delete-course');

    Route::get('/moduletugas/{id}', [moduletugasController::class, 'index'])->name('moduletugas');
    Route::get('/add-materi/{id}', [MateriController::class, 'index'])->name('add-materi');
    Route::post('/proses-add-materi', [MateriController::class, 'store'])->name('add-materi-proses');
    Route::get('/detail-materi/{id}', [MateriController::class, 'show'])->name('detail-materi');


    Route::get('/add-tugas/{id}', [TugasController::class, 'index'])->name('add-tugas');
    Route::post('/proses-add-tugas', [TugasController::class, 'store'])->name('add-tugas-proses');
    Route::get('/detail-tugas/{id}', [TugasController::class, 'show'])->name('detail-tugas');
    Route::get('/delete-tugas/{id}', [TugasController::class, 'delete'])->name('delete-tugas');
    Route::post('/nilai', [TugasController::class, 'nilai'])->name('nilai-tugas');
    Route::get('/edit-tugas/{id}', [TugasController::class, 'Showupdate'])->name('edit-tugas');
    Route::post('/proses-edit-tugas/{id}', [TugasController::class, 'edit'])->name('edit-tugas-proses');

    Route::get('/edit-materi/{id}', [MateriController::class, 'Showupdate'])->name('edit-materi');
    Route::post('/proses-edit-materi/{id}', [MateriController::class, 'edit'])->name('edit-materi-proses');
    Route::get('/delete-materi/{id}', [MateriController::class, 'delete'])->name('delete-materi');


    // Route::get('/delete-course/{id}', [MyCourseController::class, 'delete'])->name('delete-course');
    // Route::post('/edit-course', [MyCourseController::class, 'update'])->name('edit-course');
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
    Route::post('/change_status', [AdminController::class, 'changeStatus'])->name('changeStatus');
    // kelas
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas');
    Route::post('/add-kelas', [KelasController::class, 'store'])->name('add-kelas');
    Route::post('/edit-kelas/{id}', [KelasController::class, 'edit'])->name('edit-kelas');
    Route::get('/hapus-kelas/{id}', [KelasController::class, 'destroy'])->name('hapus-kelas');
    Route::get('/auto-search', [DetailKelasController::class, 'findNama'])->name('auto-search');
    Route::get('detail-kelas/{id}', [DetailKelasController::class, 'index'])->name('detail-kelas');
    // Matapelajaran
    Route::get('/mapel', [MapelController::class, 'index'])->name('mapel');
    Route::post('/add-mapel', [MapelController::class, 'store'])->name('add-mapel');
    Route::post('/edit-mapel/{id}', [MapelController::class, 'edit'])->name('edit-mapel');
    //course
    Route::get('/course', [CourseController::class, 'index'])->name('course');
    Route::post('/add-course', [CourseController::class, 'store'])->name('add-course');
    Route::post('/edit-course/{id}', [CourseController::class, 'update'])->name('edit-course');
    Route::get('/delete-course/{id}', [CourseController::class, 'delete'])->name('delete-course');

    Route::post('/add-siswa-kelas', [DetailKelasController::class, 'store'])->name('add-siswa-kelas');
    Route::get('/delete-siswa-kelas/{id}', [DetailKelasController::class, 'delete'])->name('delete-siswa-kelas');


    Route::get('/Tambah-siswa', [TambahSiswaController::class, 'index'])->name('addSiswa');
    Route::get('/Tambah-guru', [TambahGuruController::class, 'index'])->name('addGuru');
    Route::post('/Tambah-guru-proses', [TambahGuruController::class, 'store'])->name('addGuruProses');
    Route::post('/Tambah-siswa-proses', [TambahSiswaController::class, 'store'])->name('addSiswaProses');
});
