<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - PanitasPet | Adopción y Refugios de Mascotas</title>
    <meta name="description"
        content="Dashboard de PanitasPet para gestionar adopciones y refugios. Plataforma confiable para encontrar tu compañero perfecto y apoyar refugios locales.">
    <meta name="keywords"
        content="adopción mascotas, refugios animales, dashboard, PanitasPet, gestionar mascotas, voluntarios">

    <meta property="og:type" content="website">
    <meta property="og:title" content="Inicio - PanitasPet | Adopción y Refugios de Mascotas">
    <meta property="og:description"
        content="Dashboard de PanitasPet para gestionar adopciones y refugios. Plataforma confiable para encontrar tu compañero perfecto.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&family=Pacifico&display=swap"
        rel="stylesheet">

    @vite(['resources/css/stylessadmin.css'])
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
            <div class="main-content">
              <div class="paginas-section">
                <div class="titulo-wrapper">
                  <h1 class="paginas-title">Tus Mascotas Publicadas</h1>
                  <div class="titulo-line" aria-hidden="true"></div>
                </div>
              </div>

              <div class="usuarios-card" style="margin-bottom:16px;">
                <div style="display:flex; justify-content:space-between; align-items:center; gap:12px; flex-wrap:wrap;">
                  <div style="font-weight:700; color:#9b6b01;">
                    Total: {{ $totalMascotas }} mascota(s)
                  </div>
                  <div style="display:flex; gap:8px; align-items:center;">
                    <button type="button" id="ordenToggle" class="btn-primario" data-order="{{ $orden }}">
                      {{ $orden === 'asc' ? 'Más antiguas' : 'Más recientes' }}
                    </button>
                  </div>
                </div>
              </div>

              <div class="admin-pets-grid">
                @forelse ($mascotas as $mascota)
                  <div class="admin-pet-card"
                      data-id="{{ $mascota->id }}"
                      data-created="{{ $mascota->created_at }}"
                      data-nombre="{{ $mascota->nombre }}"
                      data-edad="{{ $mascota->edad }}"
                      data-id-especies="{{ $mascota->id_especies }}"
                      data-raza="{{ $mascota->raza ?? '' }}"
                      data-genero="{{ $mascota->genero }}"
                      data-peso="{{ $mascota->peso ?? '' }}"
                      data-descripcion="{{ $mascota->descripcion ?? '' }}"
                      data-vacunado="{{ $mascota->vacunado ? 1 : 0 }}"
                      data-esterilizado="{{ $mascota->esterilizado ? 1 : 0 }}"
                      data-ubicacion="{{ $mascota->ubicacion ?? '' }}"
                      data-tamano="{{ $mascota->tamano ?? '' }}"
                      data-foto="{{ $mascota->foto ?? '' }}">
                    <img src="{{ asset('storage/mascotas/' . $mascota->foto) }}"
                        alt="Foto de {{ $mascota->nombre }}" class="mascota-foto">
                    <div class="mascota-info">
                      <h3 class="mascota-nombre">{{ $mascota->nombre }}</h3>
                      <p class="mascota-detalle"><strong>Edad:</strong> {{ $mascota->edad }} Años</p>
                      <p class="mascota-detalle"><strong>Tipo:</strong>
                        @if ($mascota->especie && $mascota->especie->nombre)
                          {{ $mascota->especie->nombre }}
                        @else
                          Sin especie
                        @endif
                      </p>
                      <p class="mascota-detalle"><strong>Raza:</strong>
                        {{ $mascota->raza ?? 'Desconocida' }}</p>
                      <p class="mascota-detalle"><strong>Sexo:</strong> {{ $mascota->genero }}</p>
                      <p class="mascota-detalle"><strong>Estado:</strong>
                        {{ $mascota->estado ?? 'Desconocido' }}</p>
                      <div class="admin-pet-actions">
                        <button type="button" class="editar-mascota-btn js-edit-pet-open">Editar</button>
                        <form action="{{ route('EliminarAnimal', ['id' => $mascota->id]) }}"
                            method="POST" class="eliminar-mascota-form delete-pet-form"
                            data-pet-name="{{ $mascota->nombre }}">
                          @csrf
                          @method('DELETE')
                          <button type="button" class="eliminar-mascota-btn js-delete-pet-open">Eliminar</button>
                        </form>
                      </div>
                    </div>
                  </div>
                @empty
                  <div class="usuarios-card">
                    <p style="text-align:center; font-weight:600; color:#9b6b01;">
                      Aún no tienes mascotas publicadas.
                    </p>
                  </div>
                @endforelse
              </div>
            </div>
      </main>

      <div class="confirm-modal" id="deletePetConfirmModal" aria-hidden="true">
        <div class="confirm-modal-card" role="dialog" aria-modal="true" aria-labelledby="deletePetModalTitle">
          <h3 id="deletePetModalTitle">Â¿Eliminar mascota?</h3>
          <p id="deletePetModalText">Esta acciÃ³n no se puede deshacer.</p>
          <div class="confirm-modal-actions">
            <button type="button" class="btn-secundario" id="cancelPetDelete">Cancelar</button>
            <button type="button" class="btn-danger" id="confirmPetDelete">Eliminar</button>
          </div>
        </div>
      </div>
      
      <div class="edit-modal" id="editPetModal" aria-hidden="true"
          data-update-url-base="{{ url('/Publicaciones') }}"
          data-image-base="{{ asset('storage/mascotas') }}">
        <div class="edit-modal-card" role="dialog" aria-modal="true" aria-labelledby="editPetModalTitle">
          <div class="edit-modal-header">
            <h3 id="editPetModalTitle">Editar mascota</h3>
            <button type="button" class="edit-modal-close" id="editPetModalClose">&times;</button>
          </div>
          <form id="editPetForm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="edit-modal-grid">
              <div class="form-group">
                <label for="edit-nombre">Nombre</label>
                <input id="edit-nombre" name="nombre" type="text" class="form-input" required>
              </div>
              <div class="form-group">
                <label for="edit-edad">Edad (años)</label>
                <input id="edit-edad" name="edad" type="number" min="0" class="form-input" required>
              </div>
              <div class="form-group">
                <label for="edit-id-especies">Especie</label>
                <select id="edit-id-especies" name="id_especies" class="form-input" required>
                  @foreach ($especies as $especie)
                    <option value="{{ $especie->id }}">{{ $especie->nombre }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="edit-raza">Raza</label>
                <select id="edit-raza" name="raza" class="form-input">
                  <option value="">Seleccione</option>
                </select>
              </div>
              <div class="form-group">
                <label for="edit-genero">Sexo</label>
                <select id="edit-genero" name="genero" class="form-input" required>
                  <option value="Macho">Macho</option>
                  <option value="Hembra">Hembra</option>
                </select>
              </div>
              <div class="form-group">
                <label for="edit-peso">Peso (Lb)</label>
                <input id="edit-peso" name="peso" type="number" step="0.1" min="0" class="form-input">
              </div>
              <div class="form-group">
                <label for="edit-ubicacion">Ubicación</label>
                <select id="edit-ubicacion" name="ubicacion" class="form-input">
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
              <div class="form-group">
                <label for="edit-tamano">Tamaño</label>
                <select id="edit-tamano" name="tamano" class="form-input" required>
                  <option value="PequeÃƒÂ±o">Pequeño</option>
                  <option value="Mediano">Mediano</option>
                  <option value="Grande">Grande</option>
                </select>
              </div>
              <div class="form-group">
                <label for="edit-vacunado">Vacunado</label>
                <select id="edit-vacunado" name="vacunado" class="form-input" required>
                  <option value="1">Si</option>
                  <option value="0">No</option>
                </select>
              </div>
              <div class="form-group">
                <label for="edit-esterilizado">Esterilizado</label>
                <select id="edit-esterilizado" name="esterilizado" class="form-input" required>
                  <option value="1">Si</option>
                  <option value="0">No</option>
                </select>
              </div>
              <div class="form-group full-width">
                <label for="edit-descripcion">Descripciónn</label>
                <textarea id="edit-descripcion" name="descripcion" class="form-input" rows="4"></textarea>
              </div>
              <div class="form-group full-width">
                <label>Foto actual</label>
                <img id="editPetPreview" class="edit-pet-preview" alt="Foto actual de la mascota">
              </div>
              <div class="form-group full-width">
                <label class="file-btn" for="edit-foto">
                  <span>Elegir foto</span>
                </label>
                <input id="edit-foto" name="foto" type="file" accept="image/*" class="file-input">
                <span class="file-upload-text">Actualiza la foto si lo necesitas</span>
              </div>
              <div class="form-group full-width">
                <label class="file-btn" for="edit-documentacion">
                  <span>Subir documentación</span>
                </label>
                <input id="edit-documentacion" name="documentacion[]" type="file" class="file-input" multiple>
                <span class="file-upload-text">Puedes agregar varios archivos</span>
              </div>
            </div>
            <div class="edit-modal-actions">
              <button type="button" class="btn-secundario" id="editPetCancel">Cancelar</button>
              <button type="submit" class="btn-primario">Guardar cambios</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Footer -->
            <footer class="footer">
                <div class="footer-content">
                    <div class="footer-left">
                        <div class="footer-logo-section">
                            <img src="{{ asset('images/logopanitapet.png') }}" alt="PanitasPet Logo"
                                class="footer-logo">

                            <span class="brand-text">
                                <span class="footer-brand">PanitasPet</span>
                                <span class="logo-subtitle">Adopción y refugios</span>
                            </span>
                        </div>

                        <p class="description">Plataforma digital dedicada a la ayuda y adopción de mascotas en
                            Venezuela. Conectamos animales que necesitan un hogar con adoptantes responsables para
                            combatir el abandono y la sobrepoblación.</p>

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
              
                                                        @guest
                                <a href="Registro">Registrarse</a>
                            @endguest
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
                                <img src="{{ asset('images/img_call_end.svg') }}" alt="Phone"
                                    class="contact-icon">
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
                </div>
            </footer>
    </div>
  </main>
  @vite(['resources/js/menu.js'])
  <script>
window.authUser = @json([
    'isLogged' => auth()->check(),
    'name' => auth()->user()->nombre ?? null,
]);
</script>
</body>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const orderToggle = document.getElementById('ordenToggle');
  const grid = document.querySelector('.admin-pets-grid');

  function getCreatedValue(card) {
    const raw = card.getAttribute('data-created');
    if (!raw) return 0;
    const time = Date.parse(raw);
    return Number.isNaN(time) ? 0 : time;
  }

  function sortCards(order) {
    if (!grid) return;
    const cards = Array.from(grid.querySelectorAll('.admin-pet-card'));
    cards.sort((a, b) => {
      const aVal = getCreatedValue(a);
      const bVal = getCreatedValue(b);
      return order === 'asc' ? aVal - bVal : bVal - aVal;
    });
    cards.forEach((card) => grid.appendChild(card));
  }

  if (orderToggle) {
    const initialOrder = orderToggle.getAttribute('data-order') === 'asc' ? 'asc' : 'desc';
    sortCards(initialOrder);
    orderToggle.textContent = initialOrder === 'asc' ? 'Más antiguas' : 'Más recientes';

    orderToggle.addEventListener('click', () => {
      const current = orderToggle.getAttribute('data-order') === 'asc' ? 'asc' : 'desc';
      const next = current === 'asc' ? 'desc' : 'asc';
      orderToggle.setAttribute('data-order', next);
      orderToggle.textContent = next === 'asc' ? 'Más antiguas' : 'Más recientes';
      sortCards(next);
    });
  }

  const deleteModal = document.getElementById('deletePetConfirmModal');
  const cancelBtn = document.getElementById('cancelPetDelete');
  const confirmBtn = document.getElementById('confirmPetDelete');
  const modalText = document.getElementById('deletePetModalText');
  let pendingForm = null;

  function openDeleteModal(name) {
    if (!deleteModal) return;
    modalText.textContent = `Vas a eliminar a ${name}. Esta acciÃ³n no se puede deshacer.`;
    deleteModal.classList.add('is-active');
    deleteModal.setAttribute('aria-hidden', 'false');
  }

  function closeDeleteModal() {
    if (!deleteModal) return;
    deleteModal.classList.remove('is-active');
    deleteModal.setAttribute('aria-hidden', 'true');
    pendingForm = null;
  }

  document.querySelectorAll('.delete-pet-form').forEach((form) => {
    const btn = form.querySelector('.js-delete-pet-open');
    if (!btn) return;
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      pendingForm = form;
      const name = form.getAttribute('data-pet-name') || 'esta mascota';
      openDeleteModal(name);
    });
  });

  if (confirmBtn) {
    confirmBtn.addEventListener('click', () => {
      if (pendingForm) pendingForm.submit();
    });
  }

  if (cancelBtn) cancelBtn.addEventListener('click', closeDeleteModal);
  if (deleteModal) {
    deleteModal.addEventListener('click', (e) => {
      if (e.target === deleteModal) closeDeleteModal();
    });
  }

  const razas = {
    1: [
      "Labrador",
      "Golden Retriever",
      "Pastor Alemán",
      "Pug",
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
      "Bengala­",
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

  function cargarRazas(especie, selected) {
    const razaSelect = document.getElementById('edit-raza');
    if (!razaSelect) return;
    razaSelect.innerHTML = '<option value="">Seleccione</option>';
    const list = razas[especie];
    if (!list) return;
    list.forEach((raza) => {
      const option = document.createElement('option');
      option.value = raza;
      option.textContent = raza;
      if (selected && selected === raza) {
        option.selected = true;
      }
      razaSelect.appendChild(option);
    });
  }

  const editModal = document.getElementById('editPetModal');
  const editForm = document.getElementById('editPetForm');
  const editClose = document.getElementById('editPetModalClose');
  const editCancel = document.getElementById('editPetCancel');
  const editPreview = document.getElementById('editPetPreview');
  const editFotoInput = document.getElementById('edit-foto');
  const editEspecieSelect = document.getElementById('edit-id-especies');

  function openEditModal(card) {
    if (!editModal || !editForm || !card) return;

    const baseUrl = editModal.getAttribute('data-update-url-base') || '';
    const imageBase = editModal.getAttribute('data-image-base') || '';
    const id = card.getAttribute('data-id');

    editForm.action = `${baseUrl}/${id}`;
    document.getElementById('edit-nombre').value = card.getAttribute('data-nombre') || '';
    document.getElementById('edit-edad').value = card.getAttribute('data-edad') || 0;
    const especieValue = card.getAttribute('data-id-especies') || '';
    const razaValue = card.getAttribute('data-raza') || '';
    document.getElementById('edit-id-especies').value = especieValue;
    cargarRazas(especieValue, razaValue);
    document.getElementById('edit-raza').value = card.getAttribute('data-raza') || '';
    document.getElementById('edit-genero').value = card.getAttribute('data-genero') || 'Macho';
    document.getElementById('edit-peso').value = card.getAttribute('data-peso') || '';
    document.getElementById('edit-ubicacion').value = card.getAttribute('data-ubicacion') || '';
    document.getElementById('edit-tamano').value = card.getAttribute('data-tamano') || 'Mediano';
    document.getElementById('edit-vacunado').value = card.getAttribute('data-vacunado') || '0';
    document.getElementById('edit-esterilizado').value = card.getAttribute('data-esterilizado') || '0';
    document.getElementById('edit-descripcion').value = card.getAttribute('data-descripcion') || '';

    const foto = card.getAttribute('data-foto');
    if (editPreview) {
      if (foto) {
        editPreview.src = `${imageBase}/${foto}`;
        editPreview.style.display = 'block';
      } else {
        editPreview.removeAttribute('src');
        editPreview.style.display = 'none';
      }
    }

    if (editFotoInput) editFotoInput.value = '';
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

  document.querySelectorAll('.js-edit-pet-open').forEach((btn) => {
    btn.addEventListener('click', () => {
      const card = btn.closest('.admin-pet-card');
      openEditModal(card);
    });
  });

  if (editEspecieSelect) {
    editEspecieSelect.addEventListener('change', (e) => {
      cargarRazas(e.target.value, '');
    });
  }

  if (editClose) editClose.addEventListener('click', closeEditModal);
  if (editCancel) editCancel.addEventListener('click', closeEditModal);
  if (editModal) {
    editModal.addEventListener('click', (e) => {
      if (e.target === editModal) closeEditModal();
    });
  }

  if (editFotoInput && editPreview) {
    editFotoInput.addEventListener('change', (e) => {
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
});
</script>
</html>


