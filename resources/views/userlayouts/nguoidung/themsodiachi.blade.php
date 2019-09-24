<!DOCTYPE html>
<html>
@include('userlayouts.thehead')
<style>
    .labelnew {
        margin-bottom: 5px;
        font-weight: 600;
        font-size: 14px;
    }

    .imgnew {
        width: 100px;
        height: 100px;
        margin: auto;
        border-radius: 30px;
    }

    .erorr {
        margin-top: -15px;
        font-size: 12px;
        color: red;
        margin-bottom: 10px;
    }

    .imgnew1 {
        width: 41px;
        height: 41px;
        border-radius: 41px;
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
            <li title="Trang chủ">
                <a href="{{ url('user') }}">Sổ địa chỉ</a>
                <span>|</span>
            </li>
            <li>Thêm sổ địa chỉ</li>
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
            <h3 style="font-size: 26px;">Thêm Địa Chỉ Mới</h3>
            <div class="w3_login_module">
                <div class="module form-module">
                    <div class="">
                    </div>
                    <div class="form">
                        <form action="{{ route('ThemDiaChiStore') }}" method="post">
                            @csrf
                            <label class="labelnew"><span style="color: red;">(*)</span> Họ Tên :</label>
                            <input value="{{ old('sp_ten') }}" type="text" name="ten_kh"
                                   placeholder="Họ tên">
                            <label class="labelnew"><span style="color: red;">(*)</span> Số điện thoại :</label>
                            <input value="{{ old('sp_ten') }}" type="text" name="sdt_kh"
                                   placeholder="Vui lòng nhập số điện thoại của bạn">
                            <label class="labelnew"><span style="color: red;">(*)</span> Địa chỉ :</label>
                            <input value="{{ old('sp_ten') }}" type="text" name="dia_chi"
                                   placeholder="Vui lòng nhập địa chỉ của bạn">
                            <label class="labelnew"><span style="color: red;">(*)</span> Tỉnh/Thành phố :</label>
                            <div class="form-group">
                                <select class="form-control" name="tinhthanh" id="tinhthanh">
                                    <option value="">Vui lòng chọn Tỉnh/Thành phố</option>
                                    @foreach($tinhthanh as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->tinhthanh }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="labelnew"><span style="color: red;">(*)</span> Quận/Huyện :</label>
                            <div class="form-group">
                                <select class="form-control" name="quanhuyen" id="quanhuyen" disabled>
                                    <option value="">Vui lòng chọn Quận/Huyện</option>
                                </select>
                            </div>
                            <label class="labelnew"><span style="color: red;">(*)</span> Phường/Xã :</label>
                            <div class="form-group">
                                <select class="form-control" name="phuongxa" id="phuongxa" disabled>
                                    <option value="">Vui lòng chọn Phường/Xã</option>
                                </select>
                            </div>

                            <br>
                            <input id="btnsm" type="submit" value="Lưu">
                        </form>
                    </div>
                </div>
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


        $("#tinhthanh").unbind('change').on('change', function () {
            $.ajax({
                url: "{{ route('ajaxQuanHuyen') }}",
                data: {
                    id: $('#tinhthanh').val()
                },
                success: function (data) {
                    $("#quanhuyen").empty();
                    $("#quanhuyen").append(new Option('Vui lòng chọn Quận/Huyện',''));
                    data.map(function (val) {
                        $("#quanhuyen").append(new Option(val.quanhuyen, val.id));
                        $("#quanhuyen").removeAttr("disabled");
                    });
                    $("#quanhuyen").unbind('change').on('change', function () {
                        $.ajax({
                            url: "{{ route('ajaxPhuongXa') }}",
                            data: {
                                id: $('#quanhuyen').val()
                            },
                            success: function (data) {
                                console.log(data);
                                $("#phuongxa").empty();
                                $("#phuongxa").append(new Option('Vui lòng chọn Phường/Xã',''));
                                data.map(function (val) {
                                    $("#phuongxa").append(new Option(val.phuongxa, val.id));
                                    $("#phuongxa").removeAttr("disabled");
                                });
                            }
                        });
                    });
                }
            });
        });
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