<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hasilcetakkia extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Hasilcetakkia_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Registrasi Hasil Cetak KIA';
        $data['subtitle'] = '(Kartu Identitas Anak)';
        $data['crumb'] = [
            'Hasilcetakkia' => '',
        ];
        $data['code_js'] = 'hasilcetakkia/codejs';
        $data['page'] = 'hasilcetakkia/Hasilcetakkia_list';
        $this->load->view('template/backend', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Hasilcetakkia_model->json();
    }

    public function read($id) 
    {
        $row = $this->Hasilcetakkia_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kia' => $row->id_kia,
		'nik' => $row->nik,
		'nama_anak' => $row->nama_anak,
		'nama_ayah' => $row->nama_ayah,
		'nama_ibu' => $row->nama_ibu,
		'kecamatan' => $row->kecamatan,
		'desalurah' => $row->desalurah,
		'tgl_cetak' => $row->tgl_cetak,
		'petugas_resepsionis' => $row->petugas_resepsionis,
		'petugas_operator' => $row->petugas_operator,
		'petugas_register' => $row->petugas_register,
		'nama_pengguna' => $row->nama_pengguna,
		'keterangan' => $row->keterangan,
	    );
        $data['title'] = 'Registrasi Hasil Cetak KIA';
        $data['subtitle'] = '(Kartu Identitas Anak)';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'hasilcetakkia/Hasilcetakkia_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hasilcetakkia'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Input',
            'action' => site_url('hasilcetakkia/create_action'),
	    'id_kia' => set_value('id_kia'),
	    'nik' => set_value('nik'),
	    'nama_anak' => set_value('nama_anak'),
	    'nama_ayah' => set_value('nama_ayah'),
	    'nama_ibu' => set_value('nama_ibu'),
	    'kecamatan' => set_value('kecamatan'),
	    'desalurah' => set_value('desalurah'),
	    'tgl_cetak' => set_value('tgl_cetak'),
	    'petugas_resepsionis' => set_value('petugas_resepsionis'),
	    'petugas_operator' => set_value('petugas_operator'),
	    'petugas_register' => set_value('petugas_register'),
	    'nama_pengguna' => set_value('nama_pengguna'),
	    'keterangan' => set_value('keterangan'),
	);
        $data['title'] = 'Registrasi Hasil Cetak KIA';
        $data['subtitle'] = '(Kartu Identitas Anak)';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'hasilcetakkia/Hasilcetakkia_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nik' => $this->input->post('nik',TRUE),
		'nama_anak' => $this->input->post('nama_anak',TRUE),
		'nama_ayah' => $this->input->post('nama_ayah',TRUE),
		'nama_ibu' => $this->input->post('nama_ibu',TRUE),
		'kecamatan' => $this->input->post('kecamatan',TRUE),
		'desalurah' => $this->input->post('desalurah',TRUE),
		'tgl_cetak' => $this->input->post('tgl_cetak',TRUE),
		'petugas_resepsionis' => $this->input->post('petugas_resepsionis',TRUE),
		'petugas_operator' => $this->input->post('petugas_operator',TRUE),
		'petugas_register' => $this->input->post('petugas_register',TRUE),
		'nama_pengguna' => $this->input->post('nama_pengguna',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );$this->Hasilcetakkia_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('hasilcetakkia'));}
    }
    
    public function update($id) 
    {
        $row = $this->Hasilcetakkia_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('hasilcetakkia/update_action'),
		'id_kia' => set_value('id_kia', $row->id_kia),
		'nik' => set_value('nik', $row->nik),
		'nama_anak' => set_value('nama_anak', $row->nama_anak),
		'nama_ayah' => set_value('nama_ayah', $row->nama_ayah),
		'nama_ibu' => set_value('nama_ibu', $row->nama_ibu),
		'kecamatan' => set_value('kecamatan', $row->kecamatan),
		'desalurah' => set_value('desalurah', $row->desalurah),
		'tgl_cetak' => set_value('tgl_cetak', $row->tgl_cetak),
		'petugas_resepsionis' => set_value('petugas_resepsionis', $row->petugas_resepsionis),
		'petugas_operator' => set_value('petugas_operator', $row->petugas_operator),
		'petugas_register' => set_value('petugas_register', $row->petugas_register),
		'nama_pengguna' => set_value('nama_pengguna', $row->nama_pengguna),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $data['title'] = 'Registrasi Hasil Cetak KIA';
        $data['subtitle'] = '(Kartu Identitas Anak)';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'hasilcetakkia/Hasilcetakkia_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hasilcetakkia'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kia', TRUE));
        } else {
            $data = array(
		'nik' => $this->input->post('nik',TRUE),
		'nama_anak' => $this->input->post('nama_anak',TRUE),
		'nama_ayah' => $this->input->post('nama_ayah',TRUE),
		'nama_ibu' => $this->input->post('nama_ibu',TRUE),
		'kecamatan' => $this->input->post('kecamatan',TRUE),
		'desalurah' => $this->input->post('desalurah',TRUE),
		'tgl_cetak' => $this->input->post('tgl_cetak',TRUE),
		'petugas_resepsionis' => $this->input->post('petugas_resepsionis',TRUE),
		'petugas_operator' => $this->input->post('petugas_operator',TRUE),
		'petugas_register' => $this->input->post('petugas_register',TRUE),
		'nama_pengguna' => $this->input->post('nama_pengguna',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Hasilcetakkia_model->update($this->input->post('id_kia', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('hasilcetakkia'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Hasilcetakkia_model->get_by_id($id);

        if ($row) {
            $this->Hasilcetakkia_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('hasilcetakkia'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hasilcetakkia'));
        }
    }

    public function deletebulk(){
        $delete = $this->Hasilcetakkia_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('nama_anak', 'nama anak', 'trim|required');
	$this->form_validation->set_rules('nama_ayah', 'nama ayah', 'trim|required');
	$this->form_validation->set_rules('nama_ibu', 'nama ibu', 'trim|required');
	$this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
	$this->form_validation->set_rules('desalurah', 'desalurah', 'trim|required');
	$this->form_validation->set_rules('tgl_cetak', 'tgl cetak', 'trim|required');
	$this->form_validation->set_rules('petugas_resepsionis', 'petugas resepsionis', 'trim|required');
	$this->form_validation->set_rules('petugas_operator', 'petugas operator', 'trim|required');
	$this->form_validation->set_rules('petugas_register', 'petugas register', 'trim|required');
	$this->form_validation->set_rules('nama_pengguna', 'nama pengguna', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_kia', 'id_kia', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "hasilcetakkia.xls";
        $judul = "Hasil Cetak KIA";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nik");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Anak");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Ayah");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Ibu");
	xlsWriteLabel($tablehead, $kolomhead++, "Kecamatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Desalurah");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Cetak");
	xlsWriteLabel($tablehead, $kolomhead++, "Petugas Resepsionis");
	xlsWriteLabel($tablehead, $kolomhead++, "Petugas Operator");
	xlsWriteLabel($tablehead, $kolomhead++, "Petugas Register");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Pengguna");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Hasilcetakkia_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nik);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_anak);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_ayah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_ibu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kecamatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->desalurah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_cetak);
	    xlsWriteLabel($tablebody, $kolombody++, $data->petugas_resepsionis);
	    xlsWriteLabel($tablebody, $kolombody++, $data->petugas_operator);
	    xlsWriteLabel($tablebody, $kolombody++, $data->petugas_register);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_pengguna);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Hasilcetakkia.php */
/* Location: ./application/controllers/Hasilcetakkia.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-22 01:16:00 */
/* http://harviacode.com */