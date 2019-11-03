@extends('layouts.app')

@section('judul')
Produk Saya
@stop

@section('content')
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Semua</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Padi</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Tebu</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-bakau" role="tab" aria-controls="nav-contact" aria-selected="false">Tembakau</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-delai" role="tab" aria-controls="nav-contact" aria-selected="false">Kedelai</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

<div class="row mt-2">
@foreach($semua as $mp)
<div class="card border-dark mb-4 mr-4" style="max-width: 22rem;">
  <img class="card-img-top" src="{{$mp->getAvatar()}}" alt="Card image cap" height="200px" style="border-bottom: 1px solid black;object-fit: cover;width: 22rem">
  <div class="card-body text-dark">
    <h5 class="card-title float-left">{{$mp->nama_barang}}</h5>
    <p class="float-right">Rp. {{$mp->harga_barang}}</p>
    <br>
    <p class="text-center"></p>
    <p class=""><strong>Status : {{$mp->getStatus()}}</strong></p>
    <p class=""><strong>Jenis Komoditas : {{$mp->jenis_komoditas}}</strong></p>
    <p class=""><strong>Stok Komoditas : {{$mp->stock}} </strong>Kg</p>
    <!-- <a href="/outlets/{{$mp->petani_id}}" class="btn btn-primary float-left" style="display: {{$mp->isverify=="no" ? "block" : "none"}}">Tinjau</a> -->
    <!-- <a href="/produk/{{$mp->id}}/verifikasi" class="btn btn-primary float-right" style="display: {{$mp->isverify=="no" ? "block" : "none"}}">Verifikasi</a> -->
    <form method="POST" action="/verifikasi-barang-ini">
            {{ csrf_field() }}
      <input type="hidden" value="{{$mp->id}}" name="idnya">
      <input type="submit" class="btn btn-primary float-right" style="display: {{$mp->isverify=="no" ? "block" : "none"}}" value="Verifikasi">
    </form>


    
    <form method="POST" action="/jangan-verifikasi-barang-ini">
            {{ csrf_field() }}
      <input type="hidden" value="{{$mp->id}}" name="idnya">
      <!-- <input type="submit" class="btn btn-danger float-left" style="display: {{$mp->isverify=="no" ? "block" : "none"}}" value="Tolak"> -->
      <button type="button" class="btn btn-danger float-left" data-toggle="modal" data-target="#exampleModal{{$mp->id}}">
      Tolak
    </button>

    <div class="modal fade" id="exampleModal{{$mp->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$mp->nama_barang}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<div class="form-check">
  <input class="form-check-input" type="radio" name="cek" id="checkbox" value="AA">
  <label class="form-check-label" for="exampleRadios1">
    Harga tidak sesuai
  </label>
  <input type="text" class="form-control" id="a" name="a">
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="cek" id="bbb" value="BB">
  <label class="form-check-label" for="exampleRadios1">
    Harga tidak sesuai
  </label>
  <input type="text" class="form-control" id="b" name="a">
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="cek" id="ccc" value="CC">
  <label class="form-check-label" for="exampleRadios1">
    Harga tidak sesuai
  </label>
  <input type="text" class="form-control" id="c" name="a">
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    </form>
    <br>
  </div>
</div>
@endforeach
</div>  

  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    
<div class="row mt-2">
@foreach($padi as $ma)
<div class="card border-dark mb-4 mr-4" style="max-width: 22rem;">
  <img class="card-img-top" src="{{$ma->getAvatar()}}" alt="Card image cap" height="200px" style="border-bottom: 1px solid black;object-fit: cover;width: 22rem">
  <div class="card-body text-dark">
    <h5 class="card-title float-left">{{$ma->nama_barang}}</h5>
    <p class="float-right">Rp. {{$ma->harga_barang}}</p>
    <br>
    <p class="text-center"></p>
    <p class=""><strong>Status : {{$ma->getStatus()}}</strong></p>
    <p class=""><strong>Jenis Komoditas : {{$ma->jenis_komoditas}}</strong></p>
    <p class=""><strong>Stok Komoditas : {{$ma->stock}} </strong>Kg</p>
    <a href="/produk/{{$ma->id}}/edit" class="btn btn-primary float-right" style="display: {{$ma->isverify=="no" ? "block" : "none"}}">Verifikasi</a>
    <br>
  </div>
</div>
@endforeach
</div>  

  </div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
    
<div class="row mt-2">
@foreach($tebu as $mb)
<div class="card border-dark mb-4 mr-4" style="max-width: 22rem;">
  <img class="card-img-top" src="{{$mb->getAvatar()}}" alt="Card image cap" height="200px" style="border-bottom: 1px solid black;object-fit: cover;width: 22rem ">
  <div class="card-body text-dark">
    <h5 class="card-title float-left">{{$mb->nama_barang}}</h5>
    <p class="float-right">Rp. {{$mb->harga_barang}}</p>
    <br>
    <p class="text-center"></p>
    <p class=""><strong>Status : {{$mb->getStatus()}}</strong></p>
    <p class=""><strong>Jenis Komoditas : {{$mb->jenis_komoditas}}</strong></p>
    <p class=""><strong>Stok Komoditas : {{$mb->stock}} </strong>Kg</p>
    <a href="/produk/{{$mb->id}}/edit" class="btn btn-primary float-right" style="display: {{$mb->isverify=="no" ? "block" : "none"}}">Verifikasi</a>
    <br>
  </div>
</div>
@endforeach
</div>  

  </div>
  <div class="tab-pane fade" id="nav-bakau" role="tabpanel" aria-labelledby="nav-profile-tab">
    
<div class="row mt-2">
@foreach($tembakau as $mc)
<div class="card border-dark mb-4 mr-4" style="max-width: 22rem;">
  <img class="card-img-top" src="{{$mc->getAvatar()}}" alt="Card image cap" height="200px" style="border-bottom: 1px solid black;object-fit: cover;width: 22rem">
  <div class="card-body text-dark">
    <h5 class="card-title float-left">{{$mc->nama_barang}}</h5>
    <p class="float-right">Rp. {{$mc->harga_barang}}</p>
    <br>
    <p class="text-center"></p>
    <p class=""><strong>Status : {{$mc->getStatus()}}</strong></p>
    <p class=""><strong>Jenis Komoditas : {{$mc->jenis_komoditas}}</strong></p>
    <p class=""><strong>Stok Komoditas : {{$mc->stock}} </strong>Kg</p>
    <a href="/produk/{{$mc->id}}/edit" class="btn btn-primary float-right" style="display: {{$mc->isverify=="no" ? "block" : "none"}}">Verifikasi</a>
    <br>
  </div>
</div>
@endforeach
</div>  

  </div>
  <div class="tab-pane fade" id="nav-delai" role="tabpanel" aria-labelledby="nav-contact-tab">
    
<div class="row mt-2">
@foreach($kedelai as $md)
<div class="card border-dark mb-4 mr-4" style="max-width: 22rem;">
  <img class="card-img-top" src="{{$md->getAvatar()}}" alt="Card image cap" height="200px" style="border-bottom: 1px solid black;object-fit: cover;width: 22rem">
  <div class="card-body text-dark">
    <h5 class="card-title float-left">{{$md->nama_barang}}</h5>
    <p class="float-right">Rp. {{$md->harga_barang}}</p>
    <br>
    <p class="text-center"></p>
    <p class=""><strong>Status : {{$md->getStatus()}}</strong></p>
    <p class=""><strong>Jenis Komoditas : {{$md->jenis_komoditas}}</strong></p>
    <p class=""><strong>Stok Komoditas : {{$md->stock}} </strong>Kg</p>
    <a href="/produk/{{$md->id}}/edit" class="btn btn-primary float-right" style="display: {{$md->isverify=="no" ? "block" : "none"}}">Verifikasi</a>
    <br>
  </div>
</div>
@endforeach
</div>  

  </div>
</div>
@stop

@section('js')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#a").attr('disabled',true);
    $("#b").attr('disabled',true);
    $("#c").attr('disabled', true);

    $('input:radio[name="cek"]').change(
      function(){
        if ($(this).is(':checked') && $(this).val() == 'AA') {
            $("#a").attr('disabled',false);
            $("#b").attr('disabled',true);
            $("#c").attr('disabled', true);
        }else if ($(this).is(':checked') && $(this).val() == 'BB') {
            $("#a").attr('disabled',true);
            $("#b").attr('disabled',false);
            $("#c").attr('disabled', true);
        }else if ($(this).is(':checked') && $(this).val() == 'CC') {
            $("#a").attr('disabled',true);
            $("#b").attr('disabled',true);
            $("#c").attr('disabled', false);
        }
    });
    
  });
</script>
@stop