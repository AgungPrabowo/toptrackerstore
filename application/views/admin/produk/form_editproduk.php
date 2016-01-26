<script type="text/javascript" src="<?= base_url();?>assets/ckeditor/ckeditor.js"></script>
<?=form_open_multipart('admin/produk/simpan');?>
 	<div class="control-group">
		<div>
			<input type="hidden" id="kategori1" value="<?=$kategori;?>">
			<input type="hidden" name="id_produk" value="<?=$id_produk;?>">
 			<input type="hidden" name="gambar" value="<?=$gambar;?>">
 			<input type="hidden" name="tipe" value="<?=$tipe;?>">
		 </div>
	</div>

	<div class="control-group">
		<label class="control-label">Judul</label>
		<div>
			<input type="text" name="judul_produk" id="judul-produk" placeholder="Judul" class="span5" value="<?=$judul_produk;?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Harga</label>
		<div>
			<input type="text" name="harga" id="harga" class="span2" placeholder="Harga" value="<?=$harga;?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Stok</label>
		<div>
			<input type="text" name="stok" id="stok" class="span2" placeholder="Stok" value="<?=$stok;?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Kategori</label>
		<div class="controls">
			<select name="kategori" id="kategori" required>
				<?php foreach($data->result() as $row):?>
				<option value="<?=$row->id_kategori;?>"><?=$row->kategori;?></option>
				<?php endforeach;?>
			</select>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Deskripsi</label>
		<div>
			<textarea type="text" name="isi" id="isi" class="ckeditor" ><?=$isi;?></textarea>
		</div>
	</div> 

	<div class="control-group">
		<label class="control-label">Cover</label>
		<div>
			<input type="file" id="id-input-file-2" name="userfile" id="userfile">
		</div>
	</div> 

	 <div class="control-group">
		<label class="control-label">Aktif</label>
		<div>
			<select name="aktif" id="aktif">
				<option value="<?=$aktif;?>"><?=$aktif;?></option>
				<?php 
					$y = "Y";
					if($aktif == $y):?>
					<option value="N">N</option>						
					<?php else:?>
					<option value="Y">Y</option>						
					<?php endif;?>
			</select>
		</div>
	</div> 

	<button type="submit" class="btn btn-primary btn-small">Simpan</button>
	<a href="<?=site_url('/admin/produk');?>" class="btn btn-danger btn-small">Batal</a>
</form>
<script type="text/javascript">
	$(function(){

		$('#id-input-file-2').ace_file_input({
			no_file:'Tidak ada File ...',
			btn_choose:'Pilih',
			btn_change:'Ganti',
			droppable:false,
			onchange:null,
			thumbnail:false //| true | large
			//whitelist:'gif|png|jpg|jpeg'
			//blacklist:'exe|php'
			//onchange:''
			//
		});

		var key = $("#kategori1").val();
		$("#kategori").val(key).prop({selected});
	});

</script>
