@extends('layouts.app')

@section('judul')
Status Pembayaran
@stop

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Sedang Dikirim</li>
  </ol>
</nav> 

<div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url('farm/img/bg-img/46.jpg');">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <div class="breadcrumb-text">
            <h2>SEDANG DIKIRIM</h2>
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
            <th>Status</th>
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
            @foreach($sedangKirim as $p)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$p->nama_barang}}</td>
                <td>{{$p->jenis_komoditas}}</td>
                <td>{{$p->jumlah}}</td>
                <td>{{$p->harga_total}}</td>
                <td>Sedang Dikirim</td>
                <td>
                    <form method="POST" action="/acc-barang-sudah-masuk">
                    {{ csrf_field() }}
                    <input type="hidden" name="idPesanan" value="{{$p->id_pembelian}}">
                    <input type="submit" class="btn btn-sm btn-dark" value="Terima Barang">
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