
		<div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('assets/frontend/');?>images/bannerfood.png');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Detail Food</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="index.html">Product</a></span> <span>Product Single</span></p>
          </div>
        </div>
      </div>
    </div>
		
		<?php foreach($product_data as $d_product):?>
		<section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="<?php echo base_url('assets/img/product/'); echo $d_product->gambar;?>" class="image-popup"><img src="<?php echo base_url('assets/img/product/'); echo $d_product->gambar;?>" style="width:450px; height:450px;" class="img-fluid" alt="<?php echo $d_product->gambar;?>"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3><?php echo $d_product->nama_barang;?></h3>
    				<p class="price"><span><?php echo 'Rp. '. rpCurrency($d_product->harga);?></span></p>
    				<p><?php echo $d_product->keterangan;?></p>
						<div class="row mt-4">
							
							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
	             	<span class="input-group-btn mr-2">
	                	<button type="button" class="change-quantity quantity-left-minus btn"  data-type="minus" data-field="">
	                   <i class="ion-ios-remove"></i>
	                	</button>
	            		</span>
	             	<input type="text" id="add-cart-qty" name="quantity" class="form-control input-number" value="1" min="1" max="100">
	             	<span class="input-group-btn ml-2">
	                	<button type="button" class="change-quantity quantity-right-plus btn " data-type="plus" data-field="">
	                     <i class="ion-ios-add"></i>
	                 </button>
	             	</span>
	          	</div>
          	</div>
          	
          	<button class="item-add-to-cart btn py-3 px-5" style="background-color:#ce0f4f!important;" id="AddToCartText" data-productid="<?php echo $d_product->id_barang;?>"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></button>
    			</div>
    		</div>
    	</div>
    </section>
    <?php endforeach;?>

