<script>
$(document).ready(function(){

  //validasi form_datadiri
  $("#simpan").click(function(){
    var string = $("#form-datadiri").serialize();

    if(!$("#nama_depan").val())
    {
      alert("Nama Depan tidak boleh kosong");
      $("#nama_depan").focus();
      return false;
    }
    else if(!$("#nama_belakang").val())
    {
      alert("Nama Belakang tidak boleh kosong");
      $("#nama_belakang").focus();
      return false;
    }
    else if(!$("#email").val())
    {
      alert("Email tidak boleh kosong");
      $("#email").focus();
      return false;
    }
    else if(!$("#telephone").val())
    {
      alert("Telephone tidak boleh kosong");
      $("#telephone").focus();
      return false;
    }
    else if(!$("#alamat1").val())
    {
      alert("Alamat 1 tidak boleh kosong");
      $("#alamat1").focus();
      return false;
    }
    else if(!$("#kode_pos").val())
    {
      alert("Kode Pos tidak boleh kosong");
      $("#kode_pos").focus();
      return false;
    }
    else if($("#provinsi").val() == 0)
    {
      alert("Provinsi tidak boleh kosong");
      $("#provinsi").focus();
      return false;
    }
    else if($("#kota").val() == 0)
    {
      alert("Kota tidak boleh kosong");
      $("#kota").focus();
      return false;
    }
    else if($("#kecamatan").val() == 0)
    {
      alert("Kecamatan tidak boleh kosong");
      $("#kecamatan").focus();
      return false;
    }
    else if(!$("#username").val())
    {
      alert("Username tidak boleh kosong");
      $("#username").focus();
      return false;
    }
    else if(!$("#password").val())
    {
      alert("Password tidak boleh kosong");
      $("#password").focus();
      return false;
    }
    else if(!$("#re-password").val())
    {
      alert("Ulangi Password tidak boleh kosong");
      $("#re-password").focus();
      return false;
    }
    else if($("#password").val() != $("#re-password").val())
    {
      alert("Password tidak sama");
      $("#password").focus();
      return false;
    }
    else
    {
      // var nama_depan    = $("#nama_depan").val();   
      // var nama_belakang = $("#nama_belakang").val();
      // var telephone     = $("#telephone").val();
      // var alamat        = $("#alamat1").val();
      // var kode_pos      = $("#kode_pos").val();
      // var provinsi      = $("#provinsi").val();
      // var kota          = $("#kota").val();
      // var kecamatan     = $("#kecamatan").val();

      $.ajax({
        type    : 'POST',
        url     : '<?=site_url();?>/order/simpan',
        data    : string,
        success : function(){
          alert('success');
          
        }
      });
    }
  });

//ambil id PROVINSI dan kirim ke function getkota jika sukses ambil data getkota dan letakan di #city
  $("#provinsi").change(function(){
    var key = $("#provinsi").val();
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

//ambil id KOTA dan kirim ke function getkec jika sukses ambil data getkec dan letakan di #kecamatan
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


//ambil data getkota dengan parameter 0
  var url = '<?=site_url();?>/order/getkota/0';
  $.get(url).done(function(data){
    $("#kota").html(data);
  });

//ambil data getkec dengan parameter 0
  var url1 = '<?=site_url();?>/order/getkec/0';
  $.get(url1).done(function(data){
    $("#kecamatan").html(data);
  });

});
</script>
<script src="<?=base_url();?>assets/angular.js/angular.min.js"></script>
<?=validation_errors();?>
<div class="panel panel-default">
  <div class="panel-heading" role="tab" id="headingTwo">
    <h4 class="panel-title">
        <strong id="data-diri">Step 2 : Data Diri dan Alamat Anda</strong>
    </h4>
  </div><!-- End class=panel-heading -->

  <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
    <div class="panel-body">
            <form id="form-datadiri" name="form-datadiri">

      <div class="col-sm-6 col-md-6">
          <h1>Data Diri Anda</h1>
            <div class="form-group">
              <label class="control-label">Nama Depan</label>
              <div>
                <input type="hidden" name="id_customer">
                <input type="hidden" name="id_customer_user">
                <input type="text" ng-model="nama_depan" class="form-control" placeholder="Nama Depan" name="nama_depan" id="nama_depan">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Nama Belakang</label>
              <div>
                <input type="text" ng-model="nama_belakang" class="form-control" placeholder="Nama Belakang" name="nama_belakang" id="nama_belakang">
              </div>
            </div>
            <div class="form-group">
              <label class="control-group">Email</label>
              <div>
                <input type="email" class="form-control" placeholder="Email" name="email" id="email">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Telephone</label>
              <div>
                <input type="text" ng-model="telephone" class="form-control" placeholder="Telephone" name="telephone" id="telephone">
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
                <input type="text" class="form-control" placeholder="Username" name="username" id="username">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Password</label>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" id="password">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Ulangi Password</label>
              <div>
                <input type="password" class="form-control" placeholder="Ulangi Password" name="re-password" id="re-password">
                <?php
                $info = $this->session->flashdata('info');
                if(!empty($info))
                {
                  echo $info;
                }
                ?>
              </div>
            </div>
        </div><!-- End class=col-sm-6 col-md6 -->

        <div class="col-sm-6 col-md-6">
          <h1>Alamat Anda</h1>
          <div class="form-group">
            <label class="control-label">Alamat 1</label>
            <div>
              <input type="text" ng-model="alamat1" class="form-control" placeholder="Alamat 1" name="alamat1" id="alamat1">
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
              <input type="text" ng-model="kode_pos" class="form-control" placeholder="Kode Pos" name="kode_pos" id="kode_pos">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Provinsi</label>
            <div>
              <select class="form-control" name="provinsi" id="provinsi">
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
            <div>
              <select class="form-control" name="kota" id="kota">
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">Kecamatan</label>
            <div>
              <select class="form-control" name="kecamatan" id="kecamatan">
              </select>
            </div>
          </div>
      </div><!-- End class=col-sm-6 col-md6 -->

      <div class="col-sm-12 col-md-12">
            <div align="right">
              <button type="button" class="btn btn-primary" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree" name="simpan" id="simpan">
                Continue</button>
            </div>
      </div>
        </form>


    </div><!-- End class=panel-body -->
  </div><!-- End class=panel panel-collapse -->
</div><!-- End class=panel panel-default -->