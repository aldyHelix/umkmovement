@extends('layouts.dashapp')
@section('content')
<section class="content-header">
    <h1>
        Daftar Layanan UMKMovement
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <!-- Main content -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Layanan</h3>
                    <button data-toggle="modal" data-target="#modal-tambah" class="btn btn-info pull-right">
                        <span>
                            <i class="fa fa-plus"></i> Tambah
                        </span>
                    </button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @if (session('success'))
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-info"></i>Perhatian!</h4>
                        {{ session('success') }}
                    </div>
                    @endif
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nama Layanan</th>
                                <th>Tagline</th>
                                <th>Harga dari</th>
                                <th>Harga Sampai</th>
                                <th>Deskripsi</th>
                                <th>% Skill</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Jasa Pijat</td>
                                <td>Kita memberikan pijatan terbaik dari alatberat terberat
                                </td>
                                <td>55</td>
                                <td>55.000.000</td>
                                <td>dengan memberikan pijatan terbaik kami. bla bla bala bala</td>
                                <td>1000 %</td>
                                <td>
                                    <div class="btn-group">
                                        <div class="col-sm-2">
                                            <a data-toggle="modal" data-target="#modal-service-edit" data-id="" data-nama="" data-deskripsi="" data-tgl="" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        </div>
                                        <div class="col-sm-2">
                                            <a data-toggle="modal" data-target="#modal-service-hapus" data-id="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        </div>
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
                    <h4 class="modal-title">Tambah Layanan</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Nama Layanan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Judul" name="nama_berita">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Tagline</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Judul" name="nama_berita">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Harga Mulai</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Judul" name="nama_berita">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Harga Maksimal</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Judul" name="nama_berita">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Layanan 1</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Judul" name="nama_berita">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Layanan 2</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Judul" name="nama_berita">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Layanan 3</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Judul" name="nama_berita">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Layanan 4</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Judul" name="nama_berita">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Layanan 5</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Judul" name="nama_berita">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Persentase Skill</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Judul" name="nama_berita">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Pilih Logo</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" style="width: 100%;" name="is_done" id="status" value="">
                                        <option selected="selected" value="1">Kamera</option>
                                        <option value="0">Editing</option>
                                        <option value="0">Newspaper</option>
                                        <option value="0">Kerjasama</option>
                                        <option value="0">Keuangan</option>
                                        <option value="0">Global</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Deskripsi</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" placeholder="isi berita" name="isi_berita"></textarea>
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
    <div class="modal fade" id="modal-service-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Ubah Layanan</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Nama Layanan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Judul" name="nama_berita">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Tagline</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Judul" name="nama_berita">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Harga Mulai</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Judul" name="nama_berita">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Harga Maksimal</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Judul" name="nama_berita">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Layanan 1</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Judul" name="nama_berita">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Layanan 2</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Judul" name="nama_berita">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Layanan 3</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Judul" name="nama_berita">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Layanan 4</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Judul" name="nama_berita">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Layanan 5</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Judul" name="nama_berita">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Persentase Skill</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Judul" name="nama_berita">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Pilih Logo</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" style="width: 100%;" name="is_done" id="status" value="">
                                        <option selected="selected" value="1">Kamera</option>
                                        <option value="0">Editing</option>
                                        <option value="0">Newspaper</option>
                                        <option value="0">Kerjasama</option>
                                        <option value="0">Keuangan</option>
                                        <option value="0">Global</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Deskripsi</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" placeholder="isi berita" name="isi_berita"></textarea>
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
    <div class="modal modal-warning fade" id="modal-berita-hapus">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Berita</h4>
                </div>
                <form action="#" method="post">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body">
                        <p>Apa kamu yakin akan menghapus Data ini?&hellip;</p>
                        <input type="hidden" name="id" id="id" value="">
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