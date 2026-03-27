@extends('admin.layouts.app')

@section('content')
<h2 class="mb-4">Dashboard</h2>

<div class="row">
    <div class="col-md-4">
        <div class="card p-3">
            <h4>Total Products</h4>
            <h2>{{ $products ?? 0 }}</h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3">
            <h4>Total Bookings</h4>
            <h2>{{ $bookings ?? 0 }}</h2>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3">
            <h4>Total Orders</h4>
            <h2>{{ $orders ?? 0 }}</h2>
        </div>
    </div>
</div>
@endsection