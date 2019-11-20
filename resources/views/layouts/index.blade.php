<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SIOLAP</title>
  <link rel="icon" href="{{asset('stylers/img/Fevicon.png')}}" type="image/png">
  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="{{asset('stylers/vendors/bootstrap/bootstrap.min.css')}}">
  <!-- <link rel="stylesheet" href="{{asset('stylers/vendors/fontawesome/css/all.min.css')}}"> -->
  <link rel="stylesheet" href="{{asset('stylers/vendors/themify-icons/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('stylers/vendors/linericon/style.css')}}">
  <link rel="stylesheet" href="{{asset('stylers/vendors/owl-carousel/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('stylers/vendors/owl-carousel/owl.carousel.min.css')}}">

  <link rel="stylesheet" href="{{asset('stylers/css/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('stylers/outer/vendor/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('stylers/outer/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('stylers/outer/vendor/animate/animate.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('stylers/outer/vendor/select2/select2.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('stylers/outer/vendor/perfect-scrollbar/perfect-scrollbar.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('stylers/outer/css/util.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('stylers/outer/css/main.css')}}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#myModal").modal();
  });
</script>
@yield('styles')

@yield('script')
</head>
<body>
  
  <!--================Header Menu Area =================-->
  <header class="header_area" style="z-index: 9999">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="{{url('/')}}" style="font-size: 30px; color: white;">SIOLAP</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-end">

              @auth
              <li class="nav-item active">
                <a class="nav-link" href="/"><strong>Beranda</strong></a>
              </li> 
              <li class="nav-item"><a class="nav-link" href="{{url('/profile')}}">Profil Saya</a></li> 
              @endauth
            </ul>

            
            <ul class="navbar-right">
              <li class="nav-item">
            @auth
                <a class="button button-header bg" href="/logout" style="margin-top: 15px">Logout</a>
            @endauth
            @guest
                <a class="button button-header bg" href="/login" style="margin-top: 15px">Login</a>            
            @endguest
              </li>
            </ul>
            <ul class="navbar-right">
              <li class="nav-item">
                <a class="button button-header bg" href="{{ url('/outlets/create') }}" style="margin-top: 15px">Daftar Mitra</a>            
              </li> 
            </ul>

          </div> 
        </div>
      </nav>
    </div>
  </header>
  <!--================Header Menu Area =================-->
@yield('content')

  <!-- ================ start footer Area ================= -->
  <footer class="footer-area section-gap mt-4">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                    <h4>Top Products</h4>
                    <ul>
                        <li><a href="#">Managed Website</a></li>
                        <li><a href="#">Manage Reputation</a></li>
                        <li><a href="#">Power Tools</a></li>
                        <li><a href="#">Marketing Service</a></li>
                    </ul>
                </div>
                <div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#">Jobs</a></li>
                        <li><a href="#">Brand Assets</a></li>
                        <li><a href="#">Investor Relations</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                    <h4>Features</h4>
                    <ul>
                        <li><a href="#">Jobs</a></li>
                        <li><a href="#">Brand Assets</a></li>
                        <li><a href="#">Investor Relations</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                    <h4>Resources</h4>
                    <ul>
                        <li><a href="#">Guides</a></li>
                        <li><a href="#">Research</a></li>
                        <li><a href="#">Experts</a></li>
                        <li><a href="#">Agencies</a></li>
                    </ul>
                </div>
                <div class="col-xl-4 col-md-8 mb-4 mb-xl-0 single-footer-widget">
                    <h4>Newsletter</h4>
                    <p>You can trust us. we only send promo offers,</p>
                    <div class="form-wrap" id="mc_embed_signup">
                        <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                         method="get" class="form-inline">
                            <input class="form-control" name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '"
                             required="" type="email">
                            <button class="click-btn btn btn-default">subscribe</button>
                            <div style="position: absolute; left: -5000px;">
                                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                            </div>

                            <div class="info"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="footer-bottom row align-items-center text-center text-lg-left">
                <p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                <div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-dribbble"></i></a>
                    <a href="#"><i class="fab fa-behance"></i></a>
                </div>
            </div>
        </div>
    </footer>
  <!-- ================ End footer Area ================= -->

  <script src="{{asset('stylers/vendors/jquery/jquery-3.2.1.min.js')}}"></script>
  <script src="{{asset('stylers/vendors/bootstrap/bootstrap.bundle.min.j')}}"></script>
  <script src="{{asset('stylers/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('stylers/js/jquery.ajaxchimp.min.js')}}"></script>
  <script src="{{asset('stylers/js/mail-script.js')}}"></script>
  <script src="{{asset('stylers/js/main.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>