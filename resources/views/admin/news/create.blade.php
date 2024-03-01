@extends('admin.admin')
@section('content')
<div style="min-height: 650px">
    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
        <h3 class="text-white text-capitalize ps-3">Thêm tin tức mới</h3>
        <button class="btn  ">
            <a class="text-white" href="{{route('news.index')}}">Quay lại</a>
        </button>
    </div>
    <form role="form" class="text-start" action="{{route('news.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group input-group-outline my-3">
          <label class="form-label">Tên tin tức</label> <br>
          <input type="text" class="form-control" name="new_name">
        </div>
          <div>
            <p >Ảnh</p>
            <input type="file" name="new_image">
          </div>
          <div class="input-group input-group-outline my-3" style="display: inline">
            <p>Nội dung</p>
            <textarea id="new_desc" type="text" class="form-control mt-5" name="new_description"style="height: 150px;"></textarea>
          </div>
        <div class="text-center">
          <button type="submit" class="btn bg-gradient-primary my-4 mb-2">Thêm mới</button>
        </div>
    </form>
</div>
@endsection
@section('ckeditor')
    <script>
        ClassicEditor
            .create(document.getElementById('new_desc'))
            .catch(error =>{
                console.error(error);
            });
    </script>
@endsection