@extends('layouts.app')

@section('content')

<style>
  .ftco-cart .cart-list table {
    width: 100%;
    table-layout: fixed;
  }

  .ftco-cart .cart-list th,
  .ftco-cart .cart-list td {
    vertical-align: middle !important;
    color: #222 !important;
    padding: 20px 12px;
  }

  .ftco-cart .cart-list th:nth-child(1) { width: 60px; }
  .ftco-cart .cart-list th:nth-child(2) { width: 140px; }
  .ftco-cart .cart-list th:nth-child(3) { width: 280px; }
  .ftco-cart .cart-list th:nth-child(4) { width: 100px; }
  .ftco-cart .cart-list th:nth-child(5) { width: 120px; }
  .ftco-cart .cart-list th:nth-child(6) { width: 170px; }
  .ftco-cart .cart-list th:nth-child(7) { width: 140px; }

  .ftco-cart .image-prod img {
    width: 110px;
    height: 110px;
    object-fit: cover;
    display: block;
    margin: 0 auto;
    border-radius: 6px;
  }

  .ftco-cart .product-name {
    text-align: left !important;
  }

  .ftco-cart .product-name h3 {
    font-size: 20px;
    color: #222 !important;
    margin-bottom: 8px;
    font-weight: 600;
  }

  .ftco-cart .product-name p {
    margin-bottom: 0;
    color: #666;
    font-size: 14px;
  }

  .ftco-cart .price,
  .ftco-cart .total {
    font-weight: 600;
    color: #222 !important;
  }

  .ftco-cart .quantity form {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    flex-wrap: wrap;
  }

  .ftco-cart .quantity input[type="number"] {
    width: 80px;
    text-align: center;
  }

  .ftco-cart .product-remove button {
    color: #999;
    font-size: 18px;
  }

  .ftco-cart .product-remove button:hover {
    color: #c49b63;
  }
</style>

<section class="home-slider owl-carousel">
  <div class="slider-item" style="background-image: url('{{ asset('images/bg_3.jpg') }}')" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">
        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Cart</h1>
          <p class="breadcrumbs">
            <span class="mr-2"><a href="{{ route('home') }}">Home</a></span>
            <span>Cart</span>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-cart">
  <div class="container">

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(!empty($cart))

    <div class="row">
      <div class="col-md-12 ftco-animate">
        <div class="cart-list">
          <table class="table">
            <thead class="thead-primary">
              <tr class="text-center">
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>Product</th>
                <th>Size</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
              </tr>
            </thead>

            <tbody>
              @foreach($cart as $key => $item)
              <tr class="text-center">

                <td class="product-remove">
                  <form action="{{ route('cart.remove', $key) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="border:none; background:none;">
                      <span class="icon-close"></span>
                    </button>
                  </form>
                </td>

                <td class="image-prod">
                  <img src="{{ asset('images/' . ($item['image'] ?? 'no-image.jpg')) }}"
                       alt="{{ $item['name'] ?? 'Product' }}"
                       onerror="this.src='https://via.placeholder.com/110x110?text=No+Image'">
                </td>

                <td class="product-name">
                  <h3>{{ $item['name'] ?? 'No product name' }}</h3>
                </td>

                <td>
                  {{ $item['size'] ?? '-' }}
                </td>

                <td class="price">
                  ${{ number_format((float)($item['price'] ?? 0), 2) }}
                </td>

                <td class="quantity">
                  <form action="{{ route('cart.update', $key) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <input type="number"
                           name="quantity"
                           class="form-control input-number"
                           value="{{ $item['quantity'] ?? 1 }}"
                           min="1"
                           required>

                    <button type="submit" class="btn btn-sm btn-primary">
                      Update
                    </button>
                  </form>
                </td>

                <td class="total">
                  ${{ number_format((float)($item['price'] ?? 0) * (int)($item['quantity'] ?? 1), 2) }}
                </td>

              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="row justify-content-end">
      <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
        <div class="cart-total mb-3">
          <h3>Cart Totals</h3>

          @php
            $total = 0;
          @endphp

          @foreach($cart as $item)
            @php
              $total += ((float)($item['price'] ?? 0) * (int)($item['quantity'] ?? 1));
            @endphp
          @endforeach

          <p class="d-flex">
            <span>Subtotal</span>
            <span>${{ number_format($total, 2) }}</span>
          </p>

          <p class="d-flex">
            <span>Delivery</span>
            <span>$0.00</span>
          </p>

          <p class="d-flex">
            <span>Discount</span>
            <span>$0.00</span>
          </p>

          <hr>

          <p class="d-flex total-price">
            <span>Total</span>
            <span>${{ number_format($total, 2) }}</span>
          </p>
        </div>

        <p class="text-center">
          <a href="{{ route('checkout') }}" class="btn btn-primary py-3 px-4">
            Proceed to Checkout
          </a>
        </p>
      </div>
    </div>

    @else

      <div class="text-center">
        <h3>Your cart is empty</h3>
        <a href="{{ route('menu') }}" class="btn btn-primary mt-3">
          Go to Menu
        </a>
      </div>

    @endif

  </div>
</section>

@endsection