<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function index()
	{
		$data['isi'] = $this->db->order_by('id_produk', 'DESC')
								->get('produk');
		$this->load->view('tampilan_home', $data);
	}

	public function add_to_cart($key)
	{
		$this->load->model('model_produk');
		$produk = $this->model_produk->getdata($key);
		$data 	= array(
					'id'		=> $produk->id_produk,
					'qty'		=> 1,
					'price'		=> $produk->harga,
					'name'		=> $produk->judul
				);
		$this->cart->insert($data);
		redirect(base_url());

	}

	public function detail($key)
	{
		$this->load->model('model_produk');
		$query  				= $this->model_produk->getdata($key);
		$data['id_produk'] 		= $query->id_produk;
		$data['judul']			= $query->judul;
		$data['harga']			= $query->harga;
		$data['isi_produk']		= $query->isi;
		$data['gambar']			= $query->gambar;
		$data['id_komentar']	= '';
		$data['email']			= '';
		$data['nama']			= '';
		$data['isi']			= '';

		$this->load->view('tampilan_detail', $data);
	}

	public function ambil_komentar($key)
	{
		$this->load->model('model_komentar');
		$komentar = $this->model_komentar->getdata($key);
		foreach($komentar->result() as $row)
		{
			echo "<p id='komentar'>".$row->nama."<br>";
			echo generate_tanggal(gmdate('d/m/Y-H:i',$row->tanggal))." WIB<br>";
			echo $row->isi_komentar.'</p>';
		}
	}

	public function insert_komentar()
	{
		$this->load->model('model_komentar');
		$key						= $this->input->post('id_produk');
		$data['id_komentar']		= $this->input->post('id_komentar');
		$data['id_produk']			= $this->input->post('id_produk');
		$data['isi_komentar']		= $this->input->post('isi');
		$data['email']				= $this->input->post('email');
		$data['nama']				= $this->input->post('nama');
		$data['tanggal'] 			= time()+3600*7;


		$this->model_komentar->getinsert($data);
		redirect(site_url().'/blog/detail/'.$key);
	}

	public function cart()
	{
		$this->load->view('keranjang_belanja');
	}

	public function update_cart(){
                
        $this->load->model('model_produk');
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
	            	$this->session->set_flashdata('info','Jumlah Stock Hanya'.$stok->stok);
	            	redirect(site_url().'/blog/cart');
	            }
	             
				$this->cart->update($data);
			}
		redirect(site_url().'/blog/cart');        
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
		redirect('blog/cart');
	}

	public function cek_login()
	{
		$user 	= $this->input->post('username');
		$pass	= $this->input->post('password');

		$this->load->model('model_customer');
		$this->model_customer->cek_login($user,$pass);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url());
	}


}

/* End of file blog.php */
/* Location: ./application/controllers/blog.php */