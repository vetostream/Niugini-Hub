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
          @foreach ($products as $product)
          <!-- product -->
          <div class="col-md-4 col-xs-6">
            <div class="product">
              <div class="product-img">
                @if (!$product->images->isEmpty())
                  <img src="{{ url('uploads/'.$product->images[0]->filename) }}" alt="{{ $product->images[0]->filename }}" />
                @else
                  <img src="{{ asset('img/blank.png') }}" alt="blank" />
                @endif
              </div>
              <div class="product-body">
                <p class="product-category">{{ $product->category['name'] }}</p>
                <h3 class="product-name"><a href="{{ url('/products/'.$product->id) }}">{{ $product->name }}</a></h3>
                <h4 class="product-price">K {{ $product->price }}</h4>
              </div>
              <div class="add-to-cart">
                <a href="{{ route('home') }}">
                  <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                </a>
              </div>
            </div>
          </div>
          <!-- /product -->
          @endforeach
        </div>
        <!-- /store products -->

        <br>
        <br>
        <br>
        <!-- Next and Previous links -->
        <div class="row text-center">
          {{ $products->links() }}
        </div>

      </div>
      <!-- /STORE -->

    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->

@endsection
