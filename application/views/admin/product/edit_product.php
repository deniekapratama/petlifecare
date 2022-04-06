        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          

          <!-- Page Forms -->
          <div class="card">
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h3 mb-2 text-gray-800 text-center">Edit Product</h1>
                  <form action="<?php echo base_url('process_edit_product') ?>" method="post" enctype="multipart/form-data">
                    <?php foreach($product_data as $d_product):?>
                      <input type="hidden" id="id_barang" name="id_barang" class="form-control" value="<?php echo $d_product->id_barang;?>">
                      <input type="hidden" id="gambar_lama" name="gambar_lama" class="form-control" value="<?php echo $d_product->gambar;?>">
                    <div class="form-group">
                      <select name="id_katalog" class="form-control form-control-user" required="">
                        <option value="">-- Choose Category --</option>
                        <?php foreach($kategori as $d_kategori):?>
                          <option value="<?php echo $d_kategori->id_katalog;?>"><?php echo $d_kategori->jenis_katalog;?></option>
                        <?php endforeach;?>
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="text" name="nama_product" class="form-control form-control-user" placeholder="Product Name" value="<?php echo $d_product->nama_barang;?>" required="">
                    </div>
                    <div class="form-group">
                      <input type="file" name="gambar" id="gambar" class="form-control form-control-file">
                    </div>
                    <div class="form-group">
                      <textarea name="keterangan" class="form-control form-control-user" placeholder="Information" required=""><?php echo $d_product->keterangan;?></textarea>
                    </div>
                    <div class="form-group">
                      <input type="number" name="harga" class="form-control form-control-user" value="<?php echo $d_product->harga;?>" placeholder="Price" required="" min="0">
                    </div>
                    <div class="form-group">
                      <input type="number" name="stok" class="form-control form-control-user" value="<?php echo $d_product->stok;?>" placeholder="Stock" required="" min="0">
                    </div>

                    <center>
                      <button class="btn btn-success btn-user btn-block col-lg-4" type="submit">Edit Product</button>
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