<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Product;
use CodeCommerce\Tag;
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
        $products = Product::ofCategory($id)->get();

        return view('store.category', compact('categories', 'category', 'products'));

    }

    public function product($id)
    {
        $categories = Category::all();
        $product = Product::find($id);

        return view('store.product', compact('categories', 'product'));

    }

    public function productsTag($id)
    {
        $categories = Category::all();
        $tag = Tag::find($id);
        $products = $tag->products;

        return view('store.tags', compact('categories', 'products', 'tag'));

    }

}
