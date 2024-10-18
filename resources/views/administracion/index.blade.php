@if(auth()->check() && in_array(auth()->user()->rol_id, [1, 2, 3, 4]))

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}"> <!-- estilos para administración -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

    <!-- Agregar un estilo para el modal -->
    <style>
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
            padding-top: 60px;
            /* Location of the box */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            /* Could be more or less, depending on screen size */
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <header>
        <!-- Navbar -->
        @include('partials/navbar')
    </header>

    <div class="ctn-all">
        <div class="ctn-l">
            <h2>ADMINISTRACIÓN</h2>
            <li class="mt-20">
                <a href="{{ route('administracion.empleados') }}" class="{{ request()->is('administracion/empleados') ? 'active' : '' }}">Empleados</a>
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
            <p class="{{ auth()->user()->rol_id == 1 ? : '' }}">
                ¡Bienvenido, <strong class="admin-color">{{ auth()->user()->nombre . ' ' . auth()->user()->apellido }}</strong>!
            </p>
            <p>Tu rol: {{ auth()->user()->rol->rol }}</p> <!-- Mostramos el nombre del rol -->

            <div class="ctn-r-l">
                <p>C.I.: {{ auth()->user()->ci }}</p>
                <p>Nombres: {{ auth()->user()->nombre }}</p>
                <p>Apellidos: {{ auth()->user()->apellido }}</p>
                <p>Correo electrónico: {{ auth()->user()->email }}</p>
                <p>Télefono: {{ auth()->user()->telefono === 'null' ? 'No tiene' : auth()->user()->telefono }}</p>
                <p>Apodo: {{ auth()->user()->apodo === 'null' ? 'No tiene' : auth()->user()->apodo }}</p>
                <p>Fecha de nacimiento: {{ auth()->user()->cumple }}</p>
            </div>
            <div class="ctn-r-r">
                <label for="telefono">Cambiar número de teléfono:</label>
                <input type="text" id="telefono" placeholder="Nuevo número de teléfono">
                <br>
                <label for="apodo">Cambiar apodo:</label>
                <input type="text" id="apodo" placeholder="Nuevo apodo">
                <br>
                <button id="guardarBtn">Guardar</button>
            </div>

            <!-- Modal para confirmación -->
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2>Confirmación</h2>
                    <p id="confirmacionTexto"></p>
                    <button id="cancelarBtn">Cancelar</button>
                    <button id="confirmarBtn">Guardar</button>
                </div>
            </div>

        </div>

    </div>

    <footer class="footer">
        <p>© 2024 Derechos Reservados</p>
    </footer>

    <script>
        document.getElementById("guardarBtn").onclick = function() {
            var telefonoAntiguo = "{{ auth()->user()->telefono === 'null' ? 'No tiene' : auth()->user()->telefono }}";
            var apodoAntiguo = "{{ auth()->user()->apodo === 'null' ? 'No tiene' : auth()->user()->apodo }}";
            var telefonoNuevo = document.getElementById("telefono").value;
            var apodoNuevo = document.getElementById("apodo").value;

            // Mostrar el texto de confirmación
            document.getElementById("confirmacionTexto").innerText =
                `¿Seguro quiere cambiar los siguientes datos?\nTélefono: ${telefonoAntiguo} -> ${telefonoNuevo}\nApodo: ${apodoAntiguo} -> ${apodoNuevo}`;

            // Mostrar el modal
            document.getElementById("myModal").style.display = "block";
        };

        // Cuando el usuario hace clic en <span> (x), cerrar el modal
        document.getElementsByClassName("close")[0].onclick = function() {
            document.getElementById("myModal").style.display = "none";
        };

        // Cancelar
        document.getElementById("cancelarBtn").onclick = function() {
            document.getElementById("myModal").style.display = "none";
        };

        // Confirmar
        document.getElementById("confirmarBtn").onclick = function() {
            // Aquí realizar la petición AJAX o redirigir para actualizar los datos en el backend
            var telefonoNuevo = document.getElementById("telefono").value;
            var apodoNuevo = document.getElementById("apodo").value;

            fetch("{{ route('actualizar.datos') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        telefono: telefonoNuevo,
                        apodo: apodoNuevo
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert("Datos actualizados con éxito.");
                        location.reload(); // Recargar la página para ver los cambios
                    } else {
                        alert("Hubo un error al actualizar los datos.");
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                });

            document.getElementById("myModal").style.display = "none";
        };
    </script>
</body>

</html>
@else
    <script>
        window.location.href = "{{ route('menu') }}";
    </script>
@endif