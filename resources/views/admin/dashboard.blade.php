@extends('layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">

                @foreach ($dataKurang as $item)
                    <div class="alert alert-warning mt-3 ml-auto" style="width: 30%;" role="alert">
                       Stok barang {{ $item->NAMA_BARANG }} kurang dari rop!!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endforeach

                <div class="page-header">
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>

            <div class="row p-3">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4>
                                Barang Masuk
                            </h4>
                        </div>
                        <div id="barangMasuk"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4>
                                Barang Keluar
                            </h4>
                        </div>
                        <div id="barangKeluar"></div>

                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <script>
        // Create the chart
        $(document).ready(function() {
            Highcharts.chart('barangMasuk', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Data Barang Masuk'
                },
                accessibility: {
                    announceNewData: {
                        enabled: true
                    }
                },
                xAxis: {
                    categories: <?= json_encode($namaBarang) ?>,
                },
                yAxis: {
                    title: {
                        text: 'Jumlah Barang'
                    }
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.0f}'
                        }
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.date} <br>{point.name}</span>: <b>{point.y:.0f}</b><br/>'
                },
                series: [{
                    name: "Jumlah Barang",
                    colorByPoint: true,
                    data: <?= json_encode($barangMasuk) ?>
                }],

            });
        });

        $(document).ready(function() {
            Highcharts.chart('barangKeluar', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Data Barang Keluar'
                },
                accessibility: {
                    announceNewData: {
                        enabled: true
                    }
                },
                xAxis: {
                    categories: <?= json_encode($namaBarang) ?>,
                },
                yAxis: {
                    title: {
                        text: 'Jumlah Barang'
                    }
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.0f}'
                        }
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.date} <br>{point.name}</span>: <b>{point.y:.0f}</b><br/>'
                },
                series: [{
                    name: "Jumlah Barang",
                    colorByPoint: true,
                    data: <?= json_encode($barangKeluar) ?>
                }],

            });
        });
    </script>
@endpush
