<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Products as Products;

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
        $products = Products::paginate(10);

        return view('home', ['products' => $products]);
    }

}
