<?=$this->load->view('tampilan_header');?>
<?=$this->load->view('tampilan_menu_atas');?>
<?=$this->load->view('tampilan_menu_bawah');?>
<script type="text/javascript">
$(document).ready(function(){

//ambil id/nilai PROVINSI dan kirim ke function getkota jika sukses ambil data getkota letakan di #kota dan #kota1
  $("#provinsi").change(function(){
    var key  = $("#provinsi").val();
    var url = '<?=site_url();?>/order/getkota/'+key;


    $.ajax({
      type    : 'POST',
      url     : '<?=site_url();?>/order/getkota/'+key,
      success : function(){
        $.get(url).done(function(data){
          $("#kota").html(data);
            });
      }
    });
  });

//ambil id/nilai KOTA dan kirim ke function getkec jika sukses ambil data getkec dan letakan di #kecamatan
  $("#kota").change(function(){
    var key = $("#kota").val();
    var url = '<?=site_url();?>/order/getkec/'+key;


    $.ajax({
      type    : 'POST',
      url     : '<?=site_url();?>/order/getkec/'+key,
      success : function(){
        $.get(url).done(function(data){
          $("#kecamatan").html(data);
        });
      }
    });
  });
  
});
</script>
<br><br><br>
<form method="POST" action="<?=site_url('/order/simpan_pesanan');?>">
  <div class="col-sm-12 col-md-12">
      <h1>Alamat Pengiriman Anda</h1>
        <div class="form-group">
          <label class="control-label">Nama Penerima</label>
          <div>
            <input type="hidden" name="id_customer" value="<?=$id_customer;?>">
            <input type="hidden" name="kode_sales" value="<?=$kode_sales->kode_sales;?>">
            <input type="hidden" name="status" value="<?=$status;?>">
            <input type="hidden" name="id_admin" value ="<?=$id_admin;?>">
            <input type="text" class="form-control" name="nm_penerima" id="nm_penerima" value="<?=$nm_penerima;?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label">Telephone</label>
          <div>
            <input type="text" class="form-control" name="no_telp" id="no_telp" value="<?=$no_telp;?>">
          </div>
        </div>
      <div class="form-group">
        <label class="control-label">Alamat</label>
        <div>
          <input type="text" class="form-control" name="alamat" id="alamat" value="<?=$alamat;?>">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label">Kode Pos</label>
        <div>
          <input type="text" class="form-control" name="kode_pos" id="kode_pos" value="<?=$kode_pos;?>">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label">Provinsi</label>
        <div>
          <select class="form-control" name="provinsi" id="provinsi">
            <option value="<?=$provinsi->id;?>"><?=$provinsi->name;?></option>
            <?php
            foreach($id_provinsi->result() as $prov):
            ?>
            <option value="<?=$prov->id;?>"><?=$prov->name;?></option>
            <?php 
            endforeach;
            ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label">Kota</label>
        <div>
          <select class="form-control" name="kota" id="kota">
            <option value="<?=$kota->province_id;?>"><?=$kota->name;?></option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label">Kecamatan</label>
        <div>
          <select class="form-control" name="kecamatan" id="kecamatan">
            <option value="<?=$kecamatan->regency_id;?>"><?=$kecamatan->name;?></option>
          </select>
        </div>
      </div>
  </div><!-- End class=col-sm-12 col-md12 -->

  <div class="col-sm-12 col-md-12">
        <div align="right">
          <button type="submit" class="btn btn-primary">
            Simpan</button>
        </div>
  </div>
</form>
<?=br(35);?>