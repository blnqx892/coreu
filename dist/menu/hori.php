<div class="container-fluid">
  <button class="header-toggler px-md-0 me-md-3" type="button"
    onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
    <svg class="icon icon-lg">
      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
    </svg>
  </button><a class="header-brand d-md-none" href="#">
    <svg width="118" height="46" alt="CoreUI Logo">
      <use xlink:href="assets/brand/coreui.svg#full"></use>
    </svg></a>
  
  <ul class="header-nav ms-3">
    <li class="nav-item dropdown"><a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button"
        aria-haspopup="true" aria-expanded="false">
        <div class="avatar avatar-md"><img class="avatar-img" src="img/usua.png" alt="user@email.com">
        </div>
      </a>
      <div class="dropdown-menu dropdown-menu-end pt-0">
        <div class="dropdown-header bg-light py-2">
          <div class="fw-semibold">Ajustes</div>
        </div><a class="dropdown-item" href="#">
          <svg class="icon me-2">
            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
          </svg> Perfil</a><a class="dropdown-item" href="#">
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="">
          <svg class="icon me-2">
            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
          </svg> Bloquear</a>
          <a class="dropdown-item" href="Acceso.php">
          <svg class="icon me-2">
            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
          </svg> Cerrar Sesión</a>
      </div>
    </li>
  </ul>
</div>