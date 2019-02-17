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
        try {
            $product = Products::findOrFail($request->product_id);
            $cart = \Auth::user()->cart;

            if ($cart->products()->where('products_id', $product->id)->count() == 0){
                $cart->products()->attach($product);
                $product_count = $cart->products()->count();
                return response()->json(['success'=>'Data is successfully added',
                    'product_count' => $product_count]);
            } else {
                $product_count = $cart->products()->count();
                return response()->json(['success'=>'Data is already in cart',
                    'product_count' => $product_count]);
            }
        } catch(Exception $exception) {
            return response()->json(['error'=>$exception->getMessage()]);
        }
    }

    public function count(Request $request) {
        try {
            $cart = \Auth::user()->cart;
            $product_count = $cart->products()->count();
            return response()->json(['success'=>'Successfully retrieved product count',
                'product_count' => $product_count]);
        } catch(Exception $exception) {
            return response()->json(['error'=>$exception->getMessage()]);
        }
    }


}
