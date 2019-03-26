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
          <li><a href="{{ route('sellersProfile', ['id' => $seller->id]) }}">Seller Profile</a></li>
          <li class="active">All Products</li>
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

    <div class="row">
      <div class="col-sm">
        <h3 class="title">Products of {{ $seller->user->name }}</h3>
      </div>
    </div>

    <!-- row -->
    <div class="row">
      <!-- STORE -->
      <div id="store" class="col-md-12">

        <!-- store products -->
        <div class="row">
                @foreach($products->chunk(4) as $products_chunk)
                <!-- store products -->
                <div class="row">
                  @foreach ($products_chunk as $product)
                    <!-- product -->
                    <div class="col-md-3 col-xs-3">
                      <div class="product">
                        <div class="product-img">
                          @if ($product->filename)
                            <img src="{{ url('uploads/'.$product->filename) }}" alt="{{ $product->filename }}" />
                          @else
                            <img src="{{ asset('img/blank.png') }}" alt="blank" />
                          @endif
                        </div>

                        <div class="product-body">
                          <p class="product-category">{{ $product->category['name'] }}</p>
                          <h3 class="product-name"><a href="{{ route('productsDetails', ['id' => $product->id]) }}">{{ $product->name }}</a></h3>
                          <h4 class="product-price">K {{ $product->price }}</h4>
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
