@extends('layouts.app')

@section('judul')
Notifikasi 
@stop



@section('content')
<div class="col-md-12">
<div class="row">
	<div class="col-md-3">
<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
  <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Semua ( {{$lol->count()}} )
<!-- <span class="badge badge-pill badge-danger ml-1">
    
</span> -->
  </a>
  <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Telat Bayar ( {{$telatBayar->count()}} )</a>
  <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Teridentifikasi Edit ( {{$editan->count()}} )</a>
  <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
</div>
</div>
<div class="col-md-9">
<div class="tab-content" id="v-pills-tabContent">
  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
	<table class="table table-stripped table-hover">
    	<thead>
    		<th>No.</th>
    		<th>Nama Barang</th>
    		<th>Jenis</th>
    		<th>Jumlah</th>
    		<th>Total Pembayaran</th>
            <th>Lokasi</th>
    	</thead>
    	<tbody>
    		@php
			$i = 1;
    		@endphp
			@foreach($lol as $p)
    		<tr>
    			<td>{{$i++}}</td>
    			<td>{{$p->nama_barang}}</td>
    			<td>{{$p->jenis_komoditas}}</td>
    			<td>{{$p->jumlah}}</td>
    			<td>{{$p->harga_total}}</td>
                <td>
                    <a href="/outlets/{{$p->mitra_id}}" class="btn btn-sm btn-dark">Lihat</a>
                </td>
    		</tr>
			@endforeach
    	</tbody>
    </table>
  </div>
  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
 <table class="table table-stripped table-hover">
    	<thead>
    		<th>No.</th>
    		<th>Nama Barang</th>
    		<th>Jenis</th>
    		<th>Jumlah</th>
    		<th>Total Pembayaran</th>
            <th>Lokasi</th>
    	</thead>
    	<tbody>
    		@php
			$i = 1;
    		@endphp
			@foreach($telatBayar as $p)
    		<tr>
    			<td>{{$i++}}</td>
    			<td>{{$p->nama_barang}}</td>
    			<td>{{$p->jenis_komoditas}}</td>
    			<td>{{$p->jumlah}}</td>
    			<td>{{$p->harga_total}}</td>
    			
                <td>
                    <a href="/outlets/{{$p->mitra_id}}" class="btn btn-sm btn-dark">Lihat</a>
                </td>
    		</tr>
			@endforeach
    	</tbody>
    </table> 	
  </div>
  <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
  
   <table class="table table-stripped table-hover">
    	<thead>
    		<th>No.</th>
    		<th>Nama Barang</th>
    		<th>Jenis</th>
    		<th>Jumlah</th>
    		<th>Total Pembayaran</th>
            <th>Lokasi</th>
    	</thead>
    	<tbody>
    		@php
			$i = 1;
    		@endphp
			@foreach($editan as $p)
    		<tr>
    			<td>{{$i++}}</td>
    			<td>{{$p->nama_barang}}</td>
    			<td>{{$p->jenis_komoditas}}</td>
    			<td>{{$p->jumlah}}</td>
    			<td>{{$p->harga_total}}</td>
    			
                <td>
                    <a href="/outlets/{{$p->mitra_id}}" class="btn btn-sm btn-dark">Lihat</a>
                </td>
    		</tr>
			@endforeach
    	</tbody>
    </table> 	


  </div>
  <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente quia libero excepturi assumenda possimus doloremque dicta atque amet totam debitis eum, nemo magnam odio veniam deserunt a! Nemo quia, labore.</div>
  <div>Explicabo, odit aperiam mollitia corporis? Quam incidunt, quas sunt. Necessitatibus quibusdam qui voluptate voluptatem reiciendis perspiciatis error quod officia labore nulla vel sit, tempore earum nisi odio, beatae autem culpa.</div>
  <div>Explicabo adipisci, rem eos architecto quidem suscipit ullam error rerum quis a, accusantium temporibus, quia dignissimos est voluptatum sed sint, consequatur veritatis quibusdam ipsum. Dolorem accusamus vel corporis, labore culpa.</div></div>
</div>





</div>
</div>
</div>
@stop