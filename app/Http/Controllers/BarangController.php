<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class BarangController extends Controller
{

    public function ProsesTambahBarang(Request $request)
    {

        $data = array(
            'NAMA_BARANG' => $request->input('nama'),
            'ID_KATEGORI' => $request->input('kategori'),
            'HARGA_BARANG' => $request->input('harga'),
            'STOCK_BARANG' => $request->input('stock'),
            'ID_SUPPLIER' => $request->input('supplier'),

        );
        DB::table('barang')->insert($data);
        Alert::success('Data Barang', 'Data Berhasil Ditambahkan');
        return Redirect::to('masterbarang');
    }

    public function ProsesEditBarang(Request $request)
    {
        $data = array(
            'NAMA_BARANG' => $request->input('nama'),
            'ID_KATEGORI' => $request->input('kategori'),
            'HARGA_BARANG' => $request->input('harga'),
            'ID_SUPPLIER' => $request->input('supplier'),

        );

        DB::table('barang')->where('ID_BARANG', '=', $request->input('id'))->update($data);
        Alert::success('Data Barang', 'Data Berhasil Diubah');
        return Redirect::to('masterbarang');
    }
    public function ProsesHapusBarang(Request $request)
    {
        DB::table('barang')->where('ID_BARANG', '=', $request->input('id'))->delete();
        Alert::success('Data Barang', 'Data Berhasil Dihapus');
        return Redirect::to('masterbarang');
    }


}
