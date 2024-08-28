@extends('Admin/admin')
@section('main')

<body>
    <h2>Danh sách sản phẩm</h2>
    <div>
        <form class="d-flex timkiem" action="{{route('danhsachsp', 'Brand')}}">
            <div class="mb-3">
                <label for="">Thương hiệu</label>
                <select name="Brand" onchange="forms[1].submit()">
                    <option value="0">Chọn nhóm</option>
                    @foreach ($brand as $br)
                    <option value="{{$br->Brand_id}}">{{$br->Brand_name}}</option>
                    @endforeach
                </select>
            </div>
        </form>
        <a href="{{route('addsp')}}" class="btn bg-success">Thêm sản phẩm <i class="fa fa-plus-circle" style="margin-left:10px"></i></a>
        <table class="table table-bordered">
            <thead>
                <tr style="text-align: center;">
                    <th>ID</th>
                    <th>Thương hiệu</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá tiền</th>
                    <th>Hình ảnh</th>
                    <th>Tác vụ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $row)
                <tr>
                    <td>{{$row->Product_id}}</td>
                    <td>{{$row->Brand_name}}</td>
                    <td>{{$row->Product_name}}</td>
                    <td style="font-weight: bold;color: red">{{number_format($row->Price)}}đ</td>
                    <td><img src="{{$row->Images}}" style="width:100px" alt=""></td>
                    <td>
                        <form action="{{route('deletesp', $row->Product_id)}}" method="post">
                            <a href="{{route('editsp', $row->Product_id)}}" class="btn btn-primary"><i class='far fa-edit'></i></a>
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger"><i class='fas fa-times-circle'></i></button>
                            <a href="{{route('themanh', $row->Product_id)}}" class="btn btn-warning"><i class='far fa-image' style='font-size:20px'></i></a>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    @stop