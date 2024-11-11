@extends('template.menu')

@section('konten')

<div class="card">
    <div class="card-header">
        <h1>tambah data barang</h1>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('barang.store') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label for="id_barang">ID Barang:</label>
                <input class="form-control" type="text" name="id_barang" id="id_barang" value="{{$kode_baru}}" readonly>
                @error('id_barang') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
        
            <div class="mb-3">
                <label for="nama_barang">Nama Barang:</label>
                <input class="form-control" type="text" name="nama_barang" id="nama_barang">
                @error('nama_barang') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
           
            <div class="mb-3">
                <label for="varian_baru" >varian_baru :</label>
                <input type="text" name="varian_baru" class="form-control" id="varian_baru" placeholder="masukkan varian_baru jika tidak ada">
                @error('varian_baru') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label for="varian">Varian :</label>
                <select name="varian" class="form-control">
                    <option value="">__pilih__varian yang sudah ada</option>
                    @foreach($varianList as $varian) <!-- $varianList adalah array atau koleksi dari database -->
                        <option value="{{ $varian }}">{{ $varian}}</option>
                    @endforeach
                </select>
            </div>
           
            <div class="mb-3">
                <label for="harga_beli">Harga Beli:</label>
                <input class="form-control" type="text" name="harga_beli" id="harga_beli">
                @error('harga_beli') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            
            <div class="mb-3">
                <label for="harga_jual">Harga Jual:</label>
                <input class="form-control" type="text" name="harga_jual" id="harga_jual">
                @error('harga_jual') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="foto" >foto :</label>
                <input type="file" name="foto" class="form-control" id="foto"  accept="" placeholder="masukkan foto jika tidak ada">
                @error('foto') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
           
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
        
        </form>
    </div>
</div>


@endsection
