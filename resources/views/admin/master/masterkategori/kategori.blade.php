@extends('layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Data Master Kategori</h4>
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
                            <a href="#">Master Kategori</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Daftar Kategori</a>
                        </li>
                    </ul>
                </div>
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Data Master Kategori</h4>
                                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#ModalTambahKategori">
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
                                                <th>Nama Kategori</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($DaftarKategori as $item)
                                                <tr>
                                                    <td>{{ $no }}</td>
                                                    <td>{{ $item->NAMA_KATEGORI }}</td>
                                                    <td>
                                                        <a href="#ModalEditKategori{{ $item->ID_KATEGORI }}" data-toggle="modal" class="btn btn-primary btn-xs"> <i class="fa fa-edit"> Edit</i></a>
                                                        <a href="#ModalHapusKategori{{ $item->ID_KATEGORI }}" data-toggle="modal" class="btn btn-danger btn-xs"> <i class="fa fa-trash"> Hapus</i></a>
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
    <div class="modal fade" id="ModalTambahKategori" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                {{-- Judul Modal --}}

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {{-- Isi Modal --}}

                <div class="modal-body">
                    {!! Form::open(['url' => '/TambahKategori', 'enctype'=>'multipart/form-data']) !!}

                    @csrf

                    <div class="form-group">
                        <label >Nama Kategori</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Kategori" required>
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
    @foreach ($DaftarKategori as $u)
    <div class="modal fade" id="ModalEditKategori{{$u->ID_KATEGORI}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                {{-- Judul Modal --}}

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Data Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {{-- Isi Modal --}}

                <div class="modal-body">
                    {!! Form::open(['url' => '/EditKategori', 'enctype'=>'multipart/form-data']) !!}

                    @csrf

                    <input type="hidden" value="{{$u->ID_KATEGORI}}"  name="id" required>
                    <div class="form-group">
                        <label >Nama Kategori</label>
                        <input type="text" value="{{$u->NAMA_KATEGORI}}" class="form-control" name="nama" placeholder="Masukkan Nama Kategori" required>
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
    @foreach ($DaftarKategori as $h)
    <div class="modal fade" id="ModalHapusKategori{{$h->ID_KATEGORI}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                {{-- Judul Modal --}}

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {{-- Isi Modal --}}

                <div class="modal-body">
                    {!! Form::open(['url' => '/HapusKategori', 'enctype'=>'multipart/form-data']) !!}

                    @csrf

                    <input type="hidden" value="{{$h->ID_KATEGORI}}"  name="id" required>
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
