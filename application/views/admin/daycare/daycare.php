        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Detail Order Daycare</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            </div>
            <?php if ($this->session->flashdata('success')): ?>
              <div class="alert alert-success"  style="margin-top: 20px;" role="alert">
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
                <?php echo $this->session->flashdata('success'); ?>
              </div>
            <?php endif; ?>
            <div class="card col-md-8 offset-md-2">
              <h4 class="text-center mb-3">Filtering</h4>
              <div class="form-group row input-daterange">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" class="form-control" id="start_date" name="start_date" placeholder="Tanggal Awal" autocomplete="off" value="" required>
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="end_date" name="end_date" placeholder="Tanggal Akhir" autocomplete="off" value="" required>
                </div>
              </div>
              <div class="col-md-2 offset-md-5 mb-2">
                <button type="button" name="search" id="search_daycare" class="btn btn-info form-control"><span class="fa fa-filter"></span></button>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered text-center" id="example" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Order Name</th>
                      <th>Order Type</th>
                      <th>Total Daycare</th>
                      <th>Order Date</th>
                      <th>Total Payment</th>
                      <th>Proof of Payment</th>
                      <th>Phone</th>
                      <th>Address</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Order ID</th>
                      <th>Order Name</th>
                      <th>Order Type</th>
                      <th>Total Daycare</th>
                      <th>Order Date</th>
                      <th>Total Payment</th>
                      <th>Proof of Payment</th>
                      <th>Phone</th>
                      <th>Address</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach($daycare_data as $d_daycare):?>
                    <tr>
                      <td><?php echo $d_daycare->id_order_penitipan;?></td>
                      <td><?php echo $d_daycare->nama_penerima;?></td>
                      <td><?php echo $d_daycare->tipe_pet;?></td>
                      <td><?php echo $d_daycare->lama_penitipan;?></td>
                      <td><?php echo exDate($d_daycare->tgl_penitipan);?></td>
                      <td><?php echo 'Rp. '. rpCurrency($d_daycare->total);?></td>
                      <td><?php echo '<img class="someClass" src="'.base_url().'assets/img/bukti_transfer/'.$d_daycare->bukti_transfer.'" alt="'.$d_daycare->bukti_transfer.'" style="width:84px; height:59px;">'?></td>
                      <td><?php echo $d_daycare->no_telp;?></td>
                      <td><?php echo $d_daycare->alamat;?></td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- The Modal -->
<div id="myModal" class="modal-img">
  <span class="close-modal">&times;</span>
  <img class="modal-content-img" id="img01">
  <div id="caption"></div>
</div>

<script>

function showImageModal() {
  modal.style.display = "block";
  modalImg.src = this.src;
  modalImg.alt = this.alt;
  captionText.innerHTML = this.alt;
}

var modal = document.getElementById('myModal');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
var span = document.getElementsByClassName("close-modal")[0];

var images = document.querySelectorAll(".someClass");
for (let i = 0; i < images.length; i++) {
  images[i].addEventListener("click", showImageModal);
}
span.addEventListener("click", function() {
  modal.style.display = "none";
});
</script>

