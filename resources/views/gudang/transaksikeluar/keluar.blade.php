@extends('layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Data Master Barang</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="#">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Master Barang</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Daftar Barang</a>
                        </li>
                    </ul>
                    <div class="ml-auto">
                        <form action="{{ url('/transaksibarangkeluar/filter') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group ml-auto" align="right">
                                        <input type="date" name="filterDate" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="col-sm-4" align="left">
                                    <button class="btn btn-success" style="margin-top: 10px;"
                                        type="submit">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col mt-3">
                                        <h4 class="card-title">Data Barang Masuk</h4>
                                    </div>
                                    <div class="col col-lg-2 mt-2">
                                        <a class="btn btn-primary btn-round ml-auto" href="transaksitambahbarangkeluar">
                                            <i class="fa fa-plus"></i>
                                            Tambah Data
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Tanggal</th>
                                                <th>Nama Karyawan</th>
                                                <th>Jumlah</th>
                                                <th>Harga Barang</th>
                                                <th>Total</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($DaftarBarangKeluar as $item)
                                                <tr>
                                                    <td>{{ $no }}</td>
                                                    <td>{{ $item->NAMA_BARANG }}</td>
                                                    <td>{{ $item->TANGGAL_KELUAR }}</td>
                                                    <td>{{ $item->NAMA_KAR }}</td>
                                                    <td>{{ $item->JML_KELUAR }} Unit</td>
                                                    <td> @php   echo "Rp " . number_format( $item->HARGA_BARANG ,2,',','.');  @endphp </td>

                                                    <td> @php   echo "Rp " . number_format($item->JML_KELUAR * $item->HARGA_BARANG ,2,',','.');  @endphp </td>
                                                    <td>{{ $item->KET_KELUAR }}</td>
                                                    <td>
                                                        <a href="#ModalHapusBarang{{ $item->ID_KELUAR }}"
                                                            data-toggle="modal" class="btn btn-danger btn-xs"> <i
                                                                class="fa fa-trash"> Hapus</i></a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $no++;
                                                @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
