<script type="text/javascript">
			$(function() {
				var oTable1 = $('#sample-table-2').dataTable( {
				"aoColumns": [
			      null, null, null,
				  { "bSortable": false }
				] } );

			})
			$(function() {
				var oTable1 = $('#sample-table-3').dataTable( {
				"aoColumns": [
			      null, null, null,
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
<?=$info; endif;?>
</div>
<div class="space-6"></div>

<p>
	<?php
	if($level == 'Marketing'):?>
	<a href="#tambah" class="btn btn-primary btn-small" role="button" data-toggle="modal">Tambah Kode Sales</a>
	<?php endif;?>
</p>

<div class="row-fluid">
	<div class="span12">
		<div class="tabbable">
			<ul class="nav nav-tabs" id="myTab">
				<li class="active">
					<a data-toggle="tab" href="#home">
						<i class="red icon-lock bigger-110"></i>
						Belum Terdaftar
						<span class="badge badge-grey"><?=$data_no->num_rows();?></span>
					</a>
				</li>

				<li>
					<a data-toggle="tab" href="#profile">
						<i class="green icon-unlock bigger-110"></i>
						Terdaftar
						<span class="badge badge-grey"><?=$data_yes->num_rows();?></span>
					</a>
				</li>
			</ul>

			<div class="tab-content">
				<div id="home" class="tab-pane in active">
					<table id="sample-table-2" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<?php if($level == 'Admin'):?>
							<th>Client</th>
							<?php else:?>
							<th>No</th>
							<?php endif;?>
							<th>Kode Sales</th>
							<th>Nama</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<tr>
						<?php
						if ($data_no->num_rows() == 0):?>
						<td><br></td>
						<td></td>
						<td></td>
						<td></td>
						</tr>
						<?php 
						endif;
						$no=1;
						foreach($data_no->result() as $row):
						//ambil nama admin/marketing
						$client = $this->model_customer->getdata_admin($row->id_admin);
						if($level == 'Admin'):?>
						<td><?=$client->row()->nama;?></td>
						<?php else:?>
						<td><?=$no++;endif;?></td>
						<td><?=$row->kode_sales;?></td>
						<td><?=$row->nm_penanggung_jawab;?></td>
						<td>
							<a href="<?=site_url('/admin/customer/edit/'.$row->id_customer);?>" class="btn btn-mini btn-danger"><i class="icon-edit bigger-120"></i></a>
							<a href="<?=site_url('/admin/customer/hapus/'.$row->id_customer);?>" class="btn btn-mini btn-info" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini');"><i class="icon-trash bigger-120"></i></a>
						</tr>
					<?php endforeach;?>
				</tbody>
					</table>
				</div>

				<div id="profile" class="tab-pane">
					<table id="sample-table-3" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<?php if($level == 'Admin'):?>
							<th>Client</th>
							<?php else:?>
							<th>No</th>
							<?php endif;?>
							<th>Kode Sales</th>
							<th>Nama</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php
							$no=1;
							foreach($data_yes->result() as $row):
							//ambil nama admin/marketing
							$client = $this->model_customer->getdata_admin($row->id_admin);
							if($level == 'Admin'):?>
							<td><?=$client->row()->nama;?></td>
							<?php else:?>
							<td><?=$no++;endif;?></td>
							<td><?=$row->kode_sales;?></td>
							<td><?=$row->nm_penanggung_jawab;?></td>
							<td>
								<a href="#update-<?=$row->id_customer;?>" role="button" data-toggle="modal" class="btn btn-mini btn-danger"><i class="icon-edit bigger-120"></i></a>
								<a href="<?=site_url('/admin/customer/hapus/'.$row->id_customer);?>" class="btn btn-mini btn-info" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini');"><i class="icon-trash bigger-120"></i></a>
							</td>
						</tr>
							<?php endforeach;?>
					</tbody>
					</table>
				</div>

			</div>
		</div>
	</div><!--/span-->
</div><!--/row-->

<!--Modal Tambah-->
<div id="tambah" class="modal hide" tabindex="-1">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="blue bigger">Tambah Kode Sales</h4>
	</div>

	<form class="form-horizontal" method="POST" action="<?=site_url('/admin/customer/simpan');?>">
		<div class="modal-body overflow-visible">
			<div class="row-fluid">
				<div class="span12">

					<div class="control-group">
						<label class="control-label">Nama Sales</label>
						<div class="controls">
							<input type="hidden" name="tipe" value="<?=$tipe;?>">
							<input type="hidden" name="key" value="tambah">
							<input type="text" name="id_admin" value="<?=$id_admin;?>">
							<input type="hidden" name="kode_sales" value="<?=rand(0,10000);?>">
							<input type="text" name="nama" placeholder="Nama Sales" required>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="modal-footer">
			<button class="btn btn-small" data-dismiss="modal">
				<i class="icon-remove"></i>
				Batal
			</button>

			<button type="submit" class="btn btn-small btn-primary">
				<i class="icon-ok"></i>
				Simpan
			</button>
		</div>

	</form>
</div>
<!--End Modal Tambah-->

<!--Modal Update-->
<?php 
foreach($data_yes->result() as $row):
?>
<div id="update-<?=$row->id_customer;?>" class="modal hide" tabindex="-1">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="blue bigger">Update Sales</h4>
	</div>

	<form class="form-horizontal" method="POST" action="<?=site_url('/admin/customer/simpan');?>">
		<div class="modal-body overflow-visible">
			<div class="row-fluid">
				<div class="span12">

					<div class="control-group">
						<label class="control-label">Nama Sales</label>
						<div class="controls">
							<input type="text" name="nama" placeholder="Nama Sales" required>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="modal-footer">
			<button class="btn btn-small" data-dismiss="modal">
				<i class="icon-remove"></i>
				Batal
			</button>

			<button type="submit" class="btn btn-small btn-primary">
				<i class="icon-ok"></i>
				Simpan
			</button>
		</div>

	</form>
</div>
<?php endforeach;?>
<!--End Modal Update-->