@extends('layouts.app')



@section('judul')
Status Pembayaran
@stop

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Riwayat Pengiriman</li>
  </ol>
</nav>
<div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url('farm/img/bg-img/46.jpg');">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <div class="breadcrumb-text">
            <h2>RIWAYAT PENGIRIMAN</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

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