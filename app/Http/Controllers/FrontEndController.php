<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class FrontEndController extends Controller
{
    public function index(){
        return view('index')->with('products',Product::paginate(6));   //
    }
    public function singleProduct(Product $product){
        return view('single')->with('product',$product);
    }


}
