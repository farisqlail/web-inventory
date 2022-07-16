<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class ROPController extends Controller
{
    public function TampilTambahROP(Request $request)
    {
        $data = DB::table('barang as ba')
            ->join('operasi as op', 'op.ID_BARANG', '=', 'ba.ID_BARANG')
            ->join('safety_stock as ss', 'ss.ID_BARANG', '=', 'ba.ID_BARANG')
            ->where('STATUS_OP', '=', 1)
            ->where('STATUS_SS', '=', 1)
            ->get();

        return View('gudang/operasibarang/rop/perhitunganrop')
            ->with('DataBarang', $data);
    }

    public function TampilOperasiROPAjax(Request $request)
    {
        $ID_BARANG = $request->ID_BARANG;

        $year = Carbon::now()->year;
        $data1 =  DB::table('operasi')
            ->where(DB::raw('date_format(TANGGAL_OP, "%Y")'), '=', $year)
            ->where('ID_BARANG', '=', $ID_BARANG)
            ->where('STATUS_OP', '=', 1)
            ->first();

        $data2 =  DB::table('safety_stock')
            ->where(DB::raw('date_format(TANGGAL_SS, "%Y")'), '=', $year)
            ->where('ID_BARANG', '=', $ID_BARANG)
            ->where('STATUS_SS', '=', 1)
            ->first();

        // $hasil = $data2->KEBUTUHAN_BARANG_BL * $data1->NILAI_SAFE;

        if ($data1 && $data2) {
            $kebutuhanbulan = $data1->KEBUTUHAN_BARANG_BL / 12;

            $perhitunganROP = ($kebutuhanbulan * $data1->LEAD_TIME) + $data2->NILAI_SS;

            return View('gudang/operasibarang/rop/ajax')
                ->with('kebutuhanbulan', $kebutuhanbulan)
                ->with('DataOperasi', $data1)
                ->with('DataSS', $data2)
                ->with('hasilROP', round($perhitunganROP));
        } else {
            Alert::Error('Data Tidak Ada', 'Mohon PAstikan Data Operasi Barang Terisi');
        }
    }

    public function OperasiTambahROP(Request $request)
    {
        $data = array(
            'ID_BARANG' => $request->input('barang'),
            'TANGGAL_ROP' => $request->input('tgl_rop'),
            'NILAI_ROP' => $request->input('nilai_rop'),
            'STATUS_ROP' => $request->input('status_rop'),
        );

        $data2 = array(
            'STATUS_ROP' => 0
        );

        DB::table('rop')->where('ID_BARANG', '=', $request->input('barang'))->update($data2);
        DB::table('rop')->insert($data);
        Alert::success('Data Reorder Point', 'Data Berhasil Ditambahkan');
        return Redirect::to('masterrop');
    }
}
