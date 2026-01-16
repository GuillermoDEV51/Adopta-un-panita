<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio - PanitasPet | Adopción y Refugios de Mascotas</title>
  <meta name="description" content="Dashboard de PanitasPet para gestionar adopciones y refugios. Plataforma confiable para encontrar tu compañero perfecto y apoyar refugios locales.">
  <meta name="keywords" content="adopción mascotas, refugios animales, dashboard, PanitasPet, gestionar mascotas, voluntarios">
  
  <meta property="og:type" content="website">
  <meta property="og:title" content="Inicio - PanitasPet | Adopción y Refugios de Mascotas">
  <meta property="og:description" content="Dashboard de PanitasPet para gestionar adopciones y refugios. Plataforma confiable para encontrar tu compañero perfecto.">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&family=Pacifico&display=swap" rel="stylesheet">
  
@vite (['resources/css/inicio.css'])

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
      
      <section class="hero-section">
        <div class="hero-text">
            <h1>Cada panita necesita un hogar</h1>
            <p>En nuestra página web podrás adoptar, dar en adopción y si eres un refugio también podrás asociarte con nosotros.</p>
        </div>
        <div class="hero-image">
            <img src="images/adoptado.jpg" alt="Mujer abrazando a un perro adoptado">
        </div>
      </section>


      <!-- Sección de Mascotas Recientes -->
      <!-- Sección de Mascotas Recientes -->
      <section class="pets-section">
        <!-- Fondo con overlay -->
        <div class="pets-background">
          <img src="images/fondocurvado.png" alt="Fondo abstracto" class="background-image">
          <div class="background-overlay"></div>
        </div>
        
        <div class="pets-container">
          <div class="pets-header">
            <h2 class="pets-title">Nuestros Panitas más recientes para adoptar</h2>
            <p class="pets-subtitle">Dales la oportunidad que se merecen</p>
          </div>
          
          <div class="pets-grid" id="pets-grid">
            <div class="pets-placeholder">
            </div>
          </div>
          
          <div class="pets-footer">
            <a href="#" class="view-all-btn">Ver más panitas</a>
          </div>
        </div>
      </section>

      <!-- Sección de Nuestro Impacto -->
      <section class="impact-section">
        <div class="impact-container">
          <div class="impact-header">
            <h2 class="impact-title">Nuestro impacto</h2>
            <p class="impact-subtitle">Transformamos la vida de Todos nuestros Panitas</p>
          </div>
          
          <div class="impact-stats">
            <!-- Estadística 1: Panitas adoptados -->
            <div class="stat-card">
              <div class="stat-circle">
                <img src="images/patita.png" alt="Panitas adoptados" class="stat-icon">
              </div>
              <div class="stat-number"></div>
              <div class="stat-label">Panitas adoptados</div>
            </div>
            
            <!-- Estadística 2: Refugios asociados -->
            <div class="stat-card">
              <div class="stat-circle1">
                <img src="images/corazon.png" alt="Refugios asociados" class="stat-icon">
              </div>
              <div class="stat-number"></div>
              <div class="stat-label">Refugios asociados</div>
            </div>
            
            <!-- Estadística 3: Usuarios registrados -->
            <div class="stat-card">
              <div class="stat-circle">
                <img src="images/usuario.png" alt="Usuario" class="stat-icon">
              </div>
              <div class="stat-number"></div>
              <div class="stat-label">Usuarios registrados</div>
            </div>
            
            <!-- Estadística 4: Donaciones realizadas -->
            <div class="stat-card">
              <div class="stat-circle1">
                <img src="images/hueso.png" alt="Hueso" class="stat-icon">
              </div>
              <div class="stat-number"></div>
              <div class="stat-label">Donaciones realizadas</div>
            </div>
          </div>
        </div>
      </section>

<!-- Process Section -->
<section class="process-section">
  <div class="process-container">
    <div class="process-header">
      <div class="process-text-container">
        <h2 class="process-title">En busca de un nuevo panita para cambiar su vida</h2>
        <p class="process-subtitle">Adoptar es un gran paso. Hemos diseñado un proceso claro y positivo tanto para ti como para tu futura mascota.</p>
      </div>
    </div>
    
    <div class="process-steps">
      <article class="process-step">
        <div class="step-header step1">
          <div class="step-title-container">
            <i class="fas fa-search step-icon"></i>
            <h3 class="step-title">Explora y encuentra un panita</h3>
          </div>
        </div>
        <p class="step-description">Navega por los perfiles de nuestras mascotas. Usa los filtros para encontrar a tu panita ideal según su especie, tamaño, edad o ubicación.</p>
      </article>
      
      <article class="process-step">
        <div class="step-header step2">
          <div class="step-title-container">
            <i class="fas fa-file-alt step-icon"></i>
            <h3 class="step-title">Envía tu solicitud</h3>
          </div>
        </div>
        <p class="step-description">¿Encontraste a tu compañero? Completa el formulario online para nuestros refugios o envía un mensaje directo para los usuarios como tú para asegurar el bienestar animal</p>
      </article>
      
      <article class="process-step">
        <div class="step-header step3">
          <div class="step-title-container">
            <i class="fas fa-comments step-icon"></i>
            <h3 class="step-title">Revisión y contacto</h3>
          </div>
        </div>
        <p class="step-description">La organización revisará tu formulario cuidadosamente y te contactará con la decisión. También puedes conversar directamente con los dueños actuales y aclarar dudas sobre el carácter.</p>
      </article>
      
      <article class="process-step">
        <div class="step-header step4">
          <div class="step-title-container">
            <i class="fas fa-home step-icon"></i>
            <h3 class="step-title">Coordinación y nuevo hogar</h3>
          </div>
        </div>
        <p class="step-description">Una vez aprobada la solicitud o finalizada la charla, se coordinan los últimos detalles: posible encuentro físico, acuerdo final y bienvenida a tu nuevo panita.</p>
      </article>
    </div>
  </div>
</section>

      <section class="pets-section">
        <!-- Fondo con overlay -->
        <div class="pets-background">
          <img src="images/fondocurvado.png" alt="Fondo abstracto" class="background-image">
          <div class="background-overlay"></div>
        </div>
        
        <div class="pets-container">
          <div class="pets-header">
            <h2 class="pets-title">Nuestros refugios asociados</h2>
            <p class="pets-subtitle">Revisa cualquier refugio y adopta un panita, también puedes realizar una donación y apoyar</p>
          </div>
          
          <div class="pets-grid" id="pets-grid">
            <div class="pets-placeholder">
            </div>
          </div>
          
          <div class="pets-footer">
            <a href="#" class="view-all-btn">Ver más refugios</a>
          </div>
        </div>
      </section> 
      
      <!-- Sección En busca de un Hogar - Tres columnas -->
      <section class="home-section">
        <div class="home-container">
          <div class="home-three-columns">
            <!-- Columna 1: Texto -->
            <div class="home-text-box">
              <h2 class="home-title">En busca de un Hogar</h2>
              <p class="home-description">Hasta la fecha, cientos de "panas" han conseguido encontrar una familia gracias a la conexión directa en nuestra plataforma. Ya sea que un usuario deba entregar a su mascota por motivos de fuerza mayor o que un refugio busque espacio para un rescatado, nuestra misión es que ningún animal termine en la calle.</p>
            </div>
            
            <!-- Columna 2: Primera imagen -->
            <div class="home-image-box">
              <img src="images/gatogris.jpg" alt="Gatito blanco y gris con juguete de ratón verde" class="home-image">
              <div clas="image-label">
              </div>
            </div>
            
            <!-- Columna 3: Segunda imagen -->
            <div class="home-image-box">
              <img src="images/gatonaran.jpg" alt="Gato naranja con juguete en espiral" class="home-image">
              <div>
              </div>
            </div>
          </div>
        </div>
      </section>

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
  </div>
</body>
</html>

<script>

// CONTADORES ANIMADOS PARA LA SECCIÓN DE IMPACTO
document.addEventListener('DOMContentLoaded', function() {
  
  // Configurar los valores finales para cada contador
  const counterData = [
    { element: '.stat-card:nth-child(1) .stat-number', final: 300, suffix: '+' },
    { element: '.stat-card:nth-child(2) .stat-number', final: 10, suffix: '+' },
    { element: '.stat-card:nth-child(3) .stat-number', final: 500, suffix: '+' },
    { element: '.stat-card:nth-child(4) .stat-number', final: 440, suffix: '+' }
  ];
  
  // Función para animar un contador
  function animateCounter(element, finalValue, suffix) {
    let current = 0;
    const increment = finalValue / 50; // 50 pasos para la animación
    const duration = 2000; // 2 segundos
    const stepTime = duration / 50; // tiempo entre cada paso
    
    const timer = setInterval(() => {
      current += increment;
      if (current >= finalValue) {
        current = finalValue;
        clearInterval(timer);
      }
      element.textContent = Math.floor(current) + suffix;
    }, stepTime);
  }
  
  // Observar cuando la sección de impacto sea visible
  const impactSection = document.querySelector('.impact-section');
  
  if (impactSection) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          // Ejecutar los contadores cuando la sección sea visible
          counterData.forEach((counter, index) => {
            const element = document.querySelector(counter.element);
            if (element) {
              // Pequeño delay escalonado para cada contador
              setTimeout(() => {
                animateCounter(element, counter.final, counter.suffix);
              }, index * 300); // 300ms de delay entre cada contador
            }
          });
          
          // Dejar de observar después de ejecutar
          observer.unobserve(impactSection);
        }
      });
    }, { threshold: 0.5 }); // Se activa cuando el 50% de la sección es visible
  
    observer.observe(impactSection);
  }
  
  // Efecto hover adicional para las tarjetas de estadísticas
  const statCards = document.querySelectorAll('.stat-card');
  statCards.forEach(card => {
    card.addEventListener('mouseenter', function() {
      this.style.transform = 'translateY(-10px) scale(1.05)';
      this.style.transition = 'transform 0.3s ease, box-shadow 0.3s ease';
    });
    
    card.addEventListener('mouseleave', function() {
      this.style.transform = 'translateY(0) scale(1)';
    });
  });
  
  // Efecto para los iconos de estadísticas
  const statIcons = document.querySelectorAll('.stat-icon');
  statIcons.forEach(icon => {
    icon.addEventListener('mouseenter', function() {
      this.style.transform = 'rotate(15deg) scale(1.2)';
      this.style.transition = 'transform 0.4s ease';
    });
    
    icon.addEventListener('mouseleave', function() {
      this.style.transform = 'rotate(0) scale(1)';
    });
  });
});

// Animaciones suaves para PanitasPet
document.addEventListener('DOMContentLoaded', function() {
  
  // ========== 1. ANIMACIÓN DE APARICIÓN AL SCROLL ==========
  function animateOnScroll() {
    const elements = document.querySelectorAll('.animate-on-scroll');
    
    elements.forEach(element => {
      const elementTop = element.getBoundingClientRect().top;
      const windowHeight = window.innerHeight;
      
      // Si el elemento está en el viewport
      if (elementTop < windowHeight - 100) {
        element.classList.add('visible');
      }
    });
  }
  
  // Añadir clase a elementos que queremos animar
  const elementsToAnimate = document.querySelectorAll(
    '.hero-section, .pets-header, .impact-header, .process-header, ' +
    '.stat-card, .process-step, .home-text-box, .home-image-box, ' +
    '.mission-card, .vision-card'
  );
  
  elementsToAnimate.forEach(element => {
    element.classList.add('animate-on-scroll');
  });
  
  // Ejecutar al cargar la página
  animateOnScroll();
  
  // Ejecutar al hacer scroll
  window.addEventListener('scroll', animateOnScroll);
  
  // ========== 2. ANIMACIÓN PARA BOTONES ==========
  const buttons = document.querySelectorAll('.view-all-btn, .login-btn');
  buttons.forEach(button => {
    button.addEventListener('mouseenter', function() {
      this.style.transform = 'scale(1.05)';
      this.style.transition = 'transform 0.3s ease';
    });
    
    button.addEventListener('mouseleave', function() {
      this.style.transform = 'scale(1)';
    });
    
    // Efecto al hacer clic
    button.addEventListener('mousedown', function() {
      this.style.transform = 'scale(0.95)';
    });
    
    button.addEventListener('mouseup', function() {
      this.style.transform = 'scale(1.05)';
    });
  });
  
  // ========== 3. ANIMACIÓN PARA TARJETAS ==========
  const cards = document.querySelectorAll('.process-step, .stat-card, .home-image-box, .mission-card, .vision-card');
  cards.forEach(card => {
    card.addEventListener('mouseenter', function() {
      this.style.transform = 'translateY(-10px)';
      this.style.transition = 'transform 0.3s ease, box-shadow 0.3s ease';
      this.style.boxShadow = '0 15px 35px rgba(0, 0, 0, 0.1)';
    });
    
    card.addEventListener('mouseleave', function() {
      this.style.transform = 'translateY(0)';
      this.style.boxShadow = '0 10px 30px rgba(0, 0, 0, 0.08)';
    });
  });

  
  
  // ========== 4. ANIMACIÓN PARA ICONOS ==========
  const icons = document.querySelectorAll('.step-icon, .stat-icon');
  icons.forEach(icon => {
    icon.addEventListener('mouseenter', function() {
      this.style.transform = 'rotate(10deg) scale(1.1)';
      this.style.transition = 'transform 0.3s ease';
    });
    
    icon.addEventListener('mouseleave', function() {
      this.style.transform = 'rotate(0) scale(1)';
    });
  });
  
  // ========== 5. ANIMACIÓN PARA IMÁGENES ==========
  const images = document.querySelectorAll('.hero-image img, .home-image, .footer-logo');
  images.forEach(img => {
    img.addEventListener('mouseenter', function() {
      this.style.transform = 'scale(1.05)';
      this.style.transition = 'transform 0.5s ease';
    });
    
    img.addEventListener('mouseleave', function() {
      this.style.transform = 'scale(1)';
    });
  });
  
  // ========== 6. ANIMACIÓN ESCALONADA PARA SECCIONES ==========
  const sections = document.querySelectorAll('.pets-section, .impact-section, .process-section, .home-section, .mission-vision-section');
  sections.forEach((section, index) => {
    // Añadir retraso escalonado para animación
    section.style.transitionDelay = `${index * 0.1}s`;
  });
  
  // ========== 7. ANIMACIÓN SUAVE DE SCROLL PARA ENLACES INTERNOS ==========
  const internalLinks = document.querySelectorAll('a[href^="#"]');
  internalLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      const href = this.getAttribute('href');
      if (href !== '#' && href.startsWith('#')) {
        e.preventDefault();
        const targetElement = document.querySelector(href);
        if (targetElement) {
          window.scrollTo({
            top: targetElement.offsetTop - 100,
            behavior: 'smooth'
          });
        }
      }
    });
  });
  
  // ========== 8. EFECTO DE CARGA INICIAL ==========
  setTimeout(() => {
    document.body.style.opacity = '1';
    document.body.style.transition = 'opacity 0.5s ease';
  }, 100);
  
  // ========== 9. ANIMACIÓN PARA EL HERO SECTION ==========
  const heroTitle = document.querySelector('.hero-text h1');
  const heroParagraph = document.querySelector('.hero-text p');
  const heroImage = document.querySelector('.hero-image img');
  
  if (heroTitle) {
    setTimeout(() => {
      heroTitle.style.opacity = '1';
      heroTitle.style.transform = 'translateY(0)';
      heroTitle.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
    }, 300);
  }
  
  if (heroParagraph) {
    setTimeout(() => {
      heroParagraph.style.opacity = '1';
      heroParagraph.style.transform = 'translateY(0)';
      heroParagraph.style.transition = 'opacity 1s ease 0.2s, transform 1s ease 0.2s';
    }, 500);
  }
  
  if (heroImage) {
    setTimeout(() => {
      heroImage.style.opacity = '1';
      heroImage.style.transform = 'scale(1)';
      heroImage.style.transition = 'opacity 1s ease 0.4s, transform 1s ease 0.4s';
    }, 700);
  }
  
  console.log('Animaciones PanitasPet activadas 🐾');
});

// ========== CSS DINÁMICO PARA ANIMACIONES ==========
const style = document.createElement('style');
style.textContent = `
  /* Estado inicial para elementos animados */
  .animate-on-scroll {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.8s ease, transform 0.8s ease;
  }
  
  .animate-on-scroll.visible {
    opacity: 1;
    transform: translateY(0);
  }
  
  /* Estado inicial para hero section */
  .hero-text h1 {
    opacity: 0;
    transform: translateY(20px);
  }
  
  .hero-text p {
    opacity: 0;
    transform: translateY(20px);
  }
  
  .hero-image img {
    opacity: 0;
    transform: scale(0.95);
  }
  
  /* Transiciones base */
  .process-step, .stat-card, .home-image-box, .mission-card, .vision-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  
  .step-icon, .stat-icon {
    transition: transform 0.3s ease;
  }
  
  .view-all-btn, .login-btn {
    transition: transform 0.3s ease;
  }
  
  .hero-image img, .home-image, .footer-logo {
    transition: transform 0.5s ease;
  }
  
  /* Estado inicial del body */
  body {
    opacity: 0;
  }
`;
document.head.appendChild(style);
</script>