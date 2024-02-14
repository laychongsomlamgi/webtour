@extends('home.index')
@section('content')
<div class="untree_co-section">
    <div class="container my-5">

      <div class="row justify-content-center">
        <div class="col-lg-6">
          <p class="title-tou__p">THANH TOÁN</p>
          <div class="owl-single dots-absolute owl-carousel">
            <img src="{{URL::to('/')}}/images/{{$tours->tour_image}}" alt="Free HTML Template by Untree.co" class="img-fluid">
          </div>

        </div>
        <div class="col-lg-6" style="margin-top: 50px;">
          <div class="custom-block" data-aos="fade-up" data-aos-delay="100">
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
                  <td>{{$tours->tour_dateStart}}</td>
                </tr>
                <tr>
                  <th>Vận Chuyển:</th>
                  <td>{{$tours->tour_vehicle}}</td>
                </tr>
                <tr>
                  <th>Xuất phát:</th>
                  <td>{{$tours->tour_locationStart}}</td>
                </tr>
              </tbody>
            </table>
            <div class="custom-block point-special-tour" data-aos="fade-up">
              <!-- <h2 class="section-title"><i class="fa-solid fa-book"></i> Dịch vụ</h2> -->
              <div class="custom-accordion" id="accordion_1">
                <div class="accordion-item">
                  <h2 class="mb-0">
                    <p class="btn btn-link btn-link__color-xam collapsed margin-none padding-top-none" type="button">Các
                      khoản phí phát sinh (nếu có) như: phụ thu dành cho khách nước ngoài, việt kiều; phụ thu phòng đơn;
                      phụ thu chênh lệch giá tour…</p>
                  </h2>
                </div> <!-- .accordion-item -->

                <div class="accordion-item">
                  <h2 class="mb-0">
                    <p class="btn btn-link btn-link__color-xam collapsed margin-none padding-top-none" type="button">
                      Nhân viên Sky Tourist sẽ gọi điện thoại tư vấn cho quý khách ngay sau khi có phiếu xác nhận
                      booking. (Trong giờ hành chính)</p>
                  </h2>
                </div> <!-- .accordion-item -->
                <div class="accordion-item">
                  <h2 class="mb-0">
                    <p class="btn btn-link btn-link__color-xam collapsed margin-none padding-top-none" type="button">
                      Trường hợp quý khách không đồng ý các khoản phát sinh, phiếu xác nhận booking của quý khách sẽ
                      không có hiệu lực.</p>
                  </h2>
                </div> <!-- .accordion-item -->

              </div>
            </div>

          </div>


        </div>
      </div>
      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">
        <div class="col-lg-12">
          <p class="title-tou__p text-center">BẢNG GIÁ LIÊN HỆ</p>
          <table class="table table-bordered">
            <thead class="thead-dark">
              <tr>
                <th>Loại giá\Độ tuổi</th>
                <th>Người lớn(Trên 11 tuổi)</th>
                <th>Trẻ em(5 - 11 tuổi)</th>
                <th>Trẻ nhỏ(2 - 5 tuổi)</th>
                <th>Sơ sinh( < 2 tuổi)</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Giá </td>
                <td>
                    @if($tours->tour_discount > 0)
                        {{number_format($tours->tour_discount)}}
                    @else
                        {{number_format($tours->tour_price)}}
                    @endif
                </td>
                <td>
                    @if($tours->tour_discount > 0)
                        {{number_format($tours->tour_discount / 2)}}
                    @else
                        {{number_format($tours->tour_price / 2)}}
                    @endif
                </td>
                <td>0 đ</td>
                <td>0 đ</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- thanh toán -->
      <form class="contact-form" data-aos="fade-up" data-aos-delay="200" action="{{route('orderTour', $tours->tour_id)}}" method="post">
        @csrf
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <p class="title-tou__p">THÔNG TIN LIÊN HỆ</p>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label class="text-black" for="fullname">Họ và tên</label>
                  <input type="text" class="form-control" id="fullname" name="customer_name">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label class="text-black" for="phone">Điện Thoại</label>
                  <input type="tel" class="form-control" id="phone" name="customer_phone">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label class="text-black" for="numberAdult">Người lớn</label>
                  <input type="number" class="form-control" id="numberAdult" name="quantity_OldPerson">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label class="text-black" for="numberChildrenBig">Trẻ em(5 - 11 tuổi):</label>
                  <input type="number" class="form-control" id="numberChildrenBig" min="0" max="30" name="quantity_YoungPerson">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label class="text-black" for="numberChildrenNormal">Trẻ nhỏ( 2 - 5 tuổi):</label>
                  <input type="number" class="form-control" id="numberChildrenNormal" min="0" max="30" name="quantity_Children">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label class="text-black" for="numberChildrenSmall">Trẻ Sơ sinh(nhỏ hơn 2 tuổi):</label>
                  <input type="number" class="form-control" id="numberChildrenSmall" min="0" max="30" name="quantity_Infant">
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label class="text-black" for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="customer_email">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label class="text-black" for="dateStart">Chọn ngày mà bạn muốn khởi hành </label>
                  <input type="date" class="form-control" id="dateStart"  name="date">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="text-black" for="note">Nội dung ghi chú</label>
              <textarea name="note" class="form-control" id="note" cols="10" rows="2"></textarea>
            </div>
            @if(auth()->check())
              <button type="submit" class="btn btn-primary">Đặt tour</button>
            @else
              <a href="{{url('login')}}" type="submit" class="btn btn-primary">Đăng nhập để đặt tour</a>
            @endif
          </div>
          {{-- <div class="col-lg-6">
            <p class="title-tou__p">ĐƠN HÀNG CỦA BẠN</p>
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th>Chi Phí Tour</th>
                  <th>Tạm tính</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <p>Tour Quy Nhơn - Phú Yên 4 Ngày 3 Đêm - Giá người lớn x <span>1</span></p>
                  </td>
                  <td>3,450,000VND</td>
                </tr>
                <tr>
                  <td>
                    <p>Tour Quy Nhơn - Phú Yên 4 Ngày 3 Đêm - Giá trẻ em x <span>0</span></p>
                  </td>
                  <td>0VND</td>
                </tr>
                <tr>
                  <td>
                    <p>Tour Quy Nhơn - Phú Yên 4 Ngày 3 Đêm - Giá trẻ nhỏ x <span>0</span></p>
                  </td>
                  <td>0VND</td>
                </tr>
                <tr>
                  <td>
                    <p>Tour Quy Nhơn - Phú Yên 4 Ngày 3 Đêm - Giá trẻ sơ sinh x <span>0</span></p>
                  </td>
                  <td>0VND</td>
                </tr>
                <tr>
                  <td>Tạm tính</td>
                  <td>3,450,000VND</td>
                </tr>
                <tr>
                  <td style="font-weight: bold;">Tổng</td>
                  <td style="font-weight: bold; font-size: 17px;">3,450,000VND</td>
                </tr>
              </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Thanh toán</button>
          </div> --}}
        </div>
      </form>
      <!-- /thanh toán -->
    </div>
  </div>
  <script>
    var myHeader = document.querySelector(".site-nav"); 
    myHeader.classList.add("site-nav__color");
</script>
@endsection