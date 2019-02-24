<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

use App\Sellers as Sellers;

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
    public function apply($id)
    {
        $seller = Sellers::find($id);

        if (!$seller) {
            // create seller
            $sellers = new Sellers;
            $sellers->user_id = $id;
            $sellers->save();
        }

		return redirect()->action('UserController@index');
    }

    /**
     * Show the create product form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function productsCreateForm()
    {
        return view('sellers.products.create');
    }

}
