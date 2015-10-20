<script type="text/javascript" src="<?= base_url();?>assets/ckeditor/ckeditor.js"></script>
<?php echo form_open_multipart('admin/produk/simpan');?>
 	<div class="control-group">
		<div>
			<input type="hidden" name="id_produk" id="id_produk" value="<?php echo $id_produk;?>">
 			<input type="hidden" name="gambar" id="gambar" value="<?php echo $gambar;?>">
		 </div>
	</div>

	<div class="control-group">
		<label class="control-label">Judul</label>
		<div>
			<input type="text" name="judul_produk" id="judul-produk" placeholder="Judul" class="span5" value="<?php echo $judul_produk;?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Harga</label>
		<div>
			<input type="text" name="harga" id="harga" class="span2" placeholder="Harga" value="<?php echo $harga;?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Stok</label>
		<div>
			<input type="text" name="stok" id="stok" class="span2" placeholder="Stok" value="<?php echo $stok;?>">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Kategori</label>
		<select name="kategori" id="kategori">
			<option value="">--PILIH--</option>
			<?php
			foreach($data->result() as $row)
			{?>
				<option value="<?php echo $row->id_kategori;?>"><?php echo $row->kategori;?></option>
			<?php
			}
			?>
		</select>

	<div class="control-group">
		<label class="control-label">Deskripsi</label>
		<div>
			<textarea type="text" name="isi" id="isi" class="ckeditor" ><?php echo $isi;?></textarea>
		</div>
	</div> 

	<div class="control-group">
		<label class="control-label">Cover</label>
		<div>
			<input type="file" name="userfile" id="userfile">
		</div>
	</div> 

	 <div class="control-group">
		<label class="control-label">Aktif</label>
		<div>
			<select name="aktif" id="aktif">
				<option value="">--Pilih--</option>
					<option value="Y">Y</option>
					<option value="N">N</option>
			</select>
		</div>
	</div> 

	<button type="submit" class="btn btn-primary btn-small">Simpan</button>

</form>