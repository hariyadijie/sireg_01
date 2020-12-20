<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Statushubpengurus extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Statushubpengurus_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Statushubpengurus';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Statushubpengurus' => '',
        ];
        $data['code_js'] = 'statushubpengurus/codejs';
        $data['page'] = 'statushubpengurus/Statushubpengurus_list';
        $this->load->view('template/backend', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Statushubpengurus_model->json();
    }

    public function read($id) 
    {
        $row = $this->Statushubpengurus_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_statushubpengurus' => $row->id_statushubpengurus,
		'status_hub_pengurus' => $row->status_hub_pengurus,
	    );
        $data['title'] = 'Statushubpengurus';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'statushubpengurus/Statushubpengurus_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('statushubpengurus'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('statushubpengurus/create_action'),
	    'id_statushubpengurus' => set_value('id_statushubpengurus'),
	    'status_hub_pengurus' => set_value('status_hub_pengurus'),
	);
        $data['title'] = 'Statushubpengurus';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'statushubpengurus/Statushubpengurus_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_statushubpengurus' => $this->input->post('id_statushubpengurus',TRUE),
		'status_hub_pengurus' => $this->input->post('status_hub_pengurus',TRUE),
	    );
if(! $this->Statushubpengurus_model->is_exist($this->input->post('id_statushubpengurus'))){
                $this->Statushubpengurus_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('statushubpengurus'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id_statushubpengurus is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Statushubpengurus_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('statushubpengurus/update_action'),
		'id_statushubpengurus' => set_value('id_statushubpengurus', $row->id_statushubpengurus),
		'status_hub_pengurus' => set_value('status_hub_pengurus', $row->status_hub_pengurus),
	    );
            $data['title'] = 'Statushubpengurus';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'statushubpengurus/Statushubpengurus_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('statushubpengurus'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_statushubpengurus', TRUE));
        } else {
            $data = array(
		'id_statushubpengurus' => $this->input->post('id_statushubpengurus',TRUE),
		'status_hub_pengurus' => $this->input->post('status_hub_pengurus',TRUE),
	    );

            $this->Statushubpengurus_model->update($this->input->post('id_statushubpengurus', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('statushubpengurus'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Statushubpengurus_model->get_by_id($id);

        if ($row) {
            $this->Statushubpengurus_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('statushubpengurus'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('statushubpengurus'));
        }
    }

    public function deletebulk(){
        $delete = $this->Statushubpengurus_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('id_statushubpengurus', 'id statushubpengurus', 'trim|required');
	$this->form_validation->set_rules('status_hub_pengurus', 'status hub pengurus', 'trim|required');

	$this->form_validation->set_rules('id_statushubpengurus', 'id_statushubpengurus', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Statushubpengurus.php */
/* Location: ./application/controllers/Statushubpengurus.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-14 04:58:09 */
/* http://harviacode.com */