<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/admin/images/favicon.ico">

    <title>Mucit Genç Yönetim Paneli</title>

    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="/admin/assets/vendor_components/bootstrap/dist/css/bootstrap.css">

    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="/admin/main/css/bootstrap-extend.css">

    <!-- theme style -->
    <link rel="stylesheet" href="/admin/main/css/master_style.css">

    <!-- Fab Admin skins -->
    <link rel="stylesheet" href="/admin/main/css/skins/_all-skins.css">

    <!-- Vector CSS -->
    <link href="/admin/assets/vendor_components/jvectormap/lib2/jquery-jvectormap-2.0.2.css" rel="stylesheet" />

    <!-- Morris charts -->
    <link rel="stylesheet" href="/admin/assets/vendor_components/morris.js/morris.css">

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">

    <!-- Tinymce -->
    <script src="https://cdn.tiny.cloud/1/guga53l51d8lxq6hmvluiuvqfj89iqdblnwjsdjuwy7gqteo/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

@yield('css')


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
@include('admin.header')
@include('admin.sidebar')
    <div class="content-wrapper">
        <section class="content">
            @yield('icerik')
        </section>
    </div>
@include('admin.footer')
</div>



<!-- jQuery 3 -->
<script src="/admin/assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="/admin/assets/vendor_components/jquery-ui/jquery-ui.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- popper -->
<script src="/admin/assets/vendor_components/popper/dist/popper.min.js"></script>

<!-- Bootstrap 4.0-->
<script src="/admin/assets/vendor_components/bootstrap/dist/js/bootstrap.js"></script>

<!-- ChartJS -->
<script src="/admin/assets/vendor_components/chart.js-master/Chart.min.js"></script>

<!-- Slimscroll -->
<script src="/admin/assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- FastClick -->
<script src="/admin/assets/vendor_components/fastclick/lib/fastclick.js"></script>

<!-- peity -->
<script src="/admin/assets/vendor_components/jquery.peity/jquery.peity.js"></script>

<!-- Morris.js charts -->
<script src="/admin/assets/vendor_components/raphael/raphael.min.js"></script>
<script src="/admin/assets/vendor_components/morris.js/morris.min.js"></script>

<!-- Fab Admin App -->
<script src="/admin/main/js/template.js"></script>

<!-- Fab Admin dashboard demo (This is only for demo purposes) -->
<script src="/admin/main/js/pages/dashboard.js"></script>

<!-- Fab Admin for demo purposes -->
<script src="/admin/main/js/demo.js"></script>

<!-- Vector map JavaScript -->
<script src="/admin/assets/vendor_components/jvectormap/lib2/jquery-jvectormap-2.0.2.min.js"></script>
<script src="/admin/assets/vendor_components/jvectormap/lib2/jquery-jvectormap-world-mill-en.js"></script>
<script src="/admin/assets/vendor_components/jvectormap/lib2/jquery-jvectormap-us-aea-en.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
@yield('js')

</body>
</html>
