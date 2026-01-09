@extends ('layouts.admin')
      @section('main')
      <!-- Dashboard Main Content -->
      <div class="dashboard-container">
        <!-- Sidebar Menu -->
        <aside class="sidebar">
          <div class="menu-section">
            <h2 class="menu-title">Menú</h2>
            <div class="menu-list">
              <div class="menu-item">
                <i class="fas fa-tachometer-alt"></i>
                <a href="dashboard.html" style="color: inherit; text-decoration: none;">Dashboards</a>
              </div>
              <div class="menu-item">
                <i class="fas fa-clipboard-list"></i>
                Solicitudes
              </div>
              <div class="menu-item active">
                <i class="fas fa-plus-circle"></i>
                Añadir refugios
              </div>
            </div>
          </div>
          
          <div class="menu-section">
            <h2 class="menu-title">Páginas</h2>
            <div class="menu-list">
              <div class="menu-item">
                <i class="fas fa-home"></i>
                Refugios
              </div>
              <div class="menu-item">
                <i class="fas fa-users"></i>
                Usuarios
              </div>
          
            </div>
          </div>
          
          <div class="menu-section">
            <h2 class="menu-title">Mascotas</h2>
            <div class="menu-list">
              <div class="menu-item">
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

        <!-- Main Content Area - Formulario de Registro de Refugios -->
         
        <div class="main-content1">
          <div class="registration-container">
            <div class="form-header">
              <h1 class="content-title">Registro de Nuevo Refugio</h1>
              <p class="form-subtitle">Completa todos los campos para registrar un nuevo refugio en PanitasPet</p>
            </div>

            <div class="photo-section">
              <div class="photo-placeholder">
                <div class="photo-icon">+</div>
                <div class="add-photo-text">Añadir foto de portada del refugio</div>
              </div>
              <div class="photo-upload">
                <label for="cover_photo" class="sr-only">Foto de portada</label>
                   <!-- <input type="file" name="cover_photo" id="cover_photo" accept="image/*" class="form-input">  -->
              </div>
            </div>

            <!-- Formulario en modo local: acción placeholder y envío desactivado hasta implementar POST -->
            <form class="form-fields" id="refugeRegistrationForm" action="#" enctype="multipart/form-data">
              @csrf
              <div class="form-row">
                <div class="form-group">
                  <label for="refuge_name" class="form-label">Nombre del Refugio *</label>
                  <input type="text" id="refuge_name" name="name" class="form-input" placeholder="Ej: Refugio Amor Animal" required>
                </div>
                <div class="form-group">
                  <label for="responsible" class="form-label">Responsable *</label>
                  <input type="text" id="responsible" name="responsible" class="form-input" placeholder="Nombre del responsable" required>
                </div>
              </div>
              
              <div class="form-row">
                <div class="form-group">
                  <label for="phone" class="form-label">Teléfono de Contacto *</label>
                  <input type="tel" id="phone" name="phone" class="form-input" placeholder="Ej: +584141234567" required>
                </div>
                <div class="form-group">
                  <label for="ci" class="form-label">Cédula de identidad *</label>
                  <input type="text" id="ci" name="ci" class="form-input" placeholder="Ej: V-30.000.000" required>
                </div>
              </div>
              
              <div class="form-group">
                <label for="location" class="form-label">Ubicación *</label>
                <input type="text" id="location" name="location" class="form-input" placeholder="Calle, número, ciudad, estado etc" required>
              </div>
              
              <div class="form-group">
                <label for="social" class="form-label">Redes sociales (si hay)</label>
                <input type="text" id="social" name="social" class="form-input" placeholder="Ej: @refugio_amor_animal">
              </div>
                <div class="form-group">
                  <label class="form-label">Fecha de Fundación</label>
                  <div class="date-row" style="display:flex;gap:12px;align-items:center;">
                    <input type="number" name="foundation_day" id="foundation_day" class="form-input" placeholder="DD" min="1" max="31" style="width:84px;">
                    <input type="number" name="foundation_month" id="foundation_month" class="form-input" placeholder="MM" min="1" max="12" style="width:84px;">
                    <input type="number" name="foundation_year" id="foundation_year" class="form-input" placeholder="YYYY" min="1800" max="2100" style="width:120px;">
                  </div>
                </div>
              
              <div class="form-group">
                <label for="description" class="form-label">Descripción del Refugio</label>
                <textarea id="description" name="description" class="form-input" placeholder="Describe brevemente la misión, servicios y características del refugio..." maxlength="500" rows="5"></textarea>
                <div class="form-hint">Máximo 500 caracteres</div>
              </div>

                <div class="form-actions">
                <button type="button" class="register-btn" id="addRefugeBtn">Añadir refugio</button>
              </div>

            </form>

          </div>
        </div>

      @endsection