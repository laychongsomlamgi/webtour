@extends('admin.admin')
@section('content')
    <div class="row" style="min-height: 650px">
        <div class="col-12">
            <div class="car my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                      <h6 class="text-white text-capitalize ps-3">Chi tiết tin tức</h6>
                          <button class="btn  ">
                              <a class="text-white" href="{{route('news.index')}}">Quay lại</a>
                          </button>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="mt-2" style="margin-left: 15px">
                        <h4>Mã tin</h4>
                        <span>{{$news->new_id}}</span>
                    </div>
                    <div class="mt-2" style="margin-left: 15px">
                        <h4>Tên tin tức</h4>
                        <span>{{$news->new_name}}</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Ảnh tour</h4>
                        <img src="{{URL::to('/')}}/news/images/{{$news->new_image}}" alt="" width="200px">
                    </div>
                    <div class="mt-2" style="margin-left: 15px">
                        <h4>Ngày đăng</h4>
                        <span>{{date('d-m-Y', strtotime($news->new_date))}}</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Nội dung</h4>
                        <span>{!!$news->new_description!!}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection