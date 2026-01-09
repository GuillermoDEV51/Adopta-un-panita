@extends('layouts.guest')
@section('main')
      <!-- Main Content -->
      <section class="main-content">
        <!-- Hero Section -->
        <div class="hero-section">
          <h2 class="hero-title">Bienvenido a<br> Panitaspet</h2>
          <div class="cta-container">
            <div class="cta-background"></div>
            <p class="cta-text">Adopta un pana y salva una vida</p>
          </div>
        </div>
        
        <!-- Login Section -->
        <aside class="login-section">
          <div class="login-card">
            <div class="login-header">
              <div class="login-titles">
                <h3 class="login-title">¡Únete a nosotros!</h3>
                <p class="login-subtitle">Coloca tus datos aqui</p>
              </div>
            </div>
            
            <form class="login-form" action="{{ route('login.authenticate') }}" method="POST">
              <input type="text" class="form-input" placeholder="Usuario..." required>
              <input type="password" class="form-input password-input" placeholder="Contraseña..." required>
              
              <div class="form-actions">
                <a href="#" class="forgot-password">¿Olvidaste tu contraseña?</a>
                <button type="submit" class="submit-btn">Iniciar</button>
              </div>
            </form>
          </div>
          
          <div class="register-link">
            ¿Aún no tienes cuenta? 
            <a href="#" class="register-highlight">Registrate</a>
          </div>
        </aside>
      </section>

@endsection