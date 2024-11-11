<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit suplier</title>
</head>

<body>
    @extends('template.menu')
    @section('konten')

    <form action="{{route('suplier.update',$suplier->id_suplier)}}" method="post">
        @csrf
        @method ("PUT")
        <div class="mb-3">
            id_suplier :
            <input class="form-control" type="text" name="id_s" id="" value="{{old('id_suplier',$suplier->id_suplier)}}">
            @error("id_suplier") {{$message}} @enderror
            
        </div>
      
        <div class="mb-3">
            nama suplier :
            <input class="form-control" type="text" name="nama_s" id="" value="{{old('nama',$suplier->nama)}}">
        </div>
       <div class="mb-3">
        alamat :
        <input class="form-control" type="text" name="alamat_s" value={{old('alamat',$suplier->alamat)}}>
        
       </div>
      
       <div class="mb-3">
        kode pos :
        <input class="form-control" type="text" name="kode_pos" id="" value={{old('kode_pos',$suplier->kode_pos)}}>
        

       </div>
       
       <div class="mb-3">
        kota :
        <input class="form-control" type="text" name="kota_s" id="" value={{old('kota',$suplier->kota)}}>
        
       </div>
      

        <button type="submit" class="btn btn-info">simpan</button>
        <button class="btn btn-warning"><a href="{{route('suplier.index')}}">kembali</a></button>
    </form>

    @endsection

</body>

</html>