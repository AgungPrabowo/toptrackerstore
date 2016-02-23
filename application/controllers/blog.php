<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}

	public function home()
	{
		$query = $this->session->userdata('email');

		if($query == NULL)
		{
			$query				= $this->session->userdata('username');
		}
		$key 					= $this->model_customer->getdata_uri($query);
		$data['breadcrumbs']	= site_url();
		$data['data'] 			= $this->model_produk->dataproduk();
		$data['key']			= $key->kode_sales;

		$this->load->view('tampilan_home', $data);
	}

	public function registrasi($kode_sales)
	{
		$this->model_security->getsecurity_client($kode_sales);
		$kode_sales = $this->uri->segment(3);
		$query		= $this->db->where('kode_sales', $kode_sales)
							   ->get('customer');
		$hasil		= $query->row();

		if($kode_sales == 0)
		{
			redirect(site_url());
		}

		$data['breadcrumbs']	= site_url();
		$data['provinsi'] 		= $this->db->get('provinces');
		$data['nama']			= $hasil->nm_penanggung_jawab;
		$data['kode_sales']		= $hasil->kode_sales;
		$data['status']			= 'YES';
		$this->load->view('registrasi',$data);

	}

	public function cek_kode_sales()
	{
		$kode_sales = $this->input->post('kode_sales');
		$nama 		= $this->input->post('nama');

		$query		= $this->model_customer->getdata_kode_sales($kode_sales,$nama);
	}
	
	public function simpan_registrasi()
	{
		$kode_sales 					= $this->input->post('kode_sales');
		$re_pass						= md5($this->input->post('re-pass'));
		$data['nama_toko']				= $this->input->post('nama_toko');
		$data['email']					= $this->input->post('email');
		$data['pass']					= md5($this->input->post('pass'));
		$data['nm_penanggung_jawab']	= $this->input->post('nm_penanggung_jawab');
		$data['username']				= $this->input->post('username');
		$data['no_telp'] 				= $this->input->post('no_telp');
		$data['nm_penerima'] 			= $this->input->post('nm_penerima');
		$data['no_telp_penerima'] 		= $this->input->post('no_telp_penerima');
		$data['kode_pos'] 				= $this->input->post('kode_pos');
		$data['id_provinsi'] 			= $this->input->post('provinsi');
		$data['id_kota'] 				= $this->input->post('kota');
		$data['id_kecamatan'] 			= $this->input->post('kecamatan');
		$data['alamat'] 				= $this->input->post('alamat');
		$data['status']					= $this->input->post('status');
		$data['tgl'] 					= time()+3600*7;
		$data['aktif']					= 'NO';

		// memeriksa username (sudah terpakai atau belum)
		$query = $this->db->get('customer');
		foreach($query->result() as $row)
		{
			if($row->username == $data['username'])
			{
				$this->session->set_flashdata('info','Username sudah terpakai');
				redirect(site_url('/blog/registrasi/'.$kode_sales));
			}
		}

		if($re_pass != $data['pass'])			
		{
			// cek password baru sama atau tidak
			$this->session->set_flashdata('info','Password tidak sama');
			redirect(site_url('/blog/registrasi/'.$kode_sales));
		}
		// jika email diisi maka kirim pesan verifikasi email kepada user/customer
		// jika email tidak diisi pendaftaran selesai tanpa kirim email verifikasi
		else if($data['email'] != '')
		{
			$update_data_user = $this->model_customer->getupdate($kode_sales,$data);

			// kirim email ke user/customer
			$ci = get_instance();
	        $ci->load->library('email');
			$enkripsi 	 			= md5($kode_sales);
	        $config['protocol'] 	= "smtp";
	        $config['smtp_host'] 	= "ssl://smtp.gmail.com";
	        $config['smtp_port'] 	= "465";
	        $config['smtp_user'] 	= "toptrackerstore79@gmail.com";
	        $config['smtp_pass'] 	= "Bukitbarisan79";
	        $config['charset'] 		= "utf-8";
	        $config['mailtype'] 	= "html";
	        $config['newline'] 		= "\r\n";
	        
	        
	        $ci->email->initialize($config);
	 
	        $ci->email->from($config['smtp_user'], 'Admin Top Tracker Store');
	        $ci->email->to($data['email']);
	        $ci->email->subject('Verifikasi Akun Top Tracker Store');
	        $ci->email->message("terimakasih telah melakuan registrasi, untuk memverifikasi silahkan klik tautan dibawah ini<br><br>
	       						<a href=".site_url('/blog/verifikasi/'.$enkripsi).">".site_url('/blog/verifikasi/'.$enkripsi));
	        if ($this->email->send()) {
	            echo "Silahkan cek email Anda untuk melakukan verifikasi Akun Top Tracker Store<br>
	            	  Kembali ke halaman <a href=".site_url().">login</a>";
	        } else {
	            show_error($this->email->print_debugger());
	        }

			$this->session->set_flashdata('true','Akun anda telah aktif');
			return $update_data_user;
		}
		else
		{
			$update_data_user;
			$this->session->set_flashdata('true','Akun anda telah aktif');
			redirect(site_url());

		}

	}

	public function verifikasi($key)
	{
		$this->model_customer->verifikasi($key);
		echo "Email Anda telah Aktif<br><br><a href='".site_url()."'>Kembali ke Menu Login</a>";
	}

	public function detail($key)
	{
		$this->load->model('model_produk');
		$query  				= $this->model_produk->getdata($key);
		$session				= $this->session->userdata('email');
		$kode_sales				= $this->model_customer->getdata_uri($session);
		$data['breadcrumbs']	= site_url('/blog/home');
		$data['id_produk'] 		= $query->id_produk;
		$data['judul']			= $query->judul;
		$data['harga']			= $query->harga;
		$data['isi_produk']		= $query->isi;
		$data['gambar']			= $query->gambar;
		$data['id_komentar']	= '';
		$data['email']			= '';
		$data['nama']			= '';
		$data['isi']			= '';
		$data['key']			= $kode_sales->kode_sales;


		$this->load->view('tampilan_detail', $data);
	}

	public function cek_login()
	{
		$user 	= $this->input->post('username');
		$pass	= md5($this->input->post('pass'));

		$this->model_customer->cek_login($user,$pass);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url());
	}

	public function cek_ongkir()
	{
		$this->load->view('cek_ongkir');
	}

}

/* End of file blog.php */
/* Location: ./application/controllers/blog.php */