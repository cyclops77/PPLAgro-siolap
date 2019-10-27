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
            <th>#</th>
    	</thead>
    	<tbody>
            @if($isEmpty=="yes")
            <tr>
                <td colspan="6" class="text-center">Tidak Ada Data</td>
            </tr>
            @else
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
                <td><a href="/pembayaran/{{$p->id_pembelian}}/bukti" class="btn btn-sm btn-dark">{{empty($p->bukti_tf) ? "Upload Bukti" : "Edit Bukti"}}</a></td>
    		</tr>
			@endforeach
            @endif
    	</tbody>
    </table>
  </div>
</div>

@stop