<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio - PanitasPet | Adopción y Refugios de Mascotas</title>
  <meta name="description" content="Dashboard de PanitasPet para gestionar adopciones y refugios. Plataforma confiable para encontrar tu compañero perfecto y apoyar refugios locales.">
  <meta name="keywords" content="adopción mascotas, refugios animales, dashboard, PanitasPet, gestionar mascotas, voluntarios">
  
  <meta property="og:type" content="website">
  <meta property="og:title" content="Inicio - PanitasPet | Adopción y Refugios de Mascotas">
  <meta property="og:description" content="Dashboard de PanitasPet para gestionar adopciones y refugios. Plataforma confiable para encontrar tu compañero perfecto.">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&family=Pacifico&display=swap" rel="stylesheet">
  
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
        @if (Route:: has('login'))

          <div class="nav-auth">

                @auth
                <!-- Mostrar información del usuario autenticado -->
                <span>
                  @if(auth()->user()->id_rol == 1)
                      <span>eres admin</span>
                      @else
                      <span>eres normal</span>
                  @endif
                </span>


                <a href="{{ route('Dashboard') }}" class="login-btn">{{ auth()->user()->nombre }} {{ auth()->user()->apellido }}</a>
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
      
            <div class="paginas-section">
              <div class="titulo-wrapper">
                <h1 class="paginas-title">Registrar Usuario</h1>
                <div class="titulo-line" aria-hidden="true"></div>
              </div>
            </div>
                <a href="{{ route('UsuariosAdmin') }}" class="btn btn-secondary">Volver a Usuarios</a>
            <div class="">
                

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
                <form action="{{ route('GuardarUsuario') }}" method="POST" class="">
                    @csrf
                    <div class="">
                        <label for="ci">CI:</label>
                        <input type="text" id="ci" name="ci" maxlength="8"  required>
                    </div>
                    <div class="">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>
                    <div class="">
                        <label for="apellido">Apellido:</label>
                        <input type="text" id="apellido" name="apellido" required>
                    </div>
                    <div class="">
                        <label for="password">Contraseña:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group2">
                        <input type="password" name="password_confirmation" class="form-input" placeholder="Confirmar contraseña" required>
                    </div>
                    <div class="form-group2">
                    <input type="tel" name="telefono" class="form-input" 
                     placeholder="Número de teléfono" 
                     pattern="[0-9]*" 
                     inputmode="numeric"
                     oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                     maxlength="11"
                     required>
            </div>
                   <!-- <div class="">  
                        <label for="role">Rol:</label>
                        <select name="role" id="role" required>
                            <option value="">Seleccionar rol</option>
                            @foreach ($roles as $rol)
                                <option value="{{ $rol->id }}" {{ old('role') == $rol->id ? 'selected' : '' }}>
                                    {{ $rol->name }}
                                </option>                              
                            @endforeach
                        </select>  
                    </div> -->
                    <div class="form-group2">
              <label class="form-label">Fecha de nacimiento</label>
              <div class="date-row">
                <div class="form-group2">
                  <select class="form-input" id="dia" required>
                    <option value="" disabled selected>Día</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                  </select>
                </div>
                <div class="form-group2">
                  <select class="form-input" id="mes" required>
                    <option value="" disabled selected>Mes</option>
                    <option value="01">Enero</option>
                    <option value="02">Febrero</option>
                    <option value="03">Marzo</option>
                    <option value="04">Abril</option>
                    <option value="05">Mayo</option>
                    <option value="06">Junio</option>
                    <option value="07">Julio</option>
                    <option value="08">Agosto</option>
                    <option value="09">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                  </select>
                </div>
                <div class="form-group2">
                  <select class="form-input" id="anio" required>
                    <option value="" disabled selected>Año</option>
                    <option value="2025">2025</option>
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                    <option value="2014">2014</option>
                    <option value="2013">2013</option>
                    <option value="2012">2012</option>
                    <option value="2011">2011</option>
                    <option value="2010">2010</option>
                    <option value="2009">2009</option>
                    <option value="2008">2008</option>
                    <option value="2007">2007</option>
                    <option value="2006">2006</option>
                    <option value="2005">2005</option>
                    <option value="2004">2004</option>
                    <option value="2003">2003</option>
                    <option value="2002">2002</option>
                    <option value="2001">2001</option>
                    <option value="2000">2000</option>
                    <option value="1999">1999</option>
                    <option value="1998">1998</option>
                    <option value="1997">1997</option>
                    <option value="1996">1996</option>
                    <option value="1995">1995</option>
                    <option value="1994">1994</option>
                    <option value="1993">1993</option>
                    <option value="1992">1992</option>
                    <option value="1991">1991</option>
                    <option value="1990">1990</option>
                    <option value="1989">1989</option>
                    <option value="1988">1988</option>
                    <option value="1987">1987</option>
                    <option value="1986">1986</option>
                    <option value="1985">1985</option>
                    <option value="1984">1984</option>
                    <option value="1983">1983</option>
                    <option value="1982">1982</option>
                    <option value="1981">1981</option>
                    <option value="1980">1980</option>
                    <option value="1979">1979</option>
                    <option value="1978">1978</option>
                    <option value="1977">1977</option>
                    <option value="1976">1976</option>
                    <option value="1975">1975</option>
                    <option value="1974">1974</option>
                    <option value="1973">1973</option>
                    <option value="1972">1972</option>
                    <option value="1971">1971</option>
                    <option value="1970">1970</option>
                    <option value="1969">1969</option>
                    <option value="1968">1968</option>
                    <option value="1967">1967</option>
                    <option value="1966">1966</option>
                    <option value="1965">1965</option>
                    <option value="1964">1964</option>
                    <option value="1963">1963</option>
                    <option value="1962">1962</option>
                    <option value="1961">1961</option>
                    <option value="1960">1960</option>
                    <option value="1959">1959</option>
                    <option value="1958">1958</option>
                    <option value="1957">1957</option>
                    <option value="1956">1956</option>
                    <option value="1955">1955</option>
                    <option value="1954">1954</option>
                    <option value="1953">1953</option>
                    <option value="1952">1952</option>
                    <option value="1951">1951</option>
                    <option value="1950">1950</option>
                  </select>
                </div>
              </div>
              <input type="hidden" name="fecha_nacimiento" id="fecha_nacimiento">
            </div>
            <div class="form-group2">
                <select class="form-input" name="ubicacion" required>
                  <option value="">Ubicación</option>
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
                    <div class="">
                        <button type="submit">Registrar Usuario</button>
                    </div>


                     <!-- Mostrar errores generales si existen -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif    
                </form>
            </div>
           

      </main>
      
            <!-- Footer -->
      <footer class="footer">
        <div class="footer-content">
          <div class="footer-left">
            <div class="footer-logo-section">
<img src="{{ asset('images/logopanitapet.png') }}" alt="PanitasPet Logo" class="footer-logo">

            <span class="brand-text">
              <span class="footer-brand">PanitasPet</span>
              <span class="logo-subtitle">Adopción y refugios</span>
            </span>
            </div>

            <p class="description">Plataforma digital dedicada a la ayuda y adopción de mascotas en Venezuela. Conectamos animales que necesitan un hogar con adoptantes responsables para combatir el abandono y la sobrepoblación.</p>

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
                <img src="{{ asset('images/img_call_end.svg') }}" alt="Phone" class="contact-icon">
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
</html>