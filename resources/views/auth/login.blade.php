<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>


{{-- swith alert  --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card px-5 py-5">
                    <form action="{{route('login_proses')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">Username : </label>
                            <input type="text" name="username" class="form-control" placeholder="Enter your username">
                            <div>
                                @error('username')
                                <span style="color:crimson">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Password :</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password">
                            <div>
                                @error('password')
                                <span style="color:crimson">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6  ">
                            <button type="submit" class="btn btn-primary btn-lg">Login</button>
                        </div>

                        <div>
                            <p>belum punya akun ? <a href="{{route('registrasi')}}">Registrasi</a></p>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@if (session('status_login'))
<script>
    Swal.fire({
        title : "{{session('status_login')['judul']}}"
        text : "{{session('status_login')['pesan']}}"
        icon : "{{session('status_login')['icon']}}"
    })
</script>
    
@endif

</body>

</html>