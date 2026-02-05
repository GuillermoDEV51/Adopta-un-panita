{{-- resources/views/mascotas/publicar.blade.php --}}



<div class="publicar-container">
    <div class="publicar-wrapper">
        <div class="publicar-content">
            <!-- Columna izquierda: formulario -->
            <div class="publicar-left">
                <header class="publicar-header">
                    <a href="{{ route('MascotasDisponibles') }}" class="btn-back">← Volver</a>


                    <h1 class="form-title3">🐾 Publicar un Panita</h1>
                    <p class="form-subtitle3">Completa la información de la mascota</p>
                </header>


                <!-- Mostrar error general de sesión -->
                @if (session('error'))
                    <div class="alert alert-error"
                        style="background:#ffe5e5; color:#8b0000; padding:12px; border-radius:8px; margin-bottom:16px;">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success"
                        style="background:#e5ffe5; color:#006600; padding:12px; border-radius:8px; margin-bottom:16px;">
                        {{ session('success') }}
                    </div>
                @endif

                <form id="publicarForm" method="POST" action="{{ route('publicar2') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- ERRORES -->
                    @if ($errors->any())
                        <div class="alert alert-error"
                            style="background:#ffe5e5; color:#8b0000; padding:12px; border-radius:8px; margin-bottom:16px;">
                            <strong>❌ Ocurrieron errores al publicar la mascota:</strong>
                            <ul style="margin-top:8px; padding-left:20px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-grid">
                        <!-- Foto mascota (izquierda) -->
                        <div class="photo-column">
                            <label style="color:#af7700; font-weight: 600; display: block; margin-bottom: 8px;">Foto de
                                la mascota</label>
                            <input type="file" id="fotoMascota" name="foto" accept="image/*" hidden>
                            <label for="fotoMascota" class="photo-box"
                                style="display: block; width: 100%; height: 300px; border: 2px dashed #af7700; border-radius: 8px; cursor: pointer; overflow: hidden; position: relative; background: #f9f9f9;">
                                <div
                                    style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                                    <span style="color:#af7700; font-size: 16px;">📷 Añadir foto</span>
                                </div>
                                <img id="previewFoto" alt=""
                                    style="width: 100%; height: 100%; object-fit: cover; display: none;" />
                            </label>
                            @error('foto')
                                <span class="text-danger"
                                    style="color: #dc3545; font-size: 14px; margin-top: 4px; display: block;">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Campos (derecha) -->
                        <div class="fields-column">
                            <!-- Fila 1: Nombre + Especie -->
                            <div class="form-row" style="display: flex; gap: 20px; margin-bottom: 20px;">
                                <div class="form-group" style="flex: 1;">
                                    <label
                                        style="color:#af7700; font-weight: 600; display: block; margin-bottom: 8px;">Nombre</label>
                                    <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}"
                                        placeholder="Nombre del panita" required
                                        style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px;">
                                    @error('nombre')
                                        <span class="text-danger"
                                            style="color: #dc3545; font-size: 14px; margin-top: 4px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group" style="flex: 1;">
                                    <label
                                        style="color:#af7700; font-weight: 600; display: block; margin-bottom: 8px;">Especie</label>
                                    <select id="especie" name="id_especies" required
                                        style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px; background: white;">
                                        <option value="">Seleccione una especie</option>
                                        @foreach ($especies as $especie)
                                            <option value="{{ $especie->id }}"
                                                {{ old('id_especies') == $especie->id ? 'selected' : '' }}>
                                                {{ $especie->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_especies')
                                        <span class="text-danger"
                                            style="color: #dc3545; font-size: 14px; margin-top: 4px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Fila 2: Edad + Peso -->
                            <div class="form-row" style="display: flex; gap: 20px; margin-bottom: 20px;">
                                <div class="form-group" style="flex: 1;">
                                    <label
                                        style="color:#af7700; font-weight: 600; display: block; margin-bottom: 8px;">Edad
                                        (años)</label>
                                    <input type="number" id="edad" min="0" max="30" name="edad"
                                        value="{{ old('edad') }}" required
                                        style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px;">
                                    @error('edad')
                                        <span class="text-danger"
                                            style="color: #dc3545; font-size: 14px; margin-top: 4px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group" style="flex: 1;">
                                    <label
                                        style="color:#af7700; font-weight: 600; display: block; margin-bottom: 8px;">Peso
                                        (LB)</label>
                                    <input type="number" id="peso" name="peso" min="0" max="100"
                                        step="0.1" value="{{ old('peso') }}"
                                        style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px;">
                                    @error('peso')
                                        <span class="text-danger"
                                            style="color: #dc3545; font-size: 14px; margin-top: 4px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Fila 3: Tamaño + Sexo -->
                            <div class="form-row" style="display: flex; gap: 20px; margin-bottom: 20px;">
                                <div class="form-group" style="flex: 1;">
                                    <label
                                        style="color:#af7700; font-weight: 600; display: block; margin-bottom: 8px;">Tamaño</label>
                                    <select id="tamano" name="tamano"
                                        style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px; background: white;">
                                        <option value="">Seleccione</option>
                                        <option value="Pequeño" {{ old('tamano') == 'Pequeño' ? 'selected' : '' }}>
                                            Pequeño</option>
                                        <option value="Mediano" {{ old('tamano') == 'Mediano' ? 'selected' : '' }}>
                                            Mediano</option>
                                        <option value="Grande" {{ old('tamano') == 'Grande' ? 'selected' : '' }}>Grande
                                        </option>
                                    </select>
                                    @error('tamano')
                                        <span class="text-danger"
                                            style="color: #dc3545; font-size: 14px; margin-top: 4px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group" style="flex: 1;">
                                    <label
                                        style="color:#af7700; font-weight: 600; display: block; margin-bottom: 8px;">Sexo</label>
                                    <select id="sexo" name="genero" required
                                        style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px; background: white;">
                                        <option value="">Seleccione</option>
                                        <option value="Macho" {{ old('genero') == 'Macho' ? 'selected' : '' }}>Macho
                                        </option>
                                        <option value="Hembra" {{ old('genero') == 'Hembra' ? 'selected' : '' }}>
                                            Hembra</option>
                                    </select>
                                    @error('genero')
                                        <span class="text-danger"
                                            style="color: #dc3545; font-size: 14px; margin-top: 4px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div> <!-- fin fields-column -->
                    </div> <!-- fin form-grid -->

                    <!-- Descripción full-width debajo de todo el grid -->
                    <div class="description-full-width" style="margin-top: 30px;">
                        <label
                            style="color:#af7700; font-weight: 600; display: block; margin-bottom: 8px;">Descripción</label>
                        <textarea id="descripcion" rows="6" maxlength="500" name="descripcion" placeholder="Describe al panita"
                            style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px; resize: vertical;">{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <span class="text-danger"
                                style="color: #dc3545; font-size: 14px; margin-top: 4px; display: block;">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Historial médico -->
                    <div class="form-group" style="margin-top: 30px;">
                        <label style="color:#af7700; font-weight: 600; display: block; margin-bottom: 8px;">
                            Historial médico (múltiples archivos)
                        </label>

                        <!-- Input real oculto -->
                        <input type="file" id="documentacion" name="documentacion[]" multiple>

                        <!-- Botón visual -->
                        <label for="documentacion" class="file-btn">
                            Seleccionar archivos
                        </label>

                        <span id="fileName" class="file-upload-text">
                            Ningún archivo seleccionado
                        </span>

                        @error('documentacion')
                            <span class="text-danger"
                                style="color: #dc3545; font-size: 14px; margin-top: 6px; display: block;">
                                {{ $message }}
                            </span>
                        @enderror

                        @error('documentacion.*')
                            <span class="text-danger"
                                style="color: #dc3545; font-size: 14px; margin-top: 6px; display: block;">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>


                    <div class="form-row" style="display: flex; gap: 20px; margin-top: 20px;">
                        <div class="form-group" style="flex: 1;">
                            <label
                                style="color:#af7700; font-weight: 600; display: block; margin-bottom: 8px;">Raza</label>
                            <select id="raza" name="raza"
                                style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px; background: white;">
                                <option value="">Seleccione</option>
                                <!-- Las opciones se cargarán con JavaScript -->
                            </select>
                            @error('raza')
                                <span class="text-danger"
                                    style="color: #dc3545; font-size: 14px; margin-top: 4px; display: block;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row" style="display: flex; gap: 20px; margin-top: 20px;">
                        <div class="form-group" style="flex: 1;">
                            <label
                                style="color:#af7700; font-weight: 600; display: block; margin-bottom: 8px;">Ubicación</label>
                            <select id="ubicacion" name="ubicacion" required
                                style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px; background: white;">
                                <option value="">Seleccione</option>
                                <option value="Caracas" {{ old('ubicacion') == 'Caracas' ? 'selected' : '' }}>Caracas
                                </option>
                                <option value="Miranda" {{ old('ubicacion') == 'Miranda' ? 'selected' : '' }}>Miranda
                                </option>
                                <option value="La Guaira" {{ old('ubicacion') == 'La Guaira' ? 'selected' : '' }}>La
                                    Guaira</option>
                                <option value="Zulia" {{ old('ubicacion') == 'Zulia' ? 'selected' : '' }}>Zulia
                                </option>
                                <option value="Lara" {{ old('ubicacion') == 'Lara' ? 'selected' : '' }}>Lara
                                </option>
                                <option value="Carabobo" {{ old('ubicacion') == 'Carabobo' ? 'selected' : '' }}>
                                    Carabobo</option>
                                <option value="Sucre" {{ old('ubicacion') == 'Sucre' ? 'selected' : '' }}>Sucre
                                </option>
                                <option value="Anzoátegui" {{ old('ubicacion') == 'Anzoátegui' ? 'selected' : '' }}>
                                    Anzoátegui</option>
                                <option value="Nueva Esparta"
                                    {{ old('ubicacion') == 'Nueva Esparta' ? 'selected' : '' }}>Nueva Esparta</option>
                            </select>
                            @error('ubicacion')
                                <span class="text-danger"
                                    style="color: #dc3545; font-size: 14px; margin-top: 4px; display: block;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-row" style="display: flex; gap: 20px; margin-top: 20px;">
                        <div class="form-group" style="flex: 1;">
                            <label
                                style="color:#af7700; font-weight: 600; display: block; margin-bottom: 8px;">Vacunado</label>
                            <select id="vacunado" name="vacunado" required
                                style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px; background: white;">
                                <option value="" disabled selected>Si/No</option>
                                <option value="1" {{ old('vacunado') == '1' ? 'selected' : '' }}>Sí</option>
                                <option value="0" {{ old('vacunado') == '0' ? 'selected' : '' }}>No</option>
                            </select>
                            @error('vacunado')
                                <span class="text-danger"
                                    style="color: #dc3545; font-size: 14px; margin-top: 4px; display: block;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group" style="flex: 1;">
                            <label
                                style="color:#af7700; font-weight: 600; display: block; margin-bottom: 8px;">Esterilizado</label>
                            <select id="esterilizado" name="esterilizado" required
                                style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px; background: white;">
                                <option value="" disabled selected>Si/No</option>
                                <option value="1" {{ old('esterilizado') == '1' ? 'selected' : '' }}>Sí</option>
                                <option value="0" {{ old('esterilizado') == '0' ? 'selected' : '' }}>No</option>
                            </select>
                            @error('esterilizado')
                                <span class="text-danger"
                                    style="color: #dc3545; font-size: 14px; margin-top: 4px; display: block;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Botón de envío -->
                    <div style="display:flex;justify-content:center;gap:20px;margin-top:40px;padding-bottom: 40px;">
                        <a href="{{ route('AdminAnimales') }}" class="submit-btn"
                            style="padding: 12px 30px; background: #f0f0f0; color: #333; border: none; border-radius: 6px; font-size: 16px; cursor: pointer; text-decoration: none; text-align: center;">Cancelar</a>
                        <button type="submit" class="submit-bt" id="submitBtn">
                            <span class="btn-text">Publicar Mascota</span>
                            <span class="btn-loader"></span>
                        </button>

                    </div>
                </form>
            </div> <!-- fin publicar-left -->

            <!-- Columna derecha: imagen -->
            <div class="publicar-right">
                <img id="publicarImage" src="{{ asset('images/fotomodal1.png') }}" alt="Imagen mascota"
                    class="right-image-img"
                    style="width: 100%; height: 100%; object-fit: cover; border-radius: 0 8px 8px 0;">
            </div>
        </div> <!-- fin publicar-content -->
    </div> <!-- fin publicar-wrapper -->
</div> <!-- fin publicar-container -->

<style>
    /* ===============================
   CONTENEDOR GENERAL
   =============================== */
    html, body {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        font-family: 'Roboto', Arial, sans-serif;
        background: linear-gradient(135deg, #f5f7fa 0%, #e9bf37 100%);
    }

    .publicar-container {
        background: linear-gradient(135deg, #f5f7fa 0%, #e9bf37 100%);
        min-height: 100vh;
        padding: 30px 20px;
    }

    /* ===============================
   TARJETA PRINCIPAL
   =============================== */
    .publicar-wrapper {
        max-width: 1200px;
        margin: 0 auto;
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 18px 45px rgba(0, 0, 0, 0.12);
        overflow: hidden;
    }

    /* ===============================
   LAYOUT
   =============================== */
    .publicar-content {
        display: flex;
    }

    .publicar-left {
        flex: 2;
        padding: 45px;
    }

    .publicar-right {
        flex: 1;
        background: linear-gradient(180deg,
                rgba(175, 119, 0, 0.08),
                rgba(175, 119, 0, 0.02));
    }

    /* ===============================
   HEADER
   =============================== */
    .publicar-header {
        text-align: center;
        margin-bottom: 45px;
    }

    .form-title3 {
        font-size: 34px;
        font-weight: 700;
        color: #af7700;
        margin-bottom: 8px;
        letter-spacing: -0.5px;
    }

    .form-subtitle3 {
        font-size: 17px;
        color: #666;
    }

    /* ===============================
   GRID FORMULARIO
   =============================== */
    .form-grid {
        display: flex;
        gap: 40px;
        margin-bottom: 35px;
    }

    .photo-column {
        flex: 1;
    }

    .fields-column {
        flex: 2;
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    /* ===============================
   FOTO
   =============================== */
    .photo-box {
        border: 2px dashed #af7700;
        border-radius: 14px;
        background: #fafafa;
        transition: all .25s ease;
    }

    .photo-box:hover {
        border-color: #8a5c00;
        background: #fdf6e3;
    }

    .photo-box:hover img {
        transform: scale(1.03);
        transition: transform 0.25s ease;
    }

    /* ===============================
   INPUTS
   =============================== */
    input,
    select,
    textarea {
        width: 100%;
        padding: 11px 12px;
        border-radius: 8px;
        border: 1px solid #ddd;
        font-size: 15px;
        transition: all .2s ease;
        border-color: #af7700;
        box-shadow: 0 0 5px rgba(175, 119, 0, 0.25);
    }

    input::placeholder,
    textarea::placeholder {
        color: #bbb;
        font-weight: 400;
    }

    input:focus,
    select:focus,
    textarea:focus {
        border-color: #af7700 !important;
        box-shadow: 0 0 0 3px rgba(175, 119, 0, 0.12);
        outline: none;
    }

    /* ===============================
   BOTÓN VOLVER
   =============================== */
    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 14px;
        font-weight: 600;
        color: #af7700;
        text-decoration: none;
        padding: 7px 14px;
        border-radius: 999px;
        background: rgba(175, 119, 0, 0.1);
        transition: all .25s ease;
    }

    .btn-back:hover {
        background: rgba(175, 119, 0, 0.2);
        transform: translateX(-3px);
    }

    /* ===============================
   RESPONSIVE
   =============================== */
    @media (max-width: 992px) {
        .publicar-content {
            flex-direction: column;
        }

        .publicar-right {
            display: none;
        }

        .form-grid {
            flex-direction: column;
            gap: 25px;
        }

        .publicar-left {
            padding: 25px;
        }
    }

    @media (max-width: 768px) {
        .form-row {
            flex-direction: column;
            gap: 16px !important;
        }

        .form-title3 {
            font-size: 26px;
        }

        .publicar-container {
            padding: 15px;
        }
    }

    /* ===============================
   BOTÓN SUBIR ARCHIVOS
   =============================== */
    .file-upload-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 18px;
        background: rgba(175, 119, 0, 0.1);
        color: #af7700;
        border: 2px dashed #af7700;
        border-radius: 10px;
        font-weight: 600;
        font-size: 15px;
        cursor: pointer;
        transition: all .25s ease;
    }

    .file-upload-btn:hover {
        background: rgba(175, 119, 0, 0.2);
        transform: translateY(-1px);
    }

    .file-upload-text {
        display: block;
        margin-top: 8px;
        font-size: 14px;
        color: #666;
    }

    /* ===============================
   BOTÓN CON LOADING
   =============================== */
    .submit-bt {
        position: relative;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 12px 30px;
        background: #af7700;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all .25s ease;
    }

    .submit-bt:hover {
        background: #8a5c00;
    }

    .submit-bt:disabled {
        background: #c9a24d;
        cursor: not-allowed;
    }

    /* Texto */
    .submit-bt .btn-text {
        transition: opacity .2s ease;
    }

    /* Loader */
    .submit-bt .btn-loader {
        width: 18px;
        height: 18px;
        border: 3px solid rgba(255, 255, 255, 0.4);
        border-top-color: white;
        border-radius: 50%;
        animation: spin 0.9s linear infinite;
        display: none;
    }

    /* Estado cargando */
    .submit-bt.loading .btn-text {
        opacity: 0.7;
    }

    .submit-bt.loading .btn-loader {
        display: inline-block;
    }

    /* Animación */
    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    .file-btn {
        display: inline-block;
        padding: 10px 20px;
        background: #af7700;
        color: white;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.25s ease;
        font-weight: 600;
        font-size: 15px;
    }

    .file-btn:hover {
        background: #8a5c00;
    }

    input[type="file"] {
        display: none;
    }

    .alert {
        opacity: 0;
        animation: fadeIn 0.3s forwards;
    }

    @keyframes fadeIn {
        to {
            opacity: 1;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
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
        const especieSelect = document.getElementById('especie');
        if (especieSelect) {
            especieSelect.addEventListener('change', function(e) {
                cargarRazas(e.target.value);
            });

            // Cargar razas si ya hay un valor seleccionado (después de error)
            if (especieSelect.value) {
                cargarRazas(especieSelect.value);
            }
        }

        // Preview de imagen
        const fotoInput = document.getElementById('fotoMascota');
        const previewFoto = document.getElementById('previewFoto');

        if (fotoInput && previewFoto) {
            fotoInput.addEventListener('change', function() {
                const file = this.files[0];
                if (!file) return;

                const reader = new FileReader();
                reader.onload = function() {
                    previewFoto.src = reader.result;
                    previewFoto.style.display = 'block';
                    previewFoto.previousElementChild.style.display = 'none'; // Ocultar texto
                };
                reader.readAsDataURL(file);
            });
        }
    });
</script>
<script>
    document.getElementById('documentacion')?.addEventListener('change', function() {
        const fileText = document.getElementById('fileName');

        if (!this.files.length) {
            fileText.textContent = 'Ningún archivo seleccionado';
            return;
        }

        if (this.files.length === 1) {
            fileText.textContent = this.files[0].name;
        } else {
            fileText.textContent = `${this.files.length} archivos seleccionados`;
        }
    });
</script>
<script>
    document.getElementById('publicarForm')?.addEventListener('submit', function() {
        const btn = document.getElementById('submitBtn');

        btn.classList.add('loading');
        btn.disabled = true;
    });
</script>
