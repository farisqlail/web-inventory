@extends('layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Data Pembelian</h4>
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
                            <a href="#">Pembelian</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Daftar Data Pembelian</a>
                        </li>
                    </ul>
                </div>
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Data Pembelian</h4>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Jenis Pembelian</th>
                                                <th>Tanggal Pembelian</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($countData as $item)
                                                <tr>
                                                    <td>{{ $no }}</td>
                                                    <td>Pembelian Barang</td>
                                                    <td>{{ Carbon\Carbon::parse($item->TANGGAL_PEMBELIAN)->format('d / M / Y') }}
                                                    </td>
                                                    <td>
                                                        <a href="detail-pembelian/{{ $item->TANGGAL_PEMBELIAN }}"
                                                            class="btn btn-info btn-xs"> <i class="fa fa-info">
                                                                View</i></a>
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
