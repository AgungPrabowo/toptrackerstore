<script type="text/javascript">
$(document).ready(function(){

	var url 	= '<?=site_url();?>/blog/ambil_komentar/<?=$id_produk;?>';

	$.get(url).done(function(data){
		$('#komentar').html(data);
	});

	$('#simpan').click(function(){

		//Buat variabel untuk mendapatkan nilai dari form #form-komentar
		var isi_komen	= $('#isi').val();
		var id_komen	= $('#id_komentar').val();
		var id_product	= $('#id_produk').val();
		var email_komen	= $('#email').val();
		var nama_komen	= $('#nama').val();

		$.ajax({
			type   : 'POST',
			url    : '<?=site_url();?>/blog/insert_komentar',
			data   : {
						isi 		: isi_komen,
						id_komentar	: id_komen,
						id_produk	: id_product,
						email 		: email_komen,
						nama 		: nama_komen
					},
				success	: function(){
					$('#isi').val('');
					$('#nama').val('');
					$('#email').val('');
					$.get(url).done(function(data){
						$('#komentar').html(data);
				});
			}
		});
	});
});
</script>
<div class="row">
	<div id="komentar"></div>
	<div class="col-md-12" style="background-color:red;">	
		<form class="form-horizontal" id="form-komentar" name="form-komentar">
			<div class="form-group">
				<div class="col-sm-12">
					<textarea class="form-control" name="isi" id="isi" placeholder="Tulis Komentar Anda disini" rows="3"><?=$isi;?></textarea>
				</div>
			</div>
				<div id="show">
					<div class="form-group">
						<div class="col-sm-12">
							<input type="hidden" name="komentar" id="id_komentar" value="<?=$id_komentar;?>">
							<input type="hidden" name="id_produk" id="id_produk" value="<?=$id_produk;?>">
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
							<button type="button" class="btn btn-default" id="simpan">Post Komentar</button>
						</div>
					</div>
				</div>
		</form>
	</div>
</div>
