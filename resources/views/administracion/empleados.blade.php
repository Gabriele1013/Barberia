
@if(auth()->check() && in_array(auth()->user()->rol_id, [1, 2, 3, 4]))
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
</head>
<body>
    <header>
        <!-- Navbar -->
        @include('partials/navbar')
    </header>

    <div class="ctn-all">
        <div class="ctn-l">
            <h2>EMPLEADOS</h2>
            <li class="mt-20">
                <a href="{{ route('administracion.empleados') }}" class="active">Empleados</a> <!-- Con clase 'active' -->
            </li>
            <li class="mt-20">
                <a href="">Turnos</a>
            </li>
            <li class="mt-20">
                <a href="">Productos</a>
            </li>
            <li class="mt-20">
                <a href="">Solicitudes</a>
            </li>
        </div>
        <div class="ctn-r">
        <h1>Empleados de BarberíaXYZ</h1>
        <h2>Tabla de todos los empleados</h2>
        
        <table class="table">
            <thead>
                <tr>
                    <th>CI</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Apodo</th>
                    <th>Fecha de nacimiento</th>
                    <th>Contraseña</th> 
                    <th>Rol</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->ci }}</td>
                        <td>{{ $empleado->nombre }}</td>
                        <td>{{ $empleado->apellido }}</td>
                        <td>{{ $empleado->email }}</td>
                        <td>{{ $empleado->telefono }}</td>
                        <td>{{ $empleado->apodo === 'null' ? 'No tiene' : $empleado->apodo }}</td>
                        <td>{{ $empleado->cumple }}</td>
                        <td>{{ $empleado->password }}</td> <!-- Mostrar la contraseña -->
                        <td>{{ $empleado->rol->rol }}</td> <!-- Mostrar el rol del empleado -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>

    <footer class="footer">
        <p>© 2024 Derechos Reservados</p>
    </footer>
</body>
</html>
@else
    <script>
        window.location.href = "{{ route('menu') }}";
    </script>
@endif
