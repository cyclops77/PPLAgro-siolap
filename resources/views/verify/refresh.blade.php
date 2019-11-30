@extends('layouts.app')

@section('judul')
Transaksi
@stop

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
	<li class="breadcrumb-item active" aria-current="page">Transaksi</li>
    <li class="breadcrumb-item active" aria-current="page">Refresh Transaksi</li>
  </ol>
</nav>  

<div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url('farm/img/bg-img/47.jpg');">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <div class="breadcrumb-text">
            <h2>REFRESH TRANSAKSI</h2>
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
<div class="alert alert-primary" >
{{session('gagal')}}
</div>
@endif
<div class="card">
  <div class="card-body">
    <table class="table table-stripped table-hover text-center">
    	<thead>
    		<th>No.</th>
    		<th>Nama Barang</th>
    		<th>Jenis Komoditas</th>
    		<th>Jumlah</th>
    		<th>Total Pembayaran</th>
            <th>Pembayaran</th>
    		<th>Pengiriman</th>
    		<th>Penerimaan</th>
			<th>#</th>
    	</thead>
    	<tbody>
    		@if($isEmpty=="yes")
            <tr>
                <td colspan="9" class="text-center">Tidak Ada Data</td>
            </tr>
            @else
    		@php
			$i = 1;
    		@endphp
			@foreach($pembayaranTelat as $p)
    		<tr>
    			<td>{{$i++}}</td>
    			<td>{{$p->nama_barang}}</td>
    			<td>{{$p->jenis_komoditas}}</td>
    			<td>{{$p->jumlah}}</td>
    			<td>{{$p->harga_total}}</td>
                <td>{{$p->status_bayar}}</td>
    			<td>{{$p->status_terkirim}}</td>
    			<td>{{$p->status_terima}}</td>
    			<td>
    				<form method="POST" action="/kembalikan-stock-pemesanan">
				    {{ csrf_field() }}
				    <input type="hidden" value="{{$p->id_pembelian}}" name="id_pembelian">
				    <input type="submit" class="btn btn-dark btn-sm" value="kembalikan">
					</form>	
    			</td>
    		</tr>
			@endforeach
			@endif
    	</tbody>
    </table>
  </div>
</div>
@stop