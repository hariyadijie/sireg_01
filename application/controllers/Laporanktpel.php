<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporanktpel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->layout->auth();
        $this->load->model('Laporanktpel_model');
	}
	
	public function index()
	{
		$data['title'] = 'Laporan';
		$data['subtitle'] = '';
        $data['crumb'] = [
            'Laporan' => '',
		];
		$data['user'] = $this->ion_auth->user()->row();
		//$this->layout->set_privilege(1);
		$data['message'] = $this->session->message;
		
		$data['tahun'] = $this->Laporanktpel_model->gettahun();
		$data['code_js'] = 'kecamatan/codejs';
        $data['page'] = 'laporan/ktpel/laporan_ktpel';    
		$this->load->view('template/backend', $data);
    }

    function filter(){
		$tanggalawal = $this->input->post('tanggalawal');
		$tanggalakhir = $this->input->post('tanggalakhir');
		$tahun1 = $this->input->post('tahun1');
		$bulanawal = $this->input->post('bulanawal');
		$bulanakhir = $this->input->post('bulanakhir');
		$tahun2 = $this->input->post('tahun2');
		$nilaifilter = $this->input->post('nilaifilter');


		if ($nilaifilter == 1) {
			
			$data['title1'] = "Dinas Kependudukan dan Pencatatan Sipil Kabupaten Bantaeng";
			$data['title2'] = "Laporan Hasil Cetak/Register KTP Elektronik";
			$data['subtitle'] = "Dari tanggal : ".$tanggalawal.' Sampai tanggal : '.$tanggalakhir;
			$data['datafilter'] = $this->Laporanktpel_model->filterbytanggal($tanggalawal,$tanggalakhir);

			$this->load->view('laporan/ktpel/print_ktpel', $data);

		}elseif ($nilaifilter == 2) {
			
			$data['title1'] = "Dinas Kependudukan dan Pencatatan Sipil Kabupaten Bantaeng";
			$data['title2'] = "Laporan Hasil Cetak/Register KTP Elektronik";
			$data['subtitle'] = "Dari bulan : ".$bulanawal.' Sampai Bulan : '.$bulanakhir.' Tahun : '.$tahun1;
			$data['datafilter'] = $this->Laporanktpel_model->filterbybulan($tahun1,$bulanawal,$bulanakhir);

			$this->load->view('laporan/ktpel/print_ktpel', $data);

		}elseif ($nilaifilter == 3) {
			
			$data['title1'] = "Dinas Kependudukan dan Pencatatan Sipil Kabupaten Bantaeng";
			$data['title2'] = "Laporan Hasil Cetak/Register KTP Elektronik";
			$data['subtitle'] = ' Tahun : '.$tahun2;
			$data['datafilter'] = $this->Laporanktpel_model->filterbytahun($tahun2);

			$this->load->view('laporan/ktpel/print_ktpel', $data);

		}
	}

}