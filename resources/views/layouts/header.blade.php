<!-- MAIN HEADER -->
<div id="header">
        <!-- container -->
        <div class="container">
          <!-- row -->
          <div class="row">
            <form method="POST" action="{{ route('search') }}">
              @csrf
              <div class="col-md-4">
                <div class="">
                  <div class="input-group">
                    <input class="form-control home-search"
                    name="name"
                    type="text"
                    @isset($search_name) @if ($search_name != null) value="{{ $search_name }}" @endif  @endisset
                    placeholder="Search"/>
                    <div class="input-group-addon">
                      <span class="glyphicon glyphicon-search"></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="">
                  <div class="input-group">
                    <input class="form-control home-search"
                    name="address"
                    type="text"
                    @isset($search_address) @if ($search_address != null) value="{{ $search_address }}" @endif @endisset
                    placeholder="Location"/>
                    <div class="input-group-addon">
                      <span class="glyphicon glyphicon-map-marker"></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-1">
                <button class="search-btn" type="submit">Search</button>
              </div>
            </form>
            <!-- ACCOUNT -->
            <div class="col-md-3 clearfix">
              <div class="header-ctn">
                @if (Auth::check())
                  @if (Auth::user()->isAdmin())
                  <div>
                    <a href="{{ route('adminSellersList') }}">
                      <i class="fa fa-users"></i>
                      <span>Seller Requests</span>
                      <div class="qty" id="seller-requests"></div>
                    </a>
                  </div>
                  @endif
                <!-- Wishlist -->
                <!-- <div>
                  <a href="{{ route('home') }}">
                  <i class="fa fa-heart-o"></i>
                  <span>Your Wishlist</span>
                  </a>
                </div> -->
                <!-- /Wishlist -->
                <!-- Cart -->
                <div class="dropdown">
                  <a class="dropdown-toggle cart-nav" data-toggle="dropdown" aria-expanded="true">
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
                      <a href="/cart">View Cart</a>
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
