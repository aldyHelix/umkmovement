@extends('layouts.dashapp')
@section('content')
<section class="content-header">
    <h1>
        Berita untuk UMKMovement
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <!-- Main content -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Berita</h3>
                    <button data-toggle="modal" data-target="#modal-tambah" class="btn btn-info pull-right">
                        <span>
                            <i class="fa fa-plus"></i> Tambah
                        </span>
                    </button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Judul Berita</th>
                                <th>Isi Berita</th>
                                <th>Tgl Berita</th>
                                <th>Foto Berita</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Ternyata Nenek Ini Bisa Menghilang!</td>
                                <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                </td>
                                <td>12 jan 2000</td>
                                <td><img src="{{asset('images/logos/themeforest.jpg')}}" class="img-responsive" alt="..."></td>
                                <td>
                                    <div class="btn-group">
                                        <a data-toggle="modal" data-target="#modal-edit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        <a data-toggle="modal" data-target="#modal-hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
    </div>
    <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Berita</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{route('berita.store')}}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Judul</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Judul" name="nama_berita">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">isi Berita</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" placeholder="deskripsi" name="isi_berita"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Tanggal Berita</label>
                                <div class="col-sm-8">
                                    <input type="text" id="datepicker" class="form-control" placeholder="Klik untuk memilih tanggal" name="tgl_berita">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <label for="exampleInputFile">Upload Gambar</label>
                                    <input type="file" id="exampleInputFile" name="image">
                                    <p class="help-block">Maksimal ukuran file 1 Mb, maksimal ukuran 250 pixel x 250 pixel</p>
                                </div>

                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                            <button class="btn btn-primary pull-right">Simpan</button>
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
    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Berita </h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{route('berita.update')}}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Judul</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Judul" name="nama_berita">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">isi Berita</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" placeholder="deskripsi" name="isi_berita"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Tanggal Berita</label>
                                <div class="col-sm-8">
                                    <input type="text" id="datepicker" class="form-control" placeholder="Klik untuk memilih tanggal" name="tgl_berita">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <label for="exampleInputFile">Upload Gambar</label>
                                    <input type="file" id="exampleInputFile" name="image">
                                    <p class="help-block">Maksimal ukuran file 1 Mb, maksimal ukuran 250 pixel x 250 pixel</p>
                                </div>

                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                            <button class="btn btn-primary pull-right">Simpan</button>
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
    <div class="modal modal-warning fade" id="modal-hapus">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Berita</h4>
                </div>
                <form action="{{route('berita.destroy')}}" method="post">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body">
                        <p>Apa kamu yakin akan menghapus Data ini?&hellip;</p>
                        <input type="hidden" name="id" id="cat_id" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                        <button class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</section>
<script>
    $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>
@endsection