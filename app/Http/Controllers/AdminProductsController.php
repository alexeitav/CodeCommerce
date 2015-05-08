<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminProductsController extends Controller
{

    private $productModel;

    public function __construct(Product $productModel)
    {
        $this->productModel = $productModel;
    }

    public function index()
    {

        $products = $this->productModel->paginate(10);

        return view('product.index', compact('products'));
    }

    public function create(Category $category)
    {

        $categories = $category->lists('name', 'id');

        return view('product.create', compact('categories'));
    }

    public function store(Requests\AdminProductRequest $request)
    {

        $input = $request->all();

        $product = $this->productModel->fill($input);

        $product->save();

        return redirect()->route('product.index');

    }

    public function destroy($id)
    {

        $this->productModel->find($id)->delete();

        return redirect()->route('product.index');

    }

    public function edit($id, Category $category)
    {

        $product = $this->productModel->find($id);

        $categories = $category->lists('name', 'id');

        return view('product.edit', compact('product', 'categories'));
    }

    public function update(Requests\AdminProductRequest $request, $id)
    {

        $this->productModel->find($id)->update($request->all());

        return redirect()->route('product.index');

    }

    public function images($id)
    {

        $product = $this->productModel->find($id);

        return view('product.images', compact('product'));

    }

    public function createImage($id)
    {

        $product = $this->productModel->find($id);

        return view('product.create_image', compact('product'));

    }

    public function storeImage(Requests\AdminProductImageRequest $request, $id, ProductImage $productImage)
    {

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $productImage::create([
            'product_id' => $id,
            'extension' => $extension
        ]);

        Storage::disk('public_local')->put($image->id . '.' . $extension, File::get($file));

        return redirect()->route('product.images', ['id' => $id]);

    }

    public function destroyImage(ProductImage $productImage, $id) {

        $image = $productImage->find($id);

        if(file_exists(public_path().'uploads/'.$image->id.'.'.$image->extension)) {
            Storage::disk('public_local')->delete($image->id.'.'.$image->extension);
        }



        $product = $image->product;
        $image->delete();

        return redirect()->route('product.images',['id'=>$product->id]);

    }


}
