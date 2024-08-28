@extends('Admin/admin')
@section('main')

<h2>Sửa Thương Hiệu</h2>
<form action="{{route('savenewbrand', $brand->Brand_id)}}" method="post">
    <div class="mb-3 mt-3">
        <label for="" class="form-label">ID</label>
        <input type="" class="form-control" id="" placeholder="" name="Brand_id" readonly value="{{$brand->Brand_id}}">
    </div>
    <div class="mb-3 mt-3">
        <label for="" class="form-label">Tên thương hiệu</label>
        <input type="text" class="form-control" placeholder="Nhập thương hiệu" name="Brand_name" value="{{$brand -> Brand_name}}">
    </div>
    <button type="submit" class="btn btn-success">Lưu</button>

    @csrf
    @method('PUT')
</form>
    
@stop