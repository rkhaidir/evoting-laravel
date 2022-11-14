<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CalonController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPemilihController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\PemilihController;
use App\Http\Controllers\PemilihLoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\VoteController;
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
  return view('index');
});

Route::get('/admin/beranda', [DashboardController::class, 'index'])->name('beranda')->middleware('auth');
Route::resource('/admin/calon', CalonController::class, ['names' => [
  'index' => 'admin.calon.index',
  'create' => 'admin.calon.create',
  'show' => 'admin.calon.show',
  'edit' => 'admin.calon.edit',
]])->middleware('auth');

Route::resource('/admin/pemilih', PemilihController::class, ['names' => [
  'index' => 'admin.pemilih.index',
  'create' => 'admin.pemilih.create',
  'edit' => 'admin.pemilih.edit',
]])->middleware('auth');
Route::put('admin/pemilih/verifikasi/{id}', [PemilihController::class, 'verifikasi'])->middleware('auth');
Route::post('admin/pemilih/import', [PemilihController::class, 'import'])->middleware(('admin'));

Route::resource('admin/administrator', AdminUserController::class, ['names' => [
  'index' => 'admin.administrator.index',
  'create' => 'admin.administrator.create'
]])->middleware('admin');
Route::put('admin/administrator/reset/{id}', [AdminUserController::class, 'reset'])->middleware('admin');

Route::get('admin/profil', [ProfilController::class, 'index'])->name('profil')->middleware('auth');
Route::put('admin/profil/update/{id}', [ProfilController::class, 'update'])->middleware('auth');

Route::get('admin/votes', [VoteController::class, 'index'])->name('votes')->middleware('admin');
Route::get('admin/export', [VoteController::class, 'export'])->middleware('admin');

Route::get('/admin', [LoginAdminController::class, 'index'])->name('login');
Route::post('/login', [LoginAdminController::class, 'authenticate']);
Route::post('/logout', [LoginAdminController::class, 'logout']);

Route::get('/pemilih', [PemilihLoginController::class, 'index']);
Route::post('/pemilih/login', [PemilihLoginController::class, 'authenticate']);
Route::get('/pemilih/dashboard', [DashboardPemilihController::class, 'index'])->name('dashboard')->middleware('pemilih');
Route::post('/pemilih/vote', [DashboardPemilihController::class, 'vote'])->name('dashboard')->middleware('pemilih');
