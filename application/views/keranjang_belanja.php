<?=$this->load->view('tampilan_header');?>
<?=$this->load->view('tampilan_menu_atas');?>
<?=$this->load->view('tampilan_menu_bawah');?>
<br><br><br>
    <div class="container" style="background-color:white;">
      <div class="row">
        <div class="col-md-12">
            <?php
            if($this->cart->contents() == NULL):
              echo "Keranjang Belanja anda kosong, silakan berbelanja.<br>";
              echo anchor(site_url('/blog/home'), 'Lanjutkan Belanja', 'class="btn btn-primary"');
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
              echo form_open('order/update_cart');
              $total_harga = 0;
              $i = 1;
              foreach($this->cart->contents() as $items): 
                        //   echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                        //   Sama halnya dengan
                        //   <input type="hidden" name="cart[1][id]" value="1" />
                        
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
                                    'maxlength="4" size="3" style="text-align: right"'); 
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
                            $path = "<img src='andalusiastore.16mb.com/assets/images/cart_cross.jpg' width='25px' height='20px'>";
                            echo anchor('order/remove/' . $items['rowid'], $path); ?>
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
          echo "<center>".anchor(site_url(), 'Lanjutkan Belanja', 'class="btn btn-primary"');
          echo anchor(site_url('/order/home/'.$kode_sales->kode_sales), 'Konfirmasi Pemesanan', 'class="btn btn-success"');
          echo form_submit('update','Update Keranjang','class="btn btn-primary"')."</center>";
          form_close();
          endif;
          ?>
        </table>
      </div>
      </div>
    </div>

  <?php $this->load->view('footer');?><!-- FOOTER -->

    <script src="<?php echo base_url();?>assets/js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>