<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="_token" content="{{csrf_token()}}" />
  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

  <!-- Bootstrap -->
  <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>

  <!-- Slick -->
  <link type="text/css" rel="stylesheet" href="{{ asset('css/slick.css') }}"/>
  <link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css') }}"/>

  <!-- nouislider -->
  <link type="text/css" rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}"/>

  <!-- Font Awesome Icon -->
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

  <!-- Custom stlylesheet -->
  <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}"/>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Niugini-hub</title>
</head>
<body>
  <!-- HEADER -->
  <header>
    <!-- TOP HEADER -->
    <div id="top-header">
      <div class="container">
        <ul class="header-links pull-left">
          <li><a href="/">Home</li>
        </ul>
        <ul class="header-links pull-right">
        <!-- Authentication Links -->
        @guest
          <li><a href="{{ route('login') }}">Login</a></li>
          @if (Route::has('register'))
          <li><a href="{{ route('register') }}">Register</a></li>
          @endif
        @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              <i class="fa fa-user-o"></i>My Account<span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}" style="padding-left: 1rem; padding-right: 1rem;"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
        @endguest
        </ul>
      </div>
    </div>
    <!-- /TOP HEADER -->

  </header>
  <!-- /HEADER -->

  @yield('content')

  <!-- FOOTER -->
  <footer id="footer">
    <!-- top footer -->
    <div class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">
          <div class="col-md-3 col-xs-6">
            <div class="footer">
              <h3 class="footer-title">About Us</h3>
              <p>Online Ordering System called Niugini Hub for the people of Port Moresby in Papua New Guinea.</p>
            </div>
          </div>

          <div class="clearfix visible-xs"></div>

          <div class="col-md-3 col-xs-6">
            <div class="footer">
              <h3 class="footer-title">Information</h3>
              <ul class="footer-links">
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Orders and Returns</a></li>
                <li><a href="#">Terms & Conditions</a></li>
              </ul>
            </div>
          </div>

          <div class="col-md-3 col-xs-6">
            <div class="footer">
              <h3 class="footer-title">Service</h3>
              <ul class="footer-links">
                <li><a href="#">My Account</a></li>
                <li><a href="#">View Cart</a></li>
                <li><a href="#">Wishlist</a></li>
                <li><a href="#">Track My Order</a></li>
                <li><a href="#">Help</a></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
      <div class="container">
        <!-- row -->
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="copyright">
              Niugini-hub &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
            </span>
          </div>
        </div>
          <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /bottom footer -->
  </footer>
  <!-- /FOOTER -->

  <!-- jQuery Plugins -->
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/slick.min.js') }}"></script>
  <script src="{{ asset('js/nouislider.min.js') }}"></script>
  <script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  <script src="{{ asset('js/login.js') }}"></script>
  <script src="{{ asset('js/product.js') }}"></script>
  <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  <script src="{{ asset('js/checkout.js') }}"></script>
  <script src="{{ asset('js/cart.js') }}"></script>
</body>
</html>
