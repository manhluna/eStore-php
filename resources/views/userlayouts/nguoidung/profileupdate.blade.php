<!DOCTYPE html>
<html>
@include('userlayouts.thehead')
<style>
    .imgnew1 {
        width: 41px;
        height: 41px;
        border-radius: 41px;
    }

    .imgnew2 {
        width: 200px;
        height: 200px;
        border-radius: 10px
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
            <li title="Trang chủ">
                <i class="fa fa-home" aria-hidden="true"></i>
                <a href="{{ url('user') }}">Trang chủ</a>
                <span>|</span>
            </li>
            <li>Cập nhật thông tin cá nhân</li>
        </ul>
    </div>
</div>
<div class="banner">
    <div class="w3l_banner_nav_left">
        <nav class="navbar nav_bottom">
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                <ul class="nav navbar-nav nav_1">
                    <li>
                        <a style="color: red">
                            @if(\App\NguoiDungModel::where('user_id','=',Auth::user()->id)->first()->kh_image == null)
                                <img class="imgnew1" src="{{ url('imageKH/images.png') }}">
                            @else
                                <img class="imgnew1"
                                     src="{{ url('imageKH') }}/{{\App\NguoiDungModel::where('user_id','=',Auth::user()->id)->first()->kh_image}}">
                            @endif
                            Xin chào,
                            <b>{{ \App\NguoiDungModel::where('user_id','=',Auth::user()->id)->first()->kh_ten }}</b>
                        </a>
                    </li>
                    <li><a>{{ Auth::user()->phone }}</a></li>
                    <li><a>{{ Auth::user()->email }}</a></li>
                </ul>
                <ul class="nav navbar-nav nav_1">
                    <li>
                        <a href="{{ route('profileCaNhan') }}">Thông tin cá nhân</a>
                        <a href="{{ route('XemDH') }}">Đơn hàng của tôi</a>
                        <a href="{{ route('SoDiaChi') }}">Sổ địa chỉ</a>
                        <a href="{{ route('LichSu') }}">Lịch sử giao dịch</a>
                        {{--<a href="#">Thông báo của tôi</a>--}}
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="w3l_banner_nav_right">
        <div class="w3_login" style="padding-top: 1em">
            <h3 style="font-size: 26px;">Cập nhật thông tin cá nhân</h3>
            <div class="w3_login_module">
                <br>
                <form action="{{ route('profileUppdate') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-4" style="font-size: 14px">
                                <div class="ttcn" style="font-weight: bold;">Tên</div>
                                <input class="ttcn form-control" type="text"
                                       value="{{ \App\NguoiDungModel::where('user_id','=',Auth::user()->id)->first()->kh_ten }}"
                                       name="ten_kh"
                                       style="font-style: italic;">
                                <div class="ttcn" style="font-weight: bold;">Địa chỉ email</div>
                                <input class="ttcn form-control" style="font-style: italic;" type="text"
                                       value="{{ Auth::user()->email }}" name="email_kh">
                                <div class="ttcn" style="font-weight: bold;">Ngày sinh</div>
                                <input class="ttcn form-control" type="date"
                                       value="{{ \App\NguoiDungModel::where('user_id','=',Auth::user()->id)->first()->kh_ngay_sinh }}"
                                       name="ngay_sinh_kh"
                                       style="font-style: italic;">
                                <div class="ttcn" style="font-weight: bold;">Giấy CMND</div>
                                @if(\App\NguoiDungModel::where('user_id','=',Auth::user()->id)->first()->kh_cmnd == null)
                                    <input class="ttcn form-control" style="color: red;font-style: italic;" value=""
                                           type="text" name="cmnd_kh">
                                @else
                                    <input class="ttcn form-control" type="text"
                                           value="{{ \App\NguoiDungModel::where('user_id','=',Auth::user()->id)->first()->kh_cmnd }}"
                                           name="cmnd_kh"
                                           style="font-style: italic;">
                                @endif
                                <div class="ttcn" style="font-weight: bold;">Ngày Cấp</div>
                                @if(\App\NguoiDungModel::where('user_id','=',Auth::user()->id)->first()->kh_ngay_cap == null)
                                    <input class="ttcn form-control" style="color: red;font-style: italic;" value=""
                                           name="ngay_cap_kh" type="date">
                                @else
                                    <input class="ttcn form-control" type="date" name="ngay_cap_kh"
                                           value="{{ \App\NguoiDungModel::where('user_id','=',Auth::user()->id)->first()->kh_ngay_cap }}"
                                           style="font-style: italic;">
                                @endif
                            </div>
                            <div class="col-md-4" style="font-size: 14px">
                                <div class="ttcn" style="font-weight: bold;">Số điện thoại</div>
                                <input class="ttcn form-control" value="{{ Auth::user()->phone }}" name="phone"
                                       type="text"
                                       style="font-style: italic;">
                                <div class="ttcn" style="font-weight: bold;">Giới tính</div>
                                <select class="ttcn form-control" style="font-style: italic;" name="gioi_tinh_kh">
                                    @if(\App\NguoiDungModel::where('user_id','=',Auth::user()->id)->first()->kh_gioi_tinh == 'Nam')
                                        <option value="Nam" selected>Nam</option>
                                        <option value="Nữ">Nữ</option>
                                    @else
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ" selected>Nữ</option>
                                    @endif
                                </select>
                                <div class="ttcn" style="font-weight: bold;">Mã giới thiệu</div>
                                <div class="ttcn"
                                     style="color: #fb02e6;font-style: italic;">{{ Auth::user()->code }}</div>
                                <div class="ttcn" style="font-weight: bold;">Địa chỉ</div>
                                @if(\App\NguoiDungModel::where('user_id','=',Auth::user()->id)->first()->kh_dia_chi == null)
                                    <input class="ttcn form-control" style="color: red;font-style: italic;" value=""
                                           name="dia_chi_kh" type="text">
                                @else
                                    <input class="ttcn form-control" name="dia_chi_kh" type="text"
                                           value="{{ \App\NguoiDungModel::where('user_id','=',Auth::user()->id)->first()->kh_dia_chi }}"
                                           style="font-style: italic;">
                                @endif
                                <div class="ttcn" style="font-weight: bold;">Người giới thiệu</div>
                                @if(\App\HoaHongKhachHangModel::where('user_id','=',Auth::user()->id)->first()->ma_code_cha == 0)
                                    <input class="ttcn form-control" style="color: red;font-style: italic;" value=""
                                           type="text" name="ma_code_cha">
                                @else
                                    <div class="ttcn"
                                         style="font-style: italic;color: red">{{ \App\NguoiDungModel::where('user_id','=',\App\HoaHongKhachHangModel::where('user_id','=',Auth::user()->id)->first()->ma_code_cha)->first()->kh_ten }}</div>
                                @endif

                            </div>
                            <div class="col-md-4" style="margin-top: 10px;display: block;">
                                @if(\App\NguoiDungModel::where('user_id','=',Auth::user()->id)->first()->kh_image == null)
                                    <img class="imgnew2" src="{{ url('imageKH/images.png') }}">
                                @else
                                    <img class="imgnew2" id="avatar"
                                         src="{{ url('imageKH',\App\NguoiDungModel::where('user_id','=',Auth::user()->id)->first()->kh_image) }}">
                                @endif
                                <br>
                                <input type="file" name="file" onchange="readURL(this)">
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
                <br>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
@include('userlayouts.footer')
@if(\Illuminate\Support\Facades\Session::get('clear_session')==1)
    <script>
        sessionStorage.clear();
    </script>
@endif
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