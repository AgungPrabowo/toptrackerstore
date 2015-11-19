<form method="POST" action="<?=site_url();?>/blog/cek_login" id="login">
  <h2>Login</h2>
  <div class="form-group">
    <label >Username</label>
    <input type="text" class="form-control" name="username" placeholder="Username" required>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password" required>
  </div>
  <div>
    <?php
      $info = $this->session->flashdata('info');
      if(isset($info))
      {
        echo $info;
      }
    ?>
  </div>
    <button type="submit" class="btn btn-default">Login</button>
</form>