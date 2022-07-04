<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class SupplierController extends Controller
{

    public function ProsesTambahKaryawan(Request $request)
    {
        $data = array(
            'NAMA_SUPPLIER' => $request->input('nama'),
            'ALAMAT_SUPPLIER' => $request->input('alamat'),
            'TLP_SUPPLIER' => $request->input('tlp'),
            'KOTA_SUPPLIER' => $request->input('kota'),

        );
        DB::table('supplier')->insert($data);
        Alert::success('Data Supplier', 'Data Berhasil Ditambahkan');
        return Redirect::to('mastersupplier');
    }

    public function ProsesEditKaryawan(Request $request)
    {
        $data = array(
            'NAMA_SUPPLIER' => $request->input('nama'),
            'ALAMAT_SUPPLIER' => $request->input('alamat'),
            'TLP_SUPPLIER' => $request->input('tlp'),
            'KOTA_SUPPLIER' => $request->input('kota'),

        );

        DB::table('supplier')->where('ID_SUPPLIER', '=', $request->input('id'))->update($data);
        Alert::success('Data Supplier', 'Data Berhasil Diubah');
        return Redirect::to('mastersupplier');
    }
    public function ProsesHapusSupplier(Request $request)
    {
        DB::table('supplier')->where('ID_SUPPLIER', '=', $request->input('id'))->delete();
        Alert::success('Data Supplier', 'Data Berhasil Dihapus');
        return Redirect::to('mastersupplier');
    }

}
