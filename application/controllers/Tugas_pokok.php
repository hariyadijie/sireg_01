<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tugas_pokok extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Tugas_pokok_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Tugas Pokok';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Tugas Pokok' => '',
        ];
        $data['code_js'] = 'tugas_pokok/codejs';
        $data['page'] = 'tugas_pokok/Tugas_pokok_list';
        $this->load->view('template/backend', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tugas_pokok_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tugas_pokok_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_tugaspokok' => $row->id_tugaspokok,
		'tugas_pokok' => $row->tugas_pokok,
	    );
        $data['title'] = 'Tugas Pokok';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'tugas_pokok/Tugas_pokok_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tugas_pokok'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tugas_pokok/create_action'),
	    'id_tugaspokok' => set_value('id_tugaspokok'),
	    'tugas_pokok' => set_value('tugas_pokok'),
	);
        $data['title'] = 'Tugas Pokok';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'tugas_pokok/Tugas_pokok_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_tugaspokok' => $this->input->post('id_tugaspokok',TRUE),
		'tugas_pokok' => $this->input->post('tugas_pokok',TRUE),
	    );
if(! $this->Tugas_pokok_model->is_exist($this->input->post('id_tugaspokok'))){
                $this->Tugas_pokok_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tugas_pokok'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id_tugaspokok is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Tugas_pokok_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tugas_pokok/update_action'),
		'id_tugaspokok' => set_value('id_tugaspokok', $row->id_tugaspokok),
		'tugas_pokok' => set_value('tugas_pokok', $row->tugas_pokok),
	    );
            $data['title'] = 'Tugas Pokok';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'tugas_pokok/Tugas_pokok_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tugas_pokok'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tugaspokok', TRUE));
        } else {
            $data = array(
		'id_tugaspokok' => $this->input->post('id_tugaspokok',TRUE),
		'tugas_pokok' => $this->input->post('tugas_pokok',TRUE),
	    );

            $this->Tugas_pokok_model->update($this->input->post('id_tugaspokok', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tugas_pokok'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tugas_pokok_model->get_by_id($id);

        if ($row) {
            $this->Tugas_pokok_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tugas_pokok'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tugas_pokok'));
        }
    }

    public function deletebulk(){
        $delete = $this->Tugas_pokok_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('id_tugaspokok', 'id tugaspokok', 'trim|required');
	$this->form_validation->set_rules('tugas_pokok', 'tugas pokok', 'trim|required');

	$this->form_validation->set_rules('id_tugaspokok', 'id_tugaspokok', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tugas_pokok.php */
/* Location: ./application/controllers/Tugas_pokok.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-17 01:14:27 */
/* http://harviacode.com */