@extends('layouts.app')

@section('judul')
Beli Produk
@stop

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
	<li class="breadcrumb-item"><a href="{{url('/barang')}}">Barang</a></li>
    <li class="breadcrumb-item active" aria-current="page">Beli</li>
  </ol>
</nav> 

<div class="card">
<form method="POST" action="/request-beli-barang">
{{ csrf_field() }}

<div class="card-body">
	<div class="row">	
	<div class="breadcrumb-area bg-img bg-overlay jarallax"  style="background-image: url('{{$produk->getAvatar()}}');">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <div class="breadcrumb-text">
            <h2>{{$produk->nama_barang}}</h2>
          </div>
        </div>
      </div>
	</div>
	<input type="hidden" name="produk_id" value="{{$produk->id}}">	
	<!-- <img src="{{$produk->getAvatar()}}" height="450px;" class="mt-2" style="border-bottom: 1px solid black; width: 22rem;object-fit: cover"> -->
</div>

	<hr> 
	<div class="col-md-12">
	<div class="row">
	<div class="col-md-6">
	<div class="form-group ml-3 mt-3">
	<!-- <p class="mt-2">{{$produk->nama_barang}}</p>			 -->
	<input type="hidden" value="{{$produk->harga_barang}}" id="harga_barang" onkeyup="itung()">		
	<label>Total Barang(Kg)</label>
	<input type="number" class="form-control" id="total" name="total" onkeyup="itung()" max="{{$produk->stock}}" min="1" required>
	<label>Harga Barang(Rp)</label>
	<input type="number" class="form-control" id="harga" name="harga" disabled>

	</div>
	</div>
	<div class="col-md-6">
		<h4 class="mt-3">Barang Yang Tersedia : {{$produk->stock}}</h4>
		<p>Pemilik : <strong>{{$produk->petani->name}}</strong></p>
		<p>Bergabung Sejak : <strong>{{date('d M Y', strtotime($produk->petani->created_at))}}</strong></p>
		<p>Jenis Komoditas : <strong>{{$produk->jenis_komoditas}}</strong></p>
		<p>Harga Satuan : <strong>Rp {{$produk->harga_barang}}</strong></p>

	</div>
	</div>
	<input type="submit" value="Beli Sekarang" class="btn btn-primary mt-3 float-right">
	</div>
	</div>
  </div>
  </form>
</div>

@stop

@section('js')

<script>
	function itung(){
		var x;
		x = (document.getElementById("total").value * document.getElementById("harga_barang").value);
		document.getElementById("harga").value = x;
	}
</script>

@stop