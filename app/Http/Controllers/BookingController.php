<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Please login first.');
        }

        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'date'       => 'required|date|after:today',
            'time'       => 'required|string|max:10',
            'phone'      => 'required|string|max:10',
            'message'    => 'nullable|string',
        ], [
            'date.after' => 'Please enter a valid future date.',
        ]);

        Booking::create([
            'first_name' => $validated['first_name'],
            'last_name'  => $validated['last_name'],
            'date'       => $validated['date'],
            'time'       => $validated['time'],
            'phone'      => $validated['phone'],
            'message'    => $validated['message'] ?? '',
            'status'     => 'pending',
            'user_id'    => Auth::id(),
        ]);

        return back()->with('success', 'You have booked your table successfully!');
    }
    public function myBookings()
    {
        $bookings = Booking::where('user_id', auth()->id())
            ->orderByDesc('id')
            ->get();

        return view('my-bookings', compact('bookings'));
    }
}