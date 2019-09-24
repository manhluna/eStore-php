<!DOCTYPE html>
<html>
@include('userlayouts.thehead')
<style>
    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

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
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ url('user') }}">Trang chủ</a><span>|</span>
            </li>
            <li><a href="{{ route('gh.profileGianHang') }}">Gian hàng</a><span>|</span></li>
            <li><a href="{{ url('gian-hang/quan-ly-san-pham') }}">Quản lý sản phẩm</a><span>|</span></li>
            <li>Chi tiết sản phẩm</li>
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
                            <img class="imgnew1" src="{{ url('upload/shop.jpg') }}">
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
            <h3 style="font-size: 26px;">Chi tiết Sản Phẩm</h3>
            <div class="w3_login_module">
                <div class="module form-module">
                    <div class="">
                    </div>
                    <div class="form">
                        <label class="labelnew">Danh Mục :</label>
                        <div class="form-group">
                            <select class="form-control" disabled>
                                @foreach ($danhmuc as $key => $value)
                                    @if($value->id == $data->id_danh_muc)
                                        <option value="{{ $value->id }}" selected>{{ $value->dm_ten }}</option>
                                    @else
                                        <option value="{{ $value->id }}">{{ $value->dm_ten }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <label class="labelnew">Tên Sản Phẩm :</label>
                        <input value="{{ $data->sp_ten }}" type="text" disabled>

                        <label class="labelnew"> Thương hiệu :</label>
                        <input value="{{ $data->sp_thuong_hieu }}" type="text" disabled>

                        <label class="labelnew" style="width: 100%;">Ảnh sản phẩm :</label>
                        <div style="display: flex;">
                            @if(empty($data->sp_image))
                                <img class="imgnew" id="avatar" src="{{url('upload')}}/image.png" alt="your image"/>
                            @else
                                <img class="imgnew" id="avatar" src="{{url('upload',$data->sp_image)}}"
                                     alt="your image"/>
                            @endif
                        </div>
                        <br>

                        @if($data->gia_goc == 0)
                            <label class="labelnew" style="color: red">Giá Bán :</label>
                            <input value="chưa cập nhật" type="text" disabled>
                        @else
                            <label class="labelnew">Giá Bán :</label>
                            <input value="{{ number_format($data->gia_goc) }} vnđ" type="text" disabled>
                        @endif


                        @if($data->gia_km == 0)
                            <label class="labelnew" style="color: red">Giá Khuyến Mãi :</label>
                            <input value="chưa cập nhật" type="text" disabled>
                        @else
                            <label class="labelnew">Giá Khuyến Mãi :</label>
                            <input value="{{ number_format($data->gia_km) }} vnđ" type="text" disabled>
                        @endif

                        @if($data->sp_description == null)
                            <label class="labelnew" style="color: red">Mô tả sản phẩm :</label>
                            <textarea class="form-control" rows="5" type="text"
                                      disabled>chưa cập nhật</textarea>
                        @else
                            <label class="labelnew">Mô tả sản phẩm :</label>
                            <textarea class="form-control" rows="5" type="text"
                                      disabled>{{ $data->sp_description }}</textarea>
                        @endif

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