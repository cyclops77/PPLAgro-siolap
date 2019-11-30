@extends('layouts.app')

@section('judul')
Pasarkan Produk
@stop

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Pasarkan Produk</li>
  </ol>
</nav>  

<div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url('farm/img/bg-img/47.jpg');">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <div class="breadcrumb-text">
            <h2>PASARKAN PRODUK</h2>
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
<div class="alert alert-danger" >
{{session('gagal')}}
</div>
@endif
<div class="col-md-14">
    <div class="card">
        <div class="card-header">Form Pengisian Barang</div>
        <form method="POST" action="/pasarkan-barang-saya" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="form-group">
                    <label for="name" class="control-label">Nama Produk</label>
                    <input type="text" class="form-control" name="nama" required >
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Jenis Komoditas</label>
                    <select name="jenis_komoditas" class="custom-select">
                        <option selected disabled></option>
                        <option value="padi">Padi</option>
                        <option value="tembakau">Tembakau</option>
                        <option value="tebu">Tebu</option>
                        <option value="kedela">Kedelai</option>
                        <option value="Jagung">Jagung</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Harga Produk/kg</label>
                    <input id="" type="number" class="form-control" name="harga" required min="1">
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Stok</label>
                    <input id="" type="number" class="form-control" name="stock" maxlength="11" required min="1">
                </div>
                <div class="form-group">
                    <label>Gambar Produk</label>
                    <input type="file" class="form-control" name="gambar" required>
                </div>
                
            </div>
            <div class="card-footer">
                <input type="submit" value="{{ __('Buat Produk') }}" class="btn btn-primary">
                <a href="/produk" class="btn btn-danger float-right">{{ __('Batalkan') }}</a>
            </div>
        </form>
    </div>
</div>

<div></div>
@stop