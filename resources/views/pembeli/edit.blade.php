<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</head>
<body>
    @extends('template.menu')
    @section('konten')
    <div class="card">
        <div class="card-header"><h1>edit data pembeli {{$pembeli->nama}}</h1></div>
    </div>
    <div class="card-body border">
        <form action="{{route("pembeli.simpan_data_update",$pembeli->id_pembeli)}}" method="POST">
            @csrf
            @method("put")
            ID id_pembeli : 
            <input type="text" name="id_pembeli" value="{{old('id_pembeli',$pembeli->id_pembeli)}}">
            @error('id_pembeli') {{message}} @enderror
            <br>
    
            nama Pembeli :
            <input type="text" name="nama" value="{{old('nama',$pembeli->nama)}}">
            <br>
    
            jenis Kelamin : 
            <select name="jns_kelamin" id="" >
                <option value="">pilih</option>
                <option value="laki-laki" {{$pembeli->jns_kelamin == "laki-laki" ? "selected" : ""}}>laki-laki</option>
                <option value="perempuan" {{$pembeli->jns_kelamin == "laki-laki" ? "selected" : ""}}>perempuan</option>
            </select>
            <br>
            
            alamat :
            <textarea name="alamat_pembeli" id="" cols="30" rows="10">
                {{old("alamat",$pembeli->alamat)}}</textarea>  
                <br>   
    
            kota : 
            <input type="text" name="kota_pembeli" id="" value="{{old("kota_pembeli",$pembeli->kota)}}">
            <br>
    
            kode_pos : 
            <input type="text" name="kode_pos_pembeli" id="" value="{{old("kode_pos",$pembeli->kode_pos)}}">
            <br>
    
            tanggal lahir :
            <input type="date" name="tgl_lahir_pembeli" id="" value="{{old("tgl_lahir",$pembeli->tgl_lahir)}}">

            <br>
            <button name="" type="submit">kirim</button> &nbsp;
            <button name=""><a href="{{route("pembeli.tampil")}}">kembali</a></button>
        </form>
    </div>
    @endsection
    @if(session('status'))
	<script>
		Swal.fire({
		title: "{{session('status')['judul']}}",
		text: "{{session('status')['pesan']}}",
		icon: "{{session('status')['icon']}}"
		});
	</script>
	@endif
</body>


</html>