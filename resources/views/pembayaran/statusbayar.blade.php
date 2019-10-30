@extends('layouts.app')

@section('judul')
Status Pembayaran
@stop

@section('content')

<div class="card">
  <div class="card-body">
    <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Wajib Bayar({{$pembayaranWajib->count()}})</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Telat Bayar({{$pembayaranTelat->count()}})</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Semua({{$pembayaran->count()}})</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"><br>
    <table class="table table-stripped table-hover text-center">
        <thead>
            <th>No.</th>
            <th>Nama Barang</th>
            <th>Jenis Komoditas</th>
            <th>Jumlah</th>
            <th>Total Pembayaran</th>
            <th>Terakhir Pembayaran</th>
            <th>#</th>
        </thead>
        <tbody>
            @if($isEmpty=="yes")
            <tr>
                <td colspan="6" class="text-center">Tidak Ada Data</td>
            </tr>
            @else
            @php
            $i = 1;
            @endphp
            @foreach($pembayaranWajib as $p)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$p->nama_barang}}</td>
                <td>{{$p->jenis_komoditas}}</td>
                <td>{{$p->jumlah}}</td>
                <td>{{$p->harga_total}}</td>
                <td>{{$p->terakhir}}</td>
                <td><a href="/pembayaran/{{$p->id_pembelian}}/bukti" class="btn btn-sm btn-dark" style="display: {{(date($p->terakhir))>(date('Y-m-d H:i:s')) ? "block" : "none"}}">{{empty($p->bukti_tf) ? "Upload Bukti" : "Edit Bukti"}}</a>

                <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#exampleModal" style="display: {{(date($p->terakhir))>(date('Y-m-d H:i:s')) ? "none" : "block"}}">
                  {{empty($p->bukti_tf) ? "Upload Bukti" : "Edit Bukti"}}
                </button>    
                <div class="modal fade text-left" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pembelian Expired</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Batas Akhir Pembayaran adalah : <strong>{{$p->terakhir}}</strong></p>
                        Anda tidak dapat melakukan upload bukti pembayaran lagi karena Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique sequi alias impedit, nam obcaecati officiis, dicta harum sunt, neque veniam esse, culpa expedita eveniet. Itaque eos nihil natus earum magni.
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>


  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <br>
    <table class="table table-stripped table-hover text-center">
        <thead>
            <th>No.</th>
            <th>Nama Barang</th>
            <th>Jenis Komoditas</th>
            <th>Jumlah</th>
            <th>Total Pembayaran</th>
            <th>Terakhir Pembayaran</th>
            <th>#</th>
        </thead>
        <tbody>
            @if($isEmpty=="yes")
            <tr>
                <td colspan="6" class="text-center">Tidak Ada Data</td>
            </tr>
            @else
            @php
            $i = 1;
            @endphp
            @foreach($pembayaranTelat as $p)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$p->nama_barang}}</td>
                <td>{{$p->jenis_komoditas}}</td>
                <td>{{$p->jumlah}}</td>
                <td>{{$p->harga_total}}</td>
                <td>{{$p->terakhir}}</td>
                <td><a href="/pembayaran/{{$p->id_pembelian}}/bukti" class="btn btn-sm btn-dark" style="display: {{(date($p->terakhir))>(date('Y-m-d H:i:s')) ? "block" : "none"}}">{{empty($p->bukti_tf) ? "Upload Bukti" : "Edit Bukti"}}</a>

                <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#exampleModal{{$p->id_pembelian}}" style="display: {{(date($p->terakhir))>(date('Y-m-d H:i:s')) ? "none" : "block"}}">
                  {{empty($p->bukti_tf) ? "Upload Bukti" : "Edit Bukti"}}
                </button>    
                <div class="modal fade" id="exampleModal{{$p->id_pembelian}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pembelian Expired</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body text-left">
                        <p>Pembelian produk bernama : <strong>{{$p->nama_barang}}</strong>, telah expired karena batas pengiriman bukti transfer adalah 1 hari atau 24 Jam</p>
                        <p>Batas Akhir Pembayaran adalah : <strong>{{$p->terakhir}}</strong></p>
                        Anda tidak dapat melakukan upload bukti pembayaran lagi karena Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique sequi alias impedit, nam obcaecati officiis, dicta harum sunt, neque veniam esse, culpa expedita eveniet. Itaque eos nihil natus earum magni.
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>




  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
    <br>
    <table class="table table-stripped table-hover text-center">
        <thead>
            <th>No.</th>
            <th>Nama Barang</th>
            <th>Jenis Komoditas</th>
            <th>Jumlah</th>
            <th>Total Pembayaran</th>
            <th>Terakhir Pembayaran</th>
            <th>#</th>
        </thead>
        <tbody>
            @if($isEmpty=="yes")
            <tr>
                <td colspan="6" class="text-center">Tidak Ada Data</td>
            </tr>
            @else
            @php
            $i = 1;
            @endphp
            @foreach($pembayaran as $p)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$p->nama_barang}}</td>
                <td>{{$p->jenis_komoditas}}</td>
                <td>{{$p->jumlah}}</td>
                <td>{{$p->harga_total}}</td>
                <td>{{$p->terakhir}}</td>
                <td><a href="/pembayaran/{{$p->id_pembelian}}/bukti" class="btn btn-sm btn-dark" style="display: {{(date($p->terakhir))>(date('Y-m-d H:i:s')) ? "block" : "none"}}">{{empty($p->bukti_tf) ? "Upload Bukti" : "Edit Bukti"}}</a>

                <button type="button" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#exampleModal" style="display: {{(date($p->terakhir))<(date('Y-m-d H:i:s')) ? "block" : "none"}}">
                  {{empty($p->bukti_tf) ? "Upload Bukti" : "Edit Bukti"}}
                </button>    
                <div class="modal fade text-left" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pembelian Expired</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Batas Akhir Pembayaran adalah : <strong>{{$p->terakhir}}</strong></p>
                        Anda tidak dapat melakukan upload bukti pembayaran lagi karena Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique sequi alias impedit, nam obcaecati officiis, dicta harum sunt, neque veniam esse, culpa expedita eveniet. Itaque eos nihil natus earum magni.
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table></div>
</div>


    
  </div>
</div>

@stop