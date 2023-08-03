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
      
      <div class="row mt">
            <div class="col-md-12">
                  <div class="card">
                        <div class="card-header">
                           <h4>My Orders</h4>
                        </div>
                        <div class="card-body">
                              <div style="overflow-x: auto">
                                    <table class="table table-bordered">
                                          <thead>
                                                <tr>
                                                      <th>Date</th>
                                                      <th>Total Price</th>
                                                      <th>Payment Mode</th>
                                                      <th>Status</th>
                                                      <th>Action</th>
                                                </tr>
                                          </thead>
                                          <tbody>
                                                @foreach ($my_order as $item)
                                                    <tr>
                                                          <td>{{date('d-m-Y',strtotime($item->created_at))}}</td>
                                                          <td>{{$item->total_price}}</td>
                                                          <td>{{$item->payment_mode=='COD' ? 'Cash On Delivery':$item->payment_mode}}</td>
                                                          <td>{{$item->status==0 ? 'Pending':'Completed'}}</td>
                                                          <td>
                                                                <a href="{{url('/view-order/'.$item->id)}}" class="btn btn-primary">View</a>
                                                          </td>
                                                      </tr>          
                                                @endforeach
                                          </tbody>
                                    </table>
                              </div>    
                        </div>
                  </div>

            </div>
      </div>
</div>

@endsection