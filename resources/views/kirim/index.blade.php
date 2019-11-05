@extends('layouts.app')

@section('judul')
Kirim Barang 
@stop

@section('content')


<div class="card">
    <div class="card-header">Data Pembayaran dan Pengiriman
            <a href="/sedang-mengirim" class="btn btn-sm btn-primary float-right ml-1">Sedang Dikirim</a>
            <a href="/riwayat-pembelian" class="btn btn-sm btn-primary float-right">Riwayat Pengiriman</a>
            </div>
  <div class="card-body">
    <table class="table table-stripped table-hover">
    	<thead>
    		<th>No.</th>
    		<th>Nama Barang</th>
    		<th>Jenis</th>
    		<th>Jumlah</th>
    		<th>Total Pembayaran</th>
    		<th>Pembayaran</th>
    		<th>Pengiriman</th>
    		<th>Penerimaan</th>
            <th>Lokasi</th>
            <th>#</th>
    	</thead>
    	<tbody>
    		@php
			$i = 1;
    		@endphp
			@foreach($BayarAja as $p)
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
                    <a href="/detail-pengiriman/{{$p->mitra_id}}" class="btn btn-sm btn-dark">Lihat</a>
                </td>
                <td>
                    <form method="POST" action="/kirim-barang-ini-ini">
                        {{ csrf_field() }}
                    <input type="hidden" name="idPesanan" value="{{$p->id_pembelian}}">
                    <input type="submit" value="Kirim Barang" class="btn btn-sm btn-dark">
                    </form>
                </td>
    		</tr>
			@endforeach
    	</tbody>
    </table>
  </div>
</div>

@stop