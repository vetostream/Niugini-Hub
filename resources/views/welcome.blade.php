@extends('layouts.base')

@section('content')

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

<!-- NAVIGATION -->
<nav id="navigation">
  <!-- container -->
  <div class="container">
    <!-- responsive-nav -->
    <div id="responsive-nav">
      <!-- NAV -->
      <ul class="main-nav nav navbar-nav">
        <li><a href="{{ route('home') }}">About Us</a></li>
        <li><a href="{{ route('home') }}">Contact</a></li>
        <li><a href="{{ route('home') }}">Profile</a></li>
        <li><a href="{{ route('home') }}">Sell an Item</a></li>
      </ul>
      <!-- /NAV -->
    </div>
    <!-- /responsive-nav -->
  </div>
  <!-- /container -->
</nav>
<!-- /NAVIGATION -->

<!-- SECTION -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">

      <!-- section title -->
      <div class="col-md-12">
        <div class="section-title">
          <h3 class="title">Products</h3>
        </div>
      </div>
      <!-- /section title -->

      <!-- STORE -->
      <div id="store" class="col-md-12">
        <!-- store products -->
        <div class="row">
          <!-- product -->
          <div class="col-md-4 col-xs-6">
            <div class="product">
              <div class="product-img">
                <img src="./img/product01.png" alt="">
                <div class="product-label">
                  <span class="sale">-30%</span>
                  <span class="new">NEW</span>
                </div>
              </div>
              <div class="product-body">
                <p class="product-category">Category</p>
                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                <div class="product-rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
                <div class="product-btns">
                  <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                  <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                  <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                </div>
              </div>
              <div class="add-to-cart">
                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
              </div>
            </div>
          </div>
          <!-- /product -->

          <!-- product -->
          <div class="col-md-4 col-xs-6">
            <div class="product">
              <div class="product-img">
                <img src="./img/product02.png" alt="">
                <div class="product-label">
                  <span class="new">NEW</span>
                </div>
              </div>
              <div class="product-body">
                <p class="product-category">Category</p>
                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                <div class="product-rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-o"></i>
                </div>
                <div class="product-btns">
                  <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                  <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                  <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                </div>
              </div>
              <div class="add-to-cart">
                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
              </div>
            </div>
          </div>
          <!-- /product -->

          <div class="clearfix visible-sm visible-xs"></div>

          <!-- product -->
          <div class="col-md-4 col-xs-6">
            <div class="product">
              <div class="product-img">
                <img src="./img/product03.png" alt="">
              </div>
              <div class="product-body">
                <p class="product-category">Category</p>
                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                <div class="product-rating">
                </div>
                <div class="product-btns">
                  <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                  <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                  <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                </div>
              </div>
              <div class="add-to-cart">
                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
              </div>
            </div>
          </div>
          <!-- /product -->

          <div class="clearfix visible-lg visible-md"></div>

          <!-- product -->
          <div class="col-md-4 col-xs-6">
            <div class="product">
              <div class="product-img">
                <img src="./img/product04.png" alt="">
              </div>
              <div class="product-body">
                <p class="product-category">Category</p>
                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                <div class="product-rating">
                </div>
                <div class="product-btns">
                  <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                  <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                  <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                </div>
              </div>
              <div class="add-to-cart">
                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
              </div>
            </div>
          </div>
          <!-- /product -->

          <div class="clearfix visible-sm visible-xs"></div>

          <!-- product -->
          <div class="col-md-4 col-xs-6">
            <div class="product">
              <div class="product-img">
                <img src="./img/product05.png" alt="">
              </div>
              <div class="product-body">
                <p class="product-category">Category</p>
                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                <div class="product-rating">
                </div>
                <div class="product-btns">
                  <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                  <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                  <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                </div>
              </div>
              <div class="add-to-cart">
                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
              </div>
            </div>
          </div>
          <!-- /product -->

          <!-- product -->
          <div class="col-md-4 col-xs-6">
            <div class="product">
              <div class="product-img">
                <img src="./img/product06.png" alt="">
              </div>
              <div class="product-body">
                <p class="product-category">Category</p>
                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                <div class="product-rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-o"></i>
                </div>
                <div class="product-btns">
                  <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                  <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                  <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                </div>
              </div>
              <div class="add-to-cart">
                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
              </div>
            </div>
          </div>
          <!-- /product -->

          <div class="clearfix visible-lg visible-md visible-sm visible-xs"></div>

          <!-- product -->
          <div class="col-md-4 col-xs-6">
            <div class="product">
              <div class="product-img">
                <img src="./img/product07.png" alt="">
              </div>
              <div class="product-body">
                <p class="product-category">Category</p>
                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                <div class="product-rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
                <div class="product-btns">
                  <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                  <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                  <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                </div>
              </div>
              <div class="add-to-cart">
                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
              </div>
            </div>
          </div>
          <!-- /product -->

          <!-- product -->
          <div class="col-md-4 col-xs-6">
            <div class="product">
              <div class="product-img">
                <img src="./img/product08.png" alt="">
              </div>
              <div class="product-body">
                <p class="product-category">Category</p>
                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                <div class="product-rating">
                </div>
                <div class="product-btns">
                  <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                  <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                  <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                </div>
              </div>
              <div class="add-to-cart">
                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
              </div>
            </div>
          </div>
          <!-- /product -->

          <div class="clearfix visible-sm visible-xs"></div>

          <!-- product -->
          <div class="col-md-4 col-xs-6">
            <div class="product">
              <div class="product-img">
                <img src="./img/product09.png" alt="">
              </div>
              <div class="product-body">
                <p class="product-category">Category</p>
                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                <div class="product-rating">
                </div>
                <div class="product-btns">
                  <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                  <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                  <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                </div>
              </div>
              <div class="add-to-cart">
                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
              </div>
            </div>
          </div>
          <!-- /product -->
        </div>
        <!-- /store products -->

      </div>
      <!-- /STORE -->
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->

@endsection
