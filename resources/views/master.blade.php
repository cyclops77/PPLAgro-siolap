<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <!-- Title -->
  <title>SIOLAP</title>
  <!-- Favicon -->
  <link rel="icon" href="{{('farm/img/core-img/siolap.ico')}}">
  <!-- Core Stylesheet -->
  <link rel="stylesheet" href="{{('farm/style.css')}}">
</head>

<body>
  <!-- Preloader -->
  <div class="preloader d-flex align-items-center justify-content-center">
    <div class="spinner"></div>
  </div>

  <!-- ##### Header Area Start ##### -->
  <header class="header-area">
    <!-- Top Header Area -->
    <div class="top-header-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="top-header-content d-flex align-items-center justify-content-between">
              <!-- Top Header Content -->
              <div class="top-header-meta">
                <p>Welcome to <span>SIOLAP</span>, we hope you will enjoy our products and have good experience</p>
              </div>
              <!-- Top Header Content -->
              <div class="top-header-meta text-right">
                <a href="https://mail.google.com/mail/u/0/?view=cm&fs=1&to=cs@siolap.com&su=&=BODY&&tf=1" data-toggle="tooltip" data-placement="bottom" title="cs@siolap.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span>Email: cs@siolap.com</span></a>
                <a href="#" data-toggle="tooltip" data-placement="bottom" title="+62 234 122 9000"><i class="fa fa-phone" aria-hidden="true"></i> <span>Call Us: +62 223 9000</span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Navbar Area -->
    <div class="famie-main-menu">
      <div class="classy-nav-container breakpoint-off">
        <div class="container">
          <!-- Menu -->
          <nav class="classy-navbar justify-content-between" id="famieNav">
            <!-- Nav Brand -->
            <a href="/" class="nav-brand"><img src="{{('farm/img/core-img/logo.png')}}" alt=""></a>
            <!-- Navbar Toggler -->
            <div class="classy-navbar-toggler">
              <span class="navbarToggler"><span></span><span></span><span></span></span>
            </div>
            <!-- Menu -->
            <div class="classy-menu">
              <!-- Close Button -->
              <div class="classycloseIcon">
                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
              </div>
              <!-- Navbar Start -->
              <div class="classynav">
                <ul>
                  <li class="active"><a href="#">Home</a></li>
                  <li><a href="about">About</a></li>
                  <li><a href="product">Our Product</a></li>
                  <li><a href="contact">Contact</a></li>
                  <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                  <li><a href="{{ url('/outlets/create') }}">{{ __('Daftar Mitra') }}</a></li>
                </ul>
                <!-- Search Icon -->
                
                <!-- Cart Icon -->
                
              <!-- Navbar End -->
            </div>
          </nav>

          <!-- Search Form -->
          <div class="search-form">
            <form action="#" method="get">
              <input type="search" name="search" id="search" placeholder="Type keywords &amp; press enter...">
              <button type="submit" class="d-none"></button>
            </form>
            <!-- Close Icon -->
            <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- ##### Header Area End ##### -->

  <!-- ##### Hero Area Start ##### -->
  <div class="hero-area">
    <div class="welcome-slides owl-carousel">

      <!-- Single Welcome Slides -->
      <div class="single-welcome-slides bg-img bg-overlay jarallax" style="background-image: url(farm/img/bg-img/2.jpg);">
        <div class="container h-100">
          <div class="row h-100 align-items-center">
            <div class="col-12 col-lg-10">
              <div class="welcome-content">
                <h2 data-animation="fadeInUp" data-delay="200ms">pertanian adalah pusat sejati alam semesta kita.</h2>
                <p data-animation="fadeInUp" data-delay="400ms">Siolap akan mempermudah kehidupan anda dalam mensukseskan pertanian</p>
                <a href="login" class="btn famie-btn mt-4" data-animation="bounceInUp" data-delay="600ms">LOGIN/Daftar Mitra</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Single Welcome Slides -->
      <div class="single-welcome-slides bg-img bg-overlay jarallax" style="background-image: url(farm/img/bg-img/7.jpg);">
        <div class="container h-100">
          <div class="row h-100 align-items-center">
            <div class="col-12 col-lg-10">
              <div class="welcome-content">
                <h2 data-animation="fadeInDown" data-delay="200ms">pertanian adalah pusat sejati alam semesta kita.</h2>
                <p data-animation="fadeInDown" data-delay="400ms">Siolap akan mempermudah kehidupan anda dalam mensukseskan pertanian</p>
                <a href="login" class="btn famie-btn mt-4" data-animation="bounceInDown" data-delay="600ms">LOGIN/Daftar Mitra</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- ##### Hero Area End ##### -->

  <!-- ##### Famie Benefits Area Start ##### -->
  <section class="famie-benefits-area section-padding-100-0 pb-5">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="benefits-thumbnail mb-50">
            <img src="{{('farm/img/bg-img/2.jpg')}}" alt="">
          </div>
        </div>
      </div>

      <div class="row justify-content-center">
        <!-- Single Benefits Area -->
        <div class="col-12 col-sm-4 col-lg">
          <div class="single-benefits-area wow fadeInUp mb-50" data-wow-delay="100ms">
            <img src="{{('farm/img/core-img/digger.png')}}" alt="">
            <h5>Service Terbaik</h5>
          </div>
        </div>

        <!-- Single Benefits Area -->
        <div class="col-12 col-sm-4 col-lg">
          <div class="single-benefits-area wow fadeInUp mb-50" data-wow-delay="300ms">
            <img src="{{('farm/img/core-img/windmill.png')}}" alt="">
            <h5>Pengalaman Bertani</h5>
          </div>
        </div>

        <!-- Single Benefits Area -->
        <div class="col-12 col-sm-4 col-lg">
          <div class="single-benefits-area wow fadeInUp mb-50" data-wow-delay="500ms">
            <img src="{{('farm/img/core-img/cereals.png')}}" alt="">
            <h5>100% Natural</h5>
          </div>
        </div>

        <!-- Single Benefits Area -->
        <div class="col-12 col-sm-4 col-lg">
          <div class="single-benefits-area wow fadeInUp mb-50" data-wow-delay="700ms">
            <img src="{{('farm/img/core-img/tractor.png')}}" alt="">
            <h5>Peralatan Pertanian</h5>
          </div>
        </div>

        <!-- Single Benefits Area -->
        <div class="col-12 col-sm-4 col-lg">
          <div class="single-benefits-area wow fadeInUp mb-50" data-wow-delay="900ms">
            <img src="{{('farm/img/core-img/sunrise.png')}}" alt="">
            <h5>Pertanian Organik</h5>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ##### Famie Benefits Area End ##### -->

  <!-- ##### About Us Area Start ##### -->
  <section class="about-us-area">
    <div class="container">
      <div class="row align-items-center">

        <!-- About Us Content -->
        <div class="col-12 col-md-8">
          <div class="about-us-content mb-100">
            <!-- Section Heading -->
            <div class="section-heading">
              <p>Tentang Kami</p>
              <h2><span>Biarkan Kami </span> Memberitahu Anda Kisah Kami</h2>
              <img src="{{('farm/img/core-img/decor.png')}}" alt="">
            </div>
            <p>Siolap adalah website penunjang keputusan dalam bidang pertanian dalam menenunjang pengetahuan mengenai keadaan cuaca </p>
            <a href="about" class="btn famie-btn mt-30">Lebih Lanjut</a>
          </div>
        </div>

        <!-- Famie Video Play -->
        

      </div>
    </div>
  </section>
  <!-- ##### About Us Area End ##### -->

  <!-- ##### Services Area Start ##### -->
  <section class="services-area d-flex flex-wrap">
    <!-- Service Thumbnail -->
    <div class="services-thumbnail bg-img jarallax" style="background-image: url('img/bg-img/7.jpg');"></div>

    <!-- Service Content -->
    
  </section>
  <!-- ##### Services Area End ##### -->

  <!-- ##### Our Products Area Start ##### -->
  <section class="our-products-area section-padding-100">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <!-- Section Heading -->
          <div class="section-heading text-center">
            <p>PRODUK UNGGULAN</p>
            <h2><span>Produk Kami </span> Adalah Produk Kualitas Tertinggi</h2>
            <img src="{{('farm/img/core-img/decor2.png')}}" alt="">
          </div>
        </div>
      </div>

      <div class="row">

        <!-- Single Product Area -->
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="single-product-area mb-50 wow fadeInUp" data-wow-delay="100ms">
            <!-- Product Thumbnail -->
            <div class="product-thumbnail">
              <img src="{{('farm/img/bg-img/p21.jpg')}}" alt="">
              <!-- Product Tags -->
              <span class="product-tags">Hot</span>
              <!-- Product Meta Data -->
              <div class="product-meta-data">
               </div>
            </div>
            <!-- Product Description -->
            <div class="product-desc text-center pt-4">
              <a href="#" class="product-title">Padi</a>
              <h6 class="price">Rp. 9.000</h6>
            </div>
          </div>
        </div>

        <!-- Single Product Area -->
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="single-product-area mb-50 wow fadeInUp" data-wow-delay="300ms">
            <!-- Product Thumbnail -->
            <div class="product-thumbnail">
              <img src="{{('farm/img/bg-img/p13.jpg')}}" alt="">
              <!-- Product Meta Data -->
              <div class="product-meta-data">
                </div>
            </div>
            <!-- Product Description -->
            <div class="product-desc text-center pt-4">
              <a href="#" class="product-title">Jagung</a>
              <h6 class="price">Rp. 9.000</h6>
            </div>
          </div>
        </div>

        <!-- Single Product Area -->
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="single-product-area mb-50 wow fadeInUp" data-wow-delay="500ms">
            <!-- Product Thumbnail -->
            <div class="product-thumbnail">
              <img src="{{('farm/img/bg-img/p18.jpg')}}" alt="">
              <!-- Product Meta Data -->
              <div class="product-meta-data">
                </div>
            </div>
            <!-- Product Description -->
            <div class="product-desc text-center pt-4">
              <a href="#" class="product-title">Tembakau</a>
              <h6 class="price">Rp. 9.000</h6>
            </div>
          </div>
        </div>

        <!-- Single Product Area -->
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="single-product-area mb-50 wow fadeInUp" data-wow-delay="700ms">
            <!-- Product Thumbnail -->
            <div class="product-thumbnail">
              <img src="{{('farm/img/bg-img/p24.jpg')}}" alt="">
              <!-- Product Tags -->
              <span class="product-tags bg-danger">Sale</span>
              <!-- Product Meta Data -->
              <div class="product-meta-data">
                </div>
            </div>
            <!-- Product Description -->
            <div class="product-desc text-center pt-4">
              <a href="#" class="product-title">Tebu</a>
              <h6 class="price"><span>Rp. 19.000</span> Rp. 9.000</h6>
            </div>
          </div>
        </div>

      </div>

      <div class="row">
        <div class="col-12">
          <div class="gotoshop-btn text-center wow fadeInUp" data-wow-delay="900ms">
            <a href="login" class="btn famie-btn">Belanja</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ##### Our Products Area End ##### -->

  <!-- ##### Newsletter Area Start ##### -->
  <!-- <section class="newsletter-area section-padding-100 bg-img bg-overlay jarallax" style="background-image: url('farm/img/bg-img/8.jpg');">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
          <div class="newsletter-content"> -->
            <!-- Section Heading -->
            <!-- <div class="section-heading white text-center">
              <p>What we do</p>
              <h2><span>Our Produce</span> Is Mainstay For Us</h2>
              <img src="{{('farm/img/core-img/decor2.png')}}" alt="">
            </div>
            <p class="text-white mb-50 text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam at diam convallis ligula cursus bibendum sed at enim. Class aptent taciti sociosqu ad litora torquent conubia nostra, per inceptos
              himenaeos.</p>
          </div>
        </div>
      </div> -->
      <!-- Newsletter Form -->
      <!-- <div class="row justify-content-center">
        <div class="col-12 col-lg-6">
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Enter your email">
            <button type="submit" class="btn famie-btn">Subscribe</button>
          </form>
        </div>
      </div>
    </div>
  </section> -->
  <!-- ##### Newsletter Area End ##### -->

  <!-- ##### Farming Practice Area Start ##### -->
  <!-- <section class="farming-practice-area section-padding-100-50">
    <div class="container">
      <div class="row">
        <div class="col-12"> -->
          <!-- Section Heading -->
          <!-- <div class="section-heading text-center">
            <p>Make the green world</p>
            <h2><span>Farming Practices</span> To Preserve Land & Water</h2>
            <img src="{{('farm/img/core-img/decor2.png')}}" alt="">
          </div>
        </div>
      </div>

      <div class="row"> -->

        <!-- Single Farming Practice Area -->
        

        <!-- Single Farming Practice Area -->
        <!-- <div class="col-12 col-sm-6 col-lg-4">
          
  </section> -->
  <!-- ##### Farming Practice Area End ##### -->

  <!-- ##### Testimonial Area Start ##### -->

  <!-- ##### Testimonial Area End ##### -->

  <!-- ##### Contact Area Start ##### -->
  <section class="contact-area section-padding-100-0">
    <div class="container">
      <div class="row justify-content-between">

        <!-- Contact Content -->
        <div class="col-12 col-lg-5">
          <div class="contact-content mb-100">
            <!-- Section Heading -->
            <!-- <div class="section-heading">
              <p>Hubungi Sekarang</p>
              <h2><span>Hubungi</span> Kami</h2>
              <img src="{{('farm/img/core-img/decor.png')}}" alt="">
            </div> -->
            <!-- Contact Form Area -->
            <!-- <div class="contact-form-area">
              <form action="index.html" method="post">
                <div class="row">
                  <div class="col-lg-6">
                    <input type="text" class="form-control" name="name" placeholder="Your Name">
                  </div>
                  <div class="col-lg-6">
                    <input type="email" class="form-control" name="email" placeholder="Your Email">
                  </div>
                  <div class="col-12">
                    <input type="text" class="form-control" name="subject" placeholder="Your Subject">
                  </div>
                  <div class="col-12">
                    <textarea name="message" class="form-control" cols="30" rows="10" placeholder="Your Message"></textarea>
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn famie-btn">Send Message</button>
                  </div> -->
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Contact Maps -->
        <!-- <div class="col-lg-6">
          <div class="contact-maps mb-100">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.3774298314147!2d113.71488451540361!3d-8.164675784074145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd694351d727e69%3A0xec33c34804a10832!2sUniversitas%20Jember!5e0!3m2!1sid!2sid!4v1569846419217!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!-- ##### Contact Area End ##### -->

  <!-- ##### News Area Start ##### -->
  <section class="news-area bg-gray section-padding-100-0">
    <div class="container">
      <div class="row">

        <!-- Featured Post Area -->
            <!-- Post Content -->
        <!-- Single Blog Area -->

          <!-- Single Blog Area -->
          
            <!-- Post Content -->
            
          </div>

          <!-- Single Blog Area -->

            <!-- Post Content -->
          <!-- Single Blog Area -->
            <!-- Post Content -->

        </div>
  </section>
  <!-- ##### News Area End ##### -->

  <!-- ##### Footer Area Start ##### -->
  <footer class="footer-area">
    <!-- Main Footer Area -->
    <div class="main-footer bg-img bg-overlay section-padding-80-0" style="background-image: url(farm/img/bg-img/3.jpg);">
      <div class="container">
        <div class="row">

          <!-- Single Footer Widget Area -->
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="footer-widget mb-80">
              <a href="/" class="foo-logo d-block mb-30"><img src="{{('farm/img/core-img/logo.png')}}" alt=""></a>
              <div class="contact-info">
                <p><i class="fa fa-map-pin" aria-hidden="true"></i><span>Kalimantam, Jember</span></p>
                <p><i class="fa fa-envelope" aria-hidden="true"></i><span>cs@siolap.com</span></p>
                <p><i class="fa fa-phone" aria-hidden="true"></i><span>+62 223 9000</span></p>
              </div>
            </div>
          </div>

          <!-- Single Footer Widget Area -->
          
              <!-- Footer Widget Nav -->
              

          <!-- Single Footer Widget Area -->
          

              <!-- Single Recent News Start -->
              

              <!-- Single Recent News Start -->
              

          <!-- Single Footer Widget Area -->
          <!-- <div class="col-12 col-sm-6 col-lg-3">
            <div class="footer-widget mb-80">
              <h5 class="widget-title">STAY CONNECTED</h5> -->
              <!-- Footer Social Info -->
              <!-- <div class="footer-social-info">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                  <span>Facebook</span>
                </a>
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                  <span>Twitter</span>
                </a>
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                  <span>Instagram</span>
                </a>
              </div> -->
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- Copywrite Area  -->
    <div class="copywrite-area">
      <div class="container">
        <div class="copywrite-text">
          <div class="row align-items-center">
            <div class="col-md-6">
              <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | by <a href="/" target="_blank">SIOLAP</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
            </div>
            <div class="col-md-6">
              <div class="footer-nav">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- ##### Footer Area End ##### -->

  <!-- ##### All Javascript Files ##### -->
  <!-- jquery 2.2.4  -->
  <script src="{{('farm/js/jquery.min.js')}}"></script>
  <!-- Popper js -->
  <script src="{{('farm/js/popper.min.js')}}"></script>
  <!-- Bootstrap js -->
  <script src="{{('farm/js/bootstrap.min.js')}}"></script>
  <!-- Owl Carousel js -->
  <script src="{{('farm/js/owl.carousel.min.js')}}"></script>
  <!-- Classynav -->
  <script src="{{('farm/js/classynav.js')}}"></script>
  <!-- Wow js -->
  <script src="{{('farm/js/wow.min.js')}}"></script>
  <!-- Sticky js -->
  <script src="{{('farm/js/jquery.sticky.js')}}"></script>
  <!-- Magnific Popup js -->
  <script src="{{('farm/js/jquery.magnific-popup.min.js')}}"></script>
  <!-- Scrollup js -->
  <script src="{{('farm/js/jquery.scrollup.min.js')}}"></script>
  <!-- Jarallax js -->
  <script src="{{('farm/js/jarallax.min.js')}}"></script>
  <!-- Jarallax Video js -->
  <script src="{{('farm/js/jarallax-video.min.js')}}"></script>
  <!-- Active js -->
  <script src="{{('farm/js/active.js')}}"></script>
</body>

</html>