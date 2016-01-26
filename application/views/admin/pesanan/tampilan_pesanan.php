<script type="text/javascript">
$(document).ready(function(){
$(function() {
	var oTable1 = $('#sample-table-2').dataTable( {
	"aoColumns": [
      null, null, null, null,
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

$('a').click(function(){
	var val 		= $('#id_order').val();
	var nama_toko 	= $('#nama_toko').val();
	var key 		= "<?=site_url('/admin/pesanan/terkirim')?>/"+val;
	$('#modal').attr("action",key);
	$('#id').val(val);
});
});
	</script>

<!--pemberitahuan kesalahan-->
<?php 
$info = $this->session->flashdata('info');
if($info):?>
<div class="alert alert-block alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button> 
    <i class="glyphicon glyphicon-remove"></i>
    <?=$info;
    endif;?>
</div>

<div class="row-fluid">
	<div class="span12">
		<div class="tabbable">
			<ul class="nav nav-tabs" id="myTab">
				<li class="active">
					<a data-toggle="tab" href="#home">
						<i class="red icon-lock bigger-110"></i>
						Tertunda
						<span class="badge badge-grey" id="ok"><?=$data_tertunda->num_rows();?></span>
					</a>
				</li>

				<li>
					<a data-toggle="tab" href="#profile">
						<i class="green icon-unlock bigger-110"></i>
						Terkirim
						<span class="badge badge-grey"><?=$data_terkirim->num_rows();?></span>
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
								<th>Nama Toko</th>
								<th>QTY</th>
								<th>Harga</th>
								<th>Aksi</th>
							</tr>
						</thead>
							<tbody>
								<tr>
									<?php
									if($data_tertunda->num_rows() == 0):?>
									<td><br></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<?php
									endif;
									$no = 1;
									foreach($data_tertunda->result() as $row):
									$query = $this->model_pesanan->getdata_namatoko($row->nama_toko);
									$client = $this->model_customer->getdata_admin($row->id_admin);
									if($level == 'Admin'):?>
									<td><?=$client->row()->nama;?></td>
									<?php else:?>
									<td><?=$no++;endif;?></td>
									<td><?=$query->nama_toko;?></td>
									<td><?=$row->qty;?></td>
									<td><?="Rp ".number_format($row->harga,0,',','.');?></td>
									<td>
										<a href="#myModal" data-toggle="modal" class="btn btn-mini btn-success">
											<input type="hidden" value="<?=$row->id_order;?>" id="id_order">
										<i class="icon-arrow-right  icon-on-right"></i>
									</td>
								</tr>
								<?php endforeach;?>
							</tbody>
					</table>
				</div>

				<div id="profile" class="tab-pane">
					<table id="sample-table-3" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<?php 
							if($level == 'Admin'):?>
							<th>Client</th>
							<?php else:?>
							<th>No</th>
							<?php endif;?>
							<th>Kode Sales</th>
							<th>Nama</th>
							<th>Harga</th>
						</tr>
					</thead>
					<tbody>
							<tr>
								<?php
								if($data_terkirim->num_rows() == 0):?>
								<td><br></td>
								<td></td>
								<td></td>
								<td></td>
								<?php
								endif;
								$no = 1;
								foreach($data_terkirim->result() as $row):
								$query = $this->model_pesanan->getdata_namatoko($row->nama_toko);
								//ambil nama admin/marketing
								$client = $this->model_customer->getdata_admin($row->id_admin);
								if($level == 'Admin'):?>
								<td><?=$client->row()->nama;?></td>
								<?php else:?>
								<td><?=$no++;endif;?></td>
								<td><?=$query->nama_toko;?></td>
								<td><?=$row->qty;?></td>
								<td><?="Rp ".number_format($row->harga,0,',','.');?></td>
							</tr>
							<?php endforeach;?>
					</tbody>
					</table>
				</div>


			</div>
		</div>

	</div><!--/span-->
</div><!--/row-->

	<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

	  <!-- Modal content-->
	  <div class="modal-content">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	      <h4 class="modal-title">Kirim Resi</h4>
	    </div>

	    <div class="modal-body">
	      <form method="POST" id="modal">

	        <div class="form-group">
	          <div class="input-group">
	            <input type="hidden" id="id" name="id_order">
	            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
	            <input type="text" class="form-control" name="resi" placeholder="No Resi" required>
	          </div>
	        </div>
	        

	    <div class="modal-footer">
	      <button type="submit" class="btn btn-success" >Simpan</button>
	      <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
	    </div>

		  	</form>
	  	</div>

	    </div>
		   </div>
	  </div>
		 </div>
		 <!-- End Modal -->
