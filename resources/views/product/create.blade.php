@extends('layouts.app')

@section('judul')
Pasarkan Produk
@stop

@section('content')
<div class="col-md-6 offset-3">
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
                    </select>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Harga Produk/kg</label>
                    <input id="" type="number" class="form-control" name="harga" required>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Stock</label>
                    <input id="" type="number" class="form-control" name="stock" required>
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
@stop