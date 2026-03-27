@extends('layouts.app')

@section('content')
<section class="home-slider owl-carousel">
  <div class="slider-item" style="background-image: url('{{ asset('images/bg_2.jpg') }}')" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">
        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Register</h1>
          <p class="breadcrumbs">
            <span class="mr-2"><a href="{{ route('home') }}">Home</a></span>
            <span>Register</span>
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
        <form action="{{ route('register.store') }}" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5">
          @csrf
          <h3 class="mb-4 billing-heading">Register</h3>
          <div class="row align-items-end">
            <div class="col-md-12">
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" value="{{ old('username') }}" class="form-control" placeholder="Username" />
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" />
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" />
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" />
              </div>
            </div>

            <div class="col-md-12">
              <a href="{{ route('login') }}">Already have an Account</a>
            </div>

            <div class="col-md-12">
              <div class="form-group mt-4">
                <button class="btn btn-primary py-3 px-4" type="submit">Register</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection