@extends('userlayouts.index')
@section('content')
    <div class="col-md-9">
        <div class="dreamcrub">
            <ul class="breadcrumbs">
                <li class="home">
                    <a href="#" title="Go to Home Page">Trang chủ</a>&nbsp;
                    <span>&gt;</span>
                </li>
                <li class="women">&nbsp;
                    &nbsp;Đăng ký người dùng
                    <span>&gt;</span>&nbsp;
                </li>
            </ul>
            <ul class="previous">
                <li><a href="#">Quay về trang chủ</a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <h3 class="m_1">Đăng Ký Người Dùng</h3>
        <div class="row">
            <form>
                <div class="col-md-12">
                    <div class="col-md-6 login-right">
                        <div>
                            <span>Tên shop<label> ( * )</label></span>
                            <input type="text">
                        </div>
                        <br>
                        <div>
                            <span>Số điện thoại<label> ( * )</label></span>
                            <input type="text">
                        </div>
                        <br>
                        <div>
                            <span>Email<label> ( * )</label></span>
                            <input type="text">
                        </div>
                        <br>
                        <div>
                            <span>Địa chỉ<label> ( * )</label></span>
                            <input type="text">
                        </div>
                        <br>
                        <label class="checkbox"><input id="checbox" type="checkbox" name="checkbox"><i> </i>Tôi đồng ý
                            với
                            <a href="">Chính sách bảo mật của Chúng Tôi</a></label>
                        <br>
                        <br>
                        <input id="btnsm" disabled type="submit" value="Đăng Ký">
                    </div>
                    <div class="col-md-6 login-right">
                        <div>
                            <span>Mật khẩu<label> ( * )</label></span>
                            <input type="text">
                        </div>
                        <br>
                        <div>
                            <span>Nhập lại mật khẩu<label> ( * )</label></span>
                            <input type="text">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        document.getElementById('checbox').onclick = function (e) {
            if (this.checked) {
                $('#btnsm').attr('disabled', false);
                alert("Bạn đồng ý với điều khoảng chúng tôi ?");
            }
            else {
                $('#btnsm').attr('disabled', true);
            }
        };

    </script>
@endsection