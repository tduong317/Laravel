@extends('giaodien/tranguser')
@section('main')
    <div class="container" style="text-align:center">
        <h1>Đặt hàng thành công</h1>
        <b>Vui lòng kiểm tra email và xác nhận mua hàng</b>
        <p></p>
        <a href="{{route('sanpham')}}" class="btn btn-primary">Tiếp tục mua hàng</a>
    </div>

@stop