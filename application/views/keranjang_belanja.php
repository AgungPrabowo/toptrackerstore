<?=$this->load->view('tampilan_header');?>
  	<?=$this->load->view('tampilan_menu');?>

  	<div class="container">
  		<div class="row">
  			<div class="col-md-8">
  					<?php
  					if($this->cart->contents() == NULL):
  						echo "Keranjang Belanja anda kosong, silakan berbelanja.<br>";
  						echo anchor(base_url(), 'Lanjutkan Belanja', 'class="btn btn-primary"');
  					else:
  					?>
  				<table class="table table-bordered">
  					<tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                        <th></th>
 	  				</tr>
	  				<tr>
	  					<?php 
	  					echo form_open('blog/update_cart');
	  					$total_harga = 0;
	  					$i = 1;
	  					foreach($this->cart->contents() as $items): 
                        //   echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                        //   Sama halnya dengan
                        // 	 <input type="hidden" name="cart[1][id]" value="1" />
	  						        
                        echo form_hidden('cart[' . $items['id'] . '][id]', $items['id']);
                        echo form_hidden('cart[' . $items['id'] . '][rowid]', $items['rowid']);

	  						?>
                            <td>
                       			<?=$i++; ?>
                            </td>
                            <td>
                      			<?=$items['name']; ?>
                            </td>
                            <td>
                                <?="Rp. ".number_format($items['price'], 0, '', '.'); 
                                ?>
                            </td>
                            <td>
                            	<?=form_input('cart[' . $items['id'] . '][qty]', $items['qty'], 
                            				'maxlength="3" size="1" style="text-align: right"'); 
                            	?>
                            </td>
                            <td>
                            	<?php 
                            	//menghitung subtotal
                            	$total_harga = $total_harga + $items['subtotal'];
                                echo "Rp. ".number_format($items['subtotal'], 0, '', '.');
                                ?>
                            </td>
                            <td>
                              
                            <?php 
                            // cancle image.
                            $path = "<img src='http://localhost/codeigniter_cart/images/cart_cross.jpg' width='25px' height='20px'>";
                            echo anchor('blog/remove/' . $items['rowid'], $path); ?>
                            </td>
   	  				</tr>
	  			<?php endforeach;?>
	  			<td colspan=4 align="right">Total Harga</td>
	  			<td>Rp. <?=number_format($total_harga, 0, '', '.');?></td>
	  			<?php
          $info = $this->session->flashdata('info');
          if($info)
          {
            echo $info;
          }
	  			echo anchor(base_url(), 'Lanjutkan Belanja', 'class="btn btn-primary"');
	  			echo anchor('#', 'Konfirmasi Pemesanan', 'class="btn btn-success"');
          echo form_submit('update','Update Keranjang','class="btn btn-primary"');
	  			form_close();
	  			endif;
	  			?>
	  		</table>
			</div>
			<?=$this->load->view('side_bar');?>
  		</div>
  	</div>

    <script src="<?php echo base_url();?>assets/js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>