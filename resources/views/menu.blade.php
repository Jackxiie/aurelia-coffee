@extends('layouts.app')

@section('content')
<section class="home-slider owl-carousel">
  <div class="slider-item" style="background-image: url('{{ asset('images/bg_3.jpg') }}')" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">
        <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Our Menu</h1>
          <p class="breadcrumbs">
            <span class="mr-2"><a href="{{ url('/') }}">Home</a></span>
            <span>Menu</span>
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
        <form action="{{ route('booking.store') }}" method="POST" class="appointment-form">
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

<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mb-5 pb-3">
        <h3 class="mb-5 heading-pricing ftco-animate">Desserts</h3>
        @foreach($desserts as $dessert)
          <div class="pricing-entry d-flex ftco-animate">
            <div class="img" style="background-image: url('{{ asset('images/' . $dessert->image) }}')"></div>
            <div class="desc pl-3">
              <div class="d-flex text align-items-center">
                <h3><span>{{ $dessert->name }}</span></h3>
                <span class="price">${{ number_format((float) $dessert->price, 2) }}</span>
              </div>
              <div class="d-block">
                <p>{{ $dessert->description }}</p>
              </div>

              <form action="{{ route('cart.add', $dessert->id) }}" method="POST" class="mt-2">
                @csrf
                <input type="hidden" name="quantity" value="1">
                <button class="btn btn-primary btn-sm">Add to Cart</button>
              </form>
            </div>
          </div>
        @endforeach
      </div>

      <div class="col-md-6 mb-5 pb-3">
        <h3 class="mb-5 heading-pricing ftco-animate">Drinks</h3>
        @foreach($drinks as $drink)
          <div class="pricing-entry d-flex ftco-animate">
            <div class="img" style="background-image: url('{{ asset('images/' . $drink->image) }}')"></div>

            <div class="desc pl-3">
              <div class="d-flex text align-items-center">
                <h3><span>{{ $drink->name }}</span></h3>
                <span class="price">${{ number_format((float) $drink->price, 2) }}</span>
              </div>

              <div class="d-block">
                <p>{{ $drink->description }}</p>
              </div>

              <form action="{{ route('cart.add', $drink->id) }}" method="POST" class="mt-2">
                @csrf
                <input type="hidden" name="quantity" value="1">
                <button class="btn btn-primary btn-sm">Add to Cart</button>
              </form>
            </div>
          </div>
        @endforeach
      </div>

      <div class="col-md-6">
        <h3 class="mb-5 heading-pricing ftco-animate">Starter</h3>
        @foreach($starters as $starter)
          <div class="pricing-entry d-flex ftco-animate">
            <div class="img" style="background-image: url('{{ asset('images/' . $starter->image) }}')"></div>
            <div class="desc pl-3">
              <div class="d-flex text align-items-center">
                <h3><span>{{ $starter->name }}</span></h3>
                <span class="price">${{ number_format((float) $starter->price, 2) }}</span>
              </div>
              <div class="d-block">
                <p>{{ $starter->description }}</p>
              </div>

              <form action="{{ route('cart.add', $starter->id) }}" method="POST" class="mt-2">
                @csrf
                <input type="hidden" name="quantity" value="1">
                <button class="btn btn-primary btn-sm">Add to Cart</button>
              </form>
            </div>
          </div>
        @endforeach
      </div>

      <div class="col-md-6">
        <h3 class="mb-5 heading-pricing ftco-animate">Main Dish</h3>
        @foreach($mainDishes as $mainDish)
          <div class="pricing-entry d-flex ftco-animate">
            <div class="img" style="background-image: url('{{ asset('images/' . $mainDish->image) }}')"></div>
            <div class="desc pl-3">
              <div class="d-flex text align-items-center">
                <h3><span>{{ $mainDish->name }}</span></h3>
                <span class="price">${{ number_format((float) $mainDish->price, 2) }}</span>
              </div>
              <div class="d-block">
                <p>{{ $mainDish->description }}</p>
              </div>

              <form action="{{ route('cart.add', $mainDish->id) }}" method="POST" class="mt-2">
                @csrf
                <input type="hidden" name="quantity" value="1">
                <button class="btn btn-primary btn-sm">Add to Cart</button>
              </form>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

<section class="ftco-menu mb-5 pb-5">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 heading-section text-center ftco-animate">
        <span class="subheading">Discover</span>
        <h2 class="mb-4">Our Products</h2>
        <p>
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
      </div>
    </div>

    <div class="row d-md-flex">
      <div class="col-lg-12 ftco-animate p-md-5">
        <div class="row">
          <div class="col-md-12 nav-link-wrap mb-5">
            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Coffee</a>
              <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Drinks</a>
              <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Desserts</a>
              <a class="nav-link" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="false">Main Dish</a>
            </div>
          </div>

          <div class="col-md-12 d-flex align-items-center">
            <div class="tab-content ftco-animate" id="v-pills-tabContent">

              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
                <div class="row">
                  @foreach($coffees as $coffee)
                    <div class="col-md-4 text-center">
                      <div class="menu-wrap">
                        <a href="{{ url('/products/' . $coffee->id) }}" class="menu-img img mb-4" style="background-image: url('{{ asset('images/' . $coffee->image) }}')"></a>
                        <div class="text">
                          <h3 class="text-dark">
                            <a href="{{ url('/products/' . $coffee->id) }}">{{ $coffee->name }}</a>
                          </h3>
                          <p>{{ $coffee->description }}</p>
                          <p class="price"><span>${{ number_format((float) $coffee->price, 2) }}</span></p>
                          <p>
                            <a href="{{ url('/products/' . $coffee->id) }}" class="btn btn-primary btn-outline-primary">Show</a>
                          </p>
                          <form action="{{ route('cart.add', $coffee->id) }}" method="POST" class="mt-2">
                            @csrf
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-primary btn-sm">Add to Cart</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>

              <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
                <div class="row">
                  @foreach($drinks as $drink)
                    <div class="col-md-4 text-center">
                      <div class="menu-wrap">
                        <a href="{{ url('/products/' . $drink->id) }}" class="menu-img img mb-4" style="background-image: url('{{ asset('images/' . $drink->image) }}')"></a>
                        <div class="text">
                          <h3 class="text-dark"><a href="{{ url('/products/' . $drink->id) }}">{{ $drink->name }}</a></h3>
                          <p>{{ $drink->description }}</p>
                          <p class="price"><span>${{ number_format((float) $drink->price, 2) }}</span></p>
                          <p>
                            <a href="{{ url('/products/' . $drink->id) }}" class="btn btn-primary btn-outline-primary">Show</a>
                          </p>
                          <form action="{{ route('cart.add', $drink->id) }}" method="POST" class="mt-2">
                            @csrf
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-primary btn-sm">Add to Cart</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>

              <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
                <div class="row">
                  @foreach($desserts as $dessert)
                    <div class="col-md-4 text-center">
                      <div class="menu-wrap">
                        <a href="{{ url('/products/' . $dessert->id) }}" class="menu-img img mb-4" style="background-image: url('{{ asset('images/' . $dessert->image) }}')"></a>
                        <div class="text">
                          <h3 class="text-dark"><a href="{{ url('/products/' . $dessert->id) }}">{{ $dessert->name }}</a></h3>
                          <p>{{ $dessert->description }}</p>
                          <p class="price"><span>${{ number_format((float) $dessert->price, 2) }}</span></p>
                          <p>
                            <a href="{{ url('/products/' . $dessert->id) }}" class="btn btn-primary btn-outline-primary">Show</a>
                          </p>
                          <form action="{{ route('cart.add', $dessert->id) }}" method="POST" class="mt-2">
                            @csrf
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-primary btn-sm">Add to Cart</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>

              <div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab">
                <div class="row">
                  @foreach($mainDishes as $mainDish)
                    <div class="col-md-4 text-center">
                      <div class="menu-wrap">
                        <a href="{{ url('/products/' . $mainDish->id) }}" class="menu-img img mb-4" style="background-image: url('{{ asset('images/' . $mainDish->image) }}')"></a>
                        <div class="text">
                          <h3 class="text-dark"><a href="{{ url('/products/' . $mainDish->id) }}">{{ $mainDish->name }}</a></h3>
                          <p>{{ $mainDish->description }}</p>
                          <p class="price"><span>${{ number_format((float) $mainDish->price, 2) }}</span></p>
                          <p>
                            <a href="{{ url('/products/' . $mainDish->id) }}" class="btn btn-primary btn-outline-primary">Show</a>
                          </p>
                          <form action="{{ route('cart.add', $mainDish->id) }}" method="POST" class="mt-2">
                            @csrf
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-primary btn-sm">Add to Cart</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>

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