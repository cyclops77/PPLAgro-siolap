@extends('layouts.app')

@section('judul')
Produk Saya
@stop

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Rekomendasi Tanam</li>
  </ol>
</nav>  

<div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url('farm/img/bg-img/49.jpg');">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <div class="breadcrumb-text">
            <h2>REKOMENDASI TANAM</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

@if(session('sukses'))
<div class="alert alert-success" >
{{session('sukses')}}
</div>
@endif
@if(session('gagal'))
<div class="alert alert-danger" >
{{session('gagal')}}
</div>
@endif

<div class="col-md-14">
    <div class="card">
        <div class="card-header">Cari Rekomendasi . . .</div>
        <form method="POST" action="/hitung-rekomendasi-penanaman" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            <!-- DATA -->
            <input type="hidden" value="{{$response['suhuAVE']}}" name="suhuAVE">
            <input type="hidden" value="{{$response['kelembabanAVE']}}" name="kelembabanAVE">
            <input type="hidden" value="{{$response['cuacaAngkaTotal']}}" name="cuacaAngkaTotal">
            <input type="hidden" value="{{$response['paramCuaca']}}" name="paramCuaca">
            

            <!-- PADI -->
            <input type="hidden" value="{{$response['paramCuaca']}}" name="paramCuaca">
            <input type="hidden" value="{{$response['paramSuhu']}}" name="paramSuhu">
            <input type="hidden" value="{{$response['paramKelembaban']}}" name="paramKelembaban">
				
			<!-- JAGUNG -->
           	<input type="hidden" value="{{$response['paramCuaca2']}}" name="paramCuaca2">
            <input type="hidden" value="{{$response['paramSuhu2']}}" name="paramSuhu2">
            <input type="hidden" value="{{$response['paramKelembaban2']}}" name="paramKelembaban2">

			<!-- KEDELAI -->
           	<input type="hidden" value="{{$response['paramCuaca3']}}" name="paramCuaca3">
            <input type="hidden" value="{{$response['paramSuhu3']}}" name="paramSuhu3">
            <input type="hidden" value="{{$response['paramKelembaban3']}}" name="paramKelembaban3">

			<!-- TEMBAKAU -->
           	<input type="hidden" value="{{$response['paramCuaca4']}}" name="paramCuaca4">
            <input type="hidden" value="{{$response['paramSuhu4']}}" name="paramSuhu4">
            <input type="hidden" value="{{$response['paramKelembaban4']}}" name="paramKelembaban4">

			<!-- TEBU -->
           	<input type="hidden" value="{{$response['paramCuaca5']}}" name="paramCuaca5">
            <input type="hidden" value="{{$response['paramSuhu5']}}" name="paramSuhu5">
            <input type="hidden" value="{{$response['paramKelembaban5']}}" name="paramKelembaban5">


            <div class="card-body">
			<div class="form-group">
		    <label for="exampleFormControlSelect1">Pilih Komoditas</label>
		    <select class="form-control" name="komoditas" required>
		      <option disabled selected>Pilih Komoditas . . . </option>
		      <option value="padi">Padi</option>
		      <option value="jagung">Jagung</option>
		      <option value="kedelai">Kedelai</option>
		      <option value="tembakau">Tembakau</option>
		      <option value="tebu">Tebu</option>
		    </select>
		  </div>
		  <div class="form-group">
		    <label for="exampleFormControlSelect1">Pilih Jenis Tanah</label>
		    <select class="form-control" name="tanah" required>
		      <option disabled selected>Pilih Jenis Tanah . . . </option>
		      <option value="andosol">Andosol</option>
		      <option value="aluvial">Aluvial</option>
		    </select>
		  </div>
  		</div>
  		<div class="card-footer">
  			
  		<input type="submit" class="btn btn-dark" style="width: 100px;" value="Hitung">
  		</div>

  	</form>
  </div>
</div>



@stop