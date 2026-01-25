{{-- resources/views/modals/publicar-modal.blade.php --}}

<div class="modal-wrapper">
    <div id="modalPublicar" class="modal-overlay">
        <div class="modal-container">
            <button id="closeModal" class="close-modal-btn">&times;</button>

            <div class="modal-content">
                <!-- Columna izquierda: formulario -->
                <div class="modal-left">
                    <header class="modal-header">
                        <p class="form-title3">Publicar un Panita</p>
                        <p class="form-subtitle3" id="stepIndicator">Paso 1 de 2</p>
                    </header>

                    <form id="publicarForm" enctype="multipart/form-data">
                        <!-- Paso 1 -->
                        <div id="step1" class="step-content">
                            <div class="form-grid">
                                <!-- Foto mascota (izquierda) -->
                                <div class="photo-column">
                                    <label style="color:#af7700">Foto de la mascota</label>
                                    <input type="file" id="fotoMascota" name="foto" accept="image/*" hidden>
                                    <label for="fotoMascota" class="photo-box">
                                        <span style="color:#af7700">📷 Añadir foto</span>
                                        <img id="previewFoto" alt="" />
                                    </label>
                                </div>

                                <!-- Campos (derecha) -->
                                <div class="fields-column">
                                    <!-- Fila 1: Nombre + Especie -->
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label style="color:#af7700">Nombre</label>
                                            <input type="text" id="nombre" name="nombre" required>
                                        </div>

                                        <div class="form-group">
                                            <label style="color:#af7700">Especie</label>
                                            <select id="especie" name="id_especie" required>
                                                <option value="">Seleccione</option>
                                                <option value="1">Perro</option>
                                                <option value="2">Gato</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Fila 2: Edad + Peso -->
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label style="color:#af7700">Edad</label>
                                            <input type="number" id="edad" min="0" name="edad" required>
                                        </div>

                                        <div class="form-group">
                                            <label style="color:#af7700">Peso (LB)</label>
                                            <input type="number" id="peso" name="peso" required>
                                        </div>
                                    </div>

                                    <!-- Fila 3: Tamaño + Sexo -->
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label style="color:#af7700">Tamaño</label>
                                            <select id="tamano" name="tamano">
                                                <option value="">Seleccione</option>
                                                <option value="Pequeño">Pequeño</option>
                                                <option value="Mediano">Mediano</option>
                                                <option value="Grande">Grande</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label style="color:#af7700">Sexo</label>
                                            <select id="sexo" name="genero" required>
                                                <option value="">Seleccione</option>
                                                <option value="Macho">Macho</option>
                                                <option value="Hembra">Hembra</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> <!-- fin fields-column -->
                            </div> <!-- fin form-grid -->

                            <!-- Descripción full-width debajo de todo el grid -->
                            <div class="description-full-width">
                                <label style="color:#af7700">Descripción</label>
                                <textarea id="descripcion" rows="6" maxlength="500" name="descripcion" required></textarea>
                            </div>

                            <!-- Botón siguiente -->
                            <div style="text-align:center;margin-top:24px;">
                                <button type="button" class="submit-bt1" id="goToStep2">Siguiente</button>
                            </div>
                        </div> <!-- fin step1 -->

                        <!-- Paso 2 -->
                        <div id="step2" class="step-content" style="display: none;">
                            <div class="form-group">
                                <label style="color:#af7700">Historial médico</label>
                                <input type="file" name="documentacion" multiple>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label style="color:#af7700">Raza</label>
                                    <select id="raza" name="raza">
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label style="color:#af7700">Convive con animales</label>
                                    <select id="convive_animales" name="convive_animales" required>
                                        <option value="">Seleccione</option>
                                        <option value="si">Sí</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label style="color:#af7700">Convive con personas</label>
                                    <select id="convive_personas" name="convive_personas" required>
                                        <option value="">Seleccione</option>
                                        <option value="si">Sí</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label style="color:#af7700">Ubicación</label>
                                    <select id="ubicacion" name="ubicacion" required>
                                        <option value="">Seleccione</option>
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
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label style="color:#af7700">Vacunado</label>
                                    <select id="vacunado" name="vacunado" required>
                                        <option value="">Seleccione</option>
                                        <option value="true">Sí</option>
                                        <option value="false">No</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label style="color:#af7700">Esterilizado</label>
                                    <select id="esterilizado" name="esterilizado" required>
                                        <option value="">Seleccione</option>
                                        <option value="true">Sí</option>
                                        <option value="false">No</option>
                                    </select>
                                </div>
                            </div>

                            <div style="display:flex;justify-content:center;gap:20px;margin-top:24px;">
                                <button type="button" class="submit-btn" id="backToStep1">Regresar</button>
                                <button type="submit" class="submit-bt">Publicar</button>
                            </div>
                        </div> <!-- fin step2 -->
                    </form>
                </div> <!-- fin modal-left -->

                <!-- Columna derecha: imagen -->
                <div class="modal-right">
                    <img id="modalImage" src="{{ asset('images/fotomodal1.png') }}" alt="Imagen derecha" class="right-image-img">
                </div>
            </div> <!-- fin modal-content -->
        </div> <!-- fin modal-container -->
    </div> <!-- fin modal-overlay -->
</div> <!-- fin modal-wrapper -->

<script>
document.addEventListener('DOMContentLoaded', () => {
    const step1 = document.getElementById('step1');
    const step2 = document.getElementById('step2');
    const stepIndicator = document.getElementById('stepIndicator');
    const modalImage = document.getElementById('modalImage');
    const goToStep2Btn = document.getElementById('goToStep2');
    const backToStep1Btn = document.getElementById('backToStep1');
    const especieSelect = document.getElementById('especie');
    const razaSelect = document.getElementById('raza');

    const razas = {
        1: [
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
        2: [
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

    function cargarRazas(especie) {
        razaSelect.innerHTML = '<option value="">Seleccione</option>';
        if (!razas[especie]) return;
        razas[especie].forEach(raza => {
            const option = document.createElement('option');
            option.value = raza;
            option.textContent = raza;
            razaSelect.appendChild(option);
        });
    }

    especieSelect.addEventListener('change', () => {
        cargarRazas(especieSelect.value);
    });

    goToStep2Btn.addEventListener('click', () => {
        step1.style.display = 'none';
        step2.style.display = 'block';
        stepIndicator.textContent = 'Paso 2 de 2';
        modalImage.src = '{{ asset('images/fotomodal2.png') }}';
        if (especieSelect.value) {
            cargarRazas(especieSelect.value);
        }
    });

    backToStep1Btn.addEventListener('click', () => {
        step2.style.display = 'none';
        step1.style.display = 'block';
        stepIndicator.textContent = 'Paso 1 de 2';
        modalImage.src = '{{ asset('images/fotomodal1.png') }}';
    });

    // Preview de imagen
    const fotoInput = document.getElementById('fotoMascota');
    const previewImg = document.getElementById('previewFoto');
    fotoInput.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                previewImg.src = e.target.result;
                previewImg.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });
});
</script>