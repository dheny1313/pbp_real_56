@extends("template.menu")
@section("konten")
<div class="card">
    <div class="card-header">
        <h1>{{$judul}}</h1>
    </div>
    <div class="card-body">
        <form action="{{route('pesanan.simpan_edit',$pesanan->id_pesanan)}}" method="post">
            @csrf
            @method ("PUT")
            <div class="mb-3">
                <label for="" class="form-label">ID Pesanan</label>
                <input type="text" class="form-control" id="id_pesanan" name="id_pesanan" value="{{old('id_pesanan',$pesanan->id_pesanan)}}" >
                @error("id_pesanan") {{message}} @enderror
              </div>

              <div class="mb-3">
                <label for="id_pembeli" class="form-label">Nama Pembeli</label>
                <select name="id_pembeli" id="id_pembeli" class="form-control">
                    <option value="" disabled {{ old('id_pembeli') ? '' : 'selected' }}>Pilih pembeli</option>
                    @foreach($pembeli as $p)
                        <option value="{{ $p->id_pembeli }}" 
                            {{ old('id_pelanggan' ,$pesanan->id_pelanggan) == $p->id_pembeli ? 'selected' : '' }}>
                            {{ $p->nama }}</option>
                    @endforeach
                </select>
                @error('id_pembeli') <div class="text-danger">{{ $message }}</div> @enderror 
            </div>
            
            <div class="mb-3">
                <label for="id_barang" class="form-label">Nama Barang</label>
                <select name="id_barang" id="id_barang" class="form-control">
                    <option value="" disabled {{ old('id_barang') ? '' : 'selected' }}>Pilih Barang</option>
                    @foreach ($barang as $b)
                        <option value="{{ $b->id_barang }}" 
                            {{ old('id_barang', $pesanan->id_barang) == $b->id_barang ? 'selected' : '' }}>
                            {{ $b->nama_barang }} <!-- Pastikan Anda menggunakan 'nama_barang' -->
                        </option>
                    @endforeach
                </select>
                @error('id_barang') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">Qty</label>
                <input type="number" class="form-control" id="qty" name="qty" value="{{old('qty',$pesanan->qty)}}" >
                @error('qty') {{message}} @enderror
              </div>
        
              <div class="mb-3">
                <label for="" class="form-label">tanggal pesan</label>
                <input type="date" class="form-control" id="tgl_pesan" name="tgl_pesan" value="{{old('tgl_pesan',$pesanan->tgl_pesan)}}" >
                @error('tgl_pesan') {{message}} @enderror
              </div> 
        
            <button name="" type="submit">kirim</button>
            <button name=""><a href="{{route("pesanan.tampil")}}">kembali</a></button>
        </form>
    </div>
</div>
@endsection