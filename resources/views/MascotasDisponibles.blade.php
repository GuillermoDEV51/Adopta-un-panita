@extends('layouts.guest')
@section('main')

      <!-- Dashboard Main Content -->
        <div class="paginas-section4">
          <div class="titulo-wrapper4">
            <h1 class="paginas-title4">Mascotas disponibles</h1>
          </div>

          <!-- Sistema de Filtros Compacto -->
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
                  <button class="opcion-compacta" data-tipo="gato" data-seleccionado="false">
                    <i class="fas fa-cat"></i>
                    <span>Gato</span>
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
          <!-- Fin Sistema de Filtros Compacto -->
          
          <!--tarjetas de mascotas -->
          <div class="mascotas-grid">
          </div>
        </div>
      </main>
      
@endsection
  <script>
    // Datos de razas por tipo de mascota
    const razasPorTipo = {
      perro: [
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
        "Yorkshire Terrier",
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