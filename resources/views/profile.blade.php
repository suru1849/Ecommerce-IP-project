@extends('layouts.frontend2')

@section('content')
<div class="container py-3">
    <div class="row">
        <div class="col-md-8" style="text-align:center;">
            <p><b>Name:</b>{{Auth::user()->name}}</p>
            <p><b>Email:</b>{{Auth::user()->email}}</p>
        </div>
    </div>
        

</div>
@endsection
