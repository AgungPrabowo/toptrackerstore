<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pesanan extends CI_Model {

	public function getdata_row($key)	
	{
		$query = $this->db->where('id_order',$key)
						  ->get('pesanan');
		return $query->row();
	}

	public function terkirim($key,$data)
	{
		$query = $this->db->where('id_order',$key)
						  ->update('pesanan',$data);
		redirect(site_url('/admin/pesanan'));
	}

	public function getdata_namatoko($key)
	{
		$query = $this->db->where('id_customer',$key)
						  ->get('customer');
		$data  = $query->row();
		return $data;
	}

	public function getdata($key)	
	{
		$query = $this->db->select('*')
		                  ->where('kode_sales',$key)
						  ->group_by('id_pesanan')
				          ->get('pesanan');				 

		return $query;
	}

}

/* End of file model_pesanan.php */
/* Location: ./application/models/model_pesanan.php */