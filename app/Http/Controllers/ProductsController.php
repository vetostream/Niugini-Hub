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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Products::paginate(10);

        return view('products.list', ['products' => $products]);
    }

    /**
     * Show the details from id
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function details($id)
    {
        $product = Products::findOrFail($id);

        return view('products.details', ['product' => $product]);
    }

}
