@extends("template.menu")
@section("konten")
<div class="card">
  <div class="card-header">
    <h1>{{$judul}}</h1>
  </div>
  <div class="card-body">
    <form action="{{route('pesanan.simpan')}}" method="post">
      @csrf
      <div class="mb-3">
          <label for="" class="form-label">ID Pesanan</label>
          <input type="text" class="form-control" id="id_pesanan" name="id_pesanan" readonly value="{{$kode_pesanan_baru}}" >
          @error('id_pesanan') {{message}} @enderror
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Nama pembeli </label>
          <select name="id_pembeli" id="" class="form-control">
              <option value="">pilih nama pembeli</option>
              @foreach($pembeli as $p)
              <option value="{{$p->id_pembeli}}">{{$p->nama}}</option>
              @endforeach
          </select>
          @error('id_pembeli') {{message}} @enderror
        </div>
  
        <div class="mb-3">
          <label for="" class="form-label">Nama Barang </label>
          <select name="id_barang" id="" class="form-control">
              <option value="">pilih barang</option>
              @foreach($barang as $b)
              <option value="{{$b->id_barang}}">{{$b->nama_barang}}</option>
              @endforeach
          </select>
          @error('id_barang') 
          <div class="text-danger">{{ $message }}</div> 
          @enderror
        </div>
  
        <div class="mb-3">
          <label for="" class="form-label">Qty</label>
          <input type="number" class="form-control" id="qty" name="qty" >
          @error('qty') {{message}} @enderror
        </div>
  
        <div class="mb-3">
          <label for="" class="form-label">tanggal pesan</label>
          <input type="date" class="form-control" id="tgl_pesan" name="tgl_pesan" >
          @error('tgl_pesan') {{message}} @enderror
        </div> 
  
      <button name="" type="submit" class="btn btn-success btn-sm">kirim</button>
      <button name="" class="btn btn-warning btn-sm"><a href="{{route("pesanan.tampil")}}">kembali</a></button>
  </form>
  </div>
</div>
@endsection