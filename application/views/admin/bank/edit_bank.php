        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          

          <!-- Page Forms -->
          <div class="card">
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h3 mb-2 text-gray-800 text-center">Edit Bank Account</h1>
                  <form action="<?php echo base_url('process_edit_bank') ?>" method="post" enctype="multipart/form-data">
                    <?php foreach($bank_data as $d_bank):?>
                      <input type="hidden" id="id_bank" name="id_bank" class="form-control" value="<?php echo $d_bank->id_bank;?>">
                      <input type="hidden" id="gambar_lama" name="gambar_lama" class="form-control" value="<?php echo $d_bank->logo_bank;?>">
                    <div class="form-group">
                      <input type="text" name="nama_pemilik" class="form-control form-control-user" placeholder="Account Name" value="<?php echo $d_bank->nama_pemilik;?>" required="">
                    </div>
                    <div class="form-group">
                      <input type="text" name="nama_bank" class="form-control form-control-user" placeholder="Bank Name" value="<?php echo $d_bank->nama_bank;?>" required="">
                    </div>
                    <div class="form-group">
                      <input type="number" name="no_rekening" class="form-control form-control-user" placeholder="Account Number" min="0" value="<?php echo $d_bank->no_rekening;?>" required="">
                    </div>
                    <div class="form-group">
                      <input type="file" name="gambar" id="gambar" class="form-control form-control-file">
                    </div>

                    <center>
                      <button class="btn btn-success btn-user btn-block col-lg-4" type="submit">Edit Bank</button>
                    </center>
                    <?php endforeach;?>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- End of Forms -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->