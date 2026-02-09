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
        <div class="mega-menu-divider"></div>
        <a href="/login-refugio" class="mega-menu-item">
            <i class="fas fa-user-plus"></i>
            <span>Iniciar Sesión Refugio</span>
        </a>
      `;

    const publicacionesHref = window.authUser && window.authUser.isLogged
        ? '/Publicaciones'
        : '/login';

    const assetsBase = (window.ASSETS_URL || '/').replace(/\/?$/, '/');

    // HTML del menú
    megaMenu.innerHTML = `
        <button class="mega-menu-close">&times;</button>
        <div class="mega-menu-container">

            <div class="mega-menu-header">
                <img src="${assetsBase}images/logopanitapet.png" alt="PanitasPet" class="mega-logo-img">
                <div class="mega-menu-brand">
                    <h3 class="mega-menu-brand-title">PanitasPet</h3>
                    <p class="mega-menu-brand-subtitle">Adopción y refugios</p>
                </div>
            </div>

            <div class="mega-menu-section">
                <h4 class="mega-menu-section-title">Mascotas</h4>
                <div class="mega-menu-items">
                    <a href="/MascotasDisponibles" class="mega-menu-item">
                        <i class="fas fa-search"></i>
                        <span>Ver mascotas</span>
                    </a>
                    <a href="${publicacionesHref}" class="mega-menu-item">
                        <i class="fas fa-list-alt"></i>
                        <span>Publicaciones</span>
                    </a>
                </div>
            </div>

            <div class="mega-menu-divider"></div>

            <div class="mega-menu-section">
                <h4 class="mega-menu-section-title">Información</h4>
                <div class="mega-menu-items">
                
                    <a href="/Donativos" class="mega-menu-item">
                        <i class="fas fa-hand-holding-heart"></i>
                        <span>Donaciones</span>
                    </a>
                    <a href="/RefugiosDisponibles" class="mega-menu-item">
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

    // Force logout redirect to /login to avoid landing on /logout in nested routes
    const logoutForm = megaMenu.querySelector('.mega-menu-form');
    if (logoutForm) {
        logoutForm.addEventListener('submit', (e) => {
            e.preventDefault();
            fetch('/logout', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin'
            }).finally(() => {
                window.location.href = '/login';
            });
        });
    }

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
