<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Refugios - PanitasPet</title>
    <meta name="description" content="Acceso exclusivo para refugios afiliados a PanitasPet.">
    <meta name="keywords" content="adopción mascotas, refugio animales, acceso refugios, PanitasPet">

    <meta property="og:type" content="website">
    <meta property="og:title" content="Acceso Refugios - PanitasPet">
    <meta property="og:description" content="Acceso exclusivo para refugios afiliados a PanitasPet.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&family=Pacifico&display=swap"
        rel="stylesheet">

    @vite ('resources/css/styles.css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<body>
    <main class="main-container">
        <!-- Background Images -->
        <div class="background-images">
            <img src="{{ asset('images/img_pink_and_yellow_600x502.png') }}" alt="Decorative paw prints"
                class="bg-image-left">
            <img src="{{ asset('images/img_pink_and_yellow_524x464.png') }}" alt="Decorative paw prints"
                class="bg-image-right">
        </div>

        <div class="content-wrapper">
            <!-- Header -->
            <header class="header">
                <div class="header-content">
                    <h1 class="logo">
                        <img src="{{ asset('images/logopanitapet.png') }}" alt="PanitasPet" class="logo-img">
                        <span class="brand-text">
                            <span class="logo-text">PanitasPet</span>
                            <span class="logo-subtitle">Adopción y refugios</span>
                        </span>
                        </a>
                    </h1>
                    <nav class="nav-section">
                        <div class="nav-menu">
                            <a href="{{ route('Inicio') }}" class="nav-item" role="menuitem">Inicio</a>
                            <a href="{{ route('MascotasDisponibles') }}" class="nav-item" role="menuitem">Mascotas</a>
                            <a href="{{ route('RefugiosDisponibles') }}" class="nav-item" role="menuitem">Refugios</a>
                        </div>

                        <div class="menu-lines" aria-hidden="true">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </nav>
                </div>
            </header>

            <!-- Main Content -->
            <section class="main-content">
                <!-- Hero Section -->
                <div class="hero-section">
                    <h2 class="hero-title">Portal de<br> Refugios</h2>
                    <div class="cta-container">
                        <div class="cta-background"></div>
                        <p class="cta-text">Gestiona tus adopciones y ayuda a más panitas.</p>
                    </div>
                </div>

                <!-- Login Section -->
                <aside class="login-section">
                    <div class="login-card">
                        <div class="login-header">
                            <div class="login-titles">
                                <h3 class="login-title">Acceso Refugios</h3>
                                <p class="login-subtitle">Ingresa tus credenciales</p>
                            </div>
                        </div>

                        <form class="login-form" action="{{ route('login.authenticate') }}" method="POST">
                            @csrf

                            <input type="text" name="nombre" class="form-input"
                                placeholder="Usuario del responsable..." value="{{ old('nombre') }}" required
                                autocomplete="username">

                            <input type="password" name="password" class="form-input password-input"
                                placeholder="Contraseña..." required autocomplete="current-password">

                            <div class="form-actions">
                                <a href="#" class="forgot-password">¿Olvidaste tu contraseña?</a>
                                <button type="submit" class="submit-btn"
                                    style="background-color: #ff8c00;">Entrar</button>
                            </div>
                        </form>

                        @if ($errors->any())
                            <div class="error-messages">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>

                        @endif
                    </div>

                </aside>
            </section>

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
                            Venezuela.</p>
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
                        </ul>
                    </div>

                    <div class="footer-contact">
                        <h4 class="footer-column-title">Contacto</h4>
                        <div class="contact-info">
                            <div class="contact-item">
                                <img src="{{ asset('images/img_mail.svg') }}" alt="Email" class="contact-icon">
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
    @vite(['resources/js/menu.js'])
</body>

</html>
