@extends('home.index')
@section('content')
<div class="untree_co-section">
    <div class="container my-5">

      <div class="row justify-content-center">
        <div class="col-lg-6">
          <p class="title-tou__p">Tour đã đặt</p>
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
                  <td>{{date('d-m-Y', strtotime($tours->dateStart))}}</td>
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

          </div>


        </div>
      </div>
      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">
        <div class="col-lg-12">
          <p class="title-tou__p text-center">BẢNG GIÁ</p>
          <table class="table table-bordered">
            <thead class="thead-dark">
              <tr>
                <th>Người lớn(Trên 11 tuổi)</th>
                <th>Trẻ em(5 - 11 tuổi)</th>
                <th>Trẻ nhỏ(2 - 5 tuổi)</th>
                <th>Sơ sinh( < 2 tuổi)</th>
                <th>Tổng tiền</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                    @if($tours->tour_discount > 0)
                        {{number_format($tours->tour_discount)}} x {{$tours->quantity_OldPerson}}
                    @else
                        {{number_format($tours->tour_price)}} x {{$tours->quantity_OldPerson}}  
                    @endif
                </td>
                <td>
                    @if($tours->tour_discount > 0)
                        {{number_format($tours->tour_discount / 2)}} x {{$tours->quantity_YoungPerson}}
                    @else
                        {{number_format($tours->tour_price / 2)}} x {{$tours->quantity_YoungPerson}}
                    @endif
                </td>
                <td>0 x 
                    @if($tours->quantity_Children != 0)
                        {{$tours->quantity_Children}}
                    @else
                        0
                    @endif
                </td>
                <td>0 x 
                    @if($tours->quantity_Infant != 0)
                        {{$tours->quantity_Infant}}
                    @else
                        0
                    @endif
                </td>
                <td>{{number_format($tours->bill_total)}} VND</td>
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
            <p class="title-tou__p">THÔNG TIN KHÁCH HÀNG</p>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label class="text-black" for="fullname">Họ và tên</label>
                  <input type="text" class="form-control" id="fullname" name="customer_name" value="{{$tours->customer_name}}">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label class="text-black" for="phone">Điện Thoại</label>
                  <input type="tel" class="form-control" id="phone" name="customer_phone" value="{{$tours->customer_phone}}">
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label class="text-black" for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="customer_email" value="{{$tours->customer_email}}">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="text-black" for="note">Nội dung ghi chú</label>
              <textarea name="note" class="form-control" id="note" cols="10" rows="2">
                @if($tours->note != null)
                    {{$tours->note}}
                @else
                    Không có
                @endif
            </textarea>
        </div>
          <a href="{{url('paid')}}" type="submit" class="btn btn-primary">Quay lại</a>
      </div>
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