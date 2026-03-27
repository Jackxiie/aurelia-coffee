<footer class="ftco-footer ftco-section img">
  <div class="overlay"></div>
  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">About Us</h2>
          <p>
            At Aurelia Coffee, we believe that great coffee is more than just a drink — it’s an experience. 
            From carefully selected beans to expertly crafted brews, every cup is made with passion and attention to detail. 

            Our space is designed to bring comfort, inspiration, and connection, whether you're here to relax, work, or enjoy moments with friends. 
            We are dedicated to delivering not only exceptional taste, but also a warm and memorable atmosphere for everyone who walks through our doors.
          </p>
          <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
            <li class="ftco-animate">
              <a href="#"><span class="icon-twitter"></span></a>
            </li>
            <li class="ftco-animate">
              <a href="#"><span class="icon-facebook"></span></a>
            </li>
            <li class="ftco-animate">
              <a href="#"><span class="icon-instagram"></span></a>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Recent Blog</h2>

          <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url('{{ asset('images/image_1.jpg') }}')"></a>
            <div class="text">
              <h3 class="heading">
                <a href="#">Even the all-powerful Pointing has no control about</a>
              </h3>
              <div class="meta">
                <div>
                  <a href="#"><span class="icon-calendar"></span> Dec 01, 2025</a>
                </div>
                <div>
                  <a href="#"><span class="icon-person"></span> Admin</a>
                </div>
                <div>
                  <a href="#"><span class="icon-chat"></span> 19</a>
                </div>
              </div>
            </div>
          </div>

          <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url('{{ asset('images/image_2.jpg') }}')"></a>
            <div class="text">
              <h3 class="heading">
                <a href="#">Even the all-powerful Pointing has no control about</a>
              </h3>
              <div class="meta">
                <div>
                  <a href="#"><span class="icon-calendar"></span> Dec 01, 2025</a>
                </div>
                <div>
                  <a href="#"><span class="icon-person"></span> Admin</a>
                </div>
                <div>
                  <a href="#"><span class="icon-chat"></span> 19</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
        <div class="ftco-footer-widget mb-4 ml-md-4">
          <h2 class="ftco-heading-2">Services</h2>
          <ul class="list-unstyled">
            <li><a href="#" class="py-2 d-block">Cooked</a></li>
            <li><a href="#" class="py-2 d-block">Deliver</a></li>
            <li><a href="#" class="py-2 d-block">Quality Foods</a></li>
            <li><a href="#" class="py-2 d-block">Mixed</a></li>
          </ul>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Have a Questions?</h2>
          <div class="block-23 mb-3">
            <ul>
              <li>
                <span class="icon icon-map-marker"></span>
                <span class="text">459 Ton Duc Thang. Hoa Khanh Nam, Lien Chieu, Danang, Vietnam</span>
              </li>
              <li>
                <a href="#"><span class="icon icon-phone"></span><span class="text">+84 094 8213 961</span></a>
              </li>
              <li>
                <a href="#"><span class="icon icon-envelope"></span><span class="text">Xaypanyavx@gmail.com</span></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 text-center">
        <p>
          &copy; 2026 All rights reserved | Made with
          <i class="icon-heart" aria-hidden="true"></i> by AURELIA COFEE
        </p>
      </div>
    </div>
  </div>
</footer>

<div id="ftco-loader" class="show fullscreen">
  <svg class="circular" width="48px" height="48px">
    <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
    <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
  </svg>
</div>

<script>
  $(document).ready(function() {
    var quantitiy = 0;

    $(".quantity-right-plus").click(function(e) {
      e.preventDefault();
      var quantity = parseInt($("#quantity").val());
      $("#quantity").val(quantity + 1);
    });

    $(".quantity-left-minus").click(function(e) {
      e.preventDefault();
      var quantity = parseInt($("#quantity").val());

      if (quantity > 0) {
        $("#quantity").val(quantity - 1);
      }
    });
  });
</script>