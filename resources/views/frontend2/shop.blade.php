@extends('layouts.frontend2')                                     <!-- showing main component  -->
   
@section('title')
Home
@endsection
@section('meta')
<style>
 
    nav svg {
            height:20px;
            }
</style>

@endsection


@section('content')

<div class="searchbox">
    <form action="{{url('/shop')}}" method="GET">
        <input type="text" name="serach_key" placeholder="Search What you need">
        <button type="submit" class="fas fa-search fa-2x" style="font-size:14px;">Search</button>
    </form>
</div>
 
    
 </section>
 
        
 <section id="product1" class="section-p1"> 
    <div class="pro-container">
        @foreach($products as $product)
            <div class="pro">
                <img src="{{asset('assets/uploads/product/'.$product->image)}}" >
            <div class="des">
                <h5><a href="sproduct.html">{{$product->name}}</a>
                </h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>${{$product->selling_price}}</h4>
            </div>
            <a onclick="addToCartBtn({{$product->id}})" href="#"><i  class="fal fa-shopping-cart" ></i></a>
            </div>
        @endforeach
    </div>
</section>
 
@endsection

@section('scripts')
<script src="{{asset('js/cart.js')}}"></script>
@endsection

