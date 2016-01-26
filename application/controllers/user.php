<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		
	}

	public function profile($kode_sales)
	{
		$query							= $this->session->userdata('email');
		$this->model_security->getsecurity_client($query);
		$key 							= $this->model_customer->getdata_uri($query);
		$data['provinsi'] 				= $this->model_wilayah->getdata_prov_row($key->id_provinsi);
		$data['kota'] 					= $this->model_wilayah->getdata_kota_row($key->id_kota);
		$data['kecamatan'] 				= $this->model_wilayah->getdata_kec_row($key->id_kecamatan);
		$data['id_provinsi']			= $this->db->get('provinces');
		$data['pesanan']				= $this->model_pesanan->getdata($kode_sales);
		$data['key']					= $key->kode_sales;
		$data['kode_sales']				= $key->kode_sales;
		$data['nama_toko']				= $key->nama_toko;
		$data['nm_penanggung_jawab']	= $key->nm_penanggung_jawab;
		$data['no_telp']				= $key->no_telp;
		$data['alamat']					= $key->alamat;
		$data['kode_pos']				= $key->kode_pos;
		$data['no_telp_penerima']		= $key->no_telp_penerima;
		$data['nm_penerima']			= $key->nm_penerima;
		$data['email']					= $key->email;

		$this->load->view('user/tampilan_akun',$data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url());
	}

	public function updatedata_profil()
	{
		$query							= $this->session->userdata('email');
		$this->model_security->getsecurity_client($query);
		$key 							= $this->input->post('kode_sales');
		$data['nama_toko']				= $this->input->post('nama_toko');
		$data['nm_penanggung_jawab']	= $this->input->post('nm_penanggung_jawab');
		$data['no_telp']				= $this->input->post('no_telp');
		$data['nm_penerima']			= $this->input->post('nm_penerima');
		$data['no_telp_penerima']		= $this->input->post('no_telp_penerima');
		$data['alamat']					= $this->input->post('alamat');
		$data['kode_pos']				= $this->input->post('kode_pos');
		$data['id_provinsi']			= $this->input->post('provinsi');
		$data['id_kota']				= $this->input->post('kota');
		$data['id_kecamatan']			= $this->input->post('kecamatan');

		$this->model_customer->getupdate($key,$data);
		$this->session->set_flashdata('true','Update Profile Berhasil');
		redirect('/user/profile/'.$key);
	}

	public function updatedata_login()
	{
		$query				= $this->session->userdata('email');
		$this->model_security->getsecurity_client($query);
		$kode_sales			= $this->input->post('kode_sales');
		$pass_lama			= md5($this->input->post('pass_lama'));
		$pass_baru			= md5($this->input->post('pass_baru'));
		$ulangi_pass_baru	= md5($this->input->post('ulangi_pass_baru'));
		$data 				= $this->model_customer->getdata($kode_sales);

		if($pass_baru == $ulangi_pass_baru)
		{
			if($pass_lama == $data->pass)
			{
				$this->model_customer->getupdate_datalogin($kode_sales,$pass_baru);
			}
			else
			{
				$this->session->set_flashdata('info','Password Lama Tidak Sama');
				redirect('/user/profile/'.$kode_sales);
			}
		}
		else
		{
			$this->session->set_flashdata('info','Password Baru Tidak Sama');
			redirect('/user/profile/'.$kode_sales);
		}
	}
    
    public function detail_order($id_pesanan)
    {
		$email							= $this->session->userdata('email');
		$this->model_security->getsecurity_client($email);
		$key 							= $this->model_customer->getdata_uri($email);
		$data_pesanan					= $this->model_order->getdata_order($id_pesanan);
		$data['key']					= $key->kode_sales;
		$data['order']					= $data_pesanan;
        $this->load->view('user/detail_order',$data);
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

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */