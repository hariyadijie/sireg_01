<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporanktpel_model extends CI_Model {


	function gettahun(){

		$query = $this->db->query("SELECT YEAR(tgl_cetak) AS tahun FROM hasilcetak GROUP BY YEAR(tgl_cetak) ORDER BY YEAR(tgl_cetak) ASC");
		return $query->result();

	}

	function filterbytanggal($tgl_cetakawal,$tgl_cetakakhir){

		$query = $this->db->query("SELECT * from hasilcetak where tgl_cetak BETWEEN '$tgl_cetakawal' and '$tgl_cetakakhir' ORDER BY tgl_cetak ASC ");
		return $query->result();
	}

	function filterbybulan($tahun1,$bulanawal,$bulanakhir){

		$query = $this->db->query("SELECT * from hasilcetak where YEAR(tgl_cetak) = '$tahun1' and MONTH(tgl_cetak) BETWEEN '$bulanawal' and '$bulanakhir' ORDER BY tgl_cetak ASC ");
		return $query->result();
	}

	function filterbytahun($tahun2){

		$query = $this->db->query("SELECT * from hasilcetak where YEAR(tgl_cetak) = '$tahun2'  ORDER BY tgl_cetak ASC ");
		return $query->result();
	}
	
	

}

/* End of file laporanktpel_model.php */
/* Location: ./application/models/laporanktpel_model.php */