@extends('layouts.admin')

@section('title')
   
@endsection


@section('content')

<div class="container">
      
      <div class="row">
            <div class="col-md-12">
                  <div class="card">
                        <div class="card-header bg-primary text-white">
                           <h4>User Details
                                 <a href="{{url('users')}}" class="btn btn-warning text-white float-right">Back</a>
                           </h4>
                        </div>
                        <div class="card-body">
                              <div class="row">
                                    <div class="col-md-4 mt-3">
                                          <label for="">Role</label>
                                              <div class="border p-2">{{$user->role_as==0 ? 'User':'Admin'}}</div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                          <label for="">Name</label>
                                              <div class="border p-2">{{$user->name}}</div>
                                    </div>

                                    <div class="col-md-4 mt-3"><label for="">Email</label>
                                          <div class="border p-2">{{$user->email}}</div></div>
                            

                              </div>

                        </div>
                  </div>

            </div>
      </div>
</div>

@endsection