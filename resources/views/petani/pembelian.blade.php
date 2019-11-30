@extends('layouts.app')

@section('judul')
Pembelian Barang
@stop

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Pembelian Barang</li>
  </ol>
<div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url('farm/img/bg-img/47.jpg');">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <div class="breadcrumb-text">
            <h2>PEMBELIAN BARANG</h2>
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
    		<th>Pembeli</th>
    		<th>Alamat Pengiriman</th>
    		<th>Status</th>
            <th>Barang</th>
    		<th>Jumlah</th>
    		<th>Total Pembayaran</th>

    	</thead>
    	<tbody>
    		@php
			$i = 1;
    		@endphp
			@foreach($thisQuery as $p)
    		<tr>
    			<td>{{$i++}}</td>
    			<td>{{$p->nama}}</td>
    			<td>{{$p->alamat}}</td>
    			<td>{{$p->status}}</td>
    			<td>{{$p->nama_barang}}</td>
    			<td>{{$p->jumlah}} Kg</td>
                <td>Rp. {{number_format($p->harga_total, 2)}}</td>
    		</tr>
			@endforeach
    	</tbody>
    </table>
    {{$thisQuery->links()}}
  </div>
</div>

@stop