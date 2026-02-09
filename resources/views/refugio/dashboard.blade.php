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
        :root {
            --brand-brown: #5a3a1a;
            --brand-gold: #eeba30;
            --text-muted: #6b6b6b;
            --card-bg: #ffffff;
            --page-bg: #f7f5f2;
            --border-soft: #eee;
        }

        body {
            background: var(--page-bg);
        }

        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 24px 20px 48px;
            display: flex;
            flex-direction: column;
            gap: 28px;
        }

        .dashboard-section {
            background: var(--card-bg);
            border-radius: 14px;
            padding: 22px;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.06);
        }

        .section-title {
            font-size: 1.5rem;
            color: var(--brand-brown);
            margin: 0;
            padding-bottom: 12px;
            border-bottom: 2px solid var(--brand-gold);
        }

        /* Profile Card */
        .profile-card {
            display: flex;
            gap: 18px;
            justify-content: space-between;
            align-items: center;
            background: #fffdf8;
            border: 1px solid #f2e7c5;
            border-radius: 12px;
            padding: 18px;
        }

        .profile-info h2 {
            color: var(--brand-brown);
            margin: 0 0 8px 0;
        }

        .profile-details p {
            margin: 6px 0;
            color: var(--text-muted);
        }

        .profile-details .description {
            margin-top: 10px;
            color: #4f4f4f;
        }

        .profile-card .btn-primario {
            white-space: nowrap;
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 16px;
        }

        .section-subtitle {
            margin: 12px 0 0 0;
            font-size: 0.95rem;
            color: var(--text-muted);
        }

        /* Requests Table */
        .table-wrap {
            width: 100%;
            overflow-x: auto;
            border-radius: 12px;
            border: 1px solid var(--border-soft);
        }

        .requests-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        .requests-table th,
        .requests-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid var(--border-soft);
            vertical-align: top;
        }

        .requests-table th {
            background-color: #f9f9f9;
            color: var(--brand-brown);
            font-weight: 600;
            position: sticky;
            top: 0;
            z-index: 1;
        }

        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
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
            cursor: pointer;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .actions-cell {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            align-items: center;
        }

        .btn-accept {
            background-color: #28a745;
            color: white;
        }

        .btn-reject {
            background-color: #dc3545;
            color: white;
        }

        .logout-btn {
            background: transparent;
            border: none;
            color: #856404;
            padding: 3px 8px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1 rem;
            line-height: 1.1;
            transition: background 0.2s ease, border-color 0.2s ease;
        }



        .nav-auth {
    
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-auth form {
            display: inline-flex;
            margin: 0;
        }

        .form-input[type="file"] {
            padding: 6px;
        }

        .form-input[type="file"]::file-selector-button {
            margin-right: 10px;
            border: none;
            background: #f1f1f1;
            color: #333;
            padding: 6px 10px;
            border-radius: 6px;
            cursor: pointer;
        }

        .form-input[type="file"]::file-selector-button:hover {
            background: #e6e6e6;
        }

        .admin-pets-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            margin-top: 16px;
        }

        .admin-pet-card {
            background: #ffffff;
            border: 1px solid var(--border-soft);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
        }

        .admin-pet-card.placeholder {
            border: 2px dashed #eadfcb;
            background: transparent;
            min-height: 260px;
            box-shadow: none;
        }

        .admin-pet-card .mascota-foto {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .admin-pet-card .mascota-info {
            padding: 14px;
        }

        .admin-pet-card .mascota-nombre {
            margin: 0 0 8px 0;
            color: var(--brand-brown);
        }

        .admin-pet-card .admin-pet-actions {
            margin-top: 12px;
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .editar-mascota-btn,
        .eliminar-mascota-btn {
            padding: 6px 12px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .editar-mascota-btn {
            background: #f2f2f2;
            color: #333;
        }

        .eliminar-mascota-btn {
            background: #dc3545;
            color: #fff;
        }

        @media (max-width: 768px) {
            .profile-card {
                flex-direction: column;
                align-items: flex-start;
            }

            .section-header {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 1024px) {
            .admin-pets-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 600px) {
            .admin-pets-grid {
                grid-template-columns: 1fr;
            }
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
                            <a href="{{ route('Inicio') }}" class="nav-item" role="menuitem">Inicio</a>
                            <a href="{{ route('MascotasDisponibles') }}" class="nav-item" role="menuitem">Mascotas</a>
                            <a href="{{ route('RefugiosDisponibles') }}" class="nav-item" role="menuitem">Refugios</a>
                        </div>
                    <div class="nav-auth">
                        <a href="#" class="login-btn">{{ auth()->user()->nombre }} Refugio</a>
                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="logout-btn">Salir</button>
                        </form>
                    </div>
                </nav>
            </div>
        </header>

        <main class="dashboard-container">
            <!-- Shelter Profile Section -->
            <section class="dashboard-section">
                <div class="section-header">
                    <h2 class="section-title">Perfil del Refugio</h2>
                </div>
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
                        <a href="{{ route('refugio.createProfile') }}" class="btn-primario js-edit-refugio-open">Editar Perfil</a>
                    </div>
                @else
                    <div class="profile-card">
                        <p>Aún no has completado el perfil de tu refugio.</p>
                        <a href="{{ route('refugio.createProfile') }}" class="btn-primario js-edit-refugio-open">Crear Perfil</a>
                    </div>
                @endif
            </section>

            <!-- Adoption Requests Section -->
            <section class="dashboard-section">
                <div class="section-header">
                    <h2 class="section-title">Solicitudes de Adopción Recibidas</h2>
                </div>
                <p class="section-subtitle">(Solo se muestran solicitudes de usuarios verificados)</p>

                @if ($solicitudes->count() > 0)
                    <div class="table-wrap">
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
                                            <strong>{{ $solicitud->usuario->nombre }}
                                                {{ $solicitud->usuario->apellido }}</strong><br>
                                            <small>{{ $solicitud->usuario->email }}</small><br>
                                            <small>{{ $solicitud->usuario->telefono }}</small>
                                        </td>
                                        <td>{{ Str::limit($solicitud->mensaje, 50) }}</td>
                                        <td>{{ $solicitud->usuario->ubicacion }}</td>
                                        <td>
                                            <span class="status-badge status-{{ $solicitud->estado }}">
                                                {{ ucfirst($solicitud->estado) }}
                                            </span>
                                        </td>
                                        <td class="actions-cell">
                                            <a href="mailto:{{ $solicitud->usuario->email }}"
                                                class="action-btn btn-primario" style="background:#007bff;">Contactar</a>
                                            <!-- Add Accept/Reject logic here later if needed -->
                                            @if ($solicitud->estado === 'pendiente')
                                                <form action="{{ route('solicitudes.aprobar', $solicitud->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="action-btn btn-accept">Aceptar</button>
                                                </form>
                                                <form action="{{ route('solicitudes.rechazar', $solicitud->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="action-btn btn-reject">Rechazar</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>No tienes solicitudes pendientes de usuarios verificados.</p>
                @endif
            </section>

            <!-- Manage Pets Section (Reused Visuals from Publicaciones) -->
            <section class="dashboard-section">
                <div class="section-header">
                    <h2 class="section-title">Gestionar Mascotas</h2>
                    <a href="{{ route('vistavacia') }}" class="btn-primario">+ Publicar Mascota</a>
                </div>

                <div class="admin-pets-grid">
                    @forelse ($mascotas as $mascota)
                        <!-- Reusing the exact card structure from Publicaciones.blade.php for consistency -->
                        <div class="admin-pet-card"
                            data-id="{{ $mascota->id }}"
                            data-created="{{ $mascota->created_at }}"
                            data-nombre="{{ $mascota->nombre }}"
                            data-edad="{{ $mascota->edad }}"
                            data-id-especies="{{ $mascota->id_especies }}"
                            data-raza="{{ $mascota->raza ?? '' }}"
                            data-genero="{{ $mascota->genero }}"
                            data-peso="{{ $mascota->peso ?? '' }}"
                            data-descripcion="{{ $mascota->descripcion ?? '' }}"
                            data-vacunado="{{ $mascota->vacunado ? 1 : 0 }}"
                            data-esterilizado="{{ $mascota->esterilizado ? 1 : 0 }}"
                            data-ubicacion="{{ $mascota->ubicacion ?? '' }}"
                            data-tamano="{{ $mascota->tamano ?? '' }}"
                            data-foto="{{ $mascota->foto ?? '' }}">
                            <img src="{{ asset('storage/mascotas/' . $mascota->foto) }}" alt="{{ $mascota->nombre }}"
                                class="mascota-foto">
                            <div class="mascota-info">
                                <h3 class="mascota-nombre">{{ $mascota->nombre }}</h3>
                                <p class="mascota-detalle"><strong>Estado:</strong> {{ $mascota->estado }}</p>
                                <div class="admin-pet-actions">
                                    <!-- Use existing edit/delete routes or new ones? Using existing for now since Controller handles permissions -->
                                    <button type="button" class="editar-mascota-btn js-edit-pet-open">Editar</button>
                                    <form action="{{ route('EliminarAnimal', ['id' => $mascota->id]) }}"
                                        method="POST" class="eliminar-mascota-form delete-pet-form"
                                        data-pet-name="{{ $mascota->nombre }}">
                                        @csrf @method('DELETE')
                                        <button type="button" class="eliminar-mascota-btn js-delete-pet-open">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No hay mascotas registradas.</p>
                    @endforelse

                    @if ($mascotas->count() > 0)
                        @php
                            $remainder = $mascotas->count() % 4;
                            $placeholders = $remainder === 0 ? 0 : 4 - $remainder;
                        @endphp
                        @for ($i = 0; $i < $placeholders; $i++)
                            <div class="admin-pet-card placeholder" aria-hidden="true"></div>
                        @endfor
                    @endif
                </div>
            </section>

        </main>

        <div class="confirm-modal" id="deletePetConfirmModal" aria-hidden="true">
            <div class="confirm-modal-card" role="dialog" aria-modal="true" aria-labelledby="deletePetModalTitle">
                <h3 id="deletePetModalTitle">¿Eliminar mascota?</h3>
                <p id="deletePetModalText">Esta acción no se puede deshacer.</p>
                <div class="confirm-modal-actions">
                    <button type="button" class="btn-secundario" id="cancelPetDelete">Cancelar</button>
                    <button type="button" class="btn-danger" id="confirmPetDelete">Eliminar</button>
                </div>
            </div>
        </div>

        <div class="edit-modal" id="editPetModal" aria-hidden="true"
            data-update-url-base="{{ url('/Publicaciones') }}"
            data-image-base="{{ asset('storage/mascotas') }}">
            <div class="edit-modal-card" role="dialog" aria-modal="true" aria-labelledby="editPetModalTitle">
                <div class="edit-modal-header">
                    <h3 id="editPetModalTitle">Editar mascota</h3>
                    <button type="button" class="edit-modal-close" id="editPetModalClose">&times;</button>
                </div>
                <form id="editPetForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="edit-modal-grid">
                        <div class="form-group">
                            <label for="edit-nombre">Nombre</label>
                            <input id="edit-nombre" name="nombre" type="text" class="form-input" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-edad">Edad (años)</label>
                            <input id="edit-edad" name="edad" type="number" min="0" class="form-input" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-id-especies">Especie</label>
                            <select id="edit-id-especies" name="id_especies" class="form-input" required>
                                @foreach ($especies as $especie)
                                    <option value="{{ $especie->id }}">{{ $especie->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit-raza">Raza</label>
                            <select id="edit-raza" name="raza" class="form-input">
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit-genero">Sexo</label>
                            <select id="edit-genero" name="genero" class="form-input" required>
                                <option value="Macho">Macho</option>
                                <option value="Hembra">Hembra</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit-peso">Peso (Lb)</label>
                            <input id="edit-peso" name="peso" type="number" step="0.1" min="0" class="form-input">
                        </div>
                        <div class="form-group">
                            <label for="edit-ubicacion">Ubicación</label>
                            <select id="edit-ubicacion" name="ubicacion" class="form-input">
                                <option value="">Seleccione</option>
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
                        <div class="form-group">
                            <label for="edit-tamano">Tamaño</label>
                            <select id="edit-tamano" name="tamano" class="form-input" required>
                                <option value="Pequeño">Pequeño</option>
                                <option value="Mediano">Mediano</option>
                                <option value="Grande">Grande</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit-vacunado">Vacunado</label>
                            <select id="edit-vacunado" name="vacunado" class="form-input" required>
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit-esterilizado">Esterilizado</label>
                            <select id="edit-esterilizado" name="esterilizado" class="form-input" required>
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="form-group form-group-full">
                            <label for="edit-descripcion">Descripción</label>
                            <textarea id="edit-descripcion" name="descripcion" class="form-input" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit-foto">Foto</label>
                            <input id="edit-foto" name="foto" type="file" class="form-input">
                        </div>
                        <div class="form-group">
                            <label>Vista previa</label>
                            <img id="editPetPreview" class="form-preview" alt="Vista previa">
                        </div>
                    </div>
                    <div class="edit-modal-actions">
                        <button type="button" class="btn-secundario" id="editPetCancel">Cancelar</button>
                        <button type="submit" class="btn-primario">Guardar</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="edit-modal" id="editRefugioModal" aria-hidden="true">
            <div class="edit-modal-card" role="dialog" aria-modal="true" aria-labelledby="editRefugioTitle">
                <div class="edit-modal-header">
                    <h3 id="editRefugioTitle">Editar perfil del refugio</h3>
                    <button type="button" class="edit-modal-close" id="editRefugioClose">&times;</button>
                </div>
                <form id="editRefugioForm" method="POST" action="{{ route('refugio.storeProfile') }}">
                    @csrf
                    <div class="edit-modal-grid">
                        <div class="form-group">
                            <label for="refugio-nombre">Nombre</label>
                            <input id="refugio-nombre" name="nombre" type="text" class="form-input"
                                value="{{ $refugio->nombre ?? '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="refugio-telefono">Teléfono</label>
                            <input id="refugio-telefono" name="telefono" type="text" class="form-input"
                                value="{{ $refugio->telefono ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="refugio-email">Email</label>
                            <input id="refugio-email" name="email" type="email" class="form-input"
                                value="{{ $refugio->email ?? '' }}">
                        </div>
                        <div class="form-group form-group-full">
                            <label for="refugio-direccion">Dirección</label>
                            <input id="refugio-direccion" name="direccion" type="text" class="form-input"
                                value="{{ $refugio->direccion ?? '' }}">
                        </div>
                        <div class="form-group form-group-full">
                            <label for="refugio-descripcion">Descripción</label>
                            <textarea id="refugio-descripcion" name="descripcion" class="form-input"
                                rows="4">{{ $refugio->descripcion ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="edit-modal-actions">
                        <button type="button" class="btn-secundario" id="editRefugioCancel">Cancelar</button>
                        <button type="submit" class="btn-primario">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
            </footer>
            
    <script>
      document.addEventListener('DOMContentLoaded', () => {
        const deleteModal = document.getElementById('deletePetConfirmModal');
        const cancelBtn = document.getElementById('cancelPetDelete');
        const confirmBtn = document.getElementById('confirmPetDelete');
        const modalText = document.getElementById('deletePetModalText');
        let pendingForm = null;

        function openDeleteModal(name) {
          if (!deleteModal) return;
          modalText.textContent = `Vas a eliminar a ${name}. Esta acción no se puede deshacer.`;
          deleteModal.classList.add('is-active');
          deleteModal.setAttribute('aria-hidden', 'false');
        }

        function closeDeleteModal() {
          if (!deleteModal) return;
          deleteModal.classList.remove('is-active');
          deleteModal.setAttribute('aria-hidden', 'true');
          pendingForm = null;
        }

        document.querySelectorAll('.delete-pet-form').forEach((form) => {
          const btn = form.querySelector('.js-delete-pet-open');
          if (!btn) return;
          btn.addEventListener('click', (e) => {
            e.preventDefault();
            pendingForm = form;
            const name = form.getAttribute('data-pet-name') || 'esta mascota';
            openDeleteModal(name);
          });
        });

        if (confirmBtn) {
          confirmBtn.addEventListener('click', () => {
            if (pendingForm) pendingForm.submit();
          });
        }

        if (cancelBtn) cancelBtn.addEventListener('click', closeDeleteModal);
        if (deleteModal) {
          deleteModal.addEventListener('click', (e) => {
            if (e.target === deleteModal) closeDeleteModal();
          });
        }

        const razas = {
          1: [
            "Labrador",
            "Golden Retriever",
            "Pastor Alemán",
            "Pug",
            "Beagle",
            "Poodle",
            "Chihuahua",
            "Boxer",
            "Dachshund",
            "Rottweiler",
            "Husky",
            "Bulldog Inglés",
            "Criollo/Mestizo",
            "Otro"
          ],
          2: [
            "Siamés",
            "Persa",
            "Maine Coon",
            "Bengala­",
            "Esfinge",
            "Ragdoll",
            "British Shorthair",
            "Abisinio",
            "Birmano",
            "Scottish Fold",
            "Criollo/Mestizo",
            "Otro"
          ]
        };

        function cargarRazas(especie, selected) {
          const razaSelect = document.getElementById('edit-raza');
          if (!razaSelect) return;
          razaSelect.innerHTML = '<option value="">Seleccione</option>';
          const list = razas[especie];
          if (!list) return;
          list.forEach((raza) => {
            const option = document.createElement('option');
            option.value = raza;
            option.textContent = raza;
            if (selected && selected === raza) {
              option.selected = true;
            }
            razaSelect.appendChild(option);
          });
        }

        const editModal = document.getElementById('editPetModal');
        const editForm = document.getElementById('editPetForm');
        const editClose = document.getElementById('editPetModalClose');
        const editCancel = document.getElementById('editPetCancel');
        const editPreview = document.getElementById('editPetPreview');
        const editFotoInput = document.getElementById('edit-foto');
        const editEspecieSelect = document.getElementById('edit-id-especies');

        function openEditModal(card) {
          if (!editModal || !editForm || !card) return;

          const baseUrl = editModal.getAttribute('data-update-url-base') || '';
          const imageBase = editModal.getAttribute('data-image-base') || '';
          const id = card.getAttribute('data-id');

          editForm.action = `${baseUrl}/${id}`;
          document.getElementById('edit-nombre').value = card.getAttribute('data-nombre') || '';
          document.getElementById('edit-edad').value = card.getAttribute('data-edad') || 0;
          const especieValue = card.getAttribute('data-id-especies') || '';
          const razaValue = card.getAttribute('data-raza') || '';
          document.getElementById('edit-id-especies').value = especieValue;
          cargarRazas(especieValue, razaValue);
          document.getElementById('edit-raza').value = card.getAttribute('data-raza') || '';
          document.getElementById('edit-genero').value = card.getAttribute('data-genero') || 'Macho';
          document.getElementById('edit-peso').value = card.getAttribute('data-peso') || '';
          document.getElementById('edit-ubicacion').value = card.getAttribute('data-ubicacion') || '';
          document.getElementById('edit-tamano').value = card.getAttribute('data-tamano') || 'Mediano';
          document.getElementById('edit-vacunado').value = card.getAttribute('data-vacunado') || '0';
          document.getElementById('edit-esterilizado').value = card.getAttribute('data-esterilizado') || '0';
          document.getElementById('edit-descripcion').value = card.getAttribute('data-descripcion') || '';

          const foto = card.getAttribute('data-foto');
          if (editPreview) {
            if (foto) {
              editPreview.src = `${imageBase}/${foto}`;
              editPreview.style.display = 'block';
            } else {
              editPreview.removeAttribute('src');
              editPreview.style.display = 'none';
            }
          }

          if (editFotoInput) editFotoInput.value = '';
          editModal.classList.add('is-active');
          editModal.setAttribute('aria-hidden', 'false');
          document.body.classList.add('no-scroll');
        }

        function closeEditModal() {
          if (!editModal) return;
          editModal.classList.remove('is-active');
          editModal.setAttribute('aria-hidden', 'true');
          document.body.classList.remove('no-scroll');
        }

        document.querySelectorAll('.js-edit-pet-open').forEach((btn) => {
          btn.addEventListener('click', () => {
            const card = btn.closest('.admin-pet-card');
            openEditModal(card);
          });
        });

        if (editEspecieSelect) {
          editEspecieSelect.addEventListener('change', (e) => {
            cargarRazas(e.target.value, '');
          });
        }

        if (editClose) editClose.addEventListener('click', closeEditModal);
        if (editCancel) editCancel.addEventListener('click', closeEditModal);
        if (editModal) {
          editModal.addEventListener('click', (e) => {
            if (e.target === editModal) closeEditModal();
          });
        }

        if (editFotoInput && editPreview) {
          editFotoInput.addEventListener('change', (e) => {
            const file = e.target.files && e.target.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = (ev) => {
              editPreview.src = ev.target.result;
              editPreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
          });
        }

        const refugioModal = document.getElementById('editRefugioModal');
        const refugioClose = document.getElementById('editRefugioClose');
        const refugioCancel = document.getElementById('editRefugioCancel');

        function openRefugioModal() {
          if (!refugioModal) return;
          refugioModal.classList.add('is-active');
          refugioModal.setAttribute('aria-hidden', 'false');
          document.body.classList.add('no-scroll');
        }

        function closeRefugioModal() {
          if (!refugioModal) return;
          refugioModal.classList.remove('is-active');
          refugioModal.setAttribute('aria-hidden', 'true');
          document.body.classList.remove('no-scroll');
        }

        document.querySelectorAll('.js-edit-refugio-open').forEach((btn) => {
          btn.addEventListener('click', (e) => {
            e.preventDefault();
            openRefugioModal();
          });
        });

        if (refugioClose) refugioClose.addEventListener('click', closeRefugioModal);
        if (refugioCancel) refugioCancel.addEventListener('click', closeRefugioModal);
        if (refugioModal) {
          refugioModal.addEventListener('click', (e) => {
            if (e.target === refugioModal) closeRefugioModal();
          });
        }
      });
    </script>
</body>

</html>
