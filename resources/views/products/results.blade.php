@extends('layouts.base')
@section('content')
@include('layouts.header')
@include('layouts.navigation')

<!-- SECTION -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <!-- STORE -->
      <div id="store" class="col-md-12">
        @if($product_result == null)
        <div class="row">
          <p>0 results.....</p>
        </div>
        @else
        @foreach($product_result->chunk(4) as $products_chunk)
        <!-- store products -->
        <div class="row">
          @foreach ($products_chunk as $product)
          <!-- product -->
          <div class="col-md-3 col-xs-3">
            <div class="product">
              <div class="product-img">
                <img src="{{ asset('img/blank.png') }}" alt="blank" />
              </div>
              <div class="product-body">
                <p class="product-category">{{ $product->category['name'] }}</p>
                <h3 class="product-name"><a href="{{ url('/products/'.$product->id) }}">{{ $product->name }}</a></h3>
                <h4 class="product-price">K{{ $product->price }}</h4>
              </div>
              <div class="add-to-cart">
                <button class="add-to-cart-btn" onclick="add_cart({{ $product->id }}, 1)">
                <i class="fa fa-shopping-cart"></i>
                Add to cart
                </button>
              </div>
            </div>
          </div>
          <!-- /product -->
          @endforeach
        </div>
        <!-- /store products -->
        @endforeach
        <!-- Next and Previous links -->
        <div class="row text-center">
          {{ $product_result->links() }}
        </div>
        @endif
      </div>
      <!-- /STORE -->
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->
@endsection
