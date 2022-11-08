<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="admin/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="admin/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="admin/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="admin/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="admin/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="admin/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <link rel="stylesheet" href="admin/vendor/libs/apex-charts/apex-charts.css" />
  <!-- selectize -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.14.0/css/selectize.bootstrap5.css"
    integrity="sha512-QomP/COM7vFCHcVHpDh/dW9oDyg44VWNzgrg9cG8T2cYSXPtqkQK54WRpbqttfo0MYlwlLUz3EUR+78/aSbEIw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Datatables -->
  <link rel="stylesheet" type="text/css" href="admin/DataTables/datatables.min.css" />

  <!-- Helpers -->
  <script src="admin/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="admin/js/config.js"></script>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="index" class="app-brand-link">
            <span class="app-brand-logo demo">
              <svg version="1.1" width="425.6377" height="425.6376" id="svg8" viewBox="0 0 425.6377 425.6376"
                sodipodi:docname="32933968b609d363201168971e7a3cf5.cdr"
                xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns="http://www.w3.org/2000/svg"
                xmlns:svg="http://www.w3.org/2000/svg">
                <defs id="defs12" />
                <sodipodi:namedview id="namedview10" pagecolor="#ffffff" bordercolor="#666666" borderopacity="1.0"
                  inkscape:pageshadow="2" inkscape:pageopacity="0.0" inkscape:pagecheckerboard="0" />
                <path d="M 0,0 V 425.6376 H 425.6377 V 0 Z" style="fill:none" id="path2" />
                <path
                  d="m 32.1095,3.8544 0.0958,60.2589 182.181,58.7499 130.9282,-42.1028 -0.1497,44.6478 -36.7463,45.9052 -35.5099,-45.513 -47.9113,15.165 1.3773,202.8461 47.9233,-15.4135 0.4221,-135.3445 34.6356,37.6865 32.7074,-39.0818 0.3922,114.8261 51.0731,-16.4225 L 392.9564,4.3185 212.8653,62.23 Z"
                  style="fill:#66788c;fill-rule:evenodd" id="path4" />
                <path
                  d="m 32.2413,86.0899 59.2379,18.6351 0.1108,71.364 61.6661,19.9166 -0.1138,-71.2322 45.564,14.7159 -0.2785,203.6366 -108.0325,-34.89 -0.006,21.3118 123.0449,39.7375 180.0941,-57.9116 v 52.4983 L 213.4342,421.7834 32.6784,363.4078 V 238.2222 l 117.5357,37.959 0.4551,-28.6414 -117.9908,-38.1027 z"
                  style="fill:#fb3566;fill-rule:evenodd" id="path6" />
              </svg>
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Yukmoco</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <li class="menu-item active">
            <a href="index.html" class="menu-link">
              <i class="menu-icon tf-icons bx bxs-home-circle"></i>
              <div data-i18n="Analytics">Dashboard</div>
            </a>
          </li>

          <!-- Layouts -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bxs-book"></i>
              <div data-i18n="Layouts">Katalog</div>
            </a>

            <ul class="menu-sub">
              <li class="menu-item">
                <a href="/daftar-produk" class="menu-link">
                  <div data-i18n="Daftar Produk">Daftar Produk</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="/tambah-produk" class="menu-link">
                  <div data-i18n="Tambah Produk">Tambah Produk</div>
                </a>
              </li>
            </ul>
          </li>

          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bxs-user-account"></i>
              <div data-i18n="Account Settings">Users</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="/daftar-user" class="menu-link">
                  <div data-i18n="Account">Daftar User</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bxs-cart"></i>
              <div data-i18n="Authentications">Pesanan</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="/daftar-pesanan" class="menu-link">
                  <div data-i18n="Basic">Daftar Pesanan</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bxs-heart"></i>
              <div data-i18n="Misc">Marketing</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="/tambah-kupon" class="menu-link">
                  <div data-i18n="Tambah Kupon">Tambah Kupon</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="/daftar-kupon" class="menu-link">
                  <div data-i18n="Daftar Kupon">Daftar Kupon</div>
                </a>
              </li>
            </ul>
          </li>
          <!-- Misc -->
          <li class="menu-header small text-uppercase"><span class="menu-header-text"></span></li>
          <li class="menu-item">
            <a href="/pengaturan" class="menu-link">
              <i class="menu-icon tf-icons bx bxs-cog"></i>
              <div data-i18n="Basic">Pengaturan</div>
            </a>
          </li>
        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
                  aria-label="Search..." />
              </div>
            </div>
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- Place this tag where you want the button to render. -->


              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="admin/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="admin/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block">John Doe</span>
                          <small class="text-muted">Admin</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">My Profile</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <i class="bx bx-cog me-2"></i>
                      <span class="align-middle">Settings</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <span class="d-flex align-items-center align-middle">
                        <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                        <span class="flex-grow-1 align-middle">Billing</span>
                        <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                      </span>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="auth-login-basic.html">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">Log Out</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          @yield('content')
          <!-- / Content -->

          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
              <div class="mb-2 mb-md-0">
                ©
                <script>
                  document.write(new Date().getFullYear());
                </script>
                , made with ❤️ by
                <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
              </div>
            </div>
          </footer>
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->


  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="admin/vendor/libs/jquery/jquery.js"></script>
  <script src="admin/vendor/libs/popper/popper.js"></script>
  <script src="admin/vendor/js/bootstrap.js"></script>
  <script src="admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="admin/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="admin/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="admin/js/main.js"></script>

  <!-- Page JS -->
  <script src="admin/js/dashboards-analytics.js"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  <!-- selectize -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.14.0/js/selectize.js"
    integrity="sha512-DzFFikicajWoqn4/MqD7en9oPeG6zRpLi4BjFGTvnm1mGkwmc5gTaZp1vt20rgSqKXj+1tIHvPMaDSUctwx4MQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- datatables-->
  <script type="text/javascript" src="admin/DataTables/datatables.min.js"></script>
  <script>
    $(document).ready(function () {
          $('#example').DataTable();
      });
  </script>
</body>

</html>