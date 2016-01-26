<script type="text/javascript">
function cekform(){
	if(!$("#kategori").val())
	{
		alert('Username Tidak boleh kosong');
		$("#kategori").focus();
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

<?=validation_errors();?>
<form class="form-horizontal" method="POST" action="<?=site_url('/admin/kategori/simpan');?>" onsubmit="return cekform();">

	<div class="control-group">
		<div>
			<input type="hidden" name="id_kategori" value="<?=$id_kategori;?>">
			<input type="hidden" name="tipe" value="<?=$tipe;?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Kategori</label>
		<div>
			<input type="text" name="kategori" id="kategori"  class="span5" value="<?=$kategori;?>">
		</div>
	</div>

	<button type="submit" class="btn btn-primary btn-small">Simpan</button>
	<a href="<?=site_url('/admin/kategori');?>" class="btn btn-danger btn-small">Batal</a>

</form>