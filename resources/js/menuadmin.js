document.addEventListener('DOMContentLoaded', function () {

    const menuLines = document.querySelector('.menu-lines');
    if (!menuLines) return;

    // CSRF
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '';

    // Overlay
    const overlay = document.createElement('div');
    overlay.className = 'mega-menu-overlay';

    // Mega menu
    const megaMenu = document.createElement('div');
    megaMenu.className = 'mega-menu';

    // 🔐 Sección auth (AQUÍ va la lógica)
const authSection = window.authUser && window.authUser.isLogged
    ? `
        <div class="mega-menu-divider"></div>
        <form method="POST" action="/logout" class="mega-menu-form">
            <input type="hidden" name="_token" value="${csrfToken}">
            <button type="submit" class="mega-menu-item">
                <i class="fas fa-sign-out-alt"></i>
                <span>Cerrar sesión</span>
            </button>
        </form>
      `
    : `
        <div class="mega-menu-divider"></div>
        <a href="/register" class="mega-menu-item">
            <i class="fas fa-user-plus"></i>
            <span>Registrarse</span>
        </a>
      `;

    // HTML del menú
    megaMenu.innerHTML = `
        <button class="mega-menu-close">&times;</button>
        <div class="mega-menu-container">

            <div class="mega-menu-header">
                <img src="${window.ASSETS_URL}images/logopanitapet.png" alt="PanitasPet" class="mega-logo-img">

                <div class="mega-menu-brand">
                    <h3 class="mega-menu-brand-title">PanitasPet</h3>
                    <p class="mega-menu-brand-subtitle">Adopción y refugios</p>
                </div>
            </div>

            <div class="mega-menu-section">
                <h4 class="mega-menu-section-title">Mascotas</h4>
                <div class="mega-menu-items">
                    <a href="MascotasDisponibles" class="mega-menu-item">
                        <i class="fas fa-search"></i>
                        <span>Ver mascotas</span>
                    </a>
                    <a href="Publicaciones" class="mega-menu-item">
                        <i class="fas fa-list-alt"></i>
                        <span>Publicaciones</span>
                    </a>
                </div>
            </div>

            <div class="mega-menu-divider"></div>

            <div class="mega-menu-section">
                <h4 class="mega-menu-section-title">Información</h4>
                <div class="mega-menu-items">
                    <a href="PreguntasFrecuentes" class="mega-menu-item">
                        <i class="fas fa-question-circle"></i>
                        <span>Preguntas Frecuentes</span>
                    </a>
                    <a href="Donativos" class="mega-menu-item">
                        <i class="fas fa-hand-holding-heart"></i>
                        <span>Donaciones</span>
                    </a>
                    <a href="RefugiosDisponibles" class="mega-menu-item">
                        <i class="fas fa-home"></i>
                        <span>Refugios Disponibles</span>
                    </a>
                </div>
            </div>

            ${authSection}

        </div>
    `;

    document.body.appendChild(overlay);
    document.body.appendChild(megaMenu);

    let isMenuOpen = false;
    const closeBtn = megaMenu.querySelector('.mega-menu-close');

    function openMegaMenu() {
        megaMenu.classList.add('active');
        overlay.style.display = 'block';
        menuLines.classList.add('active');
        document.body.style.overflow = 'hidden';
        isMenuOpen = true;
    }

    function closeMegaMenu() {
        megaMenu.classList.remove('active');
        overlay.style.display = 'none';
        menuLines.classList.remove('active');
        document.body.style.overflow = '';
        isMenuOpen = false;
    }

    menuLines.addEventListener('click', (e) => {
        e.stopPropagation();
        isMenuOpen ? closeMegaMenu() : openMegaMenu();
    });

    overlay.addEventListener('click', closeMegaMenu);
    closeBtn.addEventListener('click', closeMegaMenu);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && isMenuOpen) closeMegaMenu();
    });

    console.log('✅ Mega menú con auth cargado correctamente');
});
const openBtn = document.getElementById('openAddUser');
const modal = document.getElementById('addUserModal');
const closeBtn = document.getElementById('closeAddUser');

openBtn?.addEventListener('click', () => modal.classList.add('active'));
closeBtn?.addEventListener('click', () => modal.classList.remove('active'));
