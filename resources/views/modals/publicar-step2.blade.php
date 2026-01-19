{{-- resources/views/modals/publicar-step2.blade.php --}}
<div class="modal-wrapper">
    <!-- Contenido del modal aquí -->

<div class="modal-overlay" id="modalStep2">
    <div class="modal-container">
        <button class="close-modal-btn" id="closeStep2">&times;</button>

        <div class="modal-content">
            <div class="modal-left">
                <header class="modal-header">
                    <p class="form-title3">Publicar un Panita</p>
                    <p class="form-subtitle3">Paso 2 de 2</p>
                </header>

                <form id="formFinal">
                    <div class="form-group">
                        <label style="color:#af7700">Historial médico</label>
                        <input type="file" name="historial[]" multiple>
                    </div>

                    <div class="form-row">
    <div class="form-group">
        <label style="color:#af7700">Raza</label>
        <select id="raza" required>
            <option value="">Seleccione</option>
        </select>
    </div>
</div>

                    <div class="form-row">
                        <div class="form-group">
                            <label style="color:#af7700">Convive con animales</label>
                            <select id="convive_animales" required>
                                <option value="">Seleccione</option>
                                <option value="si">Sí</option>
                                <option value="no">No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label style="color:#af7700">Convive con personas</label>
                            <select id="convive_personas" required>
                                <option value="">Seleccione</option>
                                <option value="si">Sí</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label style="color:#af7700">Ubicación</label>
                            <select id="ubicacion" required>
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
                            <select id="vacunado" required>
                                <option value="">Seleccione</option>
                                <option value="si">Sí</option>
                                <option value="no">No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label style="color:#af7700">Esterilizado</label>
                            <select id="esterilizado" required>
                                <option value="">Seleccione</option>
                                <option value="si">Sí</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>

                    <div style="display:flex;justify-content:center;gap:20px;margin-top:24px;">
                        <button type="button" class="submit-btn" id="backToStep1">Regresar</button>
                        <button type="submit" class="submit-bt">Publicar</button>
                    </div>
                </form>
            </div>

            <div class="modal-right">
    <img src="{{ asset('images/fotomodal2.png') }}" alt="Imagen derecha" class="right-image-img">

            </div>
        </div>
    </div>
</div>
</div>

    <!-- Script para cargar razas dinámicamente -->

<script>
document.addEventListener('DOMContentLoaded', () => {

    const razaSelect = document.getElementById('raza');

    const razas = {
        perro: [
            'Mestizo',
            'Pastor Alemán',
            'Pitbull',
            'Golden Retriever',
            'Labrador',
            'Chihuahua',
            'Poodle',
            'Bulldog'
        ],
        gato: [
            'Mestizo',
            'Persa',
            'Siamés',
            'Bengalí',
            'Maine Coon',
            'Angora'
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

    // Leer especie desde el paso 1
    const especieInput = document.getElementById('especie');

    if (especieInput) {
        especieInput.addEventListener('change', () => {
            cargarRazas(especieInput.value);
        });
    }

    // Cargar automáticamente al abrir el modal 2
    const modalStep2 = document.getElementById('modalStep2');
    modalStep2.addEventListener('transitionend', () => {
        if (especieInput?.value) {
            cargarRazas(especieInput.value);
        }
    });

});
</script>
