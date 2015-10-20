<?=$this->load->view('tampilan_header');?>
<?=$this->load->view('tampilan_menu');?>
<div class="container">
	<div class="row">
		<div class="col-md-12"><!-- CONTENT -->
			<div class="row">
			<div class="col-sm-6 col-md-4" style="background-color:red;"><!-- GAMBAR PRODUK -->
				<img src="<?php echo base_url();?>assets/images/produk/<?php echo $gambar;?>" class="center-block" width="300" height="400">
			</div>
				<div class="col-sm-6 col-md-8" style="background-color:blue;"><!-- ISI -->
					<h1><strong><?=$judul;?></strong></h1>
					<h5><?="Harga: Rp.".number_format($harga,0, '', '.');?></h5><hr style="border:dotted;border-width:1px;border-color:#D1D1D1;">
					<p><?=$isi_produk?></p><hr style="border:dotted;border-width:1px;border-color:#D1D1D1">
					<p><a href="<?php echo base_url().'index.php/blog/add_to_cart/'.$id_produk;?>" class="btn btn-primary" role="button">Beli</a></p>
					</div>
			</div>
			<?php $this->load->view('komentar');?><!-- KOMENTAR -->
		</div><!-- END CONTENT -->
	</div>
	<?php $this->load->view('footer');?><!-- FOOTER -->
</div>
