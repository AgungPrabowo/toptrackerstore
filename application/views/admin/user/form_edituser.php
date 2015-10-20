<script type="text/javascript">
function cekform(){
	if(!$("#username").val())
	{
		alert('Username Tidak boleh kosong');
		$("#username").focus();
		return false;
	}

	if(!$("#old-password").val())
	{
		alert('Password Lama Tidak boleh Kosong');
		$("#old-password").focus();
		return false;
	}

	if(!$("#new-password").val())
	{
		alert('Password Baru Tidak boleh kosong');
		$("#new-password").focus();
		return false;
	}

	if(!$("#re-new-password").val())
	{
		alert('Ulangi Password Baru Tidak boleh kosong');
		$("#re-new-password").focus();
		return false;
	}

	var pass1	= $("#new-password").val();
	var pass2	= $("#re-new-password").val();

	if(pass1 !== pass2)
	{
		alert('Password Tidak Sama');
		$("#new-password").focus()
		return false;
	}

}

</script>

<?php
$info = $this->session->flashdata('info');
if(!empty($info))
{
	echo $info;
}
?>

<form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/admin/user/simpan_edit" onsubmit="return cekform();">

	<div class="control-group">
		<div>
			<input type="hidden" name="no" id="no"  class="span5" value="<?php echo $no;?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Username</label>
		<div>
			<input type="text" name="username" id="username"  class="span5" value="<?php echo $username;?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Password Lama</label>
		<div>
			<input type="password" name="old-password" id="old-password" placeholder="Password Lama" class="span5">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Password Baru</label>
		<div>
			<input type="password" name="new-password" id="new-password" placeholder="Password Baru" class="span5">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Ulangi Password Baru</label>
		<div>
			<input type="password" name="re-new-password" id="re-new-password" placeholder="Ulangi Password Baru" class="span5">
		</div>
	</div>

	<button type="submit" class="btn btn-primary btn-small">Simpan</button>

</form>