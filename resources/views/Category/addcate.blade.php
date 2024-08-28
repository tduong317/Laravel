@extends('Admin/admin')
@section('main')

<h2>Thêm danh mục</h2>
<form action="{{route('savecate')}}" method="post">
    <div class="mb-3">
        <label for="" class="form-label">Tên danh mục</label>
        <input type="text" class="form-control" placeholder="Nhập tên danh mục" name="Category_product">
    </div>
    <button type="submit" class="btn btn-success">Save<i class='fas fa-save' style="margin-left:10px"></i></button>
    <a href="{{route('danhsachcate')}}" class="btn btn-secondary">Trở lại<i class='fas fa-reply' style="margin-left:10px"></i></a>
    @csrf
</form>

@stop