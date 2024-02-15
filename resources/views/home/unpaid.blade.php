@extends('home.index')
@section('content')
@if($carts === null)
<div class="untree_co-section">
    <div class="container my-5 d-flex justify-content-center">
    <h1 class="col-lg-6"> Bạn đã thanh toán tất cả các tour <br>
        <a href="{{ url('/') }}" type="button" class="btn btn-primary">Trang chủ</a>
    </h1>
</div>
@else
<div class="untree_co-section">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <p class="title-tou__p" data-aos="fade-up" data-aos-delay="500" style="font-size: 35px;">Danh sách tour chưa thanh toán</p>
                
                <!--item  -->
                @foreach ($carts as $c)
                    
                <div class="wrapper-item-tour-list" data-aos="fade-left" data-aos-delay="100">
                    <div class="row justify-content-center">
                        <div class="col-lg-4">
                            <img src="{{URL::to('/')}}/images/{{$c['image']}}" alt="Free HTML Template by Untree.co" class="img-fluid">
                        </div>
                        <div class="col-lg-8">
                            <p class="title-tour-list font-weight-bold font-size-p" style="margin-top: 10px;">
                               <a href="{{url('orderPage', $c['id'])}}" class="title-tour-list__line">{{$c['name']}}</a> 
                            </p>
                            <p>Hành trình: <span> {{$c['place']}}</span></p>
                            <p>Phương tiện: <span>{{$c['vehicle']}}</span></p>
                            <p>Khởi hành: <span>{{$c['date']}}</span></p>
                            <div class="time-tour-list">
                                <div class="time-tour-list-left">
                                    <span><i class="fa-solid fa-clock"></i> {{$c['quantytiDate']}}</span>
                                </div>
                                <div class="time-tour-list-right">
                                    <p>{{number_format($c['priceTotal'])}} đ </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /item -->
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
  <script>
      var myHeader = document.querySelector(".site-nav"); 
      myHeader.classList.add("site-nav__color");
  </script>
@endsection