@extends('template.menu')
@section('konten')
    <div class="card">
        <div class="card-header">
            <h1>selamat datang di {{$judul}}</h1>
            <h6><a href="{{route('user.tambah')}}" class="btn btn-success">tambah data user </a></h6>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <a href="{{route('user.cetak')}}" target="_blank" class="btn btn-info btn-sm">cetak semua data user</a>
        </div>
        
        <div class="card-body">
            <table class="table" id="example">
                <thead>
                    <tr>
                        <td>no </td>
                        <td>nama : </td>
                        <td>username : </td>
                        <td>level : </td>
                        <td>email : </td>
                        <td>aksi </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->username}}</td>
                        <td>{{$item->level}}</td>
                        <td>{{$item->email}}</td>
                        <td>
                            <form onsubmit="return confirm('Yakin hapus data user ini?');" action="{{ route('user.hapus', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                                <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            </form>
                            <a href="{{route('user.cetak_user',$item->id)}}"  target="_blank" class="btn btn-info btn-sm"><i class="fa "></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
