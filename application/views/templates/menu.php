

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url('');?>">PetLife <b>Care</b></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menus
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="<?= base_url('home');?>" class="nav-link">Home</a></li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
          <div class="dropdown-menu" aria-labelledby="dropdown04">
            <?php foreach($menu_katalog as $m_katalog):?>
              <a class="dropdown-item" href="<?php echo base_url();?>pet_shop/<?php echo $m_katalog->id_katalog?>"><?php echo $m_katalog->jenis_katalog;?></a>
            <?php endforeach;?>
          </div>
        </li>
        
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pet Service</a>
          <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="<?php echo base_url();?>pet_care">Pet Care</a>
              <a class="dropdown-item" href="<?php echo base_url();?>pet_daycare">Pet Daycare</a>
          </div>

          <li class="nav-item"><a href="<?php echo base_url();?>about" class="nav-link">About</a></li>
          <li class="nav-item"><a href="<?php echo base_url();?>contact" class="nav-link">Contact</a></li>
          <li class="nav-item cta cta-colored"><a href="<?php echo base_url();?>cart" class="nav-link"><span class="icon-shopping_cart">
            <span id="go-to-basket">
            <?php
                                if (!empty($this->cart->contents())) {
                                    echo count($this->cart->contents());
                                } else {
                                    echo 0;
                                }
                                ?>  
            </span>
          </span></a></li>
          <?php if($this->session->userdata('status')=='login') { ?>
            <li class="nav-item"><a href="<?php echo base_url();?>check_order" class="nav-link"><b>Check Order</b></a></li>
            <li class="nav-item"><a href="<?php echo base_url();?>logout" class="nav-link"><b>Logout</b></a></li>
          <?php }else{ ?>
            <li class="nav-item"><a href="<?php echo base_url();?>login" class="nav-link"><b>Login</b></a></li>
          <?php }; ?>
        </ul>
      </div>
    </div>
  </nav>
<!-- END nav -->