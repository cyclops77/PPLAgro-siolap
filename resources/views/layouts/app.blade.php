<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>
@yield('judul')
</title>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@yield('styles')
<link rel="icon" href="{{('farm/img/core-img/siolap.ico')}}">
  <!-- Core Stylesheet -->
  <link rel="stylesheet" href="{{asset('farm/style.css')}}">
</head>
<body>
<nav class="classy-navbar justify-content-between" id="famieNav">
            <!-- Nav Brand -->
            <a href="home" class="nav-brand"><img src="{{asset('farm/img/core-img/logo.png')}}" alt=""></a>
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
                @guest
                 <li class="nav-item">
                    <a class="nav-link" href="/">HOME</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href=about>ABOUT</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="product">OUR PRODUCT</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact">CONTACT</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link btn btn-outline-primary btn-sm" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>

                <li class="nav-item">
                    @if (Route::has('register'))
                    
                    @endif
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/outlets/create') }}">{{ __('Daftar Mitra') }}</a>
                </li>
                @else

                @if(Auth::user()->role=="mitra")
                    <li ><a class="nav-link" href="/sedang-dikirim">Sedang Dikirim</a></li>  
                    <li ><a class="nav-link" href="/pembayaran">Pembayaran</a></li>
                    <li ><a class="nav-link" href="/barang">Barang</a></li>
                    <li ><a class="nav-link" href="/notifikasi">Notif</a></li>
                    <li ><a class="nav-link" href="/outlets">Info Saya</a></li>
                    <li ><a class="nav-link" href="/status-barang">Status</a></li>
                    
                @endif
                
                @if(Auth::user()->role=="petani")
                <li><a class="nav-link" href="/optimasi-lahan">Optimasi Lahan</a></li>  
                <li><a class="nav-link" href="/rekomendasi-tanam">Rekomendasi Tanam</a></li>  
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Produk <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{url('/pasarkan-produk')}}">
                            Pasarkan Produk
                        </a>
                    
                        <a class="dropdown-item" href="{{ url('/produk') }}">
                            Kelola Produk
                        </a>
                        <a class="dropdown-item" href="{{ url('/pembelian-produk') }}">
                            Pembelian
                        </a>

                    </div>
                </li>  
                <li><a class="nav-link" href="/notifikasi-pemasaran">Notifikasi</a></li> 
             
                @endif
                
                @if(Auth::user()->role=="admin")
                <li ><a class="nav-link" href="/kirim-barang">Pengiriman</a></li>  
                <li ><a class="nav-link" href="/akun-petani">Akun Petani</a></li> 

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Transaksi <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{url('/verif-transaksi')}}">
                            Verifikasi Transaksi
                        </a>
                    
                        <a class="dropdown-item" href="{{ url('/refresh-transaksi') }}">
                            Refresh Transaksi
                        </a>

                    </div>
                </li>
                
                
                <li>
                    <a class="nav-link" href="{{Auth::user()->role=="admin" ? "/verif-harga" : ""}}">Verif Harga</a>
                </li>
                @endif 

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Akun <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item">
                            {{ Auth::user()->name }}
                        </a>
                        <a class="dropdown-item">
                            {{ Auth::user()->role }}
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Keluar') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                  @endguest
                </ul>
                <!-- Search Icon -->
              <!-- Navbar End -->
            </div>
          </nav>

<div id="app">

        <div class="container">
          <!-- Menu -->
          <br>
          @yield('content')
          <!-- Search Form -->
        </div>
</div>
<!-- <nav class="navbar navbar-expand-md navbar-light navbar-dark bg-dark">
<div class="container">
<a class="navbar-brand" href="{{ url('/') }}">
SIOLAP
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">

<ul class="navbar-nav ml-auto">

@guest
<li class="nav-item">
    <a class="nav-link btn btn-outline-primary btn-sm" href="{{ route('login') }}">{{ __('Login') }}</a>
</li>

<li class="nav-item">
    @if (Route::has('register'))
       
    @endif
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ url('/outlets/create') }}">{{ __('Daftar Mitra') }}</a>
</li>
@else

<li class="nav-item" style="display:{{Auth::user()->role=="petani" ? "block" : "none"}}"><a class="nav-link" href="/optimasi-lahan">Optimasi Lahan</a></li>  
<li class="nav-item" style="display:{{Auth::user()->role=="petani" ? "block" : "none"}}"><a class="nav-link" href="/rekomendasi-tanam">Rekomendasi Tanam</a></li>  
<li class="nav-item" style="display:{{Auth::user()->role=="mitra" ? "block" : "none"}}"><a class="nav-link" href="/sedang-dikirim">Sedang Dikirim</a></li>  
<li class="nav-item" style="display:{{Auth::user()->role=="admin" ? "block" : "none"}}"><a class="nav-link" href="/kirim-barang">Pengiriman</a></li>  
<li class="nav-item" style="display:{{Auth::user()->role=="admin" ? "block" : "none"}}"><a class="nav-link" href="/akun-petani">Akun Petani</a></li>  
<li class="nav-item" style="display:{{Auth::user()->role=="petani" ? "block" : "none"}}"><a class="nav-link" href="/pasarkan-produk">Pasarkan Produk Saya</a></li>    
<li class="nav-item" style="display:{{Auth::user()->role=="petani" ? "block" : "none"}}"><a class="nav-link" href="/notifikasi-pemasaran">Notifikasi</a></li>   
<li class="nav-item" style="display: {{Auth::user()->role=="mitra" ? "block" : "none"}}"><a class="nav-link" href="/pembayaran">Pembayaran</a></li>
<li class="nav-item" style="display:{{Auth::user()->role=="mitra" ? "block" : "none"}}"><a class="nav-link" href="/barang">Barang</a></li>


<li class="nav-item dropdown" style="display:{{Auth::user()->role=="admin" ? "block" : "none"}}">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Transaksi <span class="caret"></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="{{url('/verif-transaksi')}}">
            Verifikasi Transaksi
        </a>
       
        <a class="dropdown-item" href="{{ url('/refresh-transaksi') }}">
            Refresh Transaksi
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</li>


<li class="nav-item" style="display:{{Auth::user()->role=="mitra" ? "block" : "none"}}"><a class="nav-link" href="/notifikasi">Notif</a></li>
<li class="nav-item" style="display:{{Auth::user()->role=="mitra" ? "block" : "none"}}"><a class="nav-link" href="/outlets">Info Saya</a></li>
<li class="nav-item" style="display:{{Auth::user()->role=="mitra" ? "block" : "none"}}"><a class="nav-link" href="/status-barang">Status</a></li>
<li class="nav-item" style="display: {{Auth::user()->role=="admin" ? "block" : "none"}}">
    <a class="nav-link" href="{{Auth::user()->role=="admin" ? "/verif-harga" : ""}}">Verif Harga</a>
</li>


<li class="nav-item" style="display: {{Auth::user()->role=="petani" ? "block" : "none"}}">
    <a class="nav-link" href="{{Auth::user()->role=="petani" ? "/produk" : ""}}">Produk</a>
</li>


<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Akun <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item">
            {{ Auth::user()->name }}
        </a>
        <a class="dropdown-item">
            {{ Auth::user()->role }}
        </a>
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Keluar') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</li>
@endguest
</ul>
</div>
</div>
</nav> -->
</br>

<main class="py-4 container">


</main>
@include('layouts.partials.footer')
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('js')
@stack('scripts')
</body>
</html>
