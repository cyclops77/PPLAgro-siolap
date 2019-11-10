@extends('layouts.app')

@section('judul')
Produk Saya
@stop

@section('content')


<div class="card">
	<div class="card-body">
		<div class="row">
		<div class="col-md-6">			
		<p>
		{{$response["kota"]}}
		,
		{{$response["waktu"]}}
		</p>
		<p>PARAMETER SUHU MIN : {{$response['AngkasuhuMIN']}}</p>
		<p>KELEMBABAN : {{$response['kelembaban']}}</p>
		<p>CUACA : {{$response['cuaca']}}</p>
		<p>SUHU : {{$response['suhuAVE']}}</p>
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