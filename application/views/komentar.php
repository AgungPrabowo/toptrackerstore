<script type="text/javascript">
// $(document).ready(function(){

// 	$("#simpan").click(function(){
// 		// ambil data dari form komentar
// 		var string = $("#form-komentar").serialize();

// 		$.ajax({
// 			type		: 'POST',
// 			url 		: '<?=site_url();?>/blog/insert_komentar',
// 			data		: string,
// 			success		: function(){
// 				$("#isi").val('');
// 				$("#email").val('');
// 				$("#nama").val('');
//       		}
// 		});
// 	});
// });
</script>
<div class="row">
	<div class="col-md-12" style="background-color:red;">	
		<p id="loading"></p>
	<?php
	foreach($komentar->result() as $row)
	{
		echo "<p id='komentar'>".$row->nama."<br>";
		echo generate_tanggal(gmdate('d/m/Y-H:i',$row->tanggal))." WIB<br>";
		echo $row->isi_komentar.'</p>';
	}

	?>	
		<form class="form-horizontal" id="form-komentar" name="form-komentar" action="<?=site_url();?>/blog/insert_komentar" method="POST">
			<div class="form-group">
				<div class="col-sm-12">
					<textarea class="form-control" name="isi" id="isi" placeholder="Tulis Komentar Anda disini" rows="3"><?=$isi;?></textarea>
				</div>
			</div>
				<div id="show">
					<div class="form-group">
						<div class="col-sm-12">
							<input type="hidden" name="komentar" value="<?=$id_komentar;?>">
							<input type="hidden" name="id_produk" value="<?=$id_produk;?>">
							<input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?=$email;?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" value="<?=$nama;?>" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<button type="submit" name="simpan" class="btn btn-default" id="simpan">Post Komentar</button>
						</div>
					</div>
				</div>
		</form>
	</div>
</div>
