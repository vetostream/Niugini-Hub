<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Products as Products;
use App\Categories;

class HomeController extends Controller
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
        $categories = Categories::paginate(12);

        return view('home', ['categories' => $categories]);
    }

}
