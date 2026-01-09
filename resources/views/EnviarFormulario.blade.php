@extends ('layouts.guest')

@section('main')

  <section>
    <div class="main-content5">
      <h1 class="dollar-title-pacifico">Formulario de adopción</h1>
      <div class="registration-container5">
        <div class="form-heade5">
          <p class="description-text2">Los datos del formulario deberán ser<br>completados por la persona que será el<br>titular responsable del pana</p>
        </div>

        <div class="form-group5">
          <label class="form-label5">¿Por qué quieres adoptar?</label>
          <input type="text" class="form-input5" placeholder="Escriba su respuesta..." required>
        </div>

        <div class="form-group5">
          <label class="form-label5">Tipo de vivienda</label>
          <select class="form-input5" required>
            <option value="" disabled selected>Seleccione su respuesta...</option>
            <option value="casa">Casa</option>
            <option value="departamento">Apartamento</option>
            <option value="duplex">Cerro</option>
            <option value="otro">Otro</option>
          </select>
        </div>

        <div class="form-group5">
          <label class="form-label5">En el caso de tener que dejar la vivienda. ¿Qué pasaría con el pana?</label>
          <input type="text" class="form-input5" placeholder="Escriba su respuesta..." required>
        </div>

        <div class="form-group5">
          <label class="form-label5">Si alguien de su familia desarrolla alguna alergia a la mascota. ¿Qué harías?</label>
          <input type="text" class="form-input5" placeholder="Escriba su respuesta..." required>
        </div>

        <div class="form-group5">
          <label class="form-label5">¿A qué zonas de la casa tendrá acceso el pana?</label>
          <input type="text" class="form-input5" placeholder="Escriba su respuesta..." required>
        </div>

        <div class="form-group5">
          <label class="form-label5">Tener una mascota es una responsabilidad muy grande que conlleva gastos, tiempo, etc.<br>¿Está realmente seguro que se encuentra preparado para ello?</label>
          <select class="form-input5" required>
            <option value="" disabled selected>Seleccione su respuesta...</option>
            <option value="activo">Si</option>
            <option value="normal">No</option>
          </select>
        </div>

        <div class="form-group5">
          <label class="form-label5">¿Has tenido mascotas? ¿Qué ha pasado con ellos?</label>
          <input type="text" class="form-input5" placeholder="Escriba su respuesta..." required>
        </div>

        <div class="form-group5">
          <label class="form-label5">Si saliera de vacaciones y no le permitieran llevar a la mascota al hotel. ¿Qué haría?</label>
          <input type="text" class="form-input5" placeholder="Escriba su respuesta..." required>
        </div>

        <div class="form-group5">
          <label class="form-label5">En caso de que la mascota empezase a portarse mal en casa. ¿Qué harías?</label>
          <input type="text" class="form-input5" placeholder="Escriba su respuesta..." required>
        </div>

        <div class="form-group5">
          <label class="form-label5">¿Cuánto tiempo cree usted que dejaría a solas a la mascota?</label>
          <input type="text" class="form-input5" placeholder="Escriba su respuesta..." required>
        </div>

        <div class="form-group5">
          <label class="form-label5">¿Qué tan activo eres en tu día a día?</label>
          <select class="form-input5" required>
            <option value="" disabled selected>Seleccione su respuesta...</option>
            <option value="activo">Activo</option>
            <option value="normal">Normal</option>
            <option value="inactivo">Inactivo</option>
          </select>
        </div>

        <div class="form-group5">
          <label class="form-label5">¿Vives solo o acompañado? En caso de vivir con alguien ¿está esa persona de acuerdo en adoptar?</label>
          <input type="text" class="form-input5" placeholder="Escriba su respuesta..." required>
        </div>

        <button type="submit" class="submit-btn2">Enviar formulario</button>

      </div> <!-- .registration-container5 -->
    </div> <!-- .main-content5 -->
  </section>

  <img src="{{ asset('images/img_three_curious_d.png') }}" alt="three dogs" class="three-dogs animate-on-scroll">

@endsection
    