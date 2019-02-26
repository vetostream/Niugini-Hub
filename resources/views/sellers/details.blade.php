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
          <li class="active">Seller Profile</li>
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
        <h3 class="title">Seller Profile</h3>
      </div>
    </div>

    <!-- row -->
    <div class="row" style="margin-top: 20px;">
      <div class="col-md-8">
        <div class="product">
          <div class="product-body" style="text-align: left !important;">
            <h3 class="product-name">Seller ID: {{ $seller->id }}</h3>
            <h3 class="product-name">Name: {{ $seller->user->name }}</h3>
            <p class="product-category">Phone: {{ $seller->user->phone_number }}</p>
            <p class="product-category">Email: {{ $seller->user->email }}</p>
            <p class="product-category">Address: {{ $seller->user->address }}</p>
            <p class="product-category">Location: {{ $seller->location }}</p>
            <p class="product-category">Products Sold: {{ $seller->products_sold }}</p>
            <p class="product-category">Products Posted: {{ $seller->products_posted }}</p>
            <p class="product-category">Products Count: {{ $seller->products_count }}</p>
            <p class="product-category">Stars: {{ $seller->stars }}</p>
          @if ($seller->status == 1)
            <p class="product-category">Status: Active</p>
            <a href="{{ route('productsCreateForm') }}" 
              class="btn btn-primary" role="button">
              Create Product
            </a>
          @endif
          </div>
        </div>
        <a href="{{ route('home') }}" 
          class="btn btn-primary" role="button">
          All Products
        </a>
      </div>
      <div class="col-md-4"></div>
    </div>
    <!-- /row -->

  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->

@endsection
