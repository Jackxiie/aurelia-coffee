<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $products = Product::count();
        $bookings = DB::table('bookings')->count();
        $orders = DB::table('orders')->count();

        return view('admin.dashboard', compact('products', 'bookings', 'orders'));
    }
}