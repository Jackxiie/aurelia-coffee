@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Orders</h2>
</div>

<table class="table table-bordered table-striped bg-white">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Total</th>
            <th>Status</th>
            <th>Created At</th>
            <th width="180">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user_id ?? 'N/A' }}</td>
                <td>${{ number_format($order->total_price ?? 0, 2) }}</td>
                <td>
                    @php
                        $badgeClass = match($order->status) {
                            'pending' => 'warning',
                            'processing' => 'info',
                            'completed' => 'success',
                            'cancelled' => 'danger',
                            default => 'secondary',
                        };
                    @endphp

                    <span class="badge badge-{{ $badgeClass }}">
                        {{ ucfirst($order->status ?? 'N/A') }}
                    </span>
                </td>
                <td>{{ $order->created_at ? $order->created_at->format('d M Y, H:i') : 'N/A' }}</td>
                <td>
                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-info">Show</a>

                    <form action="{{ route('admin.orders.delete', $order->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this order?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">No orders found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection