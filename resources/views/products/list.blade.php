@extends('layouts.base')

@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb-tree">
          <li><a href="{{ route('home') }}">All Categories</a></li>
          <li><a href="{{ route('home') }}">{{ $product->category['name'] }}</a></li>
        </ul>
      </div>
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <!-- Product main img -->
      <div class="col-md-5">
        <div id="product-main-img">
          <img src="{{ asset('img/blank.png') }}" alt="">
        </div>
      </div>
      <!-- /Product main img -->

      <!-- Product details -->
      <div class="col-md-7">
        <div class="product-details">
          <h2 class="product-name">{{ $product->name }}</h2>
          <div>
            <h3 class="product-price">K{{ $product->price }}</h3>
          </div>
          <p>{{ $product->desc }}</p>

          <div class="product-options">
          </div>

          <div class="add-to-cart">
            <div class="qty-label">
              Qty
              <div class="input-number">
                <input type="number" min="1" value="1">
                <span class="qty-up">+</span>
                <span class="qty-down">-</span>
              </div>
            </div>
            <a href="{{ route('home') }}">
              <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
            </a>
          </div>

          <ul class="product-links">
            <li>Category:</li>
            <li><a href="{{ route('home') }}">{{ $product->category['name'] }}</a></li>
          </ul>

        </div>
      </div>
      <!-- /Product details -->

    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->
@endsection
