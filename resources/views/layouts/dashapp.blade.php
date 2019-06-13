<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UMKMovement | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('adminlte/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminlte/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('adminlte/dist/css/skins/_all-skins.min.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('adminlte/bower_components/morris.js/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('adminlte/bower_components/jvectormap/jquery-jvectormap.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

    <link rel="stylesheet" href="{{asset('adminlte/plugins/timepicker/bootstrap-timepicker.min.css')}}">

    <link rel="stylesheet" href="{{asset('adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">

    <link rel="stylesheet" href="{{asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    @section('css')
    @show
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('layouts.header')
        @include('layouts.sidebar')
        <div class="content-wrapper">
            @yield('content')
        </div>
        @include('layouts.footer')
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="{{asset('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('adminlte/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Morris.js charts -->
    <script src="{{asset('adminlte/bower_components/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('adminlte/bower_components/morris.js/morris.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
    <!-- jvectormap -->
    <script src="{{asset('adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('adminlte/bower_components/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- datepicker -->
    <script src="{{asset('adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <!-- Slimscroll -->
    <script src="{{asset('adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('adminlte/bower_components/fastclick/lib/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('adminlte/dist/js/pages/dashboard.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('adminlte/dist/js/demo.js')}}"></script>
    <script src="{{asset('adminlte/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
    <script src="{{asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    @section('js')
    @yield('js')

    @show

    <script>
        CKEDITOR.replace('ckeditor');
        CKEDITOR.replace('ckeditor2');
        CKEDITOR.replace('ckeditor3');
        CKEDITOR.replace('ckeditor4');
    </script>
    <script>
        $(function() {
            $('.timepicker').timepicker({
                showInputs: false
            });
        });
        //Date picker
        $('#datepicker').datepicker({
            format: '{{config("app.date_format_js")}}',
            autoclose: true
        });

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
    <script>
        $('#modal-kontak-edit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var title = button.data('mytitle')
            var description = button.data('mydescription')
            var cat_id = button.data('catid')
            var modal = $(this)

            modal.find('.modal-body #nama').val(title);
            modal.find('.modal-body #keterangan').val(description);
            modal.find('.modal-body #cat_id').val(cat_id);
        })

        $('#modal-hapuspartner').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var cat_id = button.data('catid')
            var modal = $(this)
            modal.find('.modal-body #cat_id').val(cat_id);
        })

        $('#modal-kontak-hapus').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var cat_id = button.data('catid')
            var modal = $(this)
            modal.find('.modal-body #cat_id').val(cat_id);
        })


        $('#modal-portofolio-hapus').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })

        $('#modal-berita-hapus').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })

        $(document).on('ajaxComplete ready', function() {
            $('.modal-service-info').off('click').on('click', function() {
                $('#modalMdContent').load($(this).attr('value'));
                $('#modalMdTitle').html($(this).attr('title'));
            });
        });

        //        $('#modal-service-info').on('show.bs.modal', function(event) {
        //            var button = $(event.relatedTarget)
        //           var nama_layanan = button.data('nama_layanan')
        //           var tagline = button.data('tagline')
        //           var range1 = button.data('range1')
        //           var range2 = button.data('range2')
        //          var fitur1 = button.data('fitur1')
        //           var fitur2 = button.data('fitur2')
        //           var fitur3 = button.data('fitur3')
        //           var fitur4 = button.data('fitur4')
        //           var fitur5 = button.data('fitur5')
        //           var persentase = button.data('persentase')
        //           var deskripsi = button.data('deskripsi')
        //           var id = button.data('id')
        //           var modal = $(this)
        //
        //            modal.find('#id').text(id);
        //            modal.find('#nama_layanan').html(nama_layanan);
        //            modal.find('#tagline').val(tagline);
        //           modal.find('#range1').val(range1);
        //           modal.find('#range2').val(range2);
        //           modal.find('#fitur1').val(fitur1);
        //           modal.find('#fitur2').val(fitur2);
        //           modal.find('#fitur3').val(fitur3);
        //            modal.find('#fitur4').val(fitur4);
        //           modal.find('#fitur5').val(fitur5);
        //           modal.find('#persentase').val(persentase);
        //          modal.find('#deskripsi').val(deskripsi);
        //       })
        $('#modal-service-hapus').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })
    </script>
</body>

</html>