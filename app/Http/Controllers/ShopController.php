<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index ()
    {
        $products = Product::get();
        $categories = Category::all()->take(2);
        return view('shop.index', compact('products', 'categories'));
    }

    public function product($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('shop.product')
            ->with('product', $product);
    }
}
