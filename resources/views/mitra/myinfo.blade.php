@extends('layouts.app')

@section('title', __('outlet.detail'))

@section('content')
<div class="col-md-6">
        <div class="card">
            <div class="card-header">Detail Lokasi Penjual</div>
            <div class="card-body">
                <table class="table table-hover table-stripped">
                    <tbody>
                        <tr><td>{{ __('outlet.name') }}</td><td>{{ $outlet->name }}</td></tr>
                        <tr><td>{{ __('outlet.address') }}</td><td>{{ $outlet->address }}</td></tr>
                        <tr><td>{{ __('outlet.latitude') }}</td><td>{{ $outlet->latitude }}</td></tr>
                        <tr><td>{{ __('outlet.longitude') }}</td><td>{{ $outlet->longitude }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                    <a href="{{ route('outlets.edit', $outlet) }}" id="edit-outlet-{{ $outlet->id }}" class="btn btn-warning" style="display: {{Auth::user()->id == $outlet->user_id ? "block" : "none"}}">Edit</a>
                
                    <a href="{{url('/barang')}}" class="btn btn-link">Kembali</a>
                
            </div>
        </div>
    </div>
@stop