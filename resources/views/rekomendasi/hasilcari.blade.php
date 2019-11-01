@extends('layouts.app')

@section('judul')
Produk Saya
@stop

@section('content')

<div class="card">
	<div class="card-body">
		<p>Hasil Akhir Perhitungan : <strong>{{$hasilAkhir}}</strong></p>
		<p>Outpul : <strong>{{$output}}</strong></p>
	</div>
</div>
@stop