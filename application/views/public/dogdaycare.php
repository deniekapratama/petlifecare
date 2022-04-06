
  <div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('assets/frontend/images/');?>bannerfood.png');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Pet <b>Daycare</b></h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('home');?>">Home</a></span> <span>Pet Accessories</span></p>
          </div>
        </div>
      </div>
    </div>

<section class="ftco-section bg-light ftco-services">
  <div class="container">
    <div class="row justify-content-center mb-4 pb-4">
      <div class="col-md-12 heading-section text-center ftco-animate">
        <h1 class="big">Dog</h1>
        <h2>Dog Daycare</h2>
      </div>
    </div>


 
  <form method="post" action="<?php echo base_url()?>co_daycare">
  <div class="form-group" style="margin-left:200px; margin-right:200px; min-width:50%;">
    <input type="text" class="form-control" name="nama_penerima" placeholder="Order Name" required="">
  </div>
  <div class="form-group" style="margin-left:200px; margin-right:200px; min-width:50%;">

    <input type="text" class="form-control" name="tipe_pet" id="tipe_pet" value="Dog" readonly>
  </div>

  <div class="form-group" style="margin-left:200px; margin-right:200px; min-width:50%;">
    <select class="form-control" name="opsi_food" id="opsi_food" required="">
     <option value="">--- Choose Option Food ----</option>
      <option value="yes">Yes</option>
      <option value="no">No</option>
    </select>
  </div>
  
  <div class="form-group" style="margin-left:200px; margin-right:200px; min-width:50%;">

    <input type="number" min="1" class="form-control" name="lama_penitipan" id="lama_penitipan" placeholder="Total Daycare" required="">
    <p style="color: #a71304; font-size: 12px; margin-bottom: 0px;">Rp. 35.000/days (Including Food)</p>
    <p style="color: #a71304; font-size: 12px;">Rp. 30.000/days (Excluding Food)</p>
  </div>

  <div class="form-group" style="margin-left:200px; margin-right:200px; min-width:50%;">

    <input type="text" class="form-control" id="total_biaya" placeholder="Total Amount" readonly="">
    <input type="hidden" class="form-control" name="total_biaya" id="total_biaya_hidden" placeholder="Total Amount" readonly="">
  </div>

 <div class="form-group" style="margin-left:200px; margin-right:200px; min-width:50%;">
  
  <button type="submit" class="btn btn-primary float-right">Procced to Checkout</button>
</div>
  </div>

  
 
  </div>
</form>
</section>
