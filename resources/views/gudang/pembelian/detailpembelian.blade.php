@extends('layout.layout')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header row">
                <div class="col-10">
                    <h4 class="page-title">Daftar Pembelian Barang</h4>

                </div>
                <div class="col flo">
                    <p>{{ Session::get('user')[1] }}</p>
                    <p>Tanggal : {{ date('d-m-Y') }}</p>
                </div>

            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <!-- <h4 class="card-title">Data Pembelian</h4> -->
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama Barang</th>
                                            <th>Nama Supplier</th>
                                            <th>Jumlah Barang</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <tr>
                                            <td>{{ $data[0]->NAMA_BARANG }}</td>
                                            <td>{{ $data[0]->NAMA_SUPPLIER}}</td>
                                            <td>{{ $data[0]->STOCK_BARANG }}</td>
                                        </tr>

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
