@extends('layouts.app')

@section('judul')
Status Pembayaran
@stop

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Status Pembyaaran</li>
  </ol>
</nav> 

<div class="card">
  <div class="card-body">
    <table class="table table-stripped table-hover">
    	<thead>
    		<th>No.</th>
    		<th>Nama Barang</th>
    		<th>Jenis Komoditas</th>
    		<th>Jumlah</th>
    		<th>Total Pembayaran</th>
            <th>Pembayaran</th>
    		<th>Pengiriman</th>
    		<th>Penerimaan</th>

    	</thead>
    	<tbody>
    		@php
			$i = 1;
    		@endphp
			@foreach($pembayaran as $p)
    		<tr>
    			<td>{{$i++}}</td>
    			<td>{{$p->nama_barang}}</td>
    			<td>{{$p->jenis_komoditas}}</td>
    			<td>{{$p->jumlah}}</td>
    			<td>{{$p->harga_total}}</td>
                <td>{{$p->status_bayar}}</td>
    			<td>{{$p->status_terkirim}}</td>
    			<td>{{$p->status_terima}}</td>
    		</tr>
			@endforeach
    	</tbody>
    </table>
  </div>
</div>

@stop