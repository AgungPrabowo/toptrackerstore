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
// $(document).ready(function(){

// //ambil id/nilai PROVINSI dan kirim ke function getkota jika sukses ambil data getkota letakan di #kota dan #kota1
//   $("#provinsi").change(function(){
//     var key  = $("#provinsi").val();
//     var url = '<?=site_url();?>/order/getkota/'+key;


//     $.ajax({
//       type    : 'POST',
//       url     : '<?=site_url();?>/order/getkota/'+key,
//       success : function(){
//         $.get(url).done(function(data){
//           $("#kota").html(data);
//             });
//       }
//     });
//   });

// //ambil id/nilai KOTA dan kirim ke function getkec jika sukses ambil data getkec dan letakan di #kecamatan
//   $("#kota").change(function(){
//     var key = $("#kota").val();
//     var url = '<?=site_url();?>/order/getkec/'+key;


//     $.ajax({
//       type    : 'POST',
//       url     : '<?=site_url();?>/order/getkec/'+key,
//       success : function(){
//         $.get(url).done(function(data){
//           $("#kecamatan").html(data);
//         });
//       }
//     });
//   });
  
// });
 // $(function(){
 // $('#cekOngkir').click(function(){
 // $('form').submit();
 // })
 // })

// $(document).ready(function(){
//   var origin1     = $('#origin').val();
//   var destination1= $('#destination').val();
//   var courier1    = $('#courier').val();

//   $('#courier').change(function(){
//     $.ajax({
//       type: 'POST',
//       url: '<?=site_url();?>/order/result_ongkir',
//       data:{
//         origin : origin1,
//         destination : destination1,
//         courier : courier1
//       },
//       success : function(){
//         $.get('<?=site_url();?>/order/result_ongkir',function(data){
//           $('#result').html(data);
//         });
//       }
//     });
//   });
// });

$(document).ready(function(){

   $('#simpan').click(function(){
    $('form').submit();
   });

  $('#courier').change(function(){
  var origin      = $('#origin').val();
  var destination = $('#destination').combobox('getValue');
  var destination1= $('#destination').combobox('getText');
  var courier    = $('#courier').val();

  //ambil nilai #destination
  $('#destination1').attr('value',destination1);

    // ambil biaya ongkir
    $.get('<?=site_url();?>/order/result_ongkir/'+origin+'/'+destination+'/'+courier,function(data){
      $('#result').html(data);
    });
  });

  // $('#destination').on(function(){
  // var origin1     = $('#origin').val();
  // var destination1= $('#destination').combobox('getValue');
  // var courier1    = $('#courier').val();

  // if(courier1 == null)
  // {
  //   return false;
  // }
  // else
  // {

  //   $.get('<?=site_url();?>/order/result_ongkir/'+origin1+'/'+destination1+'/'+courier1,function(data){
  //     $('#result').html(data);
  //   });

  // }
  // });

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
        <label class="control-label">Catatan : Bug pada kota, kurir dan berat</label>
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
