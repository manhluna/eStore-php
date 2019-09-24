<!DOCTYPE html>
<html>
@include('userlayouts.thehead')
<style>
    .labelnew {
        margin-bottom: 5px;
        font-weight: 600;
        font-size: 14px;
    }
</style>

<body>
@include('userlayouts.header')
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li>
                <i class="fa fa-home" aria-hidden="true"></i>
                <a href="{{ url('user') }}">Trang chủ</a><span>|</span>
            </li>
            <li>Đăng ký mở gian hàng</li>
        </ul>
    </div>
</div>
<div class="banner">
    @include('userlayouts.category')
    <div class="w3l_banner_nav_right">
        <div class="w3_login">
            <h3>Đăng Ký Gian Hàng</h3>
            <div class="w3_login_module">
                <div class="module form-module">
                    <div class="">
                    </div>
                    <div class="form">
                        <h2>Đăng ký mở gian hàng</h2>
                        <form action="{{ route('gh.regesterStore') }}" method="post">
                            @csrf
                            <label class="labelnew"><span style="color: red;">(*)</span> Số điện thoại :</label>
                            <input value="{{ old('phone') }}" type="text" name="phone" placeholder="Số điện thoại">

                            <label class="labelnew"><span style="color: red;">(*)</span> Mật khẩu :</label>
                            <input type="password" name="password" placeholder="Mật khẩu">

                            <label class="labelnew"><span style="color: red;">(*)</span> Nhập lại mật khẩu :</label>
                            <input type="password" name="repassword" placeholder="Mật khẩu">

                            <label class="labelnew"><span style="color: red;">(*)</span> Tên gian hàng :</label>
                            <input value="{{ old('gh_ten') }}" type="text" name="gh_ten" placeholder="Tên gian hàng">

                            <label class="labelnew"><span style="color: red;">(*)</span> Địa chỉ email :</label>
                            <input value="{{ old('email') }}" type="email" name="email" placeholder="Địa chỉ email">

                            <label class="labelnew"><span style="color: red;">(*)</span> Địa chỉ :</label>
                            <input value="{{ old('gh_dia_chi') }}" type="text" name="gh_dia_chi" placeholder="Địa chỉ">

                            <hr>
                            <div style="display: -webkit-box;">
                                <input id="checbox" type="checkbox" name="checkbox">
                                <div style="font-size: 13px;margin-left: 5px;">
                                    Tôi đồng ý với <a href="">Chính sách bảo mật của Chúng Tôi.</a>
                                </div>
                            </div>
                            <br>
                            <input disabled id="btnsm" type="submit" value="Đăng Ký">
                        </form>
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