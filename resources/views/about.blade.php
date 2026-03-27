@extends('layouts.app')

@section('content')
<section class="home-slider owl-carousel">
  <div class="slider-item" style="background-image: url('{{ asset('images/bg_3.jpg') }}')" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">
        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">About Us</h1>
          <p class="breadcrumbs">
            <span class="mr-2"><a href="{{ url('/') }}">Home</a></span>
            <span>About</span>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-about d-md-flex">
  <div class="one-half img" style="background-image: url('{{ asset('images/about.jpg') }}')"></div>
  <div class="one-half ftco-animate">
    <div class="overlap">
      <div class="heading-section ftco-animate">
        <span class="subheading">Discover</span>
        <h2 class="mb-4">Our Story</h2>
      </div>
      <div>
        <p>
          Our story began with a small dream:
          to build a place where people could slow down,
          feel at ease, and enjoy a cup of coffee made with heart.

          At AURELIA COFFEE, we believe that great drinks
          come from great ingredients — and even greater people.
          From our baristas to our customers,
          every moment shared here is a part of who we are.

          This is our journey — and we’re glad you’re here.
        </p>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section img" id="ftco-testimony" style="background-image: url('{{ asset('images/bg_1.jpg') }}')" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 heading-section text-center ftco-animate">
        <span class="subheading">Testimony</span>
        <h2 class="mb-4">Customers Says</h2>
        <p>
          Every cup we serve tells a story of passion, quality, and dedication. 
          Our customers return not only for the taste, but for the comfort, the experience
          and the moments that make each visit truly special.
        </p>
      </div>
    </div>
  </div>
  <div class="container-wrap">
    <div class="row d-flex no-gutters">
      <div class="col-lg align-self-sm-end">
        <div class="testimony">
          <blockquote>
            <p>
              &ldquo;I’ve visited many coffee shops around the city, but this place truly stands out. From the moment you walk in, the atmosphere feels warm and inviting. The aroma of freshly brewed coffee fills the air, and every cup is crafted with incredible attention to detail. It’s not just about drinking coffee here — it’s about enjoying the entire experience.&rdquo;
            </p>
          </blockquote>
          <div class="author d-flex mt-4">
            <div class="image mr-3 align-self-center">
              <img src="{{ asset('images/person_1.jpg') }}" alt="" />
            </div>
            <div class="name align-self-center">
              Emily Carter
              <span class="position">Coffee Enthusiast</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg align-self-sm-end">
        <div class="testimony overlay">
          <blockquote>
            <p>
              &ldquo;What I love most about this café is the consistency in quality and service. Every time I come here, the coffee tastes just as amazing as the first time. The staff are friendly, professional, and always make you feel welcome. It has become my go-to place whenever I need a quiet moment or a productive workspace.&rdquo;
            </p>
          </blockquote>
          <div class="author d-flex mt-4">
            <div class="image mr-3 align-self-center">
              <img src="{{ asset('images/person_2.jpg') }}" alt="" />
            </div>
            <div class="name align-self-center">
              Daniel Jame
              <span class="position">Freelancer</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg align-self-sm-end">
        <div class="testimony">
          <blockquote>
            <p>
              &ldquo;This is more than just a coffee shop — it’s a place where people connect, relax, and enjoy meaningful moments. The design is beautiful, the drinks are top-notch, and the overall vibe makes you want to stay longer. I’ve recommended this place to all my friends, and they all love it just as much as I do.&rdquo;
            </p>
          </blockquote>
          <div class="author d-flex mt-4">
            <div class="image mr-3 align-self-center">
              <img src="{{ asset('images/person_3.jpg') }}" alt="" />
            </div>
            <div class="name align-self-center">
              Sophia Martinez
              <span class="position">Lifestyle Blogger</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg align-self-sm-end">
        <div class="testimony overlay">
          <blockquote>
            <p>
              &ldquo;I’m really impressed by the quality of ingredients and the creativity in the menu. You can tell that every drink is carefully designed to deliver both flavor and presentation. Whether it’s a simple espresso or a specialty drink, everything tastes exceptional. This café truly understands what great coffee should be.&rdquo;
            </p>
          </blockquote>
          <div class="author d-flex mt-4">
            <div class="image mr-3 align-self-center">
              <img src="{{ asset('images/person_2.jpg') }}" alt="" />
            </div>
            <div class="name align-self-center">
              Michael Tom
              <span class="position">Entrepreneur</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg align-self-sm-end">
        <div class="testimony">
          <blockquote>
            <p>
              &ldquo;Every visit here feels special. The environment is cozy yet modern, making it perfect for both casual hangouts and focused work sessions. The coffee is smooth, rich, and perfectly balanced, and the service always exceeds expectations. It’s the kind of place you keep coming back to without hesitation. &rdquo;
            </p>
          </blockquote>
          <div class="author d-flex mt-4">
            <div class="image mr-3 align-self-center">
              <img src="{{ asset('images/person_3.jpg') }}" alt="" />
            </div>
            <div class="name align-self-center">
              Liam Anderson
              <span class="position">Regular Customer</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 pr-md-5">
        <div class="heading-section text-md-right ftco-animate">
          <span class="subheading">Discover</span>
          <h2 class="mb-4">Our Menu</h2>
          <p class="mb-4">
            In a world where time slows down and every moment is meant to be savored, 
            there exists a place where craftsmanship meets passion. 

            Far beyond the ordinary, where every detail is thoughtfully curated, 
            we bring together the finest ingredients, the richest aromas, 
            and an atmosphere designed for comfort and inspiration. 

            Here, coffee is not just a drink — it is an experience, 
            a quiet escape from the rush of everyday life, 
            and a celebration of taste, warmth, and connection. 

            Welcome to a space where every sip tells a story, 
            and every visit becomes a memory worth returning to.
          </p>
          <p>
            <a href="{{ url('/menu') }}" class="btn btn-primary btn-outline-primary px-4 py-3">View Full Menu</a>
          </p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-6">
            <div class="menu-entry">
              <a href="#" class="img" style="background-image: url('{{ asset('images/menu-1.jpg') }}')"></a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="menu-entry mt-lg-4">
              <a href="#" class="img" style="background-image: url('{{ asset('images/menu-2.jpg') }}')"></a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="menu-entry">
              <a href="#" class="img" style="background-image: url('{{ asset('images/menu-3.jpg') }}')"></a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="menu-entry mt-lg-4">
              <a href="#" class="img" style="background-image: url('{{ asset('images/menu-4.jpg') }}')"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url('{{ asset('images/bg_2.jpg') }}')" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <div class="icon">
                  <span class="flaticon-coffee-cup"></span>
                </div>
                <strong class="number" data-number="100">0</strong>
                <span>Coffee Branches</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <div class="icon">
                  <span class="flaticon-coffee-cup"></span>
                </div>
                <strong class="number" data-number="85">0</strong>
                <span>Number of Awards</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <div class="icon">
                  <span class="flaticon-coffee-cup"></span>
                </div>
                <strong class="number" data-number="10567">0</strong>
                <span>Happy Customer</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <div class="icon">
                  <span class="flaticon-coffee-cup"></span>
                </div>
                <strong class="number" data-number="900">0</strong>
                <span>Staff</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection