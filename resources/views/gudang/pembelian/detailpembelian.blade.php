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
                        <p><b>{{ Session::get('user')[1] }}</b></p>
                        <p><b>Tanggal : {{ date('d-M-Y') }}</b></p>
                    </div>

                </div>
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
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
                                            @if (!empty($data))
                                                @foreach ($data as $item)
                                                    @if ($item->STOCK_BARANG < $item->NILAI_ROP)
                                                        <tr>
                                                            <td>{{ $item->NAMA_BARANG }}</td>
                                                            <td>{{ $item->NAMA_SUPPLIER }}</td>
                                                            <td>{{ $item->NILAI_EOQ }}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td>Data Kosong</td>
                                                </tr>
                                            @endif


                                        </tbody>
                                    </table>
                                </div>

                                <div class="btn-export mt-3">
                                    <a href="/pdf-detailpembelian" class="btn btn-block btn-primary">Cetak Barang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
