<!DOCTYPE html>
<html>
@include('userlayouts.thehead')
<style>
    .khanh {
        color: black !important;
        border-bottom: 1px solid !important;
    }

    .khanh1 {
        color: black !important;
        border: 0.5px solid !important;
    }

    .imgnew2 {
        width: 200px;
        height: 200px;
        border-radius: 10px
    }

    .imgnew {
        width: 41px;
        height: 41px;
        border-radius: 41px;
    }

    .ttcn {
        margin-top: 10px;
        margin-bottom: 10px;
    }
</style>
<body>
@include('userlayouts.header')
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li title="Trang chủ"><i class="fa fa-home" aria-hidden="true"></i><a href="{{ url('user') }}">Trang chủ</a><span>|</span>
            </li>
            <li title="Thông tin gian hàng"><a href="{{ route('gh.profileGianHang') }}">Gian
                    hàng @if(!empty(Auth::user()))
                        : {{ Auth::user()->phone }}@else:@endif</a><span>|</span></li>
            <li title="Quản lý sản phẩm"><a href="{{ url('gian-hang/quan-ly-san-pham') }}">Quản lý sản
                    phẩm</a><span>|</span></li>
            <li title="Thông tin gian hàng">Thông tin gian hàng</li>
        </ul>
    </div>
</div>
<div class="banner">
    <div class="w3l_banner_nav_left">
        <br>
        <nav class="navbar nav_bottom">
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                <ul class="nav navbar-nav nav_1">
                    <li>
                        <a style="color: red">
                            <img class="imgnew" src="{{ url('upload/shop.jpg') }}">
                            Xin chào,
                            <b>{{ \App\GianHangUserModel::where('user_id','=',Auth::user()->id)->first()->gh_ten }}</b>
                        </a>
                    </li>
                    <li><a>{{ Auth::user()->phone }}</a></li>
                    <li><a>{{ Auth::user()->email }}</a></li>
                </ul>
                <ul class="nav navbar-nav nav_1">
                    <li><a style="color: red"><b>Quản Lý Sản Phẩm</b></a></li>
                    <li><a href="{{ route('gh.qlsanpham') }}">Danh sách sản phẩm</a></li>
                    <li><a href="{{ route('gh.tmsanpham') }}">Thêm sản phẩm mới</a></li>
                    <li><a href="{{ route('gh.profileGianHang') }}">Thông tin gian hàng</a></li>
                    {{--<li><a href="">Lịch sử bán các sản phẩm</a></li>--}}
                </ul>
            </div>
        </nav>
    </div>
    <div class="w3l_banner_nav_right">
        <div class="w3_login" style="padding-top: 1em">
            <h3 style="font-size: 26px;">Cập Nhật Thông Tin Gian Hàng</h3>
            <div class="w3_login_module">
                <br>
                <form action="{{ route('gh.profileUpdate') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-4" style="font-size: 14px">
                                <div class="ttcn" style="font-weight: bold;">Tên</div>
                                <input class="ttcn form-control" type="text"
                                       value="{{ \App\GianHangUserModel::where('user_id','=',Auth::user()->id)->first()->gh_ten }}"
                                       name="ten_gh"
                                       style="font-style: italic;">
                                <div class="ttcn" style="font-weight: bold;">Địa chỉ email</div>
                                <input class="ttcn form-control" style="font-style: italic;" type="text"
                                       value="{{ Auth::user()->email }}" name="email_gh">
                            </div>
                            <div class="col-md-4" style="font-size: 14px">
                                <div class="ttcn" style="font-weight: bold;">Số điện thoại</div>
                                <input class="ttcn form-control" value="{{ Auth::user()->phone }}" name="phone"
                                       type="text"
                                       style="font-style: italic;">
                                <div class="ttcn" style="font-weight: bold;">Địa chỉ</div>
                                @if(\App\GianHangUserModel::where('user_id','=',Auth::user()->id)->first()->gh_dia_chi == null)
                                    <input class="ttcn form-control" style="color: red;font-style: italic;" value="" name="dia_chi_gh">
                                @else
                                    <input class="ttcn form-control" name="dia_chi_gh"
                                           value="{{ \App\GianHangUserModel::where('user_id','=',Auth::user()->id)->first()->gh_dia_chi }}"
                                         style="font-style: italic;">
                                @endif
                            </div>
                            <div class="col-md-4" style="margin-top: 10px;display: block;">
                                <img class="imgnew2" src="{{ url('upload/shop.jpg') }}">
                                <div>
                                    <button type="submit" style="width: 200px; margin-top: 10px"
                                            class="btn btn-primary">Lưu
                                        thay đổi
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
@include('userlayouts.footer')
<script src="{{ url('userlayouts/webuser/js/bootstrap.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $(".dropdown").hover(
            function () {
                $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                $(this).toggleClass('open');
            },
            function () {
                $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                $(this).toggleClass('open');
            }
        );
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $().UItoTop({easingType: 'easeOutQuart'});
    });
</script>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#avatar").attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>
@include('userlayouts.messages')
</body>
</html>