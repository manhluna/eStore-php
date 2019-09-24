<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"/>
    <title>LVTN - Admin Dashboard</title>
    <meta content="Admin Dashboard" name="description"/>
    <meta content="Themesdesign" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="shortcut icon" href="{{ url('adminlayouts/horizontal/assets/images/favicon.ico') }}"/>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('adminlayouts/horizontal/assets/plugins/morris/morris.css') }}"/>
    <link href="{{ url('adminlayouts/horizontal/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ url('adminlayouts/horizontal/assets/plugins/datatables/buttons.bootstrap4.min.css') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ url('adminlayouts/horizontal/assets/plugins/datatables/responsive.bootstrap4.min.css') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ url('adminlayouts/horizontal/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('adminlayouts/horizontal/assets/css/icons.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('adminlayouts/horizontal/assets/css/style.css') }}" rel="stylesheet" type="text/css"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<div id="preloader">
    <div id="status">
        <div class="spinner"></div>
    </div>
</div>
<header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">
            <div class="logo">
                <a href="{{ url('admin') }}" class="logo">Shop - LVTN</a>
            </div>
            <div class="menu-extras topbar-custom">
                <div class="search-wrap" id="search-wrap">
                    <div class="search-bar">
                        <input class="search-input" type="search" placeholder="Search"/>
                        <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                            <i class="mdi mdi-close-circle"></i>
                        </a>
                    </div>
                </div>
                <ul class="list-inline float-right mb-0">
                    <!-- notification-->
                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                           role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="mdi mdi-bell-outline noti-icon"></i>
                            <span class="badge badge-danger noti-icon-badge">
                                @if(\App\HoaDonModel::where('status','=',0)->get() == null)
                                    0
                                @else
                                    {{ count(\App\HoaDonModel::where('status','=',0)->get()) }}
                                @endif
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5>Hóa Đơn Mới
                                    @if(\App\HoaDonModel::where('status','=',0)->get() == null)
                                        (0)
                                    @else
                                        ({{ count(\App\HoaDonModel::where('status','=',0)->get()) }})
                                    @endif
                                </h5>
                            </div>

                            <!-- item-->
                            <a href="{{ route('hoadon.index') }}" class="dropdown-item notify-item active">
                                <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                <p class="notify-details"><b>Quản lý đơn hàng</b>
                                    <small class="text-muted">   .
                                    </small>
                                </p>
                            </a>
                        </div>
                    </li>
                    <!-- User-->
                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown"
                           href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ url('adminlayouts/horizontal/assets/images/users/admin.png') }}" alt="user"
                                 class="rounded-circle"/>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <a class="dropdown-item" href="#">
                                <i class="dripicons-user text-muted"></i> {{ Auth::user()->phone }}
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                <i class="dripicons-exit text-muted"></i> Đăng xuất
                            </a>
                        </div>
                    </li>
                    <li class="menu-item list-inline-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- MENU Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">

                    <li class="has-submenu">
                        <a href="{{ url('/admin') }}"><i class="ti-home"></i>Bảng điều khiển</a>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="ti-crown"></i>Quản Lý Danh Mục</a>
                        <ul class="submenu">
                            <li><a href="{{ route('dm.index') }}">Quản lý danh mục</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="ti-crown"></i>Quản Lý Hóa Đơn</a>
                        <ul class="submenu">
                            <li><a href="{{ route('hoadon.index') }}">Hóa đơn</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="ti-crown"></i>Quản Lý Hoa Hồng</a>
                        <ul class="submenu">
                            <li><a href="{{ route('pchh.index') }}">Phân cấp hoa hồng</a></li>
                            <li><a href="{{ route('LichSuHH') }}">Lịch sử nhận hoa hồng</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="ti-crown"></i>Quản Lý Gian Hàng</a>
                        <ul class="submenu">
                            <li><a href="{{ route('indexHG') }}">Danh sách</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
@yield('content')
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                © 2018 LVTN - Crafted with <i class="mdi mdi-heart text-danger"></i> by N-Q-KHANH.
            </div>
        </div>
    </div>
</footer>
<script src="{{ url('adminlayouts/horizontal/assets/js/jquery.min.js') }}"></script>
<script src="{{ url('adminlayouts/horizontal/assets/js/popper.min.js') }}"></script>
<script src="{{ url('adminlayouts/horizontal/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ url('adminlayouts/horizontal/assets/js/modernizr.min.js') }}"></script>
<script src="{{ url('adminlayouts/horizontal/assets/js/waves.js') }}"></script>
<script src="{{ url('adminlayouts/horizontal/assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ url('adminlayouts/horizontal/assets/js/jquery.nicescroll.js') }}"></script>
<script src="{{ url('adminlayouts/horizontal/assets/js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ url('adminlayouts/horizontal/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('adminlayouts/horizontal/assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('adminlayouts/horizontal/assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ url('adminlayouts/horizontal/assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ url('adminlayouts/horizontal/assets/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ url('adminlayouts/horizontal/assets/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ url('adminlayouts/horizontal/assets/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ url('adminlayouts/horizontal/assets/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ url('adminlayouts/horizontal/assets/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ url('adminlayouts/horizontal/assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
<script src="{{ url('adminlayouts/horizontal/assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('adminlayouts/horizontal/assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script type="text/javascript"
        src="{{ url('adminlayouts/horizontal/assets/plugins/parsleyjs/parsley.min.js') }}"></script>
<script src="{{ url('adminlayouts/horizontal/assets/js/app.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>
@include('adminlayouts.messages')
@yield('script')
</body>
</html>