@extends('layouts.app')

@section('content')
<section class="home-slider owl-carousel">
  <div class="slider-item" style="background-image: url('{{ asset('images/bg_1.jpg') }}')" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">
        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Order Detail</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <h4>Order #{{ $order->id }}</h4>
    <p>Status: <strong>{{ ucfirst($order->status) }}</strong></p>
    <p>Total: <strong>${{ number_format($order->total, 2) }}</strong></p>

    <table class="table table-bordered bg-white mt-4">
      <thead>
        <tr>
          <th>Product</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Subtotal</th>
        </tr>
      </thead>
      <tbody>
        @foreach($order->items as $item)
          <tr>
            <td>{{ $item->product_name }}</td>
            <td>${{ number_format($item->product_price, 2) }}</td>
            <td>{{ $item->quantity }}</td>
            <td>${{ number_format($item->subtotal, 2) }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</section>
@endsection