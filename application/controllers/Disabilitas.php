<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Disabilitas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Disabilitas_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Disabilitas';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Disabilitas' => '',
        ];
        $data['code_js'] = 'disabilitas/codejs';
        $data['page'] = 'disabilitas/Disabilitas_list';
        $this->load->view('template/backend', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Disabilitas_model->json();
    }

    public function read($id) 
    {
        $row = $this->Disabilitas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_disabilitas' => $row->id_disabilitas,
		'disabilitas' => $row->disabilitas,
	    );
        $data['title'] = 'Disabilitas';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'disabilitas/Disabilitas_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('disabilitas'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('disabilitas/create_action'),
	    'id_disabilitas' => set_value('id_disabilitas'),
	    'disabilitas' => set_value('disabilitas'),
	);
        $data['title'] = 'Disabilitas';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'disabilitas/Disabilitas_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_disabilitas' => $this->input->post('id_disabilitas',TRUE),
		'disabilitas' => $this->input->post('disabilitas',TRUE),
	    );
if(! $this->Disabilitas_model->is_exist($this->input->post('id_disabilitas'))){
                $this->Disabilitas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('disabilitas'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id_disabilitas is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Disabilitas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('disabilitas/update_action'),
		'id_disabilitas' => set_value('id_disabilitas', $row->id_disabilitas),
		'disabilitas' => set_value('disabilitas', $row->disabilitas),
	    );
            $data['title'] = 'Disabilitas';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'disabilitas/Disabilitas_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('disabilitas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_disabilitas', TRUE));
        } else {
            $data = array(
		'id_disabilitas' => $this->input->post('id_disabilitas',TRUE),
		'disabilitas' => $this->input->post('disabilitas',TRUE),
	    );

            $this->Disabilitas_model->update($this->input->post('id_disabilitas', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('disabilitas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Disabilitas_model->get_by_id($id);

        if ($row) {
            $this->Disabilitas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('disabilitas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('disabilitas'));
        }
    }

    public function deletebulk(){
        $delete = $this->Disabilitas_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('id_disabilitas', 'id disabilitas', 'trim|required');
	$this->form_validation->set_rules('disabilitas', 'disabilitas', 'trim|required');

	$this->form_validation->set_rules('id_disabilitas', 'id_disabilitas', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Disabilitas.php */
/* Location: ./application/controllers/Disabilitas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-16 10:40:22 */
/* http://harviacode.com */