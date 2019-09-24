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
            <li>Đổi mật khẩu</li>
        </ul>
    </div>
</div>
<div class="banner">
    <div class="w3l_banner_nav_right">
        <div class="w3_login">
            <h3>Đổi mật khẩu</h3>
            <div class="w3_login_module">
                <div class="module form-module">
                    <div class="">
                    </div>
                    <div class="form">
                        <form action="#" method="post">
                            @csrf
                            <label class="labelnew"><span style="color: red;">(*)</span> Mật khẩu  củ:</label>
                            <input type="password" name="password" placeholder="Mật khẩu củ">

                            <label class="labelnew"><span style="color: red;">(*)</span> Mật khẩu mới:</label>
                            <input type="password" name="password" placeholder="Mật khẩu mới">

                            <label class="labelnew"><span style="color: red;">(*)</span> Nhập lại mật khẩu mới :</label>
                            <input type="password" name="repassword" placeholder="Nhập lại mật khẩu mới">

                            <br>
                            <input disabled id="btnsm" type="submit" value="Đổi Mật Khẩu">
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