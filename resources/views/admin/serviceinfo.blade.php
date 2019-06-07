@section('content')
<div class="col-md-12">
    <div class="box box-solid">
        <div class="box-header with-border">
            <i class="fa fa-text-width"></i>

            <h3 class="box-title">Deskripsi Layanan</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <dl class="dl-horizontal">
                <dt>Nama Layanan</dt>
                <dd>{{$service->nama_layanan}}
                </dd>
                <dt>Tagline</dt>
                <dd>
                    <p id="tagline"></p>
                </dd>
                <dt>Harga</dt>
                <dt>Malesuada porta</dt>
                <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                <dt>Felis euismod semper eget lacinia</dt>
                <dd>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo
                    sit amet risus.
                </dd>
            </dl>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<!-- ./col -->
@endsection