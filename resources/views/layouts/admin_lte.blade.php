<!DOCTYPE html>
<html>
@include('layouts.partials.head')
<body class="hold-transition skin-blue sidebar-mini layout-navbar-fixed">
<div class="wrapper">
  @include('sweetalert::alert')
  
  @include('layouts.partials.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('layouts.partials.left_side_bar')
            <!-- Content Wrapper. Contains page content -->
            <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        @yield('content-header')        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->  
  @include('layouts.partials.footer')
        </div>
        <!-- ./wrapper -->
        @include('layouts.partials.scripts')
    </body>
</html>