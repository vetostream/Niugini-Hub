<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categories as Categories;
use App\Products as Products;

class CategoriesController extends Controller
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
        $categories = Categories::paginate(10);

        return view('categories.list', ['categories' => $categories]);
    }

    /**
     * Show the details from id
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function details($id)
    {
        $category = Categories::findOrFail($id);
        $products = Products::where('category_id', $category->id)->paginate(10);

        return view('categories.details', [
            'category' => $category,
            'products' => $products
        ]);
    }

}
