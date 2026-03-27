<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function home()
    {
        $products = Product::take(8)->get();

        return view('home', compact('products'));
    }

    public function menu()
{
    $allProducts = Product::all();

    $normalized = $allProducts->groupBy(function ($product) {
        return Str::of($product->type ?? '')
            ->lower()
            ->trim()
            ->replace('_', ' ')
            ->replace('-', ' ')
            ->toString();
    });

    $coffees    = $normalized->get('coffee', collect());
    $drinks     = $normalized->get('drink', collect());
    $desserts   = $normalized->get('dessert', collect());
    $starters   = $normalized->get('starter', collect());
    $mainDishes = $normalized->get('main dish', collect());

    return view('menu', compact(
        'coffees',
        'drinks',
        'desserts',
        'starters',
        'mainDishes',
        'allProducts'
    ));
}

    public function show($id)
    {
        $product = Product::with('sizes')->findOrFail($id);

        $relatedProducts = Product::where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('product-single', compact('product', 'relatedProducts'));
    }
}