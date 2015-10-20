<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$this->model_security->getsecurity();
		$isi['content']		= 'admin/user/tampilan_datauser';
		$isi['judul']		= 'User';
		$isi['sub_judul']	= '';
		$isi['link']		= '';
		$isi['data']		= $this->db->get('admin');
		$this->load->view('admin/tampilan_home',$isi);
	}

	public function tambah()
	{
		$this->model_security->getsecurity();
		$isi['content']		= 'admin/user/form_tambahuser';
		$isi['judul']		= 'User';
		$isi['sub_judul']	= 'Tambah User';
		$isi['username']	= '';
		$isi['password']	= '';
		$isi['no']			= '';
		$this->load->view('admin/tampilan_home',$isi);
	}

	public function simpan_tambah()
	{
		$this->model_security->getsecurity();
		$key 				= $this->input->post('no');
		$data['no']			= $this->input->post('no');
		$data['username']	= $this->input->post('username');
		$data['password']	= md5($this->input->post('password'));


		$this->load->model('model_user');
		$query = $this->model_user->getdata($key);
		$this->model_user->getinsert($data);
		$this->session->set_flashdata('info','Data Berhasil di Tambah');
		redirect('admin/user');
	}
	//Belum Selesai
	public function simpan_edit()
	{
		$this->model_security->getsecurity();
		$key				= $this->input->post('no');
		$pass 				= md5($this->input->post('old-password'));
		$data['no']			= $this->input->post('no');
		$data['username']	= $this->input->post('username');
		$data['password']	= md5($this->input->post('new-password'));

		$this->load->model('model_user');
		$query = $this->db->where('no',$key)
						  ->get('admin');
		$row = $query->row();
		$oldpass = $row->password;
		if($oldpass != $pass)
		{

			$this->session->set_flashdata('info','Password Lama tidak Cocok');
			redirect("admin/user/edit/".$key);
		}
		else
		{
			$this->model_user->getupdate($key,$data);
			$this->session->set_flashdata('info','Data Berhasil di Update');
			redirect('admin/user');
		}
	}

	public function hapus()
	{
		$this->model_security->getsecurity();

		$this->load->model('model_user');
		$key = $this->uri->segment(4);
		$this->db->where('no',$key);
		$query = $this->db->get('admin');
		if($query->num_rows()>0)
		{
			$this->model_user->getdelete($key);
			redirect('admin/user');
		}
	}

		public function edit()
	{
		$this->model_security->getsecurity();
		$isi['content']		= 'admin/user/form_edituser';
		$isi['judul']		= 'Master';
		$isi['sub_judul']	= 'Edit Jurusan';

		$key = $this->uri->segment(4);
		$this->db->where('no',$key);
		$query = $this->db->get('admin');
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$isi['no']				= $row->no;
				$isi['username']		= $row->username;
				$isi['password']		= $row->password;
			}
		}
		else
		{
				$isi['no']				= '';
				$isi['username']		= '';
				$isi['password']		= '';
		}
		$this->load->view('admin/tampilan_home',$isi);
	}

}

/* End of file user.php */
/* Location: ./application/controllers/admin/user.php */