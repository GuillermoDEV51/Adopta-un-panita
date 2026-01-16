<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Añadir Mascota - PanitasPet | Adopción y Refugios de Mascotas</title>
  <meta name="description" content="Añade nuevas mascotas en PanitasPet. Plataforma confiable para gestionar mascotas y conectar con adoptantes.">
  <meta name="keywords" content="añadir mascota, mascotas, PanitasPet, gestión mascotas">
  
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="Añadir Mascota - PanitasPet | Adopción y Refugios de Mascotas">
  <meta property="og:description" content="Añade nuevas mascotas en PanitasPet para gestionar animales y conectar con adoptantes.">
  
  <!-- Fonts: Poppins para UI, Pacifico para los títulos/script -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&family=Pacifico&display=swap" rel="stylesheet">

@vite (['resources/css/refugio.css'])
  
  <!-- Iconos (Font Awesome para los iconos del menú) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
      
     <!-- Dashboard Main Content -->
      <main class="dashboard-container">
        <!-- Sidebar Menu -->
        <aside class="sidebar">
          <div class="menu-section">
            <h2 class="menu-title">Menú</h2>
            <div class="menu-list">
              <div class="menu-item">
                <i class="fas fa-tachometer-alt"></i>
                Inicio
              </div>
              <div class="menu-item">
                <i class="fas fa-clipboard-list"></i>
                Solicitudes
              </div>
              <div class="menu-item active">
                <i class="fas fa-plus-circle"></i>
                Añadir Mascotas
              </div>
            </div>
          </div>
          
          <div class="menu-section">
            <h2 class="menu-title">Mascotas</h2>
            <div class="menu-list">
              <div class="menu-item">
                <i class="fas fa-dog"></i>
                Perros
              </div>
              <div class="menu-item">
                <i class="fas fa-cat"></i>
                Gatos
              </div>
              <div class="menu-item">
                <i class="fas fa-sign-out-alt"></i>
                Cerrar sesión
              </div>
            </div>
          </div>
        </aside>
        <!-- Main Content Area - Formulario de Registro de Refugios -->
         
        <div class="main-content1">
          <div class="registration-container">
            <div class="form-header">
              <h1 class="content-title">Añadir Nueva Mascota</h1>
              <p class="form-subtitle">Completa todos los campos para añadir una nueva mascota al refugio</p>
            </div>

            <div class="photo-section">
              <div class="photo-placeholder">
                <div class="photo-icon">+</div>
                <div class="add-photo-text">Añadir foto de la mascota</div>
              </div>
            </div>
            
            <form class="form-fields" id="petRegistrationForm">
              <div class="form-row">
                <div class="form-group">
                  <label class="form-label">Nombre *</label>
                  <input type="text" class="form-input" placeholder="Nombre del panita" required>
                </div>
                <div class="form-group">
                  <label class="form-label">Especie *</label>
                  <select class="form-select" required>
                    <option value="" disabled selected>Especie de la mascota</option>
                    <option value="perro">Perro</option>
                    <option value="gato">Gato</option>
                  </select>
                </div>
              </div>
              
              <div class="form-row">
                <div class="form-group">
                  <label class="form-label">Edad *</label>
                  <input type="number" class="form-input" min="0" max="30" placeholder="Años" required>
                </div>
                <div class="form-group">
                  <label class="form-label">LB *</label>
                  <input type="number" class="form-input" min="0" max="100" placeholder="LB" required>
                </div>
              </div>
              
              <div class="form-row">
                <div class="form-group">
                  <label class="form-label">Tamaño *</label>
                  <select class="form-select" required>
                    <option value="" disabled selected>Tamaño de la mascota</option>
                    <option value="pequeno">Pequeño</option>
                    <option value="mediano">Mediano</option>
                    <option value="grande">Grande</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="form-label">Sexo *</label>
                  <select class="form-select" required>
                    <option value="" disabled selected>Sexo de la mascota</option>
                    <option value="macho">Macho</option>
                    <option value="hembra">Hembra</option>
                  </select>
                </div>
              </div>
              
              <div class="form-group">
                <label class="form-label">Descripción *</label>
                <textarea class="form-input" rows="5" placeholder="Descripción de la mascota" required></textarea>
                <div class="form-hint">Máximo 500 caracteres</div>
              </div>
              
              <div class="form-group">
                <label class="form-label">Historial médico</label>
                <input type="file" class="form-input" name="historialFiles" multiple accept=".pdf,.jpg,.jpeg,.png,.doc,.docx">
              </div>
              
              <div class="form-group">
                <label class="form-label">Raza</label>
                <input type="text" class="form-input" placeholder="Raza de la mascota">
              </div>
              
              <div class="form-row">
                <div class="form-group">
                  <label class="form-label">¿Se lleva bien con otros animales? *</label>
                  <select class="form-select" required>
                    <option value="" disabled selected>Si/No</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="form-label">¿Se lleva bien con personas? *</label>
                  <select class="form-select" required>
                    <option value="" disabled selected>Si/No</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                  </select>
                </div>
              </div>
              
              <div class="form-group">
                <label class="form-label">Ubicación del responsable *</label>
                <select class="form-select" required>
                  <option value="" disabled selected>Coloque la ubicación del responsable</option>
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
              
              <div class="form-row">
                <div class="form-group">
                  <label class="form-label">¿Está vacunado el panita? *</label>
                  <select class="form-select" required>
                    <option value="" disabled selected>Si/No</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="form-label">¿Está esterilizado el panita? *</label>
                  <select class="form-select" required>
                    <option value="" disabled selected>Si/No</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                  </select>
                </div>
              </div>
              
              <button type="submit" class="register-btn">Añadir mascota</button>
            </form>
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