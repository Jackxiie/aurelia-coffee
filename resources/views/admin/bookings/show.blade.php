@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Booking Detail</h2>
    <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="card p-4 bg-white">
    <div class="row">
        <div class="col-md-6">
            <p><strong>ID:</strong> {{ $booking->id }}</p>
            <p><strong>First Name:</strong> {{ $booking->first_name }}</p>
            <p><strong>Last Name:</strong> {{ $booking->last_name }}</p>
            <p><strong>Date:</strong> {{ $booking->date }}</p>
            <p><strong>Time:</strong> {{ $booking->time }}</p>
        </div>

        <div class="col-md-6">
            <p><strong>Phone:</strong> {{ $booking->phone }}</p>
            <p><strong>Status:</strong> {{ $booking->status }}</p>
            <p><strong>User ID:</strong> {{ $booking->user_id }}</p>
            <p><strong>Message:</strong></p>
            <div style="padding:10px; background:#f8f9fa; border:1px solid #ddd; min-height:100px;">
                {{ $booking->message }}
            </div>
        </div>
    </div>
</div>

<div class="card p-4 bg-white mt-4">
    <h4 class="mb-3">Update Status</h4>

    <form action="{{ route('admin.bookings.status', $booking->id) }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label>Status</label>
            <select name="status" class="form-control" style="max-width:300px;">
                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ $booking->status == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ $booking->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Status</button>
    </form>
</div>

<div class="mt-4">
    <form action="{{ route('admin.bookings.delete', $booking->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this booking?')">
            Delete Booking
        </button>
    </form>
</div>
@endsection