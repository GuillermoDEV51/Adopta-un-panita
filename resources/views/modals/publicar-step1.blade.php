{{-- resources/views/modals/publicar-step1.blade.php --}}

<div class="modal-wrapper">
    <!-- Contenido del modal aquí -->
<div id="modalStep1" class="modal-overlay">
  <div class="modal-container">
    <button id="closeStep1" class="close-modal-btn">&times;</button>
    <div class="modal-content">

        <div class="modal-content">
            <div class="modal-left">
                <header class="modal-header">
                    <p class="form-title3">Publicar un Panita</p>
                    <p class="form-subtitle3">Paso 1 de 2</p>
                </header>

                <form id="formStep1">
                    
                      <div class="form-row">
        <div class="form-group full-width" style="text-align:center;">
            <label>Foto de la mascota</label>

            <div class="photo-upload">
                <input type="file" id="fotoMascota" accept="image/*" hidden>
                <label for="fotoMascota" class="photo-box">
                    <span>📷 Subir foto</span>
                    <img id="previewFoto" alt="" />
                </label>
            </div>
        </div>
    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" id="nombre" required>
                        </div>

                        <div class="form-group">
                            <label>Especie</label>
                            <select id="especie" required>
                                <option value="">Seleccione</option>
                                <option value="perro">Perro</option>
                                <option value="gato">Gato</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Edad</label>
                            <input type="number" id="edad" min="0" required>
                        </div>

                        <div class="form-group">
                            <label>Peso (LB)</label>
                            <input type="number" id="peso" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group full-width">
                            <label>Descripción</label>
                            <textarea id="descripcion" rows="4" maxlength="500" required></textarea>
                        </div>
                    </div>

                    <div style="text-align:center;margin-top:24px;">
                        <button type="button" class="submit-bt" id="goToStep2">Siguiente</button>
                    </div>
                </form>
            </div>

<div class="modal-right">
    <img src="{{ asset('images/fotomodal1.png') }}" alt="Imagen derecha" class="right-image-img">
</div>

            </div>
        </div>
    </div>
</div>

</div>
