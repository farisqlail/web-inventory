<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class EOQController extends Controller
{

    public function TampilTambahEOQ(Request $request)
    {
        $data = DB::table('barang as ba')
        ->join('operasi as op', 'op.ID_BARANG' , '=', 'ba.ID_BARANG' )
        ->where('STATUS_OP', '=', 1)
        ->get();
        return View('gudang/operasibarang/eoq/perhitunganeoq')
        ->with('DataBarang', $data);
    }

    public function TampilPerhitunganEOQAjax(Request $request)
    {
        $ID_BARANG = $request->ID_BARANG;

        $year = Carbon::now()->year;
        $data1 =  DB::table('operasi as op')
        ->join('barang as ba', 'ba.ID_BARANG' , '=', 'op.ID_BARANG' )
        ->where(DB::raw('date_format(TANGGAL_OP, "%Y")'), '=', $year)
        ->where('op.ID_BARANG', '=', $ID_BARANG)
        ->where('op.STATUS_OP', '=', 1)
        ->first();

        // $hasil = $data2->KEBUTUHAN_BARANG_BL * $data1->NILAI_SAFE;

        $kebutuhanbulan = $data1->KEBUTUHAN_BARANG_BL / 12;

        return View('gudang/operasibarang/eoq/ajax')
        ->with('DataEOQ', $data1)
        ->with('kebutuhan', $kebutuhanbulan);
    }

    public function OperasiTambahEOQ(Request $request)
    {
            $data = array(
            'ID_BARANG' => $request->input('barang'),
            'TANGGAL_EOQ' => $request->input('tgl_eoq'),
            'PERSEN_SIMPAN' => $request->input('biaya_simpan'),
            'BIAYA_SIMPAN' => $request->input('nilai_simpan'),
            'NILAI_EOQ' => $request->input('nilai_eoq'),
            'STATUS_EOQ' => $request->input('status_EOQ'),
        );

        $data2 = array(
            'STATUS_EOQ' => 0
        );

        DB::table('eoq')->where('ID_BARANG','=', $request->input('barang'))->update($data2);
        DB::table('eoq')->insert($data);
        Alert::success('Data Economic Order Quantity', 'Data Berhasil Ditambahkan');
        return Redirect::to('mastereoq');

    }









}
