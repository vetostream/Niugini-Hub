<!-- NAVIGATION -->
<nav id="navigation">
        <!-- container -->
        <div class="container">
          <!-- responsive-nav -->
          <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
              <li><a href="{{ route('home') }}">About Us</a></li>
              <li><a href="{{ route('categories') }}">Categories</a></li>
              <li><a href="{{ route('home') }}">Contact</a></li>
              @if (Auth::check())
                <li><a href="{{ route('home') }}">Profile</a></li>
                <li><a href="{{ route('home') }}">Sell an Item</a></li>
              @endif
            </ul>
            <!-- /NAV -->
          </div>
          <!-- /responsive-nav -->
        </div>
        <!-- /container -->
      </nav>
<!-- /NAVIGATION -->
