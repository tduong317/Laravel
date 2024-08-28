@extends('Admin/admin')
@section('main')

<body>
    <h2>Danh sách danh mục</h2>
    </div>
    <div class="container mt-3">
        <a href="{{route('addcate')}}" class="btn bg-success">Thêm danh mục<i class="fa fa-plus-circle" style="margin-left: 10px"></i></a>
        <table class="table table-bordered">
            <thead>
                <tr style="text-align: center;">
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Tác vụ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $row)
                    <tr>
                        <td> {{$row->Category_id}} </td>
                        <td> {{$row->Category_product}} </td>
                        <td>
                            <form action="{{route('deletecate',$row -> Category_id)}}" method="post">
                                <a href="{{route('editcate', $row -> Category_id)}}" class="btn btn-primary"><i class='far fa-edit'></i></a>
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