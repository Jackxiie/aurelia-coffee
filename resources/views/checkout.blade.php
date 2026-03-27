@extends('layouts.app')

@section('content')
<section class="home-slider owl-carousel">
  <div class="slider-item" style="background-image: url('{{ asset('images/bg_3.jpg') }}')" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">
        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Checkout</h1>
          <p class="breadcrumbs">
            <span class="mr-2"><a href="{{ route('home') }}">Home</a></span>
            <span>Checkout</span>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 ftco-animate">
        <form action="{{ route('checkout.confirm') }}" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5">
          @csrf
          <h3 class="mb-4 billing-heading">Billing Details</h3>

          <div class="row align-items-end">
            <div class="col-md-6">
              <div class="form-group">
                <label>First Name *</label>
                <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}">
              </div>
            </div>

            <div class="w-100"></div>

            <div class="col-md-12">
  <div class="form-group">
    <label>State / Country *</label>
    <input
      type="text"
      name="country"
      class="form-control"
      list="country-list"
      placeholder="Type or search your country"
      value="{{ old('country') }}"
      required
    >

    <datalist id="country-list">
      <option value="Afghanistan">
      <option value="Albania">
      <option value="Algeria">
      <option value="Andorra">
      <option value="Angola">
      <option value="Argentina">
      <option value="Armenia">
      <option value="Australia">
      <option value="Austria">
      <option value="Azerbaijan">
      <option value="Bahamas">
      <option value="Bahrain">
      <option value="Bangladesh">
      <option value="Belarus">
      <option value="Belgium">
      <option value="Belize">
      <option value="Bhutan">
      <option value="Bolivia">
      <option value="Bosnia and Herzegovina">
      <option value="Botswana">
      <option value="Brazil">
      <option value="Brunei">
      <option value="Bulgaria">
      <option value="Cambodia">
      <option value="Cameroon">
      <option value="Canada">
      <option value="Chile">
      <option value="China">
      <option value="Colombia">
      <option value="Costa Rica">
      <option value="Croatia">
      <option value="Cuba">
      <option value="Cyprus">
      <option value="Czech Republic">
      <option value="Denmark">
      <option value="Dominican Republic">
      <option value="Ecuador">
      <option value="Egypt">
      <option value="El Salvador">
      <option value="Estonia">
      <option value="Ethiopia">
      <option value="Finland">
      <option value="France">
      <option value="Georgia">
      <option value="Germany">
      <option value="Ghana">
      <option value="Greece">
      <option value="Guatemala">
      <option value="Honduras">
      <option value="Hong Kong">
      <option value="Hungary">
      <option value="Iceland">
      <option value="India">
      <option value="Indonesia">
      <option value="Iran">
      <option value="Iraq">
      <option value="Ireland">
      <option value="Israel">
      <option value="Italy">
      <option value="Jamaica">
      <option value="Japan">
      <option value="Jordan">
      <option value="Kazakhstan">
      <option value="Kenya">
      <option value="Kuwait">
      <option value="Laos">
      <option value="Latvia">
      <option value="Lebanon">
      <option value="Lithuania">
      <option value="Luxembourg">
      <option value="Malaysia">
      <option value="Maldives">
      <option value="Mexico">
      <option value="Mongolia">
      <option value="Morocco">
      <option value="Myanmar">
      <option value="Nepal">
      <option value="Netherlands">
      <option value="New Zealand">
      <option value="Nicaragua">
      <option value="Nigeria">
      <option value="North Korea">
      <option value="Norway">
      <option value="Oman">
      <option value="Pakistan">
      <option value="Panama">
      <option value="Paraguay">
      <option value="Peru">
      <option value="Philippines">
      <option value="Poland">
      <option value="Portugal">
      <option value="Qatar">
      <option value="Romania">
      <option value="Russia">
      <option value="Saudi Arabia">
      <option value="Serbia">
      <option value="Singapore">
      <option value="Slovakia">
      <option value="Slovenia">
      <option value="South Africa">
      <option value="South Korea">
      <option value="Spain">
      <option value="Sri Lanka">
      <option value="Sweden">
      <option value="Switzerland">
      <option value="Taiwan">
      <option value="Thailand">
      <option value="Turkey">
      <option value="Ukraine">
      <option value="United Arab Emirates">
      <option value="United Kingdom">
      <option value="United States">
      <option value="Uruguay">
      <option value="Uzbekistan">
      <option value="Venezuela">
      <option value="Vietnam">
      <option value="Yemen">
      <option value="Zimbabwe">
    </datalist>
  </div>
</div>

            <div class="w-100"></div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Street Address *</label>
                <input type="text" name="street_address" class="form-control" value="{{ old('street_address') }}">
              </div>
            </div>

            <div class="w-100"></div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Town / City *</label>
                <input type="text" name="town" class="form-control" value="{{ old('town') }}">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Postcode / ZIP *</label>
                <input type="text" name="zip_code" class="form-control" value="{{ old('zip_code') }}">
              </div>
            </div>

            <div class="w-100"></div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Phone *</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Email Address *</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', auth()->user()->email ?? '') }}">
              </div>
            </div>

            <div class="col-md-12 mt-4">
              <h4>Order Summary</h4>
              <table class="table table-bordered bg-white">
                <thead>
                  <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($cart as $item)
                    <tr>
                      <td>
                        {{ $item['name'] }}
                        @if(!empty($item['size']))
                          <br><small>Size: {{ $item['size'] }}</small>
                        @endif
                      </td>
                      <td>{{ $item['quantity'] }}</td>
                      <td>${{ number_format($item['price'], 2) }}</td>
                      <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <div class="text-right mb-3">
                <h4>Total: ${{ number_format($total, 2) }}</h4>
              </div>
            </div>

            <div class="col-md-12">
              <button type="submit" class="btn btn-primary py-3 px-4">Place an order</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection