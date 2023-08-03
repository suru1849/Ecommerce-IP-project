@extends('layouts.frontend2')

@section('title')
   
@endsection

@section('meta')
<link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/bootstrap.min.css.map') }}" rel="stylesheet">
<link href="{{ asset('frontend/js/bootstrap.bundle.min.js.map') }}" rel="stylesheet">
@endsection


@section('content')

<div class="container py-5">
      
      <div class="row">
            <div class="col-md-12">
                  <div class="card">
                        <div class="card-header">
                           <h4>Order View
                                 <a href="{{url('my-orders')}}" class="btn btn-warning text-white float-end">Back</a>
                           </h4>
                        </div>
                        <div class="card-body">
                              <div class="row">
                                    <div class="col-md-6">
                                          <h4>Shopping Details</h4>
                                          <hr>
                                              <label for="">Name</label>
                                              <div class="border p-2">{{$order->user->name}}</div>
                                              <label for="">Email</label>
                                              <div class="border p-2">{{$order->user->email}}</div>
                                              <label for="">Contact No.</label>
                                              <div class="border p-2">{{$order->phone}}</div>
                                              <label for="">Shipping Address</label>
                                              <div class="border p-2">{{$order->address1.','.$order->city.','.$order->state.','.$order->country}}</div>
                                    </div>

                                    <div class="col-md-6">
                                          <h4>Order Details</h4>
                                          <hr>
                                          <div style="overflow-x:auto;">
                                          <table class="table table-bordered">
                                                <thead>
                                                      <tr>
                                                            <th>Name</th>
                                                            <th>Quantity</th>
                                                            <th>Price</th>
                                                            <th>Image</th>
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                      @foreach ($order->orderItem as $item)
                                                          <tr>
                                                                <td>{{$item->product->name}}</td>
                                                                <td>{{$item->qty}}</td>
                                                                <td>{{$item->price}}</td>
                                                                <td>
                                                                      <img src="{{asset('assets/uploads/product/'.$item->product->image)}}" width="50px" alt="Product Image">
                                                                </td>
                                                            </tr>          
                                                      @endforeach
                                                </tbody>
                                          </table>
                                          </div>
                                          <h4 class="px-2">Grand Total:<span class="float-end">$ {{$order->total_price}}</span></h4>
                                          <h4 class="px-2">Payment:<span class="float-end">{{$order->payment_mode=='cod' ? 'Cash On Delivery':$order->payment_mode}}</span></h4>
                                    </div>
                              </div>

                        </div>
                  </div>

            </div>
      </div>
</div>

@endsection