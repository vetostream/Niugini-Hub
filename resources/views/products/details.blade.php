@extends('layouts.base')

@section('content')
@include('layouts.header')

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb-tree">
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ url('/categories/'.$product->category['id']) }}">{{ $product->category['name'] }}</a></li>
          <li class="active">{{ $product->name }}</li>
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
      <div class="col-md-5 col-md-push-2">
        <div id="product-main-img">
          @forelse ($product->images as $image)
            <div class="product-preview">
              <img src="{{ url('uploads/'.$image->filename) }}" alt="{{ $image->filename }}" />
            </div>
          @empty
            <div class="product-preview">
              <img src="{{ asset('img/blank.png') }}" alt="blank" />
            </div>
          @endforelse
        </div>
      </div>
      <!-- /Product main img -->

      <!-- Product thumb imgs -->
      <div class="col-md-2 col-md-pull-5">
        <div id="product-imgs">
          @forelse ($product->images as $image)
            <div class="product-preview">
              <img src="{{ url('uploads/'.$image->filename) }}" alt="{{ $image->filename }}" />
            </div>
          @empty
            <div class="product-preview">
              <img src="{{ asset('img/blank.png') }}" alt="blank" />
            </div>
          @endforelse
        </div>
      </div>
      <!-- /Product thumb imgs -->

      <!-- Product details -->
      <div class="col-md-5">
        <div class="product-details">
          <h2 class="product-name">{{ $product->name }}</h2>
          <div>
            <h3 class="product-price">K {{ $product->price }}</h3>
          </div>
          <p>{{ $product->desc }}</p>

          <div class="product-options">
          </div>

          <div class="add-to-cart">
            <div class="qty-label">
              Qty
              <div class="input-number">
                <input type="number" id="product-qty" min="1" value="1">
                <span class="qty-up">+</span>
                <span class="qty-down">-</span>
              </div>
            </div>
                <button class="add-to-cart-btn"  onclick="add_cart_detail({{ $product->id }})">
                    <i class="fa fa-shopping-cart"></i>
                    add to cart
                </button>
          </div>

          <ul class="product-links">
            <li>Category:</li>
            <li><a href="{{ route('home') }}">{{ $product->category['name'] }}</a></li>
          </ul>

          <ul class="product-links">
            <li>Location:</li>
            <li>{{ $product->location  }}</li>
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
