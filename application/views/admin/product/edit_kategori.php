        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          

          <!-- Page Forms -->
          <div class="card">
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h3 mb-2 text-gray-800 text-center">Edit Category</h1>
                  <form action="<?php echo base_url('process_edit_category') ?>" method="post" enctype="multipart/form-data" >
                    <?php foreach($category_data as $d_category):?>
                    <div class="form-group">
                      <input type="hidden" id="id_kategori" name="id_kategori" class="form-control" value="<?php echo $d_category->id_katalog;?>">
                      <input type="text" name="nama_kategori" class="form-control form-control-user" id="exampleInputNamaKategori" placeholder="Category Name" value="<?php echo $d_category->jenis_katalog ?>" required="">
                    </div>

                    <center>
                      <button class="btn btn-success btn-user btn-block col-lg-4" type="submit">Edit Category</button>
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