@extends('layouts.app')

@section('judul')
Data Petani
@stop

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Petani</li>
  </ol>
</nav>  

<div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url('farm/img/bg-img/47.jpg');">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <div class="breadcrumb-text">
            <h2>DATA PETANI</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     
      <div class="modal-body">
        <div class="card">
        <div class="card-title">
            <h3 class="text-center">Pendaftaran Akun Petani</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="/postregister">
                @csrf
                
                <div class="form-group">
                    <label for="name" class="control-label">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                </div>

                <div class="form-group">
                    <label for="email" class="control-label">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                </div>
                
                <div class="form-group">
                    <label for="password" class="control-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
               

                <div class="form-group ">
                    <label for="password-confirm" class="control-label">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password2" required>
                    </div>
      
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Buat Akun">
      
</form>
        </div>


    </div>
      </div>
    </div>
  </div>
</div>

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
<div class="card">
  <div class="card-body">
	Data Petani 

	<button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">
  Buat Akun Petani
</button>


  </div>
</div>
<div class="card">
  <div class="card-body">
    <table class="table table-stripped table-hover">
    	<thead>
    		<th>No.</th>
    		<th>Nama Barang</th>
    		<th>Jenis Email</th>
    	</thead>
    	<tbody>
    		@php
			$i = 1;
    		@endphp
			@foreach($petani as $p)
    		<tr>
    			<td>{{$i++}}</td>
    			<td>{{$p->name}}</td>
    			<td>{{$p->email}}</td>
    		</tr>
			@endforeach
    	</tbody>
    </table>
            <div class="justify-center">{{ $petani->links() }}</div>
  </div>
</div>
@stop