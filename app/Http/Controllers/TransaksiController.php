<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class TransaksiController extends Controller
{

    public function ProsesTransaksiBarangMasukTambah(Request $request)
    {

        $data = array(
            'ID_BARANG' => $request->input('barang'),
            'ID_SUPPLIER' => $request->input('supplier'),
            'ID_KAR' => $request->input('karyawan'),
            'TANGGAL_MASUK' => $request->input('tgl_masuk'),
            'JML_BARANG_MSK' => $request->input('jml_masuk'),
            'HARGA_BARANG_MASUK' => $request->input('hrg_masuk'),

        );

        $data1 = $request->input('jml_masuk');

        $data2 = DB::table('barang')
        ->select('STOCK_BARANG')
        ->where('ID_BARANG', '=', $request->input('barang'))
        ->first();

        $data3 = array(
          'STOCK_BARANG' =>  $data2->STOCK_BARANG + $data1
        );


        DB::table('masuk')->insert($data);
        DB::table('barang')->where('ID_BARANG', '=', $request->input('barang') )->update($data3);
        Alert::success('Data Barang Masuk', 'Data Berhasil Ditambahkan');
        return Redirect::to('transaksibarangmasuk');
    }

    public function ProsesTransaksiBarangMasukHapus(Request $request)
    {
        DB::table('masuk')->where('ID_MASUK', '=', $request->input('id'))->delete();
        Alert::success('Data Barang Masuk', 'Data Berhasil Dihapus');
        return Redirect::to('transaksitambahbarangmasuk');
    }

    public function ProsesTransaksiBarangKeluarTambah(Request $request)
    {

        $data = array(
            'ID_BARANG' => $request->input('barang'),
            'ID_KAR' => $request->input('karyawan'),
            'TANGGAL_KELUAR' => $request->input('tgl_keluar'),
            'JML_KELUAR' => $request->input('jml_keluar'),
            'HARGA_BARANG_KELUAR' => $request->input('harga_keluar'),
            'KET_KELUAR' => $request->input('keterangan'),
        );

        $data1 = $request->input('jml_keluar');

        $data2 = DB::table('barang')
        ->select('STOCK_BARANG')
        ->where('ID_BARANG', '=', $request->input('barang'))
        ->first();

        $data3 = array(
          'STOCK_BARANG' =>  $data2->STOCK_BARANG - $data1
        );
        DB::table('keluar')->insert($data);
        DB::table('barang')->where('ID_BARANG', '=', $request->input('barang') )->update($data3);
        Alert::success('Data Barang Keluar', 'Data Berhasil Ditambahkan');
        return Redirect::to('transaksibarangkeluar');
    }

    public function ProsesTransaksiBarangKeluarHapus(Request $request)
    {
        DB::table('keluar')->where('ID_KELUAR', '=', $request->input('id'))->delete();
        Alert::success('Data Barang Keluar', 'Data Berhasil Dihapus');
        return Redirect::to('transaksibarangkeluar');
    }
}
