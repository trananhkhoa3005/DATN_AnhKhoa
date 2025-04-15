<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>HXT - Shop bán đồng hồ</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('home/css/bootstrap.min.css') }}" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('home/css/slick.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('home/css/slick-theme.css') }}" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('home/css/nouislider.min.css') }}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('home/css/font-awesome.min.css') }}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('home/css/style.css') }}" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!-- [if lt IE 9]>
 <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <![endif] -->

</head>

<body>
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="#"><i class="fa fa-phone"></i> 0868684247</a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> hxt.near@gmail.com</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> 143 NLB</a></li>
                </ul>
                <ul class="header-links pull-right">
                    @if (!Session::has('username'))
                        <li><a href="{{ route('signup') }}"><i class="fa fa-user-o"></i> Đăng ký</a></li>
                    @endif
                </ul>
            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="{{ route('home.index') }}" class="logo">
                                <img src="{{ asset('home/img/hxt.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form>
                                <select class="input-select">
                                    <option value="0">Tìm kiếm</option>
                                </select>
                                <input class="input" placeholder="Bạn muốn tìm gì...">
                                <button class="search-btn">Search</button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">

                            <!-- Cart -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Giỏ hàng</span>
                                    <div class="qty">{{ count(Session::get('cart', [])) }}</div>
                                </a>
                                <div class="cart-dropdown">
                                    <div class="cart-list">
                                        @yield('XemNhanhGH')
                                    </div>
                                    <div class="cart-summary">
                                        <small>Đã chọn <span style="color: red; font-weight: bold;">
                                                {{ $tongsp }}
                                            </span> sản phẩm</small>
                                        <h5>Tổng: {{ number_format($total, 0) }} đ
                                        </h5>
                                    </div>
                                    <div class="cart-btns">
                                        <a href="{{ route('cart.index') }}">Xem giỏ</a>
                                        <a href="#">Thanh toán <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Cart -->

                            <div class="dropdown" style="cursor: pointer;">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"
                                    style="width: 150px;">
                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                    @if (Session::has('username'))
                                        <span class="d-none d-lg-inline-flex"
                                            style="width: 150px; text-align: center;"><span
                                                style="color: red;">{{ Session::get('username') }}</span></span>
                                        <div class="dropdown-menu dropdown-menu-end m-0"
                                            style="background-color: beige"">
                                            <form action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button style="width: 100%; border: none; background-color: beige"><a
                                                        class="dropdown-item">Đăng xuất</a></button>
                                            </form>
                                        </div>
                                    @else
                                        <a href="{{ route('login') }}"
                                            style="text-decoration: none; color: primary; width: 150px; text-align: center;">Đăng
                                            nhập</a>
                                    @endif
                                </a>
                            </div>

                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- Menu hãng -->
    <nav id="navigation">
        <div class="container">
            <div id="responsive-nav">
                <ul class="main-nav nav navbar-nav">
                    <li class="active"><a href="{{ route('home.index') }}">Home</a></li>
                    @foreach ($hsx as $row)
                        <li><a href="{{ route('home.index', ['mahsx' => $row->MaHSX]) }}">{{ $row->TenHSX }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>



    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        @yield('content')
        <!-- /container -->
    </div>
    <!-- /SECTION -->


    <!-- FOOTER -->
    <footer id="footer">
        <!-- top footer -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">HXT</h3>
                            <p>Đồng hồ đeo tay đẳng cấp, thể hiện cá tính.</p>
                            <ul class="footer-links">
                                <li><a href="#"><i class="fa fa-map-marker"></i>143 NLB</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i>0868684247</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i>hxt.near@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Danh mục</h3>
                            <ul class="footer-links">
                                @foreach ($loaisp as $row)
                                    <li><a
                                            href="{{ route('home.index', ['maloai' => $row->MaLoai]) }}">{{ $row->TenLoai }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="clearfix visible-xs"></div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Thông tin</h3>
                            <ul class="footer-links">
                                <li><a href="#">Về chúng tôi</a></li>
                                <li><a href="#">Liên hệ</a></li>
                                <li><a href="#">Trách nhiệm</a></li>
                                <li><a href="#">Mua và trả hàng</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Hệ thống</h3>
                            <ul class="footer-links">
                                <li><a href="#">Tài khoản</a></li>
                                <li><a href="#">Xem giỏ hàng</a></li>
                                <li><a href="#">Thanh toán</a></li>
                                <li><a href="#">Trợ giúp</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /top footer -->

        <!-- bottom footer -->
        <div id="bottom-footer" class="section">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <span class="copyright">
                            Copyright &copy; 2024 HXT
                        </span>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="{{ asset('home/js/jquery.min.js') }}"></script>
    <script src="{{ asset('home/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('home/js/slick.min.js') }}"></script>
    <script src="{{ asset('home/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('home/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('home/js/main.js') }}"></script>

</body>

</html>
