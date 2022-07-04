<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;


class AuthController extends Controller
{

    public function ceklogin(Request $request)
    {
        $database =  DB::table('karyawan')
            ->where('EMAIL', '=',  $request->input('email'))
            ->where('PASSWORD', '=',  $request->input('password'))
            ->get();

        if (count($database) == 1) {
            $log =  DB::table('karyawan')
                ->where('EMAIL', '=',  $request->input('email'))
                ->where('PASSWORD', '=',  $request->input('password'))
                ->first();
            // $request->session()->put('user', $log->NAMA_KARYAWAN);
            $request->session()->put('user', [$log->ID_KAR, $log->NAMA_KAR, $log->JABATAN,$log->EMAIL]);
            Alert::success('Berhasil Masuk', 'Selamat Anda Berhasil Masuk ');
            return redirect('home');
        } else {

            Alert::error('Email dan Password Anda Salah');
            return redirect('/');

        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user');
        return Redirect::to('/');
    }


}
