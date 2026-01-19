{{-- resources/views/modals/publicar-step1.blade.php --}}

<div class="modal-wrapper">
    <div id="modalStep1" class="modal-overlay">
        <div class="modal-container">
            <button id="closeStep1" class="close-modal-btn">&times;</button>

            <div class="modal-content">

                <!-- Columna izquierda: formulario -->
                <div class="modal-left">
                    <header class="modal-header">
                        <p class="form-title3">Publicar un Panita</p>
                        <p class="form-subtitle3">Paso 1 de 2</p>
                    </header>

                    <form id="formStep1">

<div class="form-grid">

    <!-- Foto mascota (izquierda) -->
    <div class="photo-column">
        <label style="color:#af7700">Foto de la mascota</label>
        <input type="file" id="fotoMascota" accept="image/*" hidden>
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
                <input type="text" id="nombre" required>
            </div>

            <div class="form-group">
                <label style="color:#af7700">Especie</label>
                <select id="especie" required>
                    <option value="">Seleccione</option>
                    <option value="perro">Perro</option>
                    <option value="gato">Gato</option>
                </select>
            </div>
        </div>

        <!-- Fila 2: Edad + Peso -->
        <div class="form-row">
            <div class="form-group">
                <label style="color:#af7700">Edad</label>
                <input type="number" id="edad" min="0" required>
            </div>

            <div class="form-group">
                <label style="color:#af7700">Peso (LB)</label>
                <input type="number" id="peso" required>
            </div>
        </div>

        <!-- Fila 3: Tamaño + Sexo -->
        <div class="form-row">
            <div class="form-group">
                <label style="color:#af7700">Tamaño</label>
                <select id="tamano">
                    <option value="">Seleccione</option>
                    <option>Pequeño</option>
                    <option>Mediano</option>
                    <option>Grande</option>
                </select>
            </div>

            <div class="form-group">
                <label style="color:#af7700">Sexo</label>
                <select id="sexo">
                    <option value="">Seleccione</option>
                    <option>Macho</option>
                    <option>Hembra</option>
                </select>
            </div>
        </div>

    </div> <!-- fin fields-column -->

</div> <!-- fin form-grid -->

<!-- Descripción full-width debajo de todo el grid -->
<div class="description-full-width">
    <label style="color:#af7700">Descripción</label>
    <textarea id="descripcion" rows="6" maxlength="500" required></textarea>
</div>



                        <!-- Botón siguiente -->
                        <div style="text-align:center;margin-top:24px;">
                            <button type="button" class="submit-bt1" id="goToStep2">Siguiente</button>
                        </div>

                    </form>
                </div> <!-- fin modal-left -->

                <!-- Columna derecha: imagen -->
                <div class="modal-right">
                    <img src="{{ asset('images/fotomodal1.png') }}" alt="Imagen derecha" class="right-image-img">
                </div>

            </div> <!-- fin modal-content -->
        </div> <!-- fin modal-container -->
    </div> <!-- fin modal-overlay -->
</div> <!-- fin modal-wrapper -->
