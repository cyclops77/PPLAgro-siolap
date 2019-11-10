@extends('layouts.app')

@section('judul')
Produk Saya
@stop

@section('content')

<div class="card">
	<div class="card-body">
		<p>Tanaman : <strong>{{$hasilCariK}}</strong></p>
		<p>Tanah : <strong>{{$hasilCariT}}</strong></p>
		<p>Tanggal : {{date('d M Y', strtotime($now))}}</p>
		<p>Suhu : <strong>{{$hasilsuhuAVE}}</strong></p>	
		<p>Cuaca : <strong>{{$cuaca}}</strong></p>	
		<p>Kelembahan : <strong>{{$hasilCariT}}</strong></p>		
		<p>Hasil Akhir Perhitungan : <strong>{{$hasilAkhir}}</strong></p>
		<p>Outpul : <strong>{{$output}}</strong></p>
	</div>
</div>
@stop