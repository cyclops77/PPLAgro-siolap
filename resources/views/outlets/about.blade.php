<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <!-- Title -->
  <title>SIOLAP | About</title>
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
                <a href="#" data-toggle="tooltip" data-placement="bottom" title="cs@siolap.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span>Email: cs@siolap.com</span></a>
                <a href="#" data-toggle="tooltip" data-placement="bottom" title="+62 223 9000"><i class="fa fa-phone" aria-hidden="true"></i> <span>Call Us: +62 223 9000</span></a>
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
                  <li><a href="/">Home</a></li>
                  <li class="active"><a href="#">About</a></li>
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

  <!-- ##### Breadcrumb Area Start ##### -->
  <div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url('farm/img/bg-img/18.jpg');">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <div class="breadcrumb-text">
            <h2>About Us</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="famie-breadcrumb">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">About</li>
        </ol>
      </nav>
    </div>
  </div>
  <!-- ##### Breadcrumb Area End ##### -->

  <!-- ##### Famie Benefits Area Start ##### -->
  <section class="famie-benefits-area pb-5">
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
            <h5>Best Services</h5>
          </div>
        </div>

        <!-- Single Benefits Area -->
        <div class="col-12 col-sm-4 col-lg">
          <div class="single-benefits-area wow fadeInUp mb-50" data-wow-delay="300ms">
            <img src="{{('farm/img/core-img/windmill.png')}}" alt="">
            <h5>Farm Experiences</h5>
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
            <h5>Farm Equipment</h5>
          </div>
        </div>

        <!-- Single Benefits Area -->
        <div class="col-12 col-sm-4 col-lg">
          <div class="single-benefits-area wow fadeInUp mb-50" data-wow-delay="900ms">
            <img src="{{('farm/img/core-img/sunrise.png')}}" alt="">
            <h5>Organic food</h5>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ##### Famie Benefits Area End ##### -->
  <section class="about-us-area">
    <div class="container">
      <div class="row align-items-center"> -->

        <!-- About Us Content -->
        <div class="col-12 col-md-8">
          <div class="about-us-content mb-100">
            <!-- Section Heading -->
            <div class="section-heading">
              <p>Tentang Kami</p>
              <h2><span>Biarkan Kami</span> Memberitahu Anda Lokasi kami</h2>
              <img src="{{('farm/img/core-img/decor.png')}}" alt="">
            </div>
            
            <div id="mapid"></div>
</div>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>
<style>
    #mapid { height: 480px; }
</style>
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>
<script>
    var mymap = L.map('mapid').setView([-8.241614827740, 113.59967350959], 12);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(mymap);

    L.marker([-8.241614827740, 113.59967350959]).addTo(mymap)
        .bindPopup('<img src="product_image/082527400_1516006585-PILIH_GABAH_TERBAIK-Muhamad_Ridlo.jpeg" style="width: 200px; "><br><b>Kantor Pusat SIOLAP</b><br> Rambipuji')
	    .openPopup();

	// L.marker([-8.225082205615, 113.57803344726]).addTo(mymap)
 //        .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
	//     .openPopup();    
</script>

          </div>
        </div>

  <!-- ##### About Us Area Start ##### -->
  <!-- <section class="about-us-area">
    <div class="container">
      <div class="row align-items-center"> -->

        <!-- About Us Content -->
        <!-- <div class="col-12 col-md-8">
          <div class="about-us-content mb-100"> -->
            <!-- Section Heading -->
            <!-- <div class="section-heading">
              <p>Tentang Kami</p>
              <h2><span>Biarkan Kami</span> Memberitahu Anda Kisah Kami</h2>
              <img src="{{('farm/img/core-img/decor.png')}}" alt="">
            </div>
            <p>SIOLAP adalah website penunjang keputusan dalam bidang pertanian dalam menenunjang pengetahuan mengenai keadaan cuaca</p>
            
          </div>
        </div> -->

        <!-- Famie Video Play -->
        <!-- <div class="col-12 col-md-4">
          <div class="famie-video-play mb-100">
            <img src="{{('farm/img/bg-img/46.jpg')}}" alt=""> -->
            <!-- Play Icon -->
            <!-- <a href="https://www.youtube.com/watch?v=BpUNGMhceEc" class="play-icon"><i class="fa fa-play"></i></a>
          </div>
        </div>

      </div>
    </div>
  </section> -->
  <!-- ##### About Us Area End ##### -->

    <div class="container">
      <div class="row">
        <div class="col-12">
          <!-- Section Heading -->
          <div class="section-heading text-center">
            <p>MEET OUR TEAM</p>
            <h2><span>TIM HEBAT</span> Akan Selalu Membantu Anda</h2>
            <img src="{{('farm/img/core-img/decor2.png')}}" alt="">
          </div>
        </div>
      </div>

      <div class="row">

        <!-- Single Team Member -->
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="single-team-member mb-100 wow fadeInUp" data-wow-delay="100ms">
            <!-- Team Thumbnail -->
			  
            <div class="team-img">
              <img src="{{('farm/img/bg-img/42.jpg')}}" alt="">
              <!-- Social Info -->
              <div class="team-social-info">
                <a href="#" data-toggle="tooltip" data-placement="right" title="Facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" data-toggle="tooltip" data-placement="right" title="Twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" data-toggle="tooltip" data-placement="right" title="instagram"><i class="fa fa-instagram"></i></a>
              </div>
            </div>
            <!-- Team Member Info -->
            <div class="team-member-info">
              <h5>TRI</h5>
              <h6>Project Manager</h6>
            </div>
          </div>
        </div>

        <!-- Single Team Member -->
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="single-team-member mb-100 wow fadeInUp" data-wow-delay="300ms">
            <!-- Team Thumbnail -->
            <div class="team-img">
              <img src="{{('farm/img/bg-img/41.jpg')}}" alt="">
              <!-- Social Info -->
              <div class="team-social-info">
                <a href="#" data-toggle="tooltip" data-placement="right" title="Facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" data-toggle="tooltip" data-placement="right" title="Twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" data-toggle="tooltip" data-placement="right" title="instagram"><i class="fa fa-instagram"></i></a>
              </div>
            </div>
            <!-- Team Member Info -->
            <div class="team-member-info">
              <h5>AYU</h5>
              <h6>Analyst</h6>
            </div>
          </div>
        </div>

        <!-- Single Team Member -->
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="single-team-member mb-100 wow fadeInUp" data-wow-delay="500ms">
            <!-- Team Thumbnail -->
            <div class="team-img">
              <img src="{{('farm/img/bg-img/44.jpg')}}" alt="">
              <!-- Social Info -->
              <div class="team-social-info">
                <a href="#" data-toggle="tooltip" data-placement="right" title="Facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" data-toggle="tooltip" data-placement="right" title="Twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" data-toggle="tooltip" data-placement="right" title="instagram"><i class="fa fa-instagram"></i></a>
              </div>
            </div>
            <!-- Team Member Info -->
            <div class="team-member-info">
              <h5>IZZUL</h5>
              <h6>Designer</h6>
            </div>
          </div>
        </div>

        <!-- Single Team Member -->
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="single-team-member mb-100 wow fadeInUp" data-wow-delay="700ms">
            <!-- Team Thumbnail -->
            <div class="team-img">
              <img src="{{('farm/img/bg-img/43.jpg')}}" alt="">
              <!-- Social Info -->
              <div class="team-social-info">
                <a href="#" data-toggle="tooltip" data-placement="right" title="Facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" data-toggle="tooltip" data-placement="right" title="Twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" data-toggle="tooltip" data-placement="right" title="instagram"><i class="fa fa-instagram"></i></a>
              </div>
            </div>
            <!-- Team Member Info -->
            <div class="team-member-info">
              <h5>HADI</h5>
              <h6>Programmer</h6>
            </div>
          </div>
        </div>
		  
		  <!-- Single Team Member -->
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="single-team-member mb-100 wow fadeInUp" data-wow-delay="700ms">
            <!-- Team Thumbnail -->
            <div class="team-img">
              <img src="{{('farm/img/bg-img/45.jpg')}}" alt="">
              <!-- Social Info -->
              <div class="team-social-info">
                <a href="#" data-toggle="tooltip" data-placement="right" title="Facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" data-toggle="tooltip" data-placement="right" title="Twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" data-toggle="tooltip" data-placement="right" title="instagram"><i class="fa fa-instagram"></i></a>
              </div>
            </div>
            <!-- Team Member Info -->
            <div class="team-member-info">
              <h5>ALFIAN</h5>
              <h6>Programmer</h6>
            </div>
          </div>
        </div>

		  <!-- Single Team Member -->
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="single-team-member mb-100 wow fadeInUp" data-wow-delay="700ms">
            <!-- Team Thumbnail -->
            <div class="team-img">
              <img src="{{('farm/img/bg-img/40.jpg')}}" alt="">
              <!-- Social Info -->
              <div class="team-social-info">
                <a href="#" data-toggle="tooltip" data-placement="right" title="Facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" data-toggle="tooltip" data-placement="right" title="Twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" data-toggle="tooltip" data-placement="right" title="instagram"><i class="fa fa-instagram"></i></a>
              </div>
            </div>
            <!-- Team Member Info -->
            <div class="team-member-info">
              <h5>TITANIA</h5>
              <h6>Tester</h6>
            </div>
          </div>
        </div>
		  
      </div>
    </div>
  </section>
  <!-- ##### Team Member Area End ##### -->

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
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="footer-widget mb-80">
              <h5 class="widget-title">STAY CONNECTED</h5>
              <!-- Footer Social Info -->
              <div class="footer-social-info">
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
                  <span>instagram</span>
                </a>
              </div>
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