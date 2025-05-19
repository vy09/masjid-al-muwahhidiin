<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\KegiatanMasjidController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\DasbordController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\KategoriTransaksiController;
use App\Http\Controllers\KegiatanJumatController;
use Illuminate\Support\Facades\Http;

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

Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::get('/jadwal-sholat', function () {
    $depok_id = 1225; // Depok
    $date = now()->format('Y-m-d');
    $url = "https://api.myquran.com/v2/sholat/jadwal/$depok_id/$date";

    $response = Http::get($url);

    if ($response->successful() && isset($response->json()['data'])) {
        return response()->json($response->json()['data']);
    }

    return response()->json(['error' => 'Gagal mengambil jadwal sholat'], 500);
});
//homepage
Route::get('/about', [HomepageController::class, 'about'])->name('about');
Route::get('/remajamasjid', [HomepageController::class, 'remajamasjid'])->name('remajamasjid');
Route::get('/visimisi', [HomepageController::class, 'visimisi'])->name('visimisi');
Route::get('/transaction', [HomepageController::class, 'transaction'])->name('transaction');
Route::get('/eventmasjid', [HomepageController::class, 'eventmasjid'])->name('eventmasjid');
Route::get('/eventjumat', [HomepageController::class, 'eventjumat'])->name('eventjumat');


Route::get('/dashboard', [DasbordController::class, 'index'])->name('newdashboard')->middleware('auth');
Route::get('/chart-data', [TransaksiController::class, 'chartData']);


Route::get('/tables', function () {
    return view('tables');
})->name('tables')->middleware('auth');

Route::get('/RTL', function () {
    return view('RTL');
})->name('RTL')->middleware('auth');

Route::get('/profile', function () {
    return view('account-pages.profile');
})->name('profile')->middleware('auth');

Route::get('/sign-in', function () {
    return view('account-pages.signin');
})->name('sign-in');

Route::get('/sign-up', function () {
    return view('account-pages.signup');
})->name('sign-up')->middleware('guest');

Route::get('/sign-up', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('sign-up');

Route::post('/sign-up', [RegisterController::class, 'store'])
    ->middleware('guest');

Route::get('/sign-in', [LoginController::class, 'create'])
    ->middleware('guest')
    ->name('sign-in');

Route::post('/sign-in', [LoginController::class, 'store'])
    ->middleware('guest');

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'store'])
    ->middleware('guest');

Route::get('/laravel-examples/user-profile', [ProfileController::class, 'index'])->name('users.profile')->middleware('auth');
Route::put('/laravel-examples/user-profile/update', [ProfileController::class, 'update'])->name('users.update')->middleware('auth');

// User Management
Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('auth');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->middleware('auth');
Route::post('/users', [UserController::class, 'store'])->name('users.store')->middleware('auth');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show')->middleware('auth');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update')->middleware('auth');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('auth');

// Role User
Route::get('/roles', [RoleController::class, 'index'])->name('roles.index')->middleware('auth');
Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create')->middleware('auth');
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store')->middleware('auth');
Route::get('/roles/{id}', [RoleController::class, 'show'])->name('roles.show')->middleware('auth');
Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit')->middleware('auth');
Route::put('/roles/{id}', [RoleController::class, 'update'])->name('roles.update')->middleware('auth');
Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy')->middleware('auth');

// Keuangan
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index')->middleware('auth');
Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create')->middleware('auth');
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store')->middleware('auth');
Route::get('/transaksi/{id}', [TransaksiController::class, 'show'])->name('transaksi.show')->middleware('auth');
Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit')->middleware('auth');
Route::put('/transaksi/{id}', [TransaksiController::class, 'update'])->name('transaksi.update')->middleware('auth');
Route::delete('/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy')->middleware('auth');

// Kategori Transaksi
Route::get('/kategori_transaksi', [KategoriTransaksiController::class, 'index'])->name('kategoriTransaksi.index')->middleware('auth');
Route::get('/kategori_transaksi/create', [KategoriTransaksiController::class, 'create'])->name('kategoriTransaksi.create')->middleware('auth');
Route::post('/kategori_transaksi', [KategoriTransaksiController::class, 'store'])->name('kategoriTransaksi.store')->middleware('auth');
Route::get('/kategori_transaksi/{id}/edit', [KategoriTransaksiController::class, 'edit'])->name('kategoriTransaksi.edit')->middleware('auth');
Route::put('/kategori_transaksi/{id}', [KategoriTransaksiController::class, 'update'])->name('kategoriTransaksi.update')->middleware('auth');
Route::delete('/kategori_transaksi/{id}', [KategoriTransaksiController::class, 'destroy'])->name('kategoriTransaksi.destroy')->middleware('auth');

//buttondownloadlaporan
Route::get('/laporan/bulanan/download', [TransaksiController::class, 'downloadPdf'])->name('laporan.bulanan.download');
// Kegiatan Masjid
Route::get('/kegiatan', [KegiatanMasjidController::class, 'index'])->name('kegiatan.index')->middleware('auth');
Route::get('/kegiatan/create', [KegiatanMasjidController::class, 'create'])->name('kegiatan.create')->middleware('auth');
Route::post('/kegiatan', [KegiatanMasjidController::class, 'store'])->name('kegiatan.store')->middleware('auth');
Route::get('/kegiatan/{id}', [KegiatanMasjidController::class, 'show'])->name('kegiatan.show')->middleware('auth');
Route::get('/kegiatan/{id}/edit', [KegiatanMasjidController::class, 'edit'])->name('kegiatan.edit')->middleware('auth');
Route::put('/kegiatan/{id}', [KegiatanMasjidController::class, 'update'])->name('kegiatan.update')->middleware('auth');
Route::delete('/kegiatan/{id}', [KegiatanMasjidController::class, 'destroy'])->name('kegiatan.destroy')->middleware('auth');
// Kegiatan Jumat
Route::get('/jumat', [KegiatanJumatController::class, 'index'])->name('jumat.index')->middleware('auth');
Route::get('/jumat/create', [KegiatanJumatController::class, 'create'])->name('jumat.create')->middleware('auth');
Route::post('/jumat', [KegiatanJumatController::class, 'store'])->name('jumat.store')->middleware('auth');
Route::get('/jumat/{id}', [KegiatanJumatController::class, 'show'])->name('jumat.show')->middleware('auth');
Route::get('/jumat/{id}/edit', [KegiatanJumatController::class, 'edit'])->name('jumat.edit')->middleware('auth');
Route::put('/jumat/{id}', [KegiatanJumatController::class, 'update'])->name('jumat.update')->middleware('auth');
Route::delete('/jumat/{id}', [KegiatanJumatController::class, 'destroy'])->name('jumat.destroy')->middleware('auth');

Route::get('/dashboard/jumat', [KegiatanJumatController::class, 'dashboard'])->name('dashboard.jumat')->middleware('auth');
Route::get('/dashboard/kegiatan', [KegiatanMasjidController::class, 'event'])->name('dashboard.event')->middleware('auth');
