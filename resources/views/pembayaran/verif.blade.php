@extends('layouts.app')

@section('judul')
Verifikasi Bukti
@stop

@section('content')
<div class="row mt-2">
@foreach($bayar as $mp)
<form method="POST" action="/verif-bukti-tf-barang" accept-charset="UTF-8" enctype="multipart/form-data">
{{ csrf_field() }}
<input type="hidden" value="{{$mp->id_pembelian}}" name="id_pembelian">
<input type="hidden" value="{{$mp->jumlah}}" name="jumlah">
<div class="card border-dark mb-4 mr-4" style="max-width: 32rem;">
  <img src="/bukti_tf/default.png" height="200px" style="	width: 32rem;object-fit: cover; display: {{empty($mp->bukti_tf) ? "block" : "none"}}">
                <img class="card-img-top" src="{{ url('/bukti_tf/'.$mp->bukti_tf) }}"  alt="Card image cap"  style="width: 32rem;object-fit: cover;display: {{empty($mp->bukti_tf) ? "none" : "block"}}">
  <div class="card-body text-dark">
    <h5 class="card-title">{{$mp->harga_total}}</h5><br>
    
    <!-- <a href="/barang/{{$mp->id}}/beli" class="btn btn-primary float-left">Beli Sekarang</a> -->
    <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#exampleModal{{$mp->id_pembelian}}">
  Detail Bukti
</button>
    <!-- <a href="/outlets/{{$mp->petani_id}}" class="btn btn-primary float-right">Lihat Lokasi</a> -->



    <input type="submit" value="Verifikasi Bukti" class="btn btn-primary float-right">
    <br>
  </div>
</div>


<div class="modal fade bd-example-modal-lg" id="exampleModal{{$mp->id_pembelian}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Bukti Pembyaran <strong>{{$mp->id_pembelian}}</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img class="card-img-top" src="{{ url('/bukti_tf/'.$mp->bukti_tf) }}"  alt="Card image cap"  style="width: 100%;object-fit: cover;display: {{empty($mp->bukti_tf) ? "none" : "block"}}">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>
@endforeach
</div>	
@stop