// resources/js/menu.js
document.addEventListener('DOMContentLoaded', function() {
    const menuLines = document.querySelector('.menu-lines');
    
    // Si no existe el botón hamburguesa, salir
    if (!menuLines) {
        console.log('⚠️ No hay menú hamburguesa en esta página');
        return;
    }
    
    // Si ya existe el mega-menu, no crear otro
    if (document.querySelector('.mega-menu')) {
        console.log('✅ Menú ya existe');
        return;
    }
    
    // Crear overlay
    const overlay = document.createElement('div');
    overlay.className = 'mega-menu-overlay';
    
    // Crear menú
    const megaMenu = document.createElement('div');
    megaMenu.className = 'mega-menu';
    megaMenu.innerHTML = `
        <button class="mega-menu-close">&times;</button>
        <div class="mega-menu-container">
            <div class="mega-menu-header">
                <img src="/images/logopanitapet.png" alt="PanitasPet" class="mega-logo-img">
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
                    <a href="/PublicarMascota" class="mega-menu-item">
                        <i class="fas fa-plus-circle"></i>
                        <span>Publicar un Panita</span>
                    </a>
                </div>
            </div>
            
            <div class="mega-menu-divider"></div>
            
            <div class="mega-menu-section">
                <h4 class="mega-menu-section-title">Información</h4>
                <div class="mega-menu-items">
                    <a href="/FAQ" class="mega-menu-item">
                        <i class="fas fa-question-circle"></i>
                        <span>Preguntas Frecuentes</span>
                    </a>
                    <a href="/Donativos" class="mega-menu-item">
                        <i class="fas fa-hand-holding-heart"></i>
                        <span>Donaciones</span>
                    </a>
                </div>
            </div>
            
            <div class="mega-menu-divider"></div>
            
            <a href="/login" class="mega-menu-login">
                <i class="fas fa-sign-in-alt"></i>
                <span>Iniciar sesión</span>
            </a>
        </div>
    `;
    
    // Añadir al DOM
    document.body.appendChild(overlay);
    document.body.appendChild(megaMenu);
    
    // Variables de estado
    let isMenuOpen = false;
    const closeBtn = megaMenu.querySelector('.mega-menu-close');
    
    // Funciones
    function openMegaMenu() {
        megaMenu.classList.add('active');
        overlay.style.display = 'block';
        menuLines.classList.add('active');
        isMenuOpen = true;
        document.body.style.overflow = 'hidden';
    }
    
    function closeMegaMenu() {
        megaMenu.classList.remove('active');
        overlay.style.display = 'none';
        menuLines.classList.remove('active');
        isMenuOpen = false;
        document.body.style.overflow = '';
    }
    
    function toggleMegaMenu() {
        isMenuOpen ? closeMegaMenu() : openMegaMenu();
    }
    
    // Event Listeners
    menuLines.addEventListener('click', toggleMegaMenu);
    overlay.addEventListener('click', closeMegaMenu);
    closeBtn.addEventListener('click', closeMegaMenu);
    
    // Cerrar con Escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && isMenuOpen) closeMegaMenu();
    });
    
    console.log('✅ Menú configurado');
});