@extends('admin.admin')
@section('content')
    <div class="row" style="min-height: 650px">
        <div class="col-12">
            <div class="car my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                      <h6 class="text-white text-capitalize ps-3">Chi tiết hóa đơn</h6>
                          <button class="btn  ">
                              <a class="text-white" href="{{url('admin/bill')}}">Quay lại</a>
                          </button>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="mt-2" style="margin-left: 15px">
                        <h4>Mã hóa đơn</h4>
                        <span>{{$bills->bill_id}}</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Tên khách hàng</h4>
                        <span>{{$billDetails->customer_name}}</span>
                    </div>
                    <div class="mt-2" style="margin-left: 15px">
                        <h4>Email</h4>
                        <span>{{$billDetails->customer_email}}</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Số điện thoại</h4>
                        <span>{{$billDetails->customer_phone}}</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Tên tour</h4>
                        <span>{{$billDetails->tour_name}}</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Ảnh tour</h4>
                        <img src="{{URL::to('/')}}/images/{{$billDetails->tour_image}}" alt="" width="200px">
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Người lớn</h4>
                        <span>{{$billDetails->quantity_OldPerson}}</span>
                    </div><div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Trẻ em (5-11 tuổi)</h4>
                        @if($billDetails->quantity_YoungPerson > 0)
                            <span>{{$billDetails->quantity_YoungPerson}}</span>
                        @else
                            <span>Không có</span>
                        @endif
                    </div><div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Trẻ nhỏ (2-5 tuổi)</h4>
                        @if($billDetails->quantity_Children > 0)
                            <span>{{$billDetails->quantity_Children}}</span>
                        @else
                            <span>Không có</span>
                        @endif
                    </div><div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Trẻ sơ sinh (nhỏ hơn 2 tuổi)</h4>
                        @if($billDetails->quantity_Infant > 0)
                            <span>{{$billDetails->quantity_Infant}}</span>
                        @else
                            <span>Không có</span>
                        @endif
                    </div><div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Tổng hóa đơn</h4>
                        <span>{{number_format($bills->bill_total)}} VND</span>
                    </div>
                </div><div class="info_group mt-2" style="margin-left: 15px">
                    <h4>Ngày thanh toán</h4>
                    <span>{{$bills->bill_date}}</span>
                </div>
                    </div><div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Ghi chú</h4>
                        @if($billDetails->note != null)
                            <span>{{$billDetails->note}}</span>
                        @else
                            <span>Không có</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection