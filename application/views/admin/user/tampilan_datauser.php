<script type="text/javascript">
			$(function() {
				var oTable1 = $('#sample-table-2').dataTable( {
				"aoColumns": [
			      null, null,
				  { "bSortable": false }
				] } );

			})

			function validasi(){
				if($('#pass-baru').val() != $('#re-pass-baru').val()){
					alert('Password Baru tidak sama');
					$('#pass-baru').focus();
					return false;
				}
			}
</script>

<!--pemberitahuan-->
<?php 
$info = $this->session->flashdata('info');
$true = $this->session->flashdata('true');
if($info||$true){
  if($info){
    $alert   = 'danger';
    $content = $info;
    $icon    = 'remove';
  }else{
    $alert   = 'success';
    $content = $true;
    $icon    = 'ok';
  }
  ?>
<div class="alert alert-block alert-<?=$alert;?>" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button> 
    <i class="glyphicon glyphicon-<?=$icon;?>"></i>
    <?=$content;
    }?>
</div>

<div class="space-6"></div>
<p>
	<!--hak akses tambah user hanya Admin-->
	<?php
	if($level == 'Admin'):
	?>
	<a href="#tambah" role="button" data-toggle="modal" class="btn btn-primary btn-small">Tambah</a>
	<?php endif;?>
</p>
<table id="sample-table-2" class="table table-striped table-bordered table-hover">
<thead>
	<tr>
		<th>No</th>
		<th>Username</th>
		<th>Aksi</th>
	</tr>
</thead>
<tbody>
	<tr>
		<!-- Untuk Level Marketing -->
		<?php
		$no = 1;
		foreach($data->result() as $row):
			// tampilkan data user
			if($row->username == $user && $level == 'Marketing'):
		?>
		<td><?=$no++;?></td>
		<td><?=$row->username;?></td>
		<td>
			<a href="#edit-<?=$row->no;?>" data-toggle="modal" role="button" class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></a>
			<a href="#edit-pass-<?=$row->no;?>" data-toggle="modal" role="button" class="btn btn-mini btn-success"><i class="icon-edit bigger-120"></i></a>
	</tr>
		<?php 
		endif;
		endforeach;?>
		
		<!-- Untuk Level Admin -->
		<?php
		if($level == 'Admin'):
		$no = 1;
		foreach($data->result() as $row):?>
		<td><?=$no++;?></td>
		<td><?=$row->username;?></td>
		<td>
			<a href="#edit-<?=$row->no;?>" data-toggle="modal" role="button" class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></a>
			<a href="#edit-pass-<?=$row->no;?>" data-toggle="modal" role="button" class="btn btn-mini btn-success"><i class="icon-edit bigger-120"></i></a>
			<a href="<?=site_url('/admin/user/hapus/');?><?=$row->no;?>" class="btn btn-mini btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini');"><i class="icon-trash bigger-120"></i></a>
	</tr>
		<?php 
		endforeach;
		endif;
		?>
</tbody>
</table>

<!--Modal Tambah-->
<div id="tambah" class="modal hide" tabindex="-1">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="blue bigger">Tambah User</h4>
	</div>

	<form class="form-horizontal" method="POST" action="<?=site_url('/admin/user/simpan');?>">
		<div class="modal-body overflow-visible">
			<div class="row-fluid">
				<div class="span12">

					<div class="control-group">
						<label class="control-label">Nama User</label>
						<div class="controls">
							<input type="hidden" name="key" value="tambah">
							<input type="text" name="nama" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Email</label>
						<div class="controls">
							<input type="email" name="email" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Username</label>
						<div class="controls">
							<input type="text" name="username" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Password</label>
						<div class="controls">
							<input type="password" name="password" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Level</label>
						<div class="controls">
							<select name="level">
								<option>--PILIH--</option>
								<option value="Admin">Admin</option>
								<option value="Marketing">Marketing</option>
								<option value="Operator">Operator</option>
							</select>
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

<!--Modal Edit-->
<?php
	foreach($data->result() as $row):
?>
<div id="edit-<?=$row->no;?>" class="modal hide" tabindex="-1">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="blue bigger">Update Data User</h4>
	</div>

	<form class="form-horizontal" method="POST" action="<?=site_url('/admin/user/simpan');?>" onsubmit="return validasi();">
		<div class="modal-body overflow-visible">
			<div class="row-fluid">
				<div class="span12">

					<div class="control-group">
						<label class="control-label">Nama User</label>
						<div class="controls">
							<input type="hidden" name="id_admin" value="<?=$row->no;?>">
							<input type="hidden" name="key" value="update">
							<input type="text" name="nama" value="<?=$row->nama;?>" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Email</label>
						<div class="controls">
							<input type="email" name="email" value="<?=$row->email;?>" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Username</label>
						<div class="controls">
							<input type="text" name="username" value="<?=$row->username;?>" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Password</label>
						<div class="controls">
							<input type="password" name="password" required>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Level</label>
						<div class="controls">
							<select name="level" id="<?=$row->level;?>">
								<option value="Admin">Admin</option>
								<option value="Marketing">Marketing</option>
								<option value="Operator">Operator</option>
							</select>
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
<!--End Modal Edit-->

<!--Modal Edit-pass-->
<?php
	foreach($data->result() as $row):
?>
<div id="edit-pass-<?=$row->no;?>" class="modal hide" tabindex="-1">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="blue bigger">Update Password</h4>
	</div>

	<form class="form-horizontal" method="POST" action="<?=site_url('/admin/user/simpan');?>" onsubmit="return validasi();">
		<div class="modal-body overflow-visible">
			<div class="row-fluid">
				<div class="span12">

					<div class="control-group">
						<div class="controls">
							<input type="hidden" name="id_admin" value="<?=$row->no;?>">
							<input type="hidden" name="key" value="update-pass">
							<input type="hidden" name="nama"value="<?=$row->nama;?>">
							<input type="hidden" name="email" value="<?=$row->email;?>" required>
							<input type="hidden" name="username" value="<?=$row->username;?>" required>
							<input type="hidden" name="level" value="<?=$row->level;?>">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Password Lama</label>
						<div class="controls">
							<input type="password" name="password-lama" required>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">Password Baru</label>
						<div class="controls">
							<input type="password" name="password" id="pass-baru" required>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label">Ulangi Password Baru</label>
						<div class="controls">
							<input type="password" name="ulangi-password-baru" id="re-pass-baru" required>
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
<!--End Modal Edit-pass-->

<script type="text/javascript">
	$(document).ready(function(){
		// belum selesai
		$('select#Operator').val('Operator').prop({selected});
		$('select#Marketing').val('Marketing').attr({selected});
	});
</script>