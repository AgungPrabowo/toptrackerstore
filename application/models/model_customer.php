<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_customer extends CI_Model {

	public function cek_login($user,$pass)
	{
		$pwd 	= md5($pass);
		$query 	= $this->db->where('username', $user)
				 			->where('password', $pwd)
				 			->get('customer');

		if($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
			{
				$data = array(
							  'username' => $row->username,
							  'password' => $row->password
							  );
				$this->session->set_userdata($data);
				redirect(site_url().'/blog');
			}
		}
		else
		{
			$this->session->set_flashdata('info','Username atau Password salah');
			redirect(site_url().'/blog');
		}

	}

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