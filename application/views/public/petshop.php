
		<div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('assets/frontend/images/');?>bannerfood.png');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread"><?php echo $detail_katalog;?></h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('home');?>">Home</a></span> <span><?php echo $detail_katalog;?></span></p>
          </div>
        </div>
      </div>
    </div>
		
		<section class="ftco-section bg-light">
    	<div class="container-fluid">
    		<div class="row">
                <?php foreach($product_data as $d_product):?>
    			<div class="col-sm col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="<?php echo base_url('detail_product/'); echo $d_product->id_barang?>" class="img-prod"><img class="img-fluid" src="<?php echo base_url('assets/img/product/'); echo $d_product->gambar;?>" alt="<?php echo $d_product->gambar;?>">
    					</a>
    					<div class="text py-3 px-3">
    						<h3><a href="#"><?php echo $d_product->nama_barang;?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span><?php echo 'Rp. '.rpCurrency($d_product->harga);?>
		    					</div>
		    					<div class="rating">
	    							<p class="text-right">
	    								<span class="ion-ios-star"></span>
	    								<span class="ion-ios-star"></span>
	    								<span class="ion-ios-star"></span>
	    								<span class="ion-ios-star"></span>
	    								<span class="ion-ios-star"></span>
	    							</p>
	    						</div>
	    					</div>
	    					<hr>
    						<p class="bottom-area d-flex">
    							
                                <input type="hidden" name="id_barang" value="<?php echo $d_product->id_barang;?>">
                                <input type="hidden" name="nama_barang" value="<?php echo $d_product->nama_barang;?>">
                                <input type="hidden" name="harga" value="<?php echo $d_product->harga;?>">
                                <input type="hidden" name="qty" value="1">
                                <button type="button" class ="item-add-to-cart btn add-to-cart" id="AddToCartText" data-productid="<?php echo $d_product->id_barang;?>"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></button>
    							<a href="#" class="ml-auto"><span><i class="ion-ios-heart-empty"></i></span></a>
    						</p>
    					</div>
    				</div>
    			</div>
                <?php endforeach;?>
    		</div>
            <div class="row mt-5">
                <?php echo $pagination; ?>
            </div>
        </div>
    </section>

		<section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center py-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
            	<h1 class="big">Subscribe</h1>
              <h2>Subcribe to our Newsletter</h2>
              <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-8">
                  <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

