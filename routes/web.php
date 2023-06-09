<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\SupplierController;
use App\Models\Supplier;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/kategori/data', [KategoriController::class, 'data']) ->name('kategori.data');
    Route::resource('/kategori', KategoriController::class );

    Route::get('/produk/data', [ProdukController::class, 'data']) ->name('produk.data');
    Route::post('/produk/delete-selected', [ProdukController::class, 'deleteSelected']) ->name('produk.delete_selected');
    Route::post('/produk/cetak-barcode', [ProdukController::class, 'cetakBarcode']) ->name('produk.cetak_barcode');
    Route::resource('/produk', ProdukController::class );

    Route::get('/member/data', [MemberController::class, 'data']) ->name('member.data');
    Route::resource('/member', MemberController::class );
    Route::post('/member/cetak-member', [MemberController::class, 'cetakMember']) ->name('member.cetak_member');

    Route::get('/supplier/data', [SupplierController::class, 'data']) ->name('supplier.data');
    Route::resource('/supplier', SupplierController::class );

    Route::get('/pengeluaran/data', [PengeluaranController::class, 'data']) ->name('pengeluaran.data');
    Route::resource('/pengeluaran', PengeluaranController::class );
});
