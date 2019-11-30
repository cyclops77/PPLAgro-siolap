@extends('layouts.app')

@section('content')
<div class="card">
   <div id="mapid"></div>
</div>

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>

<style>
    #mapid { height: 480px; }
</style>
@endsection


@push('scripts')
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>

<script>
    
    var mymap = L.map('mapid').setView([-8.241614827740, 113.59967350959], 12);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(mymap);

    L.marker([-8.241614827740, 113.59967350959]).addTo(mymap)
        .bindPopup('<img src="product_image/082527400_1516006585-PILIH_GABAH_TERBAIK-Muhamad_Ridlo.jpeg" style="width: 200px; "><br><b>Kantor Pusat SIOLAP</b><br> Rambipuji')
	    .openPopup();

	// L.marker([-8.225082205615, 113.57803344726]).addTo(mymap)
 //        .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
	//     .openPopup();    

	


</script>
@endpush


@stop    