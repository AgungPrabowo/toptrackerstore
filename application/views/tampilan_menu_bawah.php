<nav class="navbar navbar-default navbar-fixed-bottom">
  <div class="container-fluid">
    <?php 
    //jika login tampilkan menu keranjang belanja
      $username = $this->session->userdata('pass');
      $val      = 4;
      if($username):
        $val    = 3;
      endif;
      ?>
    <div class="col-xs-<?=$val;?> col-sm-<?=$val;?>">
       <a href="<?=site_url('/blog/home');?>" class="navbar-brand" id="menu" id="menu"><i class="glyphicon glyphicon-home"></i></a>
    </div>

    <div class="col-xs-<?=$val;?> col-sm-<?=$val;?>">
       <a href="<?=site_url('/blog/category');?>" class="navbar-brand" id="menu"><p class="text-center"><i class="glyphicon glyphicon-menu-hamburger"></i></p></a>
    </div>
    <?php if($username):?>
    <div class="col-xs-<?=$val;?> col-sm-<?=$val;?>">
       <a href="<?=site_url('/user/profile/'.$key);?>" class="navbar-brand" id="menu"><p class="text-right"><i class="glyphicon glyphicon-user"></i></p></a>
    </div>
    <?php endif;
    if($username == NULL):?>
    <div class="col-xs-<?=$val;?> col-sm-<?=$val;?>">
       <a href="#myModal" data-toggle="modal" class="navbar-brand" id="menu"><p class="text-right"><i class="glyphicon glyphicon-user"></i></p></a>
    </div>


    <?php
      endif;
      if($username):?>
    <div class="col-xs-<?=$val;?> col-sm-<?=$val;?>">
      <a href="<?=site_url('/order/cart');?>" class="navbar-brand" id="menu">
        <p class="text-right">
          <i class="glyphicon glyphicon-shopping-cart"></i>
          <span class="badge"><?=$this->cart->total_items();?></span>
        </p>
      </a>
    </div>
    <?php endif;?>
    

  </div>
</nav>
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
              <input type="text" class="form-control" name="username" placeholder="Email atau Username" required>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input type="password" class="form-control" name="pass" placeholder="Password" required>
            </div>
          </div>
          

      <div class="modal-footer">
        <button type="submit" class="btn btn-success" >Login</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
      </div>

        </form>
      </div>

      </div>
     </div>
    </div>
 </div>
 <!-- End Modal -->

