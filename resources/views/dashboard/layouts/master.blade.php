@include('dashboard.layouts.header')
<!-- / start.navbar -->
@include('dashboard.layouts.nav')
<!-- / end . navbar -->
<!-- Main Sidebar Container -->
@include('dashboard.layouts.sideBar')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('content-header')

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- /.row -->
        @yield('content')
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->
@include('dashboard.layouts.footer')
@include('dashboard.layouts.end')
