<?php

namespace App\Http\Controllers;
use App\Categories as Categories;
use App\Products as Products;
use Illuminate\Http\Request;

use Session;

use App\Http\Requests;
use Validator;
use URL;
use Redirect;
use Input;
use App\User;
use Stripe\Error\Card;
use Cartalyst\Stripe\Stripe;

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'address' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Show the index.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function payment(Request $request)
    {
        $this->validator($request->all())->validate();

        $cart = \Auth::user()->cart;
        $products = $cart->products;
        $product_subtotal = 0.00;
        $product_total = [];
        $shipping_address = $request->address;

        foreach($products as $product) {
            $product_subtotal += $product->pivot->qty * $product->price;
        }

        return view('checkout.payment',
            ['shipping_address' => $shipping_address,
            'product_subtotal' => $product_subtotal
        ]);
    }

    public function stripePost(Request $request)
    {
        $this->validator($request->all())->validate();
        $cart = \Auth::user()->cart;
        $products = $cart->products;
        $product_subtotal = 0.00;
        $product_total = [];
        $shipping_address = $request->address;

        foreach($products as $product) {
            $product_subtotal += $product->pivot->qty * $product->price;
        }

        $stripe = Stripe::make(env('STRIPE_SECRET'));
        try {
            $charge = $stripe
                ->charges()
                    ->create(['source' => $request->stripeToken,
                        'currency' => 'PGK',
                        'amount' => $product_subtotal * 100,
                        'description' => 'Add in wallet', ]);
            if ($charge['status'] == 'succeeded') {
                Session::flash('success', 'Payment successful!');
                return back();
            } else {
                Session::put('error', 'Money not add in wallet!!');
                return back();
            }


        } catch(Exception $e) {
            Session::put('error', $e->getMessage());
            return back();
        } catch(CartalystStripeExceptionCardErrorException $e) {
            Session::put('error', $e->getMessage());
            return back();
        } catch(CartalystStripeExceptionMissingParameterException $e) {
            Session::put('error', $e->getMessage());
            return back();
        }

    }
}
