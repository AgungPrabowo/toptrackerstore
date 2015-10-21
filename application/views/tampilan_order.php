<?=$this->load->view('tampilan_header');?>
  	<?=$this->load->view('tampilan_menu');?>
  	<div class="container">
  		<div class="row">
  			<div class="col-md-9" style="background-color:green;">
  					<div class="col-sm-6 col-md-4">
  						content
  					</div>
  			</div>
  			<?=$this->load->view('side_bar');?>
  		</div>
      <?php $this->load->view('footer');?><!-- FOOTER -->
  	</div>

    <script src="<?php echo base_url();?>assets/js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>