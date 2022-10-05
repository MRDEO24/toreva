@extends('home.base')
@section('content')
@if(session('status'))
<script>
    let text = "{{session('status')}}";
    Swal.fire({
        text: 'Screenshot Layarmu Sekarang, Kode : '+text,
        icon: 'warning',
        confirmButtonText: 'Tutup'
    });
</script>
@endif
<main class="main">
    <div class="invoice-box mt-4">
        @if($orda->status_pembayaran == 1)
        <div class="alert alert-warning" role="alert">
            <h3 class="">Perhatian</h3>
            <p>Segera lakukan pembayaran kepada Rekening Toreva dan upload bukti di form upload agar pemesanan dapat diproses secepatnya.
                Apabila tenggat waktu belum dibayar maka pemesanan akan dibatalkan otomatis. Total Pembayaran Sesuai dengan total akhir pada invoice.
            </p>
            <p class="mb-0"></p>
        </div>
        @elseif($orda->status_pembayaran == 2)
        <div class="alert alert-secondary" role="alert">
            <h3 class="">Perhatian</h3>
            <p>Sedang Menunggu Konfirmasi oleh Admin, Admin akan menerima pembayaran dan pemesanan segera diterima. Anda dapat mengunduh bukti lunas jika pemesanan telah diterima.
            </p>
            <p class="mb-0"></p>
        </div>
        @else
        <div class="alert alert-success" role="alert">
            <h3 class="">Selamat</h3>
            <p>Pembayaran Sukses, Selamat menikmati liburan yang menakjubkan berasama Toreva Travel. Untuk info lain-lain silahkan menuju bagian bawah website dan menghubungi kontak yang tersedia. </p>
            <p class="mb-0"></p>
        </div>
        @endif
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img class="logotype" src="/assets/home/logo.png" alt="Toreva" style="filter: invert(100%);">
                            </td>

                            <td>
                                Kode : <b>{{$orda->kode}}</b> <br>
                                Dibuat: {{date('d M Y',strtotime($orda->created_at))}}<br>
                                @if($orda->status_pembayaran != 3)
                                Tenggat: {{date('d M Y',strtotime($orda->tenggat_pembayaran))}}
                                @else
                                @endif
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Toreva, Inc.<br>
                                0711 Shibuya Kalilicin<br>
                                Shura, TA 1024
                            </td>

                            <td>
                                TARA Corp.<br>
                                Jovan Keblin<br>
                                toreva@jpn.com
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Detail Pemesanan
                </td>

                <td>

                </td>
            </tr>

            <tr class="item">
                <td>
                    Paket yang dipesan
                </td>

                <td>
                    {{$paket->nama_paket}}
                </td>
            </tr>
            <tr class="item">
                <td>
                    Atas nama
                </td>

                <td>
                    {{$orda->nama_orang}}
                </td>
            </tr>
            <tr class="item">
                <td>
                    Email
                </td>

                <td>
                    {{$orda->email}}
                </td>
            </tr>
            <tr class="item">
                <td>
                    Check in
                </td>

                <td>
                    {{date('d M Y',strtotime($orda->check_in))}}
                </td>
            </tr>
            <tr class="item">
                <td>
                    Check out
                </td>

                <td>
                    {{date('d M Y',strtotime($orda->check_out))}}
                </td>
            </tr>


            <tr class="item last noPrint">
                <td>
                    Detail Paket
                </td>

                <td>
                    <a href="/detail/{{$orda->id_paket}}" target="_blank">Lihat Disini</a>
                </td>
            </tr>

            <tr class="details">
                <td></td>
            </tr>
            <tr class="heading">
                <td>
                    Item
                </td>

                <td>
                    Harga
                </td>
            </tr>

            <tr class="item">
                <td>
                    Orang Dewasa X {{$orda->dewasa}}
                </td>

                <td>
                    Rp. {{number_format($orda->total_harga_dewasa)}}
                </td>
            </tr>

            <tr class="item last">
                <td>
                    Anak-anak X {{$orda->anak}}
                </td>

                <td>
                    Rp. {{number_format($orda->total_harga_anak)}}
                </td>
            </tr>

            <!-- <tr class="item last">
                <td>
                    Domain name (1 year)
                </td>
                
                <td>
                    $10.00
                </td>
            </tr> -->

            <tr class="total">
                <td>
                </td>

                <td>
                    Total Akhir: Rp. {{number_format($orda->total_harga)}}
                </td>
            </tr>
            <tr class="details">
                <td></td>
            </tr>
            <tr class="details">
                <td></td>
            </tr>
            <tr class="item">
                <td>
                <b>No. Rek : 123456789666 (BCA a.n. Tara)</b> 
                </td>

                <td>
                    <img src="/assets/home/bca.png" width="100px" alt="">
                </td>
            </tr>
        </table>
    </div>
</main>
<form class="noPrint" action="/bukti/{{$orda->id_order}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')
    @if( $orda->status_pembayaran == 4 || $orda->status_pembayaran == 3)
    @else
    <div class="container d-flex justify-content-center mt-5">
        <div class="col-md-7">
            <input type="{{$orda->bukti == null ? 'file':'hidden'}}" class="kurayami1" id="image-source1" onchange="previewImage(1);" name="bukti" style="display: none;" />

            <div class="col-sm-12 d-flex justify-content-center mb-2" role="alert" style="height: 260px; background-color:#CACACA" onclick="" id="OpenImgUpload1">
                <img id="image-preview1" src="{{$orda->bukti == null ? '/assets/admin/aprodu.jpg':$orda->bukti}}" alt="image preview" style="height: 260px;" />
            </div>
        </div>
    </div>

    @endif
    <div class="row">
        <div class="container col-md-5 mt-3">
            @if($orda->status_pembayaran == 1)
            <button type="submit" class="btn btn-primary btn-md btn-block">Kirim Bukti Pembayaran</button>
            @elseif($orda->status_pembayaran == 2)
            <div class="btn btn-danger disabled btn-md btn-block">Menunggu Konfirmasi Admin</div>
            @else
            <div class="btn btn-success btn-md btn-block window " onclick="window.print();">Unduh Bukti pemesanan</div>
            @endif
        </div>
    </div>
</form>
@endsection