<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;


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
//     return view('admin.index');
// });
Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/tambah', [AdminController::class, 'tambah'])->name('admin.tambah');
    Route::get('/admin/hapus/{id}', [AdminController::class, 'hapus'])->name('admin.hapus');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::get('/admin/list', [AdminController::class, 'listpack'])->name('admin.listpack');
    Route::get('/admin/order', [AdminController::class, 'order'])->name('admin.order');
    Route::get('/admin/selesai/{id}', [Home::class, 'selesai'])->name('admin.selesai');
    Route::patch('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::post('/admin/package', [AdminController::class, 'store']);
});


Route::patch('/bukti/{id}', [Home::class, 'bukti']);
Route::patch('/aproved/{id}', [Home::class, 'bukti2']);
Route::post('/order', [Home::class, 'orda']);
Route::get('/', [Home::class, 'index'])->name('home.index');
Route::get('/invoice/{id}', [Home::class, 'invoice'])->name('invoice');
Route::get('/checking/{kode}', [Home::class, 'check'])->name('check');
Route::get('/package', [Home::class, 'paket'])->name('home.paket');
Route::get('/detail/{id}', [Home::class, 'detail'])->name('home.detail');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
