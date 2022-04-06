    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter"><?php if($total_notif > 0){
                  echo $total_notif;
                } ?></span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <?php if($total_notif > 0){?>
                  <?php foreach($notif_order_data as $d_notif){?>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url()?>sales">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-shopping-cart text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"><?php echo exDate($d_notif->tgl_pemesanan)?></div>
                    <span class="font-weight-bold">A new order to confirm.</span>
                  </div>
                </a>
              <?php };?>
              <?php foreach($notif_order_care_data as $d_notif_care){?>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url()?>care">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-medkit text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"><?php echo exDate($d_notif_care->tgl_order)?></div>
                    <span class="font-weight-bold">A new order care to confirm.</span>
                  </div>
                </a>
              <?php };?>
              <?php foreach($notif_order_daycare_data as $d_notif_daycare){?>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url()?>daycare">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-daycare text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"><?php echo exDate($d_notif->tgl_penitipan)?></div>
                    <span class="font-weight-bold">A new order daycare to confirm.</span>
                  </div>
                </a>
              <?php };?>
              <?php }?>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('nama');?></span>
                <img class="img-profile rounded-circle" src="<?php echo base_url('assets/backend/');?>img/profile-picture.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->