@extends('giaodien/tranguser')
@section('main')

<div class="row" style="margin-top:50px">
    <div class="col-md-4">
        <h2>Thông tin đặt hàng </h2>
        @if (count($cart->items) > 0)
            <form action="" method="POST" role="form" style="margin-top:50px">
                @csrf
                <div class="form-group">
                    <label for="">Họ và tên</label>
                    <input type="text" class="form-control" name="Name" value="{{$customer->name}}">
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ email</label>
                    <input type="text" class="form-control" name="Email" value="{{$customer->email}}">
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ giao hàng</label>
                    <input type="text" class="form-control" name="Address" value="{{$customer->address}}">
                </div>
                <button type="submit" class="btn btn-primary">Đặt hàng</button>
            </form>
        @endif
    </div>
    <div class="col-md-8">
        <h2>Giỏ hàng, Số lượng: {{ $cart->tongsl }}, Tổng tiền: {{ number_format($cart->tongtien) }} đ </h2>

        @if (count($cart->items) > 0)

            <table class="table table-bordered table-hover" style="margin-top:50px">
                <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng giá tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart->items as $item)
                        <tr>
                            <td class="text-center">{{$loop->index + 1}}</td>
                            <td>{{$item->Tensp}}</td>
                            <td>{{ number_format($item->Gia) }} đ</td>
                            <td>
                                <form action="{{route('updategiohang')}}">
                                    <input type="number" name="quantity" value="{{$item->Soluong}}" min="1"
                                        style="width:80px; text-align: center">
                                </form>
                            </td>
                            <td>{{ number_format($item->Soluong * $item->Gia) }} đ</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            @if (Session::has('ok'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Successfully!</strong> Đặt hàng thành công
                </div>
            @endif
            <div class="alert alert-danger">
                <a href="{{route('sanpham')}}">hãy click vào đây</a>
                để tiếp tục mua hàng
            </div>
        @endif
    </div>
</div>

@stop