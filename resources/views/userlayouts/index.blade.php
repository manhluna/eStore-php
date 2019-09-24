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
        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <li>
                        <div class="w3l_banner_nav_right_banner">
                            {{--<h3>Make your <span>food</span> with Spicy.</h3>--}}
                            <div class="more">
                                <a href="" class="button--saqui button--round-l button--text-thick"
                                   data-text="Mua ngay">Mua ngay</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w3l_banner_nav_right_banner1">
                            {{--<h3>Make your <span>food</span> with Spicy.</h3>--}}
                            <div class="more">
                                <a href="" class="button--saqui button--round-l button--text-thick"
                                   data-text="Mua ngay">Mua ngay</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="w3l_banner_nav_right_banner2">
                            {{--<h3>upto <i>50%</i> off.</h3>--}}
                            <div class="more">
                                <a href="" class="button--saqui button--round-l button--text-thick"
                                   data-text="Mua ngay">Mua ngay</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <link rel="stylesheet" href="{{ url('userlayouts/webuser/css/flexslider.css') }}" type="text/css" media="screen"
              property=""/>
        <script defer src="{{ url('userlayouts/webuser/js/jquery.flexslider.js') }}"></script>
        <script type="text/javascript">
            $(window).load(function () {
                $('.flexslider').flexslider({
                    animation: "slide",
                    start: function (slider) {
                        $('body').removeClass('loading');
                    }
                });
            });
        </script>
    </div>
    <div class="clearfix"></div>
</div>
<div class="banner_bottom">
    <div class="wthree_banner_bottom_left_grid_sub">
    </div>
    <div class="wthree_banner_bottom_left_grid_sub1">
        <div class="col-md-4 wthree_banner_bottom_left">
            <div class="wthree_banner_bottom_left_grid">
                <img style="width: 345px;height: 276px;" src="{{ url('userlayouts/webuser/images/hinh1.jpg') }}" alt=" " class="img-responsive"/>
                <div class="wthree_banner_bottom_left_grid_pos">
                    <h4>Ưu đãi giảm giá <span>25%</span></h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 wthree_banner_bottom_left">
            <div class="wthree_banner_bottom_left_grid">
                <img src="{{ url('userlayouts/webuser/images/5.jpg') }}" alt=" " class="img-responsive"/>
                <div class="wthree_banner_btm_pos">
                    <h3>Là cửa hàng <span>Tạp hóa</span><i>dành cho bạn</i></h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 wthree_banner_bottom_left">
            <div class="wthree_banner_bottom_left_grid">
                <img style="width: 345px;height: 276px;" src="{{ url('userlayouts/webuser/images/hinh2.jpg') }}" alt=" " class="img-responsive"/>
                <div class="wthree_banner_btm_pos1">
                    {{--<h3>Save <span>Upto</span> $10</h3>--}}
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="top-brands">
    <div class="container">
        <h3>Sản Phẩm</h3>
        <div class="agile_top_brands_grids">
            @foreach($sanpham as $value)
                <div class="col-md-3 top_brand_left khungSP">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid">
                            <div class="tag">
                                <img src="{{ url('userlayouts/webuser/images/tag.png') }}" alt=""
                                     class="img-responsive"/>
                            </div>
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block">
                                        <div class="snipcart-thumb">
                                            <a href="{{ route('singelproduct',$value->id_sp) }}">
                                                <img style="width: 120px;height: 140px"
                                                     src="{{url('upload')}}/{{ $value->image_sp }}"/>
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
                                        <div class="snipcart-details top_brand_home_details">
                                            <input type="button" name="submit" value="Thêm Giỏ Hàng"
                                                   onclick="getCart('{{$value->id_sp}}','{{$value->ten_sp}}','{{$value->gia_km_sp}}','{{$value->gia_goc_sp}}')"
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
<div class="fresh-vegetables">
    <div class="container">
        <h3>Sản Phẩm Hàng Đầu</h3>
        <div class="w3l_fresh_vegetables_grids">
            <div class="col-md-3 w3l_fresh_vegetables_grid w3l_fresh_vegetables_grid_left">
                <div class="w3l_fresh_vegetables_grid2">
                    <ul>
                        @foreach($data as $val)
                            <li>
                                <i class="fa fa-check" aria-hidden="true"></i>
                                <a href="{{ route('sanphamdanhmuc',$val->id) }}">{{ $val->dm_ten }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-9 w3l_fresh_vegetables_grid_right">
                <div class="col-md-4 w3l_fresh_vegetables_grid">
                    <div class="w3l_fresh_vegetables_grid1">
                        <img style="width: 266px;height: 366px" src="{{ url('userlayouts/webuser/images/hinh3.jpg') }}" alt=" " class="img-responsive"/>
                    </div>
                </div>
                <div class="col-md-4 w3l_fresh_vegetables_grid">
                    <div class="w3l_fresh_vegetables_grid1">
                        <div class="w3l_fresh_vegetables_grid1_rel">
                            <img src="{{ url('userlayouts/webuser/images/7.jpg') }}" alt=" " class="img-responsive"/>
                            <div class="w3l_fresh_vegetables_grid1_rel_pos">
                                <div class="more m1">
                                    <a href="" class="button--saqui button--round-l button--text-thick"
                                       data-text="Shop now">Mua ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w3l_fresh_vegetables_grid1_bottom">
                        <img src="{{ url('userlayouts/webuser/images/10.jpg') }}" alt=" " class="img-responsive"/>
                        <div class="w3l_fresh_vegetables_grid1_bottom_pos">
                            <h5>Ưu đãi đặc biệt</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 w3l_fresh_vegetables_grid">
                    <div class="w3l_fresh_vegetables_grid1">
                        <img src="{{ url('userlayouts/webuser/images/9.jpg') }}" alt=" " class="img-responsive"/>
                    </div>
                    <div class="w3l_fresh_vegetables_grid1_bottom">
                        <img src="{{ url('userlayouts/webuser/images/11.jpg') }}" alt=" " class="img-responsive"/>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="agileinfo_move_text">
                    <div class="agileinfo_marquee">
                        <h4>Giảm giá <span class="blink_me">25%</span>cho đơn hàng đầu tiên và nhận phiếu thưởng quà
                            tặng</h4>
                    </div>
                    <div class="agileinfo_breaking_news">
                        <span> </span>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
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

