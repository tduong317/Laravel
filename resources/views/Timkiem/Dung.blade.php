@extends('Giaodien/tranguser')
@section('main')

<div class="container sanpham">   
    <div class="row">
    @foreach ($sp as $row)
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 sp">  
                <div class="container mt-3">
                    <div class="card" style="text-align:center">
                        <a href="/chitiet/{{\Str::slug($row -> Product_name)}}_{{$row->Product_id}}"><img class="card-img-top" src="{{$row->Images}}" alt="Card image" width="250px" height="250px"></a>
                        <div class="card-body">
                            <a href="/chitiet/{{\Str::slug($row -> Product_name)}}_{{$row->Product_id}}" style="text-decoration: none; color:black;">
                                <h6 class="card-title" style="font-size:23px ;">{{\Str::limit($row->Product_name,50)}}</h6>
                            </a>
                            <p class="card-text" style="color:red;font-size:20px">{{number_format($row->Price)}}đ</p>
                            <a href="#" class="btn btn-primary add">Add to cart <span><i
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