@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Order Detail</h2>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Back</a>
</div>

<div class="card p-4 bg-white">
    <div class="row">
        <div class="col-md-6">
            <p><strong>ID:</strong> {{ $order->id }}</p>
            <p><strong>User ID:</strong> {{ $order->user_id ?? 'N/A' }}</p>
            <p><strong>Total:</strong> ${{ number_format($order->total_price ?? 0, 2) }}</p>
            <p><strong>First Name:</strong> {{ $order->first_name ?? 'N/A' }}</p>
            <p><strong>Last Name:</strong> {{ $order->last_name ?? 'N/A' }}</p>
            <p><strong>Email:</strong> {{ $order->email ?? 'N/A' }}</p>
            <p><strong>Phone:</strong> {{ $order->phone ?? 'N/A' }}</p>
        </div>

        <div class="col-md-6">
            <p><strong>Status:</strong> {{ ucfirst($order->status ?? 'N/A') }}</p>
            <p><strong>Country:</strong> {{ $order->country ?? 'N/A' }}</p>
            <p><strong>Street Address:</strong> {{ $order->street_address ?? 'N/A' }}</p>
            <p><strong>Town/City:</strong> {{ $order->town ?? 'N/A' }}</p>
            <p><strong>ZIP Code:</strong> {{ $order->zip_code ?? 'N/A' }}</p>
            <p><strong>Created At:</strong> {{ $order->created_at ? $order->created_at->format('d M Y, H:i') : 'N/A' }}</p>
        </div>
    </div>
</div>

<div class="card p-4 bg-white mt-4">
    <h4 class="mb-3">Update Status</h4>

    <form action="{{ route('admin.orders.status', $order->id) }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label>Status</label>
            <select name="status" class="form-control" style="max-width:300px;">
                <option value="pending" {{ ($order->status ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="processing" {{ ($order->status ?? '') == 'processing' ? 'selected' : '' }}>Processing</option>
                <option value="completed" {{ ($order->status ?? '') == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ ($order->status ?? '') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Status</button>
    </form>
</div>

<div class="card p-4 bg-white mt-4">
    <h4 class="mb-3">Order Items</h4>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Product</th>
                    <th>Size</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @forelse($order->items as $item)
                    <tr>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->size ?? '-' }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($item->product_price, 2) }}</td>
                        <td>${{ number_format($item->subtotal, 2) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No order items found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4">
    <form action="{{ route('admin.orders.delete', $order->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this order?')">
            Delete Order
        </button>
    </form>
</div>
@endsection