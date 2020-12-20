<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Agama extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Agama_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Agama';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Agama' => '',
        ];
        $data['code_js'] = 'agama/codejs';
        $data['page'] = 'agama/Agama_list';
        $this->load->view('template/backend', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Agama_model->json();
    }

    public function read($id) 
    {
        $row = $this->Agama_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_agama' => $row->id_agama,
		'agama' => $row->agama,
	    );
        $data['title'] = 'Agama';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'agama/Agama_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('agama'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('agama/create_action'),
	    'id_agama' => set_value('id_agama'),
	    'agama' => set_value('agama'),
	);
        $data['title'] = 'Agama';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'agama/Agama_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_agama' => $this->input->post('id_agama',TRUE),
		'agama' => $this->input->post('agama',TRUE),
	    );
if(! $this->Agama_model->is_exist($this->input->post('id_agama'))){
                $this->Agama_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('agama'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id_agama is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Agama_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('agama/update_action'),
		'id_agama' => set_value('id_agama', $row->id_agama),
		'agama' => set_value('agama', $row->agama),
	    );
            $data['title'] = 'Agama';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'agama/Agama_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('agama'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_agama', TRUE));
        } else {
            $data = array(
		'id_agama' => $this->input->post('id_agama',TRUE),
		'agama' => $this->input->post('agama',TRUE),
	    );

            $this->Agama_model->update($this->input->post('id_agama', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('agama'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Agama_model->get_by_id($id);

        if ($row) {
            $this->Agama_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('agama'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('agama'));
        }
    }

    public function deletebulk(){
        $delete = $this->Agama_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('id_agama', 'id agama', 'trim|required');
	$this->form_validation->set_rules('agama', 'agama', 'trim|required');

	$this->form_validation->set_rules('id_agama', 'id_agama', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Agama.php */
/* Location: ./application/controllers/Agama.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-16 10:30:22 */
/* http://harviacode.com */