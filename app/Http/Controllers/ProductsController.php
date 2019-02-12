<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Products as Products;

class ProductsController extends Controller
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
    public function index($id)
    {
        $product = Products::findOrFail($id);

        return view('products.list', ['product' => $product]);
    }

}
