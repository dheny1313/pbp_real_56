
@extends('template.menu')
@section('konten')


<div class="container mt-2">
<div class="row">
        <div class="col-lg-12 card">
            <div class="card-header">
                <h2>catatan update dan note dari pengembangan aplikasi</h2>
                <a class="btn btn-success" href="{{ route('note.tambah') }}"> Create Note</a>
            </div>    
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered" id="example">
    <thead>
        <tr>
            <th>no</th>
            <th>judul</th>
            <th>deskripsi</th>
            <th>status</th>
            <th width="280px">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($notes as $nts)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td class="{{ $nts->status == 'done' ? 'bg-warning text-white' : '' }}">{{ $nts->judul }}</td>
            <td class="{{ $nts->status == 'done' ? 'bg-warning text-white' : '' }}">{{ $nts->deskripsi }}</td>
            <td>{{ $nts->status }}</td>
            <td>
                <form action="{{ route('note.hapus',$nts->id) }}" method="Post">
    
                    <a class="btn btn-primary" href="{{ route('note.edit',$nts->id) }}">Edit</a>
    
                    @csrf
                    @method('DELETE')
    
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach    
    </tbody>
</table>  

@endsection
