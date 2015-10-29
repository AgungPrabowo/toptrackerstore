<script>
$(document).ready(function(){

  $("#simpan").click(function(){
    var string = $("#form-datadiri").serialize();

    $.ajax({
      type    : 'POST',
      url     : '<?php echo site_url();?>/order/simpan',
      data    : string,
      success : function(){
        alert('success');
      }
    });
  });

});
</script>
<div class="panel panel-default">
  <div class="panel-heading" role="tab" id="headingTwo">
    <h4 class="panel-title">
        <strong id="data-diri">Step 2 : Data Diri dan Alamat Anda</strong>
    </h4>
  </div><!-- End class=panel-heading -->

  <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
    <div class="panel-body">
            <form id="form-datadiri" name="form-datadiri">

      <div class="col-sm-6 col-md-6">
          <h1>Data Diri Anda</h1>
            <div class="form-group">
              <label class="control-label">Nama Depan</label>
              <div>
                <input type="hidden" name="id_customer">
                <input type="hidden" name="id_customer_user">
                <input type="text" class="form-control" placeholder="Nama Depan" name="nama_depan" id="nama_depan" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Nama Belakang</label>
              <div>
                <input type="text" class="form-control" placeholder="Nama Belakang" name="nama_belakang" id="nama_belakang" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-group">Email</label>
              <div>
                <input type="email" class="form-control" placeholder="Email" name="email" id="email" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Telephone</label>
              <div>
                <input type="text" class="form-control" placeholder="Telephone" name="telephone" id="telephone" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Fax</label>
              <div>
                <input type="text" class="form-control" placeholder="Fax" name="fax" id="fax">
              </div>
            </div>
            <h1>Username Dan Password Anda</h1>
            <div class="form-group">
              <label class="control-label">Username</label>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="username" id="username" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Password</label>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Ulangi Password</label>
              <div>
                <input type="password" class="form-control" placeholder="Ulangi Password" id="re-password" required>
              </div>
            </div>
        </div><!-- End class=col-sm-6 col-md6 -->

        <div class="col-sm-6 col-md-6">
          <h1>Alamat Anda</h1>
          <div class="form-group">
            <label class="control-label">Alamat 1</label>
            <div>
              <input type="text" class="form-control" placeholder="Alamat 1" name="alamat1" id="alamat1" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Alamat 2</label>
            <div>
              <input type="text" class="form-control" placeholder="Alamat 2" name="alamat2" id="alamat2">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Kode Pos</label>
            <div>
              <input type="text" class="form-control" placeholder="Kode Pos" name="kode_pos" id="kode_pos" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Provinsi</label>
            <div>
              <select class="form-control" name="provinsi" id="provinsi" required>
                <option>---Pilih Provinsi---</option>
                <?php
                $provinsi = $this->db->get('provinces');
                foreach($provinsi->result() as $prov):
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
              <select class="form-control" name="kota" id="kota" required>
                <option>---Pilih Kota---</option>
                <?php
                $kota = $this->db->get('regencies');
                foreach($kota->result() as $kota):
                ?>
                <option value="<?=$kota->id;?>"><?=$kota->name;?></option>
                <?php
                endforeach;
                ?>
              </select>
            </div>
          </div>
      </div><!-- End class=col-sm-6 col-md6 -->

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