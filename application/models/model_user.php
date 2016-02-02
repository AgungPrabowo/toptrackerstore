<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {

	public function getdata_email($level)
	{
		$query = $this->db->where('level',$level)
						  ->get('admin');
		return $query->row()->level;						  	
	}

	public function getdata_level($key)
	{
		$query = $this->db->where('username',$key)
						  ->get('admin');
		return $query->row()->level;
	}

	public function getdata($key)
	{
		$this->db->where('no',$key);
		$hasil = $this->db->get('admin');
		return $hasil;
	}

	public function getupdate($key,$data)
	{
		$this->db->where('no',$key)
				 ->update('admin',$data);
	}

	public function getinsert($data)
	{
		$this->db->insert('admin',$data);
	}

	public function getdelete($key)
	{
		$this->db->where('no',$key)
				 ->delete('admin');
	}

}

/* End of file model_user.php */
/* Location: ./application/models/model_user.php */