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
          <li><a href="{{ route('admin') }}">Admin</a></li>
          <li><a href="{{ route('adminProductsList') }}">All Products</a></li>
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

    <div class="row">
      <div class="col-sm">
        <h3 class="title">Products</h3>
      </div>
    </div>

    <!-- row -->
    <div class="row" style="margin-top: 20px;">
      <div class="col-md-8">
        <div class="product">
          <div class="product-body" style="text-align: left !important;">
            <h3 class="product-name">Product ID: {{ $product->id }}</h3>
            <h3 class="product-name">Name: {{ $product->name }}</h3>
            <p class="product-category">Price: {{ $product->price }}</p>
            <p class="product-category">Description: {{ $product->desc }}</p>
            <p class="product-category">Location: {{ $product->location }}</p>
            <p class="product-category">Category: {{ $product->category->name }}</p>
            <p class="product-category">Seller: {{ $product->seller->user->name }}</p>
          @if ($product->status)
            <p class="product-category">Status: Approved</p>
          @else
            <p class="product-category">Status: For Review</p>
          @endif
          </div>
        </div>
      </div>
      <div class="col-md-4"></div>
    </div>
    <!-- /row -->

  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->

@endsection

@section('modals')
@endsection
