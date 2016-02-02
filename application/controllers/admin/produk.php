<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function index()
	{
		$this->load->model('model_produk');
		$this->model_security->getsecurity();
		$query				= $this->session->userdata('username');
		$level 				= $this->model_user->getdata_level($query);
		$isi['content']		= 'admin/produk/tampilan_produk';
		$isi['judul']		= 'Produk';
		$isi['sub_judul']	= '';
		$isi['link']		= '';
		$isi['level']		= $level;
		$isi['data']		= $this->db->get('produk');
		$this->load->view('admin/tampilan_home',$isi);
	}

	public function tambah()
	{
		$this->model_security->getsecurity();
		$isi['content']			= 'admin/produk/form_tambahproduk';
		$isi['judul']			= 'Produk';
		$isi['sub_judul']		= 'Tambah Produk';
		$isi['link']			= base_url().'index.php/admin/produk';
		$isi['data']			= $this->db->get('kategori');
		$isi['tipe']			= 'tambah';
		$this->load->view('admin/tampilan_home',$isi);
	}

	public function edit()
	{
		$this->load->model('model_produk');
		$this->model_security->getsecurity();
		$isi['content']			= 'admin/produk/form_editproduk';
		$isi['judul']			= 'Produk';
		$isi['sub_judul']		= 'Edit Produk';
		$isi['link']			= base_url().'index.php/admin/produk';
		$isi['data']			= $this->db->get('produk');
		$isi['tipe']			= 'edit';

		$key = $this->uri->segment(4);
		$this->db->where('id_produk', $key);
		$query = $this->db->get('produk');
		foreach($query->result() as $row)
		{
			$isi['id_produk']		= $row->id_produk;
			$isi['kategori']		= $row->id_kategori;
			$isi['judul_produk']	= $row->judul;
			$isi['data']			= $this->db->get('kategori');
			$isi['harga']			= $row->harga;
			$isi['stok']			= $row->stok;
			$isi['isi']				= $row->isi;
			$isi['gambar']			= $row->gambar;
			$isi['aktif']			= $row->aktif;
		}
		$this->load->view('admin/tampilan_home',$isi);

	}

	public function simpan()
	{
		$tipe = $this->input->post('tipe');
		$key  = $this->input->post('id_produk');
		
		if($tipe == "tambah")
		{
			$config['upload_path'] = './assets/images/produk/';
			$config['allowed_types']= 'gif|jpg|png|jpeg';
			$config['encrypt_name']	= TRUE;
			$config['remove_spaces']	= TRUE;	
			$config['max_size']     = '3000';
			$config['max_width']  	= '3000';
			$config['max_height']  	= '3000';
				 
			$this->load->library('upload', $config);
		 
			if ($this->upload->do_upload("userfile")) 
			{
				$data	 	= $this->upload->data();
				 
				/* PATH */
				$source             = "./asset/images/produk/".$data['file_name'] ;
					
				// Permission Configuration
				chmod($source, 0777) ;
			
				$in_data['gambar'] 		= $data['file_name'];
				$in_data['judul'] 		= $this->input->post("judul_produk");
				$in_data['id_kategori'] = $this->input->post("kategori");
				$in_data['harga']		= $this->input->post("harga");
				$in_data['stok']		= $this->input->post("stok");
				$in_data['isi'] 		= $this->input->post("isi");
				$in_data['tanggal'] 	= time()+3600*7;
				$in_data['aktif'] 		= $this->input->post("aktif");
				$this->load->model('model_produk');
				$this->model_produk->getinsert($in_data);
				$this->session->set_flashdata('info','Produk Berhasil ditambahkan');
				
				unlink($source);
						
				redirect("admin/produk");
							
			}
			else
			{
				redirect("admin/produk/tambah");
			}
		}
		elseif($tipe == "edit")
		{
			if(empty($_FILES['userfile']['name']))
			{
				$data['id_produk']	= $this->input->post('id_produk');
				$data['judul']		= $this->input->post('judul_produk');
				$data['id_kategori']= $this->input->post('kategori');
				$data['harga']		= $this->input->post('harga');
				$data['stok']		= $this->input->post('stok');
				$data['isi']		= $this->input->post('isi');
				$data['aktif']		= $this->input->post('aktif');
				$this->load->model('model_produk');
				$this->model_produk->getupdate($key,$data);
				$this->session->set_flashdata('info','Produk Berhasil diupdate');
				redirect('admin/produk');
			}
			else
			{
				$config['upload_path']		= 'assets/images/produk';
				$config['allowed_types']	= 'gif|png|jpg|jpeg';
				$config['encrypt_name']		= TRUE;
				$config['remove_spaces']	= TRUE;
				$config['max_size']			= '3000';
				$config['max_width']		= '3000';
				$config['max_height']		= '3000';
				$this->load->library('upload', $config);

				if($this->upload->do_upload("userfile"))
				{
					$data 	= $this->upload->data();
					// PATH
					$source = "./assets/images/produk".$data['file_name'];

					$in_data['gambar']		= $data['file_name'];
					$in_data['judul']		= $this->input->post('judul_produk');
					$in_data['id_kategori']	= $this->input->post('kategori');
					$in_data['harga']		= $this->input->post('harga');
					$in_data['stok']		= $this->input->post('stok');
					$in_data['isi']			= $this->input->post('isi');
					$in_data['aktif']		= $this->input->post('aktif');

					$this->load->model('model_produk');
					$this->model_produk->getupdate($key,$in_data);
					$this->session->set_flashdata('info','Produk Berhasil diupdate');
					redirect('admin/produk');
				}
				else
				{
					redirect('admin/produk/edit');
				}
			}
		}
	}

	public function hapus()
	{
		$this->model_security->getsecurity();

		$this->load->model('model_produk');
		$key = $this->uri->segment(4);
		$this->model_produk->getdelete($key);
		$this->session->set_flashdata('info','Produk Berhasil dihapus');
		redirect('admin/produk');
	}
}


/* End of file produk.php */
/* Location: ./application/controllers/admin/produk.php */