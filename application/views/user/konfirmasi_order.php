<?=$this->load->view('tampilan_header');?>
<?=$this->load->view('tampilan_menu_atas');?>
<?=$this->load->view('tampilan_menu_bawah');?>
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/js/jquery-easyui-1.4.4/themes/black/easyui.css');?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/js/jquery-easyui-1.4.4/themes/mobile.css');?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/js/jquery-easyui-1.4.4/themes/color.css');?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('jquery-easyui-1.4.4/themes/icon.css');?>">
<script type="text/javascript" src="<?=base_url('assets/js/jquery-easyui-1.4.4/jquery.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/jquery-easyui-1.4.4/jquery.easyui.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/jquery-easyui-1.4.4/jquery.easyui.mobile.js');?>"></script>
<script type="text/javascript">
$(document).ready(function(){

  $('#destination').combobox({
    onSelect : function(){
    var origin      = $('#origin').val();
    var destination = $('#destination').combobox('getValue');
    var destination1= $('#destination').combobox('getText');
    var weight      = $('#berat').val();
    var key         = 'konfirmasi order';
    var courier     = $('#courier').val();
      if(courier != 0)
      {
        $('#destination1').attr('value',destination1);

          // ambil biaya ongkir
          $.get('<?=site_url();?>/order/result_ongkir/'+origin+'/'+destination+'/'+courier+'/'+key+'/'+weight,function(data){
            $('#result').html(data);
        });
      }
      else
      {
        return false;
      }
    }
  });

   $('#simpan').click(function(){
    $('form').submit();
   });


  $('#courier').change(function(){
  var origin      = $('#origin').val();
  var destination = $('#destination').combobox('getValue');
  var destination1= $('#destination').combobox('getText');
  var courier     = $('#courier').val();
  var weight      = $('#berat').val();
  var key         = 'konfirmasi order';
  if(destination == 0)
  {
    return false;
  }
  else
  {
    //ambil nilai #destination
    $('#destination1').attr('value',destination1);

      // ambil biaya ongkir
      $.get('<?=site_url();?>/order/result_ongkir/'+origin+'/'+destination+'/'+courier+'/'+key+'/'+weight,function(data){
        $('#result').html(data);
      });
    }
  });
});
</script>
<br><br><br>        
<!-- form alamat pengiriman -->
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
            <input type="hidden" name="origin" id="origin" value="399">
            <input type="hidden" name="destination" id="destination1">
            <input type="hidden" id="berat" value="<?=$berat;?>000">
            <input type="text" class="form-control" name="nm_penerima" id="nm_penerima" value="<?=$nm_penerima;?>" required>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label">Telephone</label>
          <div>
            <input type="text" class="form-control" name="no_telp" id="no_telp" value="<?=$no_telp;?>" required>
          </div>
        </div>

      <div class="form-group">
        <label class="control-label">Alamat</label>
        <div>
          <input type="text" class="form-control" name="alamat" id="alamat" value="<?=$alamat;?>" required>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label">Kode Pos</label>
        <div>
          <input type="text" class="form-control" name="kode_pos" id="kode_pos" value="<?=$kode_pos;?>" required>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label">Kota</label>
        <div>
           <input class="easyui-combobox" id="destination" prompt="Kota Asal Penerima" style="width:100%" required data-options="
           valueField: 'city_id',
           textField: 'city_name',
           url:'<?=site_url();?>/order/ambil_kota',
           method:'get',
           panelHeight:'30%'">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label">Kurir</label>
        <div>
          <select name="courier" id="courier" class="form-control">
            <option value="0">PILIH</option>
            <option value="jne">JNE</option>
            <option value="tiki">TIKI</option>
            <option value="pos">POS</option>
          </select>
        </div>
      </div>

      <div id="result"></div>

      <div class="form-group">
        <label class="control-label">Catatan</label>
        <textarea name="catatan" class="form-control"></textarea>
      </div>

  </div><!-- End class=col-sm-12 col-md12 -->

  <div class="col-sm-12 col-md-12">
        <div align="right">
          <a class="btn btn-primary" id="simpan">
            Simpan</a>
        </div>
  </div>
</form>
<?=br(50);?>
