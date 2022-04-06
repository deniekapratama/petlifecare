
		<div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('assets/frontend/');?>images/bannerfood.png');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">My Cart</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
          </div>
        </div>
      </div>
    </div>
		
		<section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Product</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
						    	<?php if(!empty($cart_data)) { ?>
						    		<?php $grandTotal = 0;
						    		foreach($cart_data as $key=>$d_cart){
						    			$grandTotal += $d_cart['subtotal'];?>
						    			<tr class="text-center">
						    				<td class="product-remove"><span class="ion-ios-close remove-cart" style="cursor: pointer;" data-rmitemid="<?php echo $d_cart['id']; ?>"" data-rmproductid="<?php echo $d_cart['rowid']; ?>"></span></td>

						    				<td class="image-prod"><div class="img" style="background-image:url(<?php echo base_url('assets/img/product/'); echo $d_cart['image'];?>);"></div></td>
						    				<td class="product-name">
						    					<h3><?php echo $d_cart['name'];?></h3>
						    					<p><?php echo $d_cart['description'];?></p>
						    				</td>
						    				<td class="price"><?php echo 'Rp. '. rpCurrency($d_cart['price']);?></td>
						    				<td class="quantity">
						    					<div class="input-group mb-3">
						    						<input type="number" name="qty" id="update-cart-qty-<?php echo $d_cart['id'];?>" data-updproductid="<?php echo $d_cart['rowid'];?>" data-itemid="<?php echo $d_cart['id'];?>" class="update-quantity quantity form-control input-number" value="<?php echo $d_cart['qty'];?>" min="1" max="100">
						    					</div>
						    				</td>
						    				<td class="total"><?php echo 'Rp. '. rpCurrency($d_cart['subtotal']);?></td>
						    			</tr><!-- END TR-->
						    		<?php } ?>
						    	<?php } else { ?>
						    		<tr><td colspan="6">Cart is empty.</td></tr>
						    	<?php }?>
						    </tbody>
						</table>
					</div>
    			</div>
    		</div>
    		<?php if(!empty($cart_data)) { ?>
    		<div class="row justify-content-end">
    			<div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span><?php echo 'Rp. '. rpCurrency($grandTotal);?></span>
    					</p>
    					<p class="d-flex">
    						<span>Delivery</span>
    						<span><?php $deliv=15000; echo 'Rp. '. rpCurrency($deliv);?></span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span><?php $total_semua = $grandTotal+$deliv; echo 'Rp. '. rpCurrency($total_semua);?></span>
    					</p>
    				</div>
    				<?php if($this->session->userdata('status') == "login"){?>
    					<p class="text-center"><a href="<?php echo base_url();?>checkout" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
    				<?php }else{?>
    					<p class="text-center"><a href="<?php echo base_url();?>register" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
    				<?php } ?>
    				
    			</div>
    		</div>
    		<?php }else{?>
			</div>
		</section>
		<p class="text-center"><a href="<?php echo base_url();?>home" class="btn btn-primary py-3 px-4">Continue Shopping</a></p>
		<?php }?>
