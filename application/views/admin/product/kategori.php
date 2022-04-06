        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Product Category</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a href="<?php echo base_url();?>add_category" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add Product Category</span>
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
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Catalog ID</th>
                      <th>Catalog Type</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                     <th>Catalog ID</th>
                      <th>Catalog Type</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach($category_data as $d_category):?>
                    <tr>
                      <td><?php echo $d_category->id_katalog;?></td>
                      <td><?php echo $d_category->jenis_katalog;?></td>
                      <td>
                        <a href=<?php echo 'edit_category/'.$d_category->id_katalog?> class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><span class="fas fa-fw fa-edit fa-sm"></span></a>
                        <?php if($d_category->status=='aktif'){?>
                          <a href=<?php echo 'status_category_inactive/'.$d_category->id_katalog?> class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Inactive" onclick="return confirm('Apakah anda yakin akan menonaktifkan data ini?')"><span class="fas fa-fw fa-times fa-sm"></span></a>
                        <?php }else{?>
                          <a href=<?php echo 'status_category_active/'.$d_category->id_katalog?> class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Active" onclick="return confirm('Apakah anda yakin akan mengaktifkan data ini?')"><span class="fas fa-fw fa-check fa-sm"></span></a>
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