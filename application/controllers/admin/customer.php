<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function sales()
	{
		$this->model_security->getsecurity();
		$query				= $this->session->userdata('username');
		$level 				= $this->model_user->getdata_level($query);
		$client				= $this->model_customer->getdata_admin_tambah($query);
		$id 				= $client->no;
		$isi['content']		= 'admin/customer/tampilan_sales';
		$isi['judul']		= 'Customer';
		$isi['sub_judul']	= '';
		$isi['link']		= '';
		$isi['tipe']		= 'sales';
		$isi['level']		= $level;
		$isi['id_admin']	= $client->no;

		if($client->level == 'Admin')
		{
		$isi['data_no']		= $this->db->where('status','NO')
									   ->where('aktif','NO')
									   ->get('customer');
		$isi['data_yes']	= $this->db->where('status','YES')
									   ->get('customer');
		$isi['level']		= 'Admin';
		}
		else
		{	
		$isi['data_no']		= $this->db->where('status','NO')
									   ->where('aktif','NO')
									   ->where('id_admin',$id)
									   ->get('customer');
		$isi['data_yes']	= $this->db->where('status','YES')
									   ->where('id_admin',$id)
									   ->get('customer');
		$isi['level']		= 'Marketing';
		}

		$this->load->view('admin/tampilan_home',$isi);
	}

	public function simpan()
	{
		$this->model_security->getsecurity();
		$tipe							= $this->input->post('tipe');
		$key 							= $this->input->post('key');
		$data['kode_sales']				= $this->input->post('kode_sales');
		$data['nm_penanggung_jawab']	= $this->input->post('nama');
		$data['id_admin']				= $this->input->post('id_admin');
		$data['status']					= 'NO';
		$data['aktif']					= 'NO';

		if($key == 'update')
		{
			$this->model_customer->getupdate($id,$data);
		}
		elseif($key == 'tambah')
		{
			$this->model_customer->getinsert($data);
		}
		redirect(site_url('/admin/customer/'.$tipe));

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