<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->model_security->getsecurity();
		$query				= $this->session->userdata('username');
		$level 				= $this->model_user->getdata_level($query);
		$isi['content']		= 'admin/tampilan_content';
		$isi['judul']		= 'Home';
		$isi['sub_judul']	= '';
		$isi['link']		= '';
		$isi['level']		= $level;
		$this->load->view('admin/tampilan_home',$isi);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/login');
	}

}

/* End of file home_login.php */
/* Location: ./application/controllers/home_login.php */