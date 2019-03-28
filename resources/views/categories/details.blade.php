@extends('layouts.base')

@section('content')
@include('layouts.header')
@include('layouts.navigation')

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
  <!-- container -->
  <div class="container">
  <!-- row -->
  <div class="row">
    <div class="col-md-12">
    <ul class="breadcrumb-tree">
      <li><a href="{{ route('home') }}">Home</a></li>
      <li class="active">{{ $category->name }}</li>
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

    <!-- STORE -->
    <div id="store" class="col-md-12">
      @foreach($products->chunk(4) as $products_chunk)
        <!-- store products -->
        <div class="row">
          @foreach ($products_chunk as $product)
            <!-- product -->
            <div class="col-md-3 col-xs-3">
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