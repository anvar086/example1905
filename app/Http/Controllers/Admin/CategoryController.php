<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.category',['categories'=>$categories]);
    }

    public function create(){
        return view('admin.categoryCreate');
    }

    public function store(CategoryRequest $request)
    {

        $category = new Category();
        $requestAll = $request->except('_token');
        if($request->hasFile('image')) {
            $uploadFile = $request->file('image');
            $fileName = Category::uploadPhoto($uploadFile);
            $requestAll['image'] = $fileName;
        }
        $category = Category::create($requestAll);
        if ($category==true) {
            return redirect()->route('category.index');
        }
    }

    public function show($id){
        $category = Category::select('*')->find($id);
        return view('admin.categoryShow',[
            'category' => $category
        ]);
    }

    public function edit($id)
    {
        $category = Category::select('*')->find($id);
        return view('admin.categoryEdit', [
            'category' => $category,
        ]);
    }

    public function update(CategoryRequest $request,$id){
        $category = Category::select('*')->find($id);
        $requestAll = $request->except('_token');
        if($request->hasFile('image')) {
            $uploadFile = $request->file('image');
            $fileName = Category::uploadPhoto($uploadFile);
            $requestAll['image'] = $fileName;
        }
        $category->title = $request->title;
        $category->image = $requestAll['image'];
        $category->min_description = $request->min_description;
        $category->description = $request->description;
        $category->save();
        if($category==true)
            return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $page = Category::destroy($id);
        if ($page == true){
            return redirect()->route('category.index');
        }
    }
}
