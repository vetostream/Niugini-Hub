<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categories as Categories;

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

}
