<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_customer extends CI_Model {

	public function getinsert($data)
	{
		$this->db->insert('customer', $data);
	}

	public function getupdate($key,$data)
	{
		$this->db->where('id_customer', $key)
				 ->update('customer', $data);
	}

	public function getdelete($key,$data)
	{
		$this->db->where('id_customer',$key)
				 ->delete('customer', $data);
	}

}

/* End of file model_customer.php */
/* Location: ./application/models/model_customer.php */