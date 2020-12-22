<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hasilcetak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Hasilcetak_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Registrasi Hasil Cetak KTP Elektronik';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Hasilcetak' => '',
        ];
        $data['kecamatan'] = $this->Hasilcetak_model->get_data('kecamatan')->result();
        $data['code_js'] = 'hasilcetak/codejs';
        $data['page'] = 'hasilcetak/Hasilcetak_list';
        $this->load->view('template/backend', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Hasilcetak_model->json();
    }

    public function read($id) 
    {
        $row = $this->Hasilcetak_model->get_by_id($id);
        if ($row) {
            $data = array(
            'id_cetak' => $row->id_cetak,
            'nik' => $row->nik,
            'nama' => $row->nama,
            'kec' => $row->kec,
            'tgl_cetak' => $row->tgl_cetak,
            'hasil_cetak' => $row->hasil_cetak,
            'status_cetak' => $row->status_cetak,
            'jns_blanko' => $row->jns_blanko,
            'alasan_cetak' => $row->alasan_cetak,
            'hsl_blanko' => $row->hsl_blanko,
            'ket' => $row->ket,
            'catatan' => $row->catatan,
            );
        $data['title'] = 'Registrasi Hasil Cetak KTP Elektronik';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'hasilcetak/Hasilcetak_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hasilcetak'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Input',
            'action' => site_url('hasilcetak/create_action'),
            'id_cetak' => set_value('id_cetak'),
            'nik' => set_value('nik'),
            'nama' => set_value('nama'),
            'kec' => set_value('kec'),
            'tgl_cetak' => set_value('tgl_cetak'),
            'hasil_cetak' => set_value('hasil_cetak'),
            'status_cetak' => set_value('status_cetak'),
            'jns_blanko' => set_value('jns_blanko'),
            'alasan_cetak' => set_value('alasan_cetak'),
            'hsl_blanko' => set_value('hsl_blanko'),
            'ket' => set_value('ket'),
            'catatan' => set_value('catatan'),
        );
        $data['title'] = 'Registrasi Hasil Cetak KTP Elektronik';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['kecamatan'] = $this->Hasilcetak_model->get_data('kecamatan')->result();
        $data['hslcetak'] = $this->Hasilcetak_model->get_hslcetak('hasilcetakan')->result();
        $data['statuscetak'] = $this->Hasilcetak_model->get_statuscetak('satuscetak')->result();
        $data['jenisblanko'] = $this->Hasilcetak_model->get_jenisblanko('jenisblanko')->result();
        $data['alasancetak'] = $this->Hasilcetak_model->get_alasancetak('alasancetak')->result();
        $data['statushasilktp'] = $this->Hasilcetak_model->get_statushasilktp('statushasilktp')->result();
        $data['page'] = 'hasilcetak/Hasilcetak_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
            'id_cetak' => $this->input->post('id_cetak',TRUE),
            'nik' => $this->input->post('nik',TRUE),
            'nama' => $this->input->post('nama',TRUE),
            'kec' => $this->input->post('kec',TRUE),
            'tgl_cetak' => $this->input->post('tgl_cetak',TRUE),
            'hasil_cetak' => $this->input->post('hasil_cetak',TRUE),
            'status_cetak' => $this->input->post('status_cetak',TRUE),
            'jns_blanko' => $this->input->post('jns_blanko',TRUE),
            'alasan_cetak' => $this->input->post('alasan_cetak',TRUE),
            'hsl_blanko' => $this->input->post('hsl_blanko',TRUE),
            'ket' => $this->input->post('ket',TRUE),
            'catatan' => $this->input->post('catatan',TRUE),
            );
            if(! $this->Hasilcetak_model->is_exist($this->input->post('id_cetak'))){
                $this->Hasilcetak_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('hasilcetak'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id_cetak is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Hasilcetak_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button'        => 'Update',
                'action'        => site_url('hasilcetak/update_action'),
                'id_cetak'      => set_value('id_cetak', $row->id_cetak),
                'nik'           => set_value('nik', $row->nik),
                'nama'          => set_value('nama', $row->nama),
                'kec'           => set_value('kec', $row->kec),
                'tgl_cetak'     => set_value('tgl_cetak', $row->tgl_cetak),
                'hasil_cetak'   => set_value('hasil_cetak', $row->hasil_cetak),
                'status_cetak'  => set_value('status_cetak', $row->status_cetak),
                'jns_blanko'    => set_value('jns_blanko', $row->jns_blanko),
                'alasan_cetak'  => set_value('alasan_cetak', $row->alasan_cetak),
                'hsl_blanko'    => set_value('hsl_blanko', $row->hsl_blanko),
                'ket'           => set_value('ket', $row->ket),
                'catatan'       => set_value('catatan', $row->catatan),
                );
        $data['title'] = 'Registrasi Hasil Cetak KTP Elektronik';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['kecamatan'] = $this->Hasilcetak_model->get_data('kecamatan')->result();
        $data['hslcetak'] = $this->Hasilcetak_model->get_hslcetak('hasilcetakan')->result();
        $data['statuscetak'] = $this->Hasilcetak_model->get_statuscetak('satuscetak')->result();
        $data['jenisblanko'] = $this->Hasilcetak_model->get_jenisblanko('jenisblanko')->result();
        $data['alasancetak'] = $this->Hasilcetak_model->get_alasancetak('alasancetak')->result();
        $data['statushasilktp'] = $this->Hasilcetak_model->get_statushasilktp('statushasilktp')->result();
        $data['page'] = 'hasilcetak/Hasilcetak_update';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hasilcetak'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_cetak', TRUE));
        } else {
            $data = array(
            'id_cetak'      => $this->input->post('id_cetak',TRUE),
            'nik'           => $this->input->post('nik',TRUE),
            'nama'          => $this->input->post('nama',TRUE),
            'kec'           => $this->input->post('kec',TRUE),
            'tgl_cetak'     => $this->input->post('tgl_cetak',TRUE),
            'hasil_cetak'   => $this->input->post('hasil_cetak',TRUE),
            'status_cetak'  => $this->input->post('status_cetak',TRUE),
            'jns_blanko'    => $this->input->post('jns_blanko',TRUE),
            'alasan_cetak'  => $this->input->post('alasan_cetak',TRUE),
            'hsl_blanko'    => $this->input->post('hsl_blanko',TRUE),
            'ket'           => $this->input->post('ket',TRUE),
            'catatan'       => $this->input->post('catatan',TRUE),
            );

        $this->Hasilcetak_model->update($this->input->post('id_cetak', TRUE), $data);
        $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('hasilcetak'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Hasilcetak_model->get_by_id($id);

        if ($row) {
            $this->Hasilcetak_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('hasilcetak'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hasilcetak'));
        }
    }

    public function deletebulk(){
        $delete = $this->Hasilcetak_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('id_cetak', 'id cetak', 'trim|required');
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('kec', 'kec', 'trim|required');
	$this->form_validation->set_rules('tgl_cetak', 'tgl cetak', 'trim|required');
	$this->form_validation->set_rules('hasil_cetak', 'hasil cetak', 'trim|required');
	$this->form_validation->set_rules('status_cetak', 'status cetak', 'trim|required');
	$this->form_validation->set_rules('jns_blanko', 'jns blanko', 'trim|required');
	$this->form_validation->set_rules('alasan_cetak', 'alasan cetak', 'trim|required');
	$this->form_validation->set_rules('hsl_blanko', 'hsl blanko', 'trim|required');
	$this->form_validation->set_rules('ket', 'ket', 'trim|required');
	$this->form_validation->set_rules('catatan', 'catatan', 'trim');

	$this->form_validation->set_rules('id_cetak', 'id_cetak', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Hasilcetak.php */
/* Location: ./application/controllers/Hasilcetak.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-22 05:50:36 */
/* http://harviacode.com */