<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('js/admin/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('js/admin/jquery.dataTables.js') }}"></script>
<script src="{{ asset('js/admin/dataTables.bootstrap4.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('js/admin/select2.full.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('js/admin/moment.min.js') }}"></script>
<script src="{{ asset('js/admin/daterangepicker.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/admin/adminlte.min.js') }}"></script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2({
          theme: 'bootstrap4'
        });
    });
</script>
@yield('script')