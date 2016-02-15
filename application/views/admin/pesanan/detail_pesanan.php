<?=$this->load->view('tampilan_header');?>
<?=$this->load->view('tampilan_menu_atas');?>
<style type="text/css">
#wadah{
	background-color: #e8f5e9;
}
#list-produk{
	background-color: #FFFFFF;
	position: relative;
	top: 50px;
	border-bottom: solid #e8f5e9 1px;
}
div#list-produk:not(:last-child){
	box-shadow: 0px 6px 8px #cae6e2;
}
#sub-total{
	background-color: #e0f2f1;
}
</style>
<div class="container-fluid" id="wadah">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 center-block"><!-- CONTENT -->
			<?php
			$subtotal = 0;
			foreach($order->result() as $row):
			//ambil gambar di tabel produk dengan parameter nm_produk
			$gambar = $this->model_produk->ambil_gambar($row->nm_produk);?>
			<div class="row" style="backgound:red;" id="list-produk">
				<div class="col-xs-4 col-sm-4 col-md-4 col-centered"><!-- Isi -->
					<br>
					<img src="<?=base_url('assets/images/produk/'.$gambar->gambar);?>" class="img-responsive pull-left"></img>
				</div>
				<div class="col-xs-8 col-sm-8 col-md-8 col-centered"><!-- Isi -->
					<p><strong><?=br(1).$row->nm_produk;?></strong></p>
					Harga&nbsp:&nbsp
					<span style="float:right"><?php $subtotal=$subtotal+$row->total;
											 echo 'Rp '.number_format($row->harga,0, '', '.');?></span><br>

					QTY&nbsp&nbsp&nbsp:&nbsp
					<span style="float:right"><?=$row->qty;?></span><br>

					Total&nbsp&nbsp:&nbsp
					<span style="float:right"><?='Rp '.number_format($row->total,0,'','.');?></span><br>
				</div>
			</div>
		   <?php endforeach;?><hr>

			<div class="row" id="sub-total">
				<div class="col-xs-12 col-sm-12 col-md-12 col-centered">
				   <?=br(2);?><p>Sub Total 
				   <span style="float:right;"><?='Rp '.number_format($subtotal,0,'','.').br(1);?></span></p>

				   <?=br(1);?><p>Biaya Pengiriman
				   <span style="float:right;"?><?='Rp '.number_format($order->row()->biaya_kirim,0,'','.').br(1);?></span></p>

				   <?=br(1);?><p>Total
				   <span style="float:right;"?><?='Rp '.number_format($subtotal+$order->row()->biaya_kirim,0,'','.');?></span></p>
				</div>
			</div>

			   <?=br(3);?><p class="text-center text-uppercase"><font color="#727272">Informasi Pengiriman</font><hr></p>
			   <b>Nama Penerima</b> 
			   <?=br(1).$order->row()->nm_penerima.br(2);?>

			   <b>Alamat Penerima</b> 
			   <?=br(1).$order->row()->alamat.br(1).$order->row()->kota.br(2);?>

			   <b>Telephone</b>
			   <?=br(1).$order->row()->no_telp.br(2);?>

			   <b>Tanggal</b>
			   <?=br(1).generate_tanggal(gmdate('d/m/Y-H:i',$order->row()->tgl_beli)).br(3);?>

			   <p class="text-center text-uppercase"><font color="#727272">Jasa Pengiriman</font><hr></p>
			   <b>Kurir</b>
			   <p class="text-uppercase"><?=$order->row()->kurir.br(1);?></p>
				<b>Layanan</b>
				<p><?=$order->row()->layanan.br(2);?></p>

			   <?php if($order->row()->catatan != NULL):?>
			   <p class="text-center text-uppercase"><font color="#727272">Catatan</font><hr></p>
			   <?=$order->row()->catatan;?>
			   <?php endif;?>
			   
			   <?=br(5);?>

		</div><!-- END CONTENT -->
	</div>
</div>