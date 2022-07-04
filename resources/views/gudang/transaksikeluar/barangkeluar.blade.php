@extends('layout.layout')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Tambah Barang Keluar</h4>
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
                        <a href="#">Transaksi Barang</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Barang Keluar</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Tambah Barang Keluar</div>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['url' => '/TambahDataBarangKeluar', 'enctype' => 'multipart/form-data']) !!}

                            <div class="form-group">
                                <label>Nama Barang</label>
                                <select class="form-control" name="barang" id="barang" onchange="cari_harga(this.value)" required>
                                    <option value="" hidden>---- Pilih Barang ----</option>

                                    @foreach ($DaftarBarang as $db)
                                    <option value="{{ $db->ID_BARANG }}">{{ $db->NAMA_BARANG }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group" id="hargabarang"></div>

                            <div class="form-group">
                                <label>Nama Karyawan</label>
                                <input type="text" class="form-control" placeholder=" {{ Session::get('user')[1] }}"   readonly required>
                                    <input type="hidden" class="form-control" value=" {{ Session::get('user')[0] }}" name="karyawan"  readonly required>
                            </div>

                            <div class="form-group">
                                <label>Tanggal Keluar</label>
                                <input type="date" class="form-control" name="tgl_keluar" placeholder="Masukkan Tanggal Keluar Barang" required>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Keluar</label>
                                <input type="number" onkeyup="perkalian(this.value)" class="form-control" name="jml_keluar" placeholder="Masukkan Jumlah Keluar Barang" min="0" required>
                            </div>

                            <div class="form-group">
                                <label>Total Harga Keluar Keluar</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Rp</span>
                                    </div>
                                    <input type="number" id="tot_keluar" class="form-control" name="tot_keluar" placeholder="Masukkan Jumlah Keluar Barang" readonly required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Keterangan</label>
                                <select class="form-control" name="keterangan" required>
                                    <option value="" hidden>---- Pilih Keterangan ----</option>
                                    <option value="Pengiriman"> Pengiriman</option>
                                    <option value="Display">Display</option>

                                </select>
                            </div>




                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-success">Tambahkan </button>
                            <a href="transaksibarangkeluar" class="btn btn-danger">Cancel</a>
                        </div>

                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<script src="public/assets/js/core/jquery.3.2.1.min.js"></script>

<script>
    function cari_harga(val) {
        const url = "transaksitambahbarangkeluarAjax"; // get the url of the view
        $.ajax({ // initialize an AJAX request
            url: url, // set the url of the request (=)
            data: {
                'ID_BARANG': val // add the country id to the GET parameters
            },
            success: function(data) { // `data` is the return of the view function
                $("#hargabarang").html(data);
            }
        });
    }

    function perkalian(val) {
        document.getElementById("tot_keluar").value = document.getElementById("harga_keluar").value * val;
    }
</script>


@endsection
