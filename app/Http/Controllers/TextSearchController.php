<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class TextSearchController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('product_search')){
            $products = Product::search($request->product_search)
                ->paginate(7);
        }else{
            $products = Product::paginate(7);
        }
        return view('welcome', compact('products'));
    }
    public function createProduct(Request $request)
    {
        $this->validate($request,['name'=>'required']);
        $products = Product::create($request->all());
        return back();
    }
}
