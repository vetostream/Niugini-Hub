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
        <h3 class="title">Create Category</h3>
      </div>
    </div>

    <!-- Create Category -->
    <div class="collapse row" id="editCategory">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <form method="POST" action="{{ route('home') }}">
          @csrf
          <div class="form-group">
            <label for="categoryName">Name</label>
            <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="">
          </div>
          <div class="form-group">
            <label for="categoryDesc">Description</label>
            <input type="text" class="form-control" id="categoryDesc" name="categoryDesc" placeholder="">
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
      <div class="col-md-2"></div>
    </div>
    <!-- /row -->

  </div>
</div>

@endsection
