<section id="header">
  <a href="#"><img src="{{asset('frontend/img/logo.jpg')}}" alt="logo" class="logo"></a>
  <p class="name">R 	&#38;M SHOP</p>
  <div>
    
    <ul id="navbar">
        <li>
          <a class="{{Request::is('/') ? 'active':'' }}" href="{{route('frontend2.index')}}">Home</a>
        </li>

        <li>
          <a class="{{Request::is('/shop') ? 'active':'' }}" href="{{route('frontend2.shop.view')}}">shop</a>
        </li>

        {{-- <li>
          <a class="{{Request::is('/blog') ? 'active':'' }}" href="blog.html">blog</a>
        </li>

        <li>
          <a class="{{Request::is('/about') ? 'active':'' }}" href="about.html">About</a>
        </li>

        <li>
          <a class="{{Request::is('/contact') ? 'active':'' }}" href="contact.html">Contact</a>
        </li> --}}

        

        @guest
            @if (Route::has('login'))
              <li>
                <a class="{{Request::is('/sign-in') ? 'active':'' }}" href="{{route('frontend2.signin')}}">sign in</a>
              </li>
            @endif

            @if (Route::has('register'))
              <li>
                <a class="{{Request::is('/sign-up') ? 'active':'' }}" href="{{route('frontend2.signup')}}">sign up</a>
              </li>
            @endif
        @else

          <li class="cart-button">
            <a class="{{Request::is('/cart') ? 'active':'' }}" href="{{route('frontend2.cart.view')}}">
              <i class="far fa-shopping-bag"></i> ({{App\Models\Cart::where('user_id',Auth::id())->count()}})
            </a>
          </li>
            <li>
                <a class="{{Request::is('/profile') ? 'active':'' }}" href="{{ url('/profile') }}">Profile</a>
            </li>
            <li>
                <a class="{{Request::is('/my-orders') ? 'active':'' }}" href="{{ url('/my-orders') }}">My Orders</a>
            </li>

            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" href="{{ url('/my-orders') }}">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
            </li>


        @endguest

    </ul>
   </div>

</section>








