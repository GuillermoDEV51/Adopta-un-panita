<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - PanitasPet | Adopción y Refugios de Mascotas</title>
    <meta name="description"
        content="Dashboard de PanitasPet para gestionar adopciones y refugios. Plataforma confiable para encontrar tu compañero perfecto y apoyar refugios locales.">
    <meta name="keywords"
        content="adopción mascotas, refugios animales, dashboard, PanitasPet, gestionar mascotas, voluntarios">

    <meta property="og:type" content="website">
    <meta property="og:title" content="Inicio - PanitasPet | Adopción y Refugios de Mascotas">
    <meta property="og:description"
        content="Dashboard de PanitasPet para gestionar adopciones y refugios. Plataforma confiable para encontrar tu compañero perfecto.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&family=Pacifico&display=swap"
        rel="stylesheet">

    @vite(['resources/css/stylessadmin.css', 'resources/js/menuadmin.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        window.ASSETS_URL = "{{ asset('') }}";
    </script>
</head>

<body>
    <div class="main-container">
        <div class="content-wrapper">

            <header class="header">
                <div class="header-content">
                    <h1 class="logo">
                        <img src="{{ asset('images/logopanitapet.png') }}" alt="PanitasPet" class="logo-img">

                        <span class="brand-text">
                            <span class="logo-text">PanitasPet</span>
                            <span class="logo-subtitle">Adopción y refugios</span>
                        </span>
                    </h1>
                    <nav class="nav-section">
                        <div class="nav-menu">
                            <a href="{{ route('Inicio') }}" class="nav-item" role="menuitem">Inicio</a>
                            <a href="{{ route('MascotasDisponibles') }}" class="nav-item" role="menuitem">Mascotas</a>
                            <a href="{{ route('RefugiosDisponibles') }}" class="nav-item" role="menuitem">Refugios</a>
                        </div>

                        <!-- Authentication Links -->
                        @if (Route::has('login'))
                            <div class="nav-auth">
                                @auth
                                    <!-- User is logged in -->
                                    @if (auth()->user()->id_rol == 1)
                                        <a href="{{ route('Dashboard') }}" class="login-btn">{{ auth()->user()->nombre }}
                                            {{ auth()->user()->apellido }}</a>
                                    @elseif (auth()->user()->id_rol == 4 || auth()->user()->id_rol == 5)
                                        <a href="{{ route('refugio.dashboard') }}"
                                            class="login-btn">{{ auth()->user()->nombre }}
                                            {{ auth()->user()->apellido }}</a>
                                    @else
                                        <!-- Regular User -->
                                        <a href="{{ route('user.solicitudes') }}"
                                            class="login-btn">{{ auth()->user()->nombre }}
                                            {{ auth()->user()->apellido }}</a>
                                    @endif

                                    <!-- Logout Form/Button could go here if not already in menu.js or elsewhere -->
                                @else
                                    <!-- User is NOT logged in -->
                                    <a href="{{ route('login') }}" class="login-btn">Iniciar sesión</a>
                                @endauth
                            </div>
                        @endif


                        <div class="menu-lines" aria-hidden="true">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </nav>
                </div>
            </header>

            <!-- Dashboard Main Content -->
            <main class="dashboard-container">
                <!-- Sidebar Menu -->
                <aside class="sidebar">
                    <div class="menu-section">
                        <h2 class="menu-title">Menú</h2>
                        <div class="menu-list">
                            <div class="menu-item">
                                <i class="fas fa-tachometer-alt"></i>
                                <a href="{{ route('Dashboard') }}"
                                    style="color:inherit; text-decoration:none;">Dashboard</a>
                            </div>
                            <div class="menu-item">
                                <i class="fas fa-clipboard-list"></i>
                                <a href="{{ route('SolicitudesAdmin') }}"
                                    style="color:inherit; text-decoration:none;">Solicitudes</a>
                            </div>
                            <div class="menu-item">
                                <i class="fas fa-plus-circle"></i>
                                <a href="{{ route('AñadirRefugio') }}"
                                    style="color:inherit; text-decoration:none;">Añadir refugios</a>
                            </div>
                        </div>
                    </div>

                    <div class="menu-section">
                        <h2 class="menu-title">Páginas</h2>
                        <div class="menu-list">
                            <div class="menu-item">
                                <i class="fas fa-home"></i>
                                <a href="{{ route('RefugiosAdmin') }}"
                                    style="color:inherit; text-decoration:none;">Refugios</a>
                            </div>
                            <div class="menu-item active">
                                <i class="fas fa-users"></i>
                                <a href="{{ route('UsuariosAdmin') }}"
                                    style="color:inherit; text-decoration:none;">Usuarios</a>
                            </div>
                        </div>
                    </div>

                    <div class="menu-section">
                        <h2 class="menu-title">Mascotas</h2>
                        <div class="menu-list">
                            <div class="menu-item">
                                <i class="fas fa-paw"></i>
                                <a href="{{ route('AdminAnimales') }}" style="color:inherit; text-decoration:none;">
                                    Animales
                                </a>
                            </div>

                            <div class="menu-item">
                                <i class="fas fa-sign-out-alt"></i>
                                <a href="{{ route('login') }}" style="color:inherit; text-decoration:none;">Cerrar
                                    sesión</a>
                            </div>
                        </div>
                    </div>
                </aside>

                <div class="main-content">
                    <div class="paginas-section">
                        <div class="titulo-wrapper">
                            <h1 class="paginas-title">Editar Usuario</h1>
                            <div class="titulo-line" aria-hidden="true"></div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('UsuariosAdmin') }}" class="btn-volver">Volver a Usuarios</a>
                    </div>

                    <div class="usuarios-card">


                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('ActualizarUsuario', $usuario->id) }}" method="POST" class="editar-usuario-form">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" id="nombre" name="nombre" class="form-input"
                                    value="{{ old('nombre', $usuario->nombre) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" id="apellido" name="apellido" class="form-input"
                                    value="{{ old('apellido', $usuario->apellido) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" id="password" name="password" class="form-input" required>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" required>
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="tel" id="telefono" name="telefono" class="form-input"
                                    placeholder="Número de teléfono" pattern="[0-9]*" inputmode="numeric"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="11"
                                    value="{{ old('telefono', $usuario->telefono) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="id_rol" class="form-label">Rol</label>
                                <select name="id_rol" id="id_rol" class="form-input" required>
                                    <option value="">Seleccionar rol</option>
                                    @foreach ($roles as $rol)
                                        <option value="{{ $rol->id }}"
                                            {{ old('id_rol') == $rol->id ? 'selected' : '' }}>
                                            {{ $rol->nombre ?? ($rol->name ?? 'Rol ' . $rol->id) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_rol')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- FECHA DE NACIMIENTO --}}
                            <div class="form-group form-group--full">

                                <label class="form-label">Fecha de nacimiento</label>

                                <div class="date-row">

                                    
                                  {{-- AÑO --}}
                                    <select class="form-input" id="anio" required>
                                        <option value="">Año</option>
                                    </select>

                                    {{-- MES --}}
                                    <select class="form-input" id="mes" required>
                                        <option value="">Mes</option>
                                    </select>

                                    {{-- DÍA --}}
                                    <select class="form-input" id="dia" required>
                                        <option value="">Día</option>
                                    </select>

                                </div>

                                {{-- ESTE ES EL QUE VIAJA AL CONTROLLER --}}
                                <input type="hidden" name="fecha_nacimiento" id="fecha_nacimiento"
                                    value="{{ old('fecha_nacimiento', $usuario->fecha_nacimiento) }}">

                                @error('fecha_nacimiento')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="form-group form-group--full">
                                <label for="ubicacion" class="form-label">Ubicación</label>
                                <select class="form-input" id="ubicacion" name="ubicacion" required>
                                    <option value="">Ubicación</option>
                                    <option value="Caracas">Caracas</option>
                                    <option value="Miranda">Miranda</option>
                                    <option value="La Guaira">La Guaira</option>
                                    <option value="Zulia">Zulia</option>
                                    <option value="Lara">Lara</option>
                                    <option value="Carabobo">Carabobo</option>
                                    <option value="Sucre">Sucre</option>
                                    <option value="Anzoátegui">Anzoátegui</option>
                                    <option value="Nueva Esparta">Nueva Esparta</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-primario">Actualizar Usuario</button>
                        </div>


                        <!-- Mostrar errores generales si existen -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </div>

                </div>

            </main>

            <!-- Footer -->
            <footer class="footer">
                <div class="footer-content">
                    <div class="footer-left">
                        <div class="footer-logo-section">
                            <img src="{{ asset('images/logopanitapet.png') }}" alt="PanitasPet Logo"
                                class="footer-logo">

                            <span class="brand-text">
                                <span class="footer-brand">PanitasPet</span>
                                <span class="logo-subtitle">Adopción y refugios</span>
                            </span>
                        </div>

                        <p class="description">Plataforma digital dedicada a la ayuda y adopción de mascotas en
                            Venezuela. Conectamos animales que necesitan un hogar con adoptantes responsables para
                            combatir el abandono y la sobrepoblación.</p>

                        <div class="footer-badges">
                            <div class="badge"><i class="fas fa-paw"></i> 200+ Adopciones</div>
                            <div class="badge"><i class="fas fa-heart"></i> 10+ Refugios</div>
                        </div>

                        <div class="social-icons">
                            <a href="#" class="social-btn" aria-label="Icono 1">
                                <img src="{{ asset('images/icono1.png') }}" class="circle-icon">
                            </a>
                            <a href="#" class="social-btn" aria-label="Icono 2">
                                <img src="{{ asset('images/icono2.png') }}" alt="icono2" class="circle-icon">
                            </a>
                            <a href="#" class="social-btn" aria-label="Icono 3">
                                <img src="{{ asset('images/icono3.png') }}" alt="icono3" class="circle-icon">
                            </a>
                            <a href="#" class="social-btn" aria-label="Icono 4">
                                <img src="{{ asset('images/icono4.png') }}" alt="icono4" class="circle-icon">
                            </a>
                        </div>
                    </div>

                    <div class="footer-links">
                        <h4 class="footer-column-title">Enlaces rápidos</h4>
                        <ul class="footer-list">
                            <a href="MascotasDisponibles">Mascotas en adopción</a>
                            <a href="RefugiosDisponibles">Refugios</a>
                            <a href="Mision">Misión y visión</a>
                        </ul>
                    </div>

                    <div class="footer-services">
                        <h4 class="footer-column-title">Servicios</h4>
                        <ul class="footer-list">
                            <a href="Donativos">Donaciones</a>
     
                                                        @guest
                                <a href="Registro">Registrarse</a>
                            @endguest
                        </ul>
                    </div>

                    <div class="footer-contact">
                        <h4 class="footer-column-title">Contacto</h4>
                        <div class="contact-info">
                            <div class="contact-item">
                                <img src="{{ asset('images/img_mail.svg') }}" class="contact-icon">
                                <div>
                                    <div style="font-weight:700;color:#af7700">Email</div>
                                    <div class="contact-text">panitapet@gmail.com</div>
                                </div>
                            </div>

                            <div class="contact-item">
                                <img src="{{ asset('images/img_call_end.svg') }}" alt="Phone"
                                    class="contact-icon">
                                <div>
                                    <div style="font-weight:700;color:#af7700">Teléfono</div>
                                    <div class="contact-text">+58 414 1234567</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="footer-bottom">
                        <div class="copyright">© 2025 PanitaPet. Todos los derechos reservados.</div>
                    </div>
                </div>
            </footer>
        </div>
<script>
            window.authUser = @json([
                'isLogged' => auth()->check(),
                'name' => auth()->user()->nombre ?? null,
            ]);
        </script>
</body>
 <script>
document.addEventListener('DOMContentLoaded', function () {

    const diaSelect = document.getElementById('dia');
    const mesSelect = document.getElementById('mes');
    const anioSelect = document.getElementById('anio');
    const fechaInput = document.getElementById('fecha_nacimiento');

    // ================================
    // CARGAR MESES
    // ================================
    const meses = [
        'Enero', 'Febrero', 'Marzo', 'Abril',
        'Mayo', 'Junio', 'Julio', 'Agosto',
        'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
    ];

    meses.forEach((mes, index) => {

        const option = document.createElement('option');

        option.value = index + 1;
        option.textContent = mes;

        mesSelect.appendChild(option);
    });


    // ================================
    // CARGAR AÑOS (DESDE 1920 HASTA HOY)
    // ================================
    const anioActual = new Date().getFullYear();

    for (let i = anioActual; i >= 1920; i--) {

        const option = document.createElement('option');

        option.value = i;
        option.textContent = i;

        anioSelect.appendChild(option);
    }


    // ================================
    // CALCULAR DIAS SEGUN MES Y AÑO
    // ================================
    function cargarDias() {

        const mes = mesSelect.value;
        const anio = anioSelect.value;

        diaSelect.innerHTML = '<option value="">Día</option>';

        if (!mes || !anio) return;

        // Truco JS: ultimo día del mes
        const diasEnMes = new Date(anio, mes, 0).getDate();

        for (let i = 1; i <= diasEnMes; i++) {

            const option = document.createElement('option');

            option.value = i;
            option.textContent = i;

            diaSelect.appendChild(option);
        }
    }


    // ================================
    // CREAR FECHA FINAL
    // ================================
    function actualizarFecha() {

        const d = diaSelect.value;
        const m = mesSelect.value;
        const y = anioSelect.value;

        if (d && m && y) {

            const dia = d.padStart(2, '0');
            const mes = m.padStart(2, '0');

            fechaInput.value = `${y}-${mes}-${dia}`;
        }
    }


    // ================================
    // EVENTOS
    // ================================
    mesSelect.addEventListener('change', function () {
        cargarDias();
        actualizarFecha();
    });

    anioSelect.addEventListener('change', function () {
        cargarDias();
        actualizarFecha();
    });

    diaSelect.addEventListener('change', actualizarFecha);


    // ================================
    // CARGAR FECHA EXISTENTE (EDIT)
    // ================================
    if (fechaInput.value) {

        const partes = fechaInput.value.split('-');

        if (partes.length === 3) {

            const y = partes[0];
            const m = parseInt(partes[1]);
            const d = parseInt(partes[2]);

            anioSelect.value = y;
            mesSelect.value = m;

            cargarDias();

            diaSelect.value = d;
        }
    }

});
</script>

</html>
