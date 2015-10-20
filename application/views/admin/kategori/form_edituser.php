<script type="text/javascript">
function cekform(){
	if(!$("#username").val())
	{
		alert('Username Tidak boleh kosong');
		$("#username").focus();
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

<?php echo validation_errors();?>
<form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/admin/kategori/simpan" onsubmit="return cekform();">

	<div class="control-group">
		<div>
			<input type="hidden" name="id_kategori" value="<?php echo $id_kategori;?>">
			<input type="hidden" name="tipe" value="<?php echo $tipe;?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Kategori</label>
		<div>
			<input type="text" name="kategori" id="kategori"  class="span5" value="<?php echo $kategori;?>">
		</div>
	</div>

	<button type="submit" class="btn btn-primary btn-small">Simpan</button>

</form>