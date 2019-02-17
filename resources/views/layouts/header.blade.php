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
                <div class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                          <i class="fa fa-shopping-cart"></i>
                          <span>Your Cart</span>
                          <div class="qty" id="cart-qty"></div>
                      </a>
                      <div class="cart-dropdown">
                          <div class="cart-list" id="cart-list">
                          </div>
                          <div class="cart-summary">
                              <small><span id="cart-summary-qty"></span> Item(s) selected</small>
                              <h5>SUBTOTAL: K <span id="cart-subtotal"></span></h5>
                          </div>
                          <div class="cart-btns">
                              <a href="#">View Cart</a>
                              <a href="/checkout">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                      </div>
                  </div>
                <!-- /Cart -->
              @endif
                <!-- Menu Toogle -->
                <div class="menu-toggle">
                  <a href="#">
                    <i class="fa fa-bars"></i>
                    <span>Menu</span>
                  </a>
                </div>
                <!-- /Menu Toogle -->
              </div>
            </div>
            <!-- /ACCOUNT -->

          </div>
          <!-- row -->
        </div>
        <!-- container -->
      </div>
<!-- /MAIN HEADER -->
