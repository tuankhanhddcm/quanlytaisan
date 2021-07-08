<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Quản lý tài sản công</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::asset('css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ URL::asset('css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ URL::asset('css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ URL::asset('css/admin.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/base.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/toastr.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css" rel="stylesheet" type='text/css'>
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center" style="background-color: rgba(0, 0, 0, 0.1)">
        <div class="loader">
            <div class="loader-inner">
              <div class="loader-line-wrap">
                <div class="loader-line"></div>
              </div>
              <div class="loader-line-wrap">
                <div class="loader-line"></div>
              </div>
              <div class="loader-line-wrap">
                <div class="loader-line"></div>
              </div>
              <div class="loader-line-wrap">
                <div class="loader-line"></div>
              </div>
              <div class="loader-line-wrap">
                <div class="loader-line"></div>
              </div>
            </div>
          </div>
      
    </div>


    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="" class="brand-link">
        <img src="{{ URL::asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">Quản lý tài sản công</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ URL::asset('img/user.png') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Admin</a>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item ">
                {{-- active --}}
              <a href="/" class="nav-link ">
                <i class=' nav-icon bx bx-home' ></i>
                <p>
                  Trang chủ
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon bx bx-laptop"></i>
                <p>
                  Quản lý tài sản
                  <i class='bx bx-chevron-down right'></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/loaiTSCD" class="nav-link">
                    <i class='bx bx-circle nav-icon'></i>
                    <p>Danh mục loại TSCĐ</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/taisan" class="nav-link">
                    <i class='bx bx-circle nav-icon'></i>
                    <p>Danh mục tài sản</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/chitiettaisan" class="nav-link">
                    <i class='bx bx-circle nav-icon'></i>
                    <p>Chi tiết tài sản</p>
                  </a>
                </li>
                {{-- <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class='bx bx-circle nav-icon'></i>
                    <p>Lịch sử</p>
                  </a>
                </li> --}}
                <li class="nav-item">
                  <a href="/tieuhao" class="nav-link">
                    <i class='bx bx-circle nav-icon'></i>
                    <p>Tiêu hao</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class='nav-icon bx bx-left-indent' ></i>
                <p>
                  Tất cả danh mục
                  <i class='bx bx-chevron-down right'></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/phongban" class="nav-link">
                    <i class='bx bx-circle nav-icon'></i>
                    <p>Danh mục phòng ban</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/nhanvien" class="nav-link">
                    <i class='bx bx-circle nav-icon'></i>
                    <p>Danh mục nhân viên</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/nhacungcap" class="nav-link">
                    <i class='bx bx-circle nav-icon'></i>
                    <p>Danh mục nhà cung câp</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/loaits" class="nav-link">
                    <i class='bx bx-circle nav-icon'></i>
                    <p>Danh mục loại tài sản</p>
                  </a>
                </li>
              </ul>
            </li>
            {{-- <li class="nav-item">
              <a href="#" class="nav-link ">
                <i class='nav-icon bx bxs-envelope' ></i>
                <p>
                  Hợp đồng
                  <i class='bx bx-chevron-down right'></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="" class="nav-link ">
                    <i class='bx bx-circle nav-icon'></i>
                    <p>Hợp đồng</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/UI/icons.html" class="nav-link">
                    <i class='bx bx-circle nav-icon'></i>
                    <p>Chi tiết họp đồng</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/UI/buttons.html" class="nav-link">
                    <i class='bx bx-circle nav-icon'></i>
                    <p>Thanh toán</p>
                  </a>
                </li>
              </ul>
            </li> --}}
            <li class="nav-item">
              <a href="/bangiao" class="nav-link ">
                <i class='nav-icon bx bxs-file'></i>
                <p>
                  Phiếu bàn giao tài sản
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/kiemke" class="nav-link ">
                <i class='nav-icon bx bxs-file'></i>
                <p>
                  Phiếu kiểm kê tài sản
                </p>
              </a>
            </li>
            {{-- menu-is-opening menu-open --}}
            {{-- <li class="nav-item ">
              <a href="#" class="nav-link ">
                <i class='nav-icon bx bx-table' ></i>
                <p>
                  Phiếu thanh lý
                  <i class='bx bx-chevron-down right'></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class='bx bx-circle nav-icon'></i>
                    <p>Phiếu thanh lý tài sản</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/UI/icons.html" class="nav-link">
                    <i class='bx bx-circle nav-icon'></i>
                    <p>Chi tiết phiếu thanh lý</p>
                  </a>
                </li>
              </ul>
            </li> --}}
            <li class="nav-item">
              <a href="" class="nav-link">
                <i class='nav-icon bx bx-checkbox-checked' ></i>
                <p>
                  Báo cáo
                  <i class='bx bx-chevron-down right'></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="" class="nav-link">
                    <i class='bx bx-circle nav-icon'></i>
                    <p>Báo cáo kiểm kê</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/UI/icons.html" class="nav-link">
                    <i class='bx bx-circle nav-icon'></i>
                    <p>Báo cáo tất cả tài sản</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/UI/icons.html" class="nav-link">
                    <i class='bx bx-circle nav-icon'></i>
                    <p>Bản kê tài sản thanh lý</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="/maubaocao" class="nav-link ">
                <i class='nav-icon bx bxs-file'></i>
                <p>
                  Mẫu báo cáo
                </p>
              </a>
            </li>
            <li class="nav-item">
                <a href="/logout" class="nav-link ">
                    <i class='nav-icon bx bx-log-out' ></i>
                  <p>
                    Đăng xuất
                  </p>
                </a>
              </li>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('view_baocao')
        @yield('insert')
        @yield('chitiet')
        @yield('index')
    </div>
    <!-- /.content-wrapper -->
    {{-- @include('modal.modal_insert') --}}
    
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{ URL::asset('js/jquery-3.6.0.min.js')}}"></script>
  
  {{-- <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script> --}}
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ URL::asset('js/jquery-ui.min.js')}}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{ URL::asset('js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ URL::asset('js/moment.min.js')}}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{ URL::asset('js/tempusdominus-bootstrap-4.min.js')}}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ URL::asset('js/jquery.overlayScrollbars.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script  src="{{ URL::asset('js/toastr.min.js') }}"></script>
  <script src="{{ URL::asset('js/adminlte.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
  <script src="{{ URL::asset('js/main.js')}}"></script>
  <script>
    $(document).ready(function(){
        // add class active
      var path = window.location.pathname.split('/').pop(6);
      if (path == '' || path == 'Admin') {
          path = '/';
      }
      var target = $('.nav-treeview li a[href="/' + path + '"]');
      target.addClass("active");
      target.parent().parent().parent().addClass('menu-is-opening menu-open')
      var target2 = $('li a[href="/' + path + '"]');
      target2.addClass('active');
      
    });
  </script>
</body>

</html>