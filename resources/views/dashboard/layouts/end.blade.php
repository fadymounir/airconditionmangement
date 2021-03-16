</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{env('projectPathFiles','/dashbaord')}}/plugins/jquery/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>
<script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script>
<script src="{{env('projectPathFiles','/dashbaord')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{env('projectPathFiles','/dashbaord')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="{{env('projectPathFiles','/dashbaord')}}/dist/js/adminlte.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>












@include('dashboard.layouts.scripts')
@include('dashboard.layouts.Datatable')

@yield('scripts')
@stack('custom-scripts')

</body>
</html>
