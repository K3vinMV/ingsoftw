<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - GameTeca</title>
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
        <div class="card p-4 w-100" style="max-width: 500px;">
            <div class="text-center mb-4">
                <h2 class="fw-bold text-primary">Regístrate en GameTeca</h2>
                <p class="text-muted">Crea tu cuenta y comienza a intercambiar tus videojuegos.</p>
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

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" required autofocus value="{{ old('name') }}">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" name="terms" id="terms" class="form-check-input" required>
                            <label for="terms" class="form-check-label">
                                Acepto los 
                                <a href="{{ route('terms.show') }}" target="_blank" class="text-primary">Términos de Servicio</a> y la 
                                <a href="{{ route('policy.show') }}" target="_blank" class="text-primary">Política de Privacidad</a>.
                            </label>
                        </div>
                    </div>
                @endif

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-custom">Registrarme</button>
                </div>

                <div class="text-center">
                    <p class="text-muted">¿Ya tienes una cuenta? <a href="{{ route('login') }}" class="text-primary">Inicia sesión</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
