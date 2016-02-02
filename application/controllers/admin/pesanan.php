<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {

	public function index()
	{
		$this->model_security->getsecurity();
		$query					= $this->session->userdata('username');
		$level 					= $this->model_user->getdata_level($query);
		$client					= $this->model_customer->getdata_admin_tambah($query);
		$id 					= $client->no;
		$isi['content']			= 'admin/pesanan/tampilan_pesanan';
		$isi['judul']			= 'Pesanan';
		$isi['sub_judul']		= '';
		$isi['link']			= '';
		$isi['status']			= 'Tertunda';
		$isi['level']			= $level;

		if($client->level == 'Admin')
		{
		$isi['data_tertunda']	= $this->db->where('status','Tertunda')
								   	       ->get('pesanan');
		$isi['data_terkirim']	= $this->db->where('status','Terkirim')
									       ->get('pesanan');
		$isi['level_pesanan']	= 'Admin';
		}
		else
		{	
		$isi['data_tertunda']	= $this->db->where('status','Tertunda')
										   ->where('id_admin',$id)
								   	       ->get('pesanan');
		$isi['data_terkirim']	= $this->db->where('status','Terkirim')
										   ->where('id_admin',$id)
									       ->get('pesanan');
		$isi['level_pesanan']			= '';
		}

		$this->load->view('admin/tampilan_home',$isi);
	}

	public function terkirim($key)
	{
		$this->model_security->getsecurity();
		$data['status']  = 'Terkirim';
		$data['resi'] = $this->input->post('resi');
		$this->model_pesanan->terkirim($key,$data);
	}

}

/* End of file pesanan.php */
/* Location: ./application/controllers/admin/pesanan.php */