<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Solicitudes - PanitasPet</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&family=Pacifico&display=swap"
        rel="stylesheet">
    @vite(['resources/css/inicio.css', 'resources/js/menu.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .requests-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
            min-height: 60vh;
        }

        .section-title {
            font-family: 'Pacifico', cursive;
            font-size: 2.5rem;
            color: #af7700;
            margin-bottom: 30px;
            text-align: center;
        }

        .requests-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 40px;
        }

        .requests-table th {
            background-color: #ebdcbb;
            color: #9b6b01;
            padding: 15px;
            text-align: left;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
        }

        .requests-table td {
            padding: 15px;
            border-bottom: 1px solid #f0f0f0;
            color: #555;
            font-family: 'Poppins', sans-serif;
            vertical-align: middle;
        }

        .pet-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .pet-thumb {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ebdcbb;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
        }

        .status-pendiente {
            background: #fff3cd;
            color: #856404;
        }

        .status-aprobada {
            background: #d4edda;
            color: #155724;
        }

        .status-rechazada {
            background: #f8d7da;
            color: #721c24;
        }

        .btn-action {
            display: inline-block;
            padding: 8px 16px;
            background-color: #eca100;
            color: white;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .btn-action:hover {
            background-color: #af7700;
            transform: translateY(-2px);
        }

        .actions-cell {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            align-items: center;
        }

        .btn-accept {
            background-color: #28a745;
        }

        .btn-reject {
            background-color: #dc3545;
        }

        .empty-state {
            text-align: center;
            padding: 50px;
            color: #888;
        }
    </style>
</head>

<body>
    <div class="main-container">
        <div class="content-wrapper">

            <header class="header">
                <div class="header-content">
                    <h1 class="logo">
                        <img src="images/logopanitapet.png" alt="PanitasPet" class="logo-img">
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


        <main class="requests-container">
            <h2 class="section-title">Mis Solicitudes de Adopción</h2>

            @if ($solicitudes->isEmpty())
                <div class="empty-state">
                    <i class="fas fa-paw fa-3x" style="color: #ebdcbb; margin-bottom: 20px;"></i>
                    <h3>No has recibido solicitudes todavía</h3>
                    <p>Cuando alguien quiera adoptar una de tus mascotas publicadas, aparecerá aquí.</p>
                </div>
            @else
                <div style="overflow-x: auto;">
                    <table class="requests-table">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Mascota</th>
                                <th>Solicitante</th>
                                <th>Mensaje</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($solicitudes as $solicitud)
                                <tr>
                                    <td>{{ $solicitud->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <div class="pet-info">
                                            @if ($solicitud->mascota->foto)
                                                <img src="{{ asset('storage/mascotas/' . $solicitud->mascota->foto) }}"
                                                    alt="{{ $solicitud->mascota->nombre }}" class="pet-thumb">
                                            @endif
                                            <strong>{{ $solicitud->mascota->nombre }}</strong>
                                        </div>
                                    </td>
                                    <td>
                                        <strong>{{ $solicitud->usuario->nombre }}
                                            {{ $solicitud->usuario->apellido }}</strong><br>
                                        <small>{{ $solicitud->usuario->email }}</small><br>
                                        <small>{{ $solicitud->usuario->telefono }}</small>
                                    </td>
                                    <td>{{ Str::limit($solicitud->mensaje, 50) }}</td>
                                    <td>
                                        <span class="status-badge status-{{ $solicitud->estado }}">
                                            {{ ucfirst($solicitud->estado) }}
                                        </span>
                                    </td>
                                    <td class="actions-cell">
                                        <a href="mailto:{{ $solicitud->usuario->email }}" class="btn-action">
                                            <i class="fas fa-envelope"></i> Contactar
                                        </a>
                                        @if ($solicitud->estado === 'pendiente')
                                            <form action="{{ route('solicitudes.aprobar', $solicitud->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn-action btn-accept">Aceptar</button>
                                            </form>
                                            <form action="{{ route('solicitudes.rechazar', $solicitud->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn-action btn-reject">Rechazar</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </main>
            <!-- Footer -->

            <footer class="footer">
                <div class="footer-content">
                    <div class="footer-left">
                        <div class="footer-logo-section">
                            <img src="images/logopanitapet.png" alt="PanitasPet Logo" class="footer-logo">
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
                                <img src="images/icono1.png" alt="icono1" class="circle-icon">
                            </a>
                            <a href="#" class="social-btn" aria-label="Icono 2">
                                <img src="images/icono2.png" alt="icono2" class="circle-icon">
                            </a>
                            <a href="#" class="social-btn" aria-label="Icono 3">
                                <img src="images/icono3.png" alt="icono3" class="circle-icon">
                            </a>
                            <a href="#" class="social-btn" aria-label="Icono 4">
                                <img src="images/icono4.png" alt="icono4" class="circle-icon">
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
                                <img src="images/img_mail.svg" alt="Email" class="contact-icon">
                                <div>
                                    <div style="font-weight:700;color:#af7700">Email</div>
                                    <div class="contact-text">panitapet@gmail.com</div>
                                </div>
                            </div>

                            <div class="contact-item">
                                <img src="images/img_call_end.svg" alt="Phone" class="contact-icon">
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
            </footer>
    </div>

    <script>
        window.authUser = @json([
            'isLogged' => auth()->check(),
            'name' => auth()->user()->nombre ?? null,
        ]);
    </script>
</body>

</html>
