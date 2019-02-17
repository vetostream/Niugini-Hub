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
            $qty = (int)$request->product_qty;

            if ($cart->products()->where('products_id', $product->id)->count() == 0){
                $cart->products()->attach($product, ['qty' => $qty]);
                $product_count = $cart->products()->count();
                return response()->json(['success'=>'Data is successfully added']);
            } else {
                $product_count = $cart->products()->count();
                return response()->json(['success'=>'Data is already in cart']);
            }
        } catch(Exception $exception) {
            return response()->json(['error'=>$exception->getMessage()], 404);
        }
    }

    /**
     * Add a product to the user cart.
     *
     * @return product count
     */
    public function count(Request $request) {
        try {
            $cart = \Auth::user()->cart;
            $product_count = $cart->products()->count();
            return response()->json(['success'=>'Successfully retrieved product count',
                'product_count' => $product_count]);
        } catch(Exception $exception) {
            return response()->json(['error'=>$exception->getMessage()], 404);
        }
    }

    /**
     * Add a product to the user cart.
     *
     * @return products html
     */
    public function retrieve(Request $request) {
        try {

            $cart = \Auth::user()->cart;
            $products = $cart->products;
            $product_html = '';
            $product_count = $cart->products()->count();
            $product_subtotal = 0.00;
            foreach($products as $product) {
                $product_html .= '<div class="product-widget" id="cart-product-'. $product->id.'">';

                $product_html .= '<div class="product-img">';
                $product_html .= '<img src="" alt="">';
                $product_html .= '</div>';

                $product_html .= '<div class="product-body">';

                $product_html .= '<h3 class="product-name">';
                $product_html .= '<a href="/products/'.$product->id.'">';
                $product_html .= $product->name;
                $product_html .= '</a></h3>';

                $product_html .= '<h4 class="product-price">';
                $product_html .= '<span class="qty">';
                $product_html .= ''.$product->pivot->qty.'x';
                $product_html .= '</span>';
                $product_html .= 'K '.$product->price;
                $product_html .= '</h4>';

                $product_html .='</div>';

                $product_html .= '<button class="delete" onclick="delete_cart_item('.$product->id.')"><i class="fa fa-close"></i></button>';

                $product_html .='</div>';
                $product_subtotal += $product->pivot->qty * $product->price;
            }


            return response()->json(['success'=>'Successfully retrieved product count',
                'product_html' => $product_html,
                'product_count' => $product_count,
                'product_subtotal' => $product_subtotal]);

        } catch(Exception $exception) {
            return response()->json(['error'=>$exception->getMessage()], 404);
        }
    }


    /**
     * Remove a product to the user cart.
     *
     * @return void
     */
    public function delete(Request $request){
        try {
            $product = Products::findOrFail($request->product_id);
            $cart = \Auth::user()->cart;

            if ($cart->products()->where('products_id', $product->id)->count() > 0){
                $cart->products()->detach($product);
                return response()->json(['success'=>'Data is successfully removed']);
            } else {
                return response()->json(['success'=>'Data is not in the cart']);
            }
        } catch(Exception $exception) {
            return response()->json(['error'=>$exception->getMessage()], 404);
        }
    }

}
