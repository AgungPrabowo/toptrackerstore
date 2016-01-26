<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_produk extends CI_Model {

	public function getdata($key)
	{
		$hasil = $this->db->where('id_produk',$key)
						  ->limit(1)
			 		  	  ->get('produk');
		if($hasil->num_rows() > 0)
		{
			return $hasil->row();
		}
		else
		{
			return array();
		}
	}

	public function getupdate($key,$data)
	{
		$this->db->where('id_produk',$key)
				 ->update('produk',$data);
	}

	public function getinsert($data)
	{
		$this->db->insert('produk',$data);
	}

	public function getdelete($key)
	{
		$this->db->where('id_produk',$key)
				 ->delete('produk');
	}

	public function tampilkategori($key)
	{
		$this->db->where('id_kategori', $key);
		$query = $this->db->get('kategori');
		if($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
			{
				$hasil = $row->kategori;
			}
		}
		else
		{
			$hasil = '';
		}
		return $hasil;
	}

	public function dataproduk()
	{
		return $this->db->order_by('id_produk','DESC')
						->get('produk');
	}

	public function jumlah_data()
	{
		return $this->db->get('produk')
				 		->num_rows();
	}

	public function ambil_gambar($gambar)
	{
		$query = $this->db->where('judul',$gambar)
						  ->get('produk');
		return $query->row();
	}

}

/* End of file model_user.php */
/* Location: ./application/models/model_user.php */