<!-- plugins:js -->
<script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
<!-- jQuery -->
<script src="../../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- endinject -->
<!-- Plugin js for this page -->
<script src="../../assets/vendors/chart.js/Chart.min.js"></script>
<script src="../../assets/vendors/progressbar.js/progressbar.min.js"></script>
<script src="../../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
<script src="../../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="../../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="../../assets/js/off-canvas.js"></script>
<script src="../../assets/js/hoverable-collapse.js"></script>
<script src="../../assets/js/misc.js"></script>
<script src="../../assets/js/settings.js"></script>
<script src="../../assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="../../assets/js/dashboard.js"></script>
<!-- End custom js for this page -->

<!-- Custom js for this page -->
<script src="../../assets/js/chart.js"></script>
<!-- End custom js for this page -->

<!-- jQuery -->
<script src="../../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Sparkline -->
<script src="../../assets/plugins/sparklines/sparkline.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../assets/plugins/moment/moment.min.js"></script>
<script src="../../assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/dist/js/adminlte.js"></script>
<!-- SweetAlert2 -->
<script src="../../assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../../assets/plugins/toastr/toastr.min.js"></script>

<?php @session_start();
    if ($_SESSION['level'] == 'admin')  { ?>
     <!-- DataTables  & Plugins -->
     <script src="../../assets/plugins/datatables/jquery.dataTables.min.js"></script>
     <script src="../../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
     <script src="../../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
     <script src="../../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
     <script src="../../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
     <script src="../../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
     <script src="../../assets/plugins/jszip/jszip.min.js"></script>
     <script src="../../assets/plugins/pdfmake/pdfmake.min.js"></script>
     <script src="../../assets/plugins/pdfmake/vfs_fonts.js"></script>
     <script src="../../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
     <script src="../../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
     <script src="../../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
     <script>
         $(function() {
             $("#dataTablesNya").DataTable({
                 "responsive": true,
                 "lengthChange": false,
                 "autoWidth": false,
                 "buttons": ["excel", "pdf", "print"]
             }).buttons().container().appendTo('#dataTablesNya_wrapper .col-md-6:eq(0)');
             $('#example2').DataTable({
                 "paging": true,
                 "lengthChange": false,
                 "searching": false,
                 "ordering": true,
                 "info": true,
                 "autoWidth": false,
                 "responsive": true,
             });
         });
     </script>
 <?php } ?>