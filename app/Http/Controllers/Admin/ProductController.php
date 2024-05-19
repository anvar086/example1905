<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        $category = Category::all();
        return view('admin.products',['products'=>$products,'category'=>$category]);
    }

    public function create(){
        $categories = Category::all();
        return view('admin.productsCreate',['categories'=> $categories]);
    }

    public function store(ProductRequest $request)
    {

        $product = new Product();
        $requestAll = $request->except('_token');
        if($request->hasFile('image')) {
            $uploadFile = $request->file('image');
            $fileName = Product::uploadPhoto($uploadFile);
            $requestAll['image'] = $fileName;
        }
        $product->title = $request['title'];
        $product->min_description = $request['min_description'];
        $product->description = $request['description'];
        $product->image = $requestAll['image'];
        $product->save();
        if ($product == true) {
            $product->categories()->attach($request->categories);
            if ($product == true)
                return redirect()->route('products.index');
            else
                return redirect()->back()->withErrors();
        }
    }

    public function show($id){
        $product = Product::select('*')->find($id);
        $categories = Category::all();
        return view('admin.productsShow',[
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function edit($id)
    {
        $product = Product::select('*')->find($id);
        $categories = Category::all();
        return view('admin.productsEdit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function update(ProductRequest $request,$id){
        $product = Product::select('*')->find($id);
        $requestAll = $request->except('_token');
        if($request->hasFile('image')) {
            $uploadFile = $request->file('image');
            $fileName = Product::uploadPhoto($uploadFile);
            $requestAll['image'] = $fileName;
        }
        $product->title = $request->title;
        $product->image = $requestAll['image'];
        $product->min_description = $request->min_description;
        $product->description = $request->description;
        $product->save();
        if ($product == true) {
            $product->categories()->sync($request['categories']);
            return redirect()->route('products.index');
        }
    }

    public function destroy($id)
    {
        //$product = Product::destroy($id);

        $product = Product::find($id);
        $product->categories()->detach();
        $product->delete();
        if ($product == true){
            return redirect()->route('products.index');
        }
    }
}
