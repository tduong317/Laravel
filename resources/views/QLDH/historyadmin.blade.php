@extends('Admin/admin')
@section('main')


<h2>Danh sách đơn hàng đã giao dịch</h2>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th class="text-center">STT</th>
            <th>Ngày mua</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th>Tác vụ</th>
        </tr>
    </thead>
    <tbody>
        @foreach($lstorder as $order)
            <tr>
                <td class="text-center">{{$loop->index + 1}}</td>
                <td>{{$order->created_at->format('d/m/20y')}}</td>
                <td>{{number_format($order->tongtien())}}đ</td>
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
                <form action="{{route('delete', $order->id)}}" method="post">
                    <td>
                        <a href="{{ route('detailadmin', $order->id) }}" class="btn btn-primary"><i class='far fa-edit'></i></a>
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc không ?')"><i class='fas fa-times-circle'></i></button>
                    </td>
                </form>
            </tr>
        @endforeach
    </tbody>
</table>

@stop