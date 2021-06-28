@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Tambah Data Baru</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('barangs.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <form action="{{ route('barangs.store') }}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gambar</strong>
                <input type="file" name="gambar" class="form-control" >
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Barang</strong>
                <input type="text" name="nm_barang" class="form-control" placeholder="Nama Barang">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kategori</strong>
                <select name="kategori" class="form-control">
                    <option value=""></option>
                    <option value="Retail">Retail</option>
                    <option value="Wholesale">Wholesale</option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga</strong>
                <input type="text" name="harga" class="form-control" placeholder="Harga">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    </form>
@endsection