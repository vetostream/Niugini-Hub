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
          <li><a href="{{ route('adminCategoriesList') }}">All Categories</a></li>
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
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="product">
          <div class="product-img">
            <img src="{{ asset('img/blank.png') }}" alt="">
          </div>
          <div class="product-body">
            <h3 class="product-name"><a href="{{ url('/admin/categories/'.$category->id) }}">{{ $category->name }}</a></h3>
            <p class="product-category">{{ $category->desc }}</p>
            <a class="btn btn-primary" href="#" role="button">Edit</a>
            <a class="btn btn-danger" href="#" role="button">Delete</a>
          </div>
        </div>
      </div>
      <div class="col-md-2"></div>
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->
@endsection
