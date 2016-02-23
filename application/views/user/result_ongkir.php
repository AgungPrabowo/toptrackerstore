 Pengiriman Dari <b><?=$data['rajaongkir']['origin_details']['city_name'];?> </b>
 ke <b><?=$data['rajaongkir']['destination_details']['city_name'];?></b> @ <?php echo $weight;?> Kg
 <?php
 for ($i=0; $i < count($data['rajaongkir']['results']); $i++):
	 for ($j=0; $j < count($data['rajaongkir']['results'][$i]['costs']); $j++):
	 ?>

	 <div class="radio">
	 <label>
	 	<!-- nilai dari layanan digabungkan dengan biaya kirim -->
	 	<input type="radio" name="layanan" value="<?=$data['rajaongkir']['results'][$i]['costs'][$j]['service'];?>,<?=$data['rajaongkir']['results'][$i]['costs'][$j]['cost'][0]['value'];?>" required>
	 	<b><?=$data['rajaongkir']['results'][$i]['costs'][$j]['service'];?></b>
	 	<span style="float:right">
	 		<?="&nbspRp. ".number_format($data['rajaongkir']['results'][$i]['costs'][$j]['cost'][0]['value'],0,'','.');?>
	 	</span>
	 </label>
	 </div>

	 <?php
	 endfor;
 endfor;
 ?>
