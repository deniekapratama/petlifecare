
		<div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('assets/frontend/');?>images/bannerfood.png');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Checkout</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
          </div>
        </div>
      </div>
    </div>
		
		<section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-8 ftco-animate">
						<form action="<?php echo base_url('order_care') ?>" method="post" class="billing-form bg-light p-3 p-md-5">
							<h3 class="mb-4 billing-heading">Billing Details</h3>
	          	<div class="row align-items-end">
		            <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
	                	<label for="streetaddress">Street Address</label>
	                  <textarea class="form-control" name="alamat" placeholder="House number and street name" required=""></textarea> 
	                </div>
		            </div>
	            </div>
	          


	          <div class="row mt-5 pt-3 d-flex">
	          	<div class="col-md-6 d-flex">
	          		<div class="cart-detail cart-total bg-light p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Total</h3>
	          			<p class="d-flex">
		    						<span>Subtotal</span>
		    						<?php if($this->uri->segment(2) == 'fresh'){?>
		    							<span><?php $biaya=70000; echo 'Rp. '.rpCurrency($biaya);?></span>
		    						<?php }elseif($this->uri->segment(2) == 'happy'){?>
		    							<span><?php $biaya=90000; echo 'Rp. '.rpCurrency($biaya);?></span>
		    						<?php }else{?>
		    							<span><?php $biaya=140000; echo 'Rp. '.rpCurrency($biaya);?></span>
		    						<?php }?>
		    					</p>
		    					<p class="d-flex">
		    						<span>Fare</span>
		    						<span><?php $deliv=15000; echo 'Rp. '. rpCurrency($deliv);?></span>
		    					</p>
		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Total</span>
		    						<span><?php $total_semua = $biaya+$deliv; echo 'Rp. '. rpCurrency($total_semua);?></span>
		    					</p>
								</div>
	          	</div>
	          	<div class="col-md-6">
	          		<div class="cart-detail bg-light p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Payment Method</h3>
	          					<?php foreach($bank_data as $d_bank):?>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="id_bank" class="mr-2" value="<?php echo $d_bank->id_bank;?>" required=""> <?php echo $d_bank->nama_bank;?></label>
											</div>
										</div>
									</div>
								<?php endforeach;?>
									<div class="form-group">
										<div class="col-md-12">
											<div class="checkbox">
											   <label><input type="checkbox" value="" class="mr-2" required=""> I have read and accept the terms and conditions</label>
											</div>
										</div>
									</div>
									<p><button type="submit" class="btn btn-primary py-3 px-4">Place an order</button></p>
								</div>
	          	</div>
	          	<input type="hidden" name="paket" value="<?php echo 'dog_'.$this->uri->segment(2);?>">
	          	<input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user');?>">
	          	<input type="hidden" name="nama" value="<?php echo $this->session->userdata('nama');?>">
	          	<input type="hidden" name="total" value="<?php echo $total_semua;?>">
	          	<input type="hidden" name="no_telp" value="<?php echo $this->session->userdata('no_hp');?>">
	          </div>
	          </form><!-- END -->
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->

    <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>