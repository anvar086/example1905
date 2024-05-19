<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return $this->success($category);
    }

    public function show($id){
        $category = Category::select('*')->find($id);
        return $this->success($category);
    }

    public function store(CategoryRequest $request){
        $category = new Category();
        $requestAll = $request->except('_token');
        if($request->hasFile('image')==true) {
            $uploadFile = $request->file('image');
            $fileName = Category::uploadPhoto($uploadFile);
            $requestAll['image'] = $fileName;
        }
        else{
            $fileName = null;
        }
        $category->image = $fileName;
        $category->title = $request->title;
        $category->min_description = $request->min_description;
        $category->description = $request->description;
        $category->save();
        return $this->success($category);
    }

    public function update(CategoryRequest $request,$id){
        $category = Category::where('id',$id)->first();
        $requestAll = $request->except('_token');
        if($request->hasFile('image')==true) {
            $uploadFile = $request->file('image');
            $fileName = Category::uploadPhoto($uploadFile);
            $requestAll['image'] = $fileName;
        }
        else{
            $fileName = null;
        }
        $category->image = $fileName;
        $category->title = $request->title;
        $category->min_description = $request->min_description;
        $category->description = $request->description;
        $category->save();
        return $this->success($category);
    }

    public function delete($id){
        
        $category = Category::where('id',$id)->first();
        $category->delete();
        return $this->success($category);
    }
}
