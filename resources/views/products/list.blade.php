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
          <li><a href="#">Home</a></li>
          <li><a href="#">All Categories</a></li>
          <li><a href="#">Accessories</a></li>
          <li class="active">Headphones</li>
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
          <h2 class="product-name">product name</h2>
          <div>
            <h3 class="product-price">K980.00</h3>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

          <div class="product-options">
            <label>
              Size
              <select class="input-select">
                <option value="0">X</option>
              </select>
            </label>
          </div>

          <div class="add-to-cart">
            <div class="qty-label">
              Qty
              <div class="input-number">
                <input type="number" min="1">
                <span class="qty-up">+</span>
                <span class="qty-down">-</span>
              </div>
            </div>
            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
          </div>

          <ul class="product-links">
            <li>Category:</li>
            <li><a href="#">Headphones</a></li>
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
