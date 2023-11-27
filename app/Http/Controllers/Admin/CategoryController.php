<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.admincategory', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $data = $request->validated();

        $category = Category::create($data);

        notify()->success('Category Added Successfully');
        return redirect('/category');
    }

    public function edit($category_id)
    {
        $category = Category::find($category_id);

        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $category_id)
    {
        $data = $request->validated();

        $category = Category::where('id', $category_id)->update([
            'name' => $data['name']
        ]);

        notify()->success('Category Updated Successfully');
        return redirect('/category');
    }

    public function destroy($category_id)
    {
        $category = Category::find($category_id)->delete();

        notify()->success('Category deleted Successfully');
        return redirect('/category');
    }
}
