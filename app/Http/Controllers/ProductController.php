<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::active()->with('categories')
            ->when(request('category'), function($query) {
                return $query->whereHas('categories', function($q) {
                    $q->where('slug', request()->category);
                });
            })
            ->when(request('sort'), function($query) {
                $query->orderBy(request()->sort, request()->order);
            })
            ->paginate(12);

        $categories = Category::orderBy('name')->get();

        return view('products.index')->with([
            'products' => $products,
            'categories' => $categories
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $stockLevel = stockLevel($product->quantity);

        return view('products.show')->with([
              'product' => $product,
              'stockLevel' => $stockLevel
        ]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'key' => 'required|min:5'
        ]);

        $key = request()->key;

        $products = Product::active()
            ->search($key)
            ->when(request('sort'), function($query) {
                $query->orderBy(request()->sort, request()->order);
            })
            ->paginate(12);

        return view('products.search')->with('products', $products);
    }
}
