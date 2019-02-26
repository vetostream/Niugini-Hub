<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

use App\Sellers as Sellers;
use App\Categories as Categories;
use App\Products as Products;

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

    public function details($id)
    {
        $seller = Sellers::findOrFail($id);

        return view('sellers.details', [
            'seller' => $seller
        ]);
    }

    /**
     * Show the create product form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function productsCreateForm()
    {
        $categories = Categories::all();
        $id = Auth::user()->id;
        $seller = Sellers::where('user_id', $id)->get()->first();

        return view('sellers.products.create', [
            'categories' => $categories,
            'id' => $seller->id,
            'location' => $seller->location
        ]);
    }

    /**
     * Create a new product instance.
     *
     * @param  Request  $request
     */
    public function storeSellersProducts(Request $request)
    {
        $request->validate([
            'productName' => 'required',
            'productPrice' => 'required|numeric',
            'productCategory' => 'required',
            'productDescription' => 'required',
        ]);

        $product = new Products;
        $product->name = $request->productName;
        $product->desc = $request->productDescription;
        $product->price = $request->productPrice;
        $product->category_id = $request->productCategory;

        $id = Auth::user()->id;
        $seller = Sellers::where('user_id', $id)->get()->first();
        $product->seller_id = $seller->id;

        if($request->productLocation != null) {
            $product->location = $request->productLocation;
        } else {
            // set to seller's location if none specified
            $product->location = $seller->location;
        }

        $file = $request->file('productImage');
        if ($file) {
            $this->setFileUpload($file, $product);
        }

        $product->save();
        return redirect()->route('sellersProfile', array('id' => $seller->id));
    }

}
