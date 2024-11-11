<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="container p-5">
        <form action="{{ route('registrasi_simpan') }}" method="post">
            @csrf
            <div class="card p-5">
                <h3 class="text-center mb-4">Register</h3> <!-- Title for the form -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="level">Level</label>
                    <select id="level" name="level" class="form-control" required>
                        <option value="user">User</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary my-3" class="">Kirim</button>
                <a href="{{ route('login') }}" class="btn btn-secondary">Kembali</a>
             </div>
        </form>
    </div>
</body>

</html>
