@extends('admin.navbar')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Paket</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="container">

            <div class="card o-hidden border-0 shadow-lg my-3">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <form method="post" action="/admin/package" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="pt-4 pr-2 pl-4">
                                    <div class="form-group">
                                        <input required type="text" value="{{old('nama_paket')}}" class="form-control form-control-user" id="exampleInputEmail" placeholder="Nama Paket" name="nama_paket">
                                    </div>
                                    <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input required type="text" value="{{old('lokasi')}}" class="form-control form-control-user" id="exampleInputEmail" placeholder="Letak Lokasi" name="lokasi">
                                    </div>
                                    <div class="col-sm-6">
                                    <input required type="number" value="{{old('hari_paket')}}" class="form-control form-control-user" id="exampleInputEmail" placeholder="Lama Hari" name="hari_paket">
                                    </div>
                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="number" required value="{{old('harga_dewasa')}}" class="form-control" placeholder="Harga Normal" name="harga_dewasa">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                        
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="number" required value="{{old('harga_anak')}}" class="form-control" placeholder="Harga Anak" name="harga_anak">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group"><label for="exampleFormControlTextarea1">Deskripsi Paket</label><textarea required class="form-control" id="exampleFormControlTextarea1" rows="3" name="detail">{{old('detail')}}</textarea></div>



                                    <hr>

                                    <button type="submit" class="btn btn-facebook btn-user btn-block">
                                        <i class="fas fa-plus mr-4"></i> Tambah Paket
                                    </button>

                                    <hr>

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="pt-4 pr-4">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <input type="file" class="kurayami1" id="image-source1" onchange="previewImage(1);" name="image1" style="display: none;" />

                                            <div class="col-sm-12 d-flex justify-content-center mb-2" role="alert" style="height: 120px; background-color:#CACACA" onclick="" id="OpenImgUpload1">
                                                <img id="image-preview1" src="/assets/admin/empty.jpg" alt="image preview" style="height: 120px;" />
                                            </div>

                                            <input type="file" class="kurayami2" id="image-source2" onchange="previewImage(2);" name="image2" style="display: none;" />

                                            <div class="col-sm-12 d-flex justify-content-center mb-2" role="alert" style="height: 120px; background-color:#CACACA" onclick="" id="OpenImgUpload2">
                                                <img id="image-preview2" src="/assets/admin/empty.jpg" alt="image preview" style="height: 120px;" />
                                            </div>

                                            <input type="file" class="kurayami3" id="image-source3" onchange="previewImage(3);" name="image3" style="display: none;" />

                                            <div class="col-sm-12 d-flex justify-content-center" role="alert" style="height: 120px; background-color:#CACACA" onclick="" id="OpenImgUpload3">
                                                <img id="image-preview3" src="/assets/admin/empty.jpg" alt="image preview" style="height: 120px;" />
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