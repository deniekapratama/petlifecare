<html>
<head>
    <title>Shopping cart dengan codeigniter dan AJAX</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container"><br/>
    <h2>Shopping Cart Dengan Ajax dan Codeigniter</h2>
    <hr/>
    <div class="row">
        <div class="col-md-8">
            <h4>Produk</h4>
            <div class="row">
            <?php foreach($data as $d_product):?>
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
                                        <span class="ion-ios-star-outline"></span>
                                        <span class="ion-ios-star-outline"></span>
                                        <span class="ion-ios-star-outline"></span>
                                        <span class="ion-ios-star-outline"></span>
                                        <span class="ion-ios-star-outline"></span>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <input type="hidden" name="quantity" id="<?php echo $d_product->id_barang;?>" value="1" class="quantity form-control">
                            <p class="bottom-area d-flex">
                                <button class="add_cart btn" data-idbarang="<?php echo $d_product->id_barang;?>" data-namabarang="<?php echo $d_product->nama_barang;?>" data-hargabarang="<?php echo $d_product->harga;?>"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></button>
                                <a href="#" class="ml-auto"><span><i class="ion-ios-heart-empty"></i></span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
                 
            </div>
 
        </div>
        <div class="col-md-4">
            <h4>Shopping Cart</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="detail_cart">
 
                </tbody>
                 
            </table>
        </div>
    </div>
</div>
 
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?= base_url('assets/frontend/');?>js/google-map.js"></script>
  <script src="<?= base_url('assets/frontend/');?>js/main.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.add_cart').click(function(){
            var id_barang    = $(this).data("idbarang");
            var nama_barang  = $(this).data("namabarang");
            var harga        = $(this).data("hargabarang");
            var quantity     = $('#' + id_barang).val();
            $.ajax({
                url : "<?php echo base_url();?>cart3/add_to_cart",
                method : "POST",
                data : {id_barang: id_barang, nama_barang: nama_barang, harga: harga, quantity: quantity},
                success: function(data){
                    alert("Product Added into Cart");
                    $('#detail_cart').html(data);
                }
            });
        });
 
        // Load shopping cart
        alert("Product dsdads into Cart");
        $('#detail_cart').load("<?php echo base_url();?>cart3/load_cart");
 
        //Hapus Item Cart
        $(document).on('click','.hapus_cart',function(){
            var row_id=$(this).attr("id"); //mengambil row_id dari artibut id
            $.ajax({
                url : "<?php echo base_url();?>cart/hapus_cart",
                method : "POST",
                data : {row_id : row_id},
                success :function(data){
                    alert("Product Added into Cart");
                    $('#detail_cart').html(data);
                }
            });
        });
    });
</script>
</body>
</html>