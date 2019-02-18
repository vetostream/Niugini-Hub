<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories as Categories;
use App\Products as Products;
use App\Cart as Cart;

class CheckoutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the index.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cart = \Auth::user()->cart;
        $products = $cart->products;
        $product_subtotal = 0.00;
        $product_total = [];

        foreach($products as $product) {
            $product_subtotal += $product->pivot->qty * $product->price;
            array_push($product_total,
                ($product->pivot->qty * $product->price));
        }

        return view('checkout.checkout', [
            'products' => $products,
            'product_subtotal' => $product_subtotal,
            'product_total' => $product_total
        ]);
    }

    /**
     * Show the index.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function payment(Request $request)
    {
        $cart = \Auth::user()->cart;
        $products = $cart->products;
        $product_subtotal = 0.00;
        $product_total = [];

        foreach($products as $product) {
            $product_subtotal += $product->pivot->qty * $product->price;
            array_push($product_total,
                ($product->pivot->qty * $product->price));
        }

        return view('checkout.payment');
    }
}
