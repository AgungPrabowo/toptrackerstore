<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kategori extends CI_Model {

	public function getdata($key)	
	{
		$this->db->where('id_kategori', $key);
		$hasil = $this->db->get('kategori');
		return $hasil;
	}

	public function getupdate($key,$data)
	{
		$this->db->where('id_kategori', $key)
				 ->update('kategori', $data);
	}

	public function getinsert($data)
	{
		$this->db->insert('kategori', $data);
	}

	public function getdelete($key)
	{
		$this->db->where('id_artikel', $key)
				 ->delete('kategori');
	}


}

/* End of file model_kategori.php */
/* Location: ./application/models/model_kategori.php */