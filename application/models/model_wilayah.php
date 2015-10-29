<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_wilayah extends CI_Model {

		public function getdata($key)
		{
			$hasil = $this->db->where('province_id', $key)
							  ->get('regencies');
			return $hasil;
		}

}

/* End of file model_wilayah.php */
/* Location: ./application/models/model_wilayah.php */