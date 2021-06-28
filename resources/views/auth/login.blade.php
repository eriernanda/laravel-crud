<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="col-md-4 offset-md-4 mt-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Login</h3>
                </div>
                <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for=""><strong>Email</strong></label>
                        <input type="text" name="email" class="form-control" placeholder="Email">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for=""><strong>Password</strong></label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                    @if (session('status'))
                        <h7 class="text-center text-danger text-bold">{{ session('status') }}</h7>
                    @endif
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                    <p class="text-center">Belum punya akun? <a href="{{ route('register') }}">Daftar</a> sekarang!</p>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>