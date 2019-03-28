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
      <div class="col-md-5">
        <div id="product-main-img">
          @if ($product->filename)
            <img src="{{ url('uploads/'.$product->filename) }}" alt="{{ $product->filename }}" />
          @else
            <img src="{{ asset('img/blank.png') }}" alt="blank" />
          @endif
        </div>
      </div>
      <!-- /Product main img -->

      <!-- Product details -->
      <div class="col-md-7">
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
@section('modals')
<div class="modal fade bd-example-modal-sm" id="addCartModal" tabindex="-1" role="dialog" aria-labelledby="addCartLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <!-- Note: Flexbox used to align contents in modal header -->
      <div class="modal-header" style="padding: 1rem; display: flex; align-items: flex-start; justify-content: space-between; ">
        <h4 class="modal-title" id="addCartLabel" style="font-weight: 500; font-size: 1.5rem;" >Add to cart?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: -1rem -1rem -1rem auto; padding: 1rem;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <input type="hidden" name="product-id"  id="product-id" value="">
            <input type="number" id="product-qty" min="1" value="1">
        </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-default" data-dismiss="modal" onclick="add_cart_home()">Confirm</button>
      </div>
    </div>
  </div>
@endsection