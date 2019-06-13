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
                                <th>Judul Berita</th>
                                <th>Isi Berita</th>
                                <th>Tgl Berita</th>
                                <th>Foto Berita</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($berita as $ber)
                            <tr>
                                <td>{{$ber->nama_berita}}</td>
                                <td>{{Str::words($ber->isi_berita, $words = 10, $end = '...')}}</td>
                                <td>{{date('d-m-Y', strtotime($ber->tgl_berita))}}</td>
                                <td><img src="{{asset('imagesupload/berita/' .$ber->foto_filename)}}" class="img-responsive" alt="..." style="max-height: 100px; max-width:200px; width: expression(this.width > 200 ? 200: true);"></td>
                                <td>
                                    <div class="btn-group">
                                        <div class="col-sm-2">
                                            <a data-toggle="modal" data-target="#modal-berita-edit-{{$ber->id}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        </div>
                                        <div class="col-sm-2">
                                            <a data-toggle="modal" data-target="#modal-berita-hapus" data-id="{{$ber->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
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
                    <form class="form-horizontal" action="{{route('berita.store')}}" method="post" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Judul</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Judul" name="nama_berita" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">isi Berita</label>
                                <div class="col-sm-8">
                                    <textarea type="text" class="form-control" placeholder="isi berita" name="isi_berita" id="ckeditor" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Tanggal Berita</label>
                                <div class="col-sm-8">
                                    <input type="text" id="datepicker" class="form-control" placeholder="Klik untuk memilih tanggal" name="tgl_berita" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8">
                                    <label for="exampleInputFile">Upload Gambar</label>
                                    <input type="file" id="exampleInputFile" name="image" required>
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
    @foreach($berita as $ber)
    <div class="modal fade" id="modal-berita-edit-{{$ber->id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Berita </h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{route('berita.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <input type="hidden" name="id" id="id" value="{{$ber->id}}">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Judul</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Judul" name="nama_berita" id="nama" value="{{$ber->nama_berita}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">isi Berita</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" placeholder="deskripsi" name="isi_berita" id="ckeditor2" required>{!! $ber->isi_berita !!}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Tanggal Berita</label>
                                <div class="col-sm-8">
                                    <input type="text" id="datepicker" class="form-control" placeholder="Klik untuk memilih tanggal" name="tgl_berita" value="{{$ber->tgl_berita}}" required>
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
    @endforeach
    <!-- /.modal -->
    <div class="modal modal-warning fade" id="modal-berita-hapus">
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