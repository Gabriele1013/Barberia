<nav class="navbar">
    <h1>BarberíaXYZ</h1>
    <ul>
        <li><a href="/menu">Menu</a></li>
        <li><a href="{{ route('turno.index') }}">Turnos</a></li>
        <li><a href="#">Productos</a></li>
        @if(auth()->check() && (auth()->user()->rol_id == 1 || auth()->user()->rol_id == 2 || auth()->user()->rol_id == 3 || auth()->user()->rol_id == 4))
            <li><a href="{{ route('administracion') }}">Administración</a></li>
        @endif
    </ul>
    <ul>
        <li class="dropdown">
            <a href="#">
                @if(auth()->check())
                    <span
                        style="color: 
                        {{ auth()->user()->rol_id == 1 ? 'red' : (auth()->user()->rol_id == 2 || auth()->user()->rol_id == 3 ? 'green' : (auth()->user()->rol_id == 4 ? 'blue' : 'black')) }}">
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
                        <button type="submit"
                            style="border: none; background: none; cursor: pointer; padding: 12px 16px; width: 100%; text-align: left;">
                            Cerrar Sesión
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Iniciar Sesión</a>
                    <a href="{{ route('registro') }}">Registrarse</a>
                @endif
            </div>
        </li>
    </ul>
</nav>