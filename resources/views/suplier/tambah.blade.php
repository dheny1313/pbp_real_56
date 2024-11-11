@extends('template.menu')
@section('konten')

<div class="card">
    <div class="card-header">
        <h1>tambah data suplier</h1>
    </div>
    <div class="card-body">
        <form action="{{route('suplier.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="id_suplier">id suplier</label>
                <input type="text" name="id_s" id="" required class="form-control" readonly value="{{$kode_baru}}">
            @error("id_suplier") {{$message}} @enderror
            </div>

            <div class="mb-3">
                <label for="nama_s">nama suplier</label>
            <input type="text" name="nama_s" id="" required class="form-control">

            </div>
        
           
            <div class="mb-3">
                alamat :
                <input type="text" name="alamat_s" required class="form-control">
            </div>
            <div class="mb-3">
                kode pos :
                <input type="text" name="kode_pos" id="" required class="form-control">
            </div>

           <div class="mb-3">
            kota :
            <input type="text" name="kota_s" id="" required class="form-control">
           </div>
           
            
        
            <button type="submit" class="btn btn-sm btn-info">simpan</button>
            <button class="btn btn-sm btn-warning"><a href="{{route('suplier.index')}}">kembali</a></button>
        
        
        
        </form>
    </div>
</div>


@endsection
