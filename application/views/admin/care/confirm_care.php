        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Order Confirmation</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            </div>
            <?php if ($this->session->flashdata('success')): ?>
              <div class="alert alert-success"  style="margin-top: 20px;" role="alert">
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>
                <?php echo $this->session->flashdata('success'); ?>
              </div>
            <?php endif; ?>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered text-center" id="example" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Order Name</th>
                      <th>Order Type</th>
                      <th>Order Date</th>
                      <th>Total Payment</th>
                      <th>Proof of Payment</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Order ID</th>
                      <th>Order Name</th>
                      <th>Order Type</th>
                      <th>Order Date</th>
                      <th>Total Payment</th>
                      <th>Proof of Payment</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach($confirm_data as $d_confirm):?>
                    <tr>
                      <td><?php echo $d_confirm->id_order;?></td>
                      <td><?php echo $d_confirm->nama_penerima;?></td>
                      <td><?php echo $d_confirm->nama_paket;?></td>
                      <td><?php echo exDate($d_confirm->tgl_order);?></td>
                      <td><?php echo 'Rp. '. rpCurrency($d_confirm->total);?></td>
                      <td><?php echo '<img class="someClass" src="'.base_url().'assets/img/bukti_transfer/'.$d_confirm->bukti_transfer.'" alt="'.$d_confirm->bukti_transfer.'" style="width:84px; height:59px;">'?></td>
                      <td><?php echo $d_confirm->no_telp;?></td>
                      <td><?php echo $d_confirm->alamat;?></td>
                      <td>
                        <a href=<?php echo 'confirm_care/'.$d_confirm->id_order?> class="btn btn-primary" onclick="return confirm('Apakah anda yakin akan menyetujui pesanan ini?')"><span class="fas fa-fw fa-check fa-sm"></span></a>
                        <a href=<?php echo 'tolak_care/'.$d_confirm->id_order?> class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menolak pesanan ini?')"><span class="fas fa-fw fa-times fa-sm"></span></a>
                      </td>
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