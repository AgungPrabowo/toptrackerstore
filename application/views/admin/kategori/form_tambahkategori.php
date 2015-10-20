<script>
function ekform()
{
	if(!$("#kategori").val())
	{
		alert('Kategori tidak boleh kosong');
		$("#kategori").focus();
		return false;
	}
}
</script>
<?php 
$info = $this->session->flashdata('info');
if($info)
{?>
	<div class="alert alert-block alert-error">
		<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>
		</button>
		<i class="icon-remove"></i>
<?php
echo $info;
?>
</div>
<?php
}?>

<?php echo validation_errors();?>
<form class="form-horizontal" method="POST" action="<?php echo base_url();?>index.php/admin/kategori/simpan" onsubmit="return cekform();">

	<div class="control-group">
		<div>
			<input type="hidden" name="id_kategori" id="id_kategori" value="<?php echo $id_kategori;?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">kategori</label>
		<div>
			<input type="text" name="kategori" id="kategori" placeholder="Kategori" class="span5" value="<?php echo $kategori;?>">
		</div>
	</div>

	<button type="submit" class="btn btn-primary btn-small">Simpan</button>

</form>