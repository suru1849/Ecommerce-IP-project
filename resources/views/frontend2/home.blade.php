@extends('layouts.frontend2')                                     <!-- showing main component  -->
   
@section('title')
Home
@endsection
@section('meta')


@section('content')


<section id="hero" style="background-image: url('{{asset('frontend/img/bg.png')}}');">
    <h4>Trade-in-offer</h4>
    <h2>Super Value Deals</h2>
    <h1>On all Products</h1>
    <p>Save Up To 70% off!</p>
    <button ><a href="shop.html">Shop now</a></button>
</section>
     





<section id="feature" class="section-p1">
    <div class="fe-box">
        <img src="{{asset('frontend/img/features/f1.png')}}" alt="">
        <h6>Free Shipping</h6>
    </div>
    <div class="fe-box">
        <img src="{{asset('frontend/img/features/f2.png')}}" alt="">
        <h6>Online order</h6>
    </div>
    <div class="fe-box">
        <img src="{{asset('frontend/img/features/f3.png')}}" alt="">
        <h6>Save money</h6>
    </div>
    <div class="fe-box">
        <img src="{{asset('frontend/img/features/f4.png')}}" alt="">
        <h6>Promotions</h6>
    </div>
    <div class="fe-box">
        <img src="{{asset('frontend/img/features/f5.png')}}" alt="">
        <h6>Happy Sell</h6>
    </div>
    <div class="fe-box">
        <img src="{{asset('frontend/img/features/f6.png')}}" alt="">
        <h6>24/7 Support</h6>
    </div>
</section>

<section id="product1" class="section-p1">
    <h2>Featured Product</h2>
    <p>Robotics parts are now here</p>
    <div class="pro-container">
        @foreach($featured_products as $featured_product)
        <div class="pro">
            <img src="{{asset('assets/uploads/product/'.$featured_product->image)}}" alt="">
            <div class="des">
                <h5>{{$featured_product->name}}</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>${{$featured_product->selling_price}}</h4>
            </div>
            <a onclick="addToCartBtn({{$featured_product->id}})" href="#"><i  class="fal fa-shopping-cart" ></i></a>
        </div>
        @endforeach
    </div>

</section>


@endsection

@section('scripts')
<script src="{{asset('js/cart.js')}}"></script>
@endsection

















    

       




