@extends('layouts.app')

@section('content')
<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url('{{ asset('images/bg_3.jpg') }}')" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-8 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">My Orders</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="{{ route('home') }}">Home</a></span>
                        <span>My Orders</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">

        @if(session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($orders->isEmpty())
            <div class="text-center">
                <h3>No orders yet</h3>
                <p class="mt-3">You have not placed any orders yet.</p>
                <a href="{{ route('menu') }}" class="btn btn-primary mt-3 px-4 py-3">Go to Menu</a>
            </div>
        @else
            @foreach($orders as $order)
                <div class="card mb-5 shadow-sm border-0">
                    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center flex-wrap">
                        <div>
                            <h5 class="mb-1">Order #{{ $order->id }}</h5>
                            <small>
                                {{ $order->created_at ? $order->created_at->format('d M Y, H:i') : '-' }}
                            </small>
                        </div>

                        <div class="mt-2 mt-md-0 text-md-right">
                            <div>
                                <strong>Status:</strong>
                                <span class="badge badge-warning text-uppercase px-3 py-2">
                                    {{ $order->status }}
                                </span>
                            </div>
                            <div class="mt-1">
                                <strong>Total:</strong> ${{ number_format($order->total_price, 2) }}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <h6 class="font-weight-bold mb-3">Billing Details</h6>
                                <p class="mb-1"><strong>Name:</strong> {{ trim(($order->first_name ?? '') . ' ' . ($order->last_name ?? '')) ?: '-' }}</p>
                                <p class="mb-1"><strong>Email:</strong> {{ $order->email ?? '-' }}</p>
                                <p class="mb-1"><strong>Phone:</strong> {{ $order->phone ?? '-' }}</p>
                                <p class="mb-1"><strong>Country:</strong> {{ $order->country ?? '-' }}</p>
                                <p class="mb-1"><strong>Address:</strong> {{ $order->street_address ?? '-' }}</p>
                                <p class="mb-1"><strong>Town/City:</strong> {{ $order->town ?? '-' }}</p>
                                <p class="mb-0"><strong>ZIP Code:</strong> {{ $order->zip_code ?? '-' }}</p>
                            </div>

                            <div class="col-md-6">
                                <h6 class="font-weight-bold mb-3">Order Summary</h6>
                                <div class="table-responsive">
                                <table class="table table-bordered bg-white">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th class="text-center">Qty</th>
                                            <th class="text-right">Price</th>
                                            <th class="text-right">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->items as $item)
                                            <tr>
                                                <td>
                                                    <strong>{{ $item->product_name }}</strong>
                                                    @if(!empty($item->size))
                                                        <br><small>Size: {{ $item->size }}</small>
                                                    @endif
                                                </td>
                                                <td class="text-center">{{ $item->quantity }}</td>
                                                <td class="text-right">${{ number_format($item->product_price, 2) }}</td>
                                                <td class="text-right">${{ number_format($item->subtotal, 2) }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                            <th colspan="3" class="text-right">Grand Total</th>
                                            <th class="text-right">${{ number_format($order->total_price, 2) }}</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>
</section>
@endsection