@extends('layouts.app')

@section('judul')
Upload Bukti
@stop

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{url('/pembayaran')}}">Pembayaran</a></li>
    <li class="breadcrumb-item active" aria-current="page">Upload Bukti</li>
  </ol>
</nav>  

<!-- <div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url{{asset('farm/farm/img/bg-img/47.jpg')}};">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <div class="breadcrumb-text">
            <h2>UPLOAD BUKTI</h2>
          </div>
        </div>
      </div>
    </div>
  </div> -->

<div class="col-md-14">
    <div class="card">
        <div class="card-header">Form Upload Bukti</div>
        <form method="POST" action="/upload-bukti-tf-barang" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card-body">
            	<input type="hidden" name="id_pembelian" value="{{$barang->id_pembelian}}">
            	<h3>Silahkan Lakukan Pembayaran Ke</h3>
            	<h3>BRI-0021 0115 2396 507</h3>
	
            	<p>Nama Barang : <strong>{{$barang->nama_barang}}</strong></p>
            	<p>Harga Total : <strong>Rp. {{$barang->harga_total}}</strong></p>
				<p>Jumlah Yang Dibeli : <strong>{{$barang->jumlah}}</strong></p>
                
                <img src="/bukti_tf/default.png" height="200px" style="	width: 30rem;object-fit: cover; display: {{empty($barang->bukti_tf) ? "block" : "none"}}">
                <img class="card-img-top" src="{{ url('/bukti_tf/'.$barang->bukti_tf) }}"  alt="Card image cap"  style="width: 30rem;object-fit: cover;display: {{empty($barang->bukti_tf) ? "none" : "block"}}">
                <div class="form-group">
                    <label>Unggah Bukti</label>
                    <input type="file" class="form-control" name="gambar">
                </div>
                
            </div>
            <div class="card-footer">
                <input type="submit" value="{{empty($barang->bukti_tf) ? "Unggah Bukti" : "Edit Bukti"}}" class="btn btn-primary">
                <a href="/pembayaran" class="btn btn-danger float-right">{{ __('Batalkan') }}</a>
            </div>
        </form>
    </div>
</div>
@stop