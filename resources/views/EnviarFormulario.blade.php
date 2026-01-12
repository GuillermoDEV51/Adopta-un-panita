<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario - PanitasPet | Adopción y Refugios de Mascotas</title>
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
@vite ('resources/css/styles.css')
  
  <!-- Iconos (Font Awesome para los iconos del menú) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <div class="main-container">

    <div class="background-images">
      <img src="images/img_pink_and_yellow2.png" alt="Decorative paw prints" class="bg-image-left5">
      <img src="images/img_pink_and_yellow_524x464.png" alt="Decorative paw prints" class="bg-image-right">
    </div>

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
            <a href="{{ route('login') }}" class="login-btn">Iniciar Sección</a>
            <div class="menu-lines" aria-hidden="true">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </nav>
        </div>
      </header>
    

    <section>
        <div class="main-content5">
          <h1 class="dollar-title-pacifico">Formulario de adopción</h1>
          <div class="registration-container5">
            <div class="form-heade5">
              <p class="description-text2">Los datos del formulario deberán ser<br>completados por la persona que será el<br>titular responsable del pana</p>
            </div>

              <div class="form-group5">
                <label class="form-label5">¿Por qué quieres adoptar?</label>
                <input type="text" class="form-input5" placeholder="Escriba su respuesta..." required>
              </div>            
            
<div class="form-group5">
    <label class="form-label5">Tipo de vivienda</label>
    <select class="form-input5" required>
        <option value="" disabled selected>Seleccione su respuesta...</option>
        <option value="casa">Casa</option>
        <option value="departamento">Apartamento</option>
        <option value="duplex">Cerro</option>
        <option value="otro">Otro</option>
    </select>
</div>
              
              <div class="form-group5">
                <label class="form-label5">En el caso de tener que dejar la vivienda. ¿Qué pasaría con el pana?</label>
                <input type="text" class="form-input5" placeholder="Escriba su respuesta..." required>
              </div>

              <div class="form-group5">
                <label class="form-label5">Si alguien de su familia desarrolla alguna alergia a la mascota. ¿Qué harías?</label>
                <input type="text" class="form-input5" placeholder="Escriba su respuesta..." required>
              </div>

              <div class="form-group5">
                <label class="form-label5">¿A qué zonas de la casa tendrá acceso el pana?</label>
                <input type="text" class="form-input5" placeholder="Escriba su respuesta..." required>
              </div>

              <div class="form-group5">
                <label class="form-label5">Tener una mascota es una responsabilidad muy grande que conlleva gastos, tiempo, etc.<br>¿Está realmente seguro que se encuentra preparado para ello?</label>
    <select class="form-input5" required>
        <option value="" disabled selected>Seleccione su respuesta...</option>
        <option value="activo">Si</option>
        <option value="normal">No</option>
    </select>
</div>

              <div class="form-group5">
                <label class="form-label5">¿Has tenido mascotas? ¿Qué ha pasado con ellos?</label>
                <input type="text" class="form-input5" placeholder="Escriba su respuesta..." required>
              </div>

              <div class="form-group5">
                <label class="form-label5">Si saliera de vacaciones y no le permitieran llevar a la mascota al hotel. ¿Qué haría?</label>
                <input type="text" class="form-input5" placeholder="Escriba su respuesta..." required>
              </div>

              <div class="form-group5">
                <label class="form-label5">En caso de que la mascota empezase a portarse mal en casa. ¿Qué harías?</label>
                <input type="text" class="form-input5" placeholder="Escriba su respuesta..." required>
              </div>

              <div class="form-group5">
                <label class="form-label5">¿Cuánto tiempo cree usted que dejaría a solas a la mascota?</label>
                <input type="text" class="form-input5" placeholder="Escriba su respuesta..." required>
              </div>

<div class="form-group5">
    <label class="form-label5">¿Qué tan activo eres en tu día a día?</label>
    <select class="form-input5" required>
        <option value="" disabled selected>Seleccione su respuesta...</option>
        <option value="activo">Activo</option>
        <option value="normal">Normal</option>
        <option value="inactivo">Inactivo</option>
    </select>
</div>

              <div class="form-group5">
                <label class="form-label5">¿Vives solo o acompañado? En caso de vivir con alguien ¿está esa persona de acuerdo en adoptar? </label>
                <input type="text" class="form-input5" placeholder="Escriba su respuesta..." required>
              </div>
                <button type="submit" class="submit-btn2">Enviar formulario</button>
            </section>
            </main>

      <img src="images/img_three_curious_d.png" alt="three dogs" class="three-dogs animate-on-scroll">            

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