<!-- header -->
<header class="header header-sticky mb-4">
  <div class="container-fluid">
    <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
      <svg class="icon icon-lg">
        <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
      </svg>
    </button>
    <a class="header-brand d-md-none" href="#">
      <svg width="118" height="46" alt="CoreUI Logo">
        <use xlink:href="/assets/brand/coreui.svg#full"></use>
      </svg>
    </a>
    <ul class="header-nav ms-3">
      <li class="nav-item dropdown">
        <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          Halo {{ $admin->username }}
          <div class="avatar avatar-md ms-2"><img class="avatar-img" src="/assets/images/profile_user.png" alt="admin"></div>
        </a>
        <div class="dropdown-menu dropdown-menu-end pt-0">
          {{-- <a class="dropdown-item" href="#">
            <svg class="icon me-2">
              <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
            </svg> Profile
          </a> --}}
          <div class="dropdown-divider"></div>
          <form action="{{ url('/admin-logout') }}" method="POST">
            @csrf
            <button type="submit" class="dropdown-item">
              <svg class="icon me-2">
                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
              </svg> Keluar
            </button>
          </form>
        </div>
      </li>
    </ul>
  </div>
</header>