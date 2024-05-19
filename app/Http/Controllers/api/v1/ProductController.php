<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index(){
        $products = Product::with('categories')->get();
        return $this->success($products);
    }

    public function show($id){
        $product = Product::with('categories')->find($id);
        return $this->success($product);
    }
}
