<?php

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Admin;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SuratMasukController;
use App\Http\Controllers\Admin\SuratKeluarController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\KategoriController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutPageController;
use App\Http\Controllers\AgendaPageController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// page user
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('about', [AboutPageController::class, 'index']);
Route::get('agenda', [AgendaPageController::class, 'index']);


// page administrator
Route::get('/dashboard', [DashboardController::class, 'index']);
// Profile
Route::get('profile/{id}', [ProfileController::class, 'edit']);
Route::post('profile/{id}', [ProfileController::class, 'update']);
Auth::routes();
// hak akses
Route::group(['middleware' => 'ceklevel:admin,ketua,sekretaris,humas'], function () {
    // surat masuk
    Route::prefix('surat-masuk')->group(function () {
        Route::get('/', [SuratMasukController::class, 'index'])->name('surat-masuk');
        Route::get('/detail/{id}', [SuratMasukController::class, 'detail']);
        Route::get('/insert', [SuratMasukController::class, 'insert']);
        Route::post('/store', [SuratMasukController::class, 'store']);
        Route::get('/{id}', [SuratMasukController::class, 'edit']);
        Route::post('/{id}', [SuratMasukController::class, 'update']);
        Route::delete('/{id}', [SuratMasukController::class, 'delete']);
    });
    // laporan surat-masuk
    Route::get('laporan-sm', [SuratMasukController::class, 'smReport'])->name('laporan-sm');
    Route::get('laporan-sm/print/{fromDate}/{toDate}', [SuratMasukController::class, 'print']);
    Route::post('search-sm', [SuratMasukController::class, 'sReport']);
    Route::get('laporan-sm/data/{fromDate}/{toDate}', [SuratMasukController::class, 'sReport']);

    // surat keluar
    Route::prefix('surat-keluar')->group(function () {
        Route::get('/', [SuratKeluarController::class, 'index'])->name('surat-keluar');
        Route::get('/detail/{id}', [SuratKeluarController::class, 'detail']);
        Route::get('/insert', [SuratKeluarController::class, 'insert']);
        Route::post('/store', [SuratKeluarController::class, 'store']);
        Route::get('/{id}', [SuratKeluarController::class, 'edit']);
        Route::post('/{id}', [SuratKeluarController::class, 'update']);
        Route::delete('/{id}', [SuratKeluarController::class, 'destroy']);
    });

    // laporan surat-keluar
    Route::get('laporan-sk', [SuratKeluarController::class, 'skReport'])->name('laporan-sk');
    Route::get('laporan-sk/print/{fromDate}/{toDate}', [SuratKeluarController::class, 'print']);
    Route::post('search-sk', [SuratKeluarController::class, 'sReport']);
    Route::get('laporan-sk/data/{fromDate}/{toDate}', [SuratKeluarController::class, 'sReport']);

    
    Route::get('/backup-db', function () {
        return view('admin.v_backupdb');
    });

    Route::prefix('admin')->group(function(){
        Route::prefix('users')->group(function () {
            Route::get('/', [RegisterController::class, 'index'])->name('users');
            Route::delete('/{id}', [RegisterController::class, 'destroy']);
        });
        
        Route::prefix('address')->group(function () {
            Route::get('/', [AddressController::class, 'index'])->name('address');
            Route::put('/{id}', [AddressController::class, 'update']);
        });
        
        Route::prefix('about')->group(function () {
            Route::get('/', [AboutController::class, 'index'])->name('about');
            Route::put('/{id}', [AboutController::class, 'update']);
        });
    
        Route::get('list-berita', [BeritaController::class, 'index'])->name('list-berita');
        Route::get('list-berita/edit/{id}', [BeritaController::class, 'edit']);
        Route::put('list-berita/{id}', [BeritaController::class, 'update']);
        Route::delete('berita/{id}', [BeritaController::class, 'destroy']);
        Route::get('post-berita', [BeritaController::class, 'insert']);
        Route::post('post-berita', [BeritaController::class, 'store']);
    
    
        Route::get('kategori', [KategoriController::class, 'index'])->name('kategori');
        Route::post('kategori', [KategoriController::class, 'store']);
        Route::put('kategori/{id}', [KategoriController::class, 'update']);
        Route::delete('kategori/{id}', [KategoriController::class, 'destroy']);
    
        Route:: get('agenda', [AgendaController::class, 'index'])->name('agenda');
        Route:: post('agenda', [AgendaController::class, 'store']);
        Route:: put('agenda/{id}', [AgendaController::class, 'update']);
        Route:: delete('agenda/{id}', [AgendaController::class, 'destroy']);
    });
});
