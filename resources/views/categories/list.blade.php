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

      <!-- STORE -->
      <div id="store" class="col-sm">

        <!-- store categories -->
        <div class="row">
          @foreach ($categories as $category)
          <!-- product -->
          <div class="col-md-4 col-xs-6">
            <div class="product">
              <div class="product-img">
                <img src="{{ asset('img/blank.png') }}" alt="">
              </div>
              <div class="product-body">
                <h3 class="product-name"><a href="{{ route('home') }}">{{ $category->name }}</a></h3>
                <p class="product-category">{{ $category->desc }}</p>
              </div>
            </div>
          </div>
          <!-- /categories -->
          @endforeach
        </div>

        <!-- Next and Previous links -->
        <div class="row text-center">
          {{ $categories->links() }}
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
