@extends('layouts.app')

@section('judul')
Verifikasi Bukti
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

<div class="row mt-2">
@foreach($bayar as $mp)
<div class="card border-dark mb-4 mr-4" style="max-width: 32rem;">
  <img src="/bukti_tf/default.png" height="200px" style="	width: 32rem;object-fit: cover; display: {{empty($mp->bukti_tf) ? "block" : "none"}}">
                <img class="card-img-top" src="{{ url('/bukti_tf/'.$mp->bukti_tf) }}"  alt="Card image cap"  style="width: 32rem;object-fit: cover;display: {{empty($mp->bukti_tf) ? "none" : "block"}}">
  <div class="card-body text-dark">
    <h5 class="card-title">{{$mp->harga_total}}</h5><br>
    
    <!-- <a href="/barang/{{$mp->id}}/beli" class="btn btn-primary float-left">Beli Sekarang</a> -->
    <button type="button" class="btn btn-dark float-left" data-toggle="modal" data-target="#exampleModalBukti{{$mp->id_pembelian}}">
      Detail Bukti
    </button>
    <!-- <a href="/outlets/{{$mp->petani_id}}" class="btn btn-primary float-right">Lihat Lokasi</a> -->



<form method="POST" action="/verif-bukti-tf-barang">
{{ csrf_field() }}
    <input type="hidden" value="{{$mp->id_pembelian}}" name="id_pembelian">
    <input type="hidden" value="{{$mp->jumlah}}" name="jumlah">
    <input type="submit" value="Verifikasi Bukti" class="btn btn-dark float-right">
</form>




<form method="POST" action="/jangan-verif-bukti-tf-barang">
  {{ csrf_field() }}
    <input type="hidden" value="{{$mp->id_pembelian}}" name="idnya">
    <button type="button" class="btn btn-danger float-right mr-2" data-toggle="modal" data-target="#exampleModal{{$mp->id_pembelian}}">
      Tolak
    </button>


<!-- TOLAK -->
    <div class="modal fade" id="exampleModal{{$mp->id_pembelian}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">id Pembelian : <strong>{{$mp->id_pembelian}}</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <input type="hidden" value="{{$mp->id_pembelian}}" name="id_pembelian">
      <input type="hidden" value="{{$mp->jumlah}}" name="jumlah">
      <div class="modal-body">
         <div class="form-group">
          <label for="exampleFormControlSelect1">Pilih alasan penolakan</label>
          <select class="form-control" id="exampleFormControlSelect1" name="keterangan">
            <option selected disabled>Pilih salah satu</option>
            <option value="Gambar teridentifikasi hasil edit">Gambar teridentifikasi hasil edit</option>
            <option value="Gambar tidak terkait">Gambar tidak terkait</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-dark">Kirim Penolakan</button>
      </div>
    </div>
  </div>
</div>
    </form>

<!-- //DETAIL GAMBAR -->
<div class="modal fade bd-example-modal-lg" id="exampleModalBukti{{$mp->id_pembelian}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$mp->id_pembelian}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="{{ url('/bukti_tf/'.$mp->bukti_tf) }}">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-dark">Save changes</button>
      </div>
    </div>
  </div>
</div>



    <br>
  </div>
</div>

@endforeach
</div>	
@stop