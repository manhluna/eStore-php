<!DOCTYPE html>
<html>
@include('userlayouts.thehead')
<style>
    .labelnew {
        margin-bottom: 5px;
        font-weight: 600;
        font-size: 14px;
    }

    .imgnew1 {
        width: 41px;
        height: 41px;
        border-radius: 41px;
    }

    .khanh {
        color: black !important;
        border-bottom: 1px solid !important;
    }

    .khanh1 {
        color: black !important;
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
                <a href="{{ url('user') }}">Thông tin đơn hàng</a>
                <span>|</span>
            </li>
            <li>danh sách</li>
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
            <h3 style="font-size: 26px;">Thông tin Đơn hàng</h3>
            <div class="w3_login_module">
                <section class="creditly-wrapper wthree, w3_agileits_wrapper">
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab">Hóa đơn đang chờ
                                duyệt &nbsp; <span style="color: red">{{ $sl_order_cd }}</span></a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-toggle="tab" href="#tab2" role="tab">Hóa đơn đang vận chuyển</a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-toggle="tab" href="#tab3" role="tab">Hóa đơn hoàn thành</a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-toggle="tab" href="#tab4" role="tab">Hóa đơn đã hủy</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active p-3" id="tab1" role="tabpanel">
                            <p class="font-14 mb-0">
                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="khanh">Stt</th>
                                    <th class="khanh">Mã hóa đơn</th>
                                    <th class="khanh">Tên</th>
                                    <th class="khanh">Số điện thoại</th>
                                    <th class="khanh">Tổng tiền</th>
                                    <th class="khanh">Địa chỉ giao</th>
                                    <th class="khanh"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order_cd as $val)
                                    <tr>
                                        <td class="khanh1">{{ $val->stt }}</td>
                                        <td class="khanh1">{{ $val->mahoadon }}</td>
                                        <td class="khanh1">{{ $val->tennguoinhan }}</td>
                                        <td class="khanh1">{{ $val->sdtnguoinhan }}</td>
                                        <td class="khanh1">đ: {{ number_format($val->tongtien) }}</td>
                                        <td class="khanh1">{{ $val->diachigiao }}</td>
                                        <td class="khanh1">
                                            <a onclick="getDetails({{$val->idhoadon}})" class="btn btn-warning">
                                                <i class="fa fa-eye"></i> Xem
                                            </a>
                                            <a href="{{ route('HuyHDND',$val->idhoadon) }}" class="btn btn-danger"
                                               onclick="return confirm('Bạn có chắc là ngưng bán sản phẩm này ?')">
                                                <i class="fa fa-trash-o"></i> Hủy
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </p>
                        </div>
                        <div class="tab-pane p-3" id="tab2" role="tabpanel">
                            <p class="font-14 mb-0">
                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="khanh">Stt</th>
                                    <th class="khanh">Mã hóa đơn</th>
                                    <th class="khanh">Tên</th>
                                    <th class="khanh">Số điện thoại</th>
                                    <th class="khanh">Tổng tiền</th>
                                    <th class="khanh">Địa chỉ giao</th>
                                    <th class="khanh"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order_vc as $val)
                                    <tr>
                                        <td class="khanh1">{{ $val->stt }}</td>
                                        <td class="khanh1">{{ $val->mahoadon }}</td>
                                        <td class="khanh1">{{ $val->tennguoinhan }}</td>
                                        <td class="khanh1">{{ $val->sdtnguoinhan }}</td>
                                        <td class="khanh1">đ: {{ number_format($val->tongtien) }}</td>
                                        <td class="khanh1">{{ $val->diachigiao }}</td>
                                        <td class="khanh1">
                                            <a onclick="getDetails({{$val->idhoadon}})" class="btn btn-warning">
                                                <i class="fa fa-eye"></i> Xem
                                            </a>
                                            <a class="btn btn-success">
                                                Đang vận chuyển
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </p>
                        </div>
                        <div class="tab-pane p-3" id="tab3" role="tabpanel">
                            <p class="font-14 mb-0">
                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="khanh">Stt</th>
                                    <th class="khanh">Mã hóa đơn</th>
                                    <th class="khanh">Tên</th>
                                    <th class="khanh">Số điện thoại</th>
                                    <th class="khanh">Tổng tiền</th>
                                    <th class="khanh">Địa chỉ giao</th>
                                    <th class="khanh"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order_ht as $val)
                                    <tr>
                                        <td class="khanh1">{{ $val->stt }}</td>
                                        <td class="khanh1">{{ $val->mahoadon }}</td>
                                        <td class="khanh1">{{ $val->tennguoinhan }}</td>
                                        <td class="khanh1">{{ $val->sdtnguoinhan }}</td>
                                        <td class="khanh1">đ: {{ number_format($val->tongtien) }}</td>
                                        <td class="khanh1">{{ $val->diachigiao }}</td>
                                        <td class="khanh1">
                                            <a onclick="getDetails({{$val->idhoadon}})" class="btn btn-warning">
                                                <i class="fa fa-eye"></i> Xem
                                            </a>
                                            <a class="btn btn-success">
                                                Đã hoàn thành
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </p>
                        </div>
                        <div class="tab-pane p-3" id="tab4" role="tabpanel">
                            <p class="font-14 mb-0">
                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="khanh">Stt</th>
                                    <th class="khanh">Mã hóa đơn</th>
                                    <th class="khanh">Tên</th>
                                    <th class="khanh">Số điện thoại</th>
                                    <th class="khanh">Tổng tiền</th>
                                    <th class="khanh">Địa chỉ giao</th>
                                    <th class="khanh"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order_h as $val)
                                    <tr>
                                        <td class="khanh1">{{ $val->stt }}</td>
                                        <td class="khanh1">{{ $val->mahoadon }}</td>
                                        <td class="khanh1">{{ $val->tennguoinhan }}</td>
                                        <td class="khanh1">{{ $val->sdtnguoinhan }}</td>
                                        <td class="khanh1">đ: {{ number_format($val->tongtien) }}</td>
                                        <td class="khanh1">{{ $val->diachigiao }}</td>
                                        <td class="khanh1">
                                            <a onclick="getDetails({{$val->idhoadon}})" class="btn btn-warning">
                                                <i class="fa fa-eye"></i> Xem
                                            </a>
                                            <a class="btn btn-success">
                                                Đã hủy
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div id="detailHoaDon" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #83d8cc">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Chi Tiết Hóa Đơn</h5>
                    <button style="margin-top: -20px" type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body" style="padding: 40px;">
                    <div>Mã Hóa Đơn: <span style="color: red" id="mahoadon"></span></div>
                    <div>Họ Tên: <span style="color: red" id="hoten"></span></div>
                    <div>Số Điện Thoại: <span style="color: red" id="sdt"></span></div>
                    <div>Địa Chỉ: <span style="color: red" id="diachi"></span></div>
                    <hr>
                    <p style="color: blue">Danh sách các sản phẩm</p>
                    <table id="detailBill" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Tên sp</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Tổng tiền</th>
                        </tr>
                        </thead>
                        <tbody id="body-detail">
                        </tbody>
                    </table>
                    <p style="float: right;color: red">Tổng Tiền: đ :<span id="tongtien"></span></p>
                </div>
            </div>
        </div>
    </div>
</div>
@include('userlayouts.footer')
@if(\Illuminate\Support\Facades\Session::get('clear_session')==1)
    <script>
        sessionStorage.clear();
    </script>
@endif
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
<script type="text/javascript">
    function getDetails(id) {
        $.ajax({
            type: 'GET',
            url: '{{route('XemChiTiet')}}',
            data: {
                id: id
            },
            success: function (res) {
                chitiet = res.data.chitiet;
                $("#body-detail").innerHTML = '';
                $("#mahoadon").html(res.data.hoadon.mahoadon);
                $("#hoten").html(res.data.hoadon.hoten);
                $("#sdt").html(res.data.hoadon.sdt);
                $("#diachi").html(res.data.hoadon.diachi);
                $("#tongtien").html(Number(res.data.hoadon.tongtien).toLocaleString('en'));
                // $("#tongtien").html(res.data.hoadon.tong_tien_hoa_don);
                htmlTable = '';
                chitiet.forEach(function (element) {
                    htmlTable = htmlTable +
                        "<tr>" +
                        "<td>" + element.tensp + "</td>" +
                        "<td>" + element.slmua + ': sản phẩm' + "</td>" +
                        "<td>" + 'đ: ' + Number(element.giasp).toLocaleString('en') + "</td>" +
                        "<td>" + 'đ: ' + Number(element.thanhtien).toLocaleString('en') + "</td>" +
                        // "<td>" + element.thuonghieusp + "</td>" +
                        // "<td>" + toMoney(element.thanh_tien) + "</td>" +
                        "</tr>";
                });
                $("#body-detail").html(htmlTable);
                // $("#detailBill").DataTable();
                $("#detailHoaDon").modal('show');
            }
        });
    }
</script>
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>
@include('userlayouts.messages')
</body>
</html>