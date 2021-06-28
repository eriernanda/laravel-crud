@extends('template')

@section('content')
    <center>
        <h2>Manajemen Barang</h2> <br>
        @if (auth()->user()->hak_akses == "superuser")
            <h4><a href="{{ route('barangs.create') }}">+ Data baru</a></h4>
        <br><br>
        <table class="table table-bordered">
            <tr>
                <th>No.</th>
                <th>Gambar</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Diskon</th>
                @if (auth()->user()->hak_akses == "superuser")
                    <th>Aksi</th>
                @endif
            </tr>
            @foreach ($barangs as $barang)
            <tr>
                <td>{{ ++$i }}</td>
                <td ><img src="{{ asset('images/' . $barang->gambar) }}" class="img-thumbnail"></td>
                <td>{{ $barang->nm_barang }}</td>
                <td>{{ $barang->kategori }}</td>
                <td>Rp. {{ number_format($barang->harga, 2, ',', '.') }}</td>
                <td>Rp. {{ number_format($barang->diskon, 2, ',', '.') }}</td>
                @if (auth()->user()->hak_akses == "superuser")
                    <td><form action="{{ route('barangs.destroy', $barang->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <a  class="btn btn-primary btn-sm" href="{{ route('barangs.edit', $barang->id) }}">Edit</a>
                        <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">Delete</button>
                    </form></td>
                @endif
                
            </tr>
            @endforeach
        </table>
        @endif

    </center>
    @if (auth()->user()->hak_akses == "user")
        @foreach ($barangs as $b)
            <fieldset class="border p-2 form-group" style="background-color: beige">
                    <legend class="w-auto">{{ $b->nm_barang }}</legend>
                    <center>
                        <img src="{{ asset('images/' . $b->gambar) }}" style="max-width: 500px">
                        <h5>Harga : Rp. {{ number_format($b->harga, 2, ',', '.') }}</h5>
                        @if ($b->diskon != 0)
                            <h5>Diskon : Rp. {{ number_format($b->diskon, 2, ',', '.') }}</h5>
                        @endif
                        <small>Kategori : {{ $b->kategori }}</small>
                    </center>
            </fieldset>
        @endforeach
    @endif
@endsection