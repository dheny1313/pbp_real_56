<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cbarang;
use App\Http\Controllers\Cbooks;
use App\Http\Controllers\Cdashboard;
use App\Http\Controllers\Clogin;
use App\Http\Controllers\Csuplier;
use App\Http\Controllers\Cpembeli;
use App\Http\Controllers\Cpesanan;
use App\Http\Controllers\Cuser;
use App\Http\Controllers\Cpembelian;
use App\Http\Controllers\Cnote;
use App\Http\Controllers\Cdoa;
use App\Http\Controllers\Ckamus;
use App\Models\Mdashboard;
use Illuminate\Contracts\Filesystem\Cloud;

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

// Route::get('/', function () {
//     return view('welcome');
// });


//route home
// Route::get('home', function () {
//     return view('welcome');
// })->name("home");

// route ke
// Route::get('/', [Cdashboard::class, "index"])->name("home");

//route mildware atau buat login
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [Clogin::class, 'index'])->name('login');
    Route::post('/login', [Clogin::class, 'login_proses'])->name('login_proses');

    // registrasi
    Route::get('/registrasi', [Clogin::class, 'registrasi'])->name('registrasi');
    Route::post('/registrasi', [Clogin::class, 'registrasi_simpan'])->name('registrasi_simpan');
});



Route::middleware(['auth'])->group(function () {

    Route::get('/', [Cdashboard::class, 'index'])->name('home');
    Route::get('/logout', [Clogin::class, 'logout'])->name('logout');
    Route::get('/dashboard', [Cdashboard::class, "index"])->name("dashboard");
    //router resource 
    //route::resorce("nama", Controller::semua_class);
    Route::resource("barang", Cbarang::class)->except(['show']);
    Route::get('/barang/cetak', [Cbarang::class, 'cetak'])->name('barang.cetak');
    Route::get('/barang/export_excel', [Cbarang::class, 'export_excel'])->name("barang.excel");

    Route::resource("suplier", Csuplier::class)->except(['show']);
    Route::get('/suplier/cetak', [Csuplier::class, 'cetak'])->name('suplier.cetak');
    Route::get('/suplier/export_excel', [Csuplier::class, 'export_excel'])->name('suplier.export_excel');


    //pembeli route empety
    Route::get('/pembeli', [Cpembeli::class, "tampil"])->name("pembeli.tampil");
    Route::get("/pembeli/tambah_data", [Cpembeli::class, "tambah"])->name("pembeli.tambah_data");
    Route::post('/pembeli/simpan', [Cpembeli::class, "simpan"])->name("pembeli.simpan_data");
    Route::get('/pembeli/edit/{id_pembeli}', [Cpembeli::class, "edit"])->name("pembeli_edit");
    Route::put('/pembeli/edit_simpan/{id_pembeli}', [Cpembeli::class, "simpan_edit"])->name("pembeli.simpan_data_update");
    Route::delete('pembeli/hapus/{id_pembeli}', [Cpembeli::class, "hapus"])->name("pembeli.hapus");
    Route::get('/pembeli/cetak', [Cpembeli::class, "cetak"])->name("pembeli.cetak");
    Route::get('/pembeli/excel', [Cpembeli::class, "excel"])->name("pembeli.excel");

    // note route empety
    Route::get('/notes', [Cnote::class, "index"])->name("note.index");
    Route::get('/note/tambah_data', [Cnote::class, "tambah"])->name("note.tambah");
    Route::post('/note/simpan', [Cnote::class, "simpan"])->name("note.simpan");
    Route::get('/note/edit/{id}', [Cnote::class, "edit"])->name("note.edit");
    Route::put('/note/edit_simpan/{id}', [Cnote::class, "simpan_edit"])->name("note.simpan_edit");
    Route::delete('/note/hapus/{id}', [Cnote::class, "hapus"])->name("note.hapus");


    Route::middleware(['cek_level:admin'])->group(function () {
        //usser __________ router empety user
        Route::get('/user', [Cuser::class, 'tampil'])->name("user.tampil");
        Route::get('/user/tambah', [Cuser::class, 'tambah'])->name('user.tambah');
        Route::post('/user/simpan', [Cuser::class, 'simpan'])->name('user.simpan');
        Route::get('/user/edit/{id}', [Cuser::class, 'edit'])->name('user.edit');
        Route::put('/user/edit_simpan/{id}', [Cuser::class, 'simpan_edit'])->name('user.simpan_edit');
        Route::delete('/user/hapus/{id}', [Cuser::class, 'hapus'])->name('user.hapus');
        Route::get('/user/cetak', [Cuser::class, 'cetak'])->name("user.cetak");
        Route::get('/user/cetak/{id}', [Cuser::class, 'cetak_user'])->name("user.cetak_user");
    });

    //pesanan
    Route::get('/pesanan', [Cpesanan::class, "tampil"])->name("pesanan.tampil");
    Route::get('/pesanan/tambah', [Cpesanan::class, "tambah"])->name("pesanan.tambah");
    Route::post('/pesanan/simpan', [Cpesanan::class, "simpan"])->name("pesanan.simpan");
    Route::get('/pesanan/edit/{id_pesanan}', [Cpesanan::class, "edit"])->name("pesanan.edit");
    Route::put('/pesanan/edit_simpan/{id_pesanan}', [Cpesanan::class, "simpan_edit"])->name("pesanan.simpan_edit");
    Route::delete('/pesanan/hapus/{id_pesanan}', [Cpesanan::class, "hapus"])->name("pesanan.hapus");
    // route cetak ini buat cetak smeua dan filter by tgl
    Route::get('/pesanan/cetak', [Cpesanan::class, "cetak"])->name("pesanan.cetak");
    Route::get('/pesanan/cetak_excel', [Cpesanan::class, "cetak_excel"])->name("pesanan.cetak_excel");


    // pembelian
    Route::get('/pembelian', [Cpembelian::class, "tampil"])->name("pembelian.tampil");
    Route::get('/pembelian/tambah', [Cpembelian::class, "tambah"])->name("pembelian.tambah");
    Route::post('/pembelian/simpan', [Cpembelian::class, "simpan"])->name("pembelian.simpan");
    Route::get("/pembelian/edit/{id_pembelian}", [Cpembelian::class, "edit"])->name("pembelian.edit");
    Route::put("/pembelian/edit_simpan/{id_pembelian}", [Cpembelian::class, "simpan_edit"])->name("pembelian.simpan_edit");
    Route::delete("/pembelian/hapus/{id_pembelian}", [Cpembelian::class, "hapus"])->name("pembelian.hapus");
    Route::get('/pembelian/cetak', [Cpembelian::class, "cetak"])->name("pembelian.cetak");
    Route::get('/pembelian/excel', [Cpembelian::class, "excel"])->name("pembelian.excel");

    // get api doa
    Route::get("/doa", [Cdoa::class, "index"])->name("doa");
    // get api book 
    Route::get("/books", [Cbooks::class, "index"])->name("books.api");
    // get kamus
    Route::get("/kamus", [Ckamus::class, "index"])->name("kamus.api");
});
