@extends('layouts.app')

@section('content')
<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url('{{ asset('images/bg_3.jpg') }}');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">My Bookings</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="{{ route('home') }}">Home</a></span>
                        <span>My Bookings</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        @if($bookings->isEmpty())
            <div class="text-center">
                <h3>No bookings yet</h3>
                <p class="mt-3">You have not made any table bookings yet.</p>
                <a href="{{ route('home') }}" class="btn btn-primary mt-3 px-4 py-3">Go to Home</a>
            </div>
        @else
            @foreach($bookings as $booking)
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center flex-wrap">
                        <div>
                            <h5 class="mb-1">Booking #{{ $booking->id }}</h5>
                            <small>{{ $booking->created_at ?? '-' }}</small>
                        </div>

                        <div class="mt-2 mt-md-0 text-md-right">
                            <strong>Status:</strong>
                            <span class="badge badge-warning text-uppercase px-3 py-2">
                                {{ $booking->status ?? 'pending' }}
                            </span>
                        </div>
                    </div>

                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $booking->first_name }} {{ $booking->last_name }}</p>
                        <p><strong>Date:</strong> {{ $booking->date }}</p>
                        <p><strong>Time:</strong> {{ $booking->time }}</p>
                        <p><strong>Phone:</strong> {{ $booking->phone }}</p>
                        <p><strong>Message:</strong> {{ $booking->message ?? '-' }}</p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>
@endsection