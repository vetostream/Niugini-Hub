@extends('layouts.base')

@section('content')

@include('layouts.header')
@include('layouts.navigation')

<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
         <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="active">Cart</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
            <div class="row">
                <div class="col-xs-2 col-xs-offset-2">
                    <h5>Product</h5>
                </div>
                <div class="col-xs-2">
                    <h5>Quantity</h5>
                </div>
                <div class="col-xs-2">
                    <h5>Price</h5>
                </div>
                <div class="col-xs-2">
                    <h5>Total</h5>
                 </div>
            </div>
            @foreach ($products as $indexKey => $item )
            <div class="row" id="row-{{$item->id}}">
                <div class="col-xs-2">
                    {{-- for image --}}
                </div>
                <div class="col-xs-2">
                    {{ $item->name }}
                </div>
                <div class="col-xs-1">
                    <input class="form-control cart-page-number"
                        id="cart-number-{{ $item->id}}"
                        type="number"
                        name="quantity"
                        value ="{{ $item->pivot->qty }}"
                        min="1"
                        product_id="{{ $item->id }}">
                </div>
                <div class="col-xs-2 col-xs-offset-1">
                    K {{ $item->price }}
                </div>
                <div class="col-xs-2">
                <span id="cart-page-product-total-{{$item->id}}"> K {{ $product_total[$indexKey] }}<span>
                </div>
                <div class="col-xs-2">
                    {{-- <input type="submit" class="btn btn-danger btn-sm" value="Remove"> --}}
                    <button class="btn btn-danger btn-sm cart-page-btn" onclick="delete_cart_page_item('{{ $item->id }}')">Remove</button>
                </div>
            </div>
            <br>
            @endforeach
            <div class="row">
                <div class="col-xs-2 col-xs-offset-6" >
                    <h5>Your Total: </h5>
                </div>
                <div class="col-xs-2" >
                        <h5><span id="cart-page-total">K {{ $product_subtotal }}<span></h5>
                </div>
            </div>
    </div>
</div>

@endsection
