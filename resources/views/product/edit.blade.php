@extends('layouts.app')

@section('judul')
Pasarkan Produk
@stop

@section('content')
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
<div class="col-md-6 offset-3">
    <div class="card">
        <div class="card-header">Edit Barang</div>
        <form method="POST" action="/edit-barang-saya" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card-body">
                <input type="hidden" value="{{$produk->id}}" name="barangID">
                <div class="form-group">
                    <label for="name" class="control-label">Nama Produk</label>
                    <input type="text" class="form-control" name="nama"  value="{{$produk->nama_barang}}">
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Jenis Komoditas</label>
                    <select name="jenis_komoditas" class="custom-select">
                        <option value="padi" {{$produk->jenis_komoditas=="padi" ? "selected" : ""}}>Padi</option>
                        <option value="tembakau" {{$produk->jenis_komoditas=="tembakau" ? "selected" : ""}}>Tembakau</option>
                        <option value="tebu" {{$produk->jenis_komoditas=="tebu" ? "selected" : ""}}>Tebu</option>
                        <option value="kedela" {{$produk->jenis_komoditas=="kedelai" ? "selected" : ""}}>Kedelai</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Harga Produk/kg</label>
                    <input id="" type="number" class="form-control" name="harga"  value="{{$produk->harga_barang}}">
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Stok</label>
                    <input id="" type="number" class="form-control" name="stock"  value="{{$produk->stock}}">
                </div>
                <img class="card-img-top" src="{{$produk->getAvatar()}}" alt="Card image cap" height="200px" style="border-bottom: 1px solid black">
                <div class="form-group">
                    <label>Gambar Produk</label>
                    <input type="file" class="form-control" name="gambar" >
                </div>
                
            </div>
            <div class="card-footer">
                <input type="submit" value="Ubah" class="btn btn-primary">
                <a href="/produk" class="btn btn-danger float-right">{{ __('Batalkan') }}</a>
            </div>
        </form>
    </div>
</div>
@stop