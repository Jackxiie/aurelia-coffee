@extends('layouts.app')

@section('content')

<style>
/* ===== CONTACT INFO BOX ===== */
.contact-box {
    background: #fff;
    padding: 30px;
    text-align: center;
    border-radius: 10px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    transition: 0.3s;
    height: 100%;
}

.contact-box:hover {
    transform: translateY(-5px);
}

.contact-icon {
    width: 70px;
    height: 70px;
    margin: 0 auto 15px;
    border-radius: 50%;
    background: #c49b63;
    color: #fff;
    font-size: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.contact-box h5 {
    color: #222;
    margin-bottom: 12px;
    font-weight: 600;
}

.contact-box p {
    color: #666;
    margin-bottom: 0;
    line-height: 1.8;
}

/* ===== FORM ===== */
.contact-form-wrap {
    background: #fff;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
}

.contact-form .form-control {
    background: #fff !important;
    border: 1px solid #ddd !important;
    border-radius: 5px;
    height: 52px;
    color: #222 !important;
    -webkit-text-fill-color: #222 !important;
    box-shadow: none !important;
    font-size: 16px;
    padding: 12px 15px;
}

.contact-form textarea.form-control {
    height: 180px !important;
    min-height: 180px !important;
    resize: vertical;
    padding-top: 15px;
    color: #222 !important;
    -webkit-text-fill-color: #222 !important;
}

.contact-form input.form-control::placeholder,
.contact-form textarea.form-control::placeholder {
    color: #999 !important;
    opacity: 1 !important;
}

.contact-form input.form-control::-webkit-input-placeholder,
.contact-form textarea.form-control::-webkit-input-placeholder {
    color: #999 !important;
    opacity: 1 !important;
}

.contact-form input.form-control:-ms-input-placeholder,
.contact-form textarea.form-control:-ms-input-placeholder {
    color: #999 !important;
}

.contact-form input.form-control::-ms-input-placeholder,
.contact-form textarea.form-control::-ms-input-placeholder {
    color: #999 !important;
}

.contact-form .form-control:focus {
    border-color: #c49b63 !important;
    box-shadow: 0 0 0 0.15rem rgba(196, 155, 99, 0.2) !important;
}

.contact-form .btn {
    background: #c49b63 !important;
    border: none !important;
    color: #fff !important;
    min-width: 180px;
}

.contact-form .btn:hover {
    background: #b3874f !important;
}

@media (max-width: 767.98px) {
    .contact-box {
        margin-bottom: 20px;
    }

    .contact-form-wrap {
        padding: 25px;
    }
}
</style>

<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url('{{ asset('images/bg_3.jpg') }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 text-center">
                    <h1 class="mb-3 mt-5 bread">Contact Us</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="{{ route('home') }}">Home</a></span>
                        <span>Contact</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row mb-5">

            <div class="col-md-3 mb-4">
                <div class="contact-box">
                    <div class="contact-icon">
                        <i class="fa fa-map-marker-alt"></i>
                    </div>
                    <h5>Address</h5>
                    <p>459 Ton Duc Thang<br>Danang, Vietnam</p>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="contact-box">
                    <div class="contact-icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <h5>Phone</h5>
                    <p>+84 094 8213 961</p>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="contact-box">
                    <div class="contact-icon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <h5>Email</h5>
                    <p>xaypanyavx@gmail.com</p>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="contact-box">
                    <div class="contact-icon">
                        <i class="fa fa-globe"></i>
                    </div>
                    <h5>Website</h5>
                    <p>aureliacoffee.com</p>
                </div>
            </div>

        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="contact-form-wrap">
                    <form method="POST" action="{{ route('contact.send') }}" class="contact-form">
                      @csrf

                      @if(session('success'))
                        <div class="alert alert-success mb-4">
                          {{ session('success') }}
                        </div>
                      @endif

                      @if($errors->any())
                        <div class="alert alert-danger mb-4">
                          <ul class="mb-0">
                            @foreach($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                      @endif

                      <div class="row">
                        <div class="col-md-6">
                          <input
                            type="text"
                            name="name"
                            class="form-control mb-3"
                            placeholder="Your Name"
                            value="{{ old('name') }}"
                          >
                      </div>

                      <div class="col-md-6">
                        <input
                          type="email"
                          name="email"
                          class="form-control mb-3"
                          placeholder="Your Email"
                          value="{{ old('email') }}"
                        >
                      </div>
                    </div>

                    <input
                      type="text"
                      name="subject"
                      class="form-control mb-3"
                      placeholder="Subject"
                      value="{{ old('subject') }}"
                    >

                    <textarea
                        name="message"
                        class="form-control mb-4"
                        placeholder="Message"
                    >{{ old('message') }}</textarea>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-5 py-3">
                            Send Message
                        </button>
                    </div>
                </form>
              </div>
            </div>
        </div>

    </div>
</section>

@endsection