<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Misión y visión - PanitasPet | Adopción y Refugios de Mascotas</title>
  <meta name="description" content="Dashboard de PanitasPet para gestionar adopciones y refugios. Plataforma confiable para encontrar tu compañero perfecto y apoyar refugios locales.">
  <meta name="keywords" content="adopción mascotas, refugios animales, dashboard, PanitasPet, gestionar mascotas, voluntarios">
  
  <meta property="og:type" content="website">
  <meta property="og:title" content="Inicio - PanitasPet | Adopción y Refugios de Mascotas">
  <meta property="og:description" content="Dashboard de PanitasPet para gestionar adopciones y refugios. Plataforma confiable para encontrar tu compañero perfecto.">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&family=Pacifico&display=swap" rel="stylesheet">
  
@vite (['resources/css/styles.css'])
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
            </a>
          </h1>
           <nav class="nav-section">
            <div class="nav-menu">
              <a href="{{ url('Inicio') }}" class="nav-item" role="menuitem">Inicio</a>
              <a href="{{ url('MascotasDisponibles') }}" class="nav-item" role="menuitem">Mascotas</a>
              <a href="{{ url('RefugiosDisponibles') }}" class="nav-item" role="menuitem">Refugios</a>
            </div>
            <a href="{{ route('login') }}" class="login-btn">Iniciar Sección</a>
            <div class="menu-lines" aria-hidden="true">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </nav>
        </div>
      </header>

      <!-- Sección Misión y Visión (Vertical) -->
      <section class="mission-vision-section">
        <div class="mission-vision-container">
          <!-- Tarjeta de Misión -->
          <div class="mission-card">
            <div class="mission-header">
              <h2 class="mission-title">Misión</h2>
            </div>
            <div class="mission-content">
              <blockquote class="mission-text">
                "Brindar una plataforma tecnológica integral que conecte a mascotas en situación de vulnerabilidad con hogares responsables, facilitando la gestión de refugios verificados y ofreciendo a los propietarios particulares una alternativa ética de adopción directa para prevenir el abandono."
              </blockquote>
            </div>
          </div>
          
          <!-- Tarjeta de Visión -->
          <div class="vision-card">
            <div class="vision-header">
              <h2 class="vision-title">Visión</h2>
            </div>
            <div class="vision-content">
              <blockquote class="vision-text">
                "Convertirnos en la red de adopción y bienestar animal más confiable y eficiente a nivel nacional, transformando la cultura de tenencia responsable mediante la innovación digital, la transparencia en las donaciones y la erradicación del abandono en calle a través de la conexión comunitaria."
              </blockquote>
            </div>
          </div>
        </div>
      </section>

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
  </div>
</body>
</html>