@extends('giaodien/tranguser')
@section('main')

<div id="demo" class="carousel slide" data-bs-ride="carousel">
    <!-- <div class="carousel-indicators">
        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div> -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://kingshoes.vn/data/upload/thumb/coverwebcrep-1554432453i-1622454041-1623428656png/1903_coverwebcrep-1554432453i-1622454041-1623428656.png"
                class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="https://kingshoes.vn/data/upload/thumb/banner-sn3web-1571294680--acbihpps-1592386128--hipspcba-1622453987jpg/1903_banner-sn3web-1571294680--acbihpps-1592386128--hipspcba-1622453987.jpg"
               class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="https://kingshoes.vn/data/upload/thumb/spa-giay-dan-sole-ve-sinh-crep-protect-tai-king-shoes-sneaker-real-hcm-gia-re-8-1576661620--phbspcia-1592386256--apbihspc-1622454065jpg/1903_spa-giay-dan-sole-ve-sinh-crep-protect-tai-king-shoes-sneaker-real-hcm-gia-re-8-1576661620--phbspcia-1592386256--apbihspc-1622454065.jpg"
               class="d-block w-100">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
    <h1>Sản phẩm mới</h1>
    <div class="container sanpham">   
    <div class="row">
    @foreach ($moi as $row)
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 sp">  
                <div class="container mt-3">
                    <div class="card">
                    <p class="new">New</p>
                        <a href="/chitiet/{{\Str::slug($row -> Product_name)}}_{{$row->Product_id}}"><img class="card-img-top" src="{{$row->Images}}" alt="Card image" width="100%" height="270px"></a>
                        <div class="card-body" id="product">
                            <a href="/chitiet/{{\Str::slug($row -> Product_name)}}_{{$row->Product_id}}" style="text-decoration: none; color:black;">
                                <h6 class="card-title" style="font-size:23px ;">{{\Str::limit($row->Product_name,50)}}</h6>
                            </a>
                            <p class="card-text" style="color:red;font-size:20px">{{number_format($row->Price)}}đ</p>
                            <a href="{{route('Muahang',$row -> Product_id)}}" class="btn btn-primary add">Thêm vào giỏ hàng<span><i
                                        class="fas fa-cart-plus"></i></span></a>
                            <div class="radio-input">
                                <input value="value-1" name="{{$row->Product_id}}value-radio" id="{{$row->Product_id}}value-1"
                                    type="radio" class="star s1" />
                                <input value="value-2" name="{{$row->Product_id}}value-radio" id="{{$row->Product_id}}value-2"
                                    type="radio" class="star s2" />
                                <input value="value-3" name="{{$row->Product_id}}value-radio" id="{{$row->Product_id}}value-3"
                                    type="radio" class="star s3" />
                                <input value="value-4" name="{{$row->Product_id}}value-radio" id="{{$row->Product_id}}value-4"
                                    type="radio" class="star s4" />
                                <input value="value-5" name="{{$row->Product_id}}value-radio" id="{{$row->Product_id}}value-5"
                                    type="radio" class="star s5" />
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
    @endforeach
    </div>
    </div>
    <h1>Sản phẩm nổi bật</h1>
    <div class="container">
    <div class="row">
    @foreach ($hot as $row)
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 sp">  
                <div class="container mt-3">
                    <div class="card" id="product">
                    <p class="hot">Hot</p>
                        <a href="/chitiet/{{\Str::slug($row -> Product_name)}}_{{$row->Product_id}}"><img class="card-img-top" src="{{$row->Images}}" alt="Card image" width="100%" height="270px"></a>
                        <div class="card-body">
                            <a href="/chitiet/{{\Str::slug($row -> Product_name)}}_{{$row->Product_id}}" style="text-decoration: none; color:black;">
                                <h6 class="card-title" style="font-size:23px ;">{{\Str::limit($row->Product_name,50)}}</h6>
                            </a>
                            <p class="card-text" style="color:red;font-size:20px">{{number_format($row->Price)}}đ</p>
                            <a href="{{route('Muahang',$row -> Product_id)}}" class="btn btn-primary add">Add to cart <span><i
                                        class="fas fa-cart-plus"></i></span></a>
                            <div class="radio-input">
                                <input value="value-1" name="{{$row->Product_id}}value-radio" id="{{$row->Product_id}}value-1"
                                    type="radio" class="star s1" />
                                <input value="value-2" name="{{$row->Product_id}}value-radio" id="{{$row->Product_id}}value-2"
                                    type="radio" class="star s2" />
                                <input value="value-3" name="{{$row->Product_id}}value-radio" id="{{$row->Product_id}}value-3"
                                    type="radio" class="star s3" />
                                <input value="value-4" name="{{$row->Product_id}}value-radio" id="{{$row->Product_id}}value-4"
                                    type="radio" class="star s4" />
                                <input value="value-5" name="{{$row->Product_id}}value-radio" id="{{$row->Product_id}}value-5"
                                    type="radio" class="star s5" />
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
    @endforeach
    </div>
    </div>

@stop
