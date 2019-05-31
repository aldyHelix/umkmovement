@extends('layouts.dashapp')
@section('content')
<section class="content-header">
    <h1>
        Pengaturan Web UMKMovement
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Update Tentang Kami</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Headline</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Headline">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="inputPassword3" placeholder="Keterangan"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Simpan</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Daftar Partner Kami</h3>
                    <button data-toggle="modal" data-target="#modal-partner" class="btn btn-info pull-right">
                        <span>
                            <i class="fa fa-plus"></i> Tambah
                        </span>
                    </button>
                </div>
                <div class="box-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Nama Logo / Nama perusahaan</label>
                            <div class="col-sm-5">
                                <img src="{{asset('images/logos/themeforest.jpg')}}" class="img-responsive" alt="...">
                            </div>
                            <div class="col-sm-2">
                                <a data-toggle="modal" data-target="#modal-hapuspartner" class="btn btn-danger pull-right">
                                    <span>
                                        <i class="fa fa-trash"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Daftar Kontak</h3>
                    <button data-toggle="modal" data-target="#modal-kontak" class="btn btn-info pull-right">
                        <span>
                            <i class="fa fa-plus"></i> Tambah
                        </span>
                    </button>
                </div>
                <div class="box-body">
                    <form class="form-horizontal">
                        @foreach($kontak as $k)
                        <div class="form-group">
                            <dl class="dl-horizontal col-sm-8 ">
                                <dt>{{$k->nama}}</dt>
                                <dd>{{$k->keterangan}}
                                <dd>
                            </dl>
                            <div class="col-sm-2 pull-right">
                                <div class="row">
                                    <a data-toggle="modal" data-target="#modal-kontak-edit" class="btn btn-info">
                                        <span>
                                            <i class="fa fa-pencil"></i>
                                        </span>
                                    </a>
                                    <a data-toggle="modal" data-target="#modal-kontak-hapus" class="btn btn-danger">
                                        <span>
                                            <i class="fa fa-trash"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Ubah Password Admin</h3>
                </div>
                <form class="form-horizontal">
                    <div class="box-body">
                        <div class="callout callout-danger">
                            <h4>Selalu ingat password anda!</h4>
                            <p>
                                Untuk menjaga keamanan data didalam website ini diberlakukan 1 user. dan tidak ada fitur untuk lupa password.
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Password Lama</label>

                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="inputEmail3" placeholder="Password Lama">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Password Baru</label>

                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password Baru">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Ulangi Password Baru</label>

                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Ulangi Password Bru">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-partner">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Partner</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nama Partner</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Headline">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <label for="exampleInputFile">Upload Gambar</label>
                                    <input type="file" id="exampleInputFile">
                                    <p class="help-block">Maksimal ukuran file 1 Mb, maksimal ukuran 250 pixel x 250 pixel</p>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <div class="modal fade" id="modal-kontak">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Kontak</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nama Kontak</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Headline">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPassword3" placeholder="Keterangan">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <div class="modal fade" id="modal-kontak-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Ubah Kontak</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nama Kontak</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Headline">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="inputPassword3" placeholder="Keterangan"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <div class="modal modal-warning fade" id="modal-kontak-hapus">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Kontak</h4>
                </div>
                <div class="modal-body">
                    <p>One fine body&hellip;</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-danger">Hapus</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <div class="modal modal-warning fade" id="modal-hapuspartner">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Data</h4>
                </div>
                <div class="modal-body">
                    <p>One fine body&hellip;</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-primary">Hapus</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</section>
@endsection