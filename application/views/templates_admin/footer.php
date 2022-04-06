  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url();?>logout">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/backend/');?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/backend/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/backend/');?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/backend/');?>js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <!-- <script src="<?php echo base_url('assets/backend/');?>vendor/chart.js/Chart.min.js"></script> -->
  <!-- <script src="<?php echo base_url('assets/backend/');?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url('assets/backend/');?>vendor/datatables/dataTables.bootstrap4.min.js"></script> -->

  <!-- Page level custom scripts -->
  <!-- <script src="<?php echo base_url('assets/backend/');?>js/demo/chart-area-demo.js"></script>
  <script src="<?php echo base_url('assets/backend/');?>js/demo/chart-pie-demo.js"></script>
  <script src="<?php echo base_url('assets/backend/');?>js/demo/datatables-demo.js"></script> -->

  <!-- Datatables -->
  <script src="<?php echo base_url('assets/backend/datatables/');?>DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url('assets/backend/datatables/');?>DataTables-1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url('assets/backend/datatables/');?>Buttons-1.6.1/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo base_url('assets/backend/datatables/');?>Buttons-1.6.1/js/buttons.bootstrap4.min.js"></script>
  <script src="<?php echo base_url('assets/backend/datatables/');?>JSZip-2.5.0/jszip.min.js"></script>
  <script src="<?php echo base_url('assets/backend/datatables/');?>pdfmake-0.1.36/pdfmake.min.js"></script>
  <script src="<?php echo base_url('assets/backend/datatables/');?>pdfmake-0.1.36/vfs_fonts.js"></script>
  <script src="<?php echo base_url('assets/backend/datatables/');?>Buttons-1.6.1/js/buttons.html5.min.js"></script>
  <script src="<?php echo base_url('assets/backend/datatables/');?>Buttons-1.6.1/js/buttons.print.min.js"></script>
  <script src="<?php echo base_url('assets/backend/datatables/');?>Buttons-1.6.1/js/buttons.colVis.min.js"></script>
  <script src="<?php echo base_url('assets/backend/vendor/');?>datepicker/js/bootstrap-datepicker.min.js"></script>
  

<script type="text/javascript">

$(document).ready(function() {
  var table = $('#example').DataTable( {
    lengthChange: false,
    buttons: [ 'print', 'excel', 'pdf', 'colvis' ]
  } );

  table.buttons().container()
    .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );



  </script>

  <script type="text/javascript" language="javascript" >
      $(document).ready(function(){
        $('.input-daterange').datepicker({
          format: "yyyy-mm-dd",
          autoclose: true
        });

        /*$('#example').DataTable({

        });*/

        $('#search').click(function(){ 
          var start_date = $('#start_date').val();
          var end_date = $('#end_date').val();
          if(start_date != '' && end_date !='')
          {
            $('#example').DataTable().destroy();
            $('#example').DataTable({
              "processing" : true,
              "order" : [],
              "ajax" : {
                url: '<?php echo base_url().'search' ?>',
                type:"POST",
                data:{
                  start_date:start_date, end_date: end_date
                }
              },
              "lengthChange" : false,
              "dom": "Bfrtip",
              "buttons": ['print', 'excel', 'pdf', 'colvis'],
              "columns": [
                  { "data": "id_pesanan" },
                  { "data": "nama_penerima" },
                  { "data": "tgl_pemesanan" },
                  { "data": "total" },
                  { "data": "bukti_transfer" },
                  { "data": "no_telp" },
                  { "data": "alamat" }
              ]
            });
            $('#example').DataTable().buttons().container()
    .appendTo( '#example_wrapper .col-md-6:eq(0)' );
          }
          else
          {
            alert("Both Date is Required");
          }
        });
        
      });
    </script>

  <script type="text/javascript" language="javascript" >
      $(document).ready(function(){
        $('.input-daterange').datepicker({
          format: "yyyy-mm-dd",
          autoclose: true
        });

        /*$('#example').DataTable({

        });*/

        $('#search_care').click(function(){ 
          var start_date = $('#start_date').val();
          var end_date = $('#end_date').val();
          if(start_date != '' && end_date !='')
          {
            $('#example').DataTable().destroy();
            $('#example').DataTable({
              "processing" : true,
              "order" : [],
              "ajax" : {
                url: '<?php echo base_url().'search_care' ?>',
                type:"POST",
                data:{
                  start_date:start_date, end_date: end_date
                }
              },
              "lengthChange" : false,
              "dom": "Bfrtip",
              "buttons": ['print', 'excel', 'pdf', 'colvis'],
              "columns": [
                  { "data": "id_order" },
                  { "data": "nama_penerima" },
                  { "data": "nama_paket" },
                  { "data": "tgl_order" },
                  { "data": "total" },
                  { "data": "bukti_transfer" },
                  { "data": "no_telp" },
                  { "data": "alamat" }
              ]
            });
            $('#example').DataTable().buttons().container()
    .appendTo( '#example_wrapper .col-md-6:eq(0)' );
          }
          else
          {
            alert("Both Date is Required");
          }
        });
        
      });
    </script>

  <script type="text/javascript" language="javascript" >
      $(document).ready(function(){
        $('.input-daterange').datepicker({
          format: "yyyy-mm-dd",
          autoclose: true
        });

        /*$('#example').DataTable({

        });*/

        $('#search_daycare').click(function(){ 
          var start_date = $('#start_date').val();
          var end_date = $('#end_date').val();
          if(start_date != '' && end_date !='')
          {
            $('#example').DataTable().destroy();
            $('#example').DataTable({
              "processing" : true,
              "order" : [],
              "ajax" : {
                url: '<?php echo base_url().'search_daycare' ?>',
                type:"POST",
                data:{
                  start_date:start_date, end_date: end_date
                }
              },
              "lengthChange" : false,
              "dom": "Bfrtip",
              "buttons": ['print', 'excel', 'pdf', 'colvis'],
              "columns": [
                  { "data": "id_order_penitipan" },
                  { "data": "nama_penerima" },
                  { "data": "tipe_pet" },
                  { "data": "lama_penitipan" },
                  { "data": "tgl_penitipan" },
                  { "data": "total" },
                  { "data": "bukti_transfer" },
                  { "data": "no_telp" },
                  { "data": "alamat" }
              ]
            });
            $('#example').DataTable().buttons().container()
    .appendTo( '#example_wrapper .col-md-6:eq(0)' );
          }
          else
          {
            alert("Both Date is Required");
          }
        });
        
      });
    </script>

</body>

</html>