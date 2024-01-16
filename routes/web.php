<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginRegisterController;
use App\Models\User;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;

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
Route::get('/verification/notice', function () {
    return view('verification.notice');
})->name('verification.notice');

Route::middleware(['guest'])->group(function () {
Route::get('/', function () {
    return view('home');
});

Route::get('/auth/register', [LoginRegisterController::class, 'register'])->name('auth.register');
Route::get('/auth/registerLapangan', [LoginRegisterController::class, 'registerLapangan'])->name('auth.registerLapangan');
Route::get('/auth/login', [LoginRegisterController::class, 'login'])->name('auth.login');
});

Route::group(['middleware' => ['auth', 'checklevel:admin']], function () {

Route::get('admin/blokir', [AdminController::class, 'halBlokir'])->name('admin.blokir');
    
Route::get('admin/home', [LoginRegisterController::class, 'adminHome'])->name('admin.home');
Route::get('admin/lapangan', [AdminController::class, 'adminLapangan'])->name('admin.lapangan');
Route::get('admin/tambahLapangan', [AdminController::class, 'admintambahLapangan'])->name('admin.tambahLapangan');
Route::get('admin/tambahjLapangan', [AdminController::class, 'admintambahJLapangan'])->name('admin.tambahjLapangan');
Route::get('admin/manajemen', [AdminController::class, 'adminManajemen'])->name('admin.manajemen');
Route::get('admin/pemesanan', [AdminController::class, 'adminPemesanan'])->name('admin.pemesanan');
Route::get('admin/aProfile', [AdminController::class, 'adminaProfile'])->name('admin.aProfile');
Route::get('admin/deletePemesanan/{id}', [AdminController::class, 'deletePemesanan'])->name('admin.deletePemesanan');
Route::post('/postdeleteLapangan/{id}', [AdminController::class, 'postdeleteLapangan'])->name('postdeleteLapangan');
Route::post('konfirmasi/{id}', [AdminController::class, 'konfirmasi'])->name('konfirmasi');


Route::get('admin/editLapangan/{id}', [AdminController::class, 'editLapangan'])->name('admin.editLapangan');
Route::post('posteditLapangan/{id}', [AdminController::class, 'posteditLapangan'])->name('posteditLapangan');
Route::get('admin/tambahLapangan', [AdminController::class, 'tambahLapangan'])->name('admin.tambahLapangan');
Route::post('posttambahLapangan', [AdminController::class, 'posttambahLapangan'])->name('posttambahLapangan');
Route::post('posttambahjLapangan', [AdminController::class, 'posttambahJLapangan'])->name('posttambahjLapangan');
Route::get('admin/deleteLapangan/{id}', [AdminController::class, 'deleteLapangan'])->name('admin.deleteLapangan');

Route::get('admin/editjLapangan/{id}', [AdminController::class, 'editjLapangan'])->name('admin.editjLapangan');
Route::post('posteditjLapangan/{id}', [AdminController::class, 'posteditjLapangan'])->name('posteditjLapangan');
Route::post('admin/deletejLapangan/{id}', [AdminController::class, 'deletejLapangan'])->name('admin.deletejLapangan');
Route::post('/hapus/{id}', [AdminController::class, 'deletePemesanan'])->name('hapus');
});

Route::group(['middleware' => ['auth', 'checklevel:superadmin']], function () {
    Route::get('superadmin/home', [LoginRegisterController::class, 'superadmin'])->name('superadmin.home');
    Route::get('superadmin/dLapangan', [LoginRegisterController::class, 'superadmindLapangan'])->name('superadmin.dLapangan');
    Route::get('superadmin/dPemesan', [LoginRegisterController::class, 'superadmindPemesan'])->name('superadmin.dPemesan');
    Route::post('blokir/{id}', [AdminController::class, 'blokir'])->name('blokir');
    Route::get('/superadmin/delete/{id}', [LoginRegisterController::class, 'delete'])->name('superadmin.delete');
    Route::post('/superadmin/deletePemesan/{id}', [LoginRegisterController::class, 'deletePemesan'])->name('superadmin.deletePemesan');
    
});



Route::group(['middleware' => ['auth', 'checklevel:user']], function () {

    Route::post('ublokir/{id}', [LoginRegisterController::class, 'ublokir'])->name('ublokir');
    
Route::get('/user/home', [LoginRegisterController::class, 'userHome'])->name('user.home');
Route::get('/userLapangan/home', [LoginRegisterController::class, 'userLapanganHome'])->name('userLapangan.home');
Route::get('user/futsal', [LoginRegisterController::class, 'userFutsal'])->name('user.futsal');
Route::get('user/badminton', [LoginRegisterController::class, 'userBadminton'])->name('user.badminton');
Route::get('user/profil', [LoginRegisterController::class, 'userProfil'])->name('user.profil');
Route::get('user/booking/{id}', [LoginRegisterController::class, 'userBooking'])->name('user.booking');
Route::get('user/transaksi', [LoginRegisterController::class, 'userTransaksi'])->name('user.transaksi');
Route::get('user/buktiBooking', [LoginRegisterController::class, 'userbuktiBooking'])->name('user.buktiBooking');
Route::get('user/cetakBukti/{id}', [LoginRegisterController::class, 'usercetakBukti'])->name('user.cetakBukti');
Route::post('postPemesanan/{id}', [LoginRegisterController::class, 'postPemesanan'])->name('postPemesanan');
});




Route::post('/postRegister', [LoginRegisterController::class, 'postRegister'])->name('postRegister');
Route::post('/postRegisterLapangan', [LoginRegisterController::class, 'postRegisterLapangan'])->name('postRegisterLapangan');
Route::post('/postLogin', [LoginRegisterController::class, 'postLogin'])->name('postLogin');

Route::get('/logout', [LoginRegisterController::class, 'logout'])->name('logout');