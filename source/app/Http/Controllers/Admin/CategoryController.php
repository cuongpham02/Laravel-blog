<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\EditCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('subCategories')->where('parent_id', 0)->paginate(2);
        $arrCategories = [];
        foreach($categories as $category) {
            $categoryItem = [
                'name' => $category->name,
                'id' => $category->id,
                'status' => $category->status,
                'created_at' => $category->created_at,
            ];
            array_push($arrCategories, $categoryItem);
            if ($category->subCategories) {
                foreach($category->subCategories as $subCategory) {
                    $categorySubItem = [
                        'name' => '------'.$subCategory->name,
                        'id' => $subCategory->id,
                        'status' => $subCategory->status,
                        'created_at' => $subCategory->created_at
                    ];
                    array_push($arrCategories, $categorySubItem);
                }
            }
        }
        return view('admin.categories.index', ['categories' => $arrCategories, 'paginateCategory' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_category = Category::where('parent_id', '=', 0)->get();
        return view('admin.categories.create')->with(compact('parent_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $data = $request->all();
        Category::create($data);
        return redirect('/admin/category/show-category')->with('message','Create Category Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $category = Category::findOrFail($id);
        return view('admin.categories.edit')->with(compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(EditCategoryRequest $request, $id)
    {
        $data = $request->all();
        $category = Category::findOrFail($id);
        $category->update($data);
        return redirect()->route('admin.show-category')->with('message','Update Category Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Category::findOrFail($id)->delete();
        return redirect()->back()->with('message','Delete Category Success!');
    }
}
