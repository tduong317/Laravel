@extends('giaodien/tranguser')
@section('main')
<h2 style="margin-top:50px;text-align:center">Chi tiết đơn hàng</h2>
<div class="row">
    <div class="col-md-6">
        <h3 style="margin-top:50px;">Thông tin đơn hàng</h3>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Mã</th>
                    <td>#{{$order->id}}</td>
                </tr>
                <tr>
                    <th>Ngày đặt</th>
                    <td>{{$order->created_at->format('d/m/20y')}}</td>
                </tr>
                <tr>
                    <th>Tổng tiền</th>
                    <td>{{number_format($order->tongtien())}}</td>
                </tr>
                <tr>
                    <th>Trạng thái</th>
                    <td>
                        @if ($order->Status == 0)
                            <span class="label label-warning">Chờ duyệt</span>
                        @elseif ($order->Status == 1)
                            <span class="label label-primary">Đã duyệt</span>
                        @elseif ($order->Status == 2)
                            <span class="label label-success">Đã hoàn thành</span>
                        @else
                            <span class="label label-danger">Đã hủy</span>
                        @endif
                    </td>
                </tr>
            </thead>
        </table>
    </div>
    <div class="col-md-6">
        <h3 style="margin-top: 50px">Thông tin giao hàng</h3>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Họ tên</th>
                    <td>{{$order->Name}}</td>
                </tr>
                <tr>
                    <th>Địa chỉ</th>
                    <td>{{$order->Address}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$order->Email}}</td>
                </tr>
            </thead>
        </table>
    </div>
</div>


<h3>Chi tiết sản phẩm của đơn hàng</h3>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th class="text-center">STT</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->detail as $detail)
            <tr>
                <td class="text-center">{{$loop->index + 1}}</td>
                <td>{{$detail->product->Product_name}}</td>
                <td>{{$detail->quantity}}</td>
                <td>{{ number_format($detail->Price) }} đ</td>
                <td>{{ number_format($detail->Price * $detail->quantity) }} đ</td>
            </tr>
        @endforeach
    </tbody>
</table>

@stop