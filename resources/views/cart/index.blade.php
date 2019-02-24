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
            <div class="col-md-8">
                @foreach ($products as $indexKey => $item )
                <div class="row cart-row" id="cart-page-row-{{$item->id}}">
                    <div class="col-md-4">
                        <div class="row">
                            <img src="{{ asset('img/product01.png') }}"
                                alt="blank"
                                class="rounded-circle img-fluid img-thumbnail cart-image"
                                height="200"
                                width="200"/>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button"
                                            class="btn btn-default btn-number cart-page-btn"
                                            disabled="disabled"
                                            data-type="minus"
                                            data-field="cart-number-{{ $item->id}}">
                                                <span class="glyphicon glyphicon-minus "></span>
                                        </button>
                                    </span>
                                    <input type="text"
                                        name="cart-number-{{ $item->id}}"
                                        class="form-control input-number cart-number"
                                        value ="{{ $item->pivot->qty }}"
                                        min="1"
                                        max="1000"
                                        product_id="{{ $item->id }}"
                                        id="cart-number-{{ $item->id}}">
                                    <span class="input-group-btn">
                                        <button type="button"
                                            class="btn btn-default btn-number cart-page-btn"
                                            data-type="plus"
                                            data-field="cart-number-{{ $item->id}}">
                                                <span class="glyphicon glyphicon-plus"></span>
                                        </button>
                                    </span>
                                    <span class="input-group-btn">
                                        <button type="button"
                                            class="btn btn-default cart-page-btn"
                                            onclick="delete_cart_page_item('{{ $item->id }}')">
                                                <span class="glyphicon glyphicon-trash"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>

                            {{-- <input class="form-control cart-page-number"
                                id="cart-number-{{ $item->id}}"
                                type="number"
                                name="quantity"
                                value ="{{ $item->pivot->qty }}"
                                min="1"
                                product_id="{{ $item->id }}"> --}}
                        </div>
                    </div>
                    <div class="col-md-8 cart-item">
                        <div class="row">
                            <h3 class="align-middle">
                                <span class="cart-item-name">
                                    {{ $item->name }}
                                </span>
                            </h3>
                        </div>
                        <div class="row">
                            <h4 class="align-middle">
                                Descripiton: {{ $item->desc }}
                            </h4>
                        </div>
                        <div class="row">
                            <h4 class="align-middle">
                                Price: K {{ $item->price }}
                            </h4>
                        </div>
                        <div class="row">
                            <h4>
                                Total:
                                <span id="cart-page-product-total-{{$item->id}}">
                                    K {{ $product_total[$indexKey] }}
                                </span>
                            </h4>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-4 order-details">
                    <div class="row">
                        <h5>Your Total:
                        <span id="cart-page-total">K {{ $product_subtotal }}<span>
                    </div>
                    <div class="row">
                            <div class="col-xs-9">
                                <a href="/checkout" class="primary-btn order-submit btn-sm btn-block" role="button" aria-pressed="true">Checkout</a>
                            </div>
                    </div>
            </div>
        </div>
{{--
            <div class="row">
                <div class="col-xs-2 col-xs-offset-6" >
                    <h5>Your Total: </h5>
                </div>
                <div class="col-xs-2" >
                        <h5><span id="cart-page-total">K {{ $product_subtotal }}<span></h5>
                </div>
            </div>

            <div class="row">
                    <div class="col-xs-3 col-xs-offset-9">
                        <a href="/checkout" class="primary-btn order-submit btn-sm btn-block" role="button" aria-pressed="true">Checkout</a>
                    </div>
            </div> --}}
    </div>
</div>

@endsection
