
		<div class="hero-wrap hero-bread" style="background-image: url('<?= base_url('assets/frontend/');?>images/bannerfood.png');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Invoice</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url()?>home">Home</a></span> <span>Invoice</span></p>
          </div>
        </div>
      </div>
    </div>
		<?php foreach($invoice_data as $d_invoice):?>
		<?php endforeach;?>
		<section class="ftco-section ftco-cart" style="padding: 2em 0;">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate fadeInUp ftco-animated">
	    				<table class="table-responsive">
	    					<tr class="text-center">
	    						<td colspan="" style="padding: 12px!important;">Status</td>
	    						<td></td>
	    						<td style="font-size: 20px; text-align: right!important; width: 81%; padding: 12px!important;">
	    							<?php 
	    							$status = $d_invoice->status_pesanan;
	    							if($status == 0)
	    							{
	    								echo "<span style='color:#E91E63;'>Menunggu Pembayaran</span>";
	    							}
	    							elseif($status == 1)
	    							{
	    								echo "<span style='color:blue;'>Proses Konfirmasi</span>";
	    							}
	    							elseif($status == 2)
	    							{
	    								echo "<span style='color:green;'>Pembayaran Selesai</span>";
	    							}
	    							elseif($status == 9)
	    							{
	    								echo "<span style='color:red;'>Dibatalkan</span>";
	    							}
	    							?>		
	    						</td>
	    					</tr>
	    					<tr class="text-center">
	    						<td colspan="" style="padding: 12px!important;">Order ID</td>
	    						<td></td>
	    						<td style="font-size: 20px; text-align: right!important; width: 81%; padding: 12px!important;">
	    							<?php echo $d_invoice->id_pesanan;?>		
	    						</td>
	    					</tr>
	    					<tr class="text-center">
	    						<td colspan="" style="padding: 12px!important;">Name</td>
	    						<td></td>
	    						<td style="font-size: 20px; text-align: right!important; width: 81%; padding: 12px!important;">
	    							<?php echo $d_invoice->nama_penerima;?>		
	    						</td>
	    					</tr>
	    					<tr class="text-center">
	    						<td colspan="" style="padding: 12px!important;">Order Date</td>
	    						<td style="width: 80%;"></td>
	    						<td style="font-size: 20px; text-align: right!important; width: 81%; padding: 12px!important;">
	    							<?php echo exDate($d_invoice->tgl_pemesanan);?>		
	    						</td>
	    					</tr>
	    				</table>
	    				<div class="text-center" style="width: 100%; background: #ddd; padding: 10px; margin-top: 10px; border-radius: 3px;">
	    					<span>Total yang harus dibayar: </span><span><strong><?php echo 'Rp. '.rpCurrency($d_invoice->total);?></strong></span>
	    				</div>
	    				<div class="text-center">
	    					<?php if($status == 0):?>
	    						<div style="color: red; text-align: center; padding: 4px; margin: auto; margin-top: 5px; border: 1px solid#ddd; width: 40%; background-color: #dddddd">
	    							<span style="font-size: 20px;">Sisa Waktu Pembayaran</span>
	    							<br> 
	    							<div id="timer"></div>
	    						</div>
	    						<?php else:?>
	    						<?php endif;?>

	    						<div class="bank" style="text-align: center; padding: 4px; margin: auto; margin-top: 5px; border: 1px solid#ddd; width: 50%; background-color: #dddddd">
	    							<strong>Pembayaran melalui Bank <?php echo $d_invoice->nama_bank;?></strong>
	    							<br>
	    							<img class="someClass" src="<?php echo base_url().'assets/img/bank/'.$d_invoice->logo_bank;?>" alt="<?php echo $d_invoice->logo_bank;?>" style="width:84px; height:50px;">
	    							<br>
	    							<strong>No Rek : <?php echo $d_invoice->no_rekening;?></strong> 
	    							<br>
	    							<strong>Atas nama : <?php echo $d_invoice->nama_pemilik;?></strong>
	    						</div>
	    				</div>
    			</div>
    		</div>
			</div>
		</section>

<!-- ============ MODAL ADD BARANG =============== -->
        <div class="modal fade" id="modal_confirm" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            		<h3 class="modal-title" id="myModalLabel">Confirm Payment</h3>
                	<button type="button" class="close" style="text-align: right;" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('process_invoice') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                	<div class="form-group">
                		<label class="control-label col-xs-3" >Bukti Transfer</label>
                		<input id="bukti_transfer" type="file" class="form-control" name="bukti_transfer" required="">
                	</div>
                	<input type="hidden" id="id_pesanan" class="form-control" name="id_pesanan" value="<?php echo $this->uri->segment(2);?>" required="">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Confirm</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL ADD BARANG-->