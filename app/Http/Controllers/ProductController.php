<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order_rule;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $categories = \App\Models\Category::all();
        $products = Product::where('active', true)->get();
        return view('products.index')
            ->with(compact("categories", 'products'));
    }

    public function show(Product $product)
    {
        return view('products.show')
            ->with(compact('product'));
    }

    public function order(Product $product, Request $request)
    {
        $rule = new Order_rule();
        $rule->product = $product;
        $rule->type = $request->type;
        $rule->size = $request->size;

        $request->session()->push('cart', $rule);
        return redirect()->route('cart');
    }
    public function category(Category $category)
    {
        $products = $category->products()->where('active', true)->get();

        return view('products.category', compact('category', 'products'));
    }
}
