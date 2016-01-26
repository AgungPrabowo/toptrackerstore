<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_wilayah extends CI_Model {

	public function getdata_prov_row($key)	
	{
		$hasil = $this->db->where('id', $key)
						  ->get('provinces');
		return $hasil->row();
	}

	public function getdata_kota_row($key)
	{
		$hasil = $this->db->where('id', $key)
						  ->get('regencies');
		return $hasil->row();
	}

	public function getdata_kec_row($key)
	{
		$hasil = $this->db->where('id', $key)
						  ->get('districts');
		return $hasil->row();
	}

	public function getdata_kota($key)
	{
		$hasil = $this->db->where('province_id', $key)
						  ->get('regencies');
		return $hasil;
	}

	public function getdata_kec($key)
	{
		$hasil = $this->db->where('regency_id', $key)
						  ->get('districts');
		return $hasil;
	}

}

/* End of file model_wilayah.php */
/* Location: ./application/models/model_wilayah.php */