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
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Seluruh Paket</h6>
        </div>
        <div class="card-body">
            <a href="/admin/tambah" class="btn btn-success mb-4">Tambah Paket</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="top10" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Paket</th>
                            <th>Lokasi</th>
                            <th>Harga Normal</th>
                            <th>Harga Anak</th>
                            <th>Lama Hari</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allpaket as $pack)

                        <tr>
                            <td>{{$loop->iteration}}.</td>
                            <td>{{ucfirst($pack->nama_paket)}}</td>
                            <td>{{$pack->lokasi}}</td>
                            <td>Rp. {{$pack->harga_dewasa}}</td>
                            <td>Rp. {{$pack->harga_anak}}</td>
                            <td>{{$pack->hari_paket}} Hari</td>
                            <td><span style="cursor: pointer;"  class="badge badge-pill badge-primary" onclick="edit('{{$pack->id_paket}}')">Edit</span> <span class="badge badge-pill badge-danger" style="cursor: pointer;" onclick="hapus('{{$pack->id_paket}}')">Hapus</span></td>

                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function hapus(id) {
        Swal.fire({
            title: 'Yakin menghapus paket?',
            text: "Data tidak dapat dikembalikan.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                location.replace("/admin/hapus/" + id);
            }
        })
    }
    
    function edit(id){
        location.replace("/admin/edit/" + id);
    }
</script>
@endsection