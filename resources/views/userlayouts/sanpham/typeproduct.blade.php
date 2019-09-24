<!DOCTYPE html>
<html>
@include('userlayouts.thehead')
<style>
    .singlerow {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    .gia {
        font-size: 13px !important;
    }

    .khungSP {
        height: 360px;
        margin-bottom: 10px !important;
    }
</style>
<body>
@include('userlayouts.header')
<div class="products-breadcrumb">
    <div class="container" style="margin-left: 5px;">
        <ul>
            <li>
                @if(!empty(Auth::user()))
                    <span>|</span>
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <a>{{ Auth::user()->phone }}</a>
                    <span>|</span>
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    <a href="{{ route('logout') }}">Đăng Xuất</a>
                    <span>|</span>
                @else
                    <span>|</span>
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <a href="{{ url('user/login') }}">Đăng Nhập</a>
                    <span>|</span>
                @endif
            </li>
        </ul>
    </div>
</div>
<div class="banner">
    @include('userlayouts.category')
    <div class="w3l_banner_nav_right">
        <div class="w3l_banner_nav_right_banner3">
            <h3>Những Sản Phẩm Tốt Nhất<span class="blink_me"></span></h3>
        </div>
        <div class="w3ls_w3l_banner_nav_right_grid">
            <h3>{{ $danhmuc }}</h3>
            <div class="w3ls_w3l_banner_nav_right_grid1">
                @foreach($sanpham as $value)
                    <div class="col-md-3 w3ls_w3l_banner_left khungSP">
                        <div class="hover14 column">
                            <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                                <div class="agile_top_brand_left_grid_pos">
                                    <img src="{{ url('userlayouts/webuser/images/offer.png') }}"
                                         alt=" " class="img-responsive"/>
                                </div>
                                <div class="agile_top_brand_left_grid1">
                                    <figure>
                                        <div class="snipcart-item block">
                                            <div class="snipcart-thumb">
                                                <a href="{{ route('singelproduct',$value->id_sp) }}">
                                                    <img style="width: 140px;height: 140px"
                                                         src="{{url('upload')}}/{{ $value->image_sp }}"
                                                         class="img-responsive"/>
                                                </a>
                                                <p class="singlerow">{{ $value->ten_sp }}</p>
                                                @if($value->gia_km_sp == 0)
                                                    <h4 class="gia">đ: {{ number_format($value->gia_goc_sp) }}</h4>
                                                @else
                                                    <h4 class="gia">đ: {{ number_format($value->gia_km_sp) }}
                                                        <span>đ: {{ number_format($value->gia_goc_sp) }}</span>
                                                    </h4>
                                                @endif
                                            </div>
                                            <div class="snipcart-details">
                                                <input type="button" name="submit" value="Thêm Giỏ Hàng"
                                                       onclick="getCart('{{$value->id_sp}}','{{$value->ten_sp}}','{{$value->gia_km_sp}}','{{$value->gia_goc_sp}}','{{$value->gh_id}}')"
                                                       class="button"/>
                                            </div>
                                            <hr style="margin: 0px">
                                            <p style="margin: 0px; font-size: 12px">
                                                <img src="{{ url('upload') }}/shop.png"> {{ $value->gh_sp }}
                                            </p>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="clearfix"></div>
                {{ $sanpham->links() }}
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
@include('userlayouts.footer')
@yield('script')
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
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>
@include('userlayouts.messages')
</body>
</html>
