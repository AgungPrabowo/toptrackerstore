<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$this->model_security->getsecurity();
		$query				= $this->session->userdata('username');
		$level 				= $this->model_user->getdata_level($query);
		$isi['content']		= 'admin/user/tampilan_datauser';
		$isi['judul']		= 'User';
		$isi['sub_judul']	= '';
		$isi['link']		= '';
		$isi['level']		= $level;
		$isi['user']		= $query;
		$isi['data']		= $this->db->get('admin');
		$this->load->view('admin/tampilan_home',$isi);
	}

	public function simpan()
	{
		$this->model_security->getsecurity();
		$key 				= $this->input->post('key');
		$id 				= $this->input->post('id_admin');
		$pass 				= md5($this->input->post('password-lama'));
		$data['nama']		= $this->input->post('nama');
		$data['email']		= $this->input->post('email');
		$data['username']	= $this->input->post('username');
		$data['password']	= md5($this->input->post('password'));
		$data['level']		= $this->input->post('level');

		if($key == 'update')
		{
			//cek kecocokan password lama
			$row 	 = $this->model_user->getdata($id);
			$oldpass = $row->row()->password;
			if($oldpass != $data['password'])
			{

				$this->session->set_flashdata('info','Password Tidak Cocok');
				redirect("admin/user");
			}
			else
			{
				$this->model_user->getupdate($id,$data);
				$this->session->set_flashdata('true','Data Berhasil di Update');
				redirect('admin/user');
			}
		}
		elseif($key == 'update-pass')
		{
			//cek kecocokan password lama
			$row 	 = $this->model_user->getdata($id);
			$oldpass = $row->row()->password;
			if($oldpass != $pass)
			{

				$this->session->set_flashdata('info','Password Lama Tidak Cocok');
				redirect("admin/user");
			}
			else
			{
				$this->model_user->getupdate($id,$data);
				$this->session->set_flashdata('true','Data Berhasil di Update');
				redirect('admin/user');
			}

		}
		elseif($key == 'tambah')
		{
			$query = $this->db->get('admin');

			//cek apakah username sudah terpakai
			foreach($query->result() as $row)
			{
				if($row->username == $data['username'])
				{
					$this->session->set_flashdata('info','Username sudah terpakai');
					redirect(site_url('/admin/user'));
				}
			}
			$this->session->set_flashdata('true','Data Berhasil di tambah');
			$this->model_user->getinsert($data);
		}
		redirect(site_url('/admin/user'));

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

}

/* End of file user.php */
/* Location: ./application/controllers/admin/user.php */