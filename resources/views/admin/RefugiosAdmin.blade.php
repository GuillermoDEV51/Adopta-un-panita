<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio - PanitasPet | Adopción y Refugios de Mascotas</title>
  <meta name="description" content="Dashboard de PanitasPet para gestionar adopciones y refugios. Plataforma confiable para encontrar tu compañero perfecto y apoyar refugios locales.">
  <meta name="keywords" content="adopción mascotas, refugios animales, dashboard, PanitasPet, gestionar mascotas, voluntarios">
  
  <meta property="og:type" content="website">
  <meta property="og:title" content="Inicio - PanitasPet | Adopción y Refugios de Mascotas">
  <meta property="og:description" content="Dashboard de PanitasPet para gestionar adopciones y refugios. Plataforma confiable para encontrar tu compañero perfecto.">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&family=Pacifico&display=swap" rel="stylesheet">
  
@vite(['resources/css/stylessadmin.css', 'resources/js/menuadmin.js'])
<meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script>
    window.ASSETS_URL = "{{ asset('') }}";
</script>
</head>

<body>
  <div class="main-container">
    <div class="content-wrapper">

      <header class="header">
        <div class="header-content">
          <h1 class="logo">
            <img src="{{ asset('images/logopanitapet.png') }}" alt="PanitasPet" class="logo-img">

            <span class="brand-text">
              <span class="logo-text">PanitasPet</span>
              <span class="logo-subtitle">Adopción y refugios</span>
            </span>
          </h1>
           <nav class="nav-section">
            <div class="nav-menu">
              <a href="{{ route('Inicio') }}" class="nav-item" role="menuitem">Inicio</a>
              <a href="{{ route('MascotasDisponibles') }}" class="nav-item" role="menuitem">Mascotas</a>
              <a href="{{ route('RefugiosDisponibles') }}" class="nav-item" role="menuitem">Refugios</a>
            </div>


                        <!-- Authentication Links -->
                        @if (Route::has('login'))
                            <div class="nav-auth">
                                @auth
                                    <!-- User is logged in -->
                                    @if (auth()->user()->id_rol == 1)
                                        <a href="{{ route('Dashboard') }}" class="login-btn">{{ auth()->user()->nombre }}
                                            {{ auth()->user()->apellido }}</a>
                                    @elseif (auth()->user()->id_rol == 4 || auth()->user()->id_rol == 5)
                                        <a href="{{ route('refugio.dashboard') }}"
                                            class="login-btn">{{ auth()->user()->nombre }}
                                            {{ auth()->user()->apellido }}</a>
                                    @else
                                        <!-- Regular User -->
                                        <a href="{{ route('user.solicitudes') }}"
                                            class="login-btn">{{ auth()->user()->nombre }}
                                            {{ auth()->user()->apellido }}</a>
                                    @endif

                                    <!-- Logout Form/Button could go here if not already in menu.js or elsewhere -->
                                @else
                                    <!-- User is NOT logged in -->
                                    <a href="{{ route('login') }}" class="login-btn">Iniciar sesión</a>
                                @endauth
                            </div>
                        @endif


            <div class="menu-lines" aria-hidden="true">
              <span></span>
              <span></span>
              <span></span>
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
                <a href="{{ route('Dashboard') }}" style="color:inherit; text-decoration:none;">Dashboard</a>
              </div>
              <div class="menu-item">
                <i class="fas fa-clipboard-list"></i>
                <a href="{{ route('SolicitudesAdmin') }}" style="color:inherit; text-decoration:none;">Solicitudes</a>
              </div>
              <div class="menu-item">
                <i class="fas fa-plus-circle"></i>
                <a href="{{ route('AñadirRefugio') }}" style="color:inherit; text-decoration:none;">Añadir refugios</a>
              </div>
            </div>
          </div>
          
          <div class="menu-section">
            <h2 class="menu-title">Páginas</h2>
            <div class="menu-list">
              <div class="menu-item active">
                <i class="fas fa-home"></i>
                <a href="{{ route('RefugiosAdmin') }}" style="color:inherit; text-decoration:none;">Refugios</a>
              </div>
              <div class="menu-item">
                <i class="fas fa-users"></i>
                <a href="{{ route('UsuariosAdmin') }}" style="color:inherit; text-decoration:none;">Usuarios</a>
              </div>
            </div>
          </div>
          
<div class="menu-section">
  <h2 class="menu-title">Mascotas</h2>
  <div class="menu-list">
    <div class="menu-item">
      <i class="fas fa-paw"></i>
<a href="{{ route('AdminAnimales') }}" style="color:inherit; text-decoration:none;">
    Animales
</a>
    </div>
              <div class="menu-item">
                <i class="fas fa-sign-out-alt"></i>
                <a href="{{ route('login') }}" style="color:inherit; text-decoration:none;">Cerrar sesión</a>
              </div>
            </div>
          </div>
        </aside>
            <div class="main-content">
              <div class="paginas-section">
                <div class="titulo-wrapper">
                  <h1 class="paginas-title">Refugios Registrados</h1>
                  <div class="titulo-line" aria-hidden="true"></div>
                </div>
              </div>

              <div class="refugios-cards">
                @forelse ($refugios as $refugio)
                  <div class="refugio-card">
                    <div class="refugio-card-media">
                      @if (!empty($refugio->imagen))
                        <img src="{{ asset('storage/' . $refugio->imagen) }}"
                            alt="Imagen de {{ $refugio->nombre }}">
                      @else
                        <div class="refugio-card-placeholder">
                          <i class="fas fa-home"></i>
                        </div>
                      @endif
                    </div>
                    <div class="refugio-card-body">
                      <div>
                        <h3 class="refugio-card-title">{{ $refugio->nombre }}</h3>
                        <p class="refugio-card-line">
                          <i class="fas fa-map-marker-alt"></i>
                          {{ $refugio->direccion }}
                        </p>
                        <p class="refugio-card-line">
                          <i class="fas fa-phone"></i>
                          {{ $refugio->telefono ?? 'Sin teléfono' }}
                        </p>
                        <p class="refugio-card-line">
                          <i class="fas fa-envelope"></i>
                          {{ $refugio->email ?? 'Sin email' }}
                        </p>
                        @if (!empty($refugio->descripcion))
                          <p class="refugio-card-desc">{{ $refugio->descripcion }}</p>
                        @endif
                      </div>
                      <div class="refugio-card-actions">
                        <button type="button" class="refugio-btn refugio-btn--edit js-edit-refugio"
                          data-id="{{ $refugio->id }}"
                          data-nombre="{{ $refugio->nombre }}"
                          data-direccion="{{ $refugio->direccion }}"
                          data-telefono="{{ $refugio->telefono ?? '' }}"
                          data-email="{{ $refugio->email ?? '' }}"
                          data-redes="{{ $refugio->redes_sociales ?? '' }}"
                          data-descripcion="{{ $refugio->descripcion ?? '' }}"
                          data-imagen="{{ $refugio->imagen ?? '' }}">
                          <i class="fas fa-edit"></i> Editar
                        </button>
                        <form action="{{ route('EliminarRefugio', $refugio->id) }}" method="POST"
                          class="delete-refugio-form" data-refugio-name="{{ $refugio->nombre }}">
                          @csrf
                          @method('DELETE')
                          <button type="button" class="refugio-btn refugio-btn--delete js-delete-refugio">
                            <i class="fas fa-trash"></i> Eliminar
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>
                @empty
                  <div class="usuarios-card">
                    <p style="text-align:center; font-weight:600; color:#9b6b01;">
                      Aún no hay refugios registrados.
                    </p>
                  </div>
                @endforelse
              </div>
            </div>

            <div class="edit-modal" id="editRefugioModal" aria-hidden="true"
                data-update-url-base="{{ url('/admin/refugios/editar') }}"
                data-image-base="{{ asset('storage') }}">
              <div class="edit-modal-card" role="dialog" aria-modal="true" aria-labelledby="editRefugioTitle">
                <div class="edit-modal-header">
                  <h3 id="editRefugioTitle">Editar refugio</h3>
                  <button type="button" class="edit-modal-close" id="editRefugioClose">&times;</button>
                </div>
                <form id="editRefugioForm" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="edit-modal-grid">
                    <div class="form-group">
                      <label for="edit-refugio-nombre">Nombre</label>
                      <input id="edit-refugio-nombre" name="nombre" type="text" class="form-input" required>
                    </div>
                    <div class="form-group">
                      <label for="edit-refugio-telefono">Teléfono</label>
                      <input id="edit-refugio-telefono" name="telefono" type="text" class="form-input">
                    </div>
                    <div class="form-group full-width">
                      <label for="edit-refugio-direccion">Dirección</label>
                      <input id="edit-refugio-direccion" name="direccion" type="text" class="form-input" required>
                    </div>
                    <div class="form-group">
                      <label for="edit-refugio-email">Email</label>
                      <input id="edit-refugio-email" name="email" type="email" class="form-input">
                    </div>
                    <div class="form-group">
                      <label for="edit-refugio-redes">Redes sociales</label>
                      <input id="edit-refugio-redes" name="redes_sociales" type="text" class="form-input">
                    </div>
                    <div class="form-group full-width">
                      <label for="edit-refugio-descripcion">Descripción</label>
                      <textarea id="edit-refugio-descripcion" name="descripcion" class="form-input" rows="4"></textarea>
                    </div>
                    <div class="form-group full-width">
                      <label>Imagen actual</label>
                      <img id="editRefugioPreview" class="edit-pet-preview" alt="Imagen actual del refugio">
                    </div>
                    <div class="form-group full-width">
                      <label class="file-btn" for="edit-refugio-imagen">
                        <span>Actualizar imagen</span>
                      </label>
                      <input id="edit-refugio-imagen" name="imagen" type="file" accept="image/*" class="file-input">
                      <span class="file-upload-text">Selecciona una nueva imagen si deseas cambiarla</span>
                    </div>
                  </div>
                  <div class="edit-modal-actions">
                    <button type="button" class="btn-secundario" id="editRefugioCancel">Cancelar</button>
                    <button type="submit" class="btn-primario">Guardar cambios</button>
                  </div>
                </form>
              </div>
            </div>

            <div class="confirm-modal" id="deleteRefugioModal" aria-hidden="true">
              <div class="confirm-modal-card" role="dialog" aria-modal="true" aria-labelledby="deleteRefugioTitle">
                <h3 id="deleteRefugioTitle">¿Eliminar refugio?</h3>
                <p id="deleteRefugioText">Esta acción no se puede deshacer.</p>
                <div class="confirm-modal-actions">
                  <button type="button" class="btn-secundario" id="cancelRefugioDelete">Cancelar</button>
                  <button type="button" class="btn-danger" id="confirmRefugioDelete">Eliminar</button>
                </div>
              </div>
            </div>
      </main>
      
      <!-- Footer -->
      <footer class="footer">
        <div class="footer-content">
          <div class="footer-left">
            <div class="footer-logo-section">
<img src="{{ asset('images/logopanitapet.png') }}" alt="PanitasPet Logo" class="footer-logo">

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
<img src="{{ asset('images/icono1.png') }}" class="circle-icon">
              </a>
              <a href="#" class="social-btn" aria-label="Icono 2">
                <img src="{{ asset('images/icono2.png') }}" alt="icono2" class="circle-icon">
              </a>
              <a href="#" class="social-btn" aria-label="Icono 3">
                <img src="{{ asset('images/icono3.png') }}" alt="icono3" class="circle-icon">
              </a>
              <a href="#" class="social-btn" aria-label="Icono 4">
                <img src="{{ asset('images/icono4.png') }}" alt="icono4" class="circle-icon">
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

              <a href="Registro">Registrarse</a>
            </ul>
          </div>

          <div class="footer-contact">
            <h4 class="footer-column-title">Contacto</h4>
            <div class="contact-info">
              <div class="contact-item">
                <img src="{{ asset('images/img_mail.svg') }}" class="contact-icon">
                <div>
                  <div style="font-weight:700;color:#af7700">Email</div>
                  <div class="contact-text">panitapet@gmail.com</div>
                </div>
              </div>

              <div class="contact-item">
                <img src="{{ asset('images/img_call_end.svg') }}" alt="Phone" class="contact-icon">
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
  <script>
            window.authUser = @json([
                'isLogged' => auth()->check(),
                'name' => auth()->user()->nombre ?? null,
            ]);
        </script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const editModal = document.getElementById('editRefugioModal');
      const editForm = document.getElementById('editRefugioForm');
      const editClose = document.getElementById('editRefugioClose');
      const editCancel = document.getElementById('editRefugioCancel');
      const editPreview = document.getElementById('editRefugioPreview');
      const editImageInput = document.getElementById('edit-refugio-imagen');

      function openEditModal(button) {
        if (!editModal || !editForm || !button) return;
        const baseUrl = editModal.getAttribute('data-update-url-base') || '';
        const imageBase = editModal.getAttribute('data-image-base') || '';
        const id = button.getAttribute('data-id');

        editForm.action = `${baseUrl}/${id}`;
        document.getElementById('edit-refugio-nombre').value = button.getAttribute('data-nombre') || '';
        document.getElementById('edit-refugio-direccion').value = button.getAttribute('data-direccion') || '';
        document.getElementById('edit-refugio-telefono').value = button.getAttribute('data-telefono') || '';
        document.getElementById('edit-refugio-email').value = button.getAttribute('data-email') || '';
        document.getElementById('edit-refugio-redes').value = button.getAttribute('data-redes') || '';
        document.getElementById('edit-refugio-descripcion').value = button.getAttribute('data-descripcion') || '';

        const imagen = button.getAttribute('data-imagen');
        if (editPreview) {
          if (imagen) {
            editPreview.src = `${imageBase}/${imagen}`;
            editPreview.style.display = 'block';
          } else {
            editPreview.removeAttribute('src');
            editPreview.style.display = 'none';
          }
        }

        if (editImageInput) editImageInput.value = '';
        editModal.classList.add('is-active');
        editModal.setAttribute('aria-hidden', 'false');
        document.body.classList.add('no-scroll');
      }

      function closeEditModal() {
        if (!editModal) return;
        editModal.classList.remove('is-active');
        editModal.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('no-scroll');
      }

      document.querySelectorAll('.js-edit-refugio').forEach((btn) => {
        btn.addEventListener('click', () => openEditModal(btn));
      });

      if (editClose) editClose.addEventListener('click', closeEditModal);
      if (editCancel) editCancel.addEventListener('click', closeEditModal);
      if (editModal) {
        editModal.addEventListener('click', (e) => {
          if (e.target === editModal) closeEditModal();
        });
      }

      if (editImageInput && editPreview) {
        editImageInput.addEventListener('change', (e) => {
          const file = e.target.files && e.target.files[0];
          if (!file) return;
          const reader = new FileReader();
          reader.onload = (ev) => {
            editPreview.src = ev.target.result;
            editPreview.style.display = 'block';
          };
          reader.readAsDataURL(file);
        });
      }

      const deleteModal = document.getElementById('deleteRefugioModal');
      const deleteCancel = document.getElementById('cancelRefugioDelete');
      const deleteConfirm = document.getElementById('confirmRefugioDelete');
      const deleteText = document.getElementById('deleteRefugioText');
      let pendingForm = null;

      function openDeleteModal(name) {
        if (!deleteModal) return;
        deleteText.textContent = `Vas a eliminar ${name}. Esta acción no se puede deshacer.`;
        deleteModal.classList.add('is-active');
        deleteModal.setAttribute('aria-hidden', 'false');
        document.body.classList.add('no-scroll');
      }

      function closeDeleteModal() {
        if (!deleteModal) return;
        deleteModal.classList.remove('is-active');
        deleteModal.setAttribute('aria-hidden', 'true');
        pendingForm = null;
        document.body.classList.remove('no-scroll');
      }

      document.querySelectorAll('.delete-refugio-form').forEach((form) => {
        const btn = form.querySelector('.js-delete-refugio');
        if (!btn) return;
        btn.addEventListener('click', (e) => {
          e.preventDefault();
          pendingForm = form;
          const name = form.getAttribute('data-refugio-name') || 'este refugio';
          openDeleteModal(name);
        });
      });

      if (deleteConfirm) {
        deleteConfirm.addEventListener('click', () => {
          if (pendingForm) pendingForm.submit();
        });
      }
      if (deleteCancel) deleteCancel.addEventListener('click', closeDeleteModal);
      if (deleteModal) {
        deleteModal.addEventListener('click', (e) => {
          if (e.target === deleteModal) closeDeleteModal();
        });
      }
    });
  </script>
</body>
</html>
