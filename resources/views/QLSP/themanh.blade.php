@extends('admin/admin')
@section('main')

<div class="container mt-3">
    <h2>Thêm ảnh cho sản phẩm</h2>
    <h3>{{$productname}}</h3>
    <table class="table table-secondary">
        <thead>
            <th>Hình ảnh</th>
            <th>Chức năng</th>
        </thead>
        <tbody>
            @foreach ($themanh as $row)
                <tr>
                    <td>
                        <img src="{{$row -> Images}}" alt="" width="100px" >
                    </td>
                    <td>
                        <form action="{{route('Xoaanh', $row->Images_id)}}" method="post">
                            @method ('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger"><i class='fas fa-times-circle'></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <form action="{{route('luuanh', $id)}}" method="post" enctype="multipart/form-data">
        <input type="hidden" value="{{$id}}" name="Images_id">
        <div class="mb-3 mt-3">
            <label for="" class="form-label">Hình ảnh</label>
            <input type="file" name="upload">
        </div>
        <button type="submit" class="btn btn-success">Save<i class='fas fa-save' style="margin-left:10px"></i></button>
        <a href="{{route('danhsachsp')}}" class="btn btn-primary">Trở lại<i class='fas fa-reply' style="margin-left:10px"></i></a>
        @csrf
    </form>
</div>
@stop