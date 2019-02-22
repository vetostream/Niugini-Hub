<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellersController extends Controller
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
     * Apply as seller
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function apply()
    {
    }

}
