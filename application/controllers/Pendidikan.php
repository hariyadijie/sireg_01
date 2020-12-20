<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pendidikan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Pendidikan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Pendidikan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Pendidikan' => '',
        ];
        $data['code_js'] = 'pendidikan/codejs';
        $data['page'] = 'pendidikan/Pendidikan_list';
        $this->load->view('template/backend', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Pendidikan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Pendidikan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pendidikan' => $row->id_pendidikan,
		'pendidikan' => $row->pendidikan,
	    );
        $data['title'] = 'Pendidikan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'pendidikan/Pendidikan_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pendidikan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pendidikan/create_action'),
	    'id_pendidikan' => set_value('id_pendidikan'),
	    'pendidikan' => set_value('pendidikan'),
	);
        $data['title'] = 'Pendidikan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'pendidikan/Pendidikan_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_pendidikan' => $this->input->post('id_pendidikan',TRUE),
		'pendidikan' => $this->input->post('pendidikan',TRUE),
	    );
if(! $this->Pendidikan_model->is_exist($this->input->post('id_pendidikan'))){
                $this->Pendidikan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pendidikan'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id_pendidikan is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Pendidikan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pendidikan/update_action'),
		'id_pendidikan' => set_value('id_pendidikan', $row->id_pendidikan),
		'pendidikan' => set_value('pendidikan', $row->pendidikan),
	    );
            $data['title'] = 'Pendidikan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'pendidikan/Pendidikan_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pendidikan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pendidikan', TRUE));
        } else {
            $data = array(
		'id_pendidikan' => $this->input->post('id_pendidikan',TRUE),
		'pendidikan' => $this->input->post('pendidikan',TRUE),
	    );

            $this->Pendidikan_model->update($this->input->post('id_pendidikan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pendidikan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pendidikan_model->get_by_id($id);

        if ($row) {
            $this->Pendidikan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pendidikan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pendidikan'));
        }
    }

    public function deletebulk(){
        $delete = $this->Pendidikan_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('id_pendidikan', 'id pendidikan', 'trim|required');
	$this->form_validation->set_rules('pendidikan', 'pendidikan', 'trim|required');

	$this->form_validation->set_rules('id_pendidikan', 'id_pendidikan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pendidikan.php */
/* Location: ./application/controllers/Pendidikan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-16 10:48:16 */
/* http://harviacode.com */