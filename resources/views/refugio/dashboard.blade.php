<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Refugio - PanitasPet</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&family=Pacifico&display=swap"
        rel="stylesheet">
    @vite(['resources/css/stylessadmin.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .dashboard-section {
            margin-bottom: 40px;
        }

        .section-title {
            font-size: 1.5rem;
            color: #5a3a1a;
            margin-bottom: 20px;
            border-bottom: 2px solid #eeba30;
            padding-bottom: 10px;
        }

        /* Profile Card */
        .profile-card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .profile-info h2 {
            color: #5a3a1a;
            margin: 0 0 10px 0;
        }

        .profile-details p {
            margin: 5px 0;
            color: #666;
        }

        /* Requests Table */
        .requests-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .requests-table th,
        .requests-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .requests-table th {
            background-color: #f9f9f9;
            color: #5a3a1a;
            font-weight: 600;
        }

        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .status-pendiente {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-aprobada {
            background-color: #d4edda;
            color: #155724;
        }

        .status-rechazada {
            background-color: #f8d7da;
            color: #721c24;
        }

        /* Action Buttons */
        .action-btn {
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.9rem;
            margin-right: 5px;
            cursor: pointer;
            border: none;
        }

        .btn-accept {
            background-color: #28a745;
            color: white;
        }

        .btn-reject {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>

<body>
    <div class="main-container">
        <header class="header">
            <div class="header-content">
                <h1 class="logo">
                    <img src="{{ asset('images/logopanitapet.png') }}" alt="PanitasPet" class="logo-img">
                    <span class="brand-text"><span class="logo-text">PanitasPet</span> <span
                            class="logo-subtitle">Refugio</span></span>
                </h1>
                <nav class="nav-section">
                    <div class="nav-menu">
                        <a href="{{ route('Inicio') }}" class="nav-item">Inicio</a>
                        <a href="{{ route('MascotasDisponibles') }}" class="nav-item">Mascotas</a>
                    </div>
                    <div class="nav-auth">
                        <a href="#" class="login-btn">{{ auth()->user()->nombre }} (Refugio)</a>
                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                            @csrf
                            <button type="submit"
                                style="background:none; border:none; color:inherit; cursor:pointer;">Salir</button>
                        </form>
                    </div>
                </nav>
            </div>
        </header>

        <main class="dashboard-container" style="padding: 20px;">
            <!-- Shelter Profile Section -->
            <section class="dashboard-section">
                <h2 class="section-title">Perfil del Refugio</h2>
                @if ($refugio)
                    <div class="profile-card">
                        <div class="profile-info">
                            <h2>{{ $refugio->nombre }}</h2>
                            <div class="profile-details">
                                <p><i class="fas fa-map-marker-alt"></i> {{ $refugio->direccion ?? 'Sin dirección' }}
                                </p>
                                <p><i class="fas fa-phone"></i> {{ $refugio->telefono ?? 'Sin teléfono' }}</p>
                                <p><i class="fas fa-envelope"></i> {{ $refugio->email ?? 'Sin email' }}</p>
                                <p class="description">{{ $refugio->descripcion }}</p>
                            </div>
                        </div>
                        <a href="{{ route('refugio.createProfile') }}" class="btn-primario">Editar Perfil</a>
                    </div>
                @else
                    <div class="profile-card">
                        <p>Aún no has completado el perfil de tu refugio.</p>
                        <a href="{{ route('refugio.createProfile') }}" class="btn-primario">Crear Perfil</a>
                    </div>
                @endif
            </section>

            <!-- Adoption Requests Section -->
            <section class="dashboard-section">
                <h2 class="section-title">Solicitudes de Adopción Recibidas</h2>
                <p style="margin-bottom:15px; font-size:0.9rem; color:#666;">(Solo se muestran solicitudes de usuarios
                    verificados)</p>

                @if ($solicitudes->count() > 0)
                    <table class="requests-table">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Mascota</th>
                                <th>Solicitante</th>
                                <th>Mensaje</th>
                                <th>Ubicación User</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($solicitudes as $solicitud)
                                <tr>
                                    <td>{{ $solicitud->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <div style="display:flex; align-items:center; gap:10px;">
                                            @if ($solicitud->mascota->foto)
                                                <img src="{{ asset('storage/mascotas/' . $solicitud->mascota->foto) }}"
                                                    width="40" height="40"
                                                    style="border-radius:50%; object-fit:cover;">
                                            @endif
                                            {{ $solicitud->mascota->nombre }}
                                        </div>
                                    </td>
                                    <td>
                                        <strong>{{ $solicitud->user->nombre }}
                                            {{ $solicitud->user->apellido }}</strong><br>
                                        <small>{{ $solicitud->user->email }}</small><br>
                                        <small>{{ $solicitud->user->telefono }}</small>
                                    </td>
                                    <td>{{ Str::limit($solicitud->mensaje, 50) }}</td>
                                    <td>{{ $solicitud->user->ubicacion }}</td>
                                    <td>
                                        <span class="status-badge status-{{ $solicitud->estado }}">
                                            {{ ucfirst($solicitud->estado) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="mailto:{{ $solicitud->user->email }}" class="action-btn btn-primario"
                                            style="background:#007bff;">Contactar</a>
                                        <!-- Add Accept/Reject logic here later if needed -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No tienes solicitudes pendientes de usuarios verificados.</p>
                @endif
            </section>

            <!-- Manage Pets Section (Reused Visuals from Publicaciones) -->
            <section class="dashboard-section">
                <div style="display:flex; justify-content:space-between; align-items:center;">
                    <h2 class="section-title">Gestionar Mascotas</h2>
                    <a href="{{ route('vistavacia') }}" class="btn-primario">+ Publicar Mascota</a>
                </div>

                <div class="admin-pets-grid">
                    @forelse ($mascotas as $mascota)
                        <!-- Reusing the exact card structure from Publicaciones.blade.php for consistency -->
                        <div class="admin-pet-card" data-id="{{ $mascota->id }}"
                            data-nombre="{{ $mascota->nombre }}">
                            <img src="{{ asset('storage/mascotas/' . $mascota->foto) }}" alt="{{ $mascota->nombre }}"
                                class="mascota-foto">
                            <div class="mascota-info">
                                <h3 class="mascota-nombre">{{ $mascota->nombre }}</h3>
                                <p class="mascota-detalle"><strong>Estado:</strong> {{ $mascota->estado }}</p>
                                <div class="admin-pet-actions">
                                    <!-- Use existing edit/delete routes or new ones? Using existing for now since Controller handles permissions -->
                                    <button class="editar-mascota-btn js-edit-pet-open">Editar</button>
                                    <form action="{{ route('EliminarAnimal', ['id' => $mascota->id]) }}" method="POST"
                                        style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="eliminar-mascota-btn"
                                            onclick="return confirm('¿Seguro?')">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No hay mascotas registradas.</p>
                    @endforelse
                </div>
            </section>

        </main>
    </div>
    <!-- Include JS from Publicaciones if needed for modals, simplified here -->
</body>

</html>
