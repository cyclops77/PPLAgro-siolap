@extends('layouts.app')



@section('judul')
Status Pembayaran
@stop

@section('content')


<div class="card">
  <div class="card-body">
    <table class="table table-stripped table-hover">
    	<thead>
    		<th>No.</th>
    		<th>Nama Barang</th>
    		<th>Jenis Komoditas</th>
    		<th>Jumlah</th>
    		<th>Total Pembayaran</th>
    		<th>Pengiriman</th>
    		<th>Penerimaan</th>
            <th>Detail</th>
    	</thead>
    	<tbody>
    		@php
			$i = 1;
    		@endphp
			@foreach($sudahTerima as $p)
    		<tr>
    			<td>{{$i++}}</td>
    			<td>{{$p->nama_barang}}</td>
    			<td>{{$p->jenis_komoditas}}</td>
    			<td>{{$p->jumlah}}</td>
    			<td>{{$p->harga_total}}</td>
    			<td>{{$p->status_terkirim}}</td>
    			<td>{{$p->status_terima}}</td>
    		    <td><a href="/detail-pengiriman/{{$p->mitra_id}}" class="btn btn-sm btn-dark">detail</a></td>
            </tr>
			@endforeach
    	</tbody>
    </table>
  </div>
</div>

@stop