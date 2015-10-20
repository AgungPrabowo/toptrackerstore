<script type="text/javascript">
			$(function() {
				var oTable1 = $('#sample-table-2').dataTable( {
				"aoColumns": [
			      null, null, null, null, null, null,
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
	<a href="<?php echo base_url();?>index.php/admin/produk/tambah" class="btn btn-primary btn-small">Tambah</a>
</p>
<table id="sample-table-2" class="table table-striped table-bordered table-hover">
<thead>
	<tr>
		<th>No</th>
		<th>Nama Produk</th>
		<th>Harga</th>
		<th>Stok</th>
		<th>Kategori</th>
		<th>Dibuat</th>
		<th>Aktif</th>
		<th>Aksi</th>
	</tr>
</thead>
<tbody>
	<tr>
		<?php
		$no = 1;
		foreach($data->result() as $row){
			$kategori = $this->model_produk->tampilkategori($row->id_kategori);
		?>
		<td><?php echo $no++;?></td>
		<td><?php echo $row->judul;?></td>
		<td><?php echo "Rp ".number_format($row->harga,2,',','.');?></td>
		<td><?php echo $row->stok;?></td>
		<td><?php echo $kategori;?></td>
		<td><?php echo generate_tanggal(gmdate('d/m/Y-H:i',$row->tanggal))." WIB";?></td>
		<td><?php echo $row->aktif;?></td>
		<td>
			<a href="<?php echo base_url();?>index.php/admin/produk/edit/<?php echo $row->id_produk;?>" class="btn btn-mini btn-danger"><i class="icon-edit bigger-120"></i></a>
			<a href="<?php echo base_url();?>index.php/admin/produk/hapus/<?php echo $row->id_produk;?>" class="btn btn-mini btn-info" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini');"><i class="icon-trash bigger-120"></i></a>
	</tr>
		<?php }?>
</tbody>
</table>
