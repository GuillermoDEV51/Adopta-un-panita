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

    @vite(['resources/css/styles.css'])
    <style>
        /* Estilos para las animaciones */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }

        .animate-on-scroll.animate-left {
            transform: translateX(-100px);
        }

        .animate-on-scroll.animate-right {
            transform: translateX(100px);
        }

        .animate-on-scroll.animate-up {
            transform: translateY(100px);
        }

        .animate-on-scroll.visible {
            opacity: 1;
            transform: translateX(0) translateY(0);
        }

        /* Animación para las patitas */
        .paw-inicial,
        .paw-final {
            transition: transform 0.5s ease;
        }

        .paw-inicial:hover,
        .paw-final:hover {
            transform: rotate(20deg) scale(1.1);
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        /* Animación para las imágenes decorativas */
        .decorative-image-left,
        .decorative-image-right {
            transition: all 0.5s ease;
        }

        .decorative-image-left:hover {
            transform: translateX(-10px) rotate(-5deg);
        }

        .decorative-image-right:hover {
            transform: translateX(10px) rotate(5deg);
        }

        /* Animación para las cajas de categorías */
        .category-complete {
            transition: all 0.4s ease;
        }

        .category-complete:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* Animación para el banco */
        .bank-box {
            transition: all 0.5s ease;
        }

        .bank-box:hover {
            transform: scale(1.02);
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

                                    <a href="{{ route('Dashboard') }}" class="login-btn">{{ auth()->user()->nombre }}
                                        {{ auth()->user()->apellido }}</a>
                                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                        @csrf
                                        <!-- <button type="submit" class="register-btn">Cerrar sesión</button> -->
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
            <div class="paginas-section4">
                <div class="titulo-wrapper4">
                    <h1 class="paginas-title4">Mascotas disponibles</h1>
                </div>

                <!-- Sistema de Filtros Compacto -->
                <div class="filtros-compactos">
                    <!-- Primera fila: Filtro principal y acciones -->
                    <div class="filtros-superiores">
                        <div class="filtro-principal-compacto">
                            <div class="filtro-titulo">
                                <i class="fas fa-filter"></i>
                                <span>¿Deseas un perro o un gato?</span>
                            </div>
                            <div class="opciones-compactas">
                                <button class="opcion-compacta" data-tipo="perro" data-seleccionado="false">
                                    <i class="fas fa-dog"></i>
                                    <span>Perro</span>
                                </button>
                                <button class="opcion-compacta" data-tipo="gato" data-seleccionado="false">
                                    <i class="fas fa-cat"></i>
                                    <span>Gato</span>
                                </button>
                                <button class="opcion-compacta" data-tipo="otros" data-seleccionado="false">
                                    <i class="fas fa-paw"></i>
                                    <span>Otros</span>
                                </button>
                            </div>
                        </div>

                        <div class="acciones-filtros" style="display:flex; gap:10px; align-items:center;">
                            <!-- BotÃ³n Procesar Filtros -->
                            <button class="btn-procesar-compacto" id="procesarFiltros">
                                <span>Procesar Filtros</span>
                            </button>

                            <!-- BotÃ³n Agregar Mascota -->
                            <a href="{{ auth()->check() ? route('vistavacia') : route('login') }}"
                                class="btn-agregar-compacto">
                                <i class="fas fa-plus-circle"></i>
                                <span>Agregar Mascota</span>
                            </a>

                            <!-- BotÃ³n Limpiar Filtros -->
                            <button class="btn-limpiar-compacto" id="limpiarFiltros">
                                <i class="fas fa-times"></i>
                                <span>Limpiar Filtros</span>
                            </button>
                        </div>
                    </div>

                    <style>
                        .btn-agregar-compacto {
                            display: inline-flex;
                            align-items: center;
                            gap: 6px;
                            padding: 8px 16px;
                            background: #9b6b01;
                            color: white;
                            border-radius: 8px;
                            font-weight: 600;
                            text-decoration: none;
                            cursor: pointer;
                            transition: background 0.2s;
                        }

                        .btn-agregar-compacto:hover {
                            background: #b07d1a;
                        }
                    </style>



                    <!-- Segunda fila: Filtros secundarios (se muestran al seleccionar tipo) -->
                    <div class="filtros-secundarios-compactos" id="filtrosSecundarios">
                        <div class="filtro-grupo-compacto">
                            <label for="raza" class="filtro-label-compacto">
                            </label>
                            <select id="raza" class="select-compacto">
                                <option value="">Raza</option>
                                <!-- Las opciones se llenarÃ¡n dinÃ¡micamente -->
                            </select>
                        </div>


                        <div class="filtro-grupo-compacto">
                            <label for="ubicacion" class="filtro-label-compacto">
                            </label>
                            <select id="ubicacion" class="select-compacto">
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

                        <div class="filtro-grupo-compacto">
                            <label for="tamano" class="filtro-label-compacto">
                            </label>
                            <select id="tamano" class="select-compacto">
                                <option value="">Tamaño</option>
                                <option value="pequeno">Pequeño</option>
                                <option value="mediano">Mediano</option>
                                <option value="grande">Grande</option>
                            </select>
                        </div>

                        <div class="filtro-grupo-compacto">
                            <label for="edad" class="filtro-label-compacto">
                            </label>
                            <select id="edad" class="select-compacto">
                                <option value="">Edad</option>
                                <option value="joven">1-6 años</option>
                                <option value="adulto">7-12 años</option>
                                <option value="viejo">13-20 años</option>
                            </select>
                        </div>

                        <div class="filtro-grupo-compacto">
                            <label for="esterilizado" class="filtro-label-compacto">
                            </label>
                            <select id="esterilizado" class="select-compacto">
                                <option value="">Esterilizado</option>
                                <option value="si">Si</option>
                                <option value="no">No</option>
                            </select>
                        </div>

                        <div class="filtro-grupo-compacto">
                            <label for="sexo" class="filtro-label-compacto">
                            </label>
                            <select id="sexo" class="select-compacto">
                                <option value="">Sexo</option>
                                <option value="macho">Macho</option>
                                <option value="hembra">Hembra</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Fin Sistema de Filtros Compacto -->

                <!--tarjetas de mascotas -->
                <main>
                    <div class="mascotas-grid">



                        @foreach ($mascotas as $mascota)
                            <div class="mascota-card" data-id="{{ $mascota->id }}"
                                data-nombre="{{ $mascota->nombre }}" data-edad="{{ $mascota->edad }}"
                                data-tipo="{{ $mascota->especie->nombre ?? 'Sin especie' }}"
                                data-raza="{{ $mascota->raza ?? 'Desconocida' }}" data-sexo="{{ $mascota->genero }}"
                                data-ubicacion="{{ $mascota->ubicacion ?? 'No especificada' }}"
                                data-tamano="{{ $mascota->tamano ?? '' }}"
                                data-esterilizado="{{ is_null($mascota->esterilizado) ? '' : ($mascota->esterilizado ? 'si' : 'no') }}"
                                data-descripcion="{{ $mascota->descripcion ?? '' }}"
                                data-foto="{{ asset('storage/mascotas/' . $mascota->foto) }}"
                                data-telefono="{{ $mascota->usuario->telefono ?? '' }}">

                                <img src="{{ asset('storage/mascotas/' . $mascota->foto) }}"
                                    alt="Foto de {{ $mascota->nombre }}" class="mascota-foto">
                                <div class="mascota-info">
                                    <h3 class="mascota-nombre">{{ $mascota->nombre }}</h3>
                                    <p class="mascota-detalle"><strong>Edad:</strong> {{ $mascota->edad }} años
                                    </p>
                                    <p class="mascota-detalle"><strong>Tipo:</strong>

                                        @if ($mascota->especie && $mascota->especie->nombre)
                                            {{ $mascota->especie->nombre }}
                                        @else
                                            Sin especie
                                        @endif
                                    </p>

                                    <p class="mascota-detalle"><strong>Raza:</strong>
                                        {{ $mascota->raza ?? 'Desconocida' }}</p>
                                    <p class="mascota-detalle"><strong>Sexo:</strong> {{ $mascota->genero }}</p>
                                    <p class="mascota-detalle"><strong>Ubicación:</strong>
                                        {{ $mascota->ubicacion ?? 'No especificada' }}</p>
                                    <p class="mascota-detalle"><strong>Estado:</strong>
                                        {{ $mascota->estado ?? 'Desconocido' }}</p>
                                    <p class="mascota-descripcion"></p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </main>
            </div>

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
                            <a href="Voluntariado">Voluntariado</a>
                            <a href="Registro">Registrarse</a>
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
    </div>

    @vite(['resources/js/menu.js'])
    <script>
        window.authUser = @json([
            'isLogged' => auth()->check(),
            'name' => auth()->user()->nombre ?? null,
        ]);
    </script>
    <!-- MODAL OVERLAY MASCOTA -->
    <div id="mascotaModal" class="modal-overlay">
        <div class="modal-content">
            <button class="modal-close">&times;</button>

            <div class="modal-body">
                <div class="modal-image">
                    <img id="modalFoto" src="" alt="Mascota">
                </div>

                <div class="modal-info">
                    <h2 id="modalNombre"></h2>

                    <p><strong>Edad:</strong> <span id="modalEdad"></span></p>
                    <p><strong>Tipo:</strong> <span id="modalTipo"></span></p>
                    <p><strong>Raza:</strong> <span id="modalRaza"></span></p>
                    <p><strong>Sexo:</strong> <span id="modalSexo"></span></p>
                    <p><strong>Ubicación:</strong> <span id="modalUbicacion"></span></p>

                    <p class="modal-desc" id="modalDescripcion"></p>
                    <div class="modal-contacto">
                        <form id="formAdopcion" method="POST">
                            @csrf
                            <textarea name="mensaje" placeholder="Mensaje para el refugio (Opcional)" class="modal-textarea"></textarea>
                            <div class="modal-actions">
                                <button type="submit" class="btn-adoptar">
                                    <i class="fas fa-paw"></i> Solicitar Adopción
                                </button>
                                <a id="modalTelefono" href="#" class="btn-telefono">
                                    <i class="fas fa-phone"></i> Llamar
                                    <span class="tooltip-numero" id="tooltipNumero"></span>
                                </a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- MODAL OVERLAY VERIFICACIÃ“N -->
    <div id="verificationModal" class="modal-overlay">
        <div class="modal-content modal-content--verification">
            <button class="modal-close"
                onclick="document.getElementById('verificationModal').classList.remove('active')">&times;</button>

            <div class="modal-body modal-body--verification">
                <div class="verification-icon">
                    <i class="fas fa-user-shield"></i>
                </div>
                <h2 class="verification-title">Autorización Requerida</h2>
                <p class="verification-text">
                    Para garantizar la seguridad de nuestras mascotas, requerimos que tu cuenta sea verificada
                    por un administrador antes de poder adoptar.
                    <br><br>
                    Este proceso es <strong>Único</strong> y una vez autorizado podrás adoptar libremente.
                </p>

                <form action="{{ route('verification.request') }}" method="POST">
                    @csrf
                    <button type="submit" class="submit-bt verification-btn">
                        Solicitar Autorización
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('verificationModal');
            if (!modal) return;
            const closeBtn = modal.querySelector('.modal-close');

            function closeModal() {
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }

            if (closeBtn) {
                closeBtn.addEventListener('click', closeModal);
            }

            modal.addEventListener('click', (e) => {
                if (e.target === modal) closeModal();
            });
        });
    </script>

    <!-- Trigger para el modal si viene de sesiÃ³n -->
    @if (session('require_verification'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const modal = document.getElementById('verificationModal');
                if (modal) {
                    modal.classList.add('active');
                    document.body.style.overflow = 'hidden';
                }
            });
        </script>
    @endif

    <script>
        // Datos de razas por tipo de mascota
        const razasPorTipo = {
            perro: [
                "Labrador Retriever",
                "Pastor Alemán",
                "Golden Retriever",
                "Bulldog Francés",
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
            gato: [
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

        // Elementos del DOM
        const opcionesTipo = document.querySelectorAll('.opcion-compacta');
        const filtrosSecundarios = document.getElementById('filtrosSecundarios');
        const selectRaza = document.getElementById('raza');
        const btnLimpiar = document.getElementById('limpiarFiltros');
        const btnProcesar = document.getElementById('procesarFiltros');
        let tipoSeleccionado = null;

        // FunciÃ³n para actualizar las opciones de raza
        function actualizarRazas(tipo) {
            // Limpiar opciones actuales
            selectRaza.innerHTML = '<option value="">Raza</option>';

            // Agregar nuevas opciones segÃºn el tipo
            razasPorTipo[tipo].forEach(raza => {
                const option = document.createElement('option');
                option.value = raza.toLowerCase().replace(/\s+/g, '-');
                option.textContent = raza;
                selectRaza.appendChild(option);
            });
        }

        function seleccionarTipo(tipo) {
            // Si ya estÃ¡ seleccionado, deseleccionar
            if (tipoSeleccionado === tipo) {
                const botonActual = document.querySelector(`[data-tipo="${tipo}"]`);
                botonActual.setAttribute('data-seleccionado', 'false');
                botonActual.classList.remove('seleccionado');
                tipoSeleccionado = null;

                // Ocultar filtros secundarios
                filtrosSecundarios.classList.remove('mostrar');
                filtrosSecundarios.style.maxHeight = '0';
                filtrosSecundarios.style.opacity = '0';
                filtrosSecundarios.style.marginTop = '0';

                procesarFiltros();
                return;
            }

            // Remover selecciÃ³n anterior
            opcionesTipo.forEach(btn => {
                btn.setAttribute('data-seleccionado', 'false');
                btn.classList.remove('seleccionado');
            });

            // Marcar como seleccionado
            const botonSeleccionado = document.querySelector(`[data-tipo="${tipo}"]`);
            botonSeleccionado.setAttribute('data-seleccionado', 'true');
            botonSeleccionado.classList.add('seleccionado');

            tipoSeleccionado = tipo;

            // Mostrar filtros secundarios
            filtrosSecundarios.classList.add('mostrar');
            filtrosSecundarios.style.maxHeight = filtrosSecundarios.scrollHeight + 'px';
            filtrosSecundarios.style.opacity = '1';
            filtrosSecundarios.style.marginTop = '1rem';

            // Actualizar opciones de raza solo para perros o gatos
            if (tipo === 'perro' || tipo === 'gato') {
                actualizarRazas(tipo);
            } else {
                // Para "Otros", raza queda visible pero vacÃ­a
                selectRaza.innerHTML = '<option value="">Raza</option>';
            }

            procesarFiltros();
        }

        function limpiarFiltros() {
            console.log('Limpiando todos los filtros...');

            // 1. Remover selecciÃ³n de tipo (perro/gato/otros)
            opcionesTipo.forEach(btn => {
                btn.setAttribute('data-seleccionado', 'false');
                btn.classList.remove('seleccionado');
            });

            // 2. Ocultar filtros secundarios
            filtrosSecundarios.classList.remove('mostrar');
            filtrosSecundarios.style.maxHeight = '0';
            filtrosSecundarios.style.opacity = '0';
            filtrosSecundarios.style.marginTop = '0';

            // 3. Limpiar selecciones de todos los filtros
            tipoSeleccionado = null;

            // Restablecer todos los selects a su valor por defecto
            document.getElementById('raza').selectedIndex = 0;
            document.getElementById('ubicacion').selectedIndex = 0;
            document.getElementById('tamano').selectedIndex = 0;
            document.getElementById('edad').selectedIndex = 0;
            document.getElementById('esterilizado').selectedIndex = 0;
            document.getElementById('sexo').selectedIndex = 0;

            // 4. Procesar filtros para mostrar todas las mascotas
            procesarFiltros();

            console.log('âœ“ Filtros limpiados correctamente');
            console.log('âœ“ Mostrando todas las mascotas disponibles');
        }

        function procesarFiltros() {
            const tipo = tipoSeleccionado; // perro, gato, otros
            const raza = selectRaza.value;
            const ubicacion = document.getElementById('ubicacion').value.toLowerCase();
            const tamano = document.getElementById('tamano').value.toLowerCase();
            const edad = document.getElementById('edad').value.toLowerCase();
            const esterilizado = document.getElementById('esterilizado').value.toLowerCase();
            const sexo = document.getElementById('sexo').value.toLowerCase();

            const tarjetas = document.querySelectorAll('.mascota-card');

            const tiposPrincipales = ['perro', 'gato'];

            function normalize(value) {
                return (value || '')
                    .toString()
                    .toLowerCase()
                    .normalize('NFD')
                    .replace(/[\u0300-\u036f]/g, '');
            }

            tarjetas.forEach(card => {
                const detalles = card.querySelectorAll('.mascota-detalle');
                let cardTipo = normalize(card.dataset.tipo);
                let cardRaza = normalize(card.dataset.raza);
                let cardSexo = normalize(card.dataset.sexo);
                let cardEdad = card.dataset.edad || '';
                let cardTamano = normalize(card.dataset.tamano);
                let cardEsterilizado = normalize(card.dataset.esterilizado);
                let cardUbicacion = normalize(card.dataset.ubicacion);

                if (!cardTipo || !cardRaza || !cardSexo) {
                    detalles.forEach(detalle => {
                        const label = normalize(detalle.querySelector('strong')?.textContent.replace(':',
                            '').trim());
                        const valor = normalize(detalle.textContent.replace(detalle.querySelector('strong')
                            ?.textContent,
                            '').trim());

                        if (label === 'tipo') cardTipo = valor;
                        if (label === 'raza') cardRaza = valor;
                        if (label === 'sexo') cardSexo = valor;
                        if (label === 'edad') cardEdad = valor;
                        if (label === 'tamano') cardTamano = valor;
                        if (label === 'estado' || label === 'esterilizado') cardEsterilizado = valor;
                        if (label === 'ubicacion') cardUbicacion = valor;
                    });
                }

                let mostrar = true;

                // Filtro tipo
                if (tipo) {
                    if (tipo === 'otros') {
                        // Mostrar solo si NO es perro o gato
                        if (tiposPrincipales.includes(cardTipo)) mostrar = false;
                    } else {
                        // Mostrar solo si coincide exactamente
                        if (cardTipo !== tipo) mostrar = false;
                    }
                }

                // Filtro raza
                if (raza && raza !== '' && normalize(cardRaza).replace(/\s+/g, '-') !== raza) mostrar = false;

                // Filtro sexo
                if (sexo && sexo !== '' && normalize(cardSexo) !== normalize(sexo)) mostrar = false;

                // Filtro ubicacion
                if (ubicacion && ubicacion !== '' && normalize(cardUbicacion) !== normalize(ubicacion)) mostrar =
                    false;

                // Filtro tamaño
                if (tamano && tamano !== '' && normalize(cardTamano) !== normalize(tamano)) mostrar = false;

                // Filtro edad
                if (edad && edad !== '') {
                    const edadNum = parseInt(card.dataset.edad || cardEdad, 10);
                    if (!Number.isNaN(edadNum)) {
                        if (edad === 'joven' && (edadNum < 1 || edadNum > 6)) mostrar = false;
                        if (edad === 'adulto' && (edadNum < 7 || edadNum > 12)) mostrar = false;
                        if (edad === 'viejo' && (edadNum < 13 || edadNum > 20)) mostrar = false;
                    } else {
                        mostrar = false;
                    }
                }

                // Filtro esterilizado
                if (esterilizado && esterilizado !== '' && normalize(cardEsterilizado) !== normalize(esterilizado))
                    mostrar = false;

                card.style.display = mostrar ? 'block' : 'none';
            });
        }




        // Event Listeners para los botones de tipo
        opcionesTipo.forEach(btn => {
            btn.addEventListener('click', () => {
                const tipo = btn.getAttribute('data-tipo');
                seleccionarTipo(tipo);
                procesarFiltros(); // Filtra automÃ¡ticamente al seleccionar tipo
            });
        });

        // Event listeners para los selects de filtros secundarios
        const selects = ['raza', 'ubicacion', 'tamano', 'edad', 'esterilizado', 'sexo'];
        selects.forEach(id => {
            const select = document.getElementById(id);
            select.addEventListener('change', procesarFiltros);
        });


        // Asignar eventos a los botones
        btnLimpiar.addEventListener('click', limpiarFiltros);
        btnProcesar.addEventListener('click', procesarFiltros);

        // Inicializar (opcional)
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Sistema de filtros cargado correctamente');
            console.log('â€¢ BotÃ³n "Limpiar Filtros" - FUNCIONAL');
            console.log('â€¢ BotÃ³n "Procesar Filtros" - SIN FUNCIONALIDAD (como solicitado)');
        });
    </script>


    <script>
        const modal = document.getElementById('mascotaModal');
        const closeBtn = modal.querySelector('.modal-close');
        const btnTelefono = document.getElementById('modalTelefono');
        const tooltipNumero = document.getElementById('tooltipNumero');

        document.querySelectorAll('.mascota-card').forEach(card => {
            card.addEventListener('click', () => {
                modal.classList.add('active');

                const numero = card.dataset.telefono || 'No disponible';

                document.getElementById('modalNombre').textContent = card.dataset.nombre;
                document.getElementById('modalEdad').textContent = card.dataset.edad + ' años';
                document.getElementById('modalTipo').textContent = card.dataset.tipo;
                document.getElementById('modalRaza').textContent = card.dataset.raza || 'Desconocida';
                document.getElementById('modalSexo').textContent = card.dataset.sexo;
                document.getElementById('modalUbicacion').textContent = card.dataset.ubicacion;
                document.getElementById('modalDescripcion').textContent = card.dataset.descripcion || '';
                document.getElementById('modalFoto').src = card.dataset.foto;

                // Guardar nÃºmero en el tooltip
                if (tooltipNumero) {
                    tooltipNumero.textContent = numero;
                    tooltipNumero.dataset.numero = numero;
                }

                // Asignar href para llamadas directas
                if (btnTelefono) btnTelefono.href = `tel:${numero}`;

                // Actualizar action del formulario de adopciÃ³n
                // Actualizar action del formulario de adopciÃ³n
                const formAdopcion = document.getElementById('formAdopcion');
                if (formAdopcion) {
                    // Usamos la URL base generada por Laravel para evitar problemas de prefijos
                    const baseUrl = "{{ url('/') }}";
                    formAdopcion.action = `${baseUrl}/mascotas/${card.dataset.id}/adoptar`;
                }
            });
        });

        // Copiar nÃºmero al hacer click en el tooltip
        if (tooltipNumero) {
            tooltipNumero.addEventListener('click', () => {
                const numero = tooltipNumero.dataset.numero;
                navigator.clipboard.writeText(numero).then(() => {
                    tooltipNumero.textContent = 'Â¡Copiado!';
                    setTimeout(() => {
                        tooltipNumero.textContent = numero;
                    }, 1500);
                });
            });
        }

        // Cerrar modal
        if (closeBtn) {
            closeBtn.addEventListener('click', () => {
                modal.classList.remove('active');
            });
        }
        if (modal) {
            modal.addEventListener('click', e => {
                if (e.target === modal) modal.classList.remove('active');
            });
        }
        document.getElementById('modalUbicacion').textContent = card.dataset.ubicacion;
    </script>

    <!-- Estilos para el botÃ³n de telÃ©fono y tooltip -->

    <style>
        .btn-telefono {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            background: #9b6b01;
            color: white;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-telefono:hover {
            background: #b07d1a;
        }

        .modal-contacto {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 20px;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        /* Tooltip tipo nube */

        .tooltip-numero {
            position: absolute;
            top: 50%;
            /* centra verticalmente respecto al botÃ³n */
            left: 100%;
            /* empieza justo a la derecha del botÃ³n */
            transform: translateY(-50%) translateX(8px);
            /* se mueve 8px mÃ¡s a la derecha */
            background: #333;
            color: #fff;
            padding: 6px 12px;
            border-radius: 12px;
            font-size: 14px;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.2s, transform 0.2s;
            z-index: 10;
        }

        .btn-telefono:hover .tooltip-numero {
            opacity: 1;
            pointer-events: auto;
            transform: translateY(-50%) translateX(8px);
            /* misma animaciÃ³n */
        }


        .tooltip-numero.copiable {
            cursor: pointer;
        }

        /* Contenedor de las cards */
        .mascotas-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 16px;
            justify-content: center;
            /* centra las cards si hay espacio extra */

            padding: 0 5px;
            /* <-- agrega espacio a izquierda y derecha */
            margin: 0 auto;
            /* <-- opcional, para centrar todo el contenedor */
            max-width: 1350px;
            /* <-- opcional, limita ancho mÃ¡ximo en pantallas grandes */
        }


        /* Cards individuales */
        .mascota-card {
            width: 100%;
            /* Para que ocupe su columna */
            max-width: 260px;
            /* Limitar ancho mÃ¡ximo */
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .mascota-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }

        .mascota-foto {
            width: 100%;
            height: 180px;
            /* Ajusta altura segÃºn prefieras */
            object-fit: cover;
        }

        .modal-textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
            resize: vertical;
            min-height: 60px;
        }

        .btn-adoptar {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-adoptar:hover {
            background: #218838;
        }
    </style>
</body>

</html>
