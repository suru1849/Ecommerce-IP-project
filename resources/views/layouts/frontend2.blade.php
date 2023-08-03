<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>


    @yield('meta')


    <link rel="shortcut icon" sizes="16x16" href="{{asset('assets/setting/'.App\Models\Setting::first()->favicon)}}"> <!-- favicon,  Edit it -->
    <link rel="icon" type="image/x-icon" sizes="16x16" href="{{asset('assets/setting/'.App\Models\Setting::first()->favicon)}}"> <!-- favicon,  Edit it -->


  <!-- Jquery autocomplete -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
 
  <!-- Styles -->
  <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('frontend/owl/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/owl/owl.theme.default.min.css')}}">
  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">    
  <!-- font Awesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">


</head>
<body>

@include('layouts.front_inc2.front_navbar')



@yield('content')




@include('layouts.front_inc2.footer')



  <!--Autocomplete script-->
  <script src="{{asset('js/auto_complete.js')}}"></script>
  {{-- Design --}}
  <script src="{{asset('frontend/js/script.js')}}"></script>
    <!--   Checkout JS Files   -->
  <script src="{{asset('js/checkout.js')}}"></script> 
  <!--   Sweet alert JS Files   -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
  @if(session('status'))
        <script>
         swal("{{ session('status') }}");
        </script>    
  @endif   

  @yield('scripts')
 

     
</body>
</html>
