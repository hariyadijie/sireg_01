<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Datapengunjung extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Datapengunjung_model');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
		$this->load->helper('form');
    }

    public function index()
    {
		// $row = $this->Datapengunjung_model->get_all('biodatapenduduk')->result();
		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->input->get('start'));
        if ($q <> '') {
            $config['base_url'] = base_url() . 'datapengunjung?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'datapengunjung?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'datapengunjung';
            $config['first_url'] = base_url() . 'datapengunjung';
		}
		
		$config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Datapengunjung_model->total_rows($q);
		$datapengunjung = $this->Datapengunjung_model->get_limit_data($config['per_page'], $start, $q);
		$datapenduduk = $this->Datapengunjung_model->get_limit_data2($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $data = array(
            'datapengunjung_data' => $datapengunjung,
            'datapenduduk' => $datapenduduk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $data['title'] = 'Data Resepsionis';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Datapengunjung' => '',
        ];
        $data['code_js'] = 'datapengunjung/codejs';
        $data['page'] = 'datapengunjung/Datapengunjung_list';
        $this->load->view('template/backend', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Datapengunjung_model->json();
    }
    public function json2() {
        header('Content-Type: application/json2');
        echo $this->Datapengunjung_model->json2();
    }

    public function cari(){
		// $row = $this->Datapengunjung_model->get_all2('biodatapenduduk')->result();
		$data['cari']=$this->input->post('cari');

		$data["datapenduduk"]->$this->Datapengunjung_model->cari($data['cari'])->result();
		$data['code_js'] = 'datapengunjung/codejs';
        $data['page'] = 'datapengunjung/Datapengunjung_cari';
        $this->load->view('template/backend', $data);
		// $this->load->view('datapengunjung/Datapengunjung_cari', $data);
		
        // $nik=$_POST['nik'];
        // $cari =$this->datapengunjung_model->cari($nik)->result();
        // echo json_encode($cari);
    } 

    public function read($id) 
    {
        $row = $this->Datapengunjung_model->get_by_id($id);
        if ($row) {
            $data = array(
            'id_biodatapenduduk' => $row->id_biodatapenduduk,
            'nik' => $row->nik,
            'no_kk' => $row->no_kk,
            'nama' => $row->nama,
            'alamat' => $row->alamat,
            'kecamatan' => $row->kecamatan,
            'desa_lurah' => $row->desa_lurah,
            'tgl_lahir' => $row->tgl_lahir,
            'tempat_lahir' => $row->tempat_lahir,
            'nama_ayah' => $row->nama_ayah,
            'nama_ibu' => $row->nama_ibu,
            'pekerjaan' => $row->pekerjaan,
            'pendidikan' => $row->pendidikan,
            'golongan_darah' => $row->golongan_darah,
            'agama' => $row->agama,
            'hubungan_dalam_keluarga' => $row->hubungan_dalam_keluarga,
            'status_perkawinan' => $row->status_perkawinan,
            'disabilitas' => $row->disabilitas,
			);
        $data['title'] = 'Data Pengunjung';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'datapengunjung/Datapengunjung_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('datapengunjung'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Input',
            'action' => site_url('datapengunjung/create_action'),
			'id_datapengunjung' => set_value('id_datapengunjung'),
			'nik' => set_value('nik'),
			'no_kk' => set_value('no_kk'),
			'nama_lengkap' => set_value('nama_lengkap'),
			'kecamatan' => set_value('kecamatan'),
			'desalurah' => set_value('desalurah'),
			'alamat' => set_value('alamat'),
			'jenis_pengurusan' => set_value('jenis_pengurusan'),
			'tgl_input_resepsionis' => set_value('tgl_input_resepsionis'),
			'tgl_edit_operator' => set_value('tgl_edit_operator'),
			'tgl_edit_registercetak' => set_value('tgl_edit_registercetak'),
			'nomor_antrian' => set_value('nomor_antrian'),
			'nama_pengurus' => set_value('nama_pengurus'),
			'status_hub_pengurus' => set_value('status_hub_pengurus'),
			'status_berkas' => set_value('status_berkas'),
			'nomor_kontak_pengunjung' => set_value('nomor_kontak_pengunjung'),
			'nama_pengambil_dokumen' => set_value('nama_pengambil_dokumen'),
			'tgl_pengambilan' => set_value('tgl_pengambilan'),
			'user_resepsionis' => set_value('user_resepsionis'),
			'user_operator' => set_value('user_operator'),
			'user_cetak' => set_value('user_cetak'),
			'user_pengambilan' => set_value('user_pengambilan'),
			'keterangan' => set_value('keterangan'),
		);
        $data['title'] = 'Data Pengunjung';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'datapengunjung/Datapengunjung_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
			'id_datapengunjung' => $this->input->post('id_datapengunjung',TRUE),
			'nik' => $this->input->post('nik',TRUE),
			'no_kk' => $this->input->post('no_kk',TRUE),
			'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
			'kecamatan' => $this->input->post('kecamatan',TRUE),
			'desalurah' => $this->input->post('desalurah',TRUE),
			'alamat' => $this->input->post('alamat',TRUE),
			'jenis_pengurusan' => $this->input->post('jenis_pengurusan',TRUE),
			'tgl_input_resepsionis' => $this->input->post('tgl_input_resepsionis',TRUE),
			'tgl_edit_operator' => $this->input->post('tgl_edit_operator',TRUE),
			'tgl_edit_registercetak' => $this->input->post('tgl_edit_registercetak',TRUE),
			'nomor_antrian' => $this->input->post('nomor_antrian',TRUE),
			'nama_pengurus' => $this->input->post('nama_pengurus',TRUE),
			'status_hub_pengurus' => $this->input->post('status_hub_pengurus',TRUE),
			'status_berkas' => $this->input->post('status_berkas',TRUE),
			'nomor_kontak_pengunjung' => $this->input->post('nomor_kontak_pengunjung',TRUE),
			'nama_pengambil_dokumen' => $this->input->post('nama_pengambil_dokumen',TRUE),
			'tgl_pengambilan' => $this->input->post('tgl_pengambilan',TRUE),
			'user_resepsionis' => $this->input->post('user_resepsionis',TRUE),
			'user_operator' => $this->input->post('user_operator',TRUE),
			'user_cetak' => $this->input->post('user_cetak',TRUE),
			'user_pengambilan' => $this->input->post('user_pengambilan',TRUE),
			'keterangan' => $this->input->post('keterangan',TRUE),
			);
		if(! $this->Datapengunjung_model->is_exist($this->input->post('nik'))){
                $this->Datapengunjung_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('datapengunjung'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, nik is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Datapengunjung_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('datapengunjung/update_action'),
			'id_datapengunjung' => set_value('id_datapengunjung', $row->id_datapengunjung),
			'nik' => set_value('nik', $row->nik),
			'no_kk' => set_value('no_kk', $row->no_kk),
			'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
			'kecamatan' => set_value('kecamatan', $row->kecamatan),
			'desalurah' => set_value('desalurah', $row->desalurah),
			'alamat' => set_value('alamat', $row->alamat),
			'jenis_pengurusan' => set_value('jenis_pengurusan', $row->jenis_pengurusan),
			'tgl_input_resepsionis' => set_value('tgl_input_resepsionis', $row->tgl_input_resepsionis),
			'tgl_edit_operator' => set_value('tgl_edit_operator', $row->tgl_edit_operator),
			'tgl_edit_registercetak' => set_value('tgl_edit_registercetak', $row->tgl_edit_registercetak),
			'nomor_antrian' => set_value('nomor_antrian', $row->nomor_antrian),
			'nama_pengurus' => set_value('nama_pengurus', $row->nama_pengurus),
			'status_hub_pengurus' => set_value('status_hub_pengurus', $row->status_hub_pengurus),
			'status_berkas' => set_value('status_berkas', $row->status_berkas),
			'nomor_kontak_pengunjung' => set_value('nomor_kontak_pengunjung', $row->nomor_kontak_pengunjung),
			'nama_pengambil_dokumen' => set_value('nama_pengambil_dokumen', $row->nama_pengambil_dokumen),
			'tgl_pengambilan' => set_value('tgl_pengambilan', $row->tgl_pengambilan),
			'user_resepsionis' => set_value('user_resepsionis', $row->user_resepsionis),
			'user_operator' => set_value('user_operator', $row->user_operator),
			'user_cetak' => set_value('user_cetak', $row->user_cetak),
			'user_pengambilan' => set_value('user_pengambilan', $row->user_pengambilan),
			'keterangan' => set_value('keterangan', $row->keterangan),
			);
        $data['title'] = 'Data Pengunjung';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'datapengunjung/Datapengunjung_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('datapengunjung'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nik', TRUE));
        } else {
            $data = array(
			'id_datapengunjung' => $this->input->post('id_datapengunjung',TRUE),
			'nik' => $this->input->post('nik',TRUE),
			'no_kk' => $this->input->post('no_kk',TRUE),
			'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
			'kecamatan' => $this->input->post('kecamatan',TRUE),
			'desalurah' => $this->input->post('desalurah',TRUE),
			'alamat' => $this->input->post('alamat',TRUE),
			'jenis_pengurusan' => $this->input->post('jenis_pengurusan',TRUE),
			'tgl_input_resepsionis' => $this->input->post('tgl_input_resepsionis',TRUE),
			'tgl_edit_operator' => $this->input->post('tgl_edit_operator',TRUE),
			'tgl_edit_registercetak' => $this->input->post('tgl_edit_registercetak',TRUE),
			'nomor_antrian' => $this->input->post('nomor_antrian',TRUE),
			'nama_pengurus' => $this->input->post('nama_pengurus',TRUE),
			'status_hub_pengurus' => $this->input->post('status_hub_pengurus',TRUE),
			'status_berkas' => $this->input->post('status_berkas',TRUE),
			'nomor_kontak_pengunjung' => $this->input->post('nomor_kontak_pengunjung',TRUE),
			'nama_pengambil_dokumen' => $this->input->post('nama_pengambil_dokumen',TRUE),
			'tgl_pengambilan' => $this->input->post('tgl_pengambilan',TRUE),
			'user_resepsionis' => $this->input->post('user_resepsionis',TRUE),
			'user_operator' => $this->input->post('user_operator',TRUE),
			'user_cetak' => $this->input->post('user_cetak',TRUE),
			'user_pengambilan' => $this->input->post('user_pengambilan',TRUE),
			'keterangan' => $this->input->post('keterangan',TRUE),
			);

        $this->Datapengunjung_model->update($this->input->post('nik', TRUE), $data);
        $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('datapengunjung'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Datapengunjung_model->get_by_id($id);

        if ($row) {
            $this->Datapengunjung_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('datapengunjung'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('datapengunjung'));
        }
    }

    public function deletebulk(){
        $delete = $this->Datapengunjung_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_datapengunjung', 'id datapengunjung', 'trim|required');
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('no_kk', 'no kk', 'trim|required');
	$this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
	$this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
	$this->form_validation->set_rules('desalurah', 'desalurah', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('jenis_pengurusan', 'jenis pengurusan', 'trim|required');
	$this->form_validation->set_rules('tgl_input_resepsionis', 'tgl input resepsionis', 'trim|required');
	$this->form_validation->set_rules('tgl_edit_operator', 'tgl edit operator', 'trim|required');
	$this->form_validation->set_rules('tgl_edit_registercetak', 'tgl edit registercetak', 'trim|required');
	$this->form_validation->set_rules('nomor_antrian', 'nomor antrian', 'trim|required');
	$this->form_validation->set_rules('nama_pengurus', 'nama pengurus', 'trim|required');
	$this->form_validation->set_rules('status_hub_pengurus', 'status hub pengurus', 'trim|required');
	$this->form_validation->set_rules('status_berkas', 'status berkas', 'trim|required');
	$this->form_validation->set_rules('nomor_kontak_pengunjung', 'nomor kontak pengunjung', 'trim|required');
	$this->form_validation->set_rules('nama_pengambil_dokumen', 'nama pengambil dokumen', 'trim|required');
	$this->form_validation->set_rules('tgl_pengambilan', 'tgl pengambilan', 'trim|required');
	$this->form_validation->set_rules('user_resepsionis', 'user resepsionis', 'trim|required');
	$this->form_validation->set_rules('user_operator', 'user operator', 'trim|required');
	$this->form_validation->set_rules('user_cetak', 'user cetak', 'trim|required');
	$this->form_validation->set_rules('user_pengambilan', 'user pengambilan', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('nik', 'nik', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "datapengunjung.xls";
        $judul = "datapengunjung";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
		xlsWriteLabel($tablehead, $kolomhead++, "Id Datapengunjung");
		xlsWriteLabel($tablehead, $kolomhead++, "Nik");
		xlsWriteLabel($tablehead, $kolomhead++, "No Kk");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Lengkap");
		xlsWriteLabel($tablehead, $kolomhead++, "Kecamatan");
		xlsWriteLabel($tablehead, $kolomhead++, "Desalurah");
		xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
		xlsWriteLabel($tablehead, $kolomhead++, "Jenis Pengurusan");
		xlsWriteLabel($tablehead, $kolomhead++, "Tgl Input Resepsionis");
		xlsWriteLabel($tablehead, $kolomhead++, "Tgl Edit Operator");
		xlsWriteLabel($tablehead, $kolomhead++, "Tgl Edit Registercetak");
		xlsWriteLabel($tablehead, $kolomhead++, "Nomor Antrian");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Pengurus");
		xlsWriteLabel($tablehead, $kolomhead++, "Status Hub Pengurus");
		xlsWriteLabel($tablehead, $kolomhead++, "Status Berkas");
		xlsWriteLabel($tablehead, $kolomhead++, "Nomor Kontak Pengunjung");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Pengambil Dokumen");
		xlsWriteLabel($tablehead, $kolomhead++, "Tgl Pengambilan");
		xlsWriteLabel($tablehead, $kolomhead++, "User Resepsionis");
		xlsWriteLabel($tablehead, $kolomhead++, "User Operator");
		xlsWriteLabel($tablehead, $kolomhead++, "User Cetak");
		xlsWriteLabel($tablehead, $kolomhead++, "User Pengambilan");
		xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Datapengunjung_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteNumber($tablebody, $kolombody++, $data->id_datapengunjung);
			xlsWriteLabel($tablebody, $kolombody++, $data->nik);
			xlsWriteLabel($tablebody, $kolombody++, $data->no_kk);
			xlsWriteLabel($tablebody, $kolombody++, $data->nama_lengkap);
			xlsWriteLabel($tablebody, $kolombody++, $data->kecamatan);
			xlsWriteLabel($tablebody, $kolombody++, $data->desalurah);
			xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
			xlsWriteLabel($tablebody, $kolombody++, $data->jenis_pengurusan);
			xlsWriteLabel($tablebody, $kolombody++, $data->tgl_input_resepsionis);
			xlsWriteLabel($tablebody, $kolombody++, $data->tgl_edit_operator);
			xlsWriteLabel($tablebody, $kolombody++, $data->tgl_edit_registercetak);
			xlsWriteLabel($tablebody, $kolombody++, $data->nomor_antrian);
			xlsWriteLabel($tablebody, $kolombody++, $data->nama_pengurus);
			xlsWriteLabel($tablebody, $kolombody++, $data->status_hub_pengurus);
			xlsWriteLabel($tablebody, $kolombody++, $data->status_berkas);
			xlsWriteLabel($tablebody, $kolombody++, $data->nomor_kontak_pengunjung);
			xlsWriteLabel($tablebody, $kolombody++, $data->nama_pengambil_dokumen);
			xlsWriteLabel($tablebody, $kolombody++, $data->tgl_pengambilan);
			xlsWriteLabel($tablebody, $kolombody++, $data->user_resepsionis);
			xlsWriteLabel($tablebody, $kolombody++, $data->user_operator);
			xlsWriteLabel($tablebody, $kolombody++, $data->user_cetak);
			xlsWriteLabel($tablebody, $kolombody++, $data->user_pengambilan);
			xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);

	$tablebody++;
    $nourut++;
    }
        xlsEOF();
        exit();
    }

}

/* End of file Datapengunjung.php */
/* Location: ./application/controllers/Datapengunjung.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-05 07:24:57 */
/* http://harviacode.com */