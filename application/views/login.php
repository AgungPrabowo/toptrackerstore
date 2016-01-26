<?=$this->load->view('tampilan_header');
   $username = $this->session->userdata('email');
   if($username)
   {
    header('location:'.site_url('/blog/home'));
   }else{
?>
<!--pemberitahuan kesalahan-->
<?php 
$info = $this->session->flashdata('info');
if($info):?>
<div class="alert alert-block alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button> 
    <i class="glyphicon glyphicon-remove"></i>
    <?=$info;
    endif;?>
</div>

<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12">
      <form method="POST" action="<?=site_url('/blog/cek_login');?>" id="login">

        <div class="form-group">
          <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
          <input type="email" class="form-control" name="email" placeholder="Email" required>
        </div>
      </div>

        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" class="form-control" name="pass" placeholder="Password" required>
          </div>
        </div>
      </div>
    </div>

        <div class="form-group">
          <button type="submit" class="btn btn-danger btn-block">Login</button>
        </div>
      </form>

      <div class="row">
        <div class="col-xs-6 col-sm-6">
          <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#myModal">Registrasi</button>

          <!-- Modal -->
          <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Registrasi</h4>
                </div>

                <div class="modal-body">
                  <form method="POST" action="<?=site_url('/blog/cek_kode_sales');?>">

                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input type="text" class="form-control" name="kode_sales" placeholder="Kode Sales" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Anda" required>
                      </div>
                    </div>
                    
                </div>

                <div class="modal-footer">
                  <button type="submit" class="btn btn-success" >Simpan</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
              </div>
             </form>

            </div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6">
          <a href="<?=site_url('/blog/home');?>" class="btn btn-default btn-block">Skip</a>
        </div>
        <br><br><br>
  </div>


      </form>
      </div>
    </div>


    <script type="text/javascript" src="<?=base_url();?>assets/bootstrap/js/bootstrap.min.js;?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/bootstrap/js/bootstrap.js');?>"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/js/jquery-2.0.3.min.js"></script>
    <?php }?>
