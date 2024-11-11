@extends('template.menu')

@section('konten')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <!-- You can add additional content here if needed -->
        </div>
    </div>

    @if(session('status'))
    <div class="alert alert-success mb-1 mt-1">
        {{ session('status') }}
    </div>
    @endif

    <form action="{{ route('note.simpan') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Judul:</strong>
                    <input type="text" name="judul" class="form-control" placeholder="Judul">
                    @error('judul')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Deskripsi:</strong>
                    <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi">
                    @error('deskripsi')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <br>
                    <input type="radio" name="status" id="" value="done"> Selesai
                    <br>
                    <input type="radio" name="status" id="" value="no"> Belum Selesai
                    @error('status')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mx-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="">
                <a class="btn btn-warning" href="{{ route('note.index') }}"> Back</a>
            </div>
        </div>
    </form>
</div>
@endsection
