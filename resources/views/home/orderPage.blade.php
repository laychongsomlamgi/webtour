@extends('home.index')
@section('content')
<div class="untree_co-section">
    <div class="container my-5 d-flex justify-content-center">
    <div class="col-lg-6">
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
                    <p>{{$carts['name']}} - Giá người lớn x <span>{{$carts['quantity_OldPerson']}}</span></p>
                  </td>
                  <td>
                        <p>{{number_format($carts['price_OldPerson'] * $carts['quantity_OldPerson'])}}</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>{{$carts['name']}} - Giá trẻ em x <span>
                      @if($carts['quantity_YoungPerson'] != 0)
                        {{$carts['quantity_YoungPerson']}}
                      @else
                        0
                      @endif
                    </span></p>
                  </td>
                  <td>
                        <p>{{number_format(($carts['price_YoungPerson']) * $carts['quantity_YoungPerson'])}}</p> 
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>{{$carts['name']}} - Giá trẻ nhỏ x <span>0</span></p>
                  </td>
                  <td>0</td>
                </tr>
                <tr>
                  <td>
                    <p>{{$carts['name']}} - Giá trẻ sơ sinh x <span>0</span></p>
                  </td>
                  <td>0</td>
                </tr>
                <tr>
                  <td>Tạm tính</td>
                  <td>
                    {{number_format($carts['priceTotal'])}}</td>
                </tr>
                <tr>
                  <td style="font-weight: bold;">Tổng</td>
                  <td style="font-weight: bold; font-size: 17px;">{{number_format($carts['priceTotal'])}}</td>
                </tr>
              </tbody>
              
            </table>
            <div class="d-flex justify-content-between">
                <a href="{{url('bookTour', $carts['id'])}}" type="submit" class="btn btn-primary">Quay lại</a>
                <form action="{{route('vnpay', $carts['id'])}}" method="post">
                  @csrf
                  <button type="submit" class="btn btn-primary" name="redirect">Thanh toán</button>
                </form>
            </div>
          </div>
    </div>
</div>
<script>
    var myHeader = document.querySelector(".site-nav"); 
    myHeader.classList.add("site-nav__color");
</script>
@endsection