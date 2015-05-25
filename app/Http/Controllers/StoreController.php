<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Product;
use Illuminate\Http\Request;

class StoreController extends Controller {

    public function index()
    {

        $categories = Category::all();

        $featureds = Product::featured()->take(3)->get();

        $recommends = Product::recommended()->take(3)->get();

        return view('store.index', compact('categories', 'featureds', 'recommends'));

    }

    public function categoryProducts($id)
    {
        $categories = Category::all();
        $category = Category::find($id);
        $products = Product::where('category_id', '=', $id)->get();

        return view('store.category', compact('categories', 'category', 'products'));

    }

}
