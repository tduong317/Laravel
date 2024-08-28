<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://img.lovepik.com/free-png/20210927/lovepik-sneakers-png-image_401526450_wh1200.png">
    <title>Shop Shoes</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/dist/css/sanpham.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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

<body>

    <div class="container-fluid">
        <nav class="navbar navbar-expand-sm link">
            <a class="navbar-brand" href="/">
                <img src="https://static.vecteezy.com/system/resources/previews/005/020/444/original/modern-sneaker-shoe-logo-vector.jpg"
                    alt="Avatar Logo" style="width:100px;" class="rounded-pill">
                <span class="brand-text font-weight-light" style="font-size:30px">KING SHOES</span>
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">TRANG CHỦ</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle  hoverr" href="/" role="button" data-bs-toggle="dropdown">THƯƠNG
                        HIỆU</a>
                    <ul class="dropdown-menu">

                        @foreach ($brand as $br)

                            <li>
                                <a class="dropdown-item" values="{{$br->Brand_id}}"
                                    href="/hang/{{$br->Brand_name}}_{{$br->Brand_id}}">{{$br->Brand_name}}</a>
                            </li>

                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('gioithieu')}}">GIỚI THIỆU</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('lienhe')}}">LIÊN HỆ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('customer.login')}}">ĐĂNG NHẬP</a>
                </li>
                <li class="nav-item dropdown name">
                    <a class="nav-link dropdown-toggle  hover" href="/" role="button" data-bs-toggle="dropdown">
                        <button
                            class="dropbtn tendn">{{ Auth::guard('cus')->check() ? Auth::guard('cus')->user()->name : '' }}
                        </button></a>
                    <ul class="dropdown-menu">
                        <div>
                            <a class="btn btn-info " href="{{route('order.history')}}"
                                style="width:100%; font-size:15px;color:black;font-weight: bold;">Lịch sử mua hàng
                            </a>
                        </div>
                        <div>
                            <a class="btn btn-danger " href="{{route('dangxuat')}}"
                                style="width:100%; color:black;font-weight: bold;">Đăng
                                xuất
                            </a>
                        </div>
                    </ul>
                </li>

            </ul>
            <form class="d-flex" action="{{route('Timdung', 'key')}}" method="get">
                <div class="container-input">
                    <input type="text" placeholder="Search" name="key" class="input" required>
                    <a href="{{route('cart')}}" style="color:black"><span><i class="fas fa-shopping-cart iconn"></i></span></a>

                </div>
            </form>
        </nav>
    </div>
    @yield('main')
    <section class="ps-features pt-40 pb-20 bg--cover icon">
        <div class="ps-container">
            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-4">
                    <div class="ps-iconbox ps-iconbox--inverse">
                        <div class="ps-iconbox__header">
                            <i class='far fa-handshake' style='font-size:60px;'></i>
                            <h3 style="color: orange;margin-top:20px">CAM KẾT CHÍNH HÃNG</h3>
                            <p style="font-weight:bolder;">100 % Authentic</p>
                        </div>
                        <div class="ps-iconbox__content">
                            <p>Cam kết sản phẩm chính hãng từ Châu Âu, Châu Mỹ...</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-4">
                    <div class="ps-iconbox ps-iconbox--inverse">
                        <div class="ps-iconbox__header">
                            <i class='fas fa-car' style='font-size: 60px'></i>
                            <h3 style="color: orange;margin-top:20px" style="color: orange;margin-top:20px">GIAO HÀNG
                                HỎA TỐC</h3>
                            <p style="font-weight:bolder;">Express delivery</p>
                        </div>
                        <div class="ps-iconbox__content">
                            <p>SHIP hỏa tốc 1h nhận hàng trong nội thành HCM</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-12 mb-4">
                    <div class="ps-iconbox ps-iconbox--inverse">
                        <div class="ps-iconbox__header">
                            <i class='fas fa-phone-alt' style='font-size: 60px;'></i>
                            <h3 style="color: orange;margin-top:20px">HỖ TRỢ 24/24</h3>
                            <p style="font-weight:bolder;">Supporting 24/24</p>
                        </div>
                        <div class="ps-iconbox__content">
                            <p>Gọi ngay <a href='tel:0909300746'>0909300746</a></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</body>

</html>