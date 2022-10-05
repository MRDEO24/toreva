@extends('admin.navbar')
@section('content')
@if(session('status'))
<script>
    let text = "{{session('status')}}";
    Swal.fire({
        title: text,
        icon: 'success',
        confirmButtonText: 'Tutup'
    });
</script>
@endif


<ul class="nav nav-tabs ml-3" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Menunggu Bukti</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Konfirmasi Bukti</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Lunas / Selesai</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="container-fluid mt-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Menunggu Bukti Transfer</h6>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="top10" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode</th>
                                    <th>Nama Paket</th>
                                    <th>Total Harga</th>
                                    <th>Atas Nama</th>
                                    <th>NO HP</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php

                                use App\Paket;

                                @endphp
                                @foreach($orda1 as $pack)
                                @php


                                $p = Paket::where('id_paket',$pack->id_paket)->first();
                                @endphp
                                <tr>
                                    <td>{{$loop->iteration}}.</td>
                                    <td>{{$pack->kode}}</td>
                                    <td>{{ucfirst($p->nama_paket)}}</td>
                                    <td>Rp. {{number_format($pack->total_harga)}}</td>
                                    <td>{{$pack->nama_orang}}</td>
                                    <td>{{$pack->no_hp}}</td>
                                    <td> <span data-toggle="modal" data-target="#dancoku{{$pack->id_order}}" class="badge badge-pill badge-success" style="cursor: pointer;">Detail</span></td>

                                </tr>
                                <div class="modal fade" id="dancoku{{$pack->id_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Order Kode : {{$pack->kode}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>- <b>Jumlah Orang Dewasa : </b>{{$pack->dewasa}} Orang</p>
                                                <p>- <b>Jumlah Anak-anak : </b>{{$pack->anak}} Orang</p>
                                                <p>- <b>Check-in : </b>{{date('d M Y',strtotime($pack->check_in))}} </p>
                                                <p>- <b>Check-out : </b>{{date('d M Y',strtotime($pack->check_out))}} </p>
                                                <p>- <b>Dipesan pada : </b>{{date('d M Y',strtotime($pack->created_at))}} </p>
                                                <p>- <b>Tenggat Pembayaran pada : </b>{{date('d M Y',strtotime($pack->tenggat_pembayaran))}} </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="container-fluid mt-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Konfirmasi Bukti Transfer</h6>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="top8" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode</th>
                                    <th>Nama Paket</th>
                                    <th>Total Harga</th>
                                    <th>Atas Nama</th>
                                    <th>NO HP</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach($orda2 as $pack)
                                @php


                                $p = Paket::where('id_paket',$pack->id_paket)->first();
                                @endphp
                                <tr>
                                    <td>{{$loop->iteration}}.</td>
                                    <td>{{$pack->kode}}</td>
                                    <td>{{ucfirst($p->nama_paket)}}</td>
                                    <td>Rp. {{number_format($pack->total_harga)}}</td>
                                    <td>{{$pack->nama_orang}}</td>
                                    <td>{{$pack->no_hp}}</td>
                                    <td> <span data-toggle="modal" data-target="#dancoku{{$pack->id_order}}" class="badge badge-pill badge-success" style="cursor: pointer;">Detail</span> <span data-toggle="modal" data-target="#bukti{{$pack->id_order}}" class="badge badge-pill badge-primary" style="cursor: pointer;">Lihat Bukti</span></td>

                                </tr>
                                <div class="modal fade" id="dancoku{{$pack->id_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Order Kode : {{$pack->kode}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>- <b>Jumlah Orang Dewasa : </b>{{$pack->dewasa}} Orang</p>
                                                <p>- <b>Jumlah Anak-anak : </b>{{$pack->anak}} Orang</p>
                                                <p>- <b>Check-in : </b>{{date('d M Y',strtotime($pack->check_in))}} </p>
                                                <p>- <b>Check-out : </b>{{date('d M Y',strtotime($pack->check_out))}} </p>
                                                <p>- <b>Dipesan pada : </b>{{date('d M Y',strtotime($pack->created_at))}} </p>
                                                <p>- <b>Tenggat Pembayaran pada : </b>{{date('d M Y',strtotime($pack->tenggat_pembayaran))}} </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="bukti{{$pack->id_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Bukti Order Kode : {{$pack->kode}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{$pack->bukti}}" alt="" width="100%">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <form action="/aproved/{{$pack->id_order}}" method="post">
                                                    @csrf
                                                    @method('patch')
                                                    <input type="hidden" name="spp" value="3">
                                                    <button type="submit" class="btn btn-primary">Terima bukti</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <div class="container-fluid mt-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Order Lunas / Selesai</h6>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="top9" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode</th>
                                    <th>Nama Paket</th>
                                    <th>Total Harga</th>
                                    <th>Atas Nama</th>
                                    <th>NO HP</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach($orda3 as $pack)
                                @php


                                $p = Paket::where('id_paket',$pack->id_paket)->first();
                                @endphp
                                <tr>
                                    <td>{{$loop->iteration}}.</td>
                                    <td>{{$pack->kode}}</td>
                                    <td>{{ucfirst($p->nama_paket)}}</td>
                                    <td>Rp. {{number_format($pack->total_harga)}}</td>
                                    <td>{{$pack->nama_orang}}</td>
                                    <td>{{$pack->no_hp}}</td>
                                    @if($pack->status_pembayaran != 4)
                                    <td> <span class="badge badge-pill badge-success" style="cursor: pointer;">Detail</span> <span class="badge badge-pill badge-primary" style="cursor: pointer;">Lihat Bukti</span> <span class="badge badge-pill badge-primary" onclick="selesai('{{$pack->id_order}}')" style="cursor: pointer;">Selesai</span></td>
                                    @else
                                    <td> <span data-toggle="modal" data-target="#dancoku{{$pack->id_order}}" class="badge badge-pill badge-success" style="cursor: pointer;">Detail</span> <span data-toggle="modal" data-target="#bukti{{$pack->id_order}}" class="badge badge-pill badge-primary" style="cursor: pointer;">Lihat Bukti</span> <span class="badge badge-pill disabled badge-secondary" style="cursor: pointer;">Selesai</span></td>
                                    @endif
                                </tr>
                                <div class="modal fade" id="dancoku{{$pack->id_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Order Kode : {{$pack->kode}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>- <b>Jumlah Orang Dewasa : </b>{{$pack->dewasa}} Orang</p>
                                                <p>- <b>Jumlah Anak-anak : </b>{{$pack->anak}} Orang</p>
                                                <p>- <b>Check-in : </b>{{date('d M Y',strtotime($pack->check_in))}} </p>
                                                <p>- <b>Check-out : </b>{{date('d M Y',strtotime($pack->check_out))}} </p>
                                                <p>- <b>Dipesan pada : </b>{{date('d M Y',strtotime($pack->created_at))}} </p>
                                                <p>- <b>Tenggat Pembayaran pada : </b>{{date('d M Y',strtotime($pack->tenggat_pembayaran))}} </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="bukti{{$pack->id_order}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Bukti Order Kode : {{$pack->kode}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{$pack->bukti}}" alt="" width="100%">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function selesai(id) {
        location.replace("/admin/selesai/" + id);
    }
</script>
@endsection