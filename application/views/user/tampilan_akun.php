<?=$this->load->view('tampilan_header');?>
<?=$this->load->view('tampilan_menu_atas');?>
<?=$this->load->view('tampilan_menu_bawah'); echo br(3);?>
<script type="text/javascript">
$(document).ready(function(){

//ambil id/nilai PROVINSI dan kirim ke function getkota jika sukses ambil data getkota letakan di #kota dan #kota1
  $("#provinsi").change(function(){
    var key  = $("#provinsi").val();
    var url = '<?=site_url();?>/user/getkota/'+key;


    $.ajax({
      type    : 'POST',
      url     : '<?=site_url();?>/user/getkota/'+key,
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
    var url = '<?=site_url();?>/user/getkec/'+key;


    $.ajax({
      type    : 'POST',
      url     : '<?=site_url();?>/user/getkec/'+key,
      success : function(){
        $.get(url).done(function(data){
          $("#kecamatan").html(data);
        });
      }
    });
  });
  
});
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

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
           <strong id="data-diri">Profile Anda</strong>
      </a>
    </h4>
  </div><!-- End class=panel-heading -->

  <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
    <div class="panel-body">
      <form name="profil" action="<?=site_url('/user/updatedata_profil');?>" method="POST">
          <div class="col-sm-12 col-md-12">
                <div class="form-group">
                  <label class="control-label">Kode Sales</label>
                  <div>
                    <input type="text" class="form-control" value="<?=$kode_sales;?>" name="kode_sales" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Nama Toko</label>
                  <div>
                    <input type="text" class="form-control" name="nama_toko" value="<?=$nama_toko;?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Nama Penanggung Jawab</label>
                  <div>
                    <input type="text" class="form-control" name="nm_penanggung_jawab" value="<?=$nm_penanggung_jawab;?>" required>
                  </div>
                </div>
              <div class="form-group">
                <label class="control-label">No Telephone</label>
                <div>
                  <input type="text" class="form-control" name="no_telp" value="<?=$no_telp;?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">Nama Penerima</label>
                <div>
                  <input type="text" class="form-control" name="nm_penerima" value="<?=$nm_penerima;?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">No Telp Penerima</label>
                <div>
                  <input type="text" class="form-control" name="no_telp_penerima" value="<?=$no_telp_penerima;?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">Alamat</label>
                <div>
                  <input type="text" class="form-control" name="alamat" value="<?=$alamat;?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">Kode Pos</label>
                <div>
                  <input type="text" class="form-control" name="kode_pos" value="<?=$kode_pos;?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">Provinsi</label>
                <div>
                  <select class="form-control" name="provinsi" id="provinsi" required>
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
                  <select class="form-control" name="kota" id="kota" required>
                    <option value="<?=$kota->province_id;?>"><?=$kota->name;?></option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label">Kecamatan</label>
                <div>
                  <select class="form-control" name="kecamatan" id="kecamatan" required>
                    <option value="<?=$kecamatan->regency_id;?>"><?=$kecamatan->name;?></option>
                  </select>
                </div>
              </div>
          </div><!-- End class=col-sm-12 col-md12 -->

          <div class="col-sm-12 col-md-12">
                <div>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                    <?=br(2);?>
                </div>
          </div>
       </form>

      </div><!-- End class=panel-body -->
    </div><!-- End class=panel panel-collapse -->
  </div><!-- End class=panel panel-default -->

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <strong id="data-diri">Kelola User</strong>
        </a>
      </h4>
    </div><!-- End class=panel-heading -->

    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        <form action="<?=site_url('/user/updatedata_login');?>" method="POST" onsubmit="return cekpass();">
            <div class="col-sm-12 col-md-12">
                  <div class="form-group">
                    <label class="control-label">Email</label>
                    <div>
                      <input type="hidden" name="kode_sales" value="<?=$kode_sales;?>">
                      <input type="text" class="form-control" value="<?=$email;?>" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Password Lama</label>
                    <div>
                      <input type="password" class="form-control" name="pass_lama" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Password Baru</label>
                    <div>
                      <input type="password" class="form-control" id="pass_baru" name="pass_baru" required>
                    </div>
                  </div>
                <div class="form-group">
                  <label class="control-label">Ulangi Password Baru</label>
                  <div>
                    <input type="password" class="form-control" id="ulangi_pass_baru" name="ulangi_pass_baru" required>
                  </div>
                </div>
            </div><!-- End class=col-sm-12 col-md12 -->

            <div class="col-sm-12 col-md-12">
                  <div>
                    <button type="submit" class="btn btn-primary">
                      Simpan</button>
                      <?=br(2);?>
                  </div>
            </div>
         </form>

        </div><!-- End class=panel-body -->
      </div><!-- End class=panel panel-collapse -->
    </div><!-- End class=panel panel-default -->

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <strong>Daftar Pembelian</strong>
        </a>
      </h4>
    </div><!-- End class=panel-heading -->

    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
          <div class="col-sm-12 col-md-12">
            <div class="table-responsive">
              <table class="table table-condensed">
                <tr>
                  <th>#</th>
                  <th>Tanggal Beli</th>
                  <th>No Resi</th>
                  <th>Aksi</th>
                </tr>
                <?php
                $no = 1;
                foreach($pesanan->result() as $row):
                  if($no % 2){
                    $color = 'warning';
                  }else{
                    $color = 'success';
                  }
                ?>
                <tr class="<?=$color;?>">
                  <td><?=$no++;?></td>
                  <td><?=generate_tanggal(gmdate('d/m/Y-H:i',$row->tgl_beli));?></td>
                  <td><?=$row->resi;?></td>
                  <td>
                    <a href="<?=site_url('/user/detail_order/'.$row->id_pesanan);?>" data-toggle="modal" class="btn btn-mini btn-info"><i class="glyphicon glyphicon-zoom-in"></i></a>
                  </td>
                </tr>
                <?php endforeach;?>
              </table>
            </div>
          </div><!-- End class=col-sm-12 col-md12 -->
        </div><!-- End class=panel-body -->
      </div><!-- End class=panel panel-collapse -->
    </div><!-- End class=panel panel-default -->


  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingFour">
      <h4 class="panel-title">
        <a href="<?=site_url('/user/logout');?>">
          <strong>Logout</strong>
        </a>
      </h4>
    </div><!-- End class=panel-heading -->

</div><!-- End class=panel panel-group -->
      <?=br(2);?>
    <script type="text/javascript" src="<?=base_url();?>assets/bootstrap/js/bootstrap.min.js;?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/bootstrap/js/bootstrap.js');?>"></script>
