<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Desalurah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Desalurah_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        
        $data['title'] = 'Desa/lurah';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Desalurah' => '',
        ];
        $data['kecamatan'] = $this->Desalurah_model->get_data('kecamatan')->result();
        $data['code_js'] = 'desalurah/codejs';
        $data['page'] = 'desalurah/Desalurah_list';
        $this->load->view('template/backend', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Desalurah_model->json();
    }

    public function read($id) 
    {
        $row = $this->Desalurah_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_desalurah' => $row->id_desalurah,
		'nama_desalurah' => $row->nama_desalurah,
		'id_kecamatan' => $row->id_kecamatan,
	    );
        $data['title'] = 'Desalurah';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'desalurah/Desalurah_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('desalurah'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Input',
            'action' => site_url('desalurah/create_action'),
            'id_desalurah' => set_value('id_desalurah'),
            'nama_desalurah' => set_value('nama_desalurah'),
            'id_kecamatan' => set_value('id_kecamatan'),
	);
        $data['title'] = 'Desa/lurah';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];
        $data['kecamatan'] = $this->Desalurah_model->get_data('kecamatan')->result();
        $data['page'] = 'desalurah/Desalurah_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_desalurah' => $this->input->post('id_desalurah',TRUE),
		'nama_desalurah' => $this->input->post('nama_desalurah',TRUE),
		'id_kecamatan' => $this->input->post('id_kecamatan',TRUE),
	    );
if(! $this->Desalurah_model->is_exist($this->input->post('id_desalurah'))){
                $this->Desalurah_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('desalurah'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id_desalurah is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Desalurah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('desalurah/update_action'),
		'id_desalurah' => set_value('id_desalurah', $row->id_desalurah),
		'nama_desalurah' => set_value('nama_desalurah', $row->nama_desalurah),
		'id_kecamatan' => set_value('id_kecamatan', $row->id_kecamatan),
	    );
            $data['title'] = 'Desalurah';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'desalurah/Desalurah_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('desalurah'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_desalurah', TRUE));
        } else {
            $data = array(
		'id_desalurah' => $this->input->post('id_desalurah',TRUE),
		'nama_desalurah' => $this->input->post('nama_desalurah',TRUE),
		'id_kecamatan' => $this->input->post('id_kecamatan',TRUE),
	    );

            $this->Desalurah_model->update($this->input->post('id_desalurah', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('desalurah'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Desalurah_model->get_by_id($id);

        if ($row) {
            $this->Desalurah_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('desalurah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('desalurah'));
        }
    }

    public function deletebulk(){
        $delete = $this->Desalurah_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('id_desalurah', 'id desalurah', 'trim|required');
	$this->form_validation->set_rules('nama_desalurah', 'nama desalurah', 'trim|required');
	$this->form_validation->set_rules('id_kecamatan', 'id kecamatan', 'trim|required');

	$this->form_validation->set_rules('id_desalurah', 'id_desalurah', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Desalurah.php */
/* Location: ./application/controllers/Desalurah.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-12 01:42:04 */
/* http://harviacode.com */