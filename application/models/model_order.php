<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_order extends CI_Model {

	public function simpan_pesanan($data,$nm_produk,$qty)
	{
		//tambah pesanan
		$this->db->insert('pesanan', $data);

		//ambil stok produk
		$this->db->select('stok')
		         ->from('produk')
				 ->where('judul',$nm_produk);

		$stok = $this->db->get();

		//pengurangan stok						  
		$hasil['stok'] = $stok->row()->stok-$qty;

		//update stok produk
		$this->db->where('judul',$nm_produk)
				 ->update('produk',$hasil);
	}

	public function getdata_order($id_pesanan)
	{
		$query = $this->db->where('id_pesanan',$id_pesanan)
						  ->get('pesanan');
		return $query;
	}

}

/* End of file model_order.php */
/* Location: ./application/models/model_order.php */