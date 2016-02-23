<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
 <title>Raja Ongkir - Cek Ongkos Kirim</title>
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/js/jquery-easyui-1.4.4/themes/black/easyui.css');?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/js/jquery-easyui-1.4.4/themes/mobile.css');?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('assets/js/jquery-easyui-1.4.4/themes/color.css');?>">
 <script type="text/javascript" src="<?=base_url('assets/js/jquery-easyui-1.4.4/jquery.min.js');?>"></script>
 <script type="text/javascript" src="<?=base_url('assets/js/jquery-easyui-1.4.4/jquery.easyui.min.js');?>"></script>
 <script type="text/javascript" src="<?=base_url('assets/js/jquery-easyui-1.4.4/jquery.easyui.mobile.js');?>"></script>
 <script type="text/javascript">
$(document).ready(function(){

   $('#cekOngkir').click(function(){
	  var origin      = $('#origin').combobox('getValue');
	  var destination = $('#destination').combobox('getValue');
	  var courier     = $('#courier').combobox('getValue');
	  var key 		  = $('#key').val();
	  var weight	  = $('#weight').val();

	  if(origin && destination && courier && weight && weight <= 30)
	  {
	    // ambil biaya ongkir
	    $.get('<?=site_url();?>/order/result_ongkir/'+origin+'/'+destination+'/'+courier+'/'+key+'/'+weight+'000',function(data){
	      $('#result').html(data);
    	});
	   }
	   else
	   {
	   	return false;
	   }
	});
});
 </script>
</head>
<body>
 <div class="easyui-navpanel" style="position:relative;padding:20px">
 <header>
 <div class="m-toolbar">
<!--  <div class="m-title">Raja Ongkir Form</div>
 --> 
 <div class="m-left">
 	<a href="javascript:history.back(1)" class="easyui-linkbutton" style="width:60px">Back</a>
 </div>
 <div class="m-right">
 <a href="javascript:void(0)" class="easyui-linkbutton" onclick="$('#ff').form('reset')" style="width:60px">Reset</a>
 </div>
 </div>
 </header>
 <form id="ff" name="frmOngkir" method="POST" action="result.php">
 <div>
 <label>Kota Asal Pengiriman</label>
 <input type="hidden" id="key" name="key" value="cek_ongkir">
 <input class="easyui-combobox" id="origin" prompt="Kota Asal Pengiriman" name="origin" style="width:100%" required data-options="
 valueField: 'city_id',
 textField: 'city_name',
 url:'../order/ambil_kota',
 method:'get',
 panelHeight:'30%'
 
 ">
 <!-- <input class="easyui-textbox" prompt="Kota Asal Pengiriman" style="width:100%" data-options="required:true"> -->
 </div>
 <div>
 <label>Kota Tujuan Pengiriman</label>
 <input class="easyui-combobox" id="destination" prompt="Kota Tujuan Pengiriman" name="destination" style="width:100%" required data-options="
 valueField: 'city_id',
 textField: 'city_name',
 url:'../order/ambil_kota',
 method:'get',
 panelHeight:'30%' ">
 <!-- <input class="easyui-textbox" prompt="Kota Tujuan Pengiriman" style="width:100%" data-options="required:true"> -->
 </div>
  <div>
 <label>Kurir</label>
 <select name="courier" id="courier" class="easyui-combobox" style="width:100%" data-options="required:true">
 	<option value="0"></option>
 	<option value="jne">JNE</option>
 	<option value="tiki">TIKI</option>
 	<option value="pos">POS</option>
 </select>
 <!-- <input class="easyui-textbox" prompt="Kota Tujuan Pengiriman" style="width:100%" data-options="required:true"> -->
 </div>
 <div>
 <label>Berat/Kg <font color="yellow"><i>(max 30kg)</i></font></label><br>
 <input class="easyui-numberbox" name="weight" id="weight" style="width:100%" data-options="required:true">
 </div>
 <div style="text-align:center;margin-top:30px">
 <a class="easyui-linkbutton" style="width:100%;height:40px" id="cekOngkir"><span style="font-size:16px">Periksa Ongkir</span></a>
 </div>

 <div id="result"></div>