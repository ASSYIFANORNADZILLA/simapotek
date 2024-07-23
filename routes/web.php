<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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

//dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Obat
Route::get('/obat', [ObatController::class, 'getObat'])->middleware(['auth'])->name('obat');
Route::get('/obat/create', [ObatController::class, 'createObat'])->middleware(['auth'])->name('create_obat');
Route::post('/obat', [ObatController::class, 'insertObat'])->middleware(['auth'])->name('insert_obat');
Route::get('/obat/{obat_id}/edit', [ObatController::class, 'showFormUpdate'])->middleware(['auth'])->name('edit_obat');
Route::patch('/obat/{obat_id}', [ObatController::class, 'updateObat'])->middleware(['auth'])->name('update_obat');
Route::delete('/obat/{obat_id}', [ObatController::class, 'deleteObat'])->middleware(['auth'])->name('delete_obat');

// Pegawai
Route::get('/getPegawai', [PegawaiController::class, 'getPegawai'])->middleware(['auth'])->name('pegawai.getPegawai');
Route::get('/create-pegawai', [PegawaiController::class, 'createPegawai'])->middleware(['auth'])->name('create');
Route::post('/insert-pegawai', [PegawaiController::class, 'insertPegawai'])->middleware(['auth'])->name('insert');
Route::get('/update-pegawai/{pegawai_id}', [PegawaiController::class, 'showFormUpdate'])->middleware(['auth'])->name('update');
Route::patch('/save-pegawai/{pegawai_id}', [PegawaiController::class, 'updatePegawai'])->middleware(['auth'])->name('save');
Route::delete('/delete-pegawai/{pegawai_id}', [PegawaiController::class, 'deletePegawai'])->middleware(['auth'])->name('delete');

Route::get('/', function () {
    return view('auth/login');
});

//Pemasok
Route::get('/pegawai', [PegawaiController::class, 'getPegawai'])->middleware(['auth'])->middleware(['auth'])->name('pegawai');
Route::get('/pemasok', [PemasokController::class, 'getPemasok'])->middleware(['auth'])->middleware(['auth'])->name('pemasok');
Route::get('/create-pemasok', [PemasokController::class, 'createPemasok'])->middleware(['auth'])->name('create_pemasok');
Route::post('/insert-pemasok', [PemasokController::class, 'insertPemasok'])->middleware(['auth'])->name('insert_pemasok');
Route::get('/update-pemasok/{pemasok_id}', [PemasokController::class, 'showFormUpdate'])->middleware(['auth'])->name('update_pemasok');
Route::patch('/save-pemasok/{pemasok_id}', [PemasokController::class, 'updatePemasok'])->middleware(['auth'])->name('save_pemasok');
Route::delete('/delete-pemasok/{pemasok_id}', [PemasokController::class, 'deletePemasok'])->middleware(['auth'])->name('delete_pemasok');

// Kategori
Route::get('/kategori', [KategoriController::class, 'index'])->middleware(['auth'])->name('kategori.index');
Route::get('/create-kategori', [KategoriController::class, 'createKategori'])->middleware(['auth'])->name('create_kategori');
Route::post('/insert-kategori', [KategoriController::class, 'insertKategori'])->middleware(['auth'])->name('insert_kategori');
Route::get('/update-kategori/{kategori_id}', [KategoriController::class, 'showFormUpdate'])->middleware(['auth'])->name('update_kategori');
Route::patch('/save-kategori/{kategori_id}', [KategoriController::class, 'updateKategori'])->middleware(['auth'])->name('save_kategori');
Route::delete('/delete-kategori/{kategori_id}', [KategoriController::class, 'deleteKategori'])->middleware(['auth'])->name('delete_kategori');

//Penjualan
Route::get('penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
Route::get('penjualan/create', [PenjualanController::class, 'create'])->name('penjualan.create');
Route::post('penjualan', [PenjualanController::class, 'store'])->name('penjualan.store');
Route::get('penjualan/{penjualan}/edit', [PenjualanController::class, 'edit'])->name('penjualan.edit');
Route::patch('penjualan/{penjualan}', [PenjualanController::class, 'update'])->name('penjualan.update');
Route::delete('penjualan/{penjualan}', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');

//route
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
    // route lain yang membutuhkan akses admin
});
//
Route::resource('users', UserController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';