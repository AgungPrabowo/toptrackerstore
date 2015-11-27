<?=$this->load->view('tampilan_header');?>
<?=$this->load->view('tampilan_menu');?>
  	<div class="container">
  		<div class="row">
  			<div class="col-sm-12 col-md-12">
          <div class="row">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <?php 
                $this->load->view('form_register_login');
                $this->load->view('form_datadiri');
                $this->load->view('form_alamat_pengiriman');
              ?>
            </div>     
          </div>
        </div>
        <?php $this->load->view('footer');?><!-- FOOTER -->
      </div>
    </div>

    <script src="<?php echo base_url();?>assets/js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>