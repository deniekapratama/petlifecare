
    <footer class="ftco-footer bg-light ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">PetLife-Care</h2>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Shop</a></li>
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Pet Care</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
	                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
	                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
	                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
	              </ul>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">FAQs</a></li>
	                <li><a href="#" class="py-2 d-block">Contact</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Jl. Cikutra No.204A, Sukapada, Kec. Cibeunying Kidul, Kota Bandung, Jawa Barat</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+1 234 567 890</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@petlifecare.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;2019 All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="#">PetLife-Care</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="<?= base_url('assets/frontend/');?>js/jquery.min.js"></script>
  <script src="<?= base_url('assets/frontend/');?>js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?= base_url('assets/frontend/');?>js/popper.min.js"></script>
  <script src="<?= base_url('assets/frontend/');?>js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/frontend/');?>js/jquery.easing.1.3.js"></script>
  <script src="<?= base_url('assets/frontend/');?>js/jquery.waypoints.min.js"></script>
  <script src="<?= base_url('assets/frontend/');?>js/jquery.stellar.min.js"></script>
  <script src="<?= base_url('assets/frontend/');?>js/owl.carousel.min.js"></script>
  <script src="<?= base_url('assets/frontend/');?>js/jquery.magnific-popup.min.js"></script>
  <script src="<?= base_url('assets/frontend/');?>js/aos.js"></script>
  <script src="<?= base_url('assets/frontend/');?>js/jquery.animateNumber.min.js"></script>
  <script src="<?= base_url('assets/frontend/');?>js/bootstrap-datepicker.js"></script>
  <script src="<?= base_url('assets/frontend/');?>js/scrollax.min.js"></script>
  <script src="<?= base_url('assets/frontend/');?>js/main.js"></script>


<script type="text/javascript">
  $(document).on('click', '.change-quantity', function() {

  var $button = $(this);
  var oldValue = $('#add-cart-qty').val();

  if ($button.data('type') == "plus") {
    var newVal = parseFloat(oldValue) + 1;
  } else {
   // Don't allow decrementing below zero
    if (oldValue > 1) {
      var newVal = parseFloat(oldValue) - 1;
    } else {
      newVal = 1;
    }
  }

  $('#add-cart-qty').val(newVal);

});
</script>

<script type="text/javascript">
  jQuery(document).on('click', '.item-add-to-cart', function () {
    var productID = jQuery(this).data('productid');
    var qty = jQuery('#add-cart-qty').val();
    if(qty){
        qty=qty;
    } else {
        qty=1;
    }
    jQuery.ajax({
        url: '<?php echo base_url().'cart/add' ?>',
        type: 'post',
        data: {productID: productID, qty:qty},
        dataType: 'json',
        success: function (json) {
            if (json.status == 1) {
                jQuery("span#go-to-basket").html(json.counter);
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
});

  // Cart update
jQuery(document).on('change', '.update-quantity', function () {
    var productid = jQuery(this).data('updproductid');
    var itemid = jQuery(this).data('itemid');
    var qty = jQuery('#update-cart-qty-' + itemid).val();
    jQuery.ajax({
        url: '<?php echo base_url().'cart/update' ?>',
        type: 'post',
        data: {productid: productid, qty: qty},
        dataType: 'json',
        success: function (json) {
            jQuery('#update-cart-qty-' + itemid).val(qty);
            location.reload();
            // console.log(json);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
});


// Cart remove
jQuery(document).on('click', '.remove-cart', function () {
    var productID = jQuery(this).data('rmproductid');
    var itemID = jQuery(this).data('rmitemid');
    jQuery.ajax({
        url: '<?php echo base_url().'cart/remove' ?>',
        type: 'post',
        data: {productID: productID},
        dataType: 'json',
        success: function (json) {
            location.reload();
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
  });
</script>

<script type="text/javascript">
  function timer()
  {
    var type = '<?php echo $this->uri->segment(1);?>'
    if(type == "invoice_care")
      $('#timer').load('<?php echo base_url().'invoice_care/timer/'.$this->uri->segment(2) ?>');
    else if(type == "invoice_daycare")
      $('#timer').load('<?php echo base_url().'invoice_daycare/timer/'.$this->uri->segment(2) ?>');
    else
      $('#timer').load('<?php echo base_url().'invoice/timer/'.$this->uri->segment(2) ?>');
    
  }

  setInterval(timer, 1000 );
</script>

<script type="text/javascript">
  $(document).on('change', '#lama_penitipan', function() {

  var tipe_pet = $('#tipe_pet').val();
  var opsi_food = $('#opsi_food').val();
  var lama_penitipan = $('#lama_penitipan').val();

  if (tipe_pet == "Cat") {
    if (opsi_food == "yes") {
      var newtotal = parseFloat(lama_penitipan) * 20000;
    } else {
      var newtotal = parseFloat(lama_penitipan) * 15000;
    }
  } else {
    if (opsi_food == "yes") {
      var newtotal = parseFloat(lama_penitipan) * 35000;
    } else {
      var newtotal = parseFloat(lama_penitipan) * 30000;
    }
  }

  $('#total_biaya').val('Rp. '+newtotal);
  $('#total_biaya_hidden').val(newtotal);
  console.log(newtotal);

});
</script>
    
  </body>
</html>