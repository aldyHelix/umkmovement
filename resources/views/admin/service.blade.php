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
                                <th>logo servis</th>
                                <th>Nama Layanan</th>
                                <th>Tagline</th>
                                <th>Harga dari</th>
                                <th>Harga Sampai</th>
                                <th>% Skill</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($service as $ser)
                            <tr>
                                <td><i class="fa fa-{{$ser->logo_name}} fa-3x"></i></td>
                                <td>{{$ser->nama_service}}</td>
                                <td>{{$ser->tagline}}</td>
                                <td>Rp {{number_format($ser->range_1, 0, "." , ".")}}</td>
                                <td>Rp {{number_format($ser->range_2, 0, "." , ".")}}</td>
                                <td>{{$ser->persentase}} %</td>
                                <td>
                                    <div class="btn-group">
                                        <div class="col-sm-2">
                                            <a data-toggle="modal" href="#" data-target="#modal-service-info-{{$ser->id}}" class="btn btn-info btn-sm"><i class="fa fa-book"></i></a>
                                        </div>
                                        <div class="col-sm-2">
                                            <a data-toggle="modal" href="#" data-target="#modal-service-edit-{{$ser->id}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        </div>
                                        <div class="col-sm-2">
                                            <a data-toggle="modal" data-target="#modal-service-hapus" data-id="{{$ser->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
                    <h4 class="modal-title">Tambah Layanan</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{route('service.store')}}" method="post" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Nama Layanan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Layanan" name="nama_layanan" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Tagline</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Tagline" name="tagline" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Harga Mulai</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Harga awal tanpa (.) titik" name="range_1" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Harga Maksimal</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Harga maksimal tanpa (.) titik" name="range_2" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Layanan 1</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Fitur Layanan 1" name="fitur_1" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Layanan 2</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Fitur Layanan 2" name="fitur_2" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Layanan 3</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Fitur Layanan 3" name="fitur_3" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Layanan 4</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Fitur Layanan 4" name="fitur_4" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Layanan 5</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Fitur Layanan 5" name="fitur_5" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Persentase Skill</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="masukkan persentase skill" name="persentase" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Pilih Logo</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" style="width: 100%;" name="logo_name" required>
                                        <option selected="selected" value="camera">Kamera</option>
                                        <option value="pencil-square-o">Editing</option>
                                        <option value="newspaper-o">Newspaper</option>
                                        <option value="handshake-o">Kerjasama</option>
                                        <option value="money">Keuangan</option>
                                        <option value="globe">Global</option>
                                        <option value="magic">Magic</option>
                                        <option value="gift">Kotak Kado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Deskripsi</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" placeholder="isi Deskripsi layanan" name="deskripsi" id="ckeditor-add" required></textarea>
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
    @foreach($service as $ser)
    <div class="modal fade" id="modal-service-edit-{{$ser->id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Ubah Layanan</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="{{route('service.update')}}" method="post" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="box-body">
                            <input type="hidden" name="id" id="id" value="{{$ser->id}}">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Nama Layanan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Layanan" name="nama_layanan" id="nama_layanan" value="{{$ser->nama_service}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Tagline</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Tagline" name="tagline" id="tagline" value="{{$ser->tagline}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Harga Mulai</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Harga awal tanpa (.) titik" name="range_1" id="range1" value="{{$ser->range_1}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Harga Maksimal</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Masukkan Harga maksimal tanpa (.) titik" name="range_2" id="range2" value="{{$ser->range_2}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Layanan 1</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Fitur Layanan 1" name="fitur_1" id="fitur1" value="{{$ser->fitur_1}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Layanan 2</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Fitur Layanan 2" name="fitur_2" id="fitur2" value="{{$ser->fitur_2}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Layanan 3</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Fitur Layanan 3" name="fitur_3" id="fitur3" value="{{$ser->fitur_3}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Layanan 4</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Fitur Layanan 4" name="fitur_4" id="fitur4" value="{{$ser->fitur_4}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Layanan 5</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Fitur Layanan 5" name="fitur_5" id="fitur5" value="{{$ser->fitur_5}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Persentase Skill</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="masukkan persentase skill" name="persentase" id="persentase" value="{{$ser->persentase}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Pilih Logo</label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" style="width: 100%;" name="logo_name" required>
                                        <option selected="selected" value="camera">Kamera</option>
                                        <option value="pencil-square-o">Editing</option>
                                        <option value="newspaper-o">Newspaper</option>
                                        <option value="handshake-o">Kerjasama</option>
                                        <option value="money">Keuangan</option>
                                        <option value="globe">Global</option>
                                        <option value="magic">Magic</option>
                                        <option value="gift">Kotak Kado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Deskripsi</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" placeholder="isi Deskripsi layanan" name="deskripsi" id="ckeditor-{{$ser->id}}" required>{!! $ser->deskripsi !!}</textarea>
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
    <!-- /.modal -->
    <div class="modal modal-warning fade" id="modal-service-hapus">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Data</h4>
                </div>
                <form action="{{route('service.destroy')}}" method="post">
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
    @foreach($service as $ser)
    <div class="modal modal-default fade" id="modal-service-info-{{$ser->id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-{{$ser->logo_name}}"></i>{{$ser->nama_service}}</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="box-body">
                            <dl class="dl-horizontal">
                                <dt>Tagline</dt>
                                <dd>{{$ser->tagline}}</dd>
                                <dt>Range Harga</dt>
                                <dd>Rp {{number_format($ser->range_1, 0, "." , ".")}} Sampai Rp {{number_format($ser->range_2, 0, "." , ".")}}</dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt>Persentase skill</dt>
                                <dd>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="{{$ser->persentase}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$ser->persentase}}%">
                                            <span class="sr-only">Skill pengerjaan sampai dengan {{$ser->persentase}}%</span>
                                        </div>
                                    </div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row">
                        <div class="box-body">
                            <dl class="dl-horizontal">
                                <dt>Fitur pengerjaan</dt>
                                <dd>
                                    <li>{{$ser->fitur_1}}</li>
                                    <li>{{$ser->fitur_2}}</li>
                                    <li>{{$ser->fitur_3}}</li>
                                    <li>{{$ser->fitur_4}}</li>
                                    <li>{{$ser->fitur_5}}</li>
                                </dd>
                                <dt>Deskripsi Layanan</dt>
                                <dd>
                                    <p>{!! $ser->deskripsi !!}</p>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Kembali</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @endforeach
    <!-- /.modal -->
</section>
@endsection
@section('js')
<script>
    CKEDITOR.replace('ckeditor-add');
</script>

@foreach($service as $ser)
<script>
    CKEDITOR.replace('ckeditor-{{$ser->id}}');
</script>
@endforeach
@endsection