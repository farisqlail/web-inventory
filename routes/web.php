<?php

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


// Landing Page Aplikasi Pengendalian

Route::get('/', function () {
    return view('index');
});


//---------------- TAMPILAN----------//

//**TAMPILAN AWAL */

Route::get('/dashboard', 'HomeController@dashboard');

Route::get('/home', 'HomeController@tampilanawal');

//**TAMPILAN MASTER KARYAWAN */

Route::get('/masteruser', 'HomeController@TampilMasterKaryawan');

//**TAMPILAN MASTER SUPPLIER */

Route::get('/mastersupplier', 'HomeController@TampilMasterSupplier');

//**TAMPILAN MASTER SUPPLIER */

Route::get('/masterkategori', 'HomeController@TampilMasterKategori');

//**TAMPILAN MASTER BARANG */

Route::get('/masterbarang', 'HomeController@TampilMasterBarang');

//**TAMPILAN SAFTY FACTOR */

Route::get('/masterfactor', 'HomeController@TampilMasterFactor');

//**TAMPILAN DATA OPERASI*/

Route::get('/masteroperasi', 'HomeController@TampilMasterOperasi');

//**TAMPILAN DATA SAFETY STOCK*/

Route::get('/masterss', 'HomeController@TampilDataSafetyStock');

//**TAMPILAN DATA REORDER POINT*/

Route::get('/masterrop', 'HomeController@TampilDataROP');

//**TAMPILAN DATA ECONOMIC ORDER QUANTITY*/

Route::get('/mastereoq', 'HomeController@TampilDataEOQ');


Route::get('/databarangrop', 'HomeController@TampilDataBarangROP');
Route::get('/pdf', 'HomeController@pdf');


Route::get('/export-barang-rop', 'HomeController@pdfBarangRop');


// DETAIL PEMBELIAN
Route::get('/pembelian', 'HomeController@TampilPembelian');

Route::get('/detail-pembelian/{id}', 'HomeController@TampilDetailPembelian');


//**TAMPILAN TRANSAKSI BARANG MASUK */

Route::get('/transaksibarangmasuk', 'HomeController@TampilBarangMasuk');
Route::post('/transaksibarangmasuk/filter', 'HomeController@exportBarangMasuk');
Route::get('/transaksibarangmasuk/export/', 'HomeController@pdfBarangMasuk');

//**TAMPILAN TRANSAKSI BARANG KELUAR */

Route::get('/transaksibarangkeluar', 'HomeController@TampilBarangKeluar');
Route::post('/transaksibarangkeluar/filter', 'HomeController@exportBarangKeluar');
Route::get('/transaksibarangkeluar/export/', 'HomeController@pdfBarangKeluar');



/////////----------TRANSAKSI TAMBAH-----------//////////


//**TAMPILAN TRANSAKSI TAMBAH BARANG MASUK*/

Route::get('/transaksitambahbarangmasuk', 'HomeController@TampilTambahBarangMasuk');

//**TAMPILAN TRANSAKSI TAMBAH BARANG KELUAR*/

Route::get('/transaksitambahbarangkeluar', 'HomeController@TampilTambahBarangKeluar');

//**TAMPILAN TRANSAKSI TAMBAH SAFETY STOCK*/

Route::get('/tambahsafetystock', 'SafetyController@TampilTambahSafetyStock');

//**TAMPILAN TRANSAKSI TAMBAH ROP*/

Route::get('/tambahROP', 'ROPController@TampilTambahROP');

//**TAMPILAN TRANSAKSI TAMBAH EOQ*/

Route::get('/tambahEOQ', 'EOQController@TampilTambahEOQ');


/////////----------AJAX-----------//////////


//**TAMPILAN TRANSAKSI TAMBAH BARANG KELUAR AJAX*/

Route::get('/transaksitambahbarangkeluarAjax', 'HomeController@TampilTambahBarangKeluarAjax');

//**TAMPILAN TRANSAKSI TAMBAH BARANG MASUK AJAX*/

Route::get('/transaksitambahbarangmasukAjax', 'HomeController@TampilTambahBarangMasukAjax');

//**TAMPILAN TRANSAKSI SAFETY STOCK AJAX*/

Route::get('/transaksisafetystockAjax', 'SafetyController@TampilSafetyStockAjax');

//**TAMPILAN TRANSAKSI REORDER POINT AJAX*/

Route::get('/ajaxbisarop', 'ROPController@TampilOperasiROPAjax');

//**TAMPILAN TRANSAKSI ECONOMIC ORDER QUANTUTY AJAX*/

Route::get('/ajaxeoq', 'EOQController@TampilPerhitunganEOQAjax');

/////////----------PROSES-----------//////////

// Pembuatan Login
Route::post('/ceklogin', 'AuthController@ceklogin');
Route::get('/logout', 'AuthController@logout');

// ============Karyawan=========///
//Tambah Data Master Karyawan
Route::post('/TambahKaryawan', 'UserController@ProsesTambahKaryawan');

//Update Data Master Karyawan
Route::post('/EditKaryawan', 'UserController@ProsesEditKaryawan');

//Hapus Data Master Karyawan
Route::post('/HapusKaryawan', 'UserController@ProsesHapusKaryawan');

// ============Supplier=========///

//Tambah Data Master Supplier
Route::post('/TambahSupplier', 'SupplierController@ProsesTambahKaryawan');

//Update Data Master Supplier
Route::post('/EditSupplier', 'SupplierController@ProsesEditKaryawan');

//Hapus Data Master Supplier
Route::post('/HapusSupplier', 'SupplierController@ProsesHapusSupplier');

// ============Kategori=========///

//Tambah Data Master Supplier
Route::post('/TambahKategori', 'KategoriController@ProsesTambahKategori');

//Update Data Master Supplier
Route::post('/EditKategori', 'KategoriController@ProsesEditKategori');

//Hapus Data Master Supplier
Route::post('/HapusKategori', 'KategoriController@ProsesHapusKategori');

// ============Barang=========///

//Tambah Data Master Supplier
Route::post('/TambahBarang', 'BarangController@ProsesTambahBarang');

//Update Data Master Supplier
Route::post('/EditBarang', 'BarangController@ProsesEditBarang');

//Hapus Data Master Supplier
Route::post('/HapusBarang', 'BarangController@ProsesHapusBarang');

// ============Transaksi Barang Masuk =========///

Route::post('/TambahDataBarangMasuk', 'TransaksiController@ProsesTransaksiBarangMasukTambah');

Route::post('/HapusDataMasuk', 'TransaksiController@ProsesTransaksiBarangMasukHapus');


// ============Transaksi Barang Keluar =========///

Route::post('/TambahDataBarangKeluar', 'TransaksiController@ProsesTransaksiBarangKeluarTambah');

Route::post('/HapusDataKeluar', 'TransaksiController@ProsesTransaksiBarangKeluarHapus');

// ============Operasi=========///

//Tambah Data Master Supplier
Route::post('/TambahDataOperasi', 'OperasiController@ProsesTambahDataOperasi');

//Hapus Data Master Supplier
Route::post('/HapusDataOperasi', 'OperasiController@ProsesHapusDataOperasi');

// ============Safety Stock=========///

//Tambah Data Safety Stock
Route::post('/TambahDataSafetyStock', 'SafetyController@OperasiTambahSafetyStock');

// ============Reorder Point=========///

Route::post('/TambahDataReorderPoint', 'ROPController@OperasiTambahROP');

// ============EOQ=========///

Route::post('/TambahDataEOQ', 'EOQController@OperasiTambahEOQ');

Route::post('/TambahSafetyFactor', 'SafetyFactorController@ProsesTambahSafetyFactor');
