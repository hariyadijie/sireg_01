<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Alasancetak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Alasancetak_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Alasan Cetak';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Alasancetak' => '',
        ];
        $data['code_js'] = 'alasancetak/codejs';
        $data['page'] = 'alasancetak/Alasancetak_list';
        $this->load->view('template/backend', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Alasancetak_model->json();
    }

    public function read($id) 
    {
        $row = $this->Alasancetak_model->get_by_id($id);
        if ($row) {
            $data = array(
            'id_alasancetak' => $row->id_alasancetak,
            'alasancetak' => $row->alasancetak,
            );
        $data['title'] = 'Alasan Cetak';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'alasancetak/Alasancetak_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('alasancetak'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Input',
            'action' => site_url('alasancetak/create_action'),
	    'id_alasancetak' => set_value('id_alasancetak'),
	    'alasancetak' => set_value('alasancetak'),
	);
        $data['title'] = 'Alasan Cetak';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'alasancetak/Alasancetak_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
            'id_alasancetak' => $this->input->post('id_alasancetak',TRUE),
            'alasancetak' => $this->input->post('alasancetak',TRUE),
            );
            if(! $this->Alasancetak_model->is_exist($this->input->post('id_alasancetak'))){
                $this->Alasancetak_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('alasancetak'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id_alasancetak is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Alasancetak_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('alasancetak/update_action'),
            'id_alasancetak' => set_value('id_alasancetak', $row->id_alasancetak),
            'alasancetak' => set_value('alasancetak', $row->alasancetak),
            );
            $data['title'] = 'Alasan Cetak';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'alasancetak/Alasancetak_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('alasancetak'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_alasancetak', TRUE));
        } else {
            $data = array(
            'id_alasancetak' => $this->input->post('id_alasancetak',TRUE),
            'alasancetak' => $this->input->post('alasancetak',TRUE),
            );
            $this->Alasancetak_model->update($this->input->post('id_alasancetak', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('alasancetak'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Alasancetak_model->get_by_id($id);

        if ($row) {
            $this->Alasancetak_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('alasancetak'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('alasancetak'));
        }
    }

    public function deletebulk(){
        $delete = $this->Alasancetak_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_alasancetak', 'id alasancetak', 'trim|required');
	$this->form_validation->set_rules('alasancetak', 'alasancetak', 'trim|required');

	$this->form_validation->set_rules('id_alasancetak', 'id_alasancetak', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Alasancetak.php */
/* Location: ./application/controllers/Alasancetak.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-12 00:48:30 */
/* http://harviacode.com */