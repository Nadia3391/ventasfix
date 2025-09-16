<!doctype html>
<html
  lang="es"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('backoffice/assets') }}/"
  data-template="vertical-menu-template-starter"
  data-style="light">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title','VentasFix')</title>

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('backoffice/assets/img/favicon/favicon.ico') }}" />

  <!-- Fuentes -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

  <!-- CSS Core del template -->
  <link rel="stylesheet" href="{{ asset('backoffice/assets/vendor/fonts/tabler-icons.css') }}" />
  <link rel="stylesheet" href="{{ asset('backoffice/assets/vendor/css/rtl/core.css') }}" />
  <link rel="stylesheet" href="{{ asset('backoffice/assets/vendor/css/rtl/theme-default.css') }}" />
  <link rel="stylesheet" href="{{ asset('backoffice/assets/css/demo.css') }}" />
  <link rel="stylesheet" href="{{ asset('backoffice/assets/vendor/libs/node-waves/node-waves.css') }}" />
  <link rel="stylesheet" href="{{ asset('backoffice/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
  @stack('styles')

  <!-- Helpers + Config -->
  <script src="{{ asset('backoffice/assets/vendor/js/helpers.js') }}"></script>
  <script src="{{ asset('backoffice/assets/vendor/js/template-customizer.js') }}"></script>
  <script src="{{ asset('backoffice/assets/js/config.js') }}"></script>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Sidebar -->
      <aside id="layout-menu" class="layout-menu menu-vertical bg-menu-theme">
        <div class="app-brand demo px-3 py-2">
          <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bold ms-2">VentasFix</span>
          </a>
        </div>

        <ul class="menu-inner py-1">
          <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
              <i class="menu-icon tf-icons ti ti-home"></i>
              <div>Dashboard</div>
            </a>
          </li>

          @can('admin-only')
          <!-- Usuarios (visible solo para admin) -->
          <li class="menu-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
            <a href="{{ route('users.index') }}" class="menu-link">
              <i class="menu-icon tf-icons ti ti-users"></i>
              <div>Usuarios</div>
            </a>
          </li>
          @endcan

          <!-- Productos -->
          <li class="menu-item {{ request()->routeIs('products.*') ? 'active' : '' }}">
            <a href="{{ route('products.index') }}" class="menu-link">
              <i class="menu-icon tf-icons ti ti-package"></i>
              <div>Productos</div>
            </a>
          </li>

          <!-- Clientes -->
          <li class="menu-item {{ request()->routeIs('clients.*') ? 'active' : '' }}">
            <a href="{{ route('clients.index') }}" class="menu-link">
              <i class="menu-icon tf-icons ti ti-building-store"></i>
              <div>Clientes</div>
            </a>
          </li>
        </ul>
      </aside>
      <!-- /Sidebar -->

      <!-- Layout page -->
      <div class="layout-page">
        <!-- Navbar -->
        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <li class="nav-item lh-1 me-3">
                <span class="fw-medium">{{ auth()->user()->name ?? auth()->user()->email ?? 'Usuario' }}</span>
              </li>
              <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button class="btn btn-sm btn-outline-danger">Salir</button>
                </form>
              </li>
            </ul>
          </div>
        </nav>
        <!-- /Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            @yield('content')
          </div>
          <!-- /Content -->
        </div>
        <!-- /Content wrapper -->
      </div>
      <!-- /Layout page -->
    </div>
  </div>

  <!-- JS Core -->
  <script src="{{ asset('backoffice/assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('backoffice/assets/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('backoffice/assets/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('backoffice/assets/vendor/libs/node-waves/node-waves.js') }}"></script>
  <script src="{{ asset('backoffice/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('backoffice/assets/vendor/libs/hammer/hammer.js') }}"></script>
  <script src="{{ asset('backoffice/assets/vendor/js/menu.js') }}"></script>
  <script src="{{ asset('backoffice/assets/js/main.js') }}"></script>
  @stack('scripts')
</body>
</html>
