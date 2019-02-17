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
    }

    /**
     * Show the index.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('checkout.checkout');
    }

}
