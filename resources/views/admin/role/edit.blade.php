@extends('admin.admin')
@section('content')
<div style="min-height: 650px">
    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
        <h3 class="text-white text-capitalize ps-3">Sửa Tour</h3>
        <button class="btn  ">
            <a class="text-white" href="{{route('role.index')}}">Quay lại</a>
        </button>
    </div>
    <form role="form" class="text-start" action="{{route('role.update', $role->role_id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="input-group input-group-outline my-3">
          <label class="form-label">Tên role</label> <br>
          <input type="text" class="form-control" name="role_name" value="{{$role->role_name}}">
        </div>
        <div class="text-center">
          <button type="submit" class="btn bg-gradient-primary my-4 mb-2">Sửa</button>
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