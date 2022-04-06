        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          

          <!-- Page Forms -->
          <div class="card">
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h3 mb-2 text-gray-800 text-center">Product Category</h1>
                  <form action="<?php echo base_url('process_add_category') ?>" method="post" enctype="multipart/form-data" >
                    <div class="form-group">
                      <input type="text" name="nama_kategori" class="form-control form-control-user" id="exampleInputNamaKategori" placeholder="Category Name" required="">
                    </div>

                    <center>
                      <button class="btn btn-success btn-user btn-block col-lg-4" type="submit">Add Category</button>
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