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
    }

    public function index()
    {
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

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'datapengunjung_data' => $datapengunjung,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Datapengunjung';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Datapengunjung' => '',
        ];
        $data['code_js'] = 'datapengunjung/codejs';
        $data['page'] = 'datapengunjung/Datapengunjung_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id) 
    {
        $row = $this->Datapengunjung_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_datapengunjung' => $row->id_datapengunjung,
		'nik' => $row->nik,
		'no_kk' => $row->no_kk,
		'nama_lengkap' => $row->nama_lengkap,
		'kecamatan' => $row->kecamatan,
		'desalurah' => $row->desalurah,
		'alamat' => $row->alamat,
		'jenis_pengurusan' => $row->jenis_pengurusan,
		'tgl_input_resepsionis' => $row->tgl_input_resepsionis,
		'tgl_edit_operator' => $row->tgl_edit_operator,
		'tgl_edit_registercetak' => $row->tgl_edit_registercetak,
		'nomor_antrian' => $row->nomor_antrian,
		'nama_pengurus' => $row->nama_pengurus,
		'status_hub_pengurus' => $row->status_hub_pengurus,
		'status_berkas' => $row->status_berkas,
		'nomor_kontak_pengunjung' => $row->nomor_kontak_pengunjung,
		'nama_pengambil_dokumen' => $row->nama_pengambil_dokumen,
		'tgl_pengambilan' => $row->tgl_pengambilan,
		'user_resepsionis' => $row->user_resepsionis,
		'user_operator' => $row->user_operator,
		'user_cetak' => $row->user_cetak,
		'user_pengambilan' => $row->user_pengambilan,
		'keterangan' => $row->keterangan,
	    );
        $data['title'] = 'Datapengunjung';
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
            'button' => 'Create',
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
        $data['title'] = 'Datapengunjung';
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
		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
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
	    );$this->Datapengunjung_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('datapengunjung'));}
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
            $data['title'] = 'Datapengunjung';
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
		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
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
	$this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
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

}

/* End of file Datapengunjung.php */
/* Location: ./application/controllers/Datapengunjung.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-13 01:01:54 */
/* http://harviacode.com */