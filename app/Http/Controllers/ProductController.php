<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function home()
    {
        $products = Product::where(function ($query) {
                $query->whereRaw('LOWER(type) = ?', ['coffee'])
                      ->orWhereRaw('LOWER(type) = ?', ['drink']);
            })
            ->take(8)
            ->get();

        return view('home', compact('products'));
    }

    public function menu()
    {
        $allProducts = Product::all();

        $normalized = $allProducts->groupBy(function ($product) {
            return Str::of($product->type)->lower()->trim()->replace('_', ' ')->toString();
        });

        $desserts = $normalized->get('dessert', collect());
        $drinks = $normalized->get('drink', collect());
        $starters = $normalized->get('starter', collect());
        $mainDishes = $normalized->get('main dish', collect());
        $coffees = $normalized->get('coffee', collect());

        return view('menu', compact(
            'desserts',
            'drinks',
            'starters',
            'mainDishes',
            'coffees',
            'allProducts'
        ));
    }

    public function show($id)
    {
        $product = Product::with('sizes')->findOrFail($id);

        $relatedProducts = Product::where('type', $product->type)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('product-single', compact('product', 'relatedProducts'));
    }
}