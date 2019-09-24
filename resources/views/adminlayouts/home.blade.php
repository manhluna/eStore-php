@extends('adminlayouts.index')
@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group pull-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a>Quản Trị Viên</a></li>
                                <li class="breadcrumb-item active">Trang chủ</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Trang chủ</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="mini-stat clearfix bg-white">
                        <span class="mini-stat-icon bg-light">
                            <i class="mdi mdi-cart-outline text-danger"></i>
                        </span>
                        <div class="mini-stat-info text-right text-muted">
                            <span class="counter text-danger">{{ $order }}</span>
                            Đơn hàng
                        </div>
                        <p class="mb-0 m-t-20 text-muted">Tổng tiền đơn hàng: đ:{{ number_format($tongtien) }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="mini-stat clearfix bg-success">
                        <span class="mini-stat-icon bg-light">
                            <i class="mdi mdi-currency-usd text-success"></i>
                        </span>
                        <div class="mini-stat-info text-right text-white">
                            <span class="counter text-white">đ: {{ number_format($hoa_hong) }}</span>
                            Hoa hồng
                        </div>
                        <p class="mb-0 m-t-20 text-light">Hoa hồng thanh toán: đ: {{number_format($tong_hoa_hong)}}</p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="mini-stat clearfix bg-white">
                        <span class="mini-stat-icon bg-light">
                            <i class="mdi mdi-cube-outline text-warning"></i>
                        </span>
                        <div class="mini-stat-info text-right text-muted">
                            <span class="counter text-warning">{{ $nguoidung }}</span>
                            Người dùng
                        </div>
                        <p class="mb-0 m-t-20 text-muted">Người dùng thông thường: {{ $nguoidungthuong }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="mini-stat clearfix bg-info">
                        <span class="mini-stat-icon bg-light">
                            <i class="mdi mdi-currency-btc text-info"></i>
                        </span>
                        <div class="mini-stat-info text-right text-light">
                            <span class="counter text-white">{{ $gianhang }}</span>
                            Gian hàng
                        </div>
                        <p class="mb-0 m-t-20 text-light">Gian hàng kinh doanh: {{ $gianhangkinhdoanh }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Danh Sách Khách Hàng</h4>
                            <table id="datatable" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Stt</th>
                                    <th>Họ & Tên</th>
                                    <th>SĐT</th>
                                    <th>Người GT</th>
                                    <th>Code</th>
                                    <th>$ Tích Lũy</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($khachhang as $value)
                                    <tr>
                                        <td>{{ $value->stt }}</td>
                                        <td><a href="#" el="{{ $value->id }}"
                                               onclick="getDetails({{$value->id}})">{{ $value->kh_ten }}</a></td>
                                        <td>{{ $value->phone }}</td>
                                        <td style="text-align: center">
                                            @if(!empty($value->ma_code_cha))
                                                {{ \App\UsersModel::join('users_profile', 'users_profile.user_id', '=', 'users.id')
                                                    ->where('id', '=', $value->ma_code_cha)
                                                    ->select('users_profile.kh_ten as kh_ten')
                                                    ->get()
                                                    ->first()->kh_ten }}
                                            @else
                                                <span style="color: red"><i class="mdi mdi-block-helper"></i></span>
                                            @endif
                                        </td>
                                        <td style="color: #ff00f5">{{ $value->code }}</td>
                                        <td>đ: {{ number_format($value->tien_hoa_hong) }}</td>
                                        <td>
                                            @if($value->active == 1)
                                                <a href="{{ route('KhoaTK',$value->id) }}"
                                                   class="btn btn-outline-primary waves-effect waves-light"
                                                   onclick="return confirm('Bạn chắc muốn khóa tài khoản này ?')">
                                                    <i class="mdi mdi-key-variant"></i>
                                                </a>
                                            @else
                                                <a class="btn btn-outline-danger waves-effect waves-light">
                                                    <i class="mdi mdi-block-helper"></i>
                                                </a>
                                            @endif
                                            @if($value->tien_hoa_hong == 0)
                                                <a class="btn btn-outline-danger waves-effect waves-light">
                                                    <i class="mdi mdi-cash-usd"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('ThanhToanHH',$value->id) }}"
                                                   class="btn btn-outline-success waves-effect waves-light"
                                                   onclick="return confirm('Bạn chắc muốn thanh toán hoa hồng cho tài khoản này ?')">
                                                    <i class="mdi mdi-cash-usd"></i>
                                                </a>
                                            @endif
                                            <a el="{{ $value->id }}" onclick="getDetails({{$value->id}})"
                                               class="btn btn-outline-warning waves-effect waves-light">
                                                <i class="mdi mdi-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="detailKhachHang" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Thông tin chi tiết</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div style="width: 100%; text-align: center">
                        <div>
                            Mã Giới Thiệu: <span id="code" style="color: red"></span>
                        </div>
                    </div>
                    <div style="text-align: center; width: 100%" id="avatar">
                        <img style="width: 60px;height: 60px;border-radius: 68px;" src="{{ url('upload/img-5.jpg') }}" alt="Chưa cập nhật">
                    </div>
                    <div style="width: 100% ; text-align: center;margin: 10px;">
                        Họ & Tên: <span id="ten" style="color: red"></span>
                    </div>
                    <div style="width: 100% ; text-align: center;margin: 10px;">
                        Số Điện Thoại: <span id="sdt" style="color: red"></span>
                    </div>
                    <div style="width: 100% ; text-align: center;margin: 10px;">
                        Email: <span id="email" style="color: red"></span>
                    </div>
                    <div style="width: 100% ; text-align: center;margin: 10px;">
                        Giới Tính: <span id="kh_gioi_tinh" style="color: red"></span>
                    </div>
                    <div style="width: 100% ; text-align: center;margin: 10px;">
                        Ngày Sinh: <span id="kh_ngay_sinh" style="color: red"></span>
                    </div>
                    <div style="width: 100% ; text-align: center;margin: 10px;">
                        Số CMND: <span id="kh_cmnd" style="color: red"></span>
                    </div>
                    <div style="width: 100% ; text-align: center;margin: 10px;">
                        Ngày Cấp: <span style="color: red" id="kh_ngay_cap"></span>
                    </div>
                    <div style="width: 100% ; text-align: center;margin: 10px;">
                        Địa chỉ: <span id="kh_dia_chi" style="color: red"></span>
                    </div>
                    <div style="width: 100% ; text-align: center;margin: 10px;">
                        Người Giới Thiệu: <span id="gioithieu" style="color: red"></span>
                    </div>
                    <div style="width: 100% ; text-align: center;margin: 10px;">
                        Hoa Hồng: đ: <span id="hoahong" style="color: red"></span>
                    </div>
                    {{--<div style="width: 100% ; text-align: center;margin: 10px;">--}}
                    {{--Trạng Thái<span style="color: green" id="active">: Không khóa</span>--}}
                    {{--</div>--}}
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#datatable').DataTable();
        });
    </script>
    <script type="text/javascript">

        function getDetails(id) {
            // sessionStorage.setItem('id_temp', id);
            $.ajax({
                type: 'GET',
                url: '{{route('detail')}}',
                data: {
                    _token: '{{csrf_token()}}',
                    id: id
                },
                success: function (res) {
                    // $("#id_kh").attr("value", res.data.id ? res.data.id : 'Chưa cập nhật');
                    // $("#avatar").attr("src", res.data.kh_image ? '../upload/' + res.data.kh_image : 'Chưa cập nhật')
                    $("#ten").html(res.data.kh_ten ? res.data.kh_ten : 'Chưa cập nhật');
                    // $("#tongtien").html(res.gioithieu.tien_hoa_hong ? res.gioithieu.tien_hoa_hong : 0);
                    // $("#thoihan").html(res.gioithieu.danh_dau ? res.gioithieu.danh_dau : 'Chưa cập nhật');
                    $("#kh_ngay_sinh").html(res.data.kh_ngay_sinh ? res.data.kh_ngay_sinh : 'Chưa cập nhật');
                    $("#kh_gioi_tinh").html(res.data.kh_gioi_tinh ? res.data.kh_gioi_tinh : 'Chưa cập nhật');
                    $("#email").html(res.data.email ? res.data.email : 'Chưa cập nhật');
                    $("#code").html(res.data.code ? res.data.code : 'Chưa cập nhật');
                    $("#sdt").html(res.data.phone ? res.data.phone : 'Chưa cập nhật');
                    $("#active").html(res.data.active ? res.data.active : 'Đã khóa');
                    $("#kh_cmnd").html(res.data.kh_cmnd ? res.data.kh_cmnd : 'Chưa cập nhật');
                    $("#kh_ngay_cap").html(res.data.kh_ngay_cap ? res.data.kh_ngay_cap : 'Chưa cập nhật');
                    $("#kh_dia_chi").html(res.data.kh_dia_chi ? res.data.kh_dia_chi : 'Chưa cập nhật');
                    $("#hoahong").html(res.gioithieu.tien_hoa_hong ? res.gioithieu.tien_hoa_hong : '0');
                    $("#gioithieu").html(res.gioithieu.kh_ten ? res.gioithieu.kh_ten : 'Không có người giới thiệu');
                    $("#detailKhachHang").modal('show');
                }
            });
        }

        // function changInput() {
        //     $("#password").prop('readonly', false);
        //     console.log('xong')
        // }
    </script>
@endsection