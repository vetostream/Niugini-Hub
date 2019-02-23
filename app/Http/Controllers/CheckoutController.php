<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Orders;
use App\Products;
use App\User;
use App\Http\Requests;
use Carbon;
use Cartalyst\Stripe\Stripe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Redirect;
use Session;
use Stripe\Error\Card;
use Validator;

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
        $cart = Auth::user()->cart;
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
     * Get a validator for an incoming order request.
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
     * Show the payment page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function payment(Request $request)
    {
        $this->validator($request->all())->validate();

        $cart = Auth::user()->cart;
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

    /**
     * Post stripe payment or create COD order
     *
     * @return ajax response
     */
    public function stripePost(Request $request)
    {
        $this->validator($request->all())->validate();
        $cod_bool = false;

        if ($request->payment_option == null) {
            $cod_bool = true;
        }

        $cart = Auth::user()->cart;
        $products = $cart->products;
        $product_subtotal = 0.00;
        $product_total = [];

        foreach($products as $product) {
            $product_subtotal += $product->pivot->qty * $product->price;
        }

        if ($product_subtotal == 0.00) {
            Session::put('error', 'No items on cart!');
            return back();
        }

        $order = New Orders;
        $order->order_date = Carbon::now();
        $order->total = $product_subtotal;
        $order->address = $request->address;
        $order->cust_id = Auth::user()->id;

        if (!$cod_bool) {
            $stripe = Stripe::make(env('STRIPE_SECRET'));
            try {
                $charge = $stripe
                    ->charges()
                        ->create(['source' => $request->stripeToken,
                            'currency' => 'PGK',
                            'amount' => $product_subtotal * 100,
                            'description' => 'Add in wallet', ]);

                if ($charge['status'] == 'succeeded') {

                    $order->payment_status = 'done';
                    $order->payment_date = Carbon\Carbon::now();
                    $order->save();


                    foreach($products as $product) {
                        $order->products()->attach($product, ['qty' => $product->pivot->qty]);
                        $cart->products()->detach($product);
                    }

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

        } else {
            $order->save();

            foreach($products as $product) {
               $order->products()->attach($product, ['qty' => $product->pivot->qty]);
               $cart->products()->detach($product);
            }

            Session::flash('success', 'Order Successful!');
            return back();
        }

    }

}
