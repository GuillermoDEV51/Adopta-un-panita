@extends('layouts.guest')


@section('background')
  <div class="background-images">
    <img src="{{ asset('images/img_pink_and_yellow2.png') }}" alt="Decorative pet background" class="bg-image-1">
    <img src="{{ asset('images/img_pink_and_yellow_284x432.png') }}" alt="Decorative pet background" class="bg-image-2">
    <img src="{{ asset('images/img_orange_and_brown.png') }}" alt="Decorative pet background" class="bg-image-3">
  </div>
@endsection

@section('main')
  <div class="content-wrapper3">
    <!-- Registration Form -->
    <main class="registration-container2">
      <div class="form-content2">
        <div class="form-header2">
          <h1 class="form-title2">Registrate ahora en simples pasos</h1>
          <p class="form-subtitle2">Completa todas las casillas</p>
        </div>
        <form class="form-fields" method="POST" action="{{ route('register') }}">
          <div class="form-row">
            <div class="form-group2">
              <input type="text" class="form-input" placeholder="Nombre" required>
            </div>
            <div class="form-group2">
              <input type="text" class="form-input" placeholder="Apellido" required>
            </div>
          </div>
          
          <div class="form-group2">
            <label class="form-label">Fecha de nacimiento</label>
            <div class="date-row">
              <input type="text" class="form-input" placeholder="Día" required>
              <input type="text" class="form-input" placeholder="Mes" required>
              <input type="text" class="form-input" placeholder="Año" required>
            </div>
          </div>
          
          <div class="form-group2">
            <input type="tel" class="form-input" placeholder="Número de teléfono" required>
          </div>
          
          <div class="form-group2">
            <input type="text" class="form-input" placeholder="Ubicación" required>
          </div>
          
          <div class="form-group2">
            <input type="text" class="form-input" placeholder="Cédula" required>
          </div>
          
          <div class="form-group2">
            <input type="password" class="form-input" placeholder="Contraseña" required>
          </div>
          
          <div class="form-group2">
            <input type="password" class="form-input" placeholder="Confirmar contraseña" required>
          </div>
          
          <button type="submit" class="register-btn">Registrarse</button>
        </form>
      </div>
    </main>
  </div>
@endsection