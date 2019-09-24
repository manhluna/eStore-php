@extends('adminlayouts.index')
@section('content')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group pull-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item">Quản Lý Gian Hàng</li>
                                <li class="breadcrumb-item active">danh sách</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Quản Lý Gian Hàng</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Danh Sách Các Gian Hàng</h4>
                            <table id="datatable" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Stt</th>
                                    <th>Tên gian hàng</th>
                                    <th>Sđt</th>
                                    <th>Email</th>
                                    <th>Địa chỉ</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{ $item->stt }}</td>
                                        <td>{{ $item->gh_ten }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->gh_dia_chi }}</td>
                                        <td>
                                            @if($item->active == 1)
                                                <a href="{{ route('KhoaTKGH',$item->id) }}"
                                                   class="btn btn-outline-primary waves-effect waves-light"
                                                   onclick="return confirm('Bạn chắc muốn khóa tài khoản này ?')">
                                                    <i class="mdi mdi-key-variant"></i>
                                                </a>
                                            @else
                                                <a class="btn btn-outline-danger waves-effect waves-light">
                                                    <i class="mdi mdi-block-helper"></i>
                                                </a>
                                            @endif
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
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#datatable').DataTable();
        });
    </script>
@endsection