<form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/admin/user/simpan_tambah" onsubmit="return cekform();">

	<div class="control-group">
		<div>
			<input type="hidden" name="username" id="username" placeholder="Username" class="span5" value="<?php echo $no;?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Username</label>
		<div>
			<input type="text" name="username" id="username" placeholder="Username" class="span5" value="<?php echo $username;?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Password</label>
		<div>
			<input type="text" name="password" id="password" placeholder="Password" class="span5" value="<?php echo $password;?>">
		</div>
	</div>

	<button type="submit" class="btn btn-primary btn-small">Simpan</button>

</form>