@extends('layouts.guest')
@section('main')


      <!-- Main Content -->
      <main class="content-container">
        <section class="title-section animate-on-scroll animate-up">
          <h1 class="dollar-title-pacifico">¡Formulario enviado con éxito!</h1>
        </section>

        <div class="divider-line hori animate-on-scroll"></div>

        <section class="decorative-section">
          <img src="{{ asset('images/img_pink_and_yellow_228x174.png') }}" class="decorative-image-left animate-on-scroll animate-left" alt="left">
          <div class="text-content1 animate-on-scroll">
            <p class="description-text">Muchas gracias por rellenar el formulario. Tu solicitud será enviada al refugio y revisada lo más pronto posible para asegurar que encontremos el mejor emparejamiento para el animal. El refugio te contactará para seguir con los siguientes pasos.</p>
          </div>
          <img src="{{ asset('images/img_8916d38417374fb.png') }}" class="decorative-image-right animate-on-scroll animate-right" alt="right">
        </section>

        <div class="divider-line hori animate-on-scroll"></div>

        <section>
          <div class="dollar-box animate-on-scroll animate-right">
            <div class="dollar-row">
                <img src="{{ asset('images/perroygato.png') }}" alt="dog" class="dollar-image1"> 
              <div class="dollar-content">
                <div class="title-row">                 
            <h1 class="dollar-title-pacifico">¿Quieres seguir apoyando a nuestros "Panitas" mientras esperas?</h1>
                </div>     
            <p class="description-text">Tu interés en adoptar ya tiene un impacto enorme. Si deseas ayudarnos a mejorar la calidad de vida de todos los animales que esperan un hogar, puedes hacer una pequeña donación.</p>
          </div>
        </section>

        <div class="divider-line hori1 animate-on-scroll"></div>

        <section>
         <div class="dollar-box animate-on-scroll animate-right">
            <div class="dollar-row">
              <div class="dollar-content">
                <div class="title-row">  
            <div class="description-text1">
            <p>Tu aporte contribuye a:<p>
            <p>Asegurar el bienestar animal y la esterilización.</p>  
            <p>Ahorrar tiempo y trabajo al personal del refugio.</p>
            <p>Mantener activa la visibilidad aumentada para todos los animales.</p>
              </div>
              <img src="{{ asset('images/perritoconmancha.png') }}" alt="dog" class="any-decor1"> 
          </div>
        </section>

        <div class="divider-line hori1 animate-on-scroll"></div>

        <!-- Donativos económicos -->
        <section>
          <div class="section-header4 animate-on-scroll animate-up">
            <h2>D O N A T I V O S</h2>
            <p>Gracias a tu ayuda, podemos seguir rescatando vidas</p>
          </div>

          <div class="center-row">
            <div class="bank-box animate-on-scroll">
              <div class="bank-left">
                <div class="box-title">
                  <div>Cuenta Bancaria para apoyar a los panitas rescatados</div>
                  <div class="divider-linea vertical"></div>          
                </div>
              </div>
              <div class="bank-divider"></div>
              <div class="bank-right">
                <div class="bank-number">0191 BNC</div>
                <div class="bank-number">0424-2319352</div>
                <div class="bank-number">C.I 30.456.487</div>
              </div>
            </div>
          </div>
        </section>

        <!-- DONACIÓN 1$ -->
        <section>
          <div class="dollar-box animate-on-scroll animate-left">
            <div class="dollar-row">
              <img src="{{ asset('images/img_ad5c900afefebd6.png') }}" alt="dog" class="dollar-image">
              <div class="dollar-content">
                <div class="title-row">
                  <h3 class="dollar-title">¡DONA UN 1$ PARA ELLOS!</h3>
                </div>
                <p class="dollar-text">Sabemos que no siempre se puede dar mucho ¿Y si te dijéramos que con solo 1$ puedes ayudar a cambiarle la vida a un panita rescatado? Escribe en concepto del pago móvil "Reto 1$" y compártenos tu nombre por redes sociales.</p>
              </div>
              <img src="{{ asset('images/img_8916d38417374fb.png') }}" class="paw-inicial" alt="paw">
              <div class="divider-line vertical"></div>
            </div>
            <div class="divider-line horizontal"></div>
          </div>
        </section>

        <!-- DONA LO QUE PUEDAS -->
        <section>
          <div class="dollar-box animate-on-scroll animate-right">
            <div class="dollar-row">
              <div class="divider-line vertical1"></div>
              <div class="dollar-content">
                <div class="title-row">                            
                  <h3 class="dollar-title">¡DONA LO QUE PUEDAS!</h3>
                </div>
                <p class="dollar-text">En PanitasPets creemos que toda ayuda, por pequeña que parezca, hace una gran diferencia. Tu donativo, del monto que tú elijas, se transforma en alimento, medicinas, vacunas, baños, camitas y limpieza.</p>
              </div>
              <img src="{{ asset('images/img_074b671d31be397.png') }}" alt="decor" class="any-decor">
            </div>
            <div class="divider-line horizontal1"></div>
          </div>
        </section>

        <!-- Mensaje final y tres perros -->
        <section>
          <div class="dollar-box animate-on-scroll animate-up">
            <div class="dollar-row">
              <div class="divider-line vertical2"></div>
              <div class="dollar-content">
                <div class="title-row">                            
                  <h3 class="dollar-title">¡TÚ ELIGES LA CANTIDAD , NOSOTROS TE AGRADECEMOS CON EL CORAZÓN!</h3>
                </div>
              </div>
            </div>
            <div class="divider-line horizontal2"></div>
            <div class="paw-final-container">
              <img src="{{ asset('images/img_8916d38417374fb_232x232.png') }}" class="paw-final" alt="paw">
            </div>
            <div class="three-dogs-container">
            </div>
          </div>
        </section>
      </main>

      <img src="{{ asset('images/img_three_curious_d.png') }}" alt="three dogs" class="three-dogs animate-on-scroll">


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
    .paw-inicial, .paw-final {
      transition: transform 0.5s ease;
    }
    
    .paw-inicial:hover, .paw-final:hover {
      transform: rotate(20deg) scale(1.1);
    }
    
    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }
    
    /* Animación para las imágenes decorativas */
    .decorative-image-left, .decorative-image-right {
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
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    /* Animación para el banco */
    .bank-box {
      transition: all 0.5s ease;
    }
    
    .bank-box:hover {
      transform: scale(1.02);
    }
  </style>
  <script>
    // Animaciones al hacer scroll
    document.addEventListener('DOMContentLoaded', function() {
      // Función para animar elementos al hacer scroll
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
      
      // Ejecutar al cargar la página
      animateOnScroll();
      
      // Ejecutar al hacer scroll
      window.addEventListener('scroll', animateOnScroll);
      
      // Animación para el botón de login
      const loginBtn = document.querySelector('.login-btn');
      if (loginBtn) {
        loginBtn.addEventListener('mouseenter', function() {
          this.style.transform = 'scale(1.05)';
          this.style.transition = 'transform 0.3s ease';
        });
        
        loginBtn.addEventListener('mouseleave', function() {
          this.style.transform = 'scale(1)';
        });
      }
      
      // Animación para los elementos del menú
      const navItems = document.querySelectorAll('.nav-item');
      navItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
          this.style.transform = 'translateY(-3px)';
          this.style.transition = 'transform 0.3s ease';
        });
        
        item.addEventListener('mouseleave', function() {
          this.style.transform = 'translateY(0)';
        });
      });
      
      // Efecto de aparición escalonada para las categorías
      const categories = document.querySelectorAll('.category-complete');
      categories.forEach((category, index) => {
        // Retraso escalonado para cada categoría
        setTimeout(() => {
          if (category.classList.contains('visible')) {
            category.style.transitionDelay = `${index * 0.1}s`;
          }
        }, 100);
      });
      
      // Animación para los números del banco
      const bankNumbers = document.querySelectorAll('.bank-number');
      bankNumbers.forEach((number, index) => {
        number.addEventListener('mouseenter', function() {
          this.style.transform = 'translateY(-5px)';
          this.style.transition = 'transform 0.3s ease';
        });
        
        number.addEventListener('mouseleave', function() {
          this.style.transform = 'translateY(0)';
        });
      });
    });
  </script>
@endsection