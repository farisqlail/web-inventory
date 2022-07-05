<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Transaksi Masuk</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">


    <style>
        /* body {
            font-family: arial;
        } */
        .print {
            margin-top: 10px;
        }

        @media print {
            .print {
                display: none;
            }
        }

        @media (max-width: 768px) {
            body {
                font-size: 12px;
            }

            /* h1 {
                font-size: 24px;
            } */
        }

        /* table {
            border-collapse: collapse;
        } */
    </style>
</head>

<body>
    <div class="container">
        <div class="header" align="center">
            <span class="mt-5 mb-2">CV Keke Saputra</span>
            <br><br>

            <span class="mt-2 mb-2">Jl.Kri Pulau Rani D/24 Surabaya Jawa Timur</span>
            <h1>Laporan Barang Masuk</h1>
            <span>Periode <b> {{ Carbon\Carbon::parse($from)->format('d  M  Y') }} - {{ Carbon\Carbon::parse($to)->format('d  M  Y') }}</b></small>
        </div>

        <br>
        <div class="row">
            <div class="col-md-6" align="left">
                <b>{{ Session::get('user')[1] }}</b>
            </div>
            <div class="col-md-6" align="right">
                <b>Tanggal Export : </b>{{ date('d-m-Y') }}
            </div>
        </div>
        <div class="table-responsive mt-3">
            <table border="0" cellspacing="" cellpadding="4" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Masuk</th>
                        <th>Nominal Barang</th>
                        <th>Total Nilai</th>
                    </tr>
                </thead>

                <tbody>

                    <?php $totalSemua = 0; ?>

                    @php
                    $no = 1;
                    @endphp
                    @if (!empty($DaftarBarangMasuk))
                    @foreach ($DaftarBarangMasuk as $item)
                    <?php $total_nilai = $item->JML_BARANG_MSK * $item->HARGA_BARANG_MASUK;
                    $totalSemua += $total_nilai ?>
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $item->NAMA_BARANG }}</td>
                        <td>{{ $item->JML_BARANG_MSK }} Unit</td>

                        <td> @php echo "Rp " . number_format($item->HARGA_BARANG_MASUK ,2,',','.'); @endphp </td>

                        <td> @php echo "Rp " . number_format($total_nilai ,2,',','.'); @endphp </td>
                    </tr>
                    @php
                    $no++;
                    @endphp
                    @endforeach
                    @else
                    <tr>
                        <td colspan="8" align="center">Data Kosong</td>
                    </tr>
                    @endif
                </tbody>
            </table>

            <br><br><br>
        </div>
        <div class="row">
            <div class="col-md-6" align="left">
                <span><b>Total Nilai Barang Berdasarkan Filter</b></span>
            </div>
            <div class="col-md-6" align="right">
                @php echo "Rp " . number_format($totalSemua ,2,',','.'); @endphp
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>


</body>

</html>
