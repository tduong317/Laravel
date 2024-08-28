@extends('giaodien/tranguser')
@section('main')
<link rel="stylesheet" href="/dist/css/chitietsp.css">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>


<script>
    function zoom(e) {
        var zoomer = e.currentTarget;
        e.offsetX ? (offsetX = e.offsetX) : (offsetX = e.touches[0].pageX);
        e.offsetY ? (offsetY = e.offsetY) : (offsetX = e.touches[0].pageX);
        x = (offsetX / zoomer.offsetWidth) * 100;
        y = (offsetY / zoomer.offsetHeight) * 100;
        zoomer.style.backgroundPosition = x + "% " + y + "%";
    }
</script>
<div class="container">
    @foreach ($spct as $tc)
        <div class="row">

            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 giua">
                <figure class="zoom" onmousemove="zoom(event)" style="background-image: url({{$tc->Images }})">
                    <img src="{{$tc->Images}}" width="100%" class="anhchitiet"/>
                </figure>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
                <!-- Image text -->
                <div class="caption-container">
                    <p id="caption"></p>
                </div>
                <!-- Thumbnail images -->
                <div class="row">
                    @foreach ($imgdetail as $img)
                        <div class="column">
                            <img class="demo cursor" src="{{$img-> Images}}" style="width:100px;height:120px">
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 giua">
                <h1 style="font-weight:bold;font-size:30px;">{{$tc->Product_name}}</h1>
                <p class=" card-text gia"> Giá
                    : {{number_format($tc->Price)}} đ</p>
                <div class="soluong">
                    <label>Số lượng:</label>
                    <input type="number" value="1" min="1">
                </div>
                <div class="size-color clearfix">

                    <div class="product-form product-size">
                        <div class="row">
                            <label class="font-weight-bold text-uppercase h6 mb-2 d-block col-12"></label>
                            <div class="col-12">
                                <ul class="wapper_cb size d-flex flex-wrap justify-content-center justify-content-lg-start">
                                   
                                        <label for="radio2298">
                                            <input type="radio" data-id="2298" value="2298" id="radio2298" name="radio"
                                                class="radio" checked>
                                            <div class="rd_in">39</div>
                                        </label>
                                   
                                    
                                        <label for="radio2299">
                                            <input type="radio" data-id="2299" value="2299" id="radio2299" name="radio"
                                                class="radio">
                                            <div class="rd_in">40</div>
                                        </label>
                                  
                                        <label for="radio2302">
                                            <input type="radio" data-id="2302" value="2302" id="radio2302" name="radio"
                                                class="radio">
                                            <div class="rd_in">41</div>
                                        </label>

                                        <label for="radio2298">
                                            <input type="radio" data-id="2298" value="2298" id="radio2298" name="radio"
                                                class="radio" checked>
                                            <div class="rd_in">42</div>
                                        </label>

                                        <label for="radio2298">
                                            <input type="radio" data-id="2298" value="2298" id="radio2298" name="radio"
                                                class="radio" checked>
                                            <div class="rd_in">43</div>
                                        </label>
                                    
                                    <div class="clear"></div>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <a href="{{route('Muahang',$tc -> Product_id)}}" class="btn buttonn" type="submit">
                    Mua
                    Hàng <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 25 25"
                        id="Shopping-Cart-2--Streamline-Core" class="cart">
                        <desc>Shopping Cart 2 Streamline Icon: https://streamlinehq.com</desc>
                        <g id="shopping-cart-2--shopping-cart-checkout">
                            <path id="Union" fill="#fff" fill-rule="evenodd"
                                d="M1.3427732142857143 2.678571428571429H3.8488928571428573l0.6793392857142857 2.1835714285714287c0.0010892857142857143 0.003517857142857143 0.0021964285714285714 0.007017857142857144 0.003321428571428572 0.010517857142857145l1.7265535714285716 8.632767857142857c0.0042678571428571436 0.04982142857142858 0.011357142857142857 0.0999107142857143 0.021392857142857144 0.15008928571428573l0.75 3.7500000000000004 0.0010535714285714287 0.0051964285714285715c0.10291071428571429 0.5041071428571429 0.3768571428571429 0.9573214285714287 0.7754821428571429 1.2826785714285716 0.39855357142857145 0.3253571428571429 0.8972678571428572 0.5030357142857144 1.411732142857143 0.5030357142857144H20.092857142857145c0.7396428571428572 0 1.3392857142857144 -0.5996428571428571 1.3392857142857144 -1.3392857142857144 0 -0.7396607142857143 -0.5996428571428571 -1.3392857142857144 -1.3392857142857144 -1.3392857142857144H9.583589285714286l-0.44642857142857145 -2.232142857142857h12.616053571428571c0.4291071428571429 0 0.8244642857142858 -0.17110714285714287 1.1198214285714285 -0.41085714285714287 0.2935714285714286 -0.23832142857142857 0.5523214285714286 -0.5971607142857143 0.6326785714285714 -1.0483392857142857l1.4614285714285715 -7.129357142857144 0.003928571428571429 -0.01855357142857143 -0.0001785714285714286 -0.00003571428571428572c0.2142857142857143 -1.1715357142857143 -0.7425 -2.107142857142857 -1.7914285714285716 -2.107142857142857H6.9318928571428575L6.351357142857143 1.7054214285714286C6.2367678571428575 1.233517857142857 5.9711428571428575 0.8110232142857143 5.593803571428571 0.5029892857142857 5.19525 0.17764035714285714 4.696535714285714 -0.00004193607142857143 4.182053571428572 0H1.3427732142857143C0.6031053571428572 0 0.003487714285714286 0.5996178571428571 0.003487714285714286 1.3392857142857144c0 0.7396607142857143 0.5996176428571428 1.3392857142857144 1.3392855 1.3392857142857144ZM18.75357142857143 21.42857142857143c0.9860714285714287 0 1.7857142857142858 0.7994642857142857 1.7857142857142858 1.7857142857142858s-0.7996428571428571 1.7857142857142858 -1.7857142857142858 1.7857142857142858c-0.9863035714285715 0 -1.7858035714285718 -0.7994642857142857 -1.7858035714285718 -1.7857142857142858s0.7995000000000001 -1.7857142857142858 1.7858035714285718 -1.7857142857142858Zm-7.142946428571428 1.7857142857142858c0 -0.9862500000000001 -0.7994821428571429 -1.7857142857142858 -1.7857142857142858 -1.7857142857142858 -0.9862142857142857 0 -1.7857142857142858 0.7994642857142857 -1.7857142857142858 1.7857142857142858s0.7995000000000001 1.7857142857142858 1.7857142857142858 1.7857142857142858c0.9862321428571428 0 1.7857142857142858 -0.7994642857142857 1.7857142857142858 -1.7857142857142858Z"
                                clip-rule="evenodd" stroke-width="1"></path>
                        </g>
                    </svg></a>
                <a href="/" class="btn btn-danger back" type="submit">Quay Lại</a>
                <br>

            </div>


        </div>
    @endforeach
</div>
@stop