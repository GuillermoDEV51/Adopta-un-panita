<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar un Panita</title>
    <link rel="stylesheet" href="{{ asset('assets/css/modal-publicar.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
     <!-- Fonts: Poppins para UI, Pacifico para los títulos/script -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&family=Pacifico&display=swap" rel="stylesheet">
</head>
<body>


    <!-- Modal para Publicar un Panita -->
    <div class="modal-overlay active" id="modalOverlay">
        <div class="modal-container">
            <button class="close-modal-btn" id="closeModalBtn">&times;</button>

            <div class="modal-content">
                <!-- Izquierda: formulario -->
                <div class="modal-left">
                    <header class="modal-header">
                        <p class="form-title3">Publicar un Panita</p>
                        <p class="form-subtitle3">Complete todas las casillas</p>
                    </header>

                    <form class="modal-form" id="publicarForm">
                        <div class="form-row">
                            <div class="form-group" style="flex:0 0 220px;">
                                <div class="photo-box" aria-hidden="true">
                                    <div class="photo-upload-area">
                                        <div class="photo-preview" id="photoPreview">
                                            <i class="fas fa-camera" style="font-size:34px;color:#af7700"></i>
                                            <p style="color:#af7700">Añadir foto</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div style="flex:1; display:flex; flex-direction:column; gap:14px;">
                                <div class="form-group">
                                    <label for="nombre" style="color:#af7700">Nombre</label>
                                    <input type="text" id="nombre" placeholder="Nombre del panita" required>
                                </div>

                                <div>
                                    <div class="form-group">
                                        <label for="especie" style="color:#af7700">Especie</label>
                                        <select id="especie" required>
                                            <option value="" disabled selected>Especie de la mascota</option>
                                            <option value="perro">Perro</option>
                                            <option value="gato">Gato</option>
                                        </select>
                                    </div>

                                    <div class="form-row" style="margin-top:8px;">
                                        <div class="form-group" style="flex:0 0 140px;">
                                            <label for="edad" style="color:#af7700">Edad</label>
                                            <input type="number" id="edad" min="0" max="30" placeholder="Años" required>
                                        </div>

                                        <div class="form-group" style="flex:0 0 140px;">
                                            <label for="lb" style="color:#af7700">LB</label>
                                            <input type="number" id="lb" min="0" max="100" placeholder="LB" required>                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="tamano" style="color:#af7700">Tamaño</label>
                                <select id="tamano" required>
                                    <option value="" disabled selected>Tamaño de la mascota</option>
                                    <option value="pequeno">Pequeño</option>
                                    <option value="mediano">Mediano</option>
                                    <option value="grande">Grande</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="sexo" style="color:#af7700">Sexo</label>
                                <select id="sexo">
                                    <option value="" disabled selected>Sexo de la mascota</option>
                                    <option value="macho">Macho</option>
                                    <option value="hembra">Hembra</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group full-width">
                                <label for="descripcion" style="color:#af7700">Descripción</label>
                                <textarea id="descripcion" rows="5" placeholder="Descripción de la mascota" required></textarea>
                                <div class="char-counter"><span id="charCount">0</span> / 500</div>
                            </div>
                        </div>

                        <div style="display:flex; justify-content:center; margin:36px 0 8px 0;">
                            <button type="submit" class="submit-bt">Siguiente</button>
                        </div>
                    </form>
                </div>

                <!-- Derecha: imagen fija -->
                <div class="modal-right">
                    <div class="right-image"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript simplificado en línea para que funcione inmediatamente
        
        // Elementos del DOM
        const modalOverlay = document.getElementById('modalOverlay');
        const closeModalBtn = document.getElementById('closeModalBtn');
        // botón cancelar no existe en esta versión; se usa el botón de cierre
        const descripcionTextarea = document.getElementById('descripcion');
        const charCount = document.getElementById('charCount');
        const unitButtons = document.querySelectorAll('.unit-btn');
        const changePhotoBtn = document.getElementById('changePhotoBtn');
        const photoPreview = document.getElementById('photoPreview');
        const publicarForm = document.getElementById('publicarForm');
        
        // Función para cerrar el modal
        function closeModal() {
            modalOverlay.classList.remove('active');
            document.body.style.overflow = 'auto';
        }
        
        // Configurar eventos
        closeModalBtn.addEventListener('click', closeModal);
        
        // Cerrar modal al hacer clic fuera del contenido
        modalOverlay.addEventListener('click', (e) => {
            if (e.target === modalOverlay) {
                closeModal();
            }
        });
        
        // Contador de caracteres para la descripción
        descripcionTextarea.addEventListener('input', () => {
            const currentLength = descripcionTextarea.value.length;
            charCount.textContent = currentLength;
            
            // Cambiar color si se acerca al límite
            if (currentLength > 450) {
                charCount.style.color = '#e74c3c';
            } else if (currentLength > 400) {
                charCount.style.color = '#f39c12';
            } else {
                charCount.style.color = '#7f8c8d';
            }
            
            // Limitar a 500 caracteres
            if (currentLength > 500) {
                descripcionTextarea.value = descripcionTextarea.value.substring(0, 500);
                charCount.textContent = 500;
            }
        });
        
        // Selector de unidad (años/meses)
        unitButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remover clase active de todos los botones
                unitButtons.forEach(btn => btn.classList.remove('active'));
                // Añadir clase active al botón clickeado
                button.classList.add('active');
                
                // Actualizar placeholder del input de edad
                const edadInput = document.getElementById('edad');
                if (button.dataset.unit === 'meses') {
                    edadInput.placeholder = '0-12';
                    edadInput.max = 12;
                } else {
                    edadInput.placeholder = '0';
                    edadInput.max = 30;
                }
            });
        });
        
        // Si más adelante agregas un selector de archivo activar aquí
        
        // Manejar envío del formulario
        publicarForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Validar formulario
            const nombre = document.getElementById('nombre').value;
            const especie = document.getElementById('especie').value;
            const edad = document.getElementById('edad').value;
            const tamano = document.getElementById('tamano').value;
            const sexo = document.getElementById('sexo').value;
            const descripcion = document.getElementById('descripcion').value;
            
            if (!nombre || !especie || !edad || !tamano || !sexo || !descripcion) {
                alert('Por favor, complete todos los campos requeridos.');
                return;
            }
            
            // Simular envío del formulario
            const submitBtn = publicarForm.querySelector('.submit-btn');
            const originalText = submitBtn.innerHTML;
            
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Procesando...';
            submitBtn.disabled = true;
            
            setTimeout(() => {
                alert('¡Panita publicado exitosamente! La información ha sido guardada.');
                closeModal();
                publicarForm.reset();
                charCount.textContent = '0';
                
                // Restaurar botón
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 1500);
        });
        
        // Inicializar contador de caracteres
        charCount.textContent = descripcionTextarea.value.length;
        
        // Si quieres que el modal no sea visible al inicio, comenta la siguiente línea:
        // modalOverlay.classList.remove('active');
        
        // Y descomenta estas líneas para que el botón funcione:
        // const openModalBtn = document.getElementById('openModalBtn');
        // openModalBtn.addEventListener('click', () => {
        //     modalOverlay.classList.add('active');
        //     document.body.style.overflow = 'hidden';
        // });
    </script>
</body>
</html>