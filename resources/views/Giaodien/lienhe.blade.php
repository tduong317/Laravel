@extends('giaodien/tranguser')
@section('main')
<div class="container">
    <h2 style="text-align: center;margin-top:50px">Form liên hệ</h2>
    @if (Session::has('ok'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Successfully!</strong> gửi email thành công
        </div>
    @endif
    <form action="{{route('home.sendContact')}}" method="POST" role="form">
        @csrf
        <div class="form-group">
            <label for="">Họ và tên</label>
            <input type="text" class="form-control" name="Name">
            @error('Name') {{$message}} @enderror
        </div>
        <div class="form-group">
            <label for="">Địa chỉ email</label>
            <input type="Email" class="form-control" name="Email">
            @error('Email') {{$message}} @enderror
        </div>
        <div class="form-group">
            <label for="">Nội dung liên hệ</label>
            <textarea name="message" class="form-control" placeholder="Nội dung..."></textarea>
            @error('message') {{$message}} @enderror
        </div>
        <button type="submit" class="btn btn-primary">Gửi liên hệ</button>
    </form>
</div>
@stop