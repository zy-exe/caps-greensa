<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
  <div class="sidebar-brand d-none d-md-flex">
    <img src="{{ asset('assets/images/LOGO GREENSA.png') }}" class="sidebar-brand-full" width="100" alt="Greensa Inn">
      {{-- <use xlink:href="/assets/brand/coreui.svg#full"></use> --}}
    </img>
  </div>
  <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
    <li class="nav-item"><a class="nav-link" href="/admin">
        <svg class="nav-icon">
          <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-spreadsheet"></use>
        </svg> Dashboard<span class="badge badge-sm bg-info ms-auto"></span></a></li>
    <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        <svg class="nav-icon">
          <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-school"></use>
        </svg> Training Center</a>
      <ul class="nav-group-items">
        <li class="nav-item"><a class="nav-link" href="/admin-training-center-order-spj"><span class="nav-icon"></span> Pesanan SPJ</a></li>
        <li class="nav-item"><a class="nav-link" href="/admin-training-center-order-reguler"><span class="nav-icon"></span> Pesanan Reguler</a></li>
        <li class="nav-item"><a class="nav-link" href="/admin-training-center-history-order"><span class="nav-icon"></span> Riwayat Pesanan</a></li>
        <li class="nav-item"><a class="nav-link" href="/admin-training-center-list"><span class="nav-icon"></span> List Ruangan</a></li>
      </ul>
    </li>
    <li class="nav-item"><a class="nav-link" href="/admin-user-list">
        <svg class="nav-icon">
          <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
        </svg> Daftar Pengguna</a></li>
</div>