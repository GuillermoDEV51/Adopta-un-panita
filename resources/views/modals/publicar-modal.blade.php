{{-- resources/views/modals/publicar-modal.blade.php --}}

<div class="modal-wrapper">
    <div id="modalPublicar" class="modal-overlay" 
         style="{{ $errors->any() ? 'display: flex;' : 'display: none;' }}">
        <div class="modal-container">
            <button id="closeModal" class="close-modal-btn">&times;</button>
            @php
                 $especies = \App\Models\Especie::all();
            @endphp

            <div class="modal-content">
                <!-- Columna izquierda: formulario -->
                <div class="modal-left">
                    <header class="modal-header">
                        <p class="form-title3">Publicar un Panita</p>
                        <p class="form-subtitle3" id="stepIndicator">
                            {{ $errors->any() && old('_token') ? 'Paso 2 de 2' : 'Paso 1 de 2' }}
                        </p>
                    </header>

                    <!-- Mostrar error general de sesión -->
                    @if (session('error'))
                        <div class="alert alert-error" style="background:#ffe5e5; color:#8b0000; padding:12px; border-radius:8px; margin-bottom:16px;">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form id="publicarForm" method="POST" action="{{ route('publicarMascota') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- ERRORES -->
                        @if ($errors->any() && old('_token'))
                            <div class="alert alert-error" style="background:#ffe5e5; color:#8b0000; padding:12px; border-radius:8px; margin-bottom:16px;">
                                <strong>❌ Ocurrieron errores al publicar la mascota:</strong>
                                <ul style="margin-top:8px; padding-left:20px;">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Paso 1 -->
                        <div id="step1" class="step-content" 
                             style="{{ $errors->any() && old('_token') ? 'display: none;' : 'display: block;' }}">
                            <div class="form-grid">
                                <!-- Foto mascota (izquierda) -->
                                <div class="photo-column">
                                    <label style="color:#af7700">Foto de la mascota</label>
                                    <input type="file" id="fotoMascota" name="foto" accept="image/*" hidden>
                                    <label for="fotoMascota" class="photo-box">
                                        <span style="color:#af7700">📷 Añadir foto</span>
                                        <img id="previewFoto" alt="" 
                                             src="{{ old('foto_preview') ? asset('storage/mascotas/' . old('foto_preview')) : '' }}" />
                                    </label>
                                    @error('foto')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Campos (derecha) -->
                                <div class="fields-column">
                                    <!-- Fila 1: Nombre + Especie -->
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label style="color:#af7700">Nombre</label>
                                            <input type="text" id="nombre" name="nombre" 
                                                   value="{{ old('nombre') }}" 
                                                   placeholder="Nombre del panita" required>
                                            @error('nombre')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label style="color:#af7700">Especie</label>
                                            <select id="especie" name="id_especies" required>
                                                <option value="">Seleccione una especie</option>
                                                @foreach($especies as $especie)
                                                    <option value="{{ $especie->id }}" 
                                                        {{ old('id_especies') == $especie->id ? 'selected' : '' }}>
                                                        {{ $especie->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('id_especies')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Fila 2: Edad + Peso -->
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label style="color:#af7700">Edad</label>
                                            <input type="number" id="edad" min="0" max="30" 
                                                   name="edad" value="{{ old('edad') }}" required>
                                            @error('edad')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label style="color:#af7700">Peso (LB)</label>
                                            <input type="number" id="peso" name="peso" 
                                                   min="0" max="100" step="0.1"
                                                   value="{{ old('peso') }}">
                                            @error('peso')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Fila 3: Tamaño + Sexo -->
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label style="color:#af7700">Tamaño</label>
                                            <select id="tamano" name="tamano">
                                                <option value="">Seleccione</option>
                                                <option value="Pequeño" {{ old('tamano') == 'Pequeño' ? 'selected' : '' }}>Pequeño</option>
                                                <option value="Mediano" {{ old('tamano') == 'Mediano' ? 'selected' : '' }}>Mediano</option>
                                                <option value="Grande" {{ old('tamano') == 'Grande' ? 'selected' : '' }}>Grande</option>
                                            </select>
                                            @error('tamano')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label style="color:#af7700">Sexo</label>
                                            <select id="sexo" name="genero" required>
                                                <option value="">Seleccione</option>
                                                <option value="Macho" {{ old('genero') == 'Macho' ? 'selected' : '' }}>Macho</option>
                                                <option value="Hembra" {{ old('genero') == 'Hembra' ? 'selected' : '' }}>Hembra</option>
                                            </select>
                                            @error('genero')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> <!-- fin fields-column -->
                            </div> <!-- fin form-grid -->

                            <!-- Descripción full-width debajo de todo el grid -->
                            <div class="description-full-width">
                                <label style="color:#af7700">Descripción</label>
                                <textarea id="descripcion" rows="6" maxlength="500" 
                                          name="descripcion" placeholder="Describe al panita">{{ old('descripcion') }}</textarea>
                                @error('descripcion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Botón siguiente -->
                            <div style="text-align:center;margin-top:24px;">
                                <button type="button" class="submit-bt1" id="goToStep2">Siguiente</button>
                            </div>
                        </div> <!-- fin step1 -->

                        <!-- Paso 2 -->
                        <div id="step2" class="step-content" 
                             style="{{ $errors->any() && old('_token') ? 'display: block;' : 'display: none;' }}">
                            <div class="form-group">
                                <label style="color:#af7700">Historial médico (múltiples archivos)</label>
                                <input type="file" name="documentacion[]" multiple 
                                       accept=".pdf,.doc,.docx,.jpg,.png,.jpeg">
                                <small class="text-muted">Puede seleccionar múltiples archivos</small>
                                @error('documentacion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                @error('documentacion.*')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label style="color:#af7700">Raza</label>
                                    <select id="raza" name="raza">
                                        <option value="">Seleccione</option>
                                    </select>
                                    @error('raza')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label style="color:#af7700">Ubicación</label>
                                    <select id="ubicacion" name="ubicacion" required>
                                        <option value="">Seleccione</option>
                                        <option value="Caracas" {{ old('ubicacion') == 'Caracas' ? 'selected' : '' }}>Caracas</option>
                                        <option value="Miranda" {{ old('ubicacion') == 'Miranda' ? 'selected' : '' }}>Miranda</option>
                                        <option value="La Guaira" {{ old('ubicacion') == 'La Guaira' ? 'selected' : '' }}>La Guaira</option>
                                        <option value="Zulia" {{ old('ubicacion') == 'Zulia' ? 'selected' : '' }}>Zulia</option>
                                        <option value="Lara" {{ old('ubicacion') == 'Lara' ? 'selected' : '' }}>Lara</option>
                                        <option value="Carabobo" {{ old('ubicacion') == 'Carabobo' ? 'selected' : '' }}>Carabobo</option>
                                        <option value="Sucre" {{ old('ubicacion') == 'Sucre' ? 'selected' : '' }}>Sucre</option>
                                        <option value="Anzoátegui" {{ old('ubicacion') == 'Anzoátegui' ? 'selected' : '' }}>Anzoátegui</option>
                                        <option value="Nueva Esparta" {{ old('ubicacion') == 'Nueva Esparta' ? 'selected' : '' }}>Nueva Esparta</option>
                                    </select>
                                    @error('ubicacion')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label style="color:#af7700">Vacunado</label>
                                    <select id="vacunado" name="vacunado" required>
                                        <option value="" disabled selected>Si/No</option>                                                
                                        <option value="1" {{ old('vacunado') == '1' ? 'selected' : '' }}>Sí</option>
                                        <option value="0" {{ old('vacunado') == '0' ? 'selected' : '' }}>No</option>
                                    </select>
                                    @error('vacunado')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label style="color:#af7700">Esterilizado</label>
                                    <select id="esterilizado" name="esterilizado" required>
                                        <option value="" disabled selected>Si/No</option>                                                
                                        <option value="1" {{ old('esterilizado') == '1' ? 'selected' : '' }}>Sí</option>
                                        <option value="0" {{ old('esterilizado') == '0' ? 'selected' : '' }}>No</option>
                                    </select>    
                                    @error('esterilizado')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
                    <img id="modalImage" 
                         src="{{ $errors->any() && old('_token') ? asset('images/fotomodal2.png') : asset('images/fotomodal1.png') }}" 
                         alt="Imagen derecha" class="right-image-img">
                </div>
            </div> <!-- fin modal-content -->
        </div> <!-- fin modal-container -->
    </div> <!-- fin modal-overlay -->
</div> <!-- fin modal-wrapper -->

<script>
document.addEventListener('DOMContentLoaded', () => {
    const openBtn = document.getElementById('openPublicarModal');
    const modal = document.getElementById('modalPublicar');
    const step1 = document.getElementById('step1');
    const step2 = document.getElementById('step2');

    // Si hay errores de validación, mantener el modal abierto y en paso 2
    const hasErrors = {{ $errors->any() && old('_token') ? 'true' : 'false' }};
    
    if (hasErrors) {
        document.body.style.overflow = 'hidden';
    }

    // Función para abrir modal
    if (openBtn) {
        openBtn.addEventListener('click', (e) => {
            e.preventDefault();
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        });
    }

    // Pasar de Step1 a Step2
    document.getElementById('goToStep2')?.addEventListener('click', () => {
        // Validar campos requeridos del paso 1 antes de continuar
        const requiredFields = ['nombre', 'id_especies', 'edad', 'genero', 'tamano'];
        let isValid = true;
        
        requiredFields.forEach(fieldId => {
            const field = document.querySelector(`[name="${fieldId}"]`);
            if (field && !field.value) {
                isValid = false;
                field.style.borderColor = 'red';
            }
        });
        
        if (!isValid) {
            alert('Por favor complete todos los campos requeridos antes de continuar.');
            return;
        }
        
        step1.style.display = 'none';
        step2.style.display = 'block';
        document.getElementById('stepIndicator').textContent = 'Paso 2 de 2';
        document.getElementById('modalImage').src = '{{ asset('images/fotomodal2.png') }}';
        
        // Cargar razas si especie seleccionada
        const especie = document.getElementById('especie').value;
        if (especie) {
            cargarRazas(especie);
        }
    });

    // Volver de Step2 a Step1
    document.getElementById('backToStep1')?.addEventListener('click', () => {
        step2.style.display = 'none';
        step1.style.display = 'block';
        document.getElementById('stepIndicator').textContent = 'Paso 1 de 2';
        document.getElementById('modalImage').src = '{{ asset('images/fotomodal1.png') }}';
    });

    // Función para cerrar modal
    function closeModal() {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
        // Resetear a paso 1
        step2.style.display = 'none';
        step1.style.display = 'block';
        document.getElementById('stepIndicator').textContent = 'Paso 1 de 2';
        document.getElementById('modalImage').src = '{{ asset('images/fotomodal1.png') }}';
        
        // Limpiar errores anteriores
        const errorAlerts = document.querySelectorAll('.alert-error');
        errorAlerts.forEach(alert => alert.remove());
    }

    // Cerrar con botón "X"
    document.getElementById('closeModal')?.addEventListener('click', closeModal);

    // Cerrar al hacer click fuera del modal (overlay)
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeModal();
        }
    });

    // Cerrar al presionar Escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal.style.display === 'flex') {
            closeModal();
        }
    });

    // Función para cargar razas
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
        const razaSelect = document.getElementById('raza');
        razaSelect.innerHTML = '<option value="">Seleccione</option>';
        
        // Si hay valor anterior, mantenerlo seleccionado
        const oldValue = '{{ old('raza') }}';
        
        if (!razas[especie]) return;
        
        razas[especie].forEach(raza => {
            const option = document.createElement('option');
            option.value = raza;
            option.textContent = raza;
            if (oldValue === raza) {
                option.selected = true;
            }
            razaSelect.appendChild(option);
        });
    }

    // Evento para cargar razas al cambiar especie
    document.getElementById('especie')?.addEventListener('change', (e) => {
        cargarRazas(e.target.value);
    });

    // Cargar razas si ya hay un valor seleccionado (después de error)
    const especieSeleccionada = document.getElementById('especie').value;
    if (especieSeleccionada) {
        cargarRazas(especieSeleccionada);
    }
});

// Preview de imagen
const fotoInput = document.getElementById('fotoMascota');
const previewFoto = document.getElementById('previewFoto');

if (fotoInput) {
    fotoInput.addEventListener('change', function () {
        const file = this.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = () => {
            previewFoto.src = reader.result;
            previewFoto.style.display = 'block';
        };
        reader.readAsDataURL(file);
    });
}
</script>