@extends('layouts.app')

@section('judul')
Upload Bukti
@stop

@section('content')
<div class="col-md-6 offset-3">
    <div class="card">
        <div class="card-header">Form Upload Bukti</div>
        <form method="POST" action="/upload-bukti-tf-barang" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card-body">
            	<input type="hidden" name="id_pembelian" value="{{$barang->id_pembelian}}">
            	<h3>Silahkan Lakukan Pembayaran Ke</h3>
            	<h3>BRI-0021 0115 2396 507</h3>
	
            	<p>Nama Barang : <strong>{{$barang->nama_barang}}</strong></p>
            	<p>Harga Total : <strong>{{$barang->harga_total}}</strong></p>
				<p>Jumlah Yang Dibeli : <strong>{{$barang->jumlah}}</strong></p>
                
                <img src="/bukti_tf/default.png" height="200px" style="	width: 30rem;object-fit: cover; display: {{empty($barang->bukti_tf) ? "block" : "none"}}">
                <img class="card-img-top" src="{{ url('/bukti_tf/'.$barang->bukti_tf) }}"  alt="Card image cap"  style="width: 30rem;object-fit: cover;display: {{empty($barang->bukti_tf) ? "none" : "block"}}">
                <div class="form-group">
                    <label>Unggah Bukti</label>
                    <input type="file" class="form-control" name="gambar">
                </div>
                
            </div>
            <div class="card-footer">
                <input type="submit" value="{{empty($barang->bukti_tf) ? "Unggah Bukti" : "Edit Bukti"}}" class="btn btn-primary">
                <a href="/pembayaran" class="btn btn-danger float-right">{{ __('Batalkan') }}</a>
            </div>
        </form>
    </div>
</div>
@stop