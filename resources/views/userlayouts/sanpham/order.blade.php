<!DOCTYPE html>
<html>
@include('userlayouts.thehead')
<body>
@include('userlayouts.header')
<div class="products-breadcrumb">
    <div class="container">
        <ul>
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.html">Trang chủ</a><span>|</span></li>
            <li>Giỏ hàng</li>
        </ul>
    </div>
</div>
<div class="banner">
    @include('userlayouts.category')
    <div class="w3l_banner_nav_right">
        <!-- about -->
        {{--{{ dd($order) }}--}}
        <form action="{{ route('orderStore') }}" method="post">
            @csrf
            <div class="privacy about" style="padding-top: 10px">
                <h3>Giỏ Hàng</h3>
                <div class="checkout-right">
                    <h4>Giỏ hàng của bạn: <span>{{ count($order) }} Sản phẩm</span></h4>
                    @if($order != null)
                        <table class="timetable_sub">
                            <thead>
                            <tr>
                                <th>Ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order as $key => $value)
                                <tr class="rem1" id="tr{{$value['id']}}">
                                    <td class="invert-image">
                                        <?php
                                        $image = \App\SanPhamModel::where('id', $value['id'])->get()->first()->sp_image;
                                        ?>
                                        <a href="{{ route('singelproduct',$value['id']) }}">
                                            <img src="{{url('upload')}}/{{ $image }}" style="width: 43px;height: 44px"
                                                 alt=" "
                                                 class="img-responsive">
                                        </a>
                                    </td>
                                    <td class="invert">{{ $value['name'] }}</td>
                                    <td class="invert">
                                        <input type="hidden"  id="gia_{{$value['id']}}" value="{{$value['gia']}}" />
                                        đ: {{ number_format($value['gia']) }}
                                    </td>
                                    <td>
                                        <input style="padding: 0px;width: 60px;border-radius: 36px;padding-left: 22px;"
                                               id="sl_{{ $value['id'] }}"
                                               type="number" name="soluong[{{$value['id']}}]"
                                               value="{{$value['soluong']}}" onchange="haha('{{ $value['id'] }}')">
                                    </td>
                                    <td class="invert" id="tt_{{$value['id']}}">đ: {{ number_format($value['gia'] * $value['soluong']) }}</td>
                                    <td class="invert">
                                        {{--<a class="btn btn-success" onclick="deleteItem2('tr{{$value["id"]}}')">X</a>--}}
                                        <div class="rem" onclick="deleteItem2('xoa{{$value["id"]}}')">
                                            <div class="close1"></div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Giỏ hàng của bạn hiện chưa có sản phẩm nào</p>
                    @endif
                </div>
                <div class="checkout-left">
                    <div class="col-md-4 checkout-left-basket"></div>
                    <div class="col-md-8 address_form_agile">
                        <section class="creditly-wrapper wthree, w3_agileits_wrapper">
                            <ul class="nav nav-pills nav-justified" role="tablist">
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link active" data-toggle="tab" href="#home-1" role="tab">Thêm địa chỉ
                                        mới</a>
                                </li>
                                <li class="nav-item waves-effect waves-light">
                                    <a class="nav-link" data-toggle="tab" href="#profile-1" role="tab">Chọn từ sổ địa
                                        chỉ</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active p-3" id="home-1" role="tabpanel">
                                    <p class="font-14 mb-0">
                                    <div class="information-wrapper">
                                        <div class="first-row form-group">
                                            <div class="controls">
                                                <label class="control-label">Họ & tên: </label>
                                                <input class="billing-address-name form-control" type="text"
                                                       name="ho_ten" placeholder="Họ và tên ">
                                            </div>
                                            <div class="w3_agileits_card_number_grids">
                                                <div class="w3_agileits_card_number_grid_left">
                                                    <div class="controls">
                                                        <label class="control-label">Số điện thoại:</label>
                                                        <input class="form-control" type="number" name="sdt_kh"
                                                               placeholder="Số điện thoại">
                                                    </div>
                                                </div>
                                                <div class="w3_agileits_card_number_grid_right">
                                                    <div class="controls">
                                                        <label class="control-label">Địa chỉ giao: </label>
                                                        <textarea class="form-control" type="text"
                                                                  name="dia_chi_giao"
                                                                  placeholder="Địa chỉ giao hàng"></textarea>
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                    </p>
                                </div>
                                <div class="tab-pane p-3" id="profile-1" role="tabpanel">
                                    <p class="font-14 mb-0">
                                    <div class="information-wrapper">
                                        <label class="control-label">Chọn địa chỉ: </label>
                                        <select class="form-control" name="so_dia_chi" style="height: 55px;">
                                            <option value="">Vui lòng chọn địa chỉ của bạn</option>
                                            @foreach($dia_chi as $key => $value)
                                                <option value="{{ $value->iddiachi }}">{{ $value->dia_chi }}
                                                    , {{ $value->phuongxa }}
                                                    , {{ $value->quanhuyen }}, {{ $value->tinhthanh }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    </p>
                                </div>
                            </div>
                            <button class="submit check_out">Đặt Hàng</button>
                        </section>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </form>
    </div>
    <div class="clearfix"></div>
</div>
@include('userlayouts.footer')
@yield('script')
<script src="{{ url('userlayouts/webuser/js/jquery-1.11.1.min.js') }}"></script>
<script>
    function haha(id) {

        var soluong = $('#sl_'+id).val();
        var gia = $('#gia_'+id).val();
        var thanhtien = soluong * gia;
        console.log(thanhtien);
        $('#tt_'+id).text(thanhtien);
    }
</script>
<script>
    $(document).ready(function () {
        $('.select2').select2();
    });
</script>
<script>
    $(document).ready(function () {
        var navoffeset = $(".agileits_header").offset().top;
        $(window).scroll(function () {
            var scrollpos = $(window).scrollTop();
            if (scrollpos >= navoffeset) {
                $(".agileits_header").addClass("fixed");
            } else {
                $(".agileits_header").removeClass("fixed");
            }
        });

    });
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript" src="{{ url('userlayouts/webuser/js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ url('userlayouts/webuser/js/easing.js') }}"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
        });
    });
</script>
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
<script>
    function deleteItem2(id) {

        var sp = sessionStorage.getItem('list_order');
        console.log(sp);
        sp = JSON.parse(sp);
        if (sp != [] && sp != undefined) {
            //Xoa mang
            var index = sp.map(x => {
                return x.id;
            }).indexOf(id);
            sp.splice(index, 1);
            sessionStorage.setItem('list_order', JSON.stringify(sp));
            //Xoa giao dien
            $('#xoa' + id).remove();
            GioHang();
            $('#orderForm').submit();
        }
    }
</script>
</body>
</html>