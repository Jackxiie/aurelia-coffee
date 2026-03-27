@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Bookings</h2>
</div>

<table class="table table-bordered table-striped bg-white">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Date</th>
            <th>Time</th>
            <th>Phone</th>
            <th>Status</th>
            <th width="180">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($bookings as $booking)
        <tr>
            <td>{{ $booking->id }}</td>
            <td>{{ $booking->first_name }} {{ $booking->last_name }}</td>
            <td>{{ $booking->date }}</td>
            <td>{{ $booking->time }}</td>
            <td>{{ $booking->phone }}</td>
            <td>{{ $booking->status }}</td>
            <td>
                <a href="{{ route('admin.bookings.show', $booking->id) }}" class="btn btn-sm btn-info">Show</a>

                <form action="{{ route('admin.bookings.delete', $booking->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this booking?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center">No bookings found.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection