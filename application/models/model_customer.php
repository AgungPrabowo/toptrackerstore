<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_customer extends CI_Model {

	public function getdata_admin_tambah($key)
	{
		$query = $this->db->where('username',$key)
						  ->get('admin');
		$data  = $query->row();
		return $data;
	}

	public function getdata_admin($key)
	{
		$query = $this->db->select('nama')
						  ->from('admin')
						  ->where('no',$key);
		$hasil = $this->db->get();
		return $hasil;
	}

	public function getdata($key)
	{
		$query = $this->db->where('kode_sales',$key)
						  ->get('customer');
		$data  = $query->row();
		return $data;
	}

	public function getdata_uri($key)
	{
		$query = $this->db->where('email',$key)
						  ->or_where('username',$key)
						  ->get('customer');
		$data  = $query->row();
		return $data;
	}

	public function cek_login($user,$pass)
	{
		//masuk menggunakan username atau email
		$query 	= $this->db->where('email', $user)
						   ->or_where('username', $user)
				 		   ->where('pass', $pass)
				 		   ->get('customer');
		$user 	= $query->row();

		//jika email ada jalankan query lain jika 
		//username ada jalankan query
		if($user->email)
		{
			foreach($query->result() as $row)
			{
				$data = array(
							  'email' 	 => $row->email,
							  'pass' 	 => $row->pass
							  );
				$this->session->set_userdata($data);
				redirect(site_url('/blog/home'));
			}
		}
		else if($user->username)
		{
			foreach($query->result() as $row)
			{
				$data = array(
							  'username'	 => $row->username,
							  'pass' 	 	 => $row->pass
							  );
				$this->session->set_userdata($data);
				redirect(site_url('/blog/home'));
			}
		}
		else
		{
			$this->session->set_flashdata('info','Username atau Password salah');
			redirect(site_url().'/blog');
		}

	}

	public function getdata_kode_sales($kode_sales,$nama)
	{
		$query = $this->db->where('kode_sales', $kode_sales)
						  ->where('nm_penanggung_jawab', $nama)
						  ->get('customer');

		if($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
			{
				redirect(site_url('/blog/registrasi/'.$kode_sales));
			}
		}
		else
		{
			$this->session->set_flashdata('info','Kode Sales atau Nama Anda Salah');
			redirect(site_url());
		}

	}

	public function getinsert($data)
	{
		$this->db->insert('customer', $data);
	}

	public function getupdate($key,$data)
	{
		$this->db->where('kode_sales', $key)
				 ->update('customer', $data);
	}

	public function getupdate_datalogin($key,$pass)
	{
		$data['pass'] = $pass;
		$this->db->where('kode_sales',$key)
				 ->update('customer',$data);
		$this->session->set_flashdata('notif','Login dengan Password Baru');
		redirect('/user/logout');
	}

	public function getdelete($key,$data)
	{
		$this->db->where('id_customer',$key)
				 ->delete('customer', $data);
	}

	public function verifikasi($key)
	{
		$data['aktif'] = 'YES';
		$this->db->where('md5(kode_sales)',$key)
				 ->update('customer',$data);
		return TRUE;
	}

}

/* End of file model_customer.php */
/* Location: ./application/models/model_customer.php */