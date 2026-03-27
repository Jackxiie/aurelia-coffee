@extends('layouts.app')

@section('content')
<section class="home-slider owl-carousel">
  <div class="slider-item" style="background-image: url('{{ asset('images/bg_1.jpg') }}')" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">
        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Login</h1>
          <p class="breadcrumbs">
            <span class="mr-2"><a href="{{ route('home') }}">Home</a></span>
            <span>Login</span>
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
        <form action="{{ route('login.store') }}" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5">
          @csrf
          <h3 class="mb-4 billing-heading">Login</h3>
          <div class="row align-items-end">
            <div class="col-md-12">
              <div class="form-group">
                <label>Email</label>
                <input name="email" type="email" value="{{ old('email') }}" class="form-control" placeholder="Email" />
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Password</label>
                <input name="password" type="password" class="form-control" placeholder="Password" />
              </div>
            </div>

            <div class="col-md-12">
              <a href="{{ route('password.request') }}">Forgot Password |</a>
              <a href="{{ route('register') }}">Don't have an Account</a>
            </div>

            <div class="col-md-12">
              <div class="form-group mt-4">
                <button class="btn btn-primary py-3 px-4" type="submit">Login</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection