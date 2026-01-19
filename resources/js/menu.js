document.addEventListener('DOMContentLoaded', function() {
    const menuLines = document.querySelector('.menu-lines');
    
    // Crear overlay
    const overlay = document.createElement('div');
    overlay.className = 'mega-menu-overlay';
    
    // Crear menú compacto estilo Zobasis
    const megaMenu = document.createElement('div');
    megaMenu.className = 'mega-menu';
    megaMenu.innerHTML = `
        <button class="mega-menu-close">&times;</button>
        <div class="mega-menu-container">
            <!-- Logo y título -->
            <div class="mega-menu-header">
                <img src="images/logopanitapet.png" alt="PanitasPet" class="mega-logo-img">
                <div class="mega-menu-brand">
                    <h3 class="mega-menu-brand-title">PanitasPet</h3>
                    <p class="mega-menu-brand-subtitle">Adopción y refugios</p>
                </div>
            </div>
            
            <!-- Primera sección -->
            <div class="mega-menu-section">
                <h4 class="mega-menu-section-title">Mascotas</h4>
                <div class="mega-menu-items">
                    <a href="#" class="mega-menu-item">
                        <i class="fas fa-search"></i>
                        <span>Ver mascotas</span>
                    </a>
                    <a href="#" class="mega-menu-item">
                        <i class="fas fa-list-alt"></i>
                        <span>Publicaciones</span>
                    </a>
                </div>
            </div>
            
            <div class="mega-menu-divider"></div>
            
            <!-- Segunda sección -->
            <div class="mega-menu-section">
                <h4 class="mega-menu-section-title">Información</h4>
                <div class="mega-menu-items">
                    <a href="#" class="mega-menu-item">
                        <i class="fas fa-question-circle"></i>
                        <span>Preguntas Frecuentes</span>
                    </a>
                    <a href="#" class="mega-menu-item">
                        <i class="fas fa-hand-holding-heart"></i>
                        <span>Donaciones</span>
                    </a>
                    <a href="#" class="mega-menu-item">
                        <i class="fas fa-hands-helping"></i>
                        <span>Voluntariado</span>
                    </a>
                    <a href="#" class="mega-menu-item">
                        <i class="fas fa-home"></i>
                        <span>Refugios Disponibles</span>
                    </a>
                </div>
            </div>
            
            <div class="mega-menu-divider"></div>
            
            <!-- Botón de login -->
            <button class="mega-menu-login">
                <i class="fas fa-sign-in-alt"></i>
                <span>Iniciar sesión</span>
            </button>
        </div>
    `;
    
    document.body.appendChild(overlay);
    document.body.appendChild(megaMenu);
    
    let isMenuOpen = false;
    const closeBtn = megaMenu.querySelector('.mega-menu-close');
    
    // Abrir menú
    function openMegaMenu() {
        megaMenu.classList.add('active');
        overlay.style.display = 'block';
        menuLines.classList.add('active');
        isMenuOpen = true;
        document.body.style.overflow = 'hidden';
    }
    
    // Cerrar menú
    function closeMegaMenu() {
        megaMenu.classList.remove('active');
        overlay.style.display = 'none';
        menuLines.classList.remove('active');
        isMenuOpen = false;
        document.body.style.overflow = '';
    }
    
    // Toggle menú
    function toggleMegaMenu() {
        if (isMenuOpen) {
            closeMegaMenu();
        } else {
            openMegaMenu();
        }
    }
    
    // Configurar botón hamburguesa
    menuLines.style.cursor = 'pointer';
    menuLines.setAttribute('role', 'button');
    menuLines.setAttribute('tabindex', '0');
    
    // Eventos
    menuLines.addEventListener('click', function(e) {
        e.stopPropagation();
        toggleMegaMenu();
    });
    
    menuLines.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            toggleMegaMenu();
        }
    });
    
    overlay.addEventListener('click', closeMegaMenu);
    closeBtn.addEventListener('click', closeMegaMenu);
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && isMenuOpen) {
            closeMegaMenu();
        }
    });
    
    // Cerrar al hacer clic en enlaces
    megaMenu.addEventListener('click', function(e) {
        if (e.target.closest('a') || e.target.classList.contains('mega-menu-login')) {
            closeMegaMenu();
        }
    });
    
    console.log('✅ Menú hamburguesa configurado - Estilo Zobasis compacto');
});