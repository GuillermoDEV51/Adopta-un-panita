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
@vite (['resources/css/styles.css'])  
  <!-- Iconos (Font Awesome para los iconos del menú) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
</head>
<body>
  <div class="main-container">

    <div class="background-images">
      <img src="images/img_pink_and_yellow2.png" alt="Decorative paw prints" class="bg-image-left6">
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
          <h1 class="dollar-title-pacifico">¿Has decidido abandonar a tu pana?</h1>
          <div class="text-content4 animate-on-scroll">
            <p class="description-text4">Estás por entregar tu pana al refugio. Para que este proceso no sea aún más difícil para él, y podamos asistirlo y evitarle mayor sufrimiento, es indispensable que sea totalmente honesto en este formulario. El abandono es una situación traumática; conocer su comportamiento real, sus miedos y su salud  es la única forma que tenemos de protegerlo y prepararlo para lo que viene. No omita detalles sobre agresividad, enfermedades o miedos; ocultar información solo dificulta su adaptación y pone en riesgo su futuro. Sabiendo esto, complete todos los campos con la mayor sinceridad posible</p>
          </div>
          <div class="registration-container5">
            <div class="form-heade5">
            </div>

              <div class="form-group5">
                <label class="form-label5">Nombre del panita</label>
                <input type="text" class="form-input5" placeholder="Escriba su respuesta..." required>
              </div>            
            
<div class="form-group5">
    <label class="form-label5">¿Es un perro o gato?</label>
    <select class="form-input5" required>
        <option value="" disabled selected>Seleccione su respuesta...</option>
        <option value="gato">Gato</option>
        <option value="perro">Perro</option>
    </select>
</div>

              <div class="form-group5">
                <label class="form-label5">¿Mestizo?</label>
    <select class="form-input5" required>
        <option value="" disabled selected>Seleccione su respuesta...</option>
        <option value="activo">Si</option>
        <option value="normal">No</option>
    </select>
</div>
              
              <div class="form-group5">
                <label class="form-label5">¿Es pequeño o grande?</label>
    <select class="form-input5" required>
        <option value="" disabled selected>Seleccione su respuesta...</option>
        <option value="activo">Pequeño</option>
        <option value="normal">Grande</option>
    </select>
</div>

              <div class="form-group5">
                <label class="form-label5">¿Nivel de agresividad?</label>
    <select class="form-input5" required>
        <option value="" disabled selected>Seleccione su respuesta...</option>
        <option value="activo">Alto</option>
        <option value="normal">Nulo</option>
    </select>
</div>

              <div class="form-group5">
                <label class="form-label5">¿Ataca personas?</label>
    <select class="form-input5" required>
        <option value="" disabled selected>Seleccione su respuesta...</option>
        <option value="activo">Si</option>
        <option value="normal">No</option>
    </select>
</div>

              <div class="form-group5">
                <label class="form-label5">¿Rompe cosas en casa?</label>
    <select class="form-input5" required>
        <option value="" disabled selected>Seleccione su respuesta...</option>
        <option value="activo">Si</option>
        <option value="normal">No</option>
    </select>
</div>

              <div class="form-group5">
                <label class="form-label5">¿Se lleva bien con otros animales?</label>
    <select class="form-input5" required>
        <option value="" disabled selected>Seleccione su respuesta...</option>
        <option value="activo">Si</option>
        <option value="normal">No</option>
    </select>
</div>

              <div class="form-group5">
                <label class="form-label5">¿Cómo reacciona ante los desconocidos?</label>
    <select class="form-input5" required>
        <option value="" disabled selected>Seleccione su respuesta...</option>
        <option value="activo">Amigable</option>
        <option value="normal">Tímido</option>
        <option value="normal">Ladra pero no ataca</option>        
        <option value="inactivo">Agresivo</option>
    </select>
</div>

              <div class="form-group5">
                <label class="form-label5">¿Cuál es nivel de energía diario?</label>
    <select class="form-input5" required>
        <option value="" disabled selected>Seleccione su respuesta...</option>
        <option value="Hiperactivo">Hiperactivo</option>
        <option value="normal">Normal</option>
        <option value="normal">Muy tranquilo</option>        
    </select>
</div>

              <div class="form-group5">
                <label class="form-label5">¿Cómo se comporta al quedarse solo en casa?</label>
                <input type="text" class="form-input5" placeholder="Escriba su respuesta..." required>
              </div>

              <div class="form-group5">
                <label class="form-label5">¿Tiene algun miedo o fobia?, Si la tiene escriba cual</label>
                <input type="text" class="form-input5" placeholder="Escriba su respuesta..." required>
              </div>

              <div class="form-group5">
                <label class="form-label5">¿Sabe pasear con correa?</label>
    <select class="form-input5" required>
        <option value="" disabled selected>Seleccione su respuesta...</option>
        <option value="activo">Si</option>
        <option value="normal">No</option>
    </select>
</div>

              <div class="form-group5">
                <label class="form-label5">¿Cuándo fue su última desparasitación interta y externa?</label>
                <input type="text" class="form-input5" placeholder="Escriba su respuesta..." required>
              </div>

              <div class="form-group5">
                <label class="form-label5">¿Tiene algúna alergia alimentaria o necesita una dieta especial?, Escriba cual</label>
                <input type="text" class="form-input5" placeholder="Escriba su respuesta..." required>
              </div>

              <div class="form-group5">
                <label class="form-label5">¿Padece de alguna enfermedad crónica o lesión antigua que requiera seguimiento?<br> (Ej; Displasia, Problemas cardíacos, etc)</label>
                <input type="text" class="form-input5" placeholder="Escriba su respuesta..." required>
              </div>

              <div class="form-group5">
                <label class="form-label5">¿Cuánto tiempo cree usted que dejaría a solas a la mascota?</label>
                <input type="text" class="form-input5" placeholder="Escriba su respuesta..." required>
              </div>

              <div class="form-group5">
                <label class="form-label5">¿Está esterlizado?, En el caso de las hembras: ¿Cuándo fue su último celo?</label>
                <input type="text" class="form-input5" placeholder="Escriba su respuesta..." required>
              </div>

              <div class="form-group5">
                <label class="form-label5">¿Cuál es el motivo principal por el que no puedes seguir cuidándolo? <br>(Sé lo más honesto posible, esto no afectará la recepción animal, pero sí su futuro) </label>
                <input type="text" class="form-input5" placeholder="Escriba su respuesta..." required>
              </div>

              <div class="form-group5">
                <label class="form-label5">¿Ha tenido algún episodio de reactividad o mordida anteriormente?</label>
    <select class="form-input5" required>
        <option value="" disabled selected>Seleccione su respuesta...</option>
        <option value="activo">No, nunca</option>
        <option value="normal">Solo ha marcado sin llegar a morder</option>
        <option value="inactivo">Sí, ha mordido en una situación de mucho estrés o miedo</option>
        <option value="inactivo">Sí, ha mordido y causa lesiones</option>
    </select>
</div>

              <!-- Términos y condiciones -->
              <div class="terms-container">
                <p class="terms-text">
                  Para poder recibir a tu mascota, se requiere una compensación de $200. Al enviar éste formulario, se cede la custodia del animal al refugio, a su vez la solicitud quedará registrada y a la espera de aceptación o rechazo. Sin este pago, el proceso de abandono no podrá ser procesado.
                </p>
                
                <label class="terms-checkbox">
                  <input type="checkbox" id="termsCheckbox">
                  <span class="terms-label">He leído y acepto los términos y condiciones</span>
                </label>
              </div>

              <button type="submit" class="submit-btn2" id="submitBtn" disabled>Enviar formulario</button>
            </section>
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
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const termsCheckbox = document.getElementById('termsCheckbox');
      const submitBtn = document.getElementById('submitBtn');
      
      // Controlar el estado del botón según el checkbox
      termsCheckbox.addEventListener('change', function() {
        submitBtn.disabled = !this.checked;
      });
      
      // Validar formulario antes de enviar (opcional)
      submitBtn.addEventListener('click', function(e) {
        if (!termsCheckbox.checked) {
          e.preventDefault();
          alert('Debe aceptar los términos y condiciones para enviar el formulario.');
          return false;
        }
        
        // Aquí puedes agregar validación adicional del formulario si lo necesitas
        // y luego enviarlo
        alert('Formulario enviado correctamente.');
        // document.querySelector('form').submit(); // Descomentar si hay un formulario real
      });
    });
  </script>