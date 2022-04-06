<div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('assets/frontend/images/'); ?>contact.png');">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-0 bread">Pet Care</h1>
        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Pet Care</span></p>
      </div>
    </div>
  </div>
</div>
<section class="ftco-section bg-light ftco-services">
  <div class="container">
    <div class="row justify-content-center mb-3 pb-3">
      <div class="col-md-12 heading-section text-center ftco-animate">
        <h1 class="big">Cat Care</h1>
        <h2>Cat Care Package</h2>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services">
          <div class="card" style="width: 14rem;">
            <div class="card-body">
              <h5 class="card-title">Package Fresh</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Potong Kuku</li>
              <li class="list-group-item">Mandi</li>
              <li class="list-group-item">Parfum</li>
              <li class="list-group-item"><b>IDR 50.000,00</b></li>
            </ul>
            <div class="card-body">
              <?php if($this->session->userdata('status') == "login"){?>
              <p><a href="<?php echo base_url()?>co_care/fresh" class="btn btn-primary py-3 px-4">Buy Package</a></p>
            <?php }else{?>
              <p><a href="<?php echo base_url();?>register" class="btn btn-primary py-3 px-4">Buy Package</a></p>
            <?php } ?>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services">
          <div class="card" style="width: 14rem;">
            <div class="card-body">
              <h5 class="card-title">Package Happy</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Potong Kuku</li>
              <li class="list-group-item">Mandi</li>
              <li class="list-group-item">ChekUp</li>
              <li class="list-group-item">Parfum</li>
              <li class="list-group-item"><b>IDR 70.000,00</b></li>
            </ul>
            <div class="card-body">
              <?php if($this->session->userdata('status') == "login"){?>
              <p><a href="<?php echo base_url()?>co_care/happy" class="btn btn-primary py-3 px-4">Buy Package</a></p>
            <?php }else{?>
              <p><a href="<?php echo base_url();?>register" class="btn btn-primary py-3 px-4">Buy Package</a></p>
            <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
        <div class="media block-6 services">
          <div class="card" style="width: 14rem;">
            <div class="card-body">
              <h5 class="card-title">Package Wonderful</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Potong Kuku</li>
              <li class="list-group-item">Mandi</li>
              <li class="list-group-item">ChekUp</li>
              <li class="list-group-item">Vitamin</li>
              <li class="list-group-item">Pijat</li>
              <li class="list-group-item">Parfum</li>
              <li class="list-group-item"><b>IDR 120.000,00</b></li>
            </ul>
            <div class="card-body">
              <?php if($this->session->userdata('status') == "login"){?>
              <p><a href="<?php echo base_url()?>co_care/wonderful" class="btn btn-primary py-3 px-4">Buy Package</a></p>
            <?php }else{?>
              <p><a href="<?php echo base_url();?>register" class="btn btn-primary py-3 px-4">Buy Package</a></p>
            <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>