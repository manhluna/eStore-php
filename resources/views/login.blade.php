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
</style>
<body>
@include('userlayouts.header')
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ url('user') }}">Trang chủ</a><span>|</span></li>
            <li>Đăng nhập & Đăng ký</li>
        </ul>
    </div>
</div>
<div class="banner">
    @include('userlayouts.category')
    <div class="w3l_banner_nav_right">
        <div class="w3_login">
            <h3>Đăng Nhập</h3>
            <div class="w3_login_module">
                <div class="module form-module">
                    <div class="toggle"><i class="fa fa-times fa-pencil"></i>
                        <div class="tooltip">Đăng Ký</div>
                    </div>
                    <div class="form">
                        <h2>Đăng nhập tài khoản của bạn</h2>
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <label class="labelnew"><span style="color: red;">(*)</span> Số điện thoại :</label>
                            <input type="text" name="phone" placeholder="Nhập số điện thoại" required=" ">
                            <label class="labelnew"><span style="color: red;">(*)</span> Mật khẩu :</label>
                            <input type="password" name="password" placeholder="Mật khẩu từ 6 đến 32 ký tự" required=" ">
                            <input type="submit" value="Đăng Nhập">
                        </form>
                    </div>
                    <div class="form">
                        <h2>Đăng ký tài khoản mới</h2>
                        <form action="{{ route('registerNDstore') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label class="labelnew"><span style="color: red;">(*)</span> Số điện thoại :</label>
                            <input value="{{ old('phone') }}" type="text" name="phone"
                                   placeholder="Nhập số điện thoại của bạn"
                                   required>

                            <label class="labelnew"><span style="color: red;">(*)</span> Mật khẩu :</label>
                            <input type="password" name="password" placeholder="Tối thiểu 6 kí tự bao gồm cả chữ và số"
                                   required>

                            <label class="labelnew"><span style="color: red;">(*)</span> Nhập lại mật khẩu :</label>
                            <input type="password" name="repassword"
                                   placeholder="Tối thiểu 6 kí tự bao gồm cả chữ và số"
                                   required>

                            <label class="labelnew"><span style="color: red;">(*)</span> Tên :</label>
                            <input value="{{ old('kh_ten') }}" type="text" name="kh_ten" placeholder="Họ Tên"
                                   required>

                            <label class="labelnew"><span style="color: red;">(*)</span> Ngày sinh :</label>
                            <input value="{{ old('kh_ngay_sinh') }}" style="width: 100%;" type="date" name="kh_ngay_sinh">

                            <div class="form-group" style="margin-top: 15px;">
                                <div class="form-check">
                                    <label style="font-size: 14px"><span style="color: red;">(*)</span> Giới tính:</label> &nbsp &nbsp &nbsp &nbsp
                                    <input class="form-check-input" name="kh_gioi_tinh" value="Nam" type="radio"
                                           id="nam" checked>
                                    <label style="font-size: 14px;font-weight: normal" class="form-check-label" for="nam">Nam</label> &nbsp &nbsp &nbsp &nbsp
                                    <input class="form-check-input" name="kh_gioi_tinh" value="Nữ" type="radio" id="nu">
                                    <label style="font-size: 14px;font-weight: normal" class="form-check-label" for="nu">Nữ</label>
                                </div>
                            </div>

                            <label class="labelnew"><span style="color: red;">(*)</span> Địa chỉ email :</label>
                            <input value="{{ old('email') }}" type="text" name="email"
                                   placeholder="Vui lòng nhập email của bạn"
                                   required>


                            {{--<label class="labelnew">Địa chỉ :</label>--}}
                            {{--<input value="{{ old('kh_dia_chi') }}" type="text" name="kh_diachi" placeholder="Địa chỉ">--}}

                            {{--<label class="labelnew">CMND :</label>--}}
                            {{--<input value="{{ old('kh_cmnd') }}" type="text" name="kh_cmnd" placeholder="cmnd">--}}

                            {{--<label class="labelnew" style="width: 100%;">Ngày CMND :</label>--}}
                            {{--<input value="{{ old('kh_ngay_cap') }}" style="width: 100%;" type="date" name="kh_ngay_cap">--}}

                            {{--<br>--}}
                            {{--<br>--}}
                            <label class="labelnew">Mã giới thiệu :</label>
                            <p class="help-block" style="font-size: 12px;color: red;">
                            Lưu ý: Nhập chính xác mã người giới thiệu.
                            </p>
                            <input style="text-transform: uppercase" type="text" name="ma_code_cha">

                            {{--<label class="labelnew" style="width: 100%;">Ảnh đại diện :</label>--}}
                            {{--<div style="display: flex;">--}}
                            {{--<img class="imgnew" id="avatar" src="{{url('upload')}}/image.png" alt="your image"/>--}}
                            {{--</div>--}}
                            {{--<br>--}}
                            {{--<input type='file' name="file" onchange="readURL(this)"/>--}}

                            <hr>
                            <div style=" display: -webkit-box;">
                                <input id="checbox" type="checkbox" name="checkbox">
                                <div style="font-size: 13px;margin-left: 5px;">
                                    Tôi đồng ý với <a href="{{ route('secret') }}">Chính sách bảo mật của Chúng Tôi.</a>
                                </div>
                            </div>
                            <br>
                            <input disabled id="btnsm" type="submit" value="Đăng Ký">
                        </form>
                    </div>
                    <div class="cta">
                        <a style="text-decoration: underline;" href="#">Quên mật khẩu ? </a>
                        <span>  |  </span>
                        <a style="text-decoration: underline;color: red" href="{{ route('gh.resgiterGH') }}"> Đăng ký
                            gian hàng !</a>
                    </div>
                </div>
            </div>
            <script>
                $('.toggle').click(function () {
                    $(this).children('i').toggleClass('fa-pencil');
                    $('.form').animate({
                        height: "toggle",
                        'padding-top': 'toggle',
                        'padding-bottom': 'toggle',
                        opacity: "toggle"
                    }, "slow");
                });
            </script>
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
<script src="{{ url('userlayouts/webuser/js/minicart.js') }}"></script>
<script>
    paypal.minicart.render();
    paypal.minicart.cart.on('checkout', function (evt) {
        var items = this.items(),
            len = items.length,
            total = 0,
            i;
        for (i = 0; i < len; i++) {
            total += items[i].get('quantity');
        }
        if (total < 3) {
            alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
            evt.preventDefault();
        }
    });
</script>
<script type="text/javascript">
    document.getElementById('checbox').onclick = function (e) {
        if (this.checked) {
            $('#btnsm').attr('disabled', false);
            alert("Tôi đồng ý với Chính sách bảo mật của Chúng Tôi ?");
        }
        else {
            $('#btnsm').attr('disabled', true);
        }
    };

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#avatar").attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
            console.log(document.getElementById('fileAvatar').value);
        }
    }
</script>
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>
@include('userlayouts.messages')
</body>
</html>