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

        .empty-state {
            text-align: center;
            padding: 50px;
            color: #888;
        }
    </style>
</head>

<body>
    <div class="main-container">
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
                        <a href="{{ route('Inicio') }}" class="nav-item">Inicio</a>
                        <a href="{{ route('MascotasDisponibles') }}" class="nav-item">Mascotas</a>
                        <a href="{{ route('RefugiosDisponibles') }}" class="nav-item">Refugios</a>
                    </div>

                    <div class="nav-auth">
                        <a href="{{ route('user.solicitudes') }}" class="login-btn"
                            style="background-color: #af7700;">{{ auth()->user()->nombre }}
                            {{ auth()->user()->apellido }}</a>
                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                            @csrf
                        </form>
                    </div>

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
                                    <td>
                                        <a href="mailto:{{ $solicitud->usuario->email }}" class="btn-action">
                                            <i class="fas fa-envelope"></i> Contactar
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </main>

        <footer class="footer">
            <div class="footer-content">
                <div class="footer-left">
                    <div class="footer-logo-section">
                        <img src="{{ asset('images/logopanitapet.png') }}" alt="PanitasPet Logo" class="footer-logo">
                        <span class="brand-text">
                            <span class="footer-brand">PanitasPet</span>
                            <span class="logo-subtitle">Adopción y refugios</span>
                        </span>
                    </div>
                    <p class="description">Plataforma digital dedicada a la ayuda y adopción de mascotas en Venezuela.
                    </p>
                </div>
                <!-- Links simplified for brevity in this view, matching main layout visually -->
                <div class="footer-links">
                    <h4 class="footer-column-title">Enlaces rápidos</h4>
                    <ul class="footer-list">
                        <a href="{{ route('MascotasDisponibles') }}">Mascotas</a>
                        <a href="{{ route('RefugiosDisponibles') }}">Refugios</a>
                    </ul>
                </div>
                <div class="footer-contact">
                    <h4 class="footer-column-title">Contacto</h4>
                    <div class="contact-info">
                        <div class="contact-item">
                            <div>
                                <div style="font-weight:700;color:#af7700">Email</div>
                                <div class="contact-text">panitapet@gmail.com</div>
                            </div>
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
