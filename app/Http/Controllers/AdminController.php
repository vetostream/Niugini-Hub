<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

use App\Categories as Categories;
use App\Sellers as Sellers;
use App\Products as Products;

class AdminController extends Controller
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
     * Show the index.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.profile');
    }

    public function categoriesList()
    {
        $categories = Categories::paginate(10);

        return view('admin.categories.list', ['categories' => $categories]);
    }

    public function categoriesDetails($id)
    {
        $category = Categories::findOrFail($id);

        return view('admin.categories.details', [
            'category' => $category
        ]);
    }

    /**
     * Show the create category form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function categoriesCreateForm()
    {
        return view('admin.categories.create');
    }

    /**
     * Create a new category instance.
     *
     * @param  Request  $request
     */
    public function storeCategories(Request $request)
    {

        $request->validate([
            'categoryName' => 'required',
            'categoryDescription' => 'required',
        ]);

        $category = new Categories;
        $category->name = $request->categoryName;
        $category->desc = $request->categoryDescription;

        $file = $request->file('categoryImage');
        if ($file) {
            $this->setFileUpload($file, $category);
        }

        $category->save();

		return redirect()->action('AdminController@categoriesList');
    }

    public function updateCategories(Request $request)
    {
        $request->validate([
            'categoryId' => 'required',
        ]);

        $id = (int) $request->categoryId;
        $category = Categories::find($id);

        if($request->categoryName != null) {
            $category->name = $request->categoryName;
        }

        if($request->categoryDescription != null) {
            $category->desc = $request->categoryDescription;
        }

        $category->save();
        return redirect()->route('adminCategoriesDetails', array('id' => $id));
    }

    public function deleteCategories($id)
    {
        $category = Categories::find($id);
        $category->delete();

		return redirect()->action('AdminController@categoriesList');
    }

    public function sellersList()
    {
        $sellers = Sellers::paginate(10);

        return view('admin.sellers.list', ['sellers' => $sellers]);
    }

    public function sellersDetails($id)
    {
        $seller = Sellers::findOrFail($id);

        return view('admin.sellers.details', [
            'seller' => $seller
        ]);
    }

    public function updateSellersStatus(Request $request)
    {
        $seller = Sellers::findOrFail($request->route('id'));

        $seller->status = $request->status;
        $seller->save();

        return redirect()->route('adminSellersDetails', array('id' => $seller->id));
    }

    public function productsList()
    {
        $products = Products::paginate(10);

        return view('admin.products.list', ['products' => $products]);
    }

    public function productsDetails($id)
    {
        $product = Products::findOrFail($id);

        return view('admin.products.details', [
            'product' => $product
        ]);
    }

    public function updateProductsStatus(Request $request)
    {
        $product = Products::findOrFail($request->route('id'));

        $product->status = $request->status;
        $product->save();

        return redirect()->route('adminProductsDetails', array('id' => $product->id));
    }

}
