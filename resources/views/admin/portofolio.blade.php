@extends('layouts.dashapp')
@section('content')
<section class="content-header">
    <h1>
        Portofolio UMKMovement
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <!-- Main content -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Portofolio</h3>
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
                                <th>Nama Portofolio</th>
                                <th>Deskripsi Portofolio</th>
                                <th>Tgl Selesai</th>
                                <th>Foto Portofolio</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($portofolio as $p)
                            <tr>
                                <td>{{$p->nama_portofolio}}</td>
                                <td>{{$p->deskripsi_portofolio}}</td>
                                <td>{{date('d-m-Y', strtotime($p->tgl_selesai))}}</td>
                                <td>
                                    <img src="{{asset('imagesupload/portofolio/' .$p->foto_portofolio)}}" class="img-responsive" alt="..." style="max-height: 100px; max-width:200px; width: expression(this.width > 200 ? 200: true);">
                                </td>
                                <td>@if($p->is_done === 1)<span class=" pull-right badge bg-green">Selesai</span>
                                    @else <span class="pull-right badge bg-red">Pending</span>@endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a data-toggle="modal" data-target="#modal-portofolio-edit" data-id="{{$p->id}}" data-nama="{{$p->nama_portofolio}}" data-deskripsi="{{$p->deskripsi_portofolio}}" data-tgl="{{$p->tgl_selesai}}" data-status="{{$p->is_done}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        <a data-toggle="modal" data-target="#modal-portofolio-hapus" data-id="{{$p->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
                    <h4 class="modal-title">Tambah Portofolio</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{route('portofolio.store')}}" method="post" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Nama Portofolio</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Portofolio" name="nama_portofolio">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Deskripsi</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" placeholder="deskripsi" name="deskripsi_portofolio"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Tanggal selesai</label>
                                <div class="col-sm-8">
                                    <input type="text" id="datepicker" class="form-control" placeholder="Klik untuk memilih tanggal" name="tgl_selesai">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Status</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" style="width: 100%;" name="is_done">
                                        <option selected="selected" value="1">Selesai</option>
                                        <option value="0">Pending</option>
                                    </select>
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
    <div class="modal fade" id="modal-portofolio-edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Portofolio </h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{route('portofolio.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <input type="hidden" name="id" id="id" value="">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Nama Portofolio</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Portofolio" name="nama_portofolio" id="nama">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Deskripsi</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" placeholder="deskripsi" name="deskripsi_portofolio" id="deskripsi" value=""></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Tanggal selesai</label>
                                <div class="col-sm-8">
                                    <input type="text" id="datepicker" class="form-control" placeholder="Klik untuk memilih tanggal" name="tgl_selesai" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Status</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" style="width: 100%;" name="is_done" id="status" value="">
                                        <option selected="selected" value="1">Selesai</option>
                                        <option value="0">Pending</option>
                                    </select>
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
    <div class="modal modal-warning fade" id="modal-portofolio-hapus">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus</h4>
                </div>
                <form action="{{route('portofolio.destroy')}}" method="post" enctype="multipart/form-data">
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