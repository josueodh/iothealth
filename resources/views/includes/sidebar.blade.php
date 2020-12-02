<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <span>
      <a href="/" id="link-logo" class="brand-link icone-img link-logo">
        <span class="fa-stack">
          <img src="{{ asset('img/logo.png') }}" class="img-fluid ml-1" >
          <span class="brand-text font-weight-light">Iot Health</span>
        </span>
      </a>
    </span>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <a href="#">
            <img src="https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg"
              class="img-circle elevation-2 perfil-sidebar">
          </a>
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
        <div class="info align-self-center">
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-power-off"></i>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
      </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/" class="nav-link {{ Route::is('home') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('patients.index') }}" class="nav-link {{ Route::is('patients.index') ? 'active' : '' }}">
              <i class="nav-icon fas fa-head-side-cough"></i>
              <p>
                Pacientes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('measurements.index') }}" class="nav-link {{ Route::is('measurements.index') ? 'active' : '' }}">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Dados
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('diaries.index') }}" class="nav-link {{ Route::is('diaries.index') ? 'active' : '' }}">
              <i class="nav-icon fas fa-shoe-prints"></i>
              <p>
                Sono / Passos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link {{ Route::is('users.index') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Usuários
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('patients.excel') }}" class="nav-link {{ Route::is('patients.excel') ? 'active' : '' }}">
                <i class="nav-icon far fa-file-excel"></i>
                <p>
                    Excel
                </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
