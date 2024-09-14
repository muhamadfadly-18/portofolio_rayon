<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login App</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Container utama -->
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-no-repeat bg-cover bg-center"
    style="background-image: url('{{ asset('img/wikrama.png') }}'); 
           background-size: cover; 
           background-position: center; 
           z-index: -1;">
</div>

<!-- Adjust the overlay gradient -->
<div class="position-absolute top-0 start-0 w-100 h-100" 
    style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3));">
</div>

    

        {{-- <!-- Overlay gradasi warna -->
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-gradient" style="opacity: 0.5;"></div> --}}

        <!-- Konten utama -->
        <div class="position-relative z-1 d-flex flex-column align-items-center">
            <div class="text-white mb-5 text-center mt-5">
                <h1 class="mb-3 fw-bold display-3">SELAMAT DATANG RAYON CICIURUG 4</h1>
            </div>

            <div class="p-4 bg-white rounded-4 shadow-lg" style="max-width: 400px; width: 100%;">
                <div class="mb-4 text-center">
                    <h3 class="fw-semibold display-6">Sign In</h3>
                    <p class="text-muted">Please sign in to your account.</p>
                </div>
                <form action="{{ route('login.auth') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                            placeholder="mail@gmail.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Enter your password" value="{{ old('password') }}" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Sign in</button>
                    </div>
                </form>
                <div class="pt-3 text-center text-muted small">
                    <span>
                        Copyright © 2021-2022
                        <a href="https://codepen.io/uidesignhub" target="_blank" class="text-decoration-none">Ajimon</a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
