<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hasilcetakkk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Hasilcetakkk_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Registrasi Hasil Cetak Kartu Keluarga';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Hasilcetakkk' => '',
        ];
        $data['code_js'] = 'hasilcetakkk/codejs';
        $data['page'] = 'hasilcetakkk/Hasilcetakkk_list';
        $this->load->view('template/backend', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Hasilcetakkk_model->json();
    }

    public function read($id) 
    {
        $row = $this->Hasilcetakkk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_hasilcetakkk' => $row->id_hasilcetakkk,
		'nik' => $row->nik,
		'nokk' => $row->nokk,
		'nama' => $row->nama,
		'alamat' => $row->alamat,
		'kecamatan' => $row->kecamatan,
		'desalurah' => $row->desalurah,
		'tgl_cetak' => $row->tgl_cetak,
		'nama_register' => $row->nama_register,
		'nama_operator' => $row->nama_operator,
		'status_cetak' => $row->status_cetak,
		'alasan_cetak' => $row->alasan_cetak,
		'nama_pengurus' => $row->nama_pengurus,
		'ket' => $row->ket,
		'catatan' => $row->catatan,
	    );
        $data['title'] = 'Registrasi Hasil Cetak Kartu Keluarga';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'hasilcetakkk/Hasilcetakkk_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hasilcetakkk'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Input',
            'action' => site_url('hasilcetakkk/create_action'),
	    'id_hasilcetakkk' => set_value('id_hasilcetakkk'),
	    'nik' => set_value('nik'),
	    'nokk' => set_value('nokk'),
	    'nama' => set_value('nama'),
	    'alamat' => set_value('alamat'),
	    'kecamatan' => set_value('kecamatan'),
	    'desalurah' => set_value('desalurah'),
	    'tgl_cetak' => set_value('tgl_cetak'),
	    'nama_register' => set_value('nama_register'),
	    'nama_operator' => set_value('nama_operator'),
	    'status_cetak' => set_value('status_cetak'),
	    'alasan_cetak' => set_value('alasan_cetak'),
	    'nama_pengurus' => set_value('nama_pengurus'),
	    'ket' => set_value('ket'),
	    'catatan' => set_value('catatan'),
	);
        $data['title'] = 'Registrasi Hasil Cetak Kartu Keluarga';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'hasilcetakkk/Hasilcetakkk_form';
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
		'nokk' => $this->input->post('nokk',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'kecamatan' => $this->input->post('kecamatan',TRUE),
		'desalurah' => $this->input->post('desalurah',TRUE),
		'tgl_cetak' => $this->input->post('tgl_cetak',TRUE),
		'nama_register' => $this->input->post('nama_register',TRUE),
		'nama_operator' => $this->input->post('nama_operator',TRUE),
		'status_cetak' => $this->input->post('status_cetak',TRUE),
		'alasan_cetak' => $this->input->post('alasan_cetak',TRUE),
		'nama_pengurus' => $this->input->post('nama_pengurus',TRUE),
		'ket' => $this->input->post('ket',TRUE),
		'catatan' => $this->input->post('catatan',TRUE),
	    );$this->Hasilcetakkk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('hasilcetakkk'));}
    }
    
    public function update($id) 
    {
        $row = $this->Hasilcetakkk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('hasilcetakkk/update_action'),
		'id_hasilcetakkk' => set_value('id_hasilcetakkk', $row->id_hasilcetakkk),
		'nik' => set_value('nik', $row->nik),
		'nokk' => set_value('nokk', $row->nokk),
		'nama' => set_value('nama', $row->nama),
		'alamat' => set_value('alamat', $row->alamat),
		'kecamatan' => set_value('kecamatan', $row->kecamatan),
		'desalurah' => set_value('desalurah', $row->desalurah),
		'tgl_cetak' => set_value('tgl_cetak', $row->tgl_cetak),
		'nama_register' => set_value('nama_register', $row->nama_register),
		'nama_operator' => set_value('nama_operator', $row->nama_operator),
		'status_cetak' => set_value('status_cetak', $row->status_cetak),
		'alasan_cetak' => set_value('alasan_cetak', $row->alasan_cetak),
		'nama_pengurus' => set_value('nama_pengurus', $row->nama_pengurus),
		'ket' => set_value('ket', $row->ket),
		'catatan' => set_value('catatan', $row->catatan),
	    );
            $data['title'] = 'Registrasi Hasil Cetak Kartu Keluarga';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'hasilcetakkk/Hasilcetakkk_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hasilcetakkk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_hasilcetakkk', TRUE));
        } else {
            $data = array(
		'nik' => $this->input->post('nik',TRUE),
		'nokk' => $this->input->post('nokk',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'kecamatan' => $this->input->post('kecamatan',TRUE),
		'desalurah' => $this->input->post('desalurah',TRUE),
		'tgl_cetak' => $this->input->post('tgl_cetak',TRUE),
		'nama_register' => $this->input->post('nama_register',TRUE),
		'nama_operator' => $this->input->post('nama_operator',TRUE),
		'status_cetak' => $this->input->post('status_cetak',TRUE),
		'alasan_cetak' => $this->input->post('alasan_cetak',TRUE),
		'nama_pengurus' => $this->input->post('nama_pengurus',TRUE),
		'ket' => $this->input->post('ket',TRUE),
		'catatan' => $this->input->post('catatan',TRUE),
	    );

            $this->Hasilcetakkk_model->update($this->input->post('id_hasilcetakkk', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('hasilcetakkk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Hasilcetakkk_model->get_by_id($id);

        if ($row) {
            $this->Hasilcetakkk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('hasilcetakkk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hasilcetakkk'));
        }
    }

    public function deletebulk(){
        $delete = $this->Hasilcetakkk_model->deletebulk();
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
	$this->form_validation->set_rules('nokk', 'nokk', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
	$this->form_validation->set_rules('desalurah', 'desalurah', 'trim|required');
	$this->form_validation->set_rules('tgl_cetak', 'tgl cetak', 'trim|required');
	$this->form_validation->set_rules('nama_register', 'nama register', 'trim|required');
	$this->form_validation->set_rules('nama_operator', 'nama operator', 'trim|required');
	$this->form_validation->set_rules('status_cetak', 'status cetak', 'trim|required');
	$this->form_validation->set_rules('alasan_cetak', 'alasan cetak', 'trim|required');
	$this->form_validation->set_rules('nama_pengurus', 'nama pengurus', 'trim|required');
	$this->form_validation->set_rules('ket', 'ket', 'trim|required');
	$this->form_validation->set_rules('catatan', 'catatan', 'trim|required');

	$this->form_validation->set_rules('id_hasilcetakkk', 'id_hasilcetakkk', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Hasilcetakkk.php */
/* Location: ./application/controllers/Hasilcetakkk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-19 06:36:57 */
/* http://harviacode.com */