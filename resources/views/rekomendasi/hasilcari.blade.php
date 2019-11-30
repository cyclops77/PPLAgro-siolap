@extends('layouts.app')

@section('judul')
Produk Saya
@stop

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
	<li class="breadcrumb-item"><a href="{{url('/rekomendasi-tanam')}}">Rekomendasi Tanam</a></li>
    <li class="breadcrumb-item active" aria-current="page">Hasil Rekomendasi</li>
  </ol>
</nav>  

<div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url('farm/img/bg-img/49.jpg');">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <div class="breadcrumb-text">
            <h2>HASIL REKOMENDASI</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="card">
	<div class="card-body">
		<p>Tanaman : <strong>{{$hasilCariK}}</strong></p>
		<p>Tanah : <strong>{{$hasilCariT}}</strong></p>
		<p>Tanggal : {{date('d M Y', strtotime($now))}}</p>
		<p>Suhu : <strong>{{$hasilsuhuAVE}}</strong> <sup>o</sup>C</p>	
		<p>Cuaca : <strong>{{$cuaca}}</strong></p>	
		<p>Kelembahan : <strong>{{$hasilCariT}}</strong></p>		
		<p>Hasil Akhir Perhitungan : <strong>{{$hasilAkhir}} %</strong></p>
		<p>Output : <strong>{{$output}}</strong></p>
	</div>
</div>
@stop