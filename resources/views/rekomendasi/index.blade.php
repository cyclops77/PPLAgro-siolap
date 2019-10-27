@extends('layouts.app')

@section('judul')
Produk Saya
@stop

@section('content')


{{$response["kota"]}}

{{$response["waktu"]}}

<p>PARAMETER KELEMBABAN : {{$response["paramKelembaban"]}}</p>

<p>PARAMETER CURAH HUJAN : {{$response["paramCuaca"]}}</p>




<p>PARAMETER CUACA PADI : {{$response['paramCuaca']}}</p>
<p>PARAMETER SUHU PADI : {{$response['paramSuhu']}}</p>
<p>PARAMETER KELEMBABAN PADI : {{$response['paramKelembaban']}}</p>


<p>PARAMETER CUACA JAGUNG : {{$response['paramCuaca2']}}</p>
<p>PARAMETER SUHU JAGUNG : {{$response['paramSuhu2']}}</p>
<p>PARAMETER KELEMBABAN JAGUNG : {{$response['paramKelembaban2']}}</p>

<p>PARAMETER CUACA KEDELAI : {{$response['paramCuaca3']}}</p>
<p>PARAMETER SUHU KEDELAI : {{$response['paramSuhu3']}}</p>
<p>PARAMETER KELEMBABAN KEDELAI : {{$response['paramKelembaban3']}}</p>


<p>PARAMETER CUACA TEMBAKAU : {{$response['paramCuaca4']}}</p>
<p>PARAMETER SUHU TEMBAKAU : {{$response['paramSuhu4']}}</p>
<p>PARAMETER KELEMBABAN TEMBAKAU : {{$response['paramKelembaban4']}}</p>


<p>PARAMETER CUACA TEBU : {{$response['paramCuaca5']}}</p>
<p>PARAMETER SUHU TEBU : {{$response['paramSuhu5']}}</p>
<p>PARAMETER KELEMBABAN TEBU : {{$response['paramKelembaban5']}}</p>


<p>PARAMETER SUHU MIN : {{$response['AngkasuhuMIN']}}</p>
<p>PARAMETER SUHU MAX : {{$response['AngkasuhuMAX']}}</p>
<p>HASILNYA {{$response['suhuAVE']}}</p>






<!-- 
 <br>
 
<strong> {{$response["waktu"]}} 
</strong>  
 {{$response["cuaca"]}}
 <br>
 <br>
<strong>{{$response["waktu2"]}} </strong> Hari : 
 {{$response["cuaca2"]}}
 <br>

 {{$response["cuaca3"]}}
 <br>  
 {{$response["suhu"]}}
 <br>
 <h3>KELEMBABAN</h3>
 {{$response["kelembaban"]}}	
<br>
Anggap Saja Notif
<div class="alert alert-primary" role="alert">
  {{$response["cuaca"]=="Cerah Berawan" ? "Anda Dapat Menyiram Tanaman Anda Saat " : ""}}
  <strong>{{$response["waktu"]}} Hari</strong> karena cuaca
  <strong>{{$response["cuaca"]}}</strong>
</div> -->
@stop