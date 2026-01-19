<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perros Refugio - PanitasPet | Adopción y Refugios de Mascotas</title>
  <meta name="description" content="Dashboard de PanitasPet para gestionar adopciones y refugios. Plataforma confiable para encontrar tu compañero perfecto y apoyar refugios locales.">
  <meta name="keywords" content="adopción mascotas, refugios animales, dashboard, PanitasPet, gestionar mascotas, voluntarios">
  
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="Inicio - PanitasPet | Adopción y Refugios de Mascotas">
  <meta property="og:description" content="Dashboard de PanitasPet para gestionar adopciones y refugios. Plataforma confiable para encontrar tu compañero perfecto.">
  
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
              <div class="menu-item">
                <i class="fas fa-plus-circle"></i>
                Añadir Mascotas
              </div>
            </div>
          </div>
          
          <div class="menu-section">
            <h2 class="menu-title">Mascotas</h2>
            <div class="menu-list">
              <div class="menu-item active">
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
      
            <div class="paginas-section">
              <div class="titulo-wrapper">
                <h1 class="paginas-title">Perros Registrados</h1>
                <div class="titulo-line" aria-hidden="true"></div>
              </div>
      
          <div class="filtros-compactos">
            <!-- Primera fila: Filtro principal y acciones -->
            <div class="filtros-superiores">
              <div class="filtro-principal-compacto">
                <div class="filtro-titulo">
                  <i class="fas fa-filter"></i>
                  <span>¿Deseas un perro o un gato?</span>
                </div>
                <div class="opciones-compactas">
                  <button class="opcion-compacta" data-tipo="perro" data-seleccionado="false">
                    <i class="fas fa-dog"></i>
                    <span>Perro</span>
                  </button>
                </div>
              </div>
              
              <div class="acciones-filtros">
                <!-- Botón Procesar Filtros (sin funcionalidad) -->
                <button class="btn-procesar-compacto" id="procesarFiltros">
                  <span>Procesar Filtros</span>
                </button>                
                <!-- Botón Limpiar Filtros (funcional) -->
                <button class="btn-limpiar-compacto" id="limpiarFiltros">
                  <i class="fas fa-times"></i>
                  <span>Limpiar Filtros</span>
                </button>
              </div>
            </div>
            
            <!-- Segunda fila: Filtros secundarios (se muestran al seleccionar tipo) -->
            <div class="filtros-secundarios-compactos" id="filtrosSecundarios">
              <div class="filtro-grupo-compacto">
                <label for="raza" class="filtro-label-compacto">
                </label>
                <select id="raza" class="select-compacto">         
                  <option value="">Raza</option>
                  <!-- Las opciones se llenarán dinámicamente -->
                </select>
              </div>
              
              <div class="filtro-grupo-compacto">
                <label for="ubicacion" class="filtro-label-compacto">
                </label>
                <select id="ubicacion" class="select-compacto">
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
              
              <div class="filtro-grupo-compacto">
                <label for="tamano" class="filtro-label-compacto">
                </label>
                <select id="tamano" class="select-compacto">
                  <option value="">Tamaño</option>
                  <option value="pequeno">Pequeño</option>
                  <option value="mediano">Mediano</option>
                  <option value="grande">Grande</option>
                </select>
              </div>
              
              <div class="filtro-grupo-compacto">
                <label for="edad" class="filtro-label-compacto">
                </label>
                <select id="edad" class="select-compacto">
                  <option value="">Edad</option>
                  <option value="joven">1-6 años</option>
                  <option value="adulto">7-12 años</option>
                  <option value="viejo">13-20 años</option>
                </select>
              </div>

              <div class="filtro-grupo-compacto">
                <label for="esterilizado" class="filtro-label-compacto">
                </label>
                <select id="esterilizado" class="select-compacto">
                  <option value="">Esterilizado</option>                 
                  <option value="si">Sí</option>
                  <option value="no">No</option>
                </select>
              </div>              
              
              <div class="filtro-grupo-compacto">
                <label for="sexo" class="filtro-label-compacto">
                </label>
                <select id="sexo" class="select-compacto">
                  <option value="">Sexo</option>
                  <option value="macho">Macho</option>
                  <option value="hembra">Hembra</option>
                </select>
              </div>
            </div>
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
    // Datos de razas por tipo de mascota
    const razasPorTipo = {
      perro: [
      "Schnauzer",  
      "Labrador Retriever",
        "Pastor Alemán",
        "Golden Retriever",
        "Bulldog Francés",
        "Beagle",
        "Poodle",
        "Chihuahua",
        "Boxer",
        "Dachshund",
        "Rottweiler",
        "Husky",
        "Bulldog Inglés",
        "Criollo/Mestizo",
        "Otro"
      ],
      gato: [
        "Siamés",
        "Persa",
        "Maine Coon",
        "Bengalí",
        "Esfinge",
        "Ragdoll",
        "British Shorthair",
        "Abisinio",
        "Birmano",
        "Scottish Fold",
        "Criollo/Mestizo",
        "Otro"
      ]
    };

    // Elementos del DOM
    const opcionesTipo = document.querySelectorAll('.opcion-compacta');
    const filtrosSecundarios = document.getElementById('filtrosSecundarios');
    const selectRaza = document.getElementById('raza');
    const btnLimpiar = document.getElementById('limpiarFiltros');
    const btnProcesar = document.getElementById('procesarFiltros');
    let tipoSeleccionado = null;

    // Función para actualizar las opciones de raza
    function actualizarRazas(tipo) {
      // Limpiar opciones actuales
      selectRaza.innerHTML = '<option value="">Raza</option>';
      
      // Agregar nuevas opciones según el tipo
      razasPorTipo[tipo].forEach(raza => {
        const option = document.createElement('option');
        option.value = raza.toLowerCase().replace(/\s+/g, '-');
        option.textContent = raza;
        selectRaza.appendChild(option);
      });
    }

    // Función para seleccionar un tipo de mascota
    function seleccionarTipo(tipo) {
      // Si ya está seleccionado, deseleccionar
      if (tipoSeleccionado === tipo) {
        const botonActual = document.querySelector(`[data-tipo="${tipo}"]`);
        botonActual.setAttribute('data-seleccionado', 'false');
        botonActual.classList.remove('seleccionado');
        tipoSeleccionado = null;
        
        // Ocultar filtros secundarios
        filtrosSecundarios.classList.remove('mostrar');
        filtrosSecundarios.style.maxHeight = '0';
        filtrosSecundarios.style.opacity = '0';
        filtrosSecundarios.style.marginTop = '0';
        return;
      }
      
      // Remover selección anterior
      opcionesTipo.forEach(btn => {
        btn.setAttribute('data-seleccionado', 'false');
        btn.classList.remove('seleccionado');
      });
      
      // Marcar como seleccionado
      const botonSeleccionado = document.querySelector(`[data-tipo="${tipo}"]`);
      botonSeleccionado.setAttribute('data-seleccionado', 'true');
      botonSeleccionado.classList.add('seleccionado');
      
      // Actualizar tipo seleccionado
      tipoSeleccionado = tipo;
      
      // Mostrar filtros secundarios
      filtrosSecundarios.classList.add('mostrar');
      filtrosSecundarios.style.maxHeight = filtrosSecundarios.scrollHeight + 'px';
      filtrosSecundarios.style.opacity = '1';
      filtrosSecundarios.style.marginTop = '1rem';
      
      // Actualizar opciones de raza
      actualizarRazas(tipo);
    }

    // Función para limpiar todos los filtros
    function limpiarFiltros() {
      console.log('Limpiando todos los filtros...');
      
      // 1. Remover selección de tipo (perro/gato)
      opcionesTipo.forEach(btn => {
        btn.setAttribute('data-seleccionado', 'false');
        btn.classList.remove('seleccionado');
      });
      
      // 2. Ocultar filtros secundarios
      filtrosSecundarios.classList.remove('mostrar');
      filtrosSecundarios.style.maxHeight = '0';
      filtrosSecundarios.style.opacity = '0';
      filtrosSecundarios.style.marginTop = '0';
      
      // 3. Limpiar selecciones de todos los filtros
      tipoSeleccionado = null;
      
      // Restablecer todos los selects a su valor por defecto
      document.getElementById('raza').selectedIndex = 0;
      document.getElementById('ubicacion').selectedIndex = 0;
      document.getElementById('tamano').selectedIndex = 0;
      document.getElementById('edad').selectedIndex = 0;
      document.getElementById('esterilizado').selectedIndex = 0;
      document.getElementById('sexo').selectedIndex = 0;
      
      // 4. Mostrar mensaje de confirmación
      console.log('✓ Filtros limpiados correctamente');
      console.log('✓ Mostrando todas las mascotas disponibles');
      
      // Aquí podrías añadir código para actualizar la lista de mascotas
      // Ejemplo: cargarTodasLasMascotas();
    }

    // Función para procesar filtros (sin funcionalidad como solicitaste)
    function procesarFiltros() {
      console.log('Botón "Procesar Filtros" clickeado');
      console.log('(Esta funcionalidad está pendiente de implementación)');
      
      // Aquí normalmente procesarías los filtros seleccionados
      // y actualizarías la lista de mascotas
    }

    // Event Listeners
    opcionesTipo.forEach(btn => {
      btn.addEventListener('click', () => {
        const tipo = btn.getAttribute('data-tipo');
        seleccionarTipo(tipo);
      });
    });

    // Asignar eventos a los botones
    btnLimpiar.addEventListener('click', limpiarFiltros);
    btnProcesar.addEventListener('click', procesarFiltros);

    // Inicializar (opcional)
    document.addEventListener('DOMContentLoaded', function() {
      console.log('Sistema de filtros cargado correctamente');
      console.log('• Botón "Limpiar Filtros" - FUNCIONAL');
      console.log('• Botón "Procesar Filtros" - SIN FUNCIONALIDAD (como solicitado)');
    });
  </script>