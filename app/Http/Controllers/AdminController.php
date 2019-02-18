<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

use App\Categories as Categories;

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
        $category->save();

		return redirect()->action('AdminController@categoriesList');
    }

}
