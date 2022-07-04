<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{

    public function ProsesTambahKaryawan(Request $request)
    {
        $data = array(

            'NAMA_KAR' => $request->input('nama'),
            'EMAIL' => $request->input('email'),
            'PASSWORD' => $request->input('password'),
            'ALAMAT_KAR' => $request->input('alamat'),
            'TLP_KAR' => $request->input('no_tlp'),
            'TGL_LAHIR_KAR' => $request->input('tgl_lahir'),
            'JABATAN' => $request->input('jabatan'),

        );
        DB::table('karyawan')->insert($data);
        Alert::success('Data Karyawan', 'Data Berhasil Ditambahkan');
        return Redirect::to('masteruser');
    }

    public function ProsesEditKaryawan(Request $request)
    {
        $data = array(
            'NAMA_KAR' => $request->input('nama'),
            'EMAIL' => $request->input('email'),
            'PASSWORD' => $request->input('password'),
            'ALAMAT_KAR' => $request->input('alamat'),
            'TLP_KAR' => $request->input('no_tlp'),
            'TGL_LAHIR_KAR' => $request->input('tgl_lahir'),
            'JABATAN' => $request->input('jabatan'),
        );

        DB::table('karyawan')->where('ID_KAR', '=', $request->input('id'))->update($data);
        Alert::success('Data Karyawan', 'Data Berhasil Diubah');
        return Redirect::to('masteruser');
    }
    public function ProsesHapusKaryawan(Request $request)
    {
        DB::table('karyawan')->where('ID_KAR', '=', $request->input('id'))->delete();
        Alert::success('Data Karyawan', 'Data Berhasil Dihapus');
        return Redirect::to('masteruser');
    }

}
