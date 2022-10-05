@extends('admin.navbar')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Paket</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="container">

            <div class="card o-hidden border-0 shadow-lg my-3">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <form method="post" action="/admin/update/{{$paket->id_paket}}" enctype="multipart/form-data">
                        @method('patch')
                        @csrf

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="pt-4 pr-2 pl-4">
                                    <div class="form-group">
                                        <input required type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Nama Paket" name="nama_paket" value="{{$paket->nama_paket}}">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input required type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Letak Lokasi" name="lokasi" value="{{$paket->lokasi}}">
                                        </div>
                                        <div class="col-sm-6">
                                            <input required type="number" class="form-control form-control-user" id="exampleInputEmail" placeholder="Lama Hari" name="hari_paket" value="{{$paket->hari_paket}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input required type="text" class="form-control" placeholder="Harga Dewasa" name="harga_dewasa" value="{{$paket->harga_dewasa}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input required type="text" class="form-control" placeholder="Harga Anak" name="harga_anak" value="{{$paket->harga_anak}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group"><label for="exampleFormControlTextarea1">Deskripsi Paket</label><textarea class="form-control" required id="exampleFormControlTextarea1" rows="3" name="detail">{{$paket->detail}}</textarea></div>



                                    <hr>

                                    <button type="submit" class="btn btn-facebook btn-user btn-block">
                                        <i class="fas fa-edit mr-4"></i> Update Data
                                    </button>

                                    <hr>

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="pt-4 pr-4">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <input type="file" class="kurayami1" id="image-source1" onchange="EditpreviewImage(1);" name="image1" style="display: none;" />

                                            <div class="col-sm-12 d-flex justify-content-center mb-2" role="alert" style="height: 120px; background-color:#C8C8C8" onclick="" id="OpenImgUpload1">


                                                <img src="{{$gambar1 ? $gambar1->path : '/assets/admin/empty.jpg'}}" id="edit-image-preview1" alt="image preview" style="height: 120px;width:60%" />

                                            </div>

                                            <input type="file" class="kurayami2" id="image-source2" onchange="EditpreviewImage(2);" name="image2" style="display: none;" />

                                            <div class="col-sm-12 d-flex justify-content-center mb-2" role="alert" style="height: 120px; background-color:#C8C8C8" onclick="" id="OpenImgUpload2">

                                                <img src="{{$gambar2 ? $gambar2->path : '/assets/admin/empty.jpg'}}" id="edit-image-preview2" alt="image preview" style="height: 120px;width:60%" />



                                            </div>

                                            <input type="file" class="kurayami3" id="image-source3" onchange="EditpreviewImage(3);" name="image3" style="display: none;" />

                                            <div class="col-sm-12 d-flex justify-content-center" role="alert" style="height: 120px; background-color:#C8C8C8" onclick="" id="OpenImgUpload3">

                                                <img src="{{$gambar3 ? $gambar3->path : '/assets/admin/empty.jpg'}}" id="edit-image-preview3" alt="image preview" style="height: 120px;width:60%" />

                                            </div>


                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>






@endsection