<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Transaksi Masuk</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">


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

        /* table {
            border-collapse: collapse;
        } */
    </style>
</head>

<body>
    <div class="container">
        <h3 class="text-center mt-2 mb-2">Laporan Transaksi Keluar</h3>

        <div class="table-responsive mt-3">
            <table border="1" cellspacing="" cellpadding="4" width="100%">
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
                    </tr>
                </thead>

                <tbody>

                    @php
                        $no = 1;
                    @endphp
                    @if (!empty($DaftarBarangKeluar))
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
        </div>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
            integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
        </script>


</body>

</html>
