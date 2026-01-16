<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Refugios - PanitasPet | Adopción y Refugios de Mascotas</title>
  <meta name="description" content="Registra nuevos refugios en PanitasPet. Plataforma confiable para gestionar refugios de animales y conectar con adoptantes.">
  <meta name="keywords" content="registro refugios, refugios animales, añadir refugio, PanitasPet, gestión refugios">
  
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="Registro de Refugios - PanitasPet | Adopción y Refugios de Mascotas">
  <meta property="og:description" content="Registra nuevos refugios en PanitasPet para gestionar animales y conectar con adoptantes.">
  
  <!-- Fonts: Poppins para UI, Pacifico para los títulos/script -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&family=Pacifico&display=swap" rel="stylesheet">
@vite (['resources/css/stylessadmin.css'])
  
  <!-- Iconos (Font Awesome para los iconos del menú) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    /* Forzar que el footer se quede al fondo de la página */
    html, body { height: 100%; }
    .main-container { min-height: 100vh; display: flex; flex-direction: column; }
    .content-wrapper { display: flex; flex-direction: column; flex: 1 0 auto; }
    footer.footer { margin-top: auto; position: relative; }
  </style>
</head>
<body>
  <div class="main-container">
    <div class="content-wrapper">

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
              <a href="{{ url('Inicio') }}" class="nav-item" role="menuitem">Inicio</a>
              <a href="{{ url('MascotasDisponibles') }}" class="nav-item" role="menuitem">Mascotas</a>
              <a href="{{ url('RefugiosDisponibles') }}" class="nav-item" role="menuitem">Refugios</a>
            </div>
            <a href="{{ route('login') }}" class="login-btn">Iniciar Sesión</a>
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
                <a href="{{ route('Dashboard') }}" style="color:inherit; text-decoration:none;">Dashboards</a>
              </div>
              <div class="menu-item">
                <i class="fas fa-clipboard-list"></i>
                <a href="{{ route('SolicitudesAdmin') }}" style="color:inherit; text-decoration:none;">Solicitudes</a>
              </div>
              <div class="menu-item active">
                <i class="fas fa-plus-circle"></i>
                <a href="{{ route('AñadirRefugio') }}" style="color:inherit; text-decoration:none;">Añadir refugios</a>
              </div>
            </div>
          </div>
          
          <div class="menu-section">
            <h2 class="menu-title">Páginas</h2>
            <div class="menu-list">
              <div class="menu-item">
                <i class="fas fa-home"></i>
                <a href="{{ route('RefugiosAdmin') }}" style="color:inherit; text-decoration:none;">Refugios</a>
              </div>
              <div class="menu-item">
                <i class="fas fa-users"></i>
                <a href="{{ route('UsuariosAdmin') }}" style="color:inherit; text-decoration:none;">Usuarios</a>
              </div>
              <div class="menu-item">
                <i class="fas fa-hands-helping"></i>
                Voluntarios
              </div>
            </div>
          </div>
          
          <div class="menu-section">
            <h2 class="menu-title">Mascotas</h2>
            <div class="menu-list">
              <div class="menu-item">
                <i class="fas fa-dog"></i>
                <a href="{{ route('PerrosAdmin') }}" style="color:inherit; text-decoration:none;">Perros</a>
              </div>
              <div class="menu-item">
                <i class="fas fa-cat"></i>
                <a href="{{ route('GatosAdmin') }}" style="color:inherit; text-decoration:none;">Gatos</a>
              </div>
              <div class="menu-item">
                <i class="fas fa-sign-out-alt"></i>
                <a href="{{ route('login') }}" style="color:inherit; text-decoration:none;">Cerrar sesión</a>
              </div>
            </div>
          </div>
        </aside>

        <!-- Main Content Area - Formulario de Registro de Refugios -->
         
        <div class="main-content1">
          <div class="registration-container">
            <div class="form-header">
              <h1 class="content-title">Registro de Nuevo Refugio</h1>
              <p class="form-subtitle">Completa todos los campos para registrar un nuevo refugio en PanitasPet</p>
            </div>

            <div class="photo-section">
              <div class="photo-placeholder">
                <div class="photo-icon">+</div>
                <div class="add-photo-text">Añadir foto de portada del refugio</div>
              </div>
            </div>
            
            <form class="form-fields" id="refugeRegistrationForm">
              <div class="form-row">
                <div class="form-group">
                  <label class="form-label">Nombre del Refugio *</label>
                  <input type="text" class="form-input" placeholder="Ej: Refugio Amor Animal" required>
                </div>
                <div class="form-group">
                  <label class="form-label">Responsable *</label>
                  <input type="text" class="form-input" placeholder="Nombre del responsable" required>
                </div>
              </div>
              
              <div class="form-row">
                <div class="form-group">
                  <label class="form-label">Teléfono de Contacto *</label>
                  <input type="tel" class="form-input" placeholder="Ej: +584141234567" required>
                </div>
                <div class="form-group">
                  <label class="form-label">Cédula de identidad *</label>
                  <input type="text" class="form-input" placeholder="Ej: V-30.000.000" required>
                </div>
              </div>
              
              <div class="form-group">
                <label class="form-label">Ubicación *</label>
                <input type="text" class="form-input" placeholder="Calle, número, ciudad, estado etc" required>
              </div>
              
              <div class="form-group">
                <label class="form-label">Redes sociales (si hay) *</label>
                <input type="text" class="form-input" placeholder="Ej: @refugio_amor_animal" required>
              </div>
                <div class="form-group">
                  <label class="form-label">Fecha de Fundación</label>
                  <div class="date-row" style="display:flex;gap:12px;align-items:center;">
                    <input type="number" name="foundation_day" class="form-input" placeholder="DD" min="1" max="31" style="width:84px;">
                    <input type="number" name="foundation_month" class="form-input" placeholder="MM" min="1" max="12" style="width:84px;">
                    <input type="number" name="foundation_year" class="form-input" placeholder="YYYY" min="1800" max="2100" style="width:120px;">
                  </div>
                </div>
              
              <div class="form-group">
                <label class="form-label">Descripción del Refugio</label>
                <textarea class="form-input" placeholder="Describe brevemente la misión, servicios y características del refugio..."></textarea>
                <div class="form-hint">Máximo 500 caracteres</div>
                <button type="submit" class="register-btn">Añadir refugio</button>
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
              <a href="Donativos">Donaciones</a>
              <a href="Mision">Misión y visión</a>
              <a href="AcercaDe">Acerca de</a>
            </ul>
          </div>

          <div class="footer-services">
            <h4 class="footer-column-title">Servicios</h4>
            <ul class="footer-list">
              <a href="PublicarMascota">Publicar mascota</a>
              <a href="SolicitarAyuda">Solicitar ayuda</a>
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
  </main>
</body>
</html>