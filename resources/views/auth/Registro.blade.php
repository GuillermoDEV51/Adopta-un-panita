<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro - PanitasPet | Adopción y Refugios de Mascotas</title>
  <meta name="description" content="Regístrate en PanitasPet para adoptar mascotas y conectar con refugios. Plataforma confiable para encontrar tu compañero perfecto y apoyar refugios locales.">
  <meta name="keywords" content="adopción mascotas, refugios animales, registro usuarios, PanitasPet, adoptar perros, adoptar gatos">
  
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="Registro - PanitasPet | Adopción y Refugios de Mascotas">
  <meta property="og:description" content="Regístrate en PanitasPet para adoptar mascotas y conectar con refugios. Plataforma confiable para encontrar tu compañero perfecto.">
  
  <!-- Fonts: Poppins para UI, Pacifico para los títulos/script -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&family=Pacifico&display=swap" rel="stylesheet">
  
@vite ('resources/css/styles.css')
  
  <!-- Iconos (Font Awesome para los iconos del menú) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <div class="main-container3">

  <script type="module" async src="https://static.rocket.new/rocket-web.js?_cfg=https%3A%2F%2Fpetadopti4327back.builtwithrocket.new&_be=https%3A%2F%2Fapplication.rocket.new&_v=0.1.10"></script>
  <script type="module" defer src="https://static.rocket.new/rocket-shot.js?v=0.0.1"></script>
  </head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<body>
  <div class="main-container3">
    <!-- Background Images -->
    <div class="background-images">
      <img src="images/img_pink_and_yellow2.png" alt="Decorative pet background" class="bg-image-1">
      <img src="images/img_pink_and_yellow_284x432.png" alt="Decorative pet background" class="bg-image-2">
      <img src="images/img_orange_and_brown.png" alt="Decorative pet background" class="bg-image-3">
    </div>
    
    <div class="content-wrapper3">
      
<!-- Header -->
      <header class="header">
        <div class="header-content">
          <h1 class="logo">
              <img src="images/logopanitapet.png" alt="PanitasPet" class="logo-img">
              <span class="brand-text">
                <span class="logo-text">PanitasPet</span>
                <span class="logo-subtitle">Adopción y refugios</span>
              </span>
            </a>
          </h1>
           <nav class="nav-section">
            <div class="nav-menu">
              <a href="{{ route('Inicio') }}" class="nav-item" role="menuitem">Inicio</a>
              <a href="{{ route('MascotasDisponibles') }}" class="nav-item" role="menuitem">Mascotas</a>
              <a href="{{ route('RefugiosDisponibles') }}" class="nav-item" role="menuitem">Refugios</a>
            </div>
            
  <!-- Authentication Links -->
        @if (Route:: has('login'))

          <div class="nav-auth">

                @auth
                <!-- Mostrar información del usuario autenticado -->
                <span>
                  @if(auth()->user()->id_rol == 1)
                      <span>eres admin</span>
                      @else
                      <span>eres normal</span>
                  @endif
                </span>


                <a href="{{ route('Dashboard') }}" class="login-btn">{{ auth()->user()->nombre }} {{ auth()->user()->apellido }}</a>
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

      <!-- Registration Form -->
      <main class="registration-container2">
        <div class="form-content2">
          <div class="form-header2">
            <h1 class="form-title2">Registrate ahora en simples pasos</h1>
            <p class="form-subtitle2">Completa todas las casillas</p>
          </div>
        <form class="form-fields" method="POST"  action="{{ route('register') }}">
          @csrf
            <div class="form-row">
              <div class="form-group2">
                <input type="text" class="form-input" name="nombre" placeholder="Nombre" required>
              </div>
              <div class="form-group2">
                <input type="text" class="form-input" name="apellido" placeholder="Apellido" required>
              </div>
            </div>
            
           {{-- FECHA DE NACIMIENTO --}}
                            <div class="form-group2">

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
                                    value="{{ old('fecha_nacimiento') }}">

                                @error('fecha_nacimiento')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
            
              <div class="form-group2">
                <input type="tel" name="telefono" class="form-input" 
                      placeholder="Número de teléfono" 
                      pattern="[0-9]*" 
                      inputmode="numeric"
                      oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                      maxlength="11"
                      required>
              </div>

            <div class="form-group2">
                <select class="form-input" name="ubicacion" required>
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
            
            <div class="form-group2">
              <input type="text" class="form-input" 
                     name="ci" 
                     placeholder="Cédula" 
                     pattern="[0-9]*"
                     inputmode="numeric"
                     oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                     maxlength="8"
                     required>
            </div>
            
            <div class="form-group2">
              <input type="password" name="password" class="form-input" placeholder="Contraseña" required>
            </div>
            
            <div class="form-group2">
              <input type="password" name="password_confirmation" class="form-input" placeholder="Confirmar contraseña" required>
            </div>
            
            <button type="submit" class="register-btn">Registrarse</button>
          </form>
          
        </div>
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

            <p class="description">Plataforma digital dedicada a la ayuda y adopción de mascotas en Venezuela. Conectamos animales que necesitan un hogar con adoptantes responsables para combatir el abandono y la sobrepoblación.</p>

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
  </main>
    @vite(['resources/js/menu.js'])
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