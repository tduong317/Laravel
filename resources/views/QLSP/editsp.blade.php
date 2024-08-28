@extends('Admin/admin')
@section('main')

<h2>Thêm sản phẩm</h2>
<form action="{{route('savenewsp', $product -> Product_id)}}" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="">Thương hiệu</label>
    <select name="Brand">
      <option value="">Chọn nhóm</option>
      @foreach ($brand as $br)
      <option value="{{$br->Brand_id}}">{{$br->Brand_name}}</option>
    @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="">Danh mục</label>
    <select name="Category_id">
      <option value="">Chọn nhóm</option>
      @foreach ($category as $cate)
      <option value="{{$cate->Category_id}}">{{$cate->Category_product}}</option>
    @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">ID</label>
    <input type="" class="form-control" name="Product_name" readonly value="{{$product -> Product_id}}"> 
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Tên sản phẩm</label>
    <input type="" class="form-control" placeholder="Nhập tên sản phẩm" name="Product_name" value="{{$product -> Product_name}}">
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Gía</label>
    <input type="" class="form-control" placeholder="Giá sản phẩm" name="Price" value="{{$product -> Price}}">
  </div>
  <select name="Status" id="">
    <option value="0">Sản phẩm mới</option>
    <option value="1">Sản phẩm nổi bật</option>
  </select>

  <div class="form-group">
    <label for="">Chọn ảnh</label>
    <input type="file" class="form-control" name="upload" value="{{$product -> Images}}">
    @error('upload')
    <small class="help-block text-danger">{{$message}}</small>
    @enderror
  </div>
  @csrf
  @method('put')
  <button type="submit" class="btn btn-success">Save<i class='fas fa-save' style="margin-left:10px"></i></button>
  <a href="{{route('danhsachsp')}}" class="btn btn-secondary">Trở lại<i class='fas fa-reply'
      style="margin-left:10px"></i></a>
</form>

@stop