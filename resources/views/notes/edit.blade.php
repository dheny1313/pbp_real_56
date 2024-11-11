@extends('template.menu')
@section('konten')
    

<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Note</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('note.index') }}" enctype="multipart/form-data"> Back</a>
            </div>
        </div>
    </div>

  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif

    <form action="{{ route('note.simpan_edit',$note->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>note Name:</strong>
                    <input type="text" name="judul" value="{{ $note->judul }}" class="form-control" placeholder="please enter judul">
                    @error('judul')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>deskripsi:</strong>
                    <input type="text" name="deskripsi" value="{{ $note->deskripsi }}" class="form-control" placeholder="Please enter deskripsi">
                    @error('deskripsi')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <br>
                    <input type="radio" name="status" id="" value="done" {{ $note->status == 'done' ? 'checked' : '' }}> Selesai
                    <br>
                    <input type="radio" name="status" id="" value="no" {{ $note->status == 'no' ? 'checked' : '' }}> Belum Selesai
                    @error('status')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
             <div class="col-xs-6 col-sm-6 col-md-6 mt-2">
              <button type="submit" class="btn btn-primary ml-3">Submit</button>
          </div>

        </div>

    </form>
</div>

@endsection