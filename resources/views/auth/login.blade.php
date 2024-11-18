<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión - GameTeca</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to bottom, #4c6ef5, #9b59b6);
            color: #ffffff;
            font-family: 'Arial', sans-serif;
            min-height: 100vh;
        }
        .card {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .btn-custom {
            background-color: #4c6ef5;
            color: #fff;
        }
        .btn-custom:hover {
            background-color: #365bd6;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4 w-100" style="max-width: 400px;">
            <div class="text-center mb-4">
                <h2 class="fw-bold text-primary">Bienvenido a GameTeca</h2>
                <p class="text-muted">¡Inicia sesión para acceder a la plataforma!</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" name="email" id="email" class="form-control" required autofocus value="{{ old('email') }}">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" name="remember" id="remember" class="form-check-input">
                    <label for="remember" class="form-check-label">Recuérdame</label>
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-custom">Iniciar Sesión</button>
                </div>

                <div class="text-center">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-primary">¿Olvidaste tu contraseña?</a>
                    @endif
                </div>
            </form>

            @if (Route::has('register'))
                <div class="text-center mt-3">
                    <p class="text-muted">¿No tienes cuenta? <a href="{{ route('register') }}" class="text-primary">Regístrate</a></p>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
