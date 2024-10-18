<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turnos - Barbería XYZ</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <style>

        .turno {
            border: 1px solid black;
            margin: 10px;
            padding: 10px;
            border-radius: 5px;
        }

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
    <header>
        @include('partials.navbar')
    </header>

    <main>
        <h1>Turnos</h1>

        <form method="GET" action="{{ url('/turno') }}">
            <label for="usuario_id">Seleccione un empleado:</label>
            <select name="usuario_id" id="usuario_id" onchange="this.form.submit()">
                <option value="">-- Seleccionar --</option>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $usuarioId == $usuario->id ? 'selected' : '' }}>
                        {{ $usuario->nombre }} {{ $usuario->apellido }} - {{ $usuario->rol->rol }}
                    </option>
                @endforeach
            </select>

            <label for="fecha">Seleccione una fecha:</label>
            <input type="date" name="fecha" id="fecha"
                value="{{ $fechaSeleccionada ?? \Carbon\Carbon::today()->format('Y-m-d') }}"
                onchange="this.form.submit()">
        </form>

        <div>
            <h2>Turnos del usuario seleccionado</h2>
            @if ($turnos->isEmpty())
                <p>No hay turnos disponibles para la fecha seleccionada.</p>
            @else
                @foreach ($turnos as $turno)
                    <div class="turno">
                        <h3>{{ $turno->nombre }}</h3>
                        <p>Precio: {{ $turno->precio }}</p>
                        <p>Fecha de Inicio: {{ $turno->fecha_inicio }}</p>
                        <p>Fecha de Fin: {{ $turno->fecha_fin }}</p>
                        <p>Estado: {{ $turno->estado }}</p>
                        @if ($turno->estado == 'Disponible')
                            <a href="{{ route('turno.show', $turno->id) }}" class="btn-reservar">Reservar</a>
                        @endif
                    </div>
                @endforeach
            @endif
        </div>
    </main>

    @include('partials.footer')
</body>

</html>