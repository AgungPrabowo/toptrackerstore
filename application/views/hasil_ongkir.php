 <div class="easyui-navpanel">
 <header>
 <div class="m-toolbar">
 <span class="m-title">
 <?php echo $data['rajaongkir']['origin_details']['city_name'];?> ke <?php echo $data['rajaongkir']['destination_details']['city_name'];?> @<?php echo $weight;?> Kg
 </span>
 </div>
 </header>
 <div class="easyui-accordion" fit="true" border="false">
 <?php
 for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
 ?>
 <div title="<?php echo strtoupper($data['rajaongkir']['results'][$i]['name']);?>" style="padding:10px">
 <table border="1" width="100%" class="table table-striped">
 <tr>
 <th>No.</th>
 <th>Jenis Layanan</th>
 <th>ETD</th>
 <th>Tarif</th>
 </tr>
 <?php
 for ($j=0; $j < count($data['rajaongkir']['results'][$i]['costs']); $j++) {
 # code...
 ?>
 <tr>
 <td><?php echo $j+1;?></td>
 <td>
 <div style="font:bold 16px Arial"><?php echo $data['rajaongkir']['results'][$i]['costs'][$j]['service'];?></div>
 <div style="font:normal 11px Arial"><?php echo $data['rajaongkir']['results'][$i]['costs'][$j]['description'];?></div>
 </td>
 <td align="center">&nbsp;<?php echo $data['rajaongkir']['results'][$i]['costs'][$j]['cost'][0]['etd'];?></td>
 <td align="right"><?php echo number_format($data['rajaongkir']['results'][$i]['costs'][$j]['cost'][0]['value']);?></td>
 </tr>
 <?
 }
 ?>
 </table>
 </div>
 <?php
 }
 
 ?>
 </div>
