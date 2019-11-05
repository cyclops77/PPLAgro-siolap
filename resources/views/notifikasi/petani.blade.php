@extends('layouts.app')

@section('judul')
Notifikasi 
@stop



@section('content')

<div class="card">

<div class="col-md-12">
	<div class="row">
		<div class="col-md-3">	
<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
  <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Semua ({{$repeat->count()}})</a>
  <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Foto Tidak Cocok ({{$repeatEdit->count()}})</a>
  <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Harga Tidak Cocok ({{$repeatEdit->count()}})</a>
  <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messagess" role="tab" aria-controls="v-pills-messagess" aria-selected="false">Foto Kurang Jelas ({{$repeatGj->count()}})</a>
</div>
</div>
<div class="col-md-9">	
<div class="tab-content" id="v-pills-tabContent">
  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
<div class="row mt-2">
@foreach($repeat as $ma)
<div class="card border-dark mb-4 ml-4 mr-4" style="max-width: 22rem;">
  <img class="card-img-top" src="product_image/{{$ma->gambar}}" alt="Card image cap" height="200px" style="border-bottom: 1px solid black;object-fit: cover;width: 22rem">
  <div class="card-body text-dark">
    <h5 class="card-title float-left">{{$ma->nama_barang}}</h5>
    <p class="float-right">Rp. {{$ma->harga_barang}}</p>
    <br>
    <p class="text-center"></p>
    <p class="text-danger"><strong>{{$ma->kategori}}</strong></p>
    <p>Keteragan : {{$ma->keterangan}}</p>
    <p class=""><strong>Jenis Komoditas : {{$ma->jenis_komoditas}}</strong></p>
    <p class=""><strong>Stok Komoditas : {{$ma->stock}} </strong>Kg</p>
    <a href="/produk/{{$ma->id}}/edit" class="btn btn-primary float-right" style="display: {{$ma->isverify=="no" ? "block" : "none"}}">Verifikasi</a>
    <a href="/produk/{{$ma->id}}/edit" class="btn btn-primary float-right" style="display: {{$ma->isverify=="repeat" ? "block" : "none"}}">Edit</a>
    <br>
  </div>
</div>
@endforeach
</div>  
  </div>
  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"><div class="row mt-2">
@foreach($repeatEdit as $mb)
<div class="card border-dark mb-4 ml-4 mr-4" style="max-width: 22rem;">
  <img class="card-img-top" src="product_image/{{$mb->gambar}}" alt="Card image cap" height="200px" style="border-bottom: 1px solid black;object-fit: cover;width: 22rem">
  <div class="card-body text-dark">
    <h5 class="card-title float-left">{{$mb->nama_barang}}</h5>
    <p class="float-right">Rp. {{$mb->harga_barang}}</p>
    <br>
    <p class="text-center"></p>
    <p class="text-danger"><strong>{{$mb->kategori}}</strong></p>
    <p>Keteragan : {{$mb->keterangan}}</p>
    <p class=""><strong>Jenis Komoditas : {{$mb->jenis_komoditas}}</strong></p>
    <p class=""><strong>Stok Komoditas : {{$mb->stock}} </strong>Kg</p>
    <a href="/produk/{{$mb->id}}/edit" class="btn btn-primary float-right" style="display: {{$mb->isverify=="no" ? "block" : "none"}}">Verifikasi</a>
    <a href="/produk/{{$mb->id}}/edit" class="btn btn-primary float-right" style="display: {{$mb->isverify=="repeat" ? "block" : "none"}}">Edit</a>
    <br>
  </div>
</div>
@endforeach
</div></div>
  <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
<div class="row mt-2">
@foreach($repeatGbayar as $mb)
<div class="card border-dark mb-4 ml-4 mr-4" style="max-width: 22rem;">
  <img class="card-img-top" src="product_image/{{$mb->gambar}}" alt="Card image cap" height="200px" style="border-bottom: 1px solid black;object-fit: cover;width: 22rem">
  <div class="card-body text-dark">
    <h5 class="card-title float-left">{{$mb->nama_barang}}</h5>
    <p class="float-right">Rp. {{$mb->harga_barang}}</p>
    <br>
    <p class="text-center"></p>
    <p class="text-danger"><strong>{{$mb->kategori}}</strong></p>
    <p>Keteragan : {{$mb->keterangan}}</p>
    <p class=""><strong>Jenis Komoditas : {{$mb->jenis_komoditas}}</strong></p>
    <p class=""><strong>Stok Komoditas : {{$mb->stock}} </strong>Kg</p>
    <a href="/produk/{{$mb->id}}/edit" class="btn btn-primary float-right" style="display: {{$mb->isverify=="no" ? "block" : "none"}}">Verifikasi</a>
    <a href="/produk/{{$mb->id}}/edit" class="btn btn-primary float-right" style="display: {{$mb->isverify=="repeat" ? "block" : "none"}}">Edit</a>
    <br>
  </div>
</div>
@endforeach
</div>    
  </div>

  <div class="tab-pane fade" id="v-pills-messagess" role="tabpanel" aria-labelledby="v-pills-messagess-tab">
<div class="row mt-2">
@foreach($repeatGj as $mb)
<div class="card border-dark mb-4 ml-4 mr-4" style="max-width: 22rem;">
  <img class="card-img-top" src="product_image/{{$mb->gambar}}" alt="Card image cap" height="200px" style="border-bottom: 1px solid black;object-fit: cover;width: 22rem">
  <div class="card-body text-dark">
    <h5 class="card-title float-left">{{$mb->nama_barang}}</h5>
    <p class="float-right">Rp. {{$mb->harga_barang}}</p>
    <br>
    <p class="text-center"></p>
    <p class="text-danger"><strong>{{$mb->kategori}}</strong></p>
    <p>Keteragan : {{$mb->keterangan}}</p>
    <p class=""><strong>Jenis Komoditas : {{$mb->jenis_komoditas}}</strong></p>
    <p class=""><strong>Stok Komoditas : {{$mb->stock}} </strong>Kg</p>
    <a href="/produk/{{$mb->id}}/edit" class="btn btn-primary float-right" style="display: {{$mb->isverify=="no" ? "block" : "none"}}">Verifikasi</a>
    <a href="/produk/{{$mb->id}}/edit" class="btn btn-primary float-right" style="display: {{$mb->isverify=="repeat" ? "block" : "none"}}">Edit</a>
    <br>
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
@stop