@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-22">
            <div class="card">
                <div class="card-header">Dashboard</div>
               
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>

                @if(Auth::user()->role=="mitra")
                <div class="row row-cols-1 row-cols-md-3">
                    <div class="col mb-4">
                    <a href="/sedang-dikirim" ><div class="card h-100">
                            <img src="{{asset('farm/img/bg-img/46.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Sedang Dikirim</h5>
                                <p class="card-text"></p>
                            </div>
                        </div></a>
                    </div>
                    <div class="col mb-4">
                    <a href="/pembayaran" ><div class="card h-100">
                            <img src="{{asset('farm/img/bg-img/47.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"> Pembayaran</h5>
                                <p class="card-text"></p>
                            </div>
                        </div></a>
                    </div>
                    <div class="col mb-4">
                    <a href="/barang" ><div class="card h-100">
                            <img src="{{asset('farm/img/bg-img/18.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Barang</h5>
                                <p class="card-text"></p>
                            </div>
                        </div></a>
                    </div>
                    </div>
                <div class="row row-cols-2 row-cols-md-3">
                    <div class="col mb-4">
                    <a href="/notifikasi" ><div class="card h-100">
                            <img src="{{asset('farm/img/bg-img/48.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Notif</h5>
                                <p class="card-text"></p>
                            </div>
                        </div></a>
                    </div>
                    <div class="col mb-4">
                    <a href="/outlets" ><div class="card h-100">
                            <img src="{{asset('farm/img/bg-img/47.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Info Saya</h5>
                                <p class="card-text"></p>
                            </div>
                        </div></a>
                    </div>
                    <div class="col mb-4">
                    <a href="/status-barang" ><div class="card h-100">
                            <img src="{{asset('farm/img/bg-img/47.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Status</h5>
                                <p class="card-text"></p>
                            </div>
                        </div></a>
                    </div>
                </div>
                </div>
                </div>
                @endif
                
                @if(Auth::user()->role=="petani")
                <div class="row row-cols-1 row-cols-md-3">
                    <div class="col mb-4">
                    <a href="/optimasi-lahan" ><div class="card h-100">
                            <img src="{{asset('farm/img/bg-img/49.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Optimasi Lahan</h5>
                                <p class="card-text"></p>
                            </div>
                        </div></a>
                    </div>
                    <div class="col mb-4">
                    <a href="/rekomendasi-tanam" ><div class="card h-100">
                            <img src="{{asset('farm/img/bg-img/49.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Rekomendasi Tanam</h5>
                                <p class="card-text"></p>
                            </div>
                        </div></a>
                    </div>
                    <div class="col mb-4">
                    <a href="{{url('/pasarkan-produk')}}" ><div class="card h-100">
                            <img src="{{asset('farm/img/bg-img/47.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Pasarkan Produk</h5>
                                <p class="card-text"></p>
                            </div>
                        </div></a>
                    </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-3">
                    <div class="col mb-4">
                    <a href="{{ url('/produk') }}" ><div class="card h-100">
                            <img src="{{asset('farm/img/bg-img/47.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Kelola Produk</h5>
                                <p class="card-text"></p>
                            </div>
                        </div></a>
                    </div>
                    <div class="col mb-4">
                    <a href="{{ url('/pembelian-produk') }}}" ><div class="card h-100">
                            <img src="{{asset('farm/img/bg-img/47.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"> Pembelian</h5>
                                <p class="card-text"></p>
                            </div>
                        </div></a>
                    </div>
                    <div class="col mb-4">
                    <a href="/notifikasi-pemasaran" ><div class="card h-100">
                            <img src="{{asset('farm/img/bg-img/48.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Notifikasi</h5>
                                <p class="card-text"></p>
                            </div>
                        </div></a>
                    </div>
                </div>
                @endif
                
                @if(Auth::user()->role=="admin")
                <div class="row row-cols-1 row-cols-md-3">
                    <div class="col mb-4">
                    <a href="/kirim-barang" ><div class="card h-100">
                            <img src="{{asset('farm/img/bg-img/46.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Pengiriman</h5>
                                <p class="card-text"></p>
                            </div>
                        </div></a>
                    </div>
                    <div class="col mb-4">
                    <a href="/akun-petani" ><div class="card h-100">
                            <img src="{{asset('farm/img/bg-img/47.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Akun Petani</h5>
                                <p class="card-text"></p>
                            </div>
                        </div></a>
                    </div>
                    <div class="col mb-4">
                    <a href="{{url('/verif-transaksi')}}" ><div class="card h-100">
                            <img src="{{asset('farm/img/bg-img/47.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Verifikasi Transaksi</h5>
                                <p class="card-text"></p>
                            </div>
                        </div></a>
                    </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2">
                    <div class="col mb-4">
                    <a href="{{ url('/refresh-transaksi') }}" ><div class="card h-100">
                            <img src="{{asset('farm/img/bg-img/47.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Refresh Transaksi</h5>
                                <p class="card-text"></p>
                            </div>
                        </div></a>
                    </div>
                    <div class="col mb-4">
                    <a href="{{ url('/verif-harga') }}" ><div class="card h-100">
                            <img src="{{asset('farm/img/bg-img/47.jpg')}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Verif Harga</h5>
                                <p class="card-text"></p>
                            </div>
                        </div></a>
                    </div>
                    <div class="col mb-4">
                    <a href="" ><div class="">
                            
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p class="card-text"></p>
                            </div>
                        </div></a>
                    </div>
                    @endif


            </div>
        </div>
    </div>
</div>


@endsection
