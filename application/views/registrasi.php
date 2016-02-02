<?=$this->load->view('tampilan_header');?>
<script type="text/javascript" src="<?=base_url('assets/angular.js/angular.min.js');?>"></script>
<script type="text/javascript">
$(document).ready(function(){

function validasi()
{
	if(!$('#nama_toko').val())
	{
      alert("Nama Toko tidak boleh kosong");
      $("#nama_toko").focus();
      return false;
	}
	else if($('#pass').length() < 6 && $('#pass').length() < 20)
	{
		alert("Panjang Kata Sandi harus 6-20 karakter");
		$("#pass").focus();
		return false;
	}
	else if(!$('#pass').val())
	{
      alert("Kata Sandi tidak boleh kosong");
      $("#pass").focus();
      return false;
	}
	else if(!$('#re-pass').val())
	{
      alert("Konfirmasi Kata Sandi tidak boleh kosong");
      $("#re-pass").focus();
      return false;
	}
	else if(!$('#nama_penanggung_jawab').val())
	{
      alert("Nama Penanggung Jawab tidak boleh kosong");
      $("#nama_penanggung_jawab").focus();
      return false;
	}
	else if(!$('#username').val())
	{
      alert("Username tidak boleh kosong");
      $("#username").focus();
      return false;
	}
	else if(!$('#no_telp').val())
	{
      alert("No Telepon tidak boleh kosong");
      $("#no_telp").focus();
      return false;
	}
	else if(!$('#nama_penerima').val())
	{
      alert("Nama Penerima tidak boleh kosong");
      $("#nama_penerima").focus();
      return false;
	}
	else if(!$('#no_telp_penerima').val())
	{
      alert("No Telepon Penerima tidak boleh kosong");
      $("#no_telp_penerima").focus();
      return false;
	}
	else if(!$('#kode_pos').val())
	{
      alert("Kode Pos tidak boleh kosong");
      $("#kode_pos").focus();
      return false;
	}
	else if(!$('#provinsi').val())
	{
      alert("Provinsi tidak boleh kosong");
      $("#provinsi").focus();
      return false;
	}
	else if(!$('#kota').val())
	{
      alert("Kota tidak boleh kosong");
      $("#kota").focus();
      return false;
	}
	else if(!$('#kecamatan').val())
	{
      alert("Kecamatan tidak boleh kosong");
      $("#kecamatan").focus();
      return false;
	}
	else if(!$('#alamat').val())
	{
      alert("Alamat tidak boleh kosong");
      $("#alamat").focus();
      return false;
	}
	else if(!$('#kode_sales').val())
	{
      alert("Kode Sales tidak boleh kosong");
      $("#kode_sales").focus();
      return false;
	}
	else if($('#kode_sales').val() != $('#kode').val())
	{
		alert("Kode Sales belum terdaftar");
		$('#kode_sales').focus();
		return false;
	}
	else if($('#nama_penanggung_jawab').val() != $('#nama').val())
	{
		alert('Nama Penanggung Jawab belum terdaftar');
		$('#nama_penanggung_jawab').focus();
		return false;
	}
}

//ambil id/nilai PROVINSI dan kirim ke function getkota jika sukses ambil data getkota letakan di #kota dan #kota1
  $("#provinsi").change(function(){
    var key = $("#provinsi").val();
    var url = '<?=site_url();?>/user/getkota/'+key;


    $.ajax({
      type    : 'POST',
      url     : '<?=site_url();?>/user/getkota/'+key,
      success : function(){
        $.get(url).done(function(data){
          $("#kota").html(data);
            });
      }
    });
  });

//ambil id/nilai KOTA dan kirim ke function getkec jika sukses ambil data getkec dan letakan di #kecamatan
  $("#kota").change(function(){
    var key = $("#kota").val();
    var url = '<?=site_url();?>/user/getkec/'+key;


    $.ajax({
      type    : 'POST',
      url     : '<?=site_url();?>/user/getkec/'+key,
      success : function(){
        $.get(url).done(function(data){
          $("#kecamatan").html(data);
        });
      }
    });
  });
});
</script>
<br><br><br>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
  	<a href="<?=site_url();?>" class="navbar-brand"><i class="glyphicon glyphicon-menu-left"></i></a>
  	<p class="text-center"><font size="5">Register</font></p>
  </div>
</nav>

 <div class="container" style="background:white">
	<div class="row">
	  <div class="col-xs-12 col-sm-12">

	  	<?=$this->load->view('tampilan_header');?>
	  	<?php $info = $this->session->flashdata('info');
	  			if(!empty($info)):?>
         <div class="alert alert-danger alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong><?=$info?></strong>
		 </div>
		<?php endif;?>

	    <form method="POST" action="<?=site_url('/blog/simpan_registrasi');?>" id="login" onsubmit="return validasi();">

	    	<br>
	        <div class="form-group">
	          <div class="input-group">
	          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
	          <input type="hidden" id="nama" value="<?=$nama;?>">
	          <input type="hidden" id="kode" value="<?=$kode_sales;?>">
	          <input type="hidden" name="status" value="<?=$status;?>">
	          <input type="text" class="form-control" id="nama_toko" name="nama_toko" placeholder="Nama Toko" required>
	        </div>
	      </div>

	        <div class="form-group">
	          <div class="input-group">
	          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
	          <input type="email" class="form-control" id="email" name="email" placeholder="Email">
	        </div>
	      </div>

	        <div class="form-group">
	          <div class="input-group">
	          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
	          <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
	        </div>
	      </div>

	        <div class="form-group">
	          <div class="input-group">
	            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	            <input type="password" class="form-control" id="pass" name="pass" placeholder="Kata Sandi (6-20 karakter)" required>
	          </div>
	        </div>

	        <div class="form-group">
	          <div class="input-group">
	            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	            <input type="password" class="form-control" id="re-pass" name="re-pass" placeholder="Konfirmasi Kata Sandi" required>
	          </div>
	        </div>

	        <div class="form-group">
	          <div class="input-group">
	            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	            <input type="text" class="form-control" id="nama_penanggung_jawab" ng-model="nama_penanggung_jawab" name="nm_penanggung_jawab" placeholder="Nama Penanggung Jawab" required>
	          </div>
	        </div>

	        <div class="form-group">
	          <div class="input-group">
	            <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
	            <input type="text" class="form-control" id="no_telp" ng-model="no_telp" name="no_telp" placeholder="Nomor Telepon" required>
	          </div>
	        </div>

	        <div class="form-group">
	          <div class="input-group">
	            <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
	            <input type="text" class="form-control" id="kode_sales" ng-model="kode_sales" name="kode_sales" placeholder="Kode Sales" required>
	          </div>
	        </div>

	        	<center><h2>Informasi Penerima</h2></center>

	            <input type="text" class="form-control" id="nama_penerima" name="nm_penerima" placeholder="Nama Penerima" value="{{nama_penanggung_jawab}}" required>
	            <input type="text" class="form-control" id="no_telp_penerima" name="no_telp_penerima" placeholder="Nomor Telepon Penerima" value="{{no_telp}}" required>
	            <input type="text" class="form-control" id="kode_pos" name="kode_pos" placeholder="Kode Pos" required>
	            <select class="form-control" id="provinsi" name="provinsi">
	                <option value="0">---Pilih Provinsi---</option>
	                <?php
	                foreach($provinsi->result() as $prov):
	                ?>
	                <option value="<?=$prov->id;?>"><?=$prov->name;?></option>
	                <?php 
	                endforeach;
	                ?>
	            </select>

              	<select class="form-control" name="kota" id="kota">
	                <option value="0">---Pilih Kota---</option>
              	</select>

              	<select class="form-control" name="kecamatan" id="kecamatan">
	                <option value="0">---Pilih Kecamatan---</option>
              	</select>

	            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Penerima" required>

	        <div class="form-group">
	          <button type="submit" class="btn btn-danger btn-block" >Daftar</button>
	        </div>

	      </form>
		</div>
	  </div>
	</div>
    <script src="<?=base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>
