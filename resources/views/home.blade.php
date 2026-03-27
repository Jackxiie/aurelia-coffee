@extends('layouts.app')

@section('content')
<section class="home-slider owl-carousel">
  <div class="slider-item" style="background-image: url('{{ asset('images/bg_1.jpg') }}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
        <div class="col-md-8 col-sm-12 text-center ftco-animate">
          <span class="subheading">Welcome</span>
          <h1 class="mb-4">The Best Coffee Testing Experience</h1>
          <p class="mb-4 mb-md-5">
            A small river named Duden flows by their place and supplies it
            with the necessary regelialia.
          </p>
          <p>
            <a href="{{ url('/login') }}" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a>
            <a href="{{ url('/menu') }}" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a>
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="slider-item" style="background-image: url('{{ asset('images/bg_2.jpg') }}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
        <div class="col-md-8 col-sm-12 text-center ftco-animate">
          <span class="subheading">Welcome</span>
          <h1 class="mb-4">Amazing Taste &amp; Beautiful Place</h1>
          <p class="mb-4 mb-md-5">
            A small river named Duden flows by their place and supplies it
            with the necessary regelialia.
          </p>
          <p>
            <a href="{{ url('/login') }}" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a>
            <a href="{{ url('/menu') }}" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a>
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="slider-item" style="background-image: url('{{ asset('images/bg_3.jpg') }}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
        <div class="col-md-8 col-sm-12 text-center ftco-animate">
          <span class="subheading">Welcome</span>
          <h1 class="mb-4">Creamy Hot and Ready to Serve</h1>
          <p class="mb-4 mb-md-5">
            A small river named Duden flows by their place and supplies it
            with the necessary regelialia.
          </p>
          <p>
            <a href="{{ url('/login') }}" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a>
            <a href="{{ url('/menu') }}" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-intro">
  <div class="container-wrap">
    <div class="wrap d-md-flex align-items-xl-end">
      <div class="info">
        <div class="row no-gutters">
          <div class="col-md-4 d-flex ftco-animate">
            <div class="icon"><span class="icon-phone"></span></div>
            <div class="text">
              <h3>+84 123 4567 890</h3>
              <p>
                A small river named Duden flows by their place and supplies.
              </p>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="icon"><span class="icon-my_location"></span></div>
            <div class="text">
              <h3>Danang</h3>
              <p>
                459 Ton Duc Thang, Hoa Khanh Nam, Lien Chieu, Danang, Vietnam
              </p>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="icon"><span class="icon-clock-o"></span></div>
            <div class="text">
              <h3>Open Monday-Friday</h3>
              <p>8:00am - 9:00pm</p>
            </div>
          </div>
        </div>
      </div>

      <div class="book p-4">
        <h3>Book a Table</h3>
        <form action="{{ url('/booking') }}" method="POST" class="appointment-form">
          @csrf
          <div class="d-md-flex">
            <div class="form-group">
              <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name*" />
            </div>
            <div class="form-group ml-md-4">
              <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name" />
            </div>
          </div>
          <div class="d-md-flex">
            <div class="form-group">
              <div class="input-wrap">
                <div class="icon">
                  <span class="ion-md-calendar"></span>
                </div>
                <input type="text" id="date" name="date" class="form-control appointment_date" placeholder="Date*" />
              </div>
            </div>
            <div class="form-group ml-md-4">
              <div class="input-wrap">
                <div class="icon"><span class="ion-ios-clock"></span></div>
                <input type="text" id="time" name="time" class="form-control appointment_time" placeholder="Time*" />
              </div>
            </div>
            <div class="form-group ml-md-4">
              <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone*" />
            </div>
          </div>
          <div class="d-md-flex">
            <div class="form-group">
              <textarea name="message" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
            </div>
            <div class="form-group ml-md-4">
              @auth
                <button type="submit" name="submit" class="btn btn-white py-3 px-4">Book a Table</button>
              @else
                <a href="{{ url('/login') }}" class="btn btn-white py-3 px-4">Login to Book Table</a>
              @endauth
            </div>
          </div>
        </form>
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

          At Aurelia Coffee, we believe that great drinks
          come from great ingredients — and even greater people.
          From our baristas to our customers,
          every moment shared here is a part of who we are.

          This is our journey — and we’re glad you’re here.
        </p>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-services">
  <div class="container">
    <div class="row">
      <div class="col-md-4 ftco-animate">
        <div class="media d-block text-center block-6 services">
          <div class="icon d-flex justify-content-center align-items-center mb-5">
            <span class="flaticon-choices"></span>
          </div>
          <div class="media-body">
            <h3 class="heading">Easy to Order</h3>
            <p>
              A smooth and effortless ordering experience, 
              crafted to bring your favorite coffee closer to you in just a few clicks.
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4 ftco-animate">
        <div class="media d-block text-center block-6 services">
          <div class="icon d-flex justify-content-center align-items-center mb-5">
            <span class="flaticon-delivery-truck"></span>
          </div>
          <div class="media-body">
            <h3 class="heading">Fastest Delivery</h3>
            <p>
              Fast, reliable delivery that ensures your coffee arrives fresh, 
              preserving its aroma and perfect taste every time.
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4 ftco-animate">
        <div class="media d-block text-center block-6 services">
          <div class="icon d-flex justify-content-center align-items-center mb-5">
            <span class="flaticon-coffee-bean"></span>
          </div>
          <div class="media-body">
            <h3 class="heading">Quality Coffee</h3>
            <p>
              Only the finest beans are selected to create a rich, refined flavor, 
              offering a truly exceptional coffee experience.
            </p>
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

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate text-center">
        <span class="subheading">Discover</span>
        <h2 class="mb-4">Best Coffee Sellers</h2>
        <p>
          Experience the essence of exceptional coffee with our best-selling selections. 
          Carefully sourced and expertly brewed, every cup embodies richness, balance 
          and a refined taste that defines true coffee excellence.
      </div>
    </div>

    <div class="row">
      @forelse($products as $product)
        <div class="col-md-3">
          <div class="menu-entry">
            <a target="_blank"
               href="{{ url('/products/' . $product->id) }}"
               class="img"
               style="background-image: url('{{ asset('images/' . $product->image) }}')">
            </a>

            <div class="text text-center pt-4">
              <h3>
                <a href="{{ url('/products/' . $product->id) }}">
                  {{ $product->name }}
                </a>
              </h3>

              <p>{{ $product->description }}</p>

              <p class="price">
                <span>${{ $product->price }}</span>
              </p>

              <p>
                <a href="{{ url('/products/' . $product->id) }}"
                   class="btn btn-primary btn-outline-primary">
                   Show
                </a>
              </p>
            </div>
          </div>
        </div>

      @empty
        <div class="col-md-12 text-center">
          <p>No coffee products found.</p>
        </div>
      @endforelse
    </div>
  </div>
</section>

<section class="ftco-gallery">
  <div class="container-wrap">
    <div class="row no-gutters">
      <div class="col-md-3 ftco-animate">
        <a href="#" class="gallery img d-flex align-items-center" style="background-image: url('{{ asset('images/gallery-1.jpg') }}')">
          <div class="icon mb-4 d-flex align-items-center justify-content-center">
            <span class="icon-search"></span>
          </div>
        </a>
      </div>
      <div class="col-md-3 ftco-animate">
        <a href="#" class="gallery img d-flex align-items-center" style="background-image: url('{{ asset('images/gallery-2.jpg') }}')">
          <div class="icon mb-4 d-flex align-items-center justify-content-center">
            <span class="icon-search"></span>
          </div>
        </a>
      </div>
      <div class="col-md-3 ftco-animate">
        <a href="#" class="gallery img d-flex align-items-center" style="background-image: url('{{ asset('images/gallery-3.jpg') }}')">
          <div class="icon mb-4 d-flex align-items-center justify-content-center">
            <span class="icon-search"></span>
          </div>
        </a>
      </div>
      <div class="col-md-3 ftco-animate">
        <a href="#" class="gallery img d-flex align-items-center" style="background-image: url('{{ asset('images/gallery-4.jpg') }}')">
          <div class="icon mb-4 d-flex align-items-center justify-content-center">
            <span class="icon-search"></span>
          </div>
        </a>
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
      <div class="col-lg align-self-sm-end ftco-animate">
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
      <div class="col-lg align-self-sm-end ftco-animate">
        <div class="testimony">
          <blockquote>
            <p>
              &ldquo;This is more than just a coffee shop — it’s a place where people connect, relax, and enjoy meaningful moments. The design is beautiful, the drinks are top-notch, and the overall vibe makes you want to stay longer. I’ve recommended this place to all my friends, and they all love it just as much as I do. &rdquo;
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
      <div class="col-lg align-self-sm-end ftco-animate">
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

<script>
  const bookTableForm = document.querySelector(".appointment-form");

  if (bookTableForm) {
    const firstName = document.querySelector("#first_name");
    const date = document.querySelector("#date");
    const time = document.querySelector("#time");
    const phone = document.querySelector("#phone");

    bookTableForm.addEventListener("submit", (e) => {
      if (firstName.value === "" || date.value === "" || time.value === "" || phone.value === "") {
        e.preventDefault();
        alert("Please fill all the Mandatory details !!");
      }
    });
  }
</script>
@endsection