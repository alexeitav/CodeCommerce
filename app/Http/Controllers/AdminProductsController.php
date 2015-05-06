<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;

class AdminProductsController extends Controller {

    private $productModel;

    public function __construct(Product $productModel)
    {
        $this->productModel = $productModel;
    }

    public function index () {

        $products = $this->productModel->paginate(10);

        return view('product.index', compact('products'));
    }

    public function create(Category $category) {

        $categories = $category->lists('name', 'id');

        return view ('product.create', compact('categories'));
    }

    public function store(Requests\AdminProductRequest $request) {

        $input = $request->all();

        $product = $this->productModel->fill($input);

        $product->save();

        return redirect()->route('product.index');

    }

    public function destroy($id) {

        $this->productModel->find($id)->delete();

        return redirect()->route('product.index');

    }

    public function edit($id, Category $category) {

        $product = $this->productModel->find($id);

        $categories = $category->lists('name', 'id');

        return view('product.edit', compact('product', 'categories'));
    }

    public function update(Requests\AdminProductRequest $request, $id) {

        $this->productModel->find($id)->update($request->all());

        return redirect()->route('product.index');

    }


}
