<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_komentar extends CI_Model {

	public function getdata($key)	
	{
		$hasil = $this->db->where('id_produk', $key)
						  ->get('komentar');
		return $hasil;
	}

	public function getinsert($data)
	{
		$this->db->insert('komentar', $data);
	}

}

/* End of file model_komentar.php */
/* Location: ./application/models/model_komentar.php */