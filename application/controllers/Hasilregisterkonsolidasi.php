<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hasilregisterkonsolidasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Hasilregisterkonsolidasi_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Hasil Register Konsolidasi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Hasilregisterkonsolidasi' => '',
        ];
        $data['code_js'] = 'hasilregisterkonsolidasi/codejs';
        $data['page'] = 'hasilregisterkonsolidasi/Hasilregisterkonsolidasi_list';
        $this->load->view('template/backend', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Hasilregisterkonsolidasi_model->json();
    }

    public function read($id) 
    {
        $row = $this->Hasilregisterkonsolidasi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_konsolidasi' => $row->id_konsolidasi,
		'no_id' => $row->no_id,
		'nik' => $row->nik,
		'nama_lengkap' => $row->nama_lengkap,
		'no_kk' => $row->no_kk,
		'kabkota' => $row->kabkota,
		'kecamatan' => $row->kecamatan,
		'desalurah' => $row->desalurah,
		'permasalahan' => $row->permasalahan,
		'status_dwh' => $row->status_dwh,
		'tgl_register' => $row->tgl_register,
		'nama_register' => $row->nama_register,
		'nama_resepsionis' => $row->nama_resepsionis,
		'nama_pengguna' => $row->nama_pengguna,
		'keterangan' => $row->keterangan,
	    );
        $data['title'] = 'Hasil Register Konsolidasi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'hasilregisterkonsolidasi/Hasilregisterkonsolidasi_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hasilregisterkonsolidasi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Input',
            'action' => site_url('hasilregisterkonsolidasi/create_action'),
	    'id_konsolidasi' => set_value('id_konsolidasi'),
	    'no_id' => set_value('no_id'),
	    'nik' => set_value('nik'),
	    'nama_lengkap' => set_value('nama_lengkap'),
	    'no_kk' => set_value('no_kk'),
	    'kabkota' => set_value('kabkota'),
	    'kecamatan' => set_value('kecamatan'),
	    'desalurah' => set_value('desalurah'),
	    'permasalahan' => set_value('permasalahan'),
	    'status_dwh' => set_value('status_dwh'),
	    'tgl_register' => set_value('tgl_register'),
	    'nama_register' => set_value('nama_register'),
	    'nama_resepsionis' => set_value('nama_resepsionis'),
	    'nama_pengguna' => set_value('nama_pengguna'),
	    'keterangan' => set_value('keterangan'),
	);
        $data['title'] = 'Hasil Register Konsolidasi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'hasilregisterkonsolidasi/Hasilregisterkonsolidasi_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'no_id' => $this->input->post('no_id',TRUE),
		'nik' => $this->input->post('nik',TRUE),
		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
		'no_kk' => $this->input->post('no_kk',TRUE),
		'kabkota' => $this->input->post('kabkota',TRUE),
		'kecamatan' => $this->input->post('kecamatan',TRUE),
		'desalurah' => $this->input->post('desalurah',TRUE),
		'permasalahan' => $this->input->post('permasalahan',TRUE),
		'status_dwh' => $this->input->post('status_dwh',TRUE),
		'tgl_register' => $this->input->post('tgl_register',TRUE),
		'nama_register' => $this->input->post('nama_register',TRUE),
		'nama_resepsionis' => $this->input->post('nama_resepsionis',TRUE),
		'nama_pengguna' => $this->input->post('nama_pengguna',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );$this->Hasilregisterkonsolidasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('hasilregisterkonsolidasi'));}
    }
    
    public function update($id) 
    {
        $row = $this->Hasilregisterkonsolidasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('hasilregisterkonsolidasi/update_action'),
		'id_konsolidasi' => set_value('id_konsolidasi', $row->id_konsolidasi),
		'no_id' => set_value('no_id', $row->no_id),
		'nik' => set_value('nik', $row->nik),
		'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
		'no_kk' => set_value('no_kk', $row->no_kk),
		'kabkota' => set_value('kabkota', $row->kabkota),
		'kecamatan' => set_value('kecamatan', $row->kecamatan),
		'desalurah' => set_value('desalurah', $row->desalurah),
		'permasalahan' => set_value('permasalahan', $row->permasalahan),
		'status_dwh' => set_value('status_dwh', $row->status_dwh),
		'tgl_register' => set_value('tgl_register', $row->tgl_register),
		'nama_register' => set_value('nama_register', $row->nama_register),
		'nama_resepsionis' => set_value('nama_resepsionis', $row->nama_resepsionis),
		'nama_pengguna' => set_value('nama_pengguna', $row->nama_pengguna),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $data['title'] = 'Hasil Register Konsolidasi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'hasilregisterkonsolidasi/Hasilregisterkonsolidasi_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hasilregisterkonsolidasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_konsolidasi', TRUE));
        } else {
            $data = array(
		'no_id' => $this->input->post('no_id',TRUE),
		'nik' => $this->input->post('nik',TRUE),
		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
		'no_kk' => $this->input->post('no_kk',TRUE),
		'kabkota' => $this->input->post('kabkota',TRUE),
		'kecamatan' => $this->input->post('kecamatan',TRUE),
		'desalurah' => $this->input->post('desalurah',TRUE),
		'permasalahan' => $this->input->post('permasalahan',TRUE),
		'status_dwh' => $this->input->post('status_dwh',TRUE),
		'tgl_register' => $this->input->post('tgl_register',TRUE),
		'nama_register' => $this->input->post('nama_register',TRUE),
		'nama_resepsionis' => $this->input->post('nama_resepsionis',TRUE),
		'nama_pengguna' => $this->input->post('nama_pengguna',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Hasilregisterkonsolidasi_model->update($this->input->post('id_konsolidasi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('hasilregisterkonsolidasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Hasilregisterkonsolidasi_model->get_by_id($id);

        if ($row) {
            $this->Hasilregisterkonsolidasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('hasilregisterkonsolidasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hasilregisterkonsolidasi'));
        }
    }

    public function deletebulk(){
        $delete = $this->Hasilregisterkonsolidasi_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('no_id', 'no id', 'trim|required');
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
	$this->form_validation->set_rules('no_kk', 'no kk', 'trim|required');
	$this->form_validation->set_rules('kabkota', 'kabkota', 'trim|required');
	$this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
	$this->form_validation->set_rules('desalurah', 'desalurah', 'trim|required');
	$this->form_validation->set_rules('permasalahan', 'permasalahan', 'trim|required');
	$this->form_validation->set_rules('status_dwh', 'status dwh', 'trim|required');
	$this->form_validation->set_rules('tgl_register', 'tgl register', 'trim|required');
	$this->form_validation->set_rules('nama_register', 'nama register', 'trim|required');
	$this->form_validation->set_rules('nama_resepsionis', 'nama resepsionis', 'trim|required');
	$this->form_validation->set_rules('nama_pengguna', 'nama pengguna', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_konsolidasi', 'id_konsolidasi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Hasilregisterkonsolidasi.php */
/* Location: ./application/controllers/Hasilregisterkonsolidasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-21 01:11:27 */
/* http://harviacode.com */