@extends('layouts.frontend2')                                     
   
@section('title')
Sign In
@endsection



@section('meta')
<style>

#sign{
 display: flex;
 justify-content:space-between  ;
 align-items: center;

 margin: 100px auto;
 font-family: "Spartan", sans-serif;
 background-color:#FAF3F0;
 padding:50px 400px;

}
 
 .container {
   width: 400px;
 height: 400px;
   padding: 20px;
   border: 1px solid #ccc;
   border-radius: 5px;
   padding-top: 50px;
   border: none;
   
 }
 
 .container h2 {
   text-align: center;
   font-weight: 600;
   padding-bottom: 20px;
 }
 
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
 img{
   max-width: 400px;
 }
</style>
@endsection


@section('content')
<section id="sign">
  <div class="container">
    <h2>SIGN IN</h2>
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="form-group">
        <label for="username">Email:</label>
        <input type="text" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <input type="submit" value="Sign In">
      </div>
    </form>
  </div>
  <div>
    <img src="/img/robotics2/signin.jpg" alt="">
  </div>



</section>

@endsection

@section('scripts')

@endsection

