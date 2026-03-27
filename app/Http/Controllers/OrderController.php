<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('checkout', compact('cart', 'total'));
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'country' => 'required|string|max:255',
            'street_address' => 'required|string|max:255',
            'town' => 'required|string|max:255',
            'zip_code' => 'required|string|max:50',
            'phone' => 'required|string|max:50',
            'email' => 'required|email|max:255',
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        DB::beginTransaction();

        try {
            $total = collect($cart)->sum(function ($item) {
                return $item['price'] * $item['quantity'];
            });

            $order = Order::create([
                'user_id' => auth()->id(),
                'status' => 'pending',
                'total_price' => $total,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'country' => $request->country,
                'street_address' => $request->street_address,
                'town' => $request->town,
                'zip_code' => $request->zip_code,
                'phone' => $request->phone,
                'email' => $request->email,
            ]);

            foreach ($cart as $item) {
    OrderItem::create([
        'order_id' => $order->id,
        'product_id' => $item['id'],
        'product_name' => $item['name'],
        'product_price' => $item['price'],
        'size' => $item['size'] ?? null, // ✅ เพิ่มตรงนี้
        'quantity' => $item['quantity'],
        'subtotal' => $item['price'] * $item['quantity'],
    ]);
}

            session()->forget('cart');

            DB::commit();

            return redirect()->route('home')->with('success', 'Order placed successfully!');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->route('cart.index')->with('error', 'Failed to confirm order.');
        }
    }

    public function myOrders()
    {
        $orders = Order::where('user_id', auth()->id())
            ->with('items')
            ->orderByDesc('id')
            ->get();

        return view('my-orders', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::where('user_id', auth()->id())
            ->where('id', $id)
            ->with('items')
            ->firstOrFail();

        return view('my-order-show', compact('order'));
    }
}