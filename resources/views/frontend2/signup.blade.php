@extends('layouts.frontend2')                                     <!-- showing main component  -->
   
@section('title')
Home
@endsection
@section('meta')
<style>
  #signup{
   display: flex;
   justify-content:space-between  ;
   align-items: center;
  
   margin: 100px auto;
   font-family: "Spartan", sans-serif;
   background-color:#FAF3F0;
   padding:50px 400px;
  }
   /* .container {
   max-width: 400px;
   margin: 50px auto;
   background-color: #fff;
   padding: 20px;
   border-radius: 5px;
   box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
 } */
 .container {
     width: 400px;
   height: 400px;
     padding: 20px;
     border: 1px solid #ccc;
     border-radius: 5px;
     padding-top: 50px;
     border: none;
     
   }

 h1 {
   text-align: center;
   margin-bottom: 20px;
 }

 input[type="text"],
 input[type="email"],
 input[type="password"] {
   width: 100%;
   padding: 10px;
   border-radius: 3px;
   border: 1px solid #ccc;
   margin-bottom: 10px;
   box-sizing: border-box;
 }

 input[type="submit"] {
   width: 100%;
   background-color: #4CAF50;
   color: white;
   padding: 10px;
   border: none;
   border-radius: 3px;
   cursor: pointer;
   }
 

 input[type="submit"]:hover {
   background-color: #45a049;
 }

 p {
   text-align: center;
   margin-top: 10px;
   text-decoration: none;
   color: rgb(14, 240, 165);
 }
 p a{
     text-decoration: none;
     color: #1a201a;
 }
 p a:hover{
     color: #5617d4;
 }

 .error {
   color: red;
   margin-bottom: 10px;
 }
 img{
     max-width: 400px;
   }
</style>
@endsection


@section('content')
<section id="signup">
  <div class="container">
    <h1>Sign Up</h1>
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <input type="text" placeholder="Name" id="name" name="name" required>
      <input type="email" placeholder="Email" id="email" name="email" required>
      <input type="password" placeholder="Password" name="password" required>
      <input type="password" placeholder="Confirm Password" name="password_confirmation" required>
      <input type="submit" value="Sign Up">
    </form>
    <p>Already have an account? <a href="signin.html">SIGN UP</a></p>
  </div>
<div ><img src="/img/robotics2/signin.jpg" alt=""></div>

 </section>

@endsection

@section('scripts')

@endsection
