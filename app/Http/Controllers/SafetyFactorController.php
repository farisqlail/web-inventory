<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class SafetyFactorController extends Controller
{

    public function ProsesTambahSafetyFactor(Request $request)
    {

        $data = array(
            'ID_BARANG' => $request->input('barang'),
            'TANGGAL_SAFE' => $request->input('tgl_masuk'),
            'NILAI_SAFE' => $request->input('nilai'),
            'STATUS_SAFE' => $request->input('status'),
        );

        $data2 = array(
            'STATUS_SAFE' => 0
        );

        DB::table('safety_factor')->where('ID_BARANG','=', $request->input('barang'))->update($data2);
        DB::table('safety_factor')->insert($data);
        Alert::success('Data Barang', 'Data Berhasil Ditambahkan');
        return Redirect::to('masterfactor');

    }


    public function ProsesHapusSafetyFactor(Request $request)
    {
        DB::table('safety_factor')->where('ID_SAFETY', '=', $request->input('id'))->delete();
        Alert::success('Data Safety Factor', 'Data Berhasil Dihapus');
        return Redirect::to('masterfactor');
    }

}
