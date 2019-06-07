@extends('layouts.dashapp')
@section('content')
<section class="content-header">
    <h1>
        UMKMovement Halaman Kinerja
        <small>it all starts here</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{$countberita}}</h3>

                    <p>Berita Dibuat</p>
                </div>
                <div class="icon">
                    <i class="fa fa-newspaper-o"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$hasilkerja}}<sup style="font-size: 20px">%</sup></h3>

                    <p>Hasil Kerja</p>
                </div>
                <div class="icon">
                    <i class="fa fa-thumbs-up"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>44</h3>

                    <p>Pengunjung</p>
                </div>
                <div class="icon">
                    <i class="fa fa-male"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{$countpartner}}</h3>

                    <p>Partner</p>
                </div>
                <div class="icon">
                    <i class="fa fa-handshake-o"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- row -->
    <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Inbox</h3>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped">
                            <tbody>
                                @foreach($pesan as $inbox)
                                <tr>
                                    <td class="mailbox-name"><a href="#">{{$inbox->nama}}</a></td>
                                    <td class="mailbox-subject"><b>{{$inbox->email}}</b> - {{Str::words($inbox->pesan, $words = 10, $end = '...')}}
                                    </td>
                                    <td class="mailbox-date">{{$inbox->nomer_tlep}}</td>
                                    <td class="mailbox-date">{{date('d-m-Y H:i', strtotime($inbox->waktu_masuk))}}</td>
                                    <td>
                                    <div class="btn-group">
                                        <div class="col-sm-2">
                                            <a data-toggle="modal" href="#"  data-target="#modal-pesan-info-{{$inbox->id}}" class="btn btn-info btn-sm"><i class="fa fa-book"></i></a>
                                        </div>
                                        <div class="col-sm-2">
                                            <a data-toggle="modal" href="#" data-target="#modal-pesan-hapus-{{$inbox->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <!-- /.table -->
                    </div>
                    <!-- /.mail-box-messages -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer no-padding">
                    <div class="mailbox-controls">
                        <div class="pull-right">
                            {{$pesan->perPage() }}/{{$pesan->total()}}
                            <div class="btn-group">
                                {{$pesan->links()}}
                            </div>
                            <!-- /.btn-group -->
                        </div>
                        <!-- /.pull-right -->
                    </div>
                </div>
            </div>
            <!-- /. box -->
        </div>
    </div>
    <!-- /.row -->
    <!-- Modal pesan here-->
    @foreach($pesan as $inbox)
    <div class="modal modal-default fade" id="modal-pesan-info-{{$inbox->id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="box-body">
                            <dl class="dl-horizontal">
                                <dt>Pesan Dari</dt>
                                <dd>{{$inbox->nama}}</dd>
                                <dt>Email</dt>
                                <dd>{{$inbox->email}}</dd>
                                <dt>Nomer Tlepon</dt>
                                <dd>{{$inbox->nomer_tlep}}</dd>
                                <dt>Tgl Pesan</dt>
                                <dd>{{date('d-m-Y H:i:s', strtotime($inbox->waktu_masuk))}}</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row">
                        <div class="box-body">
                            <dl class="dl-horizontal">
                                <dt>Pesan</dt>
                                <dd><p>{{$inbox->pesan}}</p></dd>
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
    @foreach($pesan as $inbox)
        <div class="modal modal-warning fade" id="modal-pesan-hapus-{{$inbox->id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Pesan</h4>
                </div>
                <form action="{{route('pesan.delete')}}" method="post">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body">
                        <p>Apa kamu yakin akan menghapus Pesan ini?&hellip;</p>
                        <input type="hidden" name="id" value="{{$inbox->id}}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                        <button class="btn btn-primary">Hapus</button>
                    </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @endforeach
</section>

@endsection