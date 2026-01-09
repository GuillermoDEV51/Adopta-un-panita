@extends('layouts.admin')
      @section('main')
      <!-- Dashboard Main Content -->
      <div class="dashboard-container">
        <!-- Sidebar Menu -->
        <aside class="sidebar">
          <div class="menu-section">
            <h2 class="menu-title">Menú</h2>
            <div class="menu-list">
              <div class="menu-item active">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
              </div>
              <div class="menu-item">
                <i class="fas fa-clipboard-list"></i>
                Solicitudes
              </div>
              <div class="menu-item">
                <i class="fas fa-plus-circle"></i>
                Añadir refugios
              </div>
            </div>
          </div>
          
          <div class="menu-section">
            <h2 class="menu-title">Páginas</h2>
            <div class="menu-list">
              <div class="menu-item">
                <i class="fas fa-home"></i>
                Refugios
              </div>
              <div class="menu-item">
                <i class="fas fa-users"></i>
                Usuarios
              </div>
            </div>
          </div>
          
          <div class="menu-section">
            <h2 class="menu-title">Mascotas</h2>
            <div class="menu-list">
              <div class="menu-item">
                <i class="fas fa-dog"></i>
                Perros
              </div>
              <div class="menu-item">
                <i class="fas fa-cat"></i>
                Gatos
              </div>
              <div class="menu-item">
                <i class="fas fa-sign-out-alt"></i>
                Cerrar sesión
              </div>
            </div>
          </div>
        </aside>
          
          <!-- Grid principal con dos columnas -->
          <div class="main-content-grid">
              <!-- Grid de 3 tarjetas de estadísticas -->
              <div class="stats-grid">
                <div class="stat-card">
                  <div class="stat-icon">
                    <i class="fas fa-paw"></i>
                  </div>
                  <div class="stat-info">
                    <div class="stat-title">Mascotas registradas</div>
                    <div class="stat-value">0</div>
                  </div>
                </div>
                
                <div class="stat-card">
                  <div class="stat-icon">
                    <i class="fas fa-home"></i>
                  </div>
                  <div class="stat-info">
                    <div class="stat-title">Refugios activos</div>
                    <div class="stat-value">0</div>
                  </div>
                </div>
                
                <div class="stat-card">
                  <div class="stat-icon">
                    <i class="fas fa-clipboard-list"></i>
                  </div>
                  <div class="stat-info">
                    <div class="stat-title">Solicitudes pendientes</div>
                    <div class="stat-value">0</div>
                  </div>
                </div>
              </div>
              

            <!-- Columna derecha: Usuarios activos -->
            <div class="users-section">
              <div class="users-header">
                <h2 class="content-title">Usuarios activos</h2>
                <div class="users-count">0</div>
              </div>
              
              <div class="users-list">
                <!-- Ejemplo de usuario -->
                <div class="user-item">
                  <div class="user-avatar">AD</div>
                  <div class="user-info">
                    <div class="user-name">Administrador</div>
                    <div class="user-role">
                      <span class="role-badge">Admin</span>
                    </div>
                  </div>
                  <div class="user-status"></div>
                </div>
              </div>
            </div>
          </div>
      </div>
      
      @endsection