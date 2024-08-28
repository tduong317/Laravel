<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://img.lovepik.com/free-png/20210927/lovepik-sneakers-png-image_401526450_wh1200.png">
    <title>Shop Shoes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/dist/css/baitaplon.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="padding-top:15px"></i></a>
                </li>
                <div class="dropdown">
                    <button class="dropbtn" style="font-weight: bolder;font-size: 18px;"><a href="/" style="color:black">TRANG CHỦ</a></button>
                </div>
                <form method="post" action="{{route('logout')}}">
                    @csrf
                    <button type="submit" class="btn btn-danger" style="margin-top:10px">Đăng xuất</button>
                </form>
            </ul>
        </nav>
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/trangchu" class="brand-link">
                <img src="https://static.vecteezy.com/system/resources/previews/005/020/444/original/modern-sneaker-shoe-logo-vector.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">KING SHOES</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="https://scontent.fhan3-2.fna.fbcdn.net/v/t39.30808-6/426201091_1259021798419754_8586573785873251031_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=YP9vYug8rN4Q7kNvgFYk0oM&_nc_ht=scontent.fhan3-2.fna&oh=00_AYD7a65Yl64sz6WP2hf6-SiFJz25fyGS1ylsDY4uEzWX9w&oe=66A92B84" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-header">DANH MỤC QUẢN LÝ</li>
                        <li class="nav-item">
                            <a href="{{route('danhsachcate')}}" class="nav-link">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    <p>Quản Lý Danh Mục</p>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('danhsachbrand')}}" class="nav-link">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    <p>Quản Lý Thương Hiệu</p>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('danhsachsp')}}" class="nav-link">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    <p>Quản Lý Sản phẩm</p>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('historyadmin')}}" class="nav-link">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    <p>Quản Lý Đơn Hàng</p>
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>
        <div class="container-fluid">
            @yield('trangchu')
        </div>
        <div class="container">
            @yield('main')
        </div>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                </div>
            </div>
            <aside class="control-sidebar control-sidebar-dark">
            </aside>
        </div>

        <script src="/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="/plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="/plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="/plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="/plugins/moment/moment.min.js"></script>
        <script src="/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="/dist/js/adminlte.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="/dist/js/pages/dashboard.js"></script>
</body>

</html>