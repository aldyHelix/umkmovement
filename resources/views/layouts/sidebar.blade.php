<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{url('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                @auth
                <p>{{ Auth::user()->name }}</p>
                @endauth
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">NAVIGASI UTAMA</li>
            <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li><a href="{{url('dashboard/portofolio')}}"><i class="fa fa-files-o"></i> <span>Portofolio</span></a></li>
            <li><a href="{{url('dashboard/berita')}}"><i class="fa fa-newspaper-o"></i> <span>Berita</span></a></li>
            <li><a href="{{url('dashboard/pengaturan')}}"><i class="fa fa-gear"></i> <span>Pengaturan Website</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>