{{-- 
@extends('template.menu')
@section('konten')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit user Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="container p-5">
        <form action="{{ route('user.simpan_edit', $user->id) }}" method="post">
            @csrf
            @method('put')
            <div class="card p-5">
                <h3 class="text-center mb-4">Updaete data user</h3> <!-- Title for the form -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{old('name',$user->name)}}">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" value="{{old('username',$user->username)}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{old('email',$user ->email)}}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" value="{{old('password',$user->password)}}">
                </div>
                <div class="form-group">
                    <label for="level">Level</label>
                    <select id="level" name="level" class="form-control">
                        <option value="user" {{ old('level', $user->level) == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ old('level', $user->level) == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary my-3" class="">update data</button>
                <a href="{{ route('user.tampil') }}" class="btn btn-secondary">Kembali</a>
             </div>
        </form>
    </div>
</body>

</html>
@endsection --}}

@extends('template.menu')
@section('konten')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="container p-5">
        <form action="{{ route('user.simpan_edit', $user->id) }}" method="post">
            @csrf
            @method('put')
            <div class="card p-5">
                <h3 class="text-center mb-4">Update Data User</h3>
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" value="{{ old('username', $user->username) }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                </div>
                <div class="form-group">
                    <label for="level">Level</label>
                    <select id="level" name="level" class="form-control">
                        <option value="user" {{ old('level', $user->level) == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ old('level', $user->level) == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary my-3">Update Data</button>
                <a href="{{ route('user.tampil') }}" class="btn btn-secondary">Kembali</a>
             </div>
        </form>
    </div>

    <script>
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}'
            });
        @elseif(session('info'))
            Swal.fire({
                icon: 'info',
                title: 'Info',
                text: '{{ session('info') }}'
            });
        @elseif($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Kesalahan',
                text: '{{ $errors->first() }}'
            });
        @endif
    </script>
</body>
</html>
@endsection

