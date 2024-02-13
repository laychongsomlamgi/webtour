@extends('home.index')
@section('content')
<div class="untree_co-section">
  <div class="container my-5">

    <div class="row justify-content-center">
      <div class="col-lg-8">
        <p class="title-tou__p">{{$tours->tour_name}}</p>
        <span>4.8 <i class="fa-solid fa-star" style="color: rgb(231, 231, 6);"></i> <span>Đánh giá</span></span>
        <div class="owl-single dots-absolute owl-carousel">
          <img src="{{URL::to('/')}}/images/{{$tours->tour_image}}" alt="Free HTML Template by Untree.co" class="img-fluid">
          {{-- <img src="{{asset('app/images/slider-2.jpg')}}" alt="Free HTML Template by Untree.co" class="img-fluid">
          <img src="{{asset('app/images/slider-4.jpg')}}" alt="Free HTML Template by Untree.co" class="img-fluid"> --}}
        </div>
        <div class="custom-block point-special-tour" data-aos="fade-up">
          <h2 class="section-title"><i class="fa-solid fa-book"></i> Điểm nhấn hành trình</h2>
          <div class="custom-accordion" id="accordion_1">
            <div class="accordion-item">
              <!-- <div id="collapse" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion_1"> -->
              <div class="accordion-body">
                {!!$tours->tour_description!!}
              </div>
              <!-- </div> -->
            </div> <!-- .accordion-item -->

          </div>
        </div>
        <div class="custom-block point-special-tour" data-aos="fade-up">
          <h2 class="section-title"><i class="fa-solid fa-calendar"></i> Lịch trình</h2>
          <div class="custom-accordion" id="accordion_1">
            {!! $tours->tour_trip !!}
            <!-- .accordion-item -->
          </div>
        </div>
        {{-- <div class="custom-block point-special-tour" data-aos="fade-up">
          <h2 id="collapseSeviceOne-btn"  class="section-title"><i class="fa-solid fa-clipboard"></i> Dịch vụ</h2>
          <div class="custom-accordion" id="accordion_1">
            <div class="accordion-item">
              <h2 class="mb-0">
                <button class="btn btn-link btn-link-color" type="button" data-toggle="collapse"
                  data-target="#collapseSeviceOne" aria-expanded="false" aria-controls="collapseSeviceOne">Dịch vụ bao
                  gồm và không bao gồm (Xem thêm)</button>
              </h2>

              <div id="collapseSeviceOne" class="collapse" aria-labelledby="headingSeviceOne"
                data-parent="#accordion_1">
                <div class="accordion-body">
                  <p>
                    GIÁ TOUR BAO GỒM:

                    Vận chuyển: Xe chất lượng tốt phục vụ suốt lịch trình tham quan.

                    Ăn uống: Ăn sáng 03 bữa tại khách sạn + 06 bữa chính Thực đơn 130.000 đồng/suất. Suất ăn biển đảo
                    150.000vnđ/suất.

                    Nước Uống + Khăn lạnh: Nước suối 0,5l /ngày/người, khăn lạnh 02 cái/người/ngày

                    Khách sạn: 3-5 sao, ngủ 02 khách/ phòng, trường hợp lẻ nam, lẻ nữ ngủ 03 khách/ phòng

                    Tham quan :

                    – Vé tham quan, vào cửa 01 lần: Tháp Đôi, Ghềnh Đá Đĩa, Eo Gió, Bãi Xép – Ghềnh Ông…

                    – Cano siêu tốc tham quan đảo Kỳ Co.

                    – Vé + lều vào Bãi Kỳ Co.

                    – Dịch vụ tắm nước ngọt.

                    – Dụng cụ lặn ngắm san hô: Áo phao, kính lặn.

                    – Phí du lịch an ninh biển đảo.

                    Hướng dẫn viên: Chuyên nghiệp, nhiệt tình phục vụ suốt tuyến.

                    Bảo hiểm: Bảo hiểm du lịch mức tối đa (40.000.000 VND/trường hợp)

                    KHÔNG BAO GỒM:

                    Chi phí cá nhân ngoài chương trình.
                    Đồ ăn, nước uống dùng riêng trong bữa ăn và các chi phí khác
                    Phụ thu phòng đơn: Theo từng hạng phòng cụ thể.
                    10% VAT
                    Và các chi phí khác không có trong mục bao gồm và phát sinh dịch vụ vì lý do thời tiết.
                  </p>
                </div>
              </div>
            </div> <!-- .accordion-item -->
            <div class="accordion-item">
              <h2 class="mb-0">
                <button class="btn btn-link btn-link-color" type="button" data-toggle="collapse"
                  data-target="#collapseSeviceTwo" aria-expanded="false" aria-controls="collapseSeviceTwo">Ghi
                  chú</button>
              </h2>
              <div id="collapseSeviceTwo" class="collapse" aria-labelledby="headingSeviceTwo"
                data-parent="#accordion_1">
                <div class="accordion-body">
                  <p>
                    QUY ĐỊNH VỀ TRẺ EM

                    Em bé từ 0 – dưới 5 tuổi: Miễn phí vé tour
                    Trẻ em từ 5 đến 9 tuổi: Tính 70% giá tour
                    Trẻ em từ 10 tuổi trở lên: Tính bằng người lớn.
                    Lưu ý: Đối với trẻ em từ 2 – 4 tuổi cao hơn 1m thì bố mẹ tự mua vé vào cổng những khu du lịch có
                    đo chiều cao.
                    ĐIỀU KIỆN ĐẶT TOUR:

                    Đặt cọc ngay sau khi đăng ký tour: 50% giá trị Tour.
                    Số tiền còn lại thanh toán trước ngày khởi hành 01 ngày (Không tính Thứ 7, Chủ nhật)
                    QUY ĐỊNH HỦY TOUR

                    Nếu quý khách hủy tour sau khi làm hợp đồng, chịu phí: 10%.
                    Nếu quý khách hủy tour trước ngày khởi hành 07 – 03 ngày, chịu phí: 50%
                    Nếu quý khách hủy tour sau 03 ngày trước 24 tiếng khởi hành, chịu phí: 75%
                    Nếu quý khách hủy tour trong vòng 24 tiếng khởi hành, chịu phí: 100%
                    Lưu ý: Số ngày hủy không áp dụng các ngày cuối tuần, thứ 7 – chủ nhật và các ngày lễ Tết
                    LƯU Ý:

                    Người lớn phải mang theo CMND để làm thủ tục nhận phòng khách sạn.
                    Trẻ em phải mang theo bản sao giấy khai sinh.
                    Giá trên không áp dụng các ngày lễ, tết
                    Trường hợp thời tiết không thuận lợi, Quý khách di chuyển qua đảo bằng xe trung chuyển và không
                    lặn ngắm san hô.
                    Thứ tự các điểm tham quan trong chương trình có thể thay đổi cho phù hợp. Tuy nhiên vẫn đảm bảo
                    các tuyến điểm cho quý khách.
                    Tour có thể thiết kế riêng theo yêu cầu của khách
                  </p>
                </div>
              </div>
            </div> <!-- .accordion-item -->
            <div class="accordion-item">
              <h2 class="mb-0">
                <button class="btn btn-link btn-link-color" type="button" data-toggle="collapse"
                  data-target="#collapseSeviceThree" aria-expanded="false" aria-controls="collapseSeviceThree">Đánh giá trải nghiệm của bạn về tour này</button>
              </h2>
              <div id="collapseSeviceThree" class="collapse" aria-labelledby="headingSeviceThree"
                data-parent="#accordion_1">
                <div class="accordion-body">
                  <p>
                    cccccccccccccccccccccccccc
                  </p>
                </div>
              </div>
            </div> <!-- .accordion-item -->
          </div>
        </div> --}}
        <!-- tour liên quan -->
        <div class="col-lg-12 pl-lg-12 ml-auto" style="margin-top: 135px;">
          <h2 class="section-title text-center mb-3" style="font-size: 45px !important; font-weight: bold;">
            Tours liên quan</h2>
          <div class="owl-carousel owl-carousel owl-3-slider second-carousel">
            @foreach($tour_relate as $t)
            <div class="item item-tour-sale item-tour-relate">
              <a class="media-thumb" href="{{url('detailTour', $t->tour_id)}}">
                <div class="media-text media-text-tour-sale">
                  @if($tours->tour_discount > 0)
                    <h3>{{number_format($tours->tour_discount)}}</h3> 
                    <span class="location"> {{number_format($tours->tour_price)}}</span>
                  @else
                    <h3>{{number_format($tours->tour_price)}}</span> 
                  @endif
                  <p style="margin-top: 16px;">{{$t->tour_place}}</p>
                  <p>{{$t->tour_quantytiDate}}</p>
                  <p>Khởi hành: {{$t->tour_dateStart}}</p>
                </div>
                <img src="{{URL::to('/')}}/images/{{$t->tour_image}}" alt="Image" class="img-fluid img-tour-relate ">
              </a>
              <div class="tour-name-sale">
                <p class="text-center">{{$t->tour_name}}</p>
              </div>
            </div>
            @endforeach

          </div>
        </div>
        <!-- /tour liên quan -->
      </div>
      <div class="col-lg-4" style="margin-top: 60px;">
        <div class="custom-block custom-block-sticky" data-aos="fade-up" data-aos-delay="100">
          <h2 class="section-title">{{$tours->tour_name}}</h2>
          <table class="table table-dark table-hover">
            <tbody>
              <tr>
                <th>Mã tour</th>
                <td>{{$tours->tour_id}}</td>
              </tr>
              <tr>
                <th>Thời gian:</th>
                <td>{{$tours->tour_quantytiDate}}</td>
              </tr>
              <tr>
                <th>Khởi hành:</th>
                <td>{{date('d-m-Y', strtotime($tours->tour_dateStart))}}</td>
              </tr>
              <tr>
                <th>Vận Chuyển:</th>
                <td>{{$tours->tour_vehicle}} </td>
              </tr>
              <tr>
                <th>Xuất phát:</th>
                <td>{{$tours->tour_locationStart}}</td>
              </tr>
            </tbody>
          </table>
          <div class="wrapper-booking-tour">
            <p>Giá từ: 
              @if($tours->tour_discount > 0)
                <span style="font-size: 25px; font-weight: bold; color: #fff;">{{number_format($tours->tour_discount)}}</span> 
                <span style="text-decoration: line-through;"> {{number_format($tours->tour_price)}}</span>
              @else
                <span style="font-size: 25px; font-weight: bold; color: #fff;">{{number_format($tours->tour_price)}}</span> 
              @endif
            </p>
            <div class="btn-booking-tour">
              <div class="btn-booking-tour__a">
                <a href="{{url('bookTour', $tours->tour_id)}}" class="btn btn-success">ĐẶT TOUR</a>
              </div>
            </div>
          </div>
          
          
        </div>


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
        <p class="mb-0"><a href="contact.html" class="btn btn-outline-white text-white btn-md font-weight-bold">Liên
            hệ</a></p>
      </div>
    </div>
  </div>
</div>
<!-- /lienhengay -->
    
  <script>
      var myHeader = document.querySelector(".site-nav"); 
      myHeader.classList.add("site-nav__color");
  </script>
@endsection