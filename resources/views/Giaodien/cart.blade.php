@extends('giaodien/tranguser')
@section('main')

<body>
    <h1 style="text-align: center;">Giỏ hàng</h1>
    <div class="container-fluid" style="text-align: center;">
        <table class="table table-bordered">
            <thead>
                <tr style="text-align: center;">
                    <th>Tên sản phẩm</th>
                    <th>Giá tiền</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Hình ảnh</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart->items as $row)
                    <form action="{{route('updategiohang')}}" method="post">
                        <tr>
                            <td style="font-weight:bold;">{{$row->Tensp}}</td>
                            <td style="font-weight: bold;color: red">{{number_format($row->Gia)}}</td>
                            <td>
                                <input type="number" value="{{$row->Soluong}}" name="sl" min="1">
                                <button type="submit" class="btn btn-info"><i class="material-icons">&#xe8ba;</i></button>
                            </td>
                            <td style="font-weight: bold;color: red">{{number_format($row->Soluong * $row->Gia)}}đ
                            </td>
                            <td><img src="{{$row->Anh}}" style="width:150px" alt=""></td>
                            <td>
                                <input type="hidden" value="{{$row->Product_id}}" name="id">
                                @method("PUT")

                                <a href="{{route('xoagiohang', $row->Product_id)}}" class="btn btn-danger"><i
                                        class='fas fa-times-circle'></i></a>
                            </td>
                        </tr>
                        @csrf
                    </form>
                @endforeach
                <tr>
                    <th colspan="2">Tổng số lượng : </th>
                    <th>{{$cart->tongsl}}</th>
                </tr>
                <tr>
                    <th colspan="3">Tổng tiền mua hàng : </th>
                    <th style="font-size:20px">{{number_format($cart->tongtien)}}đ</th>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="container-fluid" style="text-align: center;">
        <a href="{{route('huygiohang')}}" class="btn btn-danger">Hủy đơn hàng</a>
        <a href="{{route('order.checkout')}}" class="btn btn-success">Đặt hàng</a>
        <a href="/" class="btn btn-secondary">Trở lại<i class='fas fa-reply' style="margin-left:10px"></i></a>
    </div>
    @stop