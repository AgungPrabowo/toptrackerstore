<script>
$(document).ready(function(){
});
</script>
<div class="panel panel-default">
  <div class="panel-heading" role="tab" id="headingThree">
    <h4 class="panel-title">
        <strong id="data-diri">Step 3 : Alamat Pengiriman</strong>
    </h4>
  </div><!-- End class=panel-heading -->

  <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
    <div class="panel-body">
            <form id="form_alamat_pengiriman" name="form_alamat_pengiriman">

      <div class="col-sm-12 col-md-12">
          <h1>Alamat Pengiriman Anda</h1>
            <div class="form-group">
              <label class="control-label">Nama Depan</label>
              <div>
                <input type="hidden" name="id_customer">
                <input type="hidden" name="id_customer_user">
                <input type="text" class="form-control" name="nama_depan" id="nama_depan1" value="{{nama_depan}}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Nama Belakang</label>
              <div>
                <input type="text" class="form-control" name="nama_belakang" id="nama_belakang1" value="{{nama_belakang}}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Telephone</label>
              <div>
                <input type="text" class="form-control" name="telephone" id="telephone1" value="{{telephone}}">
              </div>
            </div>
          <div class="form-group">
            <label class="control-label">Alamat</label>
            <div>
              <input type="text" class="form-control" name="alamat1" id="alamat" value="{{alamat1}}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Kode Pos</label>
            <div>
              <input type="text" class="form-control" name="kode_pos" id="kode_pos1" value="{{kode_pos}}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Provinsi</label>
            <div>
              <select class="form-control" name="provinsi" id="provinsi1">
                <option value="0">---Pilih Provinsi---</option>
                <?php
                foreach($provinces->result() as $prov):
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
            <div id="kota">
            </div>
          </div>
      </div><!-- End class=col-sm-12 col-md12 -->

      <div class="col-sm-12 col-md-12">
            <div align="right">
              <button type="button" class="btn btn-primary" name="simpan" id="simpan">
                Continue</button>
            </div>
      </div>
        </form>

    </div><!-- End class=panel-body -->
  </div><!-- End class=panel panel-collapse -->
</div><!-- End class=panel panel-default -->