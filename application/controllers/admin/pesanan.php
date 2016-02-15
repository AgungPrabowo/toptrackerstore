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
											   ->group_by('id_pesanan')
									   	       ->get('pesanan');
			$isi['data_terkirim']	= $this->db->where('status','Terkirim')
											   ->group_by('id_pesanan')
										       ->get('pesanan');
			$isi['level_pesanan']	= 'Admin';
		}
		else
		{	
			//untuk pengambilan harga dan qty dalam group/kelompok id_pesanan
			$isi['data_tertunda1']	= $this->db->query("SELECT GROUP_CONCAT(total SEPARATOR ',') as total, GROUP_CONCAT(qty SEPARATOR ',') as qty 
														FROM pesanan WHERE status = 'Tertunda' AND id_admin = ".$id." GROUP BY (id_pesanan)");
			$isi['data_terkirim1']	= $this->db->query("SELECT GROUP_CONCAT(total SEPARATOR ',') as total, GROUP_CONCAT(qty SEPARATOR ',') as qty 
														FROM pesanan WHERE status = 'Terkirim' AND id_admin = ".$id." GROUP BY (id_pesanan)");

			//untuk pengambilan data dalam group/kelompok id_pesanan
			$isi['data_tertunda']	= $this->db->where('status','Tertunda')
											   ->where('id_admin',$id)
											   ->group_by('id_pesanan')
									   	       ->get('pesanan');
			$isi['data_terkirim']	= $this->db->where('status','Terkirim')
											   ->where('id_admin',$id)
											   ->group_by('id_pesanan')
										       ->get('pesanan');
			$isi['level_pesanan']	= '';
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

    public function detail_pesanan($id_pesanan)
    {
		$query = $this->session->userdata('email');

		if($query == NULL)
		{
			$query				= $this->session->userdata('username');
		}
		$this->model_security->getsecurity_client($query);
		$key 							= $this->model_customer->getdata_uri($query);
		$data_pesanan					= $this->model_order->getdata_order($id_pesanan);
		$data['order']					= $data_pesanan;
		$data['provinsi']				= $this->model_wilayah->getdata_prov_row($data_pesanan->row()->id_provinsi);
		$data['kota']					= $this->model_wilayah->getdata_kota_row($data_pesanan->row()->id_kota);
		$data['kecamatan']				= $this->model_wilayah->getdata_kec_row($data_pesanan->row()->id_kecamatan);
        $this->load->view('admin/pesanan/detail_pesanan',$data);
    }

}

/* End of file pesanan.php */
/* Location: ./application/controllers/admin/pesanan.php */