
  <div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('assets/frontend/images/');?>bannerfood.png');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Check <b>Order</b></h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('home');?>">Home</a></span> <span>Check Order</span></p>
          </div>
        </div>
      </div>
    </div>

<section class="ftco-section bg-light ftco-services">
  <div class="container">
    <div class="row justify-content-center mb-4 pb-4">
      <div class="col-md-12 heading-section text-center ftco-animate">
        <h1 class="big">Order</h1>
        <h2>Check Order</h2>
      </div>
    </div>


 
  <form method="post" action="<?php echo base_url()?>check_order_data">

  <div class="form-group" style="margin-left:200px; margin-right:200px; min-width:50%;">
    <select class="form-control" name="jenis_transaksi" id="jenis_transaksi" required="">
     <option value="">--- Choose Option Order ----</option>
      <option value="shop">Shop</option>
      <option value="care">Care</option>
      <option value="daycare">Daycare</option>
    </select>
  </div>

  <div class="form-group" style="margin-left:200px; margin-right:200px; min-width:50%;">
    <input type="text" class="form-control" name="id_order" placeholder="Order ID" required="">
  </div>

 <div class="form-group" style="margin-left:200px; margin-right:200px; min-width:50%;">
  
  <button type="submit" class="btn btn-primary float-right">Check Order</button>
</div>
  </div>

  
 
  </div>
</form>
</section>
