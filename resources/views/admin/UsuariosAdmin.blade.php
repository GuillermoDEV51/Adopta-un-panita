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
                <!-- Mostrar información del usuario autenticado -->


                                    <a href="{{ route('Dashboard') }}" class="login-btn">{{ auth()->user()->nombre }}
                                        {{ auth()->user()->apellido }}</a>
                                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                        @csrf

                                    </form>
                                @else
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
              <div class="menu-item">
                <i class="fas fa-home"></i>
                <a href="{{ route('RefugiosAdmin') }}" style="color:inherit; text-decoration:none;">Refugios</a>
              </div>
              <div class="menu-item active">
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
                <h1 class="paginas-title">Usuarios Registrados</h1>
                <div class="titulo-line" aria-hidden="true"></div>
              </div>
              <div class="boton-agregar-wrapper">
                <a href="{{ route('GuardarUsuario') }}" class="boton-agregar">Agregar Usuario</a>
              </div>
            </div>

            <div class="usuarios-card">
              <div class="usuarios-table-wrap">
                <table class="usuarios-table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>Fecha de Registro</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($usuarios as $usuario)
                  <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->nombre }}</td>
                    <td>{{ $usuario->role->name ?? 'Sin rol' }}</td>
                    
                    <td>{{ $usuario->created_at->format('d/m/Y') }}</td>
                    <td>
                      <a href="{{ route('EditarUsuario', $usuario->id) }}" class="editar-btn">Editar</a>
                      <form action="{{ route('EliminarUsuario', $usuario->id) }}" method="POST" class="delete-user-form" data-user-name="{{ $usuario->nombre }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="eliminar-btn js-delete-open">Eliminar</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                </table>
              </div>
              </div>
            </div>
            <div class="confirm-modal" id="deleteConfirmModal" aria-hidden="true">
              <div class="confirm-modal-card" role="dialog" aria-modal="true" aria-labelledby="deleteModalTitle">
                <h3 id="deleteModalTitle">¿Eliminar usuario?</h3>
                <p id="deleteModalText">Esta acción no se puede deshacer.</p>
                <div class="confirm-modal-actions">
                  <button type="button" class="btn-secundario" id="cancelDelete">Cancelar</button>
                  <button type="button" class="btn-danger" id="confirmDelete">Eliminar</button>
                </div>
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
                            <a href="Voluntariado">Voluntariado</a>
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
            </footer>
        </div>
        </main>

</body>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const modal = document.getElementById('deleteConfirmModal');
  const cancelBtn = document.getElementById('cancelDelete');
  const confirmBtn = document.getElementById('confirmDelete');
  const modalText = document.getElementById('deleteModalText');
  let pendingForm = null;

  function openModal(name) {
    modalText.textContent = `Vas a eliminar a ${name}. Esta acción no se puede deshacer.`;
    modal.classList.add('is-active');
    modal.setAttribute('aria-hidden', 'false');
  }

  function closeModal() {
    modal.classList.remove('is-active');
    modal.setAttribute('aria-hidden', 'true');
    pendingForm = null;
  }

  document.querySelectorAll('.delete-user-form').forEach((form) => {
    const btn = form.querySelector('.js-delete-open');
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      pendingForm = form;
      const name = form.getAttribute('data-user-name') || 'este usuario';
      openModal(name);
    });
  });

  confirmBtn.addEventListener('click', () => {
    if (pendingForm) pendingForm.submit();
  });

  cancelBtn.addEventListener('click', closeModal);
  modal.addEventListener('click', (e) => {
    if (e.target === modal) closeModal();
  });
});
</script>
</html>
