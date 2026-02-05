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


                                    <a href="{{ route('Dashboard') }}" class="login-btn">{{ auth()->user()->nombre }}
                                        {{ auth()->user()->apellido }}</a>
                                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                        @csrf

                                    </form>
                                @else
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
                            <div class="menu-item">
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
                                <a href="{{ route('logout') }}" style="color:inherit; text-decoration:none;">Cerrar
                                    sesión</a>
                            </div>
                        </div>
                    </div>
                </aside>

                <div class="main-content">
                    <div class="paginas-section">
                        <div class="titulo-wrapper">
                            <h1 class="paginas-title">Editar Mascota</h1>
                            <div class="titulo-line" aria-hidden="true"></div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('AdminAnimales') }}" class="btn-volver">← Volver a Animales</a>
                    </div>

                    <div class="usuarios-card">
                        <!-- Formulario de edición de mascota -->
                        <form action="{{ route('ActualizarAnimal', $mascota->id) }}" method="POST"
                            enctype="multipart/form-data" class="editar-usuario-form edit-form">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <!-- ERRORES -->
                                @if ($errors->any())
                                    <div class="alert alert-error"
                                        style="background:#ffe5e5; color:#8b0000; padding:12px; border-radius:8px; margin-bottom:16px;">
                                        <strong>❌ Ocurrieron errores al publicar la mascota:</strong>
                                        <ul style="margin-top:8px; padding-left:20px;">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="form-grid">
                                    <!-- Foto mascota (izquierda) -->
                                    <div class="photo-column">
                                        <label
                                            style="color:#af7700; font-weight: 600; display: block; margin-bottom: 8px;">Foto
                                            de
                                            la mascota</label>
                                        <input type="file" id="fotoMascota" name="foto" accept="image/*"
                                            hidden>
                                        <label for="fotoMascota" class="photo-box"
                                            style="display: block; width: 100%; height: 300px; border: 2px dashed #af7700; border-radius: 8px; cursor: pointer; overflow: hidden; position: relative; background: #f9f9f9;">
                                            <div class="photo-placeholder"
                                                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                                                <span style="color:#af7700; font-size: 16px;">📷 Añadir foto</span>
                                            </div>
                                            <img id="previewFoto" alt=""
                                                src="{{ asset('storage/mascotas/' . $mascota->foto) }}"
                                                style="width: 100%; height: 100%; object-fit: cover; display: block;" />
                                        </label>
                                        @error('foto')
                                            <span class="text-danger"
                                                style="color: #dc3545; font-size: 14px; margin-top: 4px; display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Campos (derecha) -->
                                    <div class="fields-column">
                                        <!-- Fila 1: Nombre + Especie -->
                                        <div class="form-row" style="display: flex; gap: 20px; margin-bottom: 20px;">
                                            <div class="form-group" style="flex: 1;">
                                                <label
                                                    style="color:#af7700; font-weight: 600; display: block; margin-bottom: 8px;">Nombre</label>
                                                <input type="text" id="nombre" name="nombre"
                                                    value="{{ old('nombre', $mascota->nombre) }}" placeholder="Nombre del panita"
                                                    required
                                                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px;">
                                                @error('nombre')
                                                    <span class="text-danger"
                                                        style="color: #dc3545; font-size: 14px; margin-top: 4px; display: block;">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group" style="flex: 1;">
                                                <label
                                                    style="color:#af7700; font-weight: 600; display: block; margin-bottom: 8px;">Especie</label>
                                                <select id="especie" name="id_especies" required
                                                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px; background: white;">
                                                    <option value="">Seleccione una especie</option>
                                                    @foreach ($especies as $especie)
                                                        <option value="{{ $especie->id }}"
                                                            {{ old('id_especies', $mascota->id_especies) == $especie->id ? 'selected' : '' }}>
                                                            {{ $especie->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('id_especies')
                                                    <span class="text-danger"
                                                        style="color: #dc3545; font-size: 14px; margin-top: 4px; display: block;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Fila 2: Edad + Peso -->
                                        <div class="form-row" style="display: flex; gap: 20px; margin-bottom: 20px;">
                                            <div class="form-group" style="flex: 1;">
                                                <label
                                                    style="color:#af7700; font-weight: 600; display: block; margin-bottom: 8px;">Edad
                                                    (años)</label>
                                                <input type="number" id="edad" min="0" max="30"
                                                    name="edad" value="{{ old('edad', $mascota->edad) }}" required
                                                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px;">
                                                @error('edad')
                                                    <span class="text-danger"
                                                        style="color: #dc3545; font-size: 14px; margin-top: 4px; display: block;">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group" style="flex: 1;">
                                                <label
                                                    style="color:#af7700; font-weight: 600; display: block; margin-bottom: 8px;">Peso
                                                    (LB)</label>
                                                <input type="number" id="peso" name="peso" min="0"
                                                    max="100" step="0.1" value="{{ old('peso', $mascota->peso) }}"
                                                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px;">
                                                @error('peso')
                                                    <span class="text-danger"
                                                        style="color: #dc3545; font-size: 14px; margin-top: 4px; display: block;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Fila 3: Tamaño + Sexo -->
                                        <div class="form-row" style="display: flex; gap: 20px; margin-bottom: 20px;">
                                            <div class="form-group" style="flex: 1;">
                                                <label
                                                    style="color:#af7700; font-weight: 600; display: block; margin-bottom: 8px;">Tamaño</label>
                                                <select id="tamano" name="tamano"
                                                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px; background: white;">
                                                    <option value="">Seleccione</option>
                                                    <option value="Pequeño"
                                                        {{ old('tamano', $mascota->tamano) == 'Pequeño' ? 'selected' : '' }}>
                                                        Pequeño</option>
                                                    <option value="Mediano"
                                                        {{ old('tamano', $mascota->tamano) == 'Mediano' ? 'selected' : '' }}>
                                                        Mediano</option>
                                                    <option value="Grande"
                                                        {{ old('tamano', $mascota->tamano) == 'Grande' ? 'selected' : '' }}>Grande
                                                    </option>
                                                </select>
                                                @error('tamano')
                                                    <span class="text-danger"
                                                        style="color: #dc3545; font-size: 14px; margin-top: 4px; display: block;">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group" style="flex: 1;">
                                                <label
                                                    style="color:#af7700; font-weight: 600; display: block; margin-bottom: 8px;">Sexo</label>
                                                <select id="sexo" name="genero" required
                                                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px; background: white;">
                                                    <option value="">Seleccione</option>
                                                    <option value="Macho"
                                                        {{ old('genero', $mascota->genero) == 'Macho' ? 'selected' : '' }}>Macho
                                                    </option>
                                                    <option value="Hembra"
                                                        {{ old('genero', $mascota->genero) == 'Hembra' ? 'selected' : '' }}>
                                                        Hembra</option>
                                                </select>
                                                @error('genero')
                                                    <span class="text-danger"
                                                        style="color: #dc3545; font-size: 14px; margin-top: 4px; display: block;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div> <!-- fin fields-column -->
                                </div> <!-- fin form-grid -->

                                <!-- Descripción full-width debajo de todo el grid -->
                                <div class="description-full-width" style="margin-top: 30px;">
                                    <label
                                        style="color:#af7700; font-weight: 600; display: block; margin-bottom: 8px;">Descripción</label>
                                    <textarea id="descripcion" rows="6" maxlength="500" name="descripcion" placeholder="Describe al panita"
                                        style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px; resize: vertical;">{{ old('descripcion', $mascota->descripcion) }}</textarea>
                                    @error('descripcion')
                                        <span class="text-danger"
                                            style="color: #dc3545; font-size: 14px; margin-top: 4px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Historial médico -->
                                <div class="form-group" style="margin-top: 30px;">
                                    <label
                                        style="color:#af7700; font-weight: 600; display: block; margin-bottom: 8px;">
                                        Historial médico (múltiples archivos)
                                    </label>

                                    <!-- Input real oculto -->
                                    <input type="file" id="documentacion" name="documentacion[]" value="{{ old('documentacion', $mascota->documentacion) }}" multiple class="file-input">

                                    <!-- Botón visual -->
                                    <label for="documentacion" class="file-btn">
                                        Seleccionar archivos
                                    </label>

                                    <span id="fileName" class="file-upload-text">
                                        Ningún archivo seleccionado
                                    </span>

                                    @error('documentacion')
                                        <span class="text-danger"
                                            style="color: #dc3545; font-size: 14px; margin-top: 6px; display: block;">
                                            {{ $message }}
                                        </span>
                                    @enderror

                                    @error('documentacion.*')
                                        <span class="text-danger"
                                            style="color: #dc3545; font-size: 14px; margin-top: 6px; display: block;">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-row" style="display: flex; gap: 20px; margin-top: 20px;">
                                    <div class="form-group" style="flex: 1;">
                                        <label
                                            style="color:#af7700; font-weight: 600; display: block; margin-bottom: 8px;">Raza</label>
                                        <select id="raza" name="raza"
                                            style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px; background: white;">
                                            <option value="">Seleccione</option>
                                            @if (old('raza', $mascota->raza))
                                                <option value="{{ old('raza', $mascota->raza) }}" selected>
                                                    {{ old('raza', $mascota->raza) }}
                                                </option>
                                            @endif
                                            <!-- Las opciones se cargarán con JavaScript -->
                                        </select>
                                        @error('raza')
                                            <span class="text-danger"
                                                style="color: #dc3545; font-size: 14px; margin-top: 4px; display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row" style="display: flex; gap: 20px; margin-top: 20px;">
                                    <div class="form-group" style="flex: 1;">
                                        <label
                                            style="color:#af7700; font-weight: 600; display: block; margin-bottom: 8px;">Ubicación</label>
                                        <select id="ubicacion" name="ubicacion" required
                                            style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px; background: white;">
                                            <option value="">Seleccione</option>
                                            <option value="Caracas"
                                                {{ old('ubicacion', $mascota->ubicacion) == 'Caracas' ? 'selected' : '' }}>Caracas
                                            </option>
                                            <option value="Miranda"
                                                {{ old('ubicacion', $mascota->ubicacion) == 'Miranda' ? 'selected' : '' }}>Miranda
                                            </option>
                                            <option value="La Guaira"
                                                {{ old('ubicacion', $mascota->ubicacion) == 'La Guaira' ? 'selected' : '' }}>La
                                                Guaira</option>
                                            <option value="Zulia"
                                                {{ old('ubicacion', $mascota->ubicacion) == 'Zulia' ? 'selected' : '' }}>Zulia
                                            </option>
                                            <option value="Lara" {{ old('ubicacion', $mascota->ubicacion) == 'Lara' ? 'selected' : '' }}>
                                                Lara
                                            </option>
                                            <option value="Carabobo"
                                                {{ old('ubicacion', $mascota->ubicacion) == 'Carabobo' ? 'selected' : '' }}>
                                                Carabobo</option>
                                            <option value="Sucre"
                                                {{ old('ubicacion', $mascota->ubicacion) == 'Sucre' ? 'selected' : '' }}>Sucre
                                            </option>
                                            <option value="Anzoátegui"
                                                {{ old('ubicacion', $mascota->ubicacion) == 'Anzoátegui' ? 'selected' : '' }}>
                                                Anzoátegui</option>
                                            <option value="Nueva Esparta"
                                                {{ old('ubicacion', $mascota->ubicacion) == 'Nueva Esparta' ? 'selected' : '' }}>Nueva
                                                Esparta</option>
                                        </select>
                                        @error('ubicacion')
                                            <span class="text-danger"
                                                style="color: #dc3545; font-size: 14px; margin-top: 4px; display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="form-row" style="display: flex; gap: 20px; margin-top: 20px;">
                                    <div class="form-group" style="flex: 1;">
                                        <label
                                            style="color:#af7700; font-weight: 600; display: block; margin-bottom: 8px;">Vacunado</label>
                                        <select id="vacunado" name="vacunado" required
                                            style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px; background: white;">
                                            <option value="" disabled>Si/No</option>
                                            <option value="1" {{ old('vacunado', $mascota->vacunado) == '1' ? 'selected' : '' }}>Sí
                                            </option>
                                            <option value="0" {{ old('vacunado', $mascota->vacunado) == '0' ? 'selected' : '' }}>No
                                            </option>
                                        </select>
                                        @error('vacunado')
                                            <span class="text-danger"
                                                style="color: #dc3545; font-size: 14px; margin-top: 4px; display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group" style="flex: 1;">
                                        <label
                                            style="color:#af7700; font-weight: 600; display: block; margin-bottom: 8px;">Esterilizado</label>
                                        <select id="esterilizado" name="esterilizado" required
                                            style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px; background: white;">
                                            <option value="" disabled>Si/No</option>
                                            <option value="1" {{ old('esterilizado', $mascota->esterilizado) == '1' ? 'selected' : '' }}>
                                                Sí</option>
                                            <option value="0" {{ old('esterilizado', $mascota->esterilizado) == '0' ? 'selected' : '' }}>
                                                No</option>
                                        </select>
                                        @error('esterilizado')
                                            <span class="text-danger"
                                                style="color: #dc3545; font-size: 14px; margin-top: 4px; display: block;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Botón de envío -->
                                <div
                                    style="display:flex;justify-content:center;gap:20px;margin-top:40px;padding-bottom: 40px;">
                                    <a href="{{ route('AdminAnimales') }}" class="submit-btn"
                                        style="padding: 12px 30px; background: #f0f0f0; color: #333; border: none; border-radius: 6px; font-size: 16px; cursor: pointer; text-decoration: none; text-align: center;">Cancelar</a>
                                    <button type="submit" class="submit-bt" id="submitBtn">
                                        <span class="btn-text">Actualizar Mascota</span>
                                        <span class="btn-loader"></span>
                                    </button>

                                </div>
                            </div>
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
                            <a href="Voluntariado">Voluntariado</a>
                            <a href="Registro">Registrarse</a>
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
  const fileInput = document.getElementById('documentacion');
  const fileName = document.getElementById('fileName');
  const preview = document.getElementById('previewFoto');
  const placeholder = document.querySelector('.photo-placeholder');
  if (!fileInput || !fileName) return;

  fileInput.addEventListener('change', () => {
    if (fileInput.files && fileInput.files.length > 0) {
      fileName.textContent = `${fileInput.files.length} archivo(s) seleccionado(s)`;
    } else {
      fileName.textContent = 'Ningún archivo seleccionado';
    }
  });

  if (preview && preview.getAttribute('src') && placeholder) {
    placeholder.style.display = 'none';
  }
});
</script>
</html>


