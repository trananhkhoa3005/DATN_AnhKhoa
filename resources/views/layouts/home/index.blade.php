<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>AkShop</title>

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
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
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
                    <li><a href="#"><i class="fa fa-phone"></i> 0876760783</a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> akshop@gmail.com</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> 05 Lạc Long Quân</a></li>
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
                            
                                <h1 style=" color: white; margin-top: 8%;">AKShop<span style="color: red">.</span>
                                </h1>
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
                                                <button style="width: 100%; border: none; background-color: beige"><a
                                                        class="dropdown-item" href="{{ route('home.myaccount') }}">Tài
                                                        khoản</a></button>
                                                <button style="width: 100%; border: none; background-color: beige"><a
                                                        class="dropdown-item" href="{{ route('home.myorder') }}">Đơn
                                                        hàng</a></button>
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
                        <li><a href="{{ route('home.index', ['mahsx' => $row->MaHSX]) }}">{{ $row->TenHSX }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>




    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                @yield('sanphamhot')
                <!-- /section title -->

                <!-- Products tab & slick -->

                <!-- Sản phẩm -->
                @if (route('home.myaccount') != url()->current() && route('home.myorder') != url()->current())
                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title" style="color: brown;">Danh mục</h3>
                            <div class="section-nav">
                                <!-- Menu Loại -->
                                <ul class="section-tab-nav tab-nav">
                                    @foreach ($loaisp as $row)
                                        <li><a
                                                href="{{ route('home.index', ['maloai' => $row->MaLoai]) }}">{{ $row->TenLoai }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <div class="row">
                                @yield('sanpham')
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- /row -->
        </div>
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
                            <h3 class="footer-title">AKShop</h3>
                            <p>Mang đến cho bạn những sản phẩm uy tín và chất lượng.</p>
                            <ul class="footer-links">
                                <li><a href="https://www.google.com/maps/place/5+L%E1%BA%A1c+Long+Qu%C3%A2n,+Ho%C3%A0+Kh%C3%A1nh+B%E1%BA%AFc,+Li%C3%AAn+Chi%E1%BB%83u,+%C4%90%C3%A0+N%E1%BA%B5ng+550000,+Vi%E1%BB%87t+Nam/@16.0766413,108.1446854,17z/data=!3m1!4b1!4m6!3m5!1s0x314218d386923ddb:0x547afba754f2a84b!8m2!3d16.0766362!4d108.1472603!16s%2Fg%2F11hbljy4c_?hl=vi-VN&entry=ttu&g_ep=EgoyMDI1MDExMC4wIKXMDSoASAFQAw%3D%3D"><i class="fa fa-map-marker"></i>05 Lạc Long Quân</a></li>
                                <li><a href="tel:0123456789"><i class="fa fa-phone"></i>0876760783</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i>trananhkhoa3005@gmail.com</a></li>
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
                                <li><a href="https://cep.edu.vn/vi-vn/">Về chúng tôi</a></li>
                                <li><a href="https://web.facebook.com/anhkhoa3012">Liên hệ</a></li>
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
                            Copyright &copy; 2024 AKShop
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
