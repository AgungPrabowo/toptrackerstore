<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('selisih_tanggah'))
{
	function selisih_tanggah($awal,$akhir)
	{
		$datetime1 = date_create($awal);
		$datetime2 = date_create($akhir);
		$interval = date_diff($datetime1, $datetime2);
		$h = $interval->format('%a');
		$tahun = floor($h/365);
		$bulan = floor(($h%365)/30);
		return $tahun.'_'.$bulan;
	}
}
