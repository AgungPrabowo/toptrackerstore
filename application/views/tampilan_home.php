<style type="text/css">
.col-md-6:active{background: #2632FB;}
</style>
<?=$this->load->view('tampilan_header').br(3);?>
<?=$this->load->view('tampilan_menu_atas');?>
<?=$this->load->view('tampilan_menu_bawah');?>
    <div class="container-fluid">
      <div class="row">
  				<?php foreach($data->result() as $row):?>
           <a href="<?=site_url('/blog/detail/'.$row->id_produk);?>">
            <div class="col-md-6">
  						<img src="<?=base_url('assets/images/produk/'.$row->gambar);?>" width="120" height="120">
              <div class="content">
                <div class="judul"><br><?=$row->judul;?></div><br>
              <font color="red">Harga reseller : Setelah diaudit member dapat melihat harga spesial</font><br>
              Harga User&nbsp&nbsp&nbsp&nbsp&nbsp: <?="Rp ".number_format($row->harga,0,',','.');?>
              </div>
              <hr>
  						</div>
            </a>
				<?php endforeach;?>
  			</div>
  		</div>
    </div>

      <?php $this->load->view('footer');?><!-- FOOTER -->

    <script src="<?php echo base_url();?>assets/js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>