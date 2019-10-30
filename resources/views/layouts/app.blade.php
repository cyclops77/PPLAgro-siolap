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
</head>
<body>
<div id="app">
<nav class="navbar navbar-expand-md navbar-light navbar-dark bg-dark">
<div class="container">
<a class="navbar-brand" href="{{ url('/') }}">
SIOLAP
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
<!-- Left Side Of Navbar -->
<!-- <ul class="navbar-nav mr-auto">
<li class="nav-item"><a href="https://github.com/nafiesl/laravel-leaflet-example" class="btn btn-outline-primary btn-sm" target="_blank">Source code</a></li>
</ul> -->

<!-- Right Side Of Navbar -->
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
<!-- Authentication Links -->
<li class="nav-item" style="display:{{Auth::user()->role=="petani" ? "block" : "none"}}"><a class="nav-link" href="/rekomendasi-tanam">Rekomendasi Tanam</a></li>  
<li class="nav-item" style="display:{{Auth::user()->role=="mitra" ? "block" : "none"}}"><a class="nav-link" href="/sedang-dikirim">Sedang Dikirim</a></li>  
<li class="nav-item" style="display:{{Auth::user()->role=="admin" ? "block" : "none"}}"><a class="nav-link" href="/kirim-barang">Pengiriman</a></li>  
<li class="nav-item" style="display:{{Auth::user()->role=="admin" ? "block" : "none"}}"><a class="nav-link" href="/akun-petani">Akun Petani</a></li>  
<li class="nav-item" style="display:{{Auth::user()->role=="petani" ? "block" : "none"}}"><a class="nav-link" href="/pasarkan-produk">Pasarkan Produk Saya</a></li>    

<li class="nav-item" style="display: {{Auth::user()->role=="mitra" ? "block" : "none"}}"><a class="nav-link" href="/pembayaran">Pembayaran</a></li>
<li class="nav-item" style="display:{{Auth::user()->role=="mitra" ? "block" : "none"}}"><a class="nav-link" href="/barang">Barang</a></li>
<!-- <li class="nav-item" style="display:{{Auth::user()->role=="admin" ? "block" : "none"}}"><a class="nav-link" href="/verif-transaksi">Transaksi</a></li> -->

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
</nav>

<main class="py-4 container">
@yield('content')
</main>
@include('layouts.partials.footer')
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('js')
@stack('scripts')
</body>
</html>
