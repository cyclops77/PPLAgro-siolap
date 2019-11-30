@extends('layouts.app')

@section('judul')
Produk Saya
@stop

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Barang</li>
  </ol>
</nav> 
 <!-- ##### Breadcrumb Area Start ##### -->
 <div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url('farm/img/bg-img/18.jpg');">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <div class="breadcrumb-text">
            <h2>Barang</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</nav>
<br> 
<!-- <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Barang</li>
  </ol>
</nav>  -->
<div class="row">
  <div class="col-md-3">
<nav>
  <div class="nav flex-column nav-pills" id="nav-tab" role="tablist">
    <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Semua</a>
    <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Padi</a>
    <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-jagung" role="tab" aria-controls="nav-contact" aria-selected="false">Jagung</a>
    <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Tebu</a>
    <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-bakau" role="tab" aria-controls="nav-contact" aria-selected="false">Tembakau</a>
    <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-delai" role="tab" aria-controls="nav-contact" aria-selected="false">Kedelai</a>
  </div>
</nav>
</div>
<div class="col-md-9">
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

<div class="row mt-2">
@foreach($semua as $mp)
            <div class="col-12 col-sm-6 col-lg-4">
              <div class="single-product-area mb-50">
                <!-- Product Thumbnail -->
                <div class="product-thumbnail">
                  <img style="object-fit: cover;height: 250px;width: 100%;" src="{{$mp->getAvatar()}}" alt="">
                  <!-- Product Meta Data -->
                  <div class="product-meta-data"></div></div>
                <!-- Product Description -->
                <div class="product-desc text-center pt-4">
                  <a href="/barang/{{$mp->id}}/beli" class="product-title">{{$mp->nama_barang}}</a>
                  <a class="breadcrumb-item active" aria-current="page">Status : {{$mp->getStatus()}}</a>
                  <div><a class="breadcrumb-item" aria-current="page">Jenis Komoditas : {{$mp->jenis_komoditas}}</a></div>
                  <div><a class="breadcrumb-item" aria-current="page">Stok Komoditas : {{$mp->stock}}</a></div>
                  <h6 class="price">Rp. {{$mp->harga_barang}}</h6>
                  <!-- <a class="icon_cart_alt" href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">BELI</a> -->
                  <a  href="/barang/{{$mp->id}}/beli" role="button" class="btn btn-primary btn-lg"> Beli</a>
                  
                </div>
              </div>
            </div>
            @endforeach
</div>	

  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
  	
<div class="row mt-2">
@foreach($padi as $mp)
<div class="col-12 col-sm-6 col-lg-4">
              <div class="single-product-area mb-50">
                <!-- Product Thumbnail -->
                <div class="product-thumbnail">
                  <img style="object-fit: cover;height: 250px;width: 100%;" src="{{$mp->getAvatar()}}" alt="">
                  <!-- Product Meta Data -->
                  <div class="product-meta-data"></div></div>
                <!-- Product Description -->
                <div class="product-desc text-center pt-4">
                  <a href="/barang/{{$mp->id}}/beli" class="product-title">{{$mp->nama_barang}}</a>
                  <a class="breadcrumb-item active" aria-current="page">Status : {{$mp->getStatus()}}</a>
                  <div><a class="breadcrumb-item" aria-current="page">Jenis Komoditas : {{$mp->jenis_komoditas}}</a></div>
                  <div><a class="breadcrumb-item" aria-current="page">Stok Komoditas : {{$mp->stock}}</a></div>
                  <h6 class="price">Rp. {{$mp->harga_barang}}</h6>
                   <a  href="/barang/{{$mp->id}}/beli" role="button" class="btn btn-primary btn-lg"> Beli</a>
                </div>
              </div>
            </div>
@endforeach
</div>	

  </div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
  	
<div class="row mt-2">

@foreach($jagung as $mp)
<div class="col-12 col-sm-6 col-lg-4">
              <div class="single-product-area mb-50">
                <!-- Product Thumbnail -->
                <div class="product-thumbnail">
                  <img style="object-fit: cover;height: 250px;width: 100%;" src="{{$mp->getAvatar()}}" alt="">
                  <!-- Product Meta Data -->
                  <div class="product-meta-data"></div></div>
                <!-- Product Description -->
                <div class="product-desc text-center pt-4">
                  <a href="/barang/{{$mp->id}}/beli" class="product-title">{{$mp->nama_barang}}</a>
                  <a class="breadcrumb-item active" aria-current="page">Status : {{$mp->getStatus()}}</a>
                  <div><a class="breadcrumb-item" aria-current="page">Jenis Komoditas : {{$mp->jenis_komoditas}}</a></div>
                  <div><a class="breadcrumb-item" aria-current="page">Stok Komoditas : {{$mp->stock}}</a></div>
                  <h6 class="price">Rp. {{$mp->harga_barang}}</h6>
                   <a  href="/barang/{{$mp->id}}/beli" role="button" class="btn btn-primary btn-lg"> Beli</a>
                </div>
              </div>
            </div>
@endforeach
</div>	

  </div>
  <div class="tab-pane fade" id="nav-jagung" role="tabpanel" aria-labelledby="nav-contact-tab">
  	
<div class="row mt-2">

@foreach($tebu as $mp)
<div class="col-12 col-sm-6 col-lg-4">
              <div class="single-product-area mb-50">
                <!-- Product Thumbnail -->
                <div class="product-thumbnail">
                  <img style="object-fit: cover;height: 250px;width: 100%;" src="{{$mp->getAvatar()}}" alt="">
                  <!-- Product Meta Data -->
                  <div class="product-meta-data"></div></div>
                <!-- Product Description -->
                <div class="product-desc text-center pt-4">
                  <a href="/barang/{{$mp->id}}/beli" class="product-title">{{$mp->nama_barang}}</a>
                  <a class="breadcrumb-item active" aria-current="page">Status : {{$mp->getStatus()}}</a>
                  <div><a class="breadcrumb-item" aria-current="page">Jenis Komoditas : {{$mp->jenis_komoditas}}</a></div>
                  <div><a class="breadcrumb-item" aria-current="page">Stok Komoditas : {{$mp->stock}}</a></div>
                  <h6 class="price">Rp. {{$mp->harga_barang}}</h6>
                   <a  href="/barang/{{$mp->id}}/beli" role="button" class="btn btn-primary btn-lg"> Beli</a>
                </div>
              </div>
            </div>
@endforeach
</div>	

  </div>
  <div class="tab-pane fade" id="nav-bakau" role="tabpanel" aria-labelledby="nav-profile-tab">
  	
<div class="row mt-2">
@foreach($tembakau as $mp)
<div class="col-12 col-sm-6 col-lg-4">
              <div class="single-product-area mb-50">
                <!-- Product Thumbnail -->
                <div class="product-thumbnail">
                  <img style="object-fit: cover;height: 250px;width: 100%;" src="{{$mp->getAvatar()}}" alt="">
                  <!-- Product Meta Data -->
                  <div class="product-meta-data"></div></div>
                <!-- Product Description -->
                <div class="product-desc text-center pt-4">
                  <a href="/barang/{{$mp->id}}/beli" class="product-title">{{$mp->nama_barang}}</a>
                  <a class="breadcrumb-item active" aria-current="page">Status : {{$mp->getStatus()}}</a>
                  <div><a class="breadcrumb-item" aria-current="page">Jenis Komoditas : {{$mp->jenis_komoditas}}</a></div>
                  <div><a class="breadcrumb-item" aria-current="page">Stok Komoditas : {{$mp->stock}}</a></div>
                  <h6 class="price">Rp. {{$mp->harga_barang}}</h6>
                   <a  href="/barang/{{$mp->id}}/beli" role="button" class="btn btn-primary btn-lg"> Beli</a>
                </div>
              </div>
            </div>
@endforeach
</div>	

  </div>
  <div class="tab-pane fade" id="nav-delai" role="tabpanel" aria-labelledby="nav-contact-tab">
  	
<div class="row mt-2">
@foreach($kedelai as $mp)
<div class="col-12 col-sm-6 col-lg-4">
              <div class="single-product-area mb-50">
                <!-- Product Thumbnail -->
                <div class="product-thumbnail">
                  <img style="object-fit: cover;height: 250px;width: 100%;" src="{{$mp->getAvatar()}}" alt="">
                  <!-- Product Meta Data -->
                  <div class="product-meta-data"></div></div>
                <!-- Product Description -->
                <div class="product-desc text-center pt-4">
                  <a href="/barang/{{$mp->id}}/beli" class="product-title">{{$mp->nama_barang}}</a>
                  <a class="breadcrumb-item active" aria-current="page">Status : {{$mp->getStatus()}}</a>
                  <div><a class="breadcrumb-item" aria-current="page">Jenis Komoditas : {{$mp->jenis_komoditas}}</a></div>
                  <div><a class="breadcrumb-item" aria-current="page">Stok Komoditas : {{$mp->stock}}</a></div>
                  <h6 class="price">Rp. {{$mp->harga_barang}}</h6>
                   <a  href="/barang/{{$mp->id}}/beli" role="button" class="btn btn-primary btn-lg"> Beli</a>
                </div>
              </div>
            </div>
@endforeach
</div>	
    
</div>
</div>
  </div>
</div>
        <div class="col-12 col-md-8 col-lg-9">
          <div class="row">

            <!-- Single Product Area -->
           
      

            
            
            
            <!-- Single Product Area -->
            <!-- Single Product Area -->
            <!-- Single Product Area -->
          </div>
          <!-- Pagination -->
          <nav>
            <ul class="pagination mb-0 mt-50">
              <!-- <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li> -->
            </ul>
          </nav>
        </div>
      </div>

    </div>

@stop