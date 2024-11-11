@extends("template.menu")
@section("konten")
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>edit data pembelian</h1>
        </div>
        <div class="card-body">
            <form action="{{route("pembelian.simpan_edit",$pembelian->id_pembelian)}}" method="post">
                @csrf
                @method ("PUT")
            <div class="mb-3">
                <label for="" class="form-label">ID pembelian</label>
                <input type="text" class="form-control" id="id_pembelian" name="id_pembelian" value="{{old('id_pembelian',$pembelian->id_pembelian)}} "@readonly(true) >
                @error("id_pembelian") {{message}} @enderror
              </div>

              <div class="mb-3">
                <label for="id_barang" class="form-label">Nama barang</label>
                <select name="id_barang" id="id_barang" class="form-control">
                    <option value="" disabled {{ old('id_barang') ? '' : 'selected' }}>Pilih barang</option>
                    @foreach($barang as $p)
                        <option value="{{ $p->id_barang }}" 
                            {{ old('id_barang' ,$pembelian->id_barang) == $p->id_barang ? 'selected' : '' }}>
                            {{ $p->nama_barang }}</option>
                    @endforeach
                </select>
                @error('id_barang') <div class="text-danger">{{ $message }}</div> @enderror 
            </div>
            
            <div class="mb-3">
                <label for="id_suplier" class="form-label">Nama suplier</label>
                <select name="id_suplier" id="id_suplier" class="form-control">
                    <option value="" disabled {{ old('id_suplier') ? '' : 'selected' }}>Pilih suplier</option>
                    @foreach ($suplier as $s)
                        <option value="{{ $s->id_suplier }}" 
                            {{ old('id_barang', $pembelian->id_suplier) == $s->id_suplier ? 'selected' : '' }}>
                            {{ $s->nama_suplier }} <!-- Pastikan Anda menggunakan 'nama_barang' -->
                        </option>
                    @endforeach
                </select>
                @error('id_suplier') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">Qty</label>
                <input type="number" class="form-control" id="qty" name="qty" value="{{old('qty',$pembelian->qty)}}" >
                @error('qty') {{message}} @enderror
              </div>
        
              <div class="mb-3">
                <label for="" class="form-label">tanggal pembelian</label>
                <input type="date" class="form-control" id="tgl_pembelian" name="tgl_pembelian" value="{{old('tgl_pembelian',$pembelian->tgl_pembelian)}}" >
                @error('tgl_pembelian') {{message}} @enderror
              </div> 
              <hr>
              <button type="submit" class="btn btn-sm btn-primary">Simpan Edit</button>
              <button><a  class="btn btn-warning" href="{{route('pembelian.tampil')}}">kembali</a></button>
            </form>
        </div>
    </div>

</div>

@endsection

{{-- @extends("template.menu")
@section("konten")
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Edit Data Pembelian</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('pembelian.simpan_edit', $pembelian->id_pembelian) }}" method="post">
                @csrf
                @method("PUT")
                <div class="mb-3">
                    <label for="" class="form-label">ID Pembelian</label>
                    <input type="text" class="form-control" id="id_pembelian" name="id_pembelian" value="{{ old('id_pembelian', $pembelian->id_pembelian) }}">
                    @error('id_pembelian') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="id_barang" class="form-label">Nama Barang</label>
                    <select name="id_barang" id="id_barang" class="form-control">
                        <option value="" disabled {{ old('id_barang') ? '' : 'selected' }}>Pilih Barang</option>
                        @foreach($barang as $p)
                            <option value="{{ $p->id_barang }}" 
                                {{ old('id_barang', $pembelian->id_barang) == $p->id_barang ? 'selected' : '' }}>
                                {{ $p->nama_barang }}</option>
                        @endforeach
                    </select>
                    @error('id_barang') <div class="text-danger">{{ $message }}</div> @enderror 
                </div>
                
                <div class="mb-3">
                    <label for="id_suplier" class="form-label">Nama Suplier</label>
                    <select name="id_suplier" id="id_suplier" class="form-control">
                        <option value="" disabled {{ old('id_suplier') ? '' : 'selected' }}>Pilih Suplier</option>
                        @foreach ($suplier as $s)
                            <option value="{{ $s->id_suplier }}" 
                                {{ old('id_suplier', $pembelian->id_suplier) == $s->id_suplier ? 'selected' : '' }}>
                                {{ $s->nama_suplier }}</option>
                        @endforeach
                    </select>
                    @error('id_suplier') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
                
                <div class="mb-3">
                    <label for="" class="form-label">Qty</label>
                    <input type="number" class="form-control" id="qty" name="qty" value="{{ old('qty', $pembelian->qty) }}">
                    @error('qty') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
        
                <div class="mb-3">
                    <label for="" class="form-label">Tanggal Pembelian</label>
                    <input type="date" class="form-control" id="tgl_pembelian" name="tgl_pembelian" value="{{ old('tgl_pembelian', $pembelian->tgl_pembelian) }}">
                    @error('tgl_pembelian') <div class="text-danger">{{ $message }}</div> @enderror
                </div> 
                <hr>
                <button type="submit" class="btn btn-sm btn-primary">Simpan Edit</button>
                <a class="btn btn-warning" href="{{ route('pembelian.tampil') }}">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection --}}
