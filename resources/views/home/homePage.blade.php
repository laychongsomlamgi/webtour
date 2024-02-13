@extends('home.index')
@section('content')
<div class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="intro-wrap">
                    <h1 class="mb-5"><span class="d-block">Cùng nhau trải nghiệm </span> những chuyến đi <span
                            class="typed-words"></span></h1>

                    <div class="row">
                        <div class="col-12">
                            <form class="form" action="{{route('search')}}" method="get" enctype="multipart/form">
                                @csrf
                                <div class="row mb-2">
                                    <div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-6">
                                        <!-- <input type="text" class="form-control" name="daterange"> -->
                                        <input type="text" id="search-tour" name="keyTour"
                                            class="form-control form-control-plaintext"
                                            placeholder="Tìm tour du lịch..." style="padding-left: 10px;">
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-4">
                                        <input type="submit" class="btn btn-primary btn-block"
                                            value="Tìm kiếm tour">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="slides">
                    <img src="{{asset('app/images/hero-slider-1.jpg')}}" alt="Image" class="img-fluid active">
                    <img src="{{asset('app/images/hero-slider-2.jpg')}}" alt="Image" class="img-fluid">
                    <img src="{{asset('app/images/hero-slider-3.jpg')}}" alt="Image" class="img-fluid">
                    <img src="{{asset('app/images/hero-slider-4.jpg')}}" alt="Image" class="img-fluid">
                    <img src="{{asset('app/images/hero-slider-5.jpg')}}" alt="Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="untree_co-section" style="padding-top: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <h2 class="title-tour-sale-main section-title mb-4 aos-init"
                    style="font-weight: bold; font-size: 45px !important;" data-aos="fade-right"
                    data-aos-duration="1200">Tours hot giá
                    sốc</h2>
                <p class="content-tour-sale-main aos-init" data-aos="fade-up" data-aos-duration="1000">Cập nhật
                    hàng
                    ngày các tour được hỗ trợ với mức giá
                    hấp dẫn</p>
                <div class="owl-single dots-absolute owl-carousel owl-theme owl-bs main-carousel">
                    @foreach($tours as $t)
                        @if($t->tour_discount !== 0)
                        <div class="item wrapper-img-tourhot img-fluid rounded-20">
                            <img src="{{URL::to('/')}}/images/{{$t->tour_image}}" alt="ảnh Sky" class="img-fluid rounded-20">
                            <div class="wrapper-img-background" >
                                <h3 class="text-center">{{$t->tour_name}}</h3>
                                <p class="tour-sale-p1">{{$t->tour_quantytiDate}}</p>
                                {{-- <p class="tour-sale-p2">QUẢNG BÌNH – ĐỘNG PHONG NHA – ĐỘNG THIÊN ĐƯỜNG – SUỐI NƯỚC
                                    MỌOC
                                    – SÔNG CHÀY – HANG TỐI – CỒN CÁT QUANG PHÚ</p> --}}
                                <p class="tour-sale-p3">Khởi hành: {{date('d-m-Y', strtotime($t->tour_dateStart))}}<span
                                        class="tour-sale-span1">
                                        {{number_format($t->tour_discount)}}</span><span class="tour-sale-span2">{{number_format($t->tour_price)}}</span></p>
                                <a href="{{url('detailTour', $t->tour_id)}}" class="btn-detail-tour-sale btn">Xem chi tiết</a>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-lg-7 pl-lg-5 ml-auto" style="margin-top: 135px;">
                <div class="owl-carousel owl-carousel owl-3-slider second-carousel">
                    @foreach($tours as $t)
                        @if($t->tour_discount !== 0)
                        <div class="item item-tour-sale">
                            <a class="media-thumb" href="{{url('detailTour', $t->tour_id)}}">
                                <div class="media-text media-text-tour-sale">
                                    <h3>{{number_format($t->tour_discount)}} đ</h3>
                                    <span class="location">{{number_format($t->tour_price)}} đ</span>
                                    {{-- <p style="margin-top: 16px;">ĐÀ NẴNG – NGŨ HÀNH SƠN – HỘI AN – BÀ NÀ HILLS - CÙ
                                        LAO
                                        CHÀM</p> --}}
                                    <p>{{$t->tour_quantytiDate}}</p>
                                    <p>Khởi hành: {{date('d-m-Y', strtotime($t->tour_dateStart))}}</p>
                                    {{-- <p class="text-center" style="color: #ada9a9; font-size: 20px !important;">
                                        (Click
                                        xem chi tiết)
                                    </p> --}}
                                </div>
                                <img src="{{URL::to('/')}}/images/{{$t->tour_image}}" alt="Image" class="img-fluid" style="height: 310px">
                            </a>
                            <div class="tour-name-sale">
                                <h5 class="text-center">Tour</h5>
                                <p class="text-center">{{$t->tour_name}}</p>
                            </div>
                        </div>
                        @endif
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</div>
<div class="untree_co-section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-6 text-center">
                <h2 class="section-title text-center mb-3 aos-init title-tour-summer-main"
                    style="font-size: 45px !important; font-weight: bold;" data-aos="fade-left"
                    data-aos-duration="1000">
                    Tours du lịch hè</h2>
                <p class="aos-init content-tour-summer-main" data-aos="fade-up" data-aos-duration="1000">Thật tuyệt vời khi giao quyền sắp xếp tour du
                    lịch và
                    kết hợp nghỉ ngơi trong thời gian gần 1
                    tháng cho ThanhTungTour. Đặc biệt nhận được sự gần gũi, thân thiện, cảm giác như tình cảm gia đình
                    (
                    VÔ GIÁ ). Hy vọng sẽ sớm gặp lại…</p>
            </div>
        </div>
        <div class="row align-items-stretch aos-init list-tour-summer-main" data-aos="fade-right" data-aos-duration="1200">

            @foreach ($tours as $t)
            <div class="col-6 col-sm-6 col-lg-4 feature-1-wrap d-md-flex flex-md-column order-lg-1">
                <div class="item item-search">
                    <a class="media-thumb" href="{{url('detailTour', $t->tour_id)}}">
                        <div class="media-text">
                            <h3><i class="fa-solid fa-money-bill"></i>
                                     @if($t->tour_discount === 0)
                                         {{number_format($t->tour_price)}}
                                    @else
                                        {{number_format($t->tour_discount)}}
                                    @endif
                                </h3>
                            <p class="location"><i class="fa-solid fa-location-dot"></i> {{$t->tour_place}}</p>
                            {{-- <a href="" class="btn btn-success btn-tour-item" style="margin-top: 30px; min-width: 100%">Click để
                                xem
                                chi tiết</a> --}}
                        </div>
                        <img src="{{URL::to('/')}}/images/{{$t->tour_image}}" alt="Image" class="img-fluid">
                    </a>
                </div>
                
            </div>
            @endforeach
        </div>
</div>

<div class="untree_co-section count-numbers py-5">
    <div class="container">
        <div class="row" style="text-align: center;">
            <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                <div class="counter-wrap">
                    <div class="counter">
                        <span class="" data-number="7313">0</span>
                    </div>
                    <span class="caption">Chuyến đi</span>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                <div class="counter-wrap">
                    <div class="counter">
                        <span class="" data-number="8492">0</span>
                    </div>
                    <span class="caption">Lượt khách</span>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                <div class="counter-wrap">
                    <div class="counter">
                        <span class="" data-number="100">0</span>
                    </div>
                    <span class="caption">Hướng dẫn viên chuyên nghiệp </span>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                <div class="counter-wrap">
                    <div class="counter">
                        <span class="" data-number="120">0</span>
                    </div>
                    <span class="caption">Tour có sẵn</span>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="untree_co-section">
    <div class="container">
        <div class="row text-center justify-content-center mb-5">
            <div class="col-lg-7">
                <h2 class="section-title text-center mb-3"
                    style="font-size: 45px !important; font-weight: bold;" data-aos="fade-left"
                    data-aos-duration="1200">Điểm đến yêu thích trong nước</h2>
            </div>
        </div>

        <div class="owl-carousel owl-3-slider">
            @foreach ($tourDomestic as $td)
            <div class="item" data-aos="fade-up" data-aos-duration="1000">
                <a class="media-thumb" href="{{url('detailTour', $td->tour_id)}}">
                    <div class="media-text">
                    <h3>Du lịch {{$td->tour_locationEnd}}</h3>
                        <span class="location">{{$td->tour_locationEnd}}</span>
                    </div>
                    <img src="{{URL::to('/')}}/images/{{$td->tour_image}}" alt="Image" class="img-fluid" style="height: 568px;">
                </a>
            </div>
            @endforeach

        </div>

    </div>
</div>

<div class="untree_co-section">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-6">
                <h2 class="section-title text-center mb-3"
                    style="font-weight: bold; font-size: 45px !important;" data-aos="fade-right"
                    data-aos-duration="1000">Ưu đãi đặc biệt &amp; Giảm giá</h2>
                <p>Các tour đến tham qun du lịch Hà Nội, Nha Trang, Phú Quốc cho mùa hè này</p>
            </div>
        </div>
        <div class="row" data-aos="fade-right"
        data-aos-duration="1200">
            @foreach($tours as $t)
            @if($t->tour_discount > 0)
            <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                <div class="media-1">
                    <a href="{{url('detailTour', $t->tour_id)}}" class="d-block mb-3"><img src="{{URL::to('/')}}/images/{{$t->tour_image}}" alt="Image" style="height: 400px;"
                            class="img-fluid"></a>
                    <span class="d-flex align-items-center loc mb-2">
                        <span class="icon-room mr-3"></span>
                        <span>{{$t->tour_locationEnd}}</span>
                    </span>
                    <div class="d-flex align-items-center">
                        <div>
                            <h3><a href="{{url('detailTour', $t->tour_id)}}">{{$t->tour_place}}</a></h3>
                        </div>

                    </div>

                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>

<div class="untree_co-section testimonial-section mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <h2 class="section-title text-center mb-5">Phản hồi</h2>

                <div class="owl-single owl-carousel no-nav">
                    <div class="testimonial mx-auto">
                        <figure class="img-wrap">
                            <img src="{{asset('app/images/person_2.jpg')}}" alt="Image" class="img-fluid">
                        </figure>
                        <h3 class="name">Nguyễn Quỳnh Anh</h3>
                        <blockquote>
                            <p>&ldquo;Tôi đã tham gia một chuyến du lịch ở Việt Nam cùng với đoàn của công ty du
                                lịch ABC. Tôi rất hài lòng với dịch vụ tour vì các hướng dẫn viên rất chuyên
                                nghiệp
                                và thân thiện. Họ đã giúp tôi và đoàn của tôi khám phá những địa điểm đẹp và thú
                                vị
                                nhất của Việt Nam.&rdquo;</p>
                        </blockquote>
                    </div>

                    <div class="testimonial mx-auto">
                        <figure class="img-wrap">
                            <img src="{{asset('app/images/person_3.jpg')}}" alt="Image" class="img-fluid">
                        </figure>
                        <h3 class="name">Nguyễn Quốc Anh</h3>
                        <blockquote>
                            <p>&ldquo;Tôi cảm thấy rất an tâm vì họ đã giải đáp cho tôi mọi thắc mắc và đưa ra
                                những
                                lời khuyên hữu ích. Không chỉ vậy, các hoạt động và trải nghiệm cũng rất thú vị
                                và
                                đáng nhớ. Tôi sẽ chắc chắn giới thiệu dịch vụ cho bạn bè và người thân của mình
                                nếu
                                họ muốn thăm Việt Nam.&rdquo;</p>
                        </blockquote>
                    </div>

                    <div class="testimonial mx-auto">
                        <figure class="img-wrap">
                            <img src="{{asset('app/images/person_4.jpg')}}" alt="Image" class="img-fluid">
                        </figure>
                        <h3 class="name">Nguyễn Quỳnh Anh</h3>
                        <blockquote>
                            <p>&ldquo;Là một hướng dẫn viên, tôi sẽ luôn sẵn sàng giúp các bạn trả lời mọi thắc
                                mắc
                                và đưa ra những lời khuyên hữu ích để chuyến du lịch của các bạn trở nên thật
                                tuyệt
                                vời.&rdquo;</p>
                        </blockquote>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<div class="untree_co-section">
    <div class="container">
        <div class="row justify-content-between align-items-center">

            <div class="col-lg-6">
                <figure class="img-play-video">
                    <a id="play-video" class="video-play-button"
                        href="https://www.youtube.com/watch?v=Au6LqK1UH8g" data-fancybox>
                        <span></span>
                    </a>
                    <img src="{{asset('app/images/hero-slider-2.jpg')}}" alt="Image" class="img-fluid rounded-20">
                </figure>
            </div>

            <div class="col-lg-5">
                <h2 class="section-title text-left mb-4" style="font-weight: bold; font-size: 40px !important;"
                    data-aos="fade-right" data-aos-duration="1000">Hành trình cùng ThanhTungTour</h2>
                <p data-aos="fade-up" data-aos-duration="1200">Du lịch Việt Nam là một hành trình thú vị và đầy khám phá. Với những nét đẹp tự nhiên hùng
                    vĩ,
                    văn hóa đa dạng và những trải nghiệm độc đáo, Việt Nam đã trở thành một điểm đến hấp dẫn cho
                    các
                    du khách từ khắp nơi trên thế giới. Để có một chuyến du lịch tuyệt vời, các hướng dẫn viên
                    chuyên nghiệp sẽ giúp bạn khám phá và tìm hiểu tất cả những điều thú vị mà đất nước Việt Nam
                    mang lại.</p>

                <p data-aos="fade-up" data-aos-duration="1200" class="mb-4">Ngoài ra, các hướng dẫn viên của ThanhTungTour còn giúp bạn giải đáp các thắc mắc và
                    đưa
                    ra những lời khuyên hữu ích về an toàn và các quy định địa phương. Họ cũng sẽ giúp bạn đàm
                    phán
                    với các nhà cung cấp dịch vụ và giải quyết các vấn đề nếu có.</p>

                <ul data-aos="fade-up" data-aos-duration="1200" class="list-unstyled two-col clearfix">
                    <li>Hoạt động giải trí ngoài trời</li>
                    <li>Hãng hàng không</li>
                    <li>Cho thuê ô tô</li>
                    <li>Du thuyền</li>
                    <li>Khách sạn</li>
                    <li>Đường sắt</li>
                    <li>Travel Insurance</li>
                    <li>Gói du lịch</li>
                    <li>Bảo hiểm</li>
                    <li>Sách hướng dẫn</li>
                </ul>

                <p data-aos="fade-up" data-aos-duration="1200"><a href="{{url('/')}}" class="btn btn-primary">Bắt đầu</a></p>


            </div>
        </div>
    </div>
</div>


<!-- lienhengay -->
<div class="py-5 cta-section">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <h2 class="mb-2 text-white">Liên lạc với chúng tôi ngay</h2>
                <p class="mb-4 lead text-white text-white-opacity">Cho phép bạn khám phá những gì tốt nhất.</p>
                <p class="mb-0"><a href="{{url('/')}}"
                        class="btn btn-outline-white text-white btn-md font-weight-bold">Liên hệ</a></p>
            </div>
        </div>
    </div>
</div>
<!-- /lienhengay -->
@endsection