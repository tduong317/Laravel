@extends('Admin/admin')
@section('main')

<h2>Thêm Thương Hiệu</h2>
<form action="{{route('savebrand')}}" method="post">
<div class="mb-3 mt-3">
        <label for="" class="form-label">Thương hiệu mới</label>
        <input type="text" class="form-control" placeholder="Nhập thương hiệu" name="Brand_name">
    </div>
    <button type="submit" class="btn btn-success">Save<i class='fas fa-save' style="margin-left:10px"></i></button>
    <a href="{{route('danhsachbrand')}}" class="btn btn-secondary">Trở lại <i class='fas fa-reply' style="margin-left:10px"></i></a>
    @csrf
</form>

@stop