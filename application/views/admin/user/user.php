        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">User Manager</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
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
                      <th>Level</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Handphome</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Level</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Handphome</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach($user_data as $d_user):?>
                    <tr>
                      <td><?php echo $d_user->level;?></td>
                      <td><?php echo $d_user->nama;?></td>
                      <td><?php echo $d_user->email;?></td>
                      <td><?php echo $d_user->alamat;?></td>
                      <td><?php echo $d_user->no_hp;?></td>
                      <td>
                        <?php if($d_user->level=='customer'){?>
                          <a href=<?php echo 'change_level/'.$d_user->id_user?> class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Jadikan Admin" onclick="return confirm('Apakah anda yakin akan menjadikan user data ini sebagai Admin?')"><span class="fas fa-fw fa-user-secret fa-sm"></span></a>
                        <?php }else{?>
                          <a href=<?php echo 'change_level/'.$d_user->id_user?> class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Jadikan Customer" onclick="return confirm('Apakah anda yakin akan menjadikan user data ini sebagai Customer?')"><span class="fas fa-fw fa-user fa-sm"></span></a>
                        <?php }?>
                        <?php if($d_user->status=='aktif'){?>
                          <a href=<?php echo 'status_user_inactive/'.$d_user->id_user?> class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Inactive" onclick="return confirm('Apakah anda yakin akan menonaktifkan data ini?')"><span class="fas fa-fw fa-times fa-sm"></span></a>
                        <?php }else{?>
                          <a href=<?php echo 'status_user_active/'.$d_user->id_user?> class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Active" onclick="return confirm('Apakah anda yakin akan mengaktifkan data ini?')"><span class="fas fa-fw fa-check fa-sm"></span></a>
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