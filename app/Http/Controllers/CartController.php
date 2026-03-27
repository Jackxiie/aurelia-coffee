<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function add(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'size' => 'required|string|max:50',
        ]);

        $product = Product::with('sizes')->findOrFail($id);

        $selectedSize = $product->sizes->firstWhere('size_name', $request->size);

        if (!$selectedSize) {
            return redirect()->back()->with('error', 'Invalid size selected.');
        }

        $cart = session()->get('cart', []);
        $cartKey = $id . '_' . $request->size;

        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] += (int) $request->quantity;
        } else {
            $cart[$cartKey] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => (float) $selectedSize->price,
                'image' => $product->image,
                'quantity' => (int) $request->quantity,
                'size' => $request->size,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Added to cart successfully.');
    }

    public function update(Request $request, $key)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$key])) {
            $cart[$key]['quantity'] = (int) $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully.');
    }

    public function remove($key)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$key])) {
            unset($cart[$key]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
    }
}