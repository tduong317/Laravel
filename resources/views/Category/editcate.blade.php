@extends('Admin/admin')
@section('main')

<div class="container mt-3">
    <h2>Sửa danh mục</h2>
    <form action="{{route('savenewcate', $category->Category_id)}}" method="post">
        <div class="mb-3 mt-3">
            <label for="">ID</label>
            <input type="" class="form-control" id="" placeholder="" name="Category_id" readonly value="{{$category->Category_id}}">
        </div>
        <div class="mb-3">
            <label for="pwd">Loại sản phẩm</label>
            <input type="" class="form-control" id="" placeholder="Nhập loại sản phẩm" name="Category_product" value="{{$category->Category_product}}">
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>

        @csrf
        @method('PUT')
    </form>
</div>

@stop