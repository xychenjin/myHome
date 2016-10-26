<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Administrator | @yield('title', 'Dashboard')</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    @yield('style')
</head>
<body class="skin-blue fixed">

@include('admin::partials.header')

<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @yield('content-header')
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
    </aside>
    <!-- /.right-side -->
</div>
<!-- ./wrapper -->

<!-- add new calendar event modal -->
@yield('script')
</body>
</html>