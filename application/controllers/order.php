<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_order');
		$this->load->model('model_wilayah');
		$this->load->model('model_customer');
	}

	public function index()
	{
		$data['provinces'] 		= $this->db->get('provinces');
		$data['nama_depan']		= '';
		$data['nama_belakang']	= '';
		$data['email']			= '';
		$data['telephone']		= '';
		$data['fax']			= '';
		$data['alamat1']		= '';
		$data['alamat2']		= '';
		$data['kode_pos']		= '';
		$data['provinsi']		= '';
		$data['kota']			= '';
		$data['username']		= '';
		$data['password']		= '';

		$this->load->view('tampilan_order', $data);
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

	public function simpan()
	{
		$data['id_customer'] 		= $this->input->post('id_customer');
		$data['nama_depan']			= $this->input->post('nama_depan');
		$data['nama_belakang']		= $this->input->post('nama_belakang');
		$data['email']				= $this->input->post('email');
		$data['telp']				= $this->input->post('telephone');
		$data['fax']				= $this->input->post('fax');
		$data['alamat1']			= $this->input->post('alamat1');
		$data['alamat2']			= $this->input->post('alamat2');
		$data['kode_pos']			= $this->input->post('kode_pos');
		$data['provinsi']			= $this->input->post('provinsi');
		$data['kota']				= $this->input->post('kota');
		$data['kecamatan']			= $this->input->post('kecamatan');
		$data['username']			= $this->input->post('username');
		$data['password']			= md5($this->input->post('password'));

		$this->model_customer->getinsert($data);

	}

}

/* End of file order.php */
/* Location: ./application/controllers/order.php */