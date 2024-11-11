<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tambah data pembeli</title>
</head>
<body>
    @extends('template.menu')
    @section('konten')
    <div class="card">
        <div class="card-header">
            <h1>tambah data pembeli</h1>
        </div>
        <div class="card-body">
            <form action="{{route("pembeli.simpan_data")}}" method="post">
                @csrf
                ID id_pembeli : 
                <input type="text" name="id_pembeli" readonly value="{{$kode_pembeli}}">
                @error('id_pembeli') {{message}} @enderror'
                <br>
        
                nama Pembeli :
                <input type="text" name="nama">
                <br>
        
                jenis Kelamin : 
                <select name="jns_kelamin" id="">
                    <option value="">pilih</option>
                    <option value="laki-laki">laki -laki</option>
                    <option value="perempuan">perempuan</option>
                </select>
                <br>
                
                alamat :
                <textarea name="alamat_pembeli" id="" cols="30" rows="10">
                    </textarea>  
                    <br>   
        
                kota : 
                <input type="text" name="kota_pembeli" id="">
                <br>
        
                kode_pos : 
                <input type="text" name="kode_pos_pembeli" id="">
                <br>
        
                tanggal lahir :
                <input type="date" name="tgl_lahir_pembeli" id="">
        
                <button name="" type="submit">kirim</button>
                <button name=""><a href="{{route("pembeli.tampil")}}">kembali</a></button>
            </form>
        </div>
    </div>
  
@endsection
</body>

</html>