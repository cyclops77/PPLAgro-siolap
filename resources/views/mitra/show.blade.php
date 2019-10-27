@extends('layouts.app')

@section('title')
Info Saya
@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Detail Info Saya
            <a href="/outlets/{{$petani->id}}" class="btn btn-sm btn-primary float-right">Detail Lokasi</a>
            </div>
            <div class="card-body">
                <table class="table table-hover table-stripped">
                    <tbody>
                        <tr><td>Nama Lengkap</td><td>{{ $petani->name }}</td></tr>
                        <tr><td>Role</td><td>{{ $user->role }}</td></tr>
                        <tr><td>Alamat</td><td>{{ $petani->address }}</td></tr>
                        <tr><td>Email</td><td>{{ $user->email }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                    <a href="{{ route('outlets.edit', $outlet) }}" id="edit-outlet-{{ $outlet->id }}" class="btn btn-warning" style="display: {{Auth::user()->id == $outlet->user_id ? "block" : "none"}}">Edit</a>
                
                    <a href="{{url('/barang')}}" class="btn btn-link">Kembali</a>
                
            </div>
        </div>
    </div>
    
</div>
@endsection
