<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
  <div class="container">
    <!--begin::Header Menu-->
    <div id="kt_header_menu" class="header-menu header-menu-left header-menu-mobile header-menu-layout-default header-menu-root-arrow">
      <!--begin::Header Nav-->
      <ul class="menu-nav">
        <li class="menu-item {{ preg_match('/^candidat\/compte\.php$/iD', request()->path()) ? 'menu-item-open menu-item-here' : '' }} menu-item-submenu menu-item-rel" aria-haspopup="true">
          <a href="{{ route('compte') }}" class="menu-link">
            <span class="menu-text">Accueil</span>
          </a>
        </li>

        <li class="menu-item menu-item-submenu menu-item-rel {{ preg_match('/^candidat\/modules\.php$/iD', request()->path()) ? 'menu-item-open menu-item-here' : '' }}">
          <a href="{{ route('choix-modules') }}" class="menu-link">
            <span class="menu-text">Mes Modules</span>
            <span class="menu-desc"></span>
          </a>
        </li>

        <li class="menu-item menu-item-submenu menu-item-rel {{ preg_match('/^candidat\/modifier\.php$/iD', request()->path()) ? 'menu-item-open menu-item-here' : '' }}">
          <a href="{{ route('modifier') }}" class="menu-link">
            <span class="menu-text">Modifier Mes Infos</span>
            <span class="menu-desc"></span>
          </a>
        </li>
      </ul>
      <!--end::Header Nav-->
    </div>
    <!--end::Header Menu-->
  </div>
</div>
