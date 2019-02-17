<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Categories as Categories;
use App\Products as Products;
class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->user =  \Auth::user();
    }

    /**
     * Add a product to the user cart.
     *
     * @return void
     */
    public function add(Request $request){
        $product = Products::findOrFail($request->product_id);
        $cart = \Auth::user()->cart;
        $cart->products()->attach($product);
        return response()->json(['success'=>'Data is successfully added']);
    }
}
