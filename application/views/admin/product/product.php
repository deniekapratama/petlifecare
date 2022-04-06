        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Product</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a href="<?php echo base_url();?>add_product" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add Product</span>
              </a>
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
                      <th>Product ID</th>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Description</th>
                      <th>Picture</th>
                      <th>Price</th>
                      <th>Stock</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Product ID</th>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Description</th>
                      <th>Picture</th>
                      <th>Price</th>
                      <th>Stock</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach($product_data as $d_product):?>
                    <tr>
                      <td><?php echo $d_product->id_barang;?></td>
                      <td><?php echo $d_product->nama_barang;?></td>
                      <td><?php echo $d_product->jenis_katalog;?></td>
                      <td><?php echo $d_product->keterangan;?></td>
                      <td><?php echo '<img class="someClass" src="'.base_url().'assets/img/product/'.$d_product->gambar.'" alt="'.$d_product->gambar.'" style="width:84px; height:59px;">'?></td>
                      <td><?php echo 'Rp. '.rpCurrency($d_product->harga);?></td>
                      <td><?php echo $d_product->stok;?></td>
                      <td>
                        <a href=<?php echo 'edit_product/'.$d_product->id_barang?> class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><span class="fas fa-fw fa-edit fa-sm"></span></a>
                        <?php if($d_product->status=='aktif'){?>
                          <a href=<?php echo 'status_product_inactive/'.$d_product->id_barang?> class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Inactive" onclick="return confirm('Apakah anda yakin akan menonaktifkan data ini?')"><span class="fas fa-fw fa-times fa-sm"></span></a>
                        <?php }else{?>
                          <a href=<?php echo 'status_product_active/'.$d_product->id_barang?> class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Active" onclick="return confirm('Apakah anda yakin akan mengaktifkan data ini?')"><span class="fas fa-fw fa-check fa-sm"></span></a>
                        <?php }?>
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