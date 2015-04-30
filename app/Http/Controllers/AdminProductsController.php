<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;
use CodeCommerce\Product;

class AdminProductsController extends Controller {

    private $productModel;

    public function __construct(Product $productModel)
    {
        $this->productModel = $productModel;
    }

    public function index () {

        $products = $this->productModel->all();

        return view('product.index', compact('products'));
    }

    public function create() {

        return view ('product.create');
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

    public function edit($id) {

        $product = $this->productModel->find($id);

        return view('product.edit', compact('product'));
    }

    public function update(Requests\AdminProductRequest $request, $id) {

        $this->productModel->find($id)->update($request->all());

        return redirect()->route('product.index');

    }


}
