@extends('layouts.app')

@section('content')
<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url('{{ asset('images/bg_3.jpg') }}');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Product Detail</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="{{ route('home') }}">Home</a></span>
                        <span>Product Detail</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
                <a href="{{ asset('images/' . $product->image) }}" class="image-popup">
                    <img src="{{ asset('images/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
                </a>
            </div>

            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3>{{ $product->name }}</h3>

                <p class="price">
                    <span id="product-price">
                        ${{ number_format($product->sizes->first()->price ?? $product->price, 2) }}
                    </span>
                </p>

                <p>{{ $product->description }}</p>

                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group d-flex">
                                <div class="select-wrap w-100">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="size" id="size" class="form-control" required>
                                        @if($product->sizes->count())
                                            @foreach($product->sizes as $size)
                                                <option value="{{ $size->size_name }}" data-price="{{ $size->price }}">
                                                    {{ $size->size_name }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option value="Default" data-price="{{ $product->price }}">Default</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="w-100"></div>

                        <div class="input-group col-md-6 d-flex mb-3">
                            <span class="input-group-btn mr-2">
                                <button type="button" class="quantity-left-minus btn" onclick="changeQty(-1)">
                                    <i class="icon-minus"></i>
                                </button>
                            </span>

                            <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">

                            <span class="input-group-btn ml-2">
                                <button type="button" class="quantity-right-plus btn" onclick="changeQty(1)">
                                    <i class="icon-plus"></i>
                                </button>
                            </span>
                        </div>
                    </div>

                    @auth
                        <button class="btn btn-primary py-3 px-4 cart" type="submit">
                            Add to cart
                        </button>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary py-3 px-4 cart">
                            Login to Add to cart
                        </a>
                    @endauth
                </form>
            </div>
        </div>
    </div>
</section>

@if(isset($relatedProducts) && $relatedProducts->count())
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">Discover</span>
                <h2 class="mb-4">Related products</h2>
            </div>
        </div>

        <div class="row">
            @foreach($relatedProducts as $row)
                <div class="col-md-3">
                    <div class="menu-entry">
                        <a href="{{ route('product.show', $row->id) }}"
                           class="img"
                           style="background-image: url('{{ asset('images/' . $row->image) }}');">
                        </a>
                        <div class="text text-center pt-4">
                            <h3><a href="{{ route('product.show', $row->id) }}">{{ $row->name }}</a></h3>
                            <p>{{ $row->description }}</p>
                            <p class="price"><span>${{ number_format($row->price, 2) }}</span></p>
                            <p>
                                <a href="{{ route('product.show', $row->id) }}" class="btn btn-primary btn-outline-primary">
                                    Show
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<script>
    function changeQty(amount) {
        const qtyInput = document.getElementById('quantity');
        let current = parseInt(qtyInput.value) || 1;
        current += amount;
        if (current < 1) current = 1;
        qtyInput.value = current;
    }

    document.addEventListener('DOMContentLoaded', function () {
        const sizeSelect = document.getElementById('size');
        const priceBox = document.getElementById('product-price');

        function updatePrice() {
            const selected = sizeSelect.options[sizeSelect.selectedIndex];
            const price = selected.getAttribute('data-price');
            priceBox.textContent = '$' + parseFloat(price).toFixed(2);
        }

        if (sizeSelect) {
            sizeSelect.addEventListener('change', updatePrice);
            updatePrice();
        }
    });
</script>
@endsection