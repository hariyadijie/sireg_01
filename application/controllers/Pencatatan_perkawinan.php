<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pencatatan_perkawinan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Pencatatan_perkawinan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Pencatatan Perkawinan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Pencatatan Perkawinan' => '',
        ];
        $data['code_js'] = 'pencatatan_perkawinan/codejs';
        $data['page'] = 'pencatatan_perkawinan/Pencatatan_perkawinan_list';
        $this->load->view('template/backend', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Pencatatan_perkawinan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Pencatatan_perkawinan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pencatatanperkawinan' => $row->id_pencatatanperkawinan,
		'pencatatan_perkawinan' => $row->pencatatan_perkawinan,
	    );
        $data['title'] = 'Pencatatan Perkawinan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'pencatatan_perkawinan/Pencatatan_perkawinan_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pencatatan_perkawinan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pencatatan_perkawinan/create_action'),
	    'id_pencatatanperkawinan' => set_value('id_pencatatanperkawinan'),
	    'pencatatan_perkawinan' => set_value('pencatatan_perkawinan'),
	);
        $data['title'] = 'Pencatatan Perkawinan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'pencatatan_perkawinan/Pencatatan_perkawinan_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_pencatatanperkawinan' => $this->input->post('id_pencatatanperkawinan',TRUE),
		'pencatatan_perkawinan' => $this->input->post('pencatatan_perkawinan',TRUE),
	    );
if(! $this->Pencatatan_perkawinan_model->is_exist($this->input->post('id_pencatatanperkawinan'))){
                $this->Pencatatan_perkawinan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pencatatan_perkawinan'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id_pencatatanperkawinan is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Pencatatan_perkawinan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pencatatan_perkawinan/update_action'),
		'id_pencatatanperkawinan' => set_value('id_pencatatanperkawinan', $row->id_pencatatanperkawinan),
		'pencatatan_perkawinan' => set_value('pencatatan_perkawinan', $row->pencatatan_perkawinan),
	    );
            $data['title'] = 'Pencatatan Perkawinan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'pencatatan_perkawinan/Pencatatan_perkawinan_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pencatatan_perkawinan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pencatatanperkawinan', TRUE));
        } else {
            $data = array(
		'id_pencatatanperkawinan' => $this->input->post('id_pencatatanperkawinan',TRUE),
		'pencatatan_perkawinan' => $this->input->post('pencatatan_perkawinan',TRUE),
	    );

            $this->Pencatatan_perkawinan_model->update($this->input->post('id_pencatatanperkawinan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pencatatan_perkawinan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pencatatan_perkawinan_model->get_by_id($id);

        if ($row) {
            $this->Pencatatan_perkawinan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pencatatan_perkawinan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pencatatan_perkawinan'));
        }
    }

    public function deletebulk(){
        $delete = $this->Pencatatan_perkawinan_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('id_pencatatanperkawinan', 'id pencatatanperkawinan', 'trim|required');
	$this->form_validation->set_rules('pencatatan_perkawinan', 'pencatatan perkawinan', 'trim|required');

	$this->form_validation->set_rules('id_pencatatanperkawinan', 'id_pencatatanperkawinan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pencatatan_perkawinan.php */
/* Location: ./application/controllers/Pencatatan_perkawinan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-25 04:38:33 */
/* http://harviacode.com */