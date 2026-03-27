<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminBookingController extends Controller
{
    public function index()
    {
        $bookings = DB::table('bookings')->orderByDesc('id')->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function show($id)
    {
        $booking = DB::table('bookings')->where('id', $id)->first();

        if (!$booking) {
            abort(404);
        }

        return view('admin.bookings.show', compact('booking'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|max:50',
        ]);

        DB::table('bookings')
            ->where('id', $id)
            ->update([
                'status' => $request->status,
            ]);

        return redirect()->route('admin.bookings.index')->with('success', 'Booking status updated successfully.');
    }

    public function destroy($id)
    {
        DB::table('bookings')->where('id', $id)->delete();

        return redirect()->route('admin.bookings.index')->with('success', 'Booking deleted successfully.');
    }
}