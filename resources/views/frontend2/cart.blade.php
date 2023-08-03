@extends('layouts.frontend2')                                     
   
@section('title')
Home
@endsection
@section('meta')
<style>
     .form-group {
       margin-bottom: 15px;
      
     }
     
     .form-group label {
       display: block;
       margin-bottom: 5px;
       font-weight: 400;
     }
     
     .form-group input {
       width: 100%;
       padding: 8px;
       border: 1px solid #044ee0;
       border-radius: 4px;
     }
     
     .form-group input[type="submit"] {
       background-color: #fcfcfc;
       color: rgb(12, 103, 54);
       cursor: pointer;
       font-size: 18px;
     }
     
     .form-group input[type="submit"]:hover {
       background-color: #45a049;
     }
    </style>
@endsection


@section('content')
<div class="cartlistitems">
<section id="cart" class="section-p1">
<table width="100%">
  <thead>
      <tr>
          <td>Remove</td>
          <td>Image</td>
          <td>Product</td>
          <td>Price</td>
          <td>Quantity</td>
          <td>Subtotal</td>
      </tr>
  </thead>
  <tbody>
      @php
          $grand_total=0;
      @endphp
      @foreach($carts as $cart)
      <tr>
          <td><a onclick="removeFromCartBtn({{$cart->prod_id}})" href="#"><i class="far fa-times-circle"></i></a></td>
          <td><img src="{{asset('assets/uploads/product/'.$cart->product->image)}}" alt=""></td>
          <td>{{$cart->product->name}}</td>
          <td>$ {{$cart->product->selling_price}}</td>
          <td><input type="number" value="{{$cart->prod_qty}}" id="{{$cart->prod_id}}" name="{{$cart->prod_qty}}" onchange="incrementProduct(this)"></td>
          @php
              $sub_total=$cart->prod_qty*$cart->product->selling_price;
          @endphp
          <td>$ {{$sub_total}}</td>
          @php
          $grand_total+=$sub_total;
          @endphp
      </tr>
      @endforeach
  </tbody>
</table>
</section>

<section id="cart-add">
<div id="subtotal">
<form method="POST" action="{{url('/place-order')}}">
        @csrf
    <h3>Cart Total</h3>
    <table>
        <tr>
           <td>Cart Subtotal</td>
           <td>${{$grand_total}}</td>
        </tr>
        <tr>
            <td>Shipping
            </td>
            <td>Free</td>
        </tr>
        <tr>
            <td><strong>Total</strong></td>
            <td><strong>${{$grand_total}}</strong></td>
        </tr>

    </table>

    <section id="sign">
        <div class="container">
          <h4>Shipping Information</h4>
            <div class="form-group" style="margin-top:10px;">
              <label for="username">Phone:</label>
              <input type="text" name="phone" required>
            </div>
            <div class="form-group">
              <label for="username">Address:</label>
              <input type="text" name="address1" required>
            </div>
            <div class="form-group">
              <label for="username">City:</label>
              <input type="text" name="city" required>
            </div>
            <div class="form-group">
              <label for="username">State:</label>
              <input type="text" name="state" required>
            </div>
            <div class="form-group">
              <label for="username">Country:</label>
              <input type="text" name="country" required>
            </div>
          
        </div>
        <div>
          <img src="/img/robotics2/signin.jpg" alt="">
        </div>
      </section>
    <button type="submit" class="normal">Cash On Delivery</button>
</form>
</div>
</section>

</div>


@endsection

@section('scripts')
<script src="{{asset('js/cart.js')}}"></script>
@endsection

