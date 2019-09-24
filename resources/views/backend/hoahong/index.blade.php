@extends('adminlayouts.index')
@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group pull-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item">Quản Lý Hoa Hồng</li>
                                <li class="breadcrumb-item active">lịch sử</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Quản Lý Lịch Sử</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Danh Sách Khách Hàng Đã Thanh Toán</h4>
                            <table id="datatable" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Stt</th>
                                    <th>Tên KH</th>
                                    <th>Sđt</th>
                                    <th>Email</th>
                                    <th>Tiền</th>
                                    <th>Ngày lãnh</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($hoa_hong as $value)
                                    <tr>
                                        <td>{{ $value->stt }}</td>
                                        <td>{{ $value->ten }}</td>
                                        <td>{{ $value->phone }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>đ: {{ number_format($value->tien) }}</td>
                                        <td>{{ $value->ngay }}</td>
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
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#datatable').DataTable();
        });
    </script>
@endsection