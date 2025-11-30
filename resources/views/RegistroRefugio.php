<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Refugios - PanitasPet | Adopción y Refugios de Mascotas</title>
  <meta name="description" content="Registra tu refugio en PanitasPet para conectar con familias que buscan adoptar mascotas. Plataforma confiable para refugios de animales.">
  <meta name="keywords" content="refugio animales, registro refugios, PanitasPet, adoptar perros, adoptar gatos, refugios Venezuela">
  
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="Registro de Refugios - PanitasPet | Adopción y Refugios de Mascotas">
  <meta property="og:description" content="Registra tu refugio en PanitasPet para conectar con familias que buscan adoptar mascotas.">
  
  <!-- Fonts: Poppins para UI, Pacifico para los títulos/script -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&family=Pacifico&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="../assets/css/RegistroRefugios.css">
</head>
<body>
  <div class="main-container">
    <!-- Background Images -->
    <div class="background-images">
      <img src="../assets/images/img_pink_and_yellow_696x1064.png" alt="Decorative paw prints" class="bg-image-left">
      <img src="../assets/images/img_pink_and_yellow.png" alt="Decorative paw prints" class="bg-image-right">
    </div>
    
    <div class="content-wrapper">
      <!-- Header -->
      <header class="header">
        <div class="header-content">
          <h1 class="logo">
            <img src="../assets/images/logopanitapet.png" alt="PanitasPet" class="logo-img">
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
            <button class="hamburger">☰</button>
            <button class="login-btn">Iniciar Sección</button>
          </nav>
        </div>
      </header>
      
      <!-- Main Content - Registro de Refugios -->
      <main class="main-content">
        <div class="registration-container">
          <div class="form-header">
            <h1 class="form-title">Registra un refugio en PanitasPet</h1>
            <p class="form-subtitle">Completa todos los cuadros</p>
          </div>
          
          <form class="form-content">
            <!-- Sección de foto -->
            <div class="photo-section">
              <div class="photo-placeholder">
                <div class="photo-icon">+</div>
                <div class="add-photo-text">Añadir foto de portada del refugio</div>
              </div>
            </div>
            
            <!-- Campos del formulario -->
            <div class="form-grid">
              <div class="form-group full-width">
                <input type="text" class="form-input" placeholder="Nombre del refugio" required>
              </div>

              <div class="form-group full-width">
                <textarea class="form-input" placeholder="Descripción del refugio" required></textarea>
              </div>
              
              <div class="form-group">
                <input type="tel" class="form-input" placeholder="Número de teléfono" required>
              </div>
              
              <div class="form-group">
                <input type="text" class="form-input" placeholder="Ubicación" required>
              </div>
              
              <div class="form-group">
                <input type="text" class="form-input" placeholder="Responsable" required>
              </div>
              
              <div class="form-group">
                <input type="text" class="form-input" placeholder="ID del usuario" required>
              </div>
              
              <div class="form-group full-width">
                <input type="text" class="form-input" placeholder="Redes sociales (si hay)">
              </div>
              
              <div class="form-group full-width">
                <label class="form-label">Fecha de fundación</label>
                <div class="date-row">
                  <input type="text" class="form-input date-input" placeholder="Día">
                  <input type="text" class="form-input date-input" placeholder="Mes">
                  <input type="text" class="form-input date-input" placeholder="Año">
                </div>
              </div>
            </div>
            
            <div class="submit-section">
              <button type="submit" class="submit-btn">Añadir refugio</button>
            </div>
          </form>
        </div>
      </main>
      
      <!-- Footer -->
      <footer class="footer">
        <div class="footer-content">
          <div class="footer-left">
            <div class="footer-logo-section">
              <img src="../assets/images/logopanitapet.png" alt="PanitasPet Logo" class="footer-logo">
              <div class="footer-brand">PanitasPet</div>
            </div>
            
            <div class="social-icons">
              <img src="../assets/images/img_buttons_icon.svg" alt="Facebook" class="social-icon">
              <img src="../assets/images/img_icon_lime_900_01_20x20.svg" alt="Instagram" class="social-icon">
              <img src="../assets/images/img_icon.svg" alt="Twitter" class="social-icon">
              <img src="../assets/images/img_icon_lime_900_01.svg" alt="LinkedIn" class="social-icon">
            </div>
          </div>
          
          <div class="footer-right">
            <div class="contact-section">
              <h3 class="contact-title">Contacto</h3>
              <div class="contact-info">
                <div class="contact-item">
                  <img src="../assets/images/img_call_end.svg" alt="Phone" class="contact-icon">
                  <span class="contact-text">+584141234567</span>
                </div>
                <div class="contact-item">
                  <img src="../assets/images/img_call_end.svg" alt="Phone" class="contact-icon">
                  <span class="contact-text">+584241234567</span>
                </div>
                <div class="contact-item email-item">
                  <img src="../assets/images/img_mail.svg" alt="Email" class="email-icon">
                  <span class="contact-text">panitapet@gmail.com</span>
                </div>
              </div>
            </div>
            
            <div class="copyright">
              © 2025 PanitaPet. Todos los derechos reservados.
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
</body>
</html>