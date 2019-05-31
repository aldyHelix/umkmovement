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
                    <h3>150</h3>

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
                    <h3>53<sup style="font-size: 20px">%</sup></h3>

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
                    <h3>65</h3>

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
        <div class="col-md-7">
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
                                    <td class="mailbox-date">{{$inbox->waktu_masuk}}</td>
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
        <!-- /.col -->
        <div class="col-lg-5 connectedSortable">
            <!-- col -->
            <!-- TO DO List -->
            <div class="box box-primary">
                <div class="box-header">
                    <i class="ion ion-clipboard"></i>

                    <h3 class="box-title">Jam Kerja</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                            <ul class="todo-list">
                                @foreach($jamker as $jamkerja)
                                <li>
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <div class="input-group">
                                                <input type="checkbox">
                                                <span class="text">{{$jamkerja->hari}}</span>
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control timepicker" placeholder="Mulai">

                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control timepicker" placeholder="Selesai">

                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix no-border">
                            <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Simpan</button>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</section>
@endsection