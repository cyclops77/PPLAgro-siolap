@extends('layouts.app')

@section('judul')
Produk Saya
@stop

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Optimasi Lahan</li>
  </ol>
</nav>  

<div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url('farm/img/bg-img/49.jpg');">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <div class="breadcrumb-text">
            <h2>OPTIMASI LAHAN</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="card">
	<div class="card-body">
		<div class="row">
		<div class="col-md-6">			
		<p>
		{{$response["kota"]}}
		,
		{{$response["waktu"]}}
		</p>
		<p>PARAMETER SUHU MIN : {{$response['AngkasuhuMIN']}} <sup>o</sup>C</p>
		<p>KELEMBABAN : {{$response['kelembaban']}} %</p>
		<p>CUACA : {{$response['cuaca']}}</p>
		<p>SUHU : {{$response['suhuAVE']}} <sup>o</sup>C</p>
		</div>
		<div class="col-md-6">			
		<p>
			<strong>
				@if($response['cuaca']>=40)
					Silahkan Lakukan penyiraman pada tanaman Padi Anda
				@else
					Jangan Lakukan penyiraman pada tanaman Padi Anda	
				@endif
			</strong>
		</p>
		<p>
			<strong>
				@if($response['cuaca']>=40)
					Silahkan Lakukan penyiraman pada tanaman Tembakau Anda
				@else
					Jangan Lakukan penyiraman pada tanaman Tembakau Anda	
				@endif
			</strong>
		</p>
		<p>
			<strong>
				@if($response['cuaca']>=40)
					Silahkan Lakukan penyiraman pada tanaman Tebu Anda
				@else
					Jangan Lakukan penyiraman pada tanaman Tebu Anda	
				@endif
			</strong>
		</p>
		<p>
			<strong>
				@if($response['cuaca']>=40)
					Silahkan Lakukan penyiraman pada tanaman Kedelai Anda
				@else
					Jangan Lakukan penyiraman pada tanaman Kedelai Anda	
				@endif
			</strong>
		</p>
		<p>
			<strong>
				@if($response['cuaca']>=40)
					Silahkan Lakukan penyiraman pada tanaman Jagung Anda
				@else
					Jangan Lakukan penyiraman pada tanaman Jagung Anda	
				@endif
			</strong>
		</p>
		
		</div>
		</div>

	</div>
</div>




@stop