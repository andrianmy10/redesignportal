<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <? if ($this->session->userdata('role') == "PROCESSMAKER_ADMIN") { ?>
  <ul class="nav">
    <li class="nav-item nav-category">Admin Area</li>
    <li class="nav-item">
      <a class="nav-link" href="<? echo base_url('admin/menusetting'); ?>">
        <i class="menu-icon mdi mdi-menu"></i>
        <span class="menu-title">Menu Setting</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#org-setting" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon mdi mdi-account-settings-variant"></i>
        <span class="menu-title">Organization Setting &nbsp;</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="org-setting">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">User Setting</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Group Setting</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Departmen Setting</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Landing Page</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Assign User</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="menu-icon mdi mdi mdi-airplay"></i>
        <span class="menu-title">Template Setting</span>
      </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#mdl-setting" aria-expanded="false" aria-controls="ui-basic">
            <i class="menu-icon mdi mdi-sitemap"></i>
            <span class="menu-title">Modul Setting</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="mdl-setting">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item" style="position:relative;"><a class="nav-link" href="pages/ui-features/buttons.html">Viewer Setting</a></li>
              <li class="nav-item" style="position:relative;"><a class="nav-link" href="<? echo base_url('admin/modul/processmaker'); ?>">Processmaker Setting</a></li>
              <li class="nav-item" style="position:relative;"><a class="nav-link" href="pages/ui-features/dropdowns.html">Report BIRT Setting</a></li>
              <li class="nav-item" style="position:relative;"><a class="nav-link" href="pages/ui-features/dropdowns.html">Map Setting</a></li>
              <li class="nav-item" style="position:relative;"><a class="nav-link" href="pages/ui-features/dropdowns.html">Graph Setting</a></li>
              <li class="nav-item" style="position:relative;"><a class="nav-link" href="pages/ui-features/dropdowns.html">Box Setting</a></li>
              <li class="nav-item" style="position:relative;"><a class="nav-link" href="pages/ui-features/dropdowns.html">Table Setting</a></li>
              <li class="nav-item" style="position:relative;"><a class="nav-link" href="pages/ui-features/dropdowns.html">Calendar Setting</a></li>
              <li class="nav-item" style="position:relative;"><a class="nav-link" href="pages/ui-features/dropdowns.html">Listing Setting</a></li>
              <li class="nav-item" style="position:relative;"><a class="nav-link" href="pages/ui-features/dropdowns.html">HTML Setting</a></li>
              <li class="nav-item" style="position:relative;"><a class="nav-link" href="pages/ui-features/dropdowns.html">Form Parameter Setting</a></li>
              <li class="nav-item" style="position:relative;"><a class="nav-link" href="pages/ui-features/dropdowns.html">Report Parameter Setting</a></li>
            </ul>
        </div>
    </li><li class="nav-item">
      <a class="nav-link" href="#">
        <i class="menu-icon mdi mdi mdi-earth"></i>
        <span class="menu-title">Site Setting</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="menu-icon mdi mdi mdi-lan-connect"></i>
        <span class="menu-title">Connection Setting</span>
      </a>
    </li>
  </ul>
  <? } else { ?>
    <ul class="nav">
      <li class="nav-item nav-category">Menu Utama</li>
    </ul>
  <? } ?>
</nav>
      <!-- partial -->
