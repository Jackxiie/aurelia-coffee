<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function home()
{
    $products = Product::where('type', 'coffee')
        ->take(8)
        ->get();

    return view('home', compact('products'));
}

public function menu()
{
    $desserts = Product::where('type', 'dessert')->get();
    $drinks = Product::where('type', 'drink')->get();
    $starters = Product::where('type', 'starter')->get();
    $mainDishes = Product::where('type', 'main dish')->get();
    $coffees = Product::where('type', 'coffee')->get();

    return view('menu', compact(
        'desserts',
        'drinks',
        'starters',
        'mainDishes',
        'coffees'
    ));
}

    public function show($id)
    {
        $product = Product::with('sizes')
            ->where('status', 'active')
            ->findOrFail($id);

        $relatedProducts = Product::where('type', $product->type)
            ->where('status', 'active')
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('product-single', compact('product', 'relatedProducts'));
    }
}