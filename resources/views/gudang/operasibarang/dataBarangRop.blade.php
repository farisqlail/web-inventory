@extends('layout.layout')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Barang Reorder Point</h4>
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
                        <a href="#">Reorder Point</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Daftar Data Reorder Point</a>
                    </li>
                </ul>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Tanggal</th>
                                            <th>Nilai Reorder Point</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>



                                    <tbody>

                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach ($DataBarangRop as $item)
                                        <?php if ($item->STOCK_BARANG < $item->NILAI_ROP) {
                                        ?>
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $item->NAMA_BARANG }}</td>
                                                <td>{{ Carbon\Carbon::parse($item->TANGGAL_ROP)->format('d / M / Y') }}</td>
                                                <td>{{ $item->NILAI_ROP }} Unit</td>
                                                {{-- <td>@php echo date_format( $item->TANGGAL_MASUK," %D %M %Y ") @endphp</td> --}}
                                                @if ($item->STATUS_ROP == 0 )
                                                <td><button class="btn btn-secondary">Non-Aktif</button></td>
                                                @else
                                                <td><button class="btn btn-warning">Aktif</button></td>
                                                @endif

                                            </tr>
                                            $no++;


                                        <?php } ?>
                                        @php
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
