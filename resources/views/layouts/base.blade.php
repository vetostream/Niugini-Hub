<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

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

  <title>{{ config('app.name', 'Niugini-hub') }}</title>
</head>
<body>
  <!-- HEADER -->
  <header>
    <!-- TOP HEADER -->
    <div id="top-header">
      <div class="container">
        <ul class="header-links pull-left">
          <li><a href="{{ route('home') }}">Home</li>
        </ul>
        <ul class="header-links pull-right">
        <!-- Authentication Links -->
        @guest
          <li><a href="{{ route('login') }}">Login</a></li>
          @if (Route::has('register'))
          <li><a href="{{ route('register') }}">Register</a></li>
          @endif
        @else
          <li><a href="{{ route('profile') }}"><i class="fa fa-user-o"></i>My Account</a></li>
        @endguest
        </ul>
      </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">

          <!-- SEARCH BAR -->
          <div class="col-md-9">
            <div class="header-search">
              <form method="POST" action="/search">
                @csrf
                <input class="input" placeholder="Search here">
                <button class="search-btn">Search</button>
              </form>
            </div>
          </div>
          <!-- /SEARCH BAR -->

          <!-- ACCOUNT -->
          <div class="col-md-3 clearfix">
            <div class="header-ctn">
            @if (Auth::check())
              <!-- Wishlist -->
              <div>
                <a href="{{ route('home') }}">
                  <i class="fa fa-heart-o"></i>
                  <span>Your Wishlist</span>
                </a>
              </div>
              <!-- /Wishlist -->

              <!-- Cart -->
              <div>
                <a href="{{ route('home') }}">
                  <i class="fa fa-shopping-cart"></i>
                  <span>Your Cart</span>
                </a>
              </div>
              <!-- /Cart -->
            @endif
            </div>
          </div>
          <!-- /ACCOUNT -->

        </div>
        <!-- row -->
      </div>
      <!-- container -->
    </div>
    <!-- /MAIN HEADER -->

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
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
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
</body>
</html>
