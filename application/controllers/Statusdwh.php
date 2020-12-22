<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Statusdwh extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Statusdwh_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Statusdwh';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Statusdwh' => '',
        ];
        $data['code_js'] = 'statusdwh/codejs';
        $data['page'] = 'statusdwh/Statusdwh_list';
        $this->load->view('template/backend', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Statusdwh_model->json();
    }

    public function read($id) 
    {
        $row = $this->Statusdwh_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_statusdwh' => $row->id_statusdwh,
		'status_dwh' => $row->status_dwh,
	    );
        $data['title'] = 'Statusdwh';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'statusdwh/Statusdwh_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('statusdwh'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('statusdwh/create_action'),
	    'id_statusdwh' => set_value('id_statusdwh'),
	    'status_dwh' => set_value('status_dwh'),
	);
        $data['title'] = 'Statusdwh';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'statusdwh/Statusdwh_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'status_dwh' => $this->input->post('status_dwh',TRUE),
	    );$this->Statusdwh_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('statusdwh'));}
    }
    
    public function update($id) 
    {
        $row = $this->Statusdwh_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('statusdwh/update_action'),
		'id_statusdwh' => set_value('id_statusdwh', $row->id_statusdwh),
		'status_dwh' => set_value('status_dwh', $row->status_dwh),
	    );
            $data['title'] = 'Statusdwh';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'statusdwh/Statusdwh_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('statusdwh'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_statusdwh', TRUE));
        } else {
            $data = array(
		'status_dwh' => $this->input->post('status_dwh',TRUE),
	    );

            $this->Statusdwh_model->update($this->input->post('id_statusdwh', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('statusdwh'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Statusdwh_model->get_by_id($id);

        if ($row) {
            $this->Statusdwh_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('statusdwh'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('statusdwh'));
        }
    }

    public function deletebulk(){
        $delete = $this->Statusdwh_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('status_dwh', 'status dwh', 'trim|required');

	$this->form_validation->set_rules('id_statusdwh', 'id_statusdwh', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Statusdwh.php */
/* Location: ./application/controllers/Statusdwh.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-21 01:08:47 */
/* http://harviacode.com */