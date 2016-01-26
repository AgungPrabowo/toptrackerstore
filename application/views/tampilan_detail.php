<?=$this->load->view('tampilan_header');?>
<?=$this->load->view('tampilan_menu_atas');?>
<?=$this->load->view('tampilan_menu_bawah');?>
<style type="text/css">
.col-centered{
    float: none;
    margin: 0 auto;
}
#plus{
	width:40px;
	height:34px;
}
</style>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-12 center-block"><!-- CONTENT --><?=br(5);?>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-centered"><!-- Isi -->
					<img src="<?=base_url('assets/images/produk/'.$gambar);?>" class="center-block">
					<h4><?=$judul;?></h4>
					<font color="red"><h5>Setelah diaudit member dapat melihat harga spesial</h5></font>
					<h5><?="Harga user : Rp.".number_format($harga,0, '', '.');?></h5><hr>
					QTY&nbsp :
						<div class="input-group spinner" data-trigger="spinner" style="	position:relative;top:-25px;left:50px;">
							<span class="input-group-addon" id="min">
								<a href="javascript:;" class="spin-down" data-spin="down">
									<i class="glyphicon glyphicon-minus"></i>
								</a>
							</span>
							<form method="POST" action="<?=site_url('/order/add_to_cart/'.$id_produk);?>">
							<input type="text" class="form-control" name="qty" id="qty" data-rule="quantity" style="width:50px;">
							<span class="input-group-addon" id="plus">
								<a href="javascript:;" class="spin-up" data-spin="up">
									<i class="glyphicon glyphicon-plus"></i>
								</a>
							</span>
						</div>
					<p><?=$isi_produk?></p><hr>
					<?php
						$username = $this->session->userdata('email');
						if($username){?>
					<p><button type="submit" class="btn btn-primary" >Beli</button></p><br><br></form>

					<?php }else{?>
					<p><button type="button" data-target="#myModal" class="btn btn-primary" data-toggle="modal" >Beli</button></p><br><br></form>
					<?php }?>

			          <!-- Modal -->
			          <div id="myModal" class="modal fade" role="dialog">
			            <div class="modal-dialog">

			              <!-- Modal content-->
			              <div class="modal-content">
			                <div class="modal-header">
			                  <button type="button" class="close" data-dismiss="modal">&times;</button>
			                  <h4 class="modal-title">Form Login</h4>
			                </div>

			                <div class="modal-body">
			                  <form method="POST" action="<?=site_url('/blog/cek_login');?>">

			                    <div class="form-group">
			                      <div class="input-group">
			                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
			                        <input type="email" class="form-control" name="email" placeholder="Email" required>
			                      </div>
			                    </div>

			                    <div class="form-group">
			                      <div class="input-group">
			                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
			                        <input type="password" class="form-control" name="pass" placeholder="Password" required>
			                      </div>
			                    </div>
			                    

			                <div class="modal-footer">
			                  <button type="submit" class="btn btn-success" >Simpan</button>
			                  <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
			                </div>

			            	  	</form>
			              	</div>

			                </div>
			          	   </div>
			              </div>
			    	  	 </div>
			    	  	 <!-- End Modal -->

					</div>
				</div>
		</div><!-- END CONTENT -->
	</div>
</div>
<?php $this->load->view('footer');?><!-- FOOTER -->

	<script type="text/javascript" src="<?=base_url('assets/js/jquery.spinner.js');?>"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/bootstrap/js/bootstrap.min.js;?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/bootstrap/js/bootstrap.js');?>"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/js/jquery-2.0.3.min.js"></script>
