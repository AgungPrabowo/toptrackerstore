<script type="text/javascript">
			$(function() {
				var oTable1 = $('#sample-table-2').dataTable( {
				"aoColumns": [
			      null, null, null, null, null,
				  { "bSortable": false }
				] } );

			})
</script>

<?php 
$info = $this->session->flashdata('info');
if($info):?>
	<div class="alert alert-block alert-success">
	<button type="button" class="close" data-dismiss="alert">
		<i class="icon-remove"></i>
	</button>	
	<i class="icon-ok green"></i>
<?php
echo $info;
endif;
?>
</div>
<div class="space-6"></div>

<p>
	<a href="<?=site_url('/admin/produk/tambah');?>" class="btn btn-primary btn-small">Tambah</a>
</p>
<table id="sample-table-2" class="table table-striped table-bordered table-hover">
<thead>
	<tr>
		<th>No</th>
		<th>Nama Produk</th>
		<th>Harga</th>
		<th>Stok</th>
		<th>Kategori</th>
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
		<td><?=$no++;?></td>
		<td><?=$row->judul;?></td>
		<td><?="Rp ".number_format($row->harga,0,',','.');?></td>
		<td><?=$row->stok;?></td>
		<td><?=$kategori;?></td>
		<td>
			<a href="<?=site_url('/admin/produk/edit/'.$row->id_produk);?>" class="btn btn-mini btn-danger"><i class="icon-edit bigger-120"></i></a>
			<a href="<?=site_url('/admin/produk/hapus/'.$row->id_produk);?>" class="btn btn-mini btn-info" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini');"><i class="icon-trash bigger-120"></i></a>
	</tr>
		<?php }?>
</tbody>
</table>
