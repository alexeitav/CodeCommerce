<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;
use CodeCommerce\Category;


class AdminCategoriesController extends Controller {

	private $categoryModel;

    public function __construct(Category $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

    public function index () {

        $categories = $this->categoryModel->all();

        return view('category.index', compact('categories'));
    }

    public function create() {

        return view ('category.create');
    }

    public function store(Requests\AdminCategoryRequest $request) {

        $input = $request->all();

        $category = $this->categoryModel->fill($input);

        $category->save();

        return redirect()->route('category.index');

    }

    public function destroy($id) {

        $this->categoryModel->find($id)->delete();

        return redirect()->route('category.index');

    }

    public function edit($id) {

        $category = $this->categoryModel->find($id);

        return view('category.edit', compact('category'));
    }

    public function update(Requests\AdminCategoryRequest $request, $id) {

        $this->categoryModel->find($id)->update($request->all());

        return redirect()->route('category.index');

    }



}
