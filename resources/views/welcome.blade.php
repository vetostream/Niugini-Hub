@extends('layouts.base')

@section('content')

<!-- NAVIGATION -->
<nav id="navigation">
  <!-- container -->
  <div class="container">
    <!-- responsive-nav -->
    <div id="responsive-nav">
      <!-- NAV -->
      <ul class="main-nav nav navbar-nav">
        <li class="active"><a href="{{ route('home') }}">Laptops</a></li>
        <li><a href="#">Laptops</a></li>
        <li><a href="#">Smartphones</a></li>
        <li><a href="#">Cameras</a></li>
        <li><a href="#">Accessories</a></li>
      </ul>
      <!-- /NAV -->
    </div>
    <!-- /responsive-nav -->
  </div>
  <!-- /container -->
</nav>
<!-- /NAVIGATION -->

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <div class="col-md-12">

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
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->

@endsection
