<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  {{-- <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css"> --}}
  <link rel="stylesheet" href="{{ asset('/css/app.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  @livewireStyles
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
    @include('layouts.partials.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    @include('layouts.partials.aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    {{ $slot }}
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
    @include('layouts.partials.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@livewireScripts
<script src="{{ asset('/js/app.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $(document).ready(function(){
      toastr.options = {
        "positionClass": "toast-bottom-right",
        "progressBar": true,
      }

        window.addEventListener('hide-form', event => {
        $('#formModal').modal('hide');
        toastr.success(event.detail.message, 'Success!')
      });
        window.addEventListener('hide-delete-modal', event => {
        $('#confirmationModal').modal('hide');
        toastr.success(event.detail.message, 'Success!')
      });
    });
</script>
<script>
  window.addEventListener('show-form', event => {
    $('#formModal').modal('show');
    
  });
 window.addEventListener('show-delete-modal', event => {
  $('#confirmationModal').modal('show');
 });
</script>
<!-- jQuery -->
{{-- <script src="plugins/jquery/jquery.min.js"></script> --}}
<!-- Bootstrap 4 -->
{{-- <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
<!-- AdminLTE App -->
{{-- <script src="dist/js/adminlte.min.js"></script> --}}
</body>
</html>