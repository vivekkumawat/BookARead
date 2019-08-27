<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ShopController extends Controller
{
    public function index ()
    {

        $products = Product::get();
        return view('shop.index', compact('products'));
    }

    public function product($slug)
    {
        if (session('item_added_to_cart_message')) {
            toast(session('item_added_to_cart_message'),'success');
        }

        $product = Product::where('slug', $slug)->firstOrFail();
        return view('shop.product')
            ->with('product', $product);
    }

    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|min:3'
        ]);


        $query = $request->input('query');
        $products = Product::where('name', 'like', "%$query%")
                                ->orWhere('author', 'like', "%$query%")->paginate(10);
        return view('shop.search-results')->with('products', $products);
    }
}
