<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal</title>
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/filas.css') }}">
    <style>
        .empleado {
            color: blue;
            /* Color azul para el nombre del empleado */
        }
    </style>
</head>

<body>
    <header>
        <!-- Navbar -->
        <nav class="navbar">
            <h1>BaberíaXYZ</h1>
            <ul>
                <li><a href="#">Menu</a></li>
                <li><a href="#">Turnos</a></li>
                <li><a href="#">Productos</a></li>
                @if(auth()->check() && (auth()->user()->rol_id == 1))
                <li><a href="{{ route('administracion') }}">Administración</a></li>
                @endif
            </ul>
            <ul>
                <li class="dropdown">
                    <a href="#">
                        @if(auth()->check())
                        <span class="{{ auth()->user()->rol_id == 1 ? 'empleado' : '' }}">
                            {{ auth()->user()->nombre . ' ' . auth()->user()->apellido }}
                        </span>
                        @else
                        Acceder
                        @endif
                    </a>
                    <div class="dropdown-content">
                        @if(auth()->check())
                        <a href="#">Turnos Asignados</a>
                        <a href="#">Órdenes</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" style="
                            border: none; 
                            background: none; 
                            cursor: pointer; 
                            padding: 12px 16px; 
                            width: 100%; 
                            text-align: left;">
                                Cerrar Sesión</button>
                        </form>
                        @else
                        <a href="{{ route('login') }}">Iniciar Sesión</a>
                        <a href="{{ route('registro') }}">Registrarse</a>
                        @endif
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <div class="main-container">
        <p class="bienvenido">¡Bienvenido!</p>
    </div>

    <div class="container-group">
        <div class="left-container">
            <h1>¡Reserve un turno!</h1>
            <p>Reservar un turno le beneficia en </p>
        </div>
        <div class="right-container">
            <h1>¡Ordene productos!</h1>
            <p>textotexto</p>
        </div>
    </div>

    <!-- Fila de Turnos -->
    <div class="turnos-container">
        <h2>Turnos</h2>
        <div class="turnos-row">
            @foreach ($turnos as $turno)
            <div class="turno-item">
                <p>{{ $turno->nombre }}</p>
                <p>{{ \Carbon\Carbon::parse($turno->fecha_inicio)->format('Y-m-d H:i') }} - {{ \Carbon\Carbon::parse($turno->fecha_fin)->format('Y-m-d H:i') }}</p>
            </div>
            @endforeach
            <a href="#" class="ver-mas">Ver más</a>
        </div>
    </div>

    <!-- Fila de Productos -->
    <div class="productos-container">
        <h2>Productos</h2>
        <div class="productos-row">
            @foreach ($productos as $producto)
            <div class="producto-item">
                <div class="producto-imagen" style="background-image: url('{{ $producto->imagenUrl }}');"></div>
                <p>{{ $producto->nombre }}</p>
                <p>${{ $producto->precio }}</p>
            </div>
            @endforeach
            <a href="#" class="ver-mas">Ver más</a>
        </div>
    </div>

    <footer class="footer">
        <p>© 2024 Derechos Reservados</p>
    </footer>
</body>

</html>
