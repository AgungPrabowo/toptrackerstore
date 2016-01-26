<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function index()
	{
		$this->model_security->getsecurity();
		$isi['content']		= 'admin/kategori/tampilan_kategori';
		$isi['judul']		= 'Kategori';
		$isi['sub_judul']	= '';
		$isi['link']		= '';
		$isi['data']		= $this->db->get('kategori');
		$this->load->view('admin/tampilan_home', $isi);
	}

	public function tambah()
	{
		$this->model_security->getsecurity();
		$isi['content']		= 'admin/kategori/form_tambahkategori';
		$isi['judul']		= 'Kategori';
		$isi['sub_judul']	= 'Tambah Kategori';
		$isi['link']		= base_url();'admin/kategori';
		$isi['data']		= $this->db->get('kategori');
		$isi['id_kategori']	= '';
		$isi['kategori']	= '';
		$this->load->view('admin/tampilan_home', $isi);
	}

	public function edit()
	{
		$this->model_security->getsecurity();
		$isi['content']		= 'admin/kategori/form_editkategori';
		$isi['judul']		= 'Kategori';
		$isi['tipe']		= 'edit';
		$isi['sub_judul']	= 'Edit Kategori';
		$isi['link']		= base_url();'admin/kategori';

		$key   = $this->uri->segment(4);
		$query = $this->model_kategori->getdata($key);
		foreach ($query->result() as $row) 
		{
			$isi['id_kategori']		= $row->id_kategori;
			$isi['kategori']		= $row->kategori;
		}

		$this->load->view('admin/tampilan_home', $isi);
	}

	public function simpan()
	{
		$this->model_security->getsecurity();
		$key				 = $this->input->post('id_kategori');
		$tipe				 = $this->input->post('tipe');
		$data['id_kategori'] = $this->input->post('id_kategori');
		$data['kategori']	 = $this->input->post('kategori');

		if($tipe == "tambah")
		{
			$this->form_validation->set_rules('kategori','Kategori','required');
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('info','Kategori tidak boleh kosong');
				redirect('admin/kategori/tambah');
			}
			else
			{
				$this->load->model('model_kategori');
				$this->model_kategori->getinsert($data);
				$this->session->set_flashdata('info','Kategori Berhasil ditambahkan');
				redirect('admin/kategori');
			}
		}
		elseif($tipe == "edit")
		{
			$this->form_validation->set_rules('kategori','Kategori','required');
			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_fashdata('info','Kategori tidak boleh kosong');
				redirect('admin/kategori/edit');
			}
			else
			{
				$this->load->model('model_kategori');
				$this->model_kategori->getupdate($key,$data);
				$this->session->set_flashdata('info','Kategori berhasil diupdate');
				redirect('admin/kategori');
			}
		}
	}

}

/* End of file kategori.php */
/* Location: ./application/controllers/admin/kategori.php */