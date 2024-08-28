@extends('Admin/admin')
@section('main')

<body>
    <h2>Danh sách thương hiệu</h2>
    </div>
    <div class="container mt-3">
        <a href="{{route('addbrand')}}" class="btn bg-success">Thêm thương hiệu <i class="fa fa-plus-circle" style="margin-left:10px"></i></a>
        <table class="table table-bordered">
            <thead>
                <tr style="text-align: center;">
                    <th>ID</th>
                    <th>Tên thương hiệu</th>
                    <th>Tác vụ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brand as $row)
                <tr>
                    <td>{{$row -> Brand_id}}</td>
                    <td>{{$row -> Brand_name}}</td>
                    <td>
                       <form action="{{route('deletebrand',$row -> Brand_id)}}" method="post">
                            <a href="{{route('editbrand',$row -> Brand_id)}}" class="btn btn-primary"><i class='far fa-edit'></i></a>
                             @method('DELETE')
                             @csrf
                            <button type="submit" class="btn btn-danger"><i class='fas fa-times-circle'></i></button>
                        </form>
                    </td>
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>

    @stop