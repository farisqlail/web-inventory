@extends('layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Data Master Supplier</h4>
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
                            <a href="#">Master Supplier</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Daftar Supplier</a>
                        </li>
                    </ul>
                </div>
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Data Master Supplier</h4>
                                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#ModalTambahSupplier">
                                        <i class="fa fa-plus"></i>
                                       Tambah Data
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>No Telephone</th>
                                                <th>Kota</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($DaftarSupplier as $item)
                                                <tr>
                                                    <td>{{ $no }}</td>
                                                    <td>{{ $item->NAMA_SUPPLIER }}</td>
                                                    <td>{{ $item->ALAMAT_SUPPLIER }}</td>
                                                    <td>{{ $item->TLP_SUPPLIER }}</td>
                                                    <td>{{ $item->KOTA_SUPPLIER }}</td>

                                                    <td>
                                                        <a href="#ModalEditSupplier{{ $item->ID_SUPPLIER }}" data-toggle="modal" class="btn btn-primary btn-xs"> <i class="fa fa-edit"> Edit</i></a>
                                                        <a href="#ModalHapusSupplier{{ $item->ID_SUPPLIER }}" data-toggle="modal" class="btn btn-danger btn-xs"> <i class="fa fa-trash"> Hapus</i></a>
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

    {{-- Modal Tambah --}}
    <div class="modal fade" id="ModalTambahSupplier" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                {{-- Judul Modal --}}

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {{-- Isi Modal --}}

                <div class="modal-body">
                    {!! Form::open(['url' => '/TambahSupplier', 'enctype'=>'multipart/form-data']) !!}

                    @csrf

                    <div class="form-group">
                        <label >Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="form-group">
                        <label >Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat" required >
                    </div>
                    <div class="form-group">
                        <label >Nomor Telepone</label>
                        <input type="text" class="form-control" name="tlp" placeholder="Masukkan Nomer Telepone" required>
                        </div>
                    <div class="form-group">
                        <label >Alamat</label>
                        <input type="text" class="form-control" name="kota" placeholder="Masukkan Kota" required>
                    </div>

                </div>

                {{-- Bawah Modal --}}

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>

    {{-- Modal Update --}}
    @foreach ($DaftarSupplier as $u)
    <div class="modal fade" id="ModalEditSupplier{{$u->ID_SUPPLIER}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                {{-- Judul Modal --}}

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Data Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {{-- Isi Modal --}}

                <div class="modal-body">
                    {!! Form::open(['url' => '/EditSupplier', 'enctype'=>'multipart/form-data']) !!}

                    @csrf

                    <input type="hidden" value="{{$u->ID_SUPPLIER}}"  name="id" required>
                    <div class="form-group">
                        <label >Nama</label>
                        <input type="text" value="{{$u->NAMA_SUPPLIER}}" class="form-control" name="nama" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="form-group">
                        <label >Alamat</label>
                        <input type="text" value="{{$u->ALAMAT_SUPPLIER}}" class="form-control" name="alamat" placeholder="Masukkan Alamat" required >
                    </div>
                    <div class="form-group">
                        <label >Nomor Telepone</label>
                        <input type="text" value="{{$u->TLP_SUPPLIER}}" class="form-control" name="tlp" placeholder="Masukkan Nomer Telepone" required>
                        </div>
                    <div class="form-group">
                        <label >Alamat</label>
                        <input type="text" value="{{$u->KOTA_SUPPLIER}}" class="form-control" name="kota" placeholder="Masukkan Kota" required>
                    </div>

                </div>

                {{-- Bawah Modal --}}

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
    @endforeach

    {{-- ModalHapus --}}
    @foreach ($DaftarSupplier as $h)
    <div class="modal fade" id="ModalHapusSupplier{{$h->ID_SUPPLIER}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                {{-- Judul Modal --}}

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {{-- Isi Modal --}}

                <div class="modal-body">
                    {!! Form::open(['url' => '/HapusSupplier', 'enctype'=>'multipart/form-data']) !!}

                    @csrf

                    <input type="hidden" value="{{$h->ID_SUPPLIER}}"  name="id" required>
                    <div class="form-group">
                        <h4> Apakah Anda Ingin Menghapus Data Ini ? </h4>
                    </div>


                </div>

                {{-- Bawah Modal --}}

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                    <button type="submit" class="btn btn-danger"> <i class="fa fa-trash" >Hapus Data</i> </button>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
    @endforeach



@endsection
