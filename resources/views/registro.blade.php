<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}"> 

    <style>
        .login-link {
            color: #4c78d9;            ;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .login-link:hover {
            text-decoration: underline;
            color: #05359e; /* Tono de azul más fuerte al pasar el mouse */
        }
    </style>
</head>

<body>

            <!-- Navbar? -->

    <div class="container">
        <h1>Registro de Usuario</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('registro.store') }}" method="POST">
            @csrf
            <div>
                <label for="ci">CI:</label>
                <input type="text" name="ci" id="ci" required>
                @error('ci')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" required>
                @error('nombre')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" id="apellido" required>
                @error('apellido')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" required>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="password_confirmation">Confirmar Contraseña:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>

            <div>
                <label for="cumple">Fecha de Nacimiento:</label>
                <input type="date" name="cumple" id="cumple" required>
                @error('cumple')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Texto para iniciar sesión -->
            <div>
                <a href="{{ url('/login') }}" class="login-link">Si tiene cuenta, inicie sesión</a>
            </div>

            <button type="submit">Registrar</button>
        </form>
    </div>

            <!-- Footer? -->

</body>
</html>
