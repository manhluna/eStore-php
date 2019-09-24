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
    }

    .rownew {
        margin-left: 0px;
        margin-right: 0px;
    }
    .imgnew {
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
            <li>
                <i class="fa fa-home" aria-hidden="true"></i>
                <a href="{{ url('user') }}">Trang chủ</a>
                <span>|</span>
            </li>
            <li>
                <a href="{{ url('gian-hang/quan-ly-san-pham') }}">Quản lý sản phẩm</a>
                <span>|</span>
            </li>
            <li>Danh sách sản phẩm</li>
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
                            Xin chào, <b>{{ \App\GianHangUserModel::where('user_id','=',Auth::user()->id)->first()->gh_ten }}</b>
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
    <div class="w3l_banner_nav_right" style="margin-bottom: 15px;">
        <div class="w3_login_module">
            <div class="row rownew">
                {!! Form::open(['method'=>'GET','class'=>'form']) !!}
                <div class="col-md-12" style="margin-top: 15px;">
                    <div class="col-md-4">
                        {!! Form::select('k',\App\DanhMucSanPhamModel::pluck('dm_ten','id')
                        ->prepend( '-- danh mục --',''),
                        \Illuminate\Support\Facades\Input::get('k',''),['class'=>'form-control select2']) !!}
                    </div>
                    <div class="col-md-4">
                        <input style="height: 28px;" class="form-control" placeholder="Tìm kiếm" name="q"
                               value="{{\Illuminate\Support\Facades\Input::get('q','')}}">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Tìm</button>
                        <a href="{{ url('gian-hang/quan-ly-san-pham') }}" class="btn btn-success">
                            <i class="fa fa-refresh"></i> Tải lại
                        </a>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="row rownew">
                <div class="col-md-12">
                    <table id="datatable" class="table table-striped">
                        <thead>
                        <tr>
                            <th class="khanh">Stt</th>
                            <th class="khanh">Danh mục</th>
                            <th class="khanh">Tên sản phẩm</th>
                            <th class="khanh">Ảnh</th>
                            <th class="khanh">Thương hiệu</th>
                            <th class="khanh">Trạng thái</th>
                            <th class="khanh"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $val)
                            <tr>
                                <td class="khanh1">{{ $val->stt }}</td>
                                <td class="khanh1">{{ $val->dm_ten }}</td>
                                <td class="khanh1">
                                    <a href="{{ route('gh.xemSanPham',$val->id) }}">
                                        {{ $val->sp_ten }}
                                    </a>
                                </td>
                                <td>
                                    <img src="{{url('upload', $val->sp_image)}}" width="30px" height="30px">
                                </td>
                                <td class="khanh1">{{ $val->sp_thuong_hieu }}</td>
                                @if($val->status == 0)
                                    <td class="khanh1">
                                        <a href="{{ route('gh.caidatSanPham',$val->id) }}">
                                            <span style="color: red">Chưa kinh hoanh</span>
                                        </a>
                                    </td>
                                @else
                                    <td class="khanh1">
                                        <a href="{{ route('gh.caidatSanPham',$val->id) }}">
                                            <span style="color: green">Đang kinh doanh</span>
                                        </a>
                                    </td>
                                @endif
                                <td class="khanh1">
                                    <a href="{{ route('gh.cnsanpham',$val->id) }}" class="btn btn-warning">Sửa</a>
                                    <a href="{{ route('gh.xsanphamDestroy',$val->id) }}" class="btn btn-danger"
                                       onclick="return confirm('Bạn có chắc là ngưng bán sản phẩm này ?')">
                                        Xóa
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
    <div class="clearfix"></div>
</div>
@include('userlayouts.footer')

<!-- DataTables -->
<link href="{{ url('adminlayouts/horizontal/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}"
      rel="stylesheet" type="text/css"/>
<link href="{{ url('adminlayouts/horizontal/assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet"
      type="text/css"/>

<!-- Responsive datatable examples -->
<link href="{{ url('adminlayouts/horizontal/assets/plugins/datatables/responsive.bootstrap4.min.css') }}"
      rel="stylesheet" type="text/css"/>

<!-- Required datatable js -->
<script src="{{ url('adminlayouts/horizontal/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('adminlayouts/horizontal/assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ url('adminlayouts/horizontal/assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ url('adminlayouts/horizontal/assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ url('adminlayouts/horizontal/assets/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ url('adminlayouts/horizontal/assets/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ url('adminlayouts/horizontal/assets/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ url('adminlayouts/horizontal/assets/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ url('adminlayouts/horizontal/assets/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ url('adminlayouts/horizontal/assets/plugins/datatables/buttons.colVis.min.js') }}"></script>

<script src="{{ url('adminlayouts/horizontal/assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('adminlayouts/horizontal/assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

{{--<script src="{{ url('userlayouts/webuser/js/bootstrap.min.js') }}"></script>--}}
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
            console.log(document.getElementById('fileAvatar').value);
        }
    }
</script>
<script>
    $(document).ready(function () {
        $('.select2').select2();
    });
</script>
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@include('userlayouts.messages')
</body>
</html>