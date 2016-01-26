<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

	public function getlogin($u,$p)
	{
		$pwd 	= md5($p);
		$query 	= $this->db->where('username',$u)
						   ->where('password',$pwd)
						   ->get('admin');
		if($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
				$sess = array('username'	=> $row->username,
							  'password'	=> $row->password
							  );
				$this->session->set_userdata($sess);
				redirect('admin/home');
			}
		}
		else
		{
				$this->session->set_flashdata('info','Username atau Password salah');
				redirect('admin/login');
		}
		
	}

}

/* End of file model_login.php */
/* Location: ./application/models/model_login.php */