<!DOCTYPE html>
<html>

@include('admin.common.top')
@include('admin.common.header')




<!-- Left side column. contains the sidebar -->


<!-- Content Wrapper. Contains page content -->

<div class="main-container container-fluid">
    <div class="page-container">
        <!-- Page Sidebar -->
        <div class="page-sidebar" id="sidebar">
            <!-- Page Sidebar Header-->
            <div class="sidebar-header-wrapper">
                <input class="searchinput" type="text">
                <i class="searchicon fa fa-search"></i>
                <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
            </div>
            <!-- /Page Sidebar Header -->
            <!-- Sidebar Menu -->
        @include('admin.common.left')
        <!-- /Sidebar Menu -->
        </div>

        <!-- /Page Sidebar -->
        <!-- Page Content -->

        <div class="page-content">
            @section('content')
                All content goes here
            @show
        </div>
        <!-- /Page Body -->
    </div>
    <!-- /Page Content -->
</div>



    <!-- /content -->



<!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
@include('admin.common.bottom')

@yield('jscript')

</body>
</html>
