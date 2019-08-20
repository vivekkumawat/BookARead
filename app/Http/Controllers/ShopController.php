<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index ()
    {
        $products = Product::get();
        return view('shop.index', compact('products'));
    }

    public function product($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('shop.product')
            ->with('product', $product);
    }
}
