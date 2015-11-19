<?=$this->load->view('tampilan_header');?>
  	<?=$this->load->view('tampilan_menu');?>
  	<div class="container" style="background-color:white;">
  		<div class="row">
  			<div class="col-md-9">
  				<?php 
  				foreach($isi->result() as $row):?>
  					<div class="col-sm-6 col-md-4">
  						<div class="thumbnail">
  							<img src="<?php echo base_url();?>assets/images/produk/<?php echo $row->gambar;?>">
  							<div class="caption">
  								<h3><?=$row->judul;?></h3>
  								<!--p><?php
  									// $isi = substr($row->isi,0,150);
  									// $isi = substr($row->isi,0,strrpos($isi," "));
  									// echo $isi;
  									?></p-->
  								<p><a href="<?php echo 'index.php/blog/add_to_cart/'.$row->id_produk;?>" class="btn btn-primary" role="button">Beli</a>
  								   <a href="<?=site_url().'/blog/detail/'.$row->id_produk;?>" class="btn btn-default" role="button">Detail</a>
  								</p>
  							</div>
  						</div>
  					</div>
				<?php endforeach;?>
  			</div>
  			<?=$this->load->view('side_bar');?>
  		</div>
    </div>

      <?php $this->load->view('footer');?><!-- FOOTER -->

    <script src="<?php echo base_url();?>assets/js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>