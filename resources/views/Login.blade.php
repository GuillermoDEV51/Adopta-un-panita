<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio de Sesión - PanitasPet | Adopción y Refugios de Mascotas</title>
  <meta name="description" content="Únete a PanitasPet y adopta una mascota que necesita un hogar. Conectamos refugios con familias amorosas para salvar vidas de perros y gatos en Venezuela.">
  <meta name="keywords" content="adopción mascotas, refugio animales, perros adopción, gatos adopción, PanitasPet, Venezuela, salvar vidas">
  
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="PanitasPet - Adopta una Mascota y Salva una Vida">
  <meta property="og:description" content="Únete a PanitasPet y adopta una mascota que necesita un hogar. Conectamos refugios con familias amorosas.">
 
  <!-- Fonts: Poppins para UI, Pacifico para los títulos/script -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&family=Pacifico&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
  
  <script type="module" async src="https://static.rocket.new/rocket-web.js?_cfg=https%3A%2F%2Fpanitaspe1252back.builtwithrocket.new&_be=https%3A%2F%2Fapplication.rocket.new&_v=0.1.10"></script>
  <script type="module" defer src="https://static.rocket.new/rocket-shot.js?v=0.0.1"></script>
  </head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<body>
  <main class="main-container">
    <!-- Background Images -->
    <div class="background-images">
      <img src="{{ asset('assets/images/img_pink_and_yellow_600x502.png') }}" alt="Decorative paw prints" class="bg-image-left">
      <img src="{{ asset('assets/images/img_pink_and_yellow_524x464.png') }}" alt="Decorative paw prints" class="bg-image-right">
    </div>
    
    <div class="content-wrapper">
      <!-- Header -->
      <header class="header">
        <div class="header-content">
          <h1 class="logo">
            <img src="{{ asset('assets/images/logopanitapet.png') }}" alt="PanitasPet" class="logo-img">
            <span class="brand-text">
              <span class="logo-text">PanitasPet</span>
              <span class="logo-subtitle">Adopción y refugios</span>
            </span>
          </h1>
           <nav class="nav-section">
            <div class="nav-menu">
              <a href="#" class="nav-item" role="menuitem">Inicio</a>
              <a href="#" class="nav-item" role="menuitem">Mascotas</a>
              <a href="#" class="nav-item" role="menuitem">Refugios</a>
            </div>
            <button class="login-btn">Iniciar Sesión</button>
            <div class="menu-lines" aria-hidden="true">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </nav>
        </div>
      </header>
      
      <!-- Main Content -->
      <section class="main-content">
        <!-- Hero Section -->
        <div class="hero-section">
          <h2 class="hero-title">Bienvenido a<br> Panitaspet</h2>
          <div class="cta-container">
            <div class="cta-background"></div>
            <p class="cta-text">Adopta un pana y salva una vida</p>
          </div>
        </div>
        
        <!-- Login Section -->
        <aside class="login-section">
          <div class="login-card">
            <div class="login-header">
              <div class="login-titles">
                <h3 class="login-title">¡Únete a nosotros!</h3>
                <p class="login-subtitle">Coloca tus datos aqui</p>
              </div>
            </div>
            
            <form class="login-form" action="{{ route('login.authenticate') }}" method="POST">
              <input type="text" class="form-input" placeholder="Usuario..." required>
              <input type="password" class="form-input password-input" placeholder="Contraseña..." required>
              
              <div class="form-actions">
                <a href="#" class="forgot-password">¿Olvidaste tu contraseña?</a>
                <button type="submit" class="submit-btn">Iniciar</button>
              </div>
            </form>
          </div>
          
          <div class="register-link">
            ¿Aún no tienes cuenta? 
            <a href="#" class="register-highlight">Registrate</a>
          </div>
        </aside>
      </section>
      
      <!-- Footer -->
      <footer class="footer">
        <div class="footer-content">
          <div class="footer-left">
            <div class="footer-logo-section">
              <img src="{{ asset('assets/images/logopanitapet.png') }}" alt="PanitasPet Logo" class="footer-logo">
            <span class="brand-text">
              <span class="footer-brand">PanitasPet</span>
              <span class="logo-subtitle">Adopción y refugios</span>
            </span>
            </div>

            <p class="description">Plataforma digital dedicada a la ayuda y adopción de mascotas en Venezuela. Conectamos animales que necesitan un hogar con adoptantes responsables para combatir el abandono y la sobrepoblación.</p>

            <div class="footer-badges">
              <div class="badge"><i class="fas fa-paw"></i> 500+ Adopciones</div>
              <div class="badge"><i class="fas fa-heart"></i> 30+ Refugios</div>
            </div>

            <div class="social-icons">
              <a href="#" class="social-btn" aria-label="Icono 1">
                <img src="{{ asset('assets/images/icono1.png') }}" alt="icono1" class="circle-icon">
              </a>
              <a href="#" class="social-btn" aria-label="Icono 2">
                <img src="{{ asset('assets/images/icono2.png') }}" alt="icono2" class="circle-icon">
              </a>
              <a href="#" class="social-btn" aria-label="Icono 3">
                <img src="{{ asset('assets/images/icono3.png') }}" alt="icono3" class="circle-icon">
              </a>
              <a href="#" class="social-btn" aria-label="Icono 4">
                <img src="{{ asset('assets/images/icono4.png') }}" alt="icono4" class="circle-icon">
              </a>
            </div>
          </div>

          <div class="footer-links">
            <h4 class="footer-column-title">Enlaces rápidos</h4>
            <ul class="footer-list">
              <a href="#">Mascotas en adopción</a>
              <a href="#">Refugios</a>
              <a href="#">Donaciones</a>
              <a href="#">Misión y visión</a>
              <a href="#">Acerca de</a>
            </ul>
          </div>

          <div class="footer-services">
            <h4 class="footer-column-title">Servicios</h4>
            <ul class="footer-list">
              <a href="#">Publicar mascota</a>
              <a href="#">Solicitar ayuda</a>
              <a href="#">Donar</a>
              <a href="#">Voluntarios</a>
              <a href="#">Registrarse</a>
            </ul>
          </div>

          <div class="footer-contact">
            <h4 class="footer-column-title">Contacto</h4>
            <div class="contact-info">
              <div class="contact-item">
                <img src="{{ asset('assets/images/img_mail.svg') }}" alt="Email" class="contact-icon">
                <div>
                  <div style="font-weight:700;color:#af7700">Email</div>
                  <div class="contact-text">panitapet@gmail.com</div>
                </div>
              </div>

              <div class="contact-item">
                <img src="{{ asset('assets/images/img_call_end.svg') }}" alt="Phone" class="contact-icon">
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