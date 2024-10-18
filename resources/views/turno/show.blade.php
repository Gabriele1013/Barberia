<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Turno</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

    <style>
        .btn-reservar {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-reservar:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <!-- Incluir el navbar de menu.blade.php -->
    @include('partials.navbar')

    <div class="main-container">
        <div class="contenedor-azul" style="width: 100%; height: 250px; background-color: blue;"></div>

        <div class="detalle-turno">
            <h2>{{ $turno->nombre }}</h2>
            <p>{{ $turno->desc }}</p>
            <p>Precio: ${{ $turno->precio }}</p>
            <p>Empleado: {{ $turno->usuario->nombre }}</p>
            <p>Fecha de inicio: {{ \Carbon\Carbon::parse($turno->fecha_inicio)->format('Y-m-d H:i') }}</p>
            <p>Fecha de fin: {{ \Carbon\Carbon::parse($turno->fecha_fin)->format('Y-m-d H:i') }}</p>
            <p>Estado: {{ $turno->estado }}</p>

            <a href="#" class="btn-reservar">Reservar turno</a>
        </div>
    </div>

    <!-- Incluir el footer de menu.blade.php -->
    @include('partials.footer')
</body>

</html>