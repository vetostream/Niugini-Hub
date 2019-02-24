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
          <li><a href="{{ route('home') }}">Seller Profile</a></li>
          <li><a href="{{ route('home') }}">All Products</a></li>
          <li class="active">Create</li>
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
        <h3 class="title">Create Product</h3>
      </div>
    </div>

    <!-- Validation Errors -->
    <div class="row" style="margin-top: 20px;">
      <div class="col-md-8">
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
      </div>
    </div>
    <!-- /Validation Errors -->

    <!-- Create Product -->
    <div class="row" id="createProduct">
      <div class="col-md-8">
        <form method="POST" action="{{ route('home') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="productName">Name</label>
            <input type="text" class="form-control" id="productName" name="productName" placeholder="" />
          </div>
          <div class="form-group">
            <label for="productImage">Image</label>
            <input type="file" class="form-control" id="productImage" name="productImage" />
          </div>
          <button type="submit" class="btn btn-primary">Create</button>
        </form>
      </div>
    </div>
    <!-- /Create Product -->

  </div>
</div>

@endsection
