<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade as PDF;

class HomeController extends Controller
{

    public function dashboard()
    {
        $barangMasuk = DB::table('masuk as ms')
            ->join('barang as ba', 'ba.ID_BARANG', '=', 'ms.ID_BARANG')
            ->join('karyawan as ka', 'ka.ID_KAR', '=', 'ms.ID_KAR')
            ->join('supplier as sp', 'sp.ID_SUPPLIER', '=', 'ms.ID_SUPPLIER')
            ->orderBy('ms.jml_barang_msk', 'desc')
            ->get();
        // dd($barangMasuk);
        $a = [];
        foreach ($barangMasuk as $data) {

            array_push($a, $data->JML_BARANG_MSK);
        }

        $c = [];
        foreach ($barangMasuk as $data) {
            $x['NAMA_BARANG'] = $data->NAMA_BARANG;

            array_push($c, $data->NAMA_BARANG);
        }


        $barangKeluar = DB::table('keluar as kl')
            ->join('barang as ba', 'ba.ID_BARANG', '=', 'kl.ID_BARANG')
            ->join('karyawan as ka', 'ka.ID_KAR', '=', 'kl.ID_KAR')
            ->orderBy('kl.jml_keluar', 'desc')
            ->get();

        $b = [];
        foreach ($barangKeluar as $data) {
            $x['JML_KELUAR'] = $data->JML_KELUAR;

            array_push($b, $data->JML_KELUAR);
        }

        return view('admin.dashboard', [
            'barangMasuk'   => $a,
            'barangKeluar'  => $b,
            'namaBarang' => $c,
        ]);
    }

    public function tampilanawal(Request $request)
    {
        return View('home')->with('success', 'Login Berhasil');
    }

    public function TampilMasterKaryawan(Request $request)
    {
        $data = DB::table('karyawan')->get();
        return View('admin/master/masteruser/user')->with('DaftarKaryawan', $data);
    }

    public function TampilMasterSupplier(Request $request)
    {
        $data = DB::table('supplier')->get();
        return View('admin/master/mastersupplier/supplier')->with('DaftarSupplier', $data);
    }
    public function TampilMasterKategori(Request $request)
    {
        $data = DB::table('kategori')->get();
        return View('admin/master/masterkategori/kategori')->with('DaftarKategori', $data);
    }

    public function TampilMasterFactor(Request $request)
    {
        $data = DB::table('safety_factor as sf')
            ->join('barang as ba', 'ba.ID_BARANG', '=', 'sf.ID_BARANG')
            ->get();
        $data1 = DB::table('barang')
            ->get();
        $data2 = DB::table('safety_factor')
            ->get();
        return View('admin/master/mastersafety/factor')
            ->with('DaftarFactor', $data)
            ->with('DaftarBarang', $data1)
            ->with('DaftarCek', $data2);
    }

    public function TampilMasterOperasi(Request $request)
    {
        $data = DB::table('operasi as op')
            ->join('barang as ba', 'ba.ID_BARANG', '=', 'op.ID_BARANG')
            ->get();
        $data1 = DB::table('barang')
            ->get();
        return View('admin/master/masteroperasi/operasi')
            ->with('DaftarOperasi', $data)
            ->with('DaftarBarang', $data1);
    }

    public function TampilMasterBarang(Request $request)
    {
        $data = DB::table('barang as ba')
            ->join('kategori as ka', 'ka.ID_KATEGORI', '=', 'ba.ID_KATEGORI')
            ->join('supplier as sp', 'sp.ID_SUPPLIER', '=', 'ba.ID_SUPPLIER')
            ->get();

        $data1 = DB::table('kategori')
            ->get();
        $data2 = DB::table('supplier')
            ->get();

        return View('admin/master/masterbarang/barang')
            ->with('DaftarBarang', $data)
            ->with('DaftarKategori', $data1)
            ->with('DaftarSupplier', $data2);
    }

    public function pdfBarangRop()
    {

        $data = DB::table('barang as ss')
            ->select('ss.ID_BARANG', 'ss.NAMA_BARANG', 'ss.HARGA_BARANG', 'st.NILAI_SS', 'ss.STOCK_BARANG', 'rp.NILAI_ROP', 'sp.NAMA_SUPPLIER')
            ->join('rop as rp', 'rp.ID_BARANG', '=', 'ss.ID_BARANG')
            ->join('safety_stock as st', 'st.ID_BARANG', '=', 'ss.ID_BARANG')
            ->join('supplier as sp', 'sp.ID_SUPPLIER', '=', 'ss.ID_SUPPLIER')
            ->where('rp.STATUS_ROP', '=', '1')
            ->groupBy('ss.ID_BARANG', 'ss.NAMA_BARANG', 'ss.HARGA_BARANG', 'ss.STOCK_BARANG', 'rp.NILAI_ROP', 'st.NILAI_SS', 'sp.NAMA_SUPPLIER')
            ->get();

        $pdf = PDF::loadView('gudang/operasibarang/databarangrop/pdf', [
            'ataBarangRop' => $data
        ])->setPaper('a4', 'landscape');

        return $pdf->download('Laporan-transaksi-barang-rop.pdf');
    }

    public function pdf()
    {
        $data = DB::table('barang as ss')
            ->select('ss.ID_BARANG', 'ss.NAMA_BARANG', 'ss.HARGA_BARANG', 'st.NILAI_SS', 'ss.STOCK_BARANG', 'rp.NILAI_ROP', 'sp.NAMA_SUPPLIER')
            ->join('rop as rp', 'rp.ID_BARANG', '=', 'ss.ID_BARANG')
            ->join('safety_stock as st', 'st.ID_BARANG', '=', 'ss.ID_BARANG')
            ->join('supplier as sp', 'sp.ID_SUPPLIER', '=', 'ss.ID_SUPPLIER')
            ->where('rp.STATUS_ROP', '=', '1')
            ->groupBy('ss.ID_BARANG', 'ss.NAMA_BARANG', 'ss.HARGA_BARANG', 'ss.STOCK_BARANG', 'rp.NILAI_ROP', 'st.NILAI_SS', 'sp.NAMA_SUPPLIER')
            ->get();
        
        // dd($data);

        return view('gudang/operasibarang/databarangrop/pdf', [
            'DataBarangRop' => $data
        ]);
    }



    public function pdfBarangMasuk(Request $request)
    {

        $fromDate = $request->from;
        $toDate = $request->to;
        $namaBarang = $request->search;

        $data = DB::table('masuk as ms')
            ->join('barang as ba', 'ba.ID_BARANG', '=', 'ms.ID_BARANG')
            ->join('karyawan as ka', 'ka.ID_KAR', '=', 'ms.ID_KAR')
            ->join('supplier as sp', 'sp.ID_SUPPLIER', '=', 'ms.ID_SUPPLIER')
            ->where('ba.NAMA_BARANG', 'like', '%' . $namaBarang . '%')
            ->whereBetween('ms.TANGGAL_MASUK', [$fromDate, $toDate])
            ->get();

        $pdf = PDF::loadView('gudang/transaksimasuk/pdf', [
            'from' => $fromDate,
            'to' => $toDate,
            'DaftarBarangMasuk' => $data
        ])->setPaper('a4', 'landscape');

        return $pdf->download('Laporan-transaksi-barang-masuk.pdf');
        // return view('gudang/transaksimasuk/pdf', [
        //     'DaftarBarangMasuk' => $data
        // ]);
    }



    public function TampilBarangMasuk(Request $request)
    {
        $filter = $request->get('filterDate');
        if ($filter) {
            $data = DB::table('masuk as ms')
                ->join('barang as ba', 'ba.ID_BARANG', '=', 'ms.ID_BARANG')
                ->join('karyawan as ka', 'ka.ID_KAR', '=', 'ms.ID_KAR')
                ->join('supplier as sp', 'sp.ID_SUPPLIER', '=', 'ms.ID_SUPPLIER')
                ->where('ms.TANGGAL_MASUK', 'like', '%' . $filter . '%')
                ->get();
        } else {
            $data = DB::table('masuk as ms')
                ->join('barang as ba', 'ba.ID_BARANG', '=', 'ms.ID_BARANG')
                ->join('karyawan as ka', 'ka.ID_KAR', '=', 'ms.ID_KAR')
                ->join('supplier as sp', 'sp.ID_SUPPLIER', '=', 'ms.ID_SUPPLIER')
                ->get();
        }
        $data1 = DB::table('barang')
            ->get();
        $data2 = DB::table('supplier')
            ->get();
        $data3 = DB::table('karyawan')
            ->get();

        return View('gudang/transaksimasuk/masuk')
            ->with('DaftarBarangMasuk', $data);
    }

    public function exportBarangKeluar(Request $request)
    {
        $fromDate = $request->get('fromFilterDate');
        $toDate = $request->get('toFilterDate');
        $namaBarang = $request->get('namaBarang');

        $data = DB::table('keluar as kl')
            ->join('barang as ba', 'ba.ID_BARANG', '=', 'kl.ID_BARANG')
            ->join('karyawan as ka', 'ka.ID_KAR', '=', 'kl.ID_KAR')
            ->where('ba.NAMA_BARANG', 'like', '%' . $namaBarang . '%')
            ->whereBetween('kl.TANGGAL_KELUAR', [$fromDate, $toDate])
            ->get();

        // dd($data);

        return View('gudang/transaksikeluar/filter', [
            'DaftarBarangKeluar' => $data,
            'fromDate' => $fromDate,
            'toDate' => $toDate,
            'namaBarang' => $namaBarang
        ]);
    }

    public function pdfBarangKeluar(Request $request)
    {
        $fromDate = $request->from;
        $toDate = $request->to;
        $namaBarang = $request->search;

        $data = DB::table('keluar as kl')
            ->join('barang as ba', 'ba.ID_BARANG', '=', 'kl.ID_BARANG')
            ->join('karyawan as ka', 'ka.ID_KAR', '=', 'kl.ID_KAR')
            ->where('ba.NAMA_BARANG', 'like', '%' . $namaBarang . '%')
            ->whereBetween('kl.TANGGAL_KELUAR', [$fromDate, $toDate])
            ->get();


        $pdf = PDF::loadView('gudang/transaksikeluar/pdf', [
            'from' => $fromDate,
            'to' => $toDate,
            'DaftarBarangKeluar' => $data
        ])->setPaper('a4', 'landscape');

        // foreach ($data as  $q) {

        //     $insertToDB = array(
        //         'TANGGAL_PEMBELIAN' => $q->TANGGAL_KELUAR,
        //     );

        //     DB::table('pembelian')->insert($insertToDB);
        // }


        return $pdf->download('Laporan-transaksi-barang-keluar.pdf');
    }

    public function TampilBarangKeluar(Request $request)
    {
        $data = DB::table('keluar as kl')
            ->join('barang as ba', 'ba.ID_BARANG', '=', 'kl.ID_BARANG')
            ->join('karyawan as ka', 'ka.ID_KAR', '=', 'kl.ID_KAR')
            ->get();

        $data1 = DB::table('barang')
            ->get();
        $data2 = DB::table('karyawan')
            ->get();

        return View('gudang/transaksikeluar/keluar')
            ->with('DaftarBarangKeluar', $data);
    }

    public function TampilTambahBarangMasuk(Request $request)
    {

        $data1 = DB::table('barang')
            ->get();
        $data2 = DB::table('supplier')
            ->get();
        $data3 = DB::table('karyawan')
            ->get();

        return View('gudang/transaksimasuk/barangmasuk')
            ->with('DaftarBarang', $data1)
            ->with('DaftarSupplier', $data2)
            ->with('DaftarKaryawan', $data3);
    }

    public function TampilTambahBarangKeluar(Request $request)
    {

        $data1 = DB::table('barang')
            ->get();

        return View('gudang/transaksikeluar/barangkeluar')
            ->with('DaftarBarang', $data1);
    }
    public function TampilTambahBarangKeluarAjax(Request $request)
    {
        $ID_BARANG = $request->ID_BARANG;
        $data1 = DB::table('barang')
            ->where('ID_BARANG', '=', $ID_BARANG)
            ->first();
        return View('gudang/transaksikeluar/ajax')
            ->with('DaftarBarang', $data1);
    }

    public function TampilTambahBarangMasukAjax(Request $request)
    {
        $ID_BARANG = $request->ID_BARANG;
        $data1 = DB::table('supplier as sp')
            ->join('barang as ba', 'ba.ID_SUPPLIER', '=', 'sp.ID_SUPPLIER')
            ->where('ID_BARANG', '=', $ID_BARANG)
            ->first();
        return View('gudang/transaksimasuk/ajax')
            ->with('DaftarSupplier', $data1);
    }



    public function TampilDataSafetyStock(Request $request)
    {
        $data = DB::table('safety_stock as ss')
            ->join('barang as ba', 'ba.ID_BARANG', '=', 'ss.ID_BARANG')
            ->where('STATUS_SS', '=', 1)
            ->get();

        return View('gudang/operasibarang/safetystock/safestock')
            ->with('DataSafetyStock', $data);
    }
    public function TampilDataROP(Request $request)
    {
        $data = DB::table('rop as rop')
            ->join('barang as ba', 'ba.ID_BARANG', '=', 'rop.ID_BARANG')
            // ->where('STOCK_BARANG', '<', 'NILAI_ROP')
            ->where('STATUS_ROP', '=', 1)
            ->get();
        // dd($data);

        return View('gudang/operasibarang/rop/datarop')
            ->with('DataROP', $data);
    }
    public function TampilDataEOQ(Request $request)
    {
        $data = DB::table('eoq as eoq')
            ->join('barang as ba', 'ba.ID_BARANG', '=', 'eoq.ID_BARANG')
            ->where('STATUS_EOQ', '=', 1)
            ->get();

        return View('gudang/operasibarang/eoq/dataeoq')
            ->with('DataEOQ', $data);
    }

    public function TampilDataBarangROP()
    {
        $data = DB::table('barang as ss')
            ->select('ss.ID_BARANG', 'ss.NAMA_BARANG', 'st.NILAI_SS', 'ss.STOCK_BARANG', 'rp.NILAI_ROP', 'sp.NAMA_SUPPLIER')
            ->join('rop as rp', 'rp.ID_BARANG', '=', 'ss.ID_BARANG')
            ->join('safety_stock as st', 'st.ID_BARANG', '=', 'ss.ID_BARANG')
            ->join('supplier as sp', 'sp.ID_SUPPLIER', '=', 'ss.ID_SUPPLIER')
            ->where('rp.STATUS_ROP', '=', '1')
            ->groupBy('ss.ID_BARANG', 'ss.NAMA_BARANG', 'ss.STOCK_BARANG', 'rp.NILAI_ROP', 'st.NILAI_SS', 'sp.NAMA_SUPPLIER')
            ->get();
        // dd($data);

        return View('gudang/operasibarang/databarangrop/databarangrop')
            ->with('DataBarangRop', $data);
    }
}
