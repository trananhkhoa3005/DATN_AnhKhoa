<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Index</title>
    <!-- Bootstrap -->
    <link href="{{ asset('admin/asset/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('admin/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('admin/asset/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('admin/asset/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('admin/asset/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}"
        rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('admin/css/custom.min.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('admin/css/mycss.css') }}" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{ route('admin.index') }}" class="site_title"><i class="fa fa-diamond"></i><span
                                style="color: red; margin-left: 7px;">AKShop</span></a>
                    </div>
                    <div class="clearfix"></div>
                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="{{ asset('admin/img/img.jpg') }}" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Chào, </span>
                            <h2>{{ Session::get('username') }}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->
                    <br />
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>Chức năng</h3>
                            <ul class="nav side-menu">
                                <li><a href="{{ route('admin.sanpham') }}"><i class="fa fa-home"></i> Quản lý sản
                                        phẩm</a></li>
                                <li><a href={{ route('admin.loaisp') }}><i class="fa fa-sliders"></i> Quản lý loại sản
                                        phẩm</a></li>
                                <li><a href={{ route('admin.hangsx') }}><i class="fa fa-newspaper-o"></i> Quản lý
                                        hãng</a></li>
                                <li><a href={{ route('admin.user') }}><i class="fa fa-user"></i> Quản lý người dùng</a>
                                </li>
                                <li><a href={{ route('admin.donhang') }}><i class="fa fa-shopping-cart"></i> Quản lý
                                        đơn hàng</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->
                </div>
            </div>
            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                        <ul class="nav navbar-nav navbar-right">
                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <form action="{{ route('logout') }}" method="POST" class="mb-0">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Đăng xuất</button>
                                    </form>
                                </a>
                            </li>
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="{{ asset('admin/img/img.jpg') }}"
                                        alt="">{{ Session::get('username') }}
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->
            <!-- page content -->
            <div class="right_col" role="main">
                @yield('content')
            </div>
            <!-- /page content -->
            <!-- footer -->
            <footer>
                <div class="pull-right">
                    Điện tử <a href="#">AKShop.com</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer -->
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('admin/js/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('admin/asset/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('admin/js/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('admin/asset/nprogress/nprogress.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('admin/asset/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('admin/asset/iCheck/icheck.min.js') }}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('admin/js/custom.min.js') }}"></script>
</body>

</html>
