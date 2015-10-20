<script type="text/javascript">
			$(function() {
				var oTable1 = $('#sample-table-2').dataTable( {
				"aoColumns": [
			      null, null, 
				  { "bSortable": false }
				] } );

			})
</script>

<?php 
$info = $this->session->flashdata('info');
if($info)
{?>
	<div class="alert alert-block alert-success">
	<button type="button" class="close" data-dismiss="alert">
		<i class="icon-remove"></i>
	</button>	
	<i class="icon-ok green"></i>
<?php
echo $info;
}
?>
</div>
<div class="space-6"></div>

<p>
	<a href="<?php echo base_url();?>index.php/admin/kategori/tambah" class="btn btn-primary btn-small">Tambah</a>
</p>
<table id="sample-table-2" class="table table-striped table-bordered table-hover">
<thead>
	<tr>
		<th>No</th>
		<th>Nama kategori</th>
		<th>Aksi</th>
	</tr>
</thead>
<tbody>
	<tr>
		<?php
		$no = 1;
		foreach($data->result() as $row){
		?>
		<td><?php echo $no++;?></td>
		<td><?php echo $row->kategori;?></td>
		<td>
			<a href="<?php echo base_url();?>index.php/admin/kategori/edit/<?php echo $row->id_kategori;?>" class="btn btn-mini btn-danger"><i class="icon-edit bigger-120"></i></a>
			<a href="<?php echo base_url();?>index.php/admin/kategori/hapus/<?php echo $row->id_kategori;?>" class="btn btn-mini btn-info" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini');"><i class="icon-trash bigger-120"></i></a>
	</tr>
		<?php }?>
</tbody>
</table>
