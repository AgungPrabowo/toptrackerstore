<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function home($key)
	{
		$query					= $this->model_customer->getdata($key);
		$key   					= $this->session->userdata('email');
		$data['kode_sales']		= $this->model_customer->getdata_uri($key);
		$data['key']			= $data['kode_sales']->kode_sales;
		// $data['provinsi'] 		= $this->model_wilayah->getdata_prov_row($query->id_provinsi);
		// $data['kota'] 			= $this->model_wilayah->getdata_kota_row($query->id_kota);
		// $data['kecamatan'] 		= $this->model_wilayah->getdata_kec_row($query->id_kecamatan);
		// $data['id_provinsi']	= $this->db->get('provinces');
		$data['nm_penerima']	= $query->nm_penerima;
		$data['no_telp']		= $query->no_telp;
		$data['alamat']			= $query->alamat;
		$data['kode_pos']		= $query->kode_pos;
		$data['status']			= 'Tertunda';
		$data['id_customer']	= $query->id_customer;
		$data['id_admin']		= $query->id_admin;
		$data['link']			= '<h1>Alamat Pengiriman Anda</h1>';

		$this->load->view('user/konfirmasi_order', $data);
	}

	public function result_ongkir($origin,$destination,$courier)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		 CURLOPT_URL => "http://rajaongkir.com/api/starter/cost",
		 CURLOPT_RETURNTRANSFER => true,
		 CURLOPT_ENCODING => "",
		 CURLOPT_MAXREDIRS => 10,
		 CURLOPT_TIMEOUT => 30,
		 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		 // CURLOPT_CUSTOMREQUEST => "POST",
		 CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=1000&courier=$courier",
		 // CURLOPT_POSTFIELDS => "origin=501&destination=114&weight=1700&courier=jne",
		 CURLOPT_HTTPHEADER => array(
		 "key: 2f50e6a7c051609f97d7bf9174188064"
		 ),
		));
		 
		$response = curl_exec($curl);
		$err = curl_error($curl);
		 
		curl_close($curl);
		 
		if ($err) {
		 echo "cURL Error #:" . $err;
		} else {
		 
		 $hasil['data'] = json_decode($response, true);
		}

		$this->load->view('user/result_ongkir',$hasil);
	}

	public function getkota($key)
	{
		$city	= $this->model_wilayah->getdata_kota($key);

		echo "<option value='0'>---Pilih Kota---</option>";
		foreach($city->result() as $kota):
			echo "<option value=".$kota->id.">".$kota->name."</option>";
		endforeach;

	}

	public function getkec($key)
	{
		$kecamatan	= $this->model_wilayah->getdata_kec($key);

		echo "<option value='0'>---Pilih Kecamatan---</option>";
		foreach($kecamatan->result() as $kec):
			echo "<option value=".$kec->id.">".$kec->name."</option>";
		endforeach;

	}

	public function add_to_cart($key)
	{
		$produk = $this->model_produk->getdata($key);
		$qty	= $this->input->post('qty');
		if($produk->stok < $qty)
		{
			redirect(site_url('/blog/detail/'.$key));
		}
		else
		{
			$data 	= array(
						'id'		=> $produk->id_produk,
						'qty'		=> $qty,
						'price'		=> $produk->harga,
						'name'		=> $produk->judul
					);
			$this->cart->insert($data);
			redirect(site_url('/blog/detail/'.$key));
		}

	}

	public function cart()
	{
		$query = $this->session->userdata('email');

		if($query == NULL)
		{
			$query				= $this->session->userdata('username');
		}
		$data['kode_sales']	= $this->model_customer->getdata_uri($query);
		$data['key']		= $data['kode_sales']->kode_sales;

		$this->load->view('keranjang_belanja',$data);
	}

	public function update_cart(){
                
        $cart_info = $_POST['cart'] ;
	 		foreach( $cart_info as $id => $cart)
			{
				$stok = $this->model_produk->getdata($cart['id']);
				if($cart['qty'] <= $stok->stok)	
				{
	                    $rowid = $cart['rowid'];
	                    $qty = $cart['qty'];
	                    
	                    $data = array(
									'rowid'   => $rowid,
									'qty'     => $qty
									);
	            }
	            else
	            {
	            	$this->session->set_flashdata('info','Jumlah Stock Hanya '.$stok->stok);
	            	redirect(site_url('/order/cart'));
	            }
	             
				$this->cart->update($data);
			}
		redirect(site_url('/order/cart'));        
	}		

	public function delete_cart()
	{
		$this->cart->destroy();
		redirect(base_url());
	}

	public function remove($rowid) {
                    // Check rowid value.
		if ($rowid==="all"){
                       // Destroy data which store in  session.
			$this->cart->destroy();
		}else{
                    // Destroy selected rowid in session.
			$data = array(
				'rowid'   => $rowid,
				'qty'     => 0
			);
                     // Update cart data, after cancle.
			$this->cart->update($data);
		}
		
                 // This will show cancle data in cart.
		redirect('order/cart');
	}

	public function simpan_pesanan()
	{
		$total_harga = 0;

		$key 					= $this->input->post('kode_sales');
		$query					= $this->model_customer->getdata($key);
		// belum selesai (ambil email admin)
		// $email_admin			= $this->model_user->getdata_email('admin');

		//menggabungkan layanan dan biaya kirim
		//dan dipecah
		$layananDanBiaya		= $this->input->post('layanan');
		$pecah					= explode(',',$layananDanBiaya);
		$data['kode_sales']		= $this->input->post('kode_sales');
		$data['nm_penerima']	= $this->input->post('nm_penerima');
		$data['no_telp']		= $this->input->post('no_telp');
		$data['alamat']			= $this->input->post('alamat');
		$data['kode_pos']		= $this->input->post('kode_pos');
		$data['status']			= $this->input->post('status');
		$data['id_admin']		= $this->input->post('id_admin');
		$data['id_provinsi']	= $this->input->post('provinsi');
		$data['id_kota']		= $this->input->post('kota');
		$data['id_kecamatan']	= $this->input->post('kecamatan');
		$data['catatan']		= $this->input->post('catatan');
		$data['kurir']			= $this->input->post('courier');
		$data['kota']			= $this->input->post('destination');
		$data['layanan']		= $pecah[0];
		$data['biaya_kirim']	= $pecah[1];
		$data['nama_toko']		= $query->id_customer;
		$data['tgl_beli']		= time()+3600*7;
		$data['id_pesanan']		= rand(0,10000);

		
		foreach($this->cart->contents() as $items)
		{
			//Data Produk
			$data['nm_produk']	= $items['name'];
			$data['harga']		= $items['price'];
			$data['qty']		= $items['qty'];
			$total_harga		= $total_harga + $items['subtotal'];
			$data['total']		= $items['subtotal'];

			$this->model_order->simpan_pesanan($data,$data['nm_produk'],$data['qty']);
		}

		//BELUM SELESAI MOHON DISELESAIKAN (kurang menampilkan produk keseluruhan)

		//ambil id_admin dan ambil email marketing
		$id_admin = $this->model_customer->getdata($key);
		$email 	  = $this->model_order->getdata_email($id_admin->id_admin);

		//kirim email pesanan ke admin dan marketing
		$ci = get_instance();
        $ci->load->library('email');
        $config['protocol'] 	= "smtp";
        $config['smtp_host'] 	= "ssl://smtp.gmail.com";
        $config['smtp_port'] 	= "465";
        $config['smtp_user'] 	= "toptrackerstore79@gmail.com";
        $config['smtp_pass'] 	= "Bukitbarisan79";
        $config['charset'] 		= "utf-8";
        $config['mailtype'] 	= "html";
        $config['newline'] 		= "\r\n";
        
        
        $ci->email->initialize($config);
        
 		//BELUM SELESAI
    	$this->email->clear();
        $this->email->from($config['smtp_user'], 'Top Tracker Store');
        $this->email->to($email->email);
        $this->email->subject('Pesanan Baru');
    	$this->email->message("<h2>Pesanan Baru</h2>
   						<br><br>Nama Toko&nbsp:&nbsp;".strtoupper($query->nama_toko).
			 			"<br>Tanggal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;".generate_tanggal(gmdate('d/m/Y-H:i',$data['tgl_beli'])));
        if ($this->email->send() == FALSE) {
            show_error($this->email->print_debugger());
        } 

		$this->cart->destroy();
		redirect(site_url('/blog/home'));

	}

	public function ambil_kota()
	{
		$curl = curl_init();
		 
		curl_setopt_array($curl, array(
		 CURLOPT_URL => "http://rajaongkir.com/api/starter/city",
		 CURLOPT_RETURNTRANSFER => true,
		 CURLOPT_ENCODING => "",
		 CURLOPT_MAXREDIRS => 10,
		 CURLOPT_TIMEOUT => 30,
		 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		 CURLOPT_CUSTOMREQUEST => "GET",
		 CURLOPT_HTTPHEADER => array(
		 "key: 2f50e6a7c051609f97d7bf9174188064"
		 ),
		));
		 
		$response = curl_exec($curl);
		$err = curl_error($curl);
		 
		curl_close($curl);
		 
		if ($err) {
		 echo "cURL Error #:" . $err;
		} else {
		 
		 $k = json_decode($response, true);
		 echo json_encode($k['rajaongkir']['results']);
		 
		}
	}

}

/* End of file order.php */
/* Location: ./application/controllers/order.php */