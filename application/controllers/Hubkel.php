<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hubkel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Hubkel_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Hubkel';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Hubkel' => '',
        ];
        $data['code_js'] = 'hubkel/codejs';
        $data['page'] = 'hubkel/Hubkel_list';
        $this->load->view('template/backend', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Hubkel_model->json();
    }

    public function read($id) 
    {
        $row = $this->Hubkel_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_hubkel' => $row->id_hubkel,
		'hubkeluarga' => $row->hubkeluarga,
	    );
        $data['title'] = 'Hubkel';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'hubkel/Hubkel_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hubkel'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('hubkel/create_action'),
	    'id_hubkel' => set_value('id_hubkel'),
	    'hubkeluarga' => set_value('hubkeluarga'),
	);
        $data['title'] = 'Hubkel';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'hubkel/Hubkel_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_hubkel' => $this->input->post('id_hubkel',TRUE),
		'hubkeluarga' => $this->input->post('hubkeluarga',TRUE),
	    );
if(! $this->Hubkel_model->is_exist($this->input->post('id_hubkel'))){
                $this->Hubkel_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('hubkel'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id_hubkel is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Hubkel_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('hubkel/update_action'),
		'id_hubkel' => set_value('id_hubkel', $row->id_hubkel),
		'hubkeluarga' => set_value('hubkeluarga', $row->hubkeluarga),
	    );
            $data['title'] = 'Hubkel';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'hubkel/Hubkel_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hubkel'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_hubkel', TRUE));
        } else {
            $data = array(
		'id_hubkel' => $this->input->post('id_hubkel',TRUE),
		'hubkeluarga' => $this->input->post('hubkeluarga',TRUE),
	    );

            $this->Hubkel_model->update($this->input->post('id_hubkel', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('hubkel'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Hubkel_model->get_by_id($id);

        if ($row) {
            $this->Hubkel_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('hubkel'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hubkel'));
        }
    }

    public function deletebulk(){
        $delete = $this->Hubkel_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('id_hubkel', 'id hubkel', 'trim|required');
	$this->form_validation->set_rules('hubkeluarga', 'hubkeluarga', 'trim|required');

	$this->form_validation->set_rules('id_hubkel', 'id_hubkel', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Hubkel.php */
/* Location: ./application/controllers/Hubkel.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-16 10:53:35 */
/* http://harviacode.com */