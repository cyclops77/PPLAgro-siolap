@extends('layouts.app')

@section('title', __('outlet.list'))

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Info Saya</li>
  </ol>
</nav>  

<div style="display: {{Auth::user()->role=="mitra" ? "block" : "none"}}">
<div class="card">
  <div class="card-body">
    <table class="table table-stripped table-hover">
        <tbody>
            <tr>
                <td width="10%">NAMA</td>
                <td>: &nbsp&nbsp&nbsp<strong>{{$mine_User->name}}</strong></td>
            </tr>
            <tr>
                <td width="10%">Alamat</td>
                <td>: &nbsp&nbsp&nbsp<strong>{{$mine_User->address}}</strong></td>
            </tr>
            <tr>
                <td width="10%">Email</td>
                <td>: &nbsp&nbsp&nbsp<strong>{{$User_onUser->email}}</strong></td>
            </tr>
            <tr>
                <td width="10%">Role</td>
                <td>: &nbsp&nbsp&nbsp<strong>{{$User_onUser->role}}</strong></td>
            </tr>
            <tr>
                <td width="10%">Latitude</td>
                <td>: &nbsp&nbsp&nbsp<strong>{{$mine_User->latitude}}</strong></td>
            </tr>
            <tr>
                <td width="10%">Longitude</td>
                <td>: &nbsp&nbsp&nbsp<strong>{{$mine_User->longitude}}</strong></td>
            </tr>
            <tr>
                <td><a href="/outlets/{{$mine_User->id}}/edit" class="btn btn-primary float-right" style="width: 200px;">Edit Info</a>
                </td>                    
            </tr>
        </tbody>
    </table>
  </div>
</div>
</div>    

<div style="display: {{Auth::user()->role=="mitra" ? "none" : "block"}}">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="control-label">{{ __('outlet.search') }}</label>
                        <input placeholder="{{ __('outlet.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('outlet.search') }}" class="btn btn-secondary">
                    <a href="{{ route('outlets.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('outlet.name') }}</th>
                        <th>{{ __('outlet.address') }}</th>
                        <th>{{ __('outlet.latitude') }}</th>
                        <th>{{ __('outlet.longitude') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($outlets as $key => $outlet)
                    <tr>
                        <td class="text-center">{{ $outlets->firstItem() + $key }}</td>
                        <td>{!! $outlet->name_link !!}</td>
                        <td>{{ $outlet->address }}</td>
                        <td>{{ $outlet->latitude }}</td>
                        <td>{{ $outlet->longitude }}</td>
                        <td class="text-center">
                            <a href="{{ route('outlets.show', $outlet) }}" id="show-outlet-{{ $outlet->id }}">{{ __('app.show') }}</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $outlets->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
</div>
@endsection
@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>

<style>
    #mapid { height: 400px; }
</style>
@endsection
@push('scripts')
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>

<script>
    var map = L.map('mapid').setView([{{ $outlet->latitude }}, {{ $outlet->longitude }}], {{ config('leaflet.detail_zoom_level') }});

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([{{ $outlet->latitude }}, {{ $outlet->longitude }}]).addTo(map)
        .bindPopup('{!! $outlet->map_popup_content !!}');
</script>
@endpush
