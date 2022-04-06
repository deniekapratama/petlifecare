<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-pet sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url();?>admin">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-dog"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PetLife-Care</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url();?>admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Transaction
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-heart"></i>
          <span>Sales Service</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">PET CARE:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>confirm_order_care">Pet Care Order</a>
            <a class="collapse-item" href="<?php echo base_url();?>care">Pet Care Accepted</a>
            <a class="collapse-item" href="<?php echo base_url();?>care_fail">Pet Care Cancelled</a>
            <h6 class="collapse-header">PET DAYCARE:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>confirm_order_daycare">Pet Daycare Order</a>
            <a class="collapse-item" href="<?php echo base_url();?>daycare">Pet Daycare Accepted</a>
            <a class="collapse-item" href="<?php echo base_url();?>daycare_fail">Pet Daycare Cancelled</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Sales Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSales" aria-expanded="true" aria-controls="collapseSales">
          <i class="fas fa-fw fa-handshake"></i>
          <span>Sales Product</span>
        </a>
        <div id="collapseSales" class="collapse" aria-labelledby="headingSales" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Sales Order:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>confirm_order">Sales Order</a>
            <a class="collapse-item" href="<?php echo base_url();?>sales">Order Accepted</a>
            <a class="collapse-item" href="<?php echo base_url();?>sales_fail">Order Cancelled</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Master Data
      </div>

      <!-- Nav Item - Product Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true" aria-controls="collapseProduct">
          <i class="fas fa-fw fa-archive"></i>
          <span>Product Manager</span>
        </a>
        <div id="collapseProduct" class="collapse" aria-labelledby="headingProduct" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Product Manager:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>product">Product</a>
            <a class="collapse-item" href="<?php echo base_url();?>product_category">Add Product Category</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - User Manage -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>user">
          <i class="fas fa-fw fa-users"></i>
          <span>User Manager</span></a>
      </li>

      <!-- Nav Item - Bank Manage -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>bank">
          <i class="fas fa-fw fa-university"></i>
          <span>Bank Manager</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

      <!-- Footer -->
      <footer class="sticky-footer bg-darkblue">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span style="color: rgba(255, 255, 255, 0.8);">&copy; PetLife-Care 2019</span>
          </div>
        </div>
      </footer>
      <!-- #Footer -->

    </ul>
    <!-- End of Sidebar -->