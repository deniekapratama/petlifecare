        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          

          <!-- Page Forms -->
          <div class="card">
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h3 mb-2 text-gray-800 text-center">Bank</h1>
                  <form action="<?php echo base_url('process_add_bank') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <input type="text" name="nama_pemilik" class="form-control form-control-user" placeholder="Account Name" required="">
                    </div>
                    <div class="form-group">
                      <input type="text" name="nama_bank" class="form-control form-control-user" placeholder="Bank Name" required="">
                    </div>
                    <div class="form-group">
                      <input type="number" name="no_rekening" class="form-control form-control-user" placeholder="Account Number" min="0" required="">
                    </div>
                    <div class="form-group">
                      <input type="file" name="gambar" id="gambar" class="form-control form-control-file" required="">
                    </div>

                    <center>
                      <button class="btn btn-success btn-user btn-block col-lg-4" type="submit">Add Bank</button>
                    </center>
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