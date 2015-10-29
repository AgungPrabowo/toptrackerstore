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

	public function simpan()
	{
		$data['id_customer'] 	= $this->input->post('id_customer');
		$data['nama_depan']		= $this->input->post('nama_depan');
		$data['nama_belakang']	= $this->input->post('nama_belakang');
		$data['email']			= $this->input->post('email');
		$data['telp']			= $this->input->post('telephone');
		$data['fax']			= $this->input->post('fax');
		$data['alamat1']		= $this->input->post('alamat1');
		$data['alamat2']		= $this->input->post('alamat2');
		$data['kode_pos']		= $this->input->post('kode_pos');
		$data['provinsi']		= $this->input->post('provinsi');
		$data['kota']			= $this->input->post('kota');
		$data['username']		= $this->input->post('username');
		$data['password']		= md5($this->input->post('password'));

		$this->model_customer->getinsert($data);

	}

}

/* End of file order.php */
/* Location: ./application/controllers/order.php */