@extends('layouts.app')

@section('judul')
Produk Saya
@stop

@section('content')
<div class="card">
<form method="POST" action="/jangan-verifikasi-barang-ini">
{{ csrf_field() }}
<div class="card"></div>
  <div class="card-body">
	<div class="row">	
	<input type="hidden" name="idnya" value="{{$pembelian->proid}}">	
	<img src="{{$pembelian->getAvatar()}}" height="450px;" class="mt-2" style="border-bottom: 1px solid black; width: 30rem;object-fit: cover">
	<div class="form-group ml-5">
	<div class="form-check">
  <input class="form-check-input" type="radio" name="cek" id="checkbox" value="AA">
  <label class="form-check-label" for="exampleRadios1">
    Harga tidak sesuai, harga pasar yaitu
  </label>
  <input type="text" class="form-control" id="a" name="keterangan">
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="cek" id="bbb" value="BB">
  <label class="form-check-label" for="exampleRadios1">
  </label>
    Foto kurang jelas
  <input type="text" class="form-control" id="b" name="keterangan">
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="cek" id="ccc" value="CC">
  <label class="form-check-label" for="exampleRadios1">
    Foto tidak sesuai
  </label>
  <input type="text" class="form-control" id="c" name="keterangan">
</div>




	<input type="submit" value="Kirim" class="btn btn-primary mt-3">
	</div>
	</div>
  </div>
  </form>
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