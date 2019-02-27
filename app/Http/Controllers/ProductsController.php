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

    /**
     * Show the products based from result
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function search(Request $request)
    {
        $name = $request->name;
        $address = $request->address;
        $product_result = null;

        if (($name == null) && ($address == null)) {
            $product_result = null;
        } else if (($name == null) && ($address != null)) {
            $product_result = Products::where('location', 'ilike', '%'. $address .'%')->paginate(10);
        } else if (($name != null) && ($address == null)) {
            $product_result = Products::where('name', 'ilike', '%'. $name .'%')->paginate(10);
        } else {
            $product_result = Products::where('name', 'ilike', '%'. $name .'%')
            ->where('location', 'ilike', '%'. $address .'%')
            ->paginate(10);
        }

        return view('products.results', ['product_result' => $product_result,
            'search_address' => $address,
            'search_name' => $name]);
    }

}
