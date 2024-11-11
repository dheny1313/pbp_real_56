@extends('template.menu')
@section('konten')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>edit data</h1>
        </div>
        <div class="card-body">
            <form action="{{route('barang.update',$barang->id_barang)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method ("PUT")
                <div class="mb-3">
                    <label for="id_barang">
                        ID barang
                    </label>
                    <input class="form-control" type="text" name="id_barang" readonly value="{{old('id_barang',$barang->id_barang) }}">
                @error ("id_barang") {{message}} @enderror
                </div>
              
                
               <div class="mb-3">
                <label for="nama barang">nama barang : </label>
                <input class="form-control" type="text" name="nama_barang" value="{{old('nama',$barang->nama) }}">
                @error ("nama_barang") {{message}} @enderror
               </div>
               
               {{-- <div class="mb-3">
               <label for="varian"> varian :</label>
                <select name="varian" class="form-control">
                    <option value="">__pilih__</option>
                    <option value="sembako" {{$barang->varian == "sembako" ? "selected" : "" }}>sembako</option>
                    <option value="pakaian" {{$barang->varian == "pakaian" ? "selected" : "" }}>pakaian</option>
                </select>
               </div> --}}

               <div class="mb-3">
    <label for="varian">Varian :</label>
    <select name="varian" class="form-control">
        <option value="">__pilih__</option>
        @foreach($varianList as $varian) <!-- $varianList adalah array atau koleksi dari database -->
            <option value="{{ $varian }}" {{ $barang->varian == $varian ? "selected" : "" }}>{{ $varian}}</option>
        @endforeach
    </select>
</div>
               
               
        <div class="mb-3">
        <label for="harga_beli ">harga beli : </label>    
        <input class="form-control" type="text" name="beli" value="{{old('harga_beli',$barang->harga_beli) }}">
        @error ("harga_beli") {{message}} @enderror

        </div>       
            <div class="mb-3">
                <label for="harga_jual">harga jual</label>
                <input class="form-control" type="text" name="jual" value="{{old('harga_jual',$barang->harga_jual) }}">
                @error ("harga_jual") {{message}} @enderror
            </div>
               
            <div class="mb-3">
                <label for="foto" >foto :</label>
                <input type="file" name="foto" class="form-control" id="foto"  accept="" placeholder="masukkan foto jika tidak ada">
                @error('foto') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
           
            
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{route('barang.index')}}" class="btn btn-secondary">Kembali</a>
            
            </form>
        </div>
    </div>
</div>

@endsection
