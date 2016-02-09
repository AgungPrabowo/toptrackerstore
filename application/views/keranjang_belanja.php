<?=$this->load->view('tampilan_header');?>
<?=$this->load->view('tampilan_menu_atas');?>
<?=$this->load->view('tampilan_menu_bawah');?>
<br><br><br>
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

    <div class="container" style="background-color:white;">
      <div class="row">
        <div class="col-md-12">
            <?php
            if($this->cart->contents() == NULL):
              echo "Keranjang Belanja anda kosong, silakan berbelanja.<br>";
              echo anchor(site_url('/blog/home'), 'Lanjutkan Belanja', 'class="btn btn-primary"');
            else:
            ?>
                <!-- tabel pesanan -->
          <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
            <tr>
              <?=form_open('order/update_cart');
              $total_harga = 0;
              $i = 1;
              foreach($this->cart->contents() as $items): 
                //   echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                //   Sama halnya dengan
                //   <input type="hidden" name="cart[1][id]" value="1" />
                
                echo form_hidden('cart[' . $items['id'] . '][id]', $items['id']);
                echo form_hidden('cart[' . $items['id'] . '][rowid]', $items['rowid']);?>

                <td><?=$i++;?></td>
                <td><?=$items['name'];?></td>
                <td><?="Rp. ".number_format($items['price'], 0, '', '.');?></td>
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
                <a href="<?=site_url('/order/remove/'.$items['rowid']);?>" class="btn btn-danger btn-sm">
                  <i class='glyphicon glyphicon-remove'></i>
                </a>
                <button type="submit" class="btn btn-success">
                  <i class='glyphicon glyphicon-ok'></i>
                </button>
                </td>
              </tr>
          <?php endforeach;?>
          <td colspan="4" align="right">Total Harga</td>
          <td colspan="2">Rp. <?=number_format($total_harga, 0, '', '.');?></td>
          <?php
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