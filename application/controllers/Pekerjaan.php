<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pekerjaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Pekerjaan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Pekerjaan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Pekerjaan' => '',
        ];
        $data['code_js'] = 'pekerjaan/codejs';
        $data['page'] = 'pekerjaan/Pekerjaan_list';
        $this->load->view('template/backend', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Pekerjaan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Pekerjaan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pekerjaan' => $row->id_pekerjaan,
		'pekerjaan' => $row->pekerjaan,
	    );
        $data['title'] = 'Pekerjaan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'pekerjaan/Pekerjaan_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pekerjaan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pekerjaan/create_action'),
	    'id_pekerjaan' => set_value('id_pekerjaan'),
	    'pekerjaan' => set_value('pekerjaan'),
	);
        $data['title'] = 'Pekerjaan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'pekerjaan/Pekerjaan_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_pekerjaan' => $this->input->post('id_pekerjaan',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
	    );
if(! $this->Pekerjaan_model->is_exist($this->input->post('id_pekerjaan'))){
                $this->Pekerjaan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pekerjaan'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id_pekerjaan is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Pekerjaan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pekerjaan/update_action'),
		'id_pekerjaan' => set_value('id_pekerjaan', $row->id_pekerjaan),
		'pekerjaan' => set_value('pekerjaan', $row->pekerjaan),
	    );
            $data['title'] = 'Pekerjaan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'pekerjaan/Pekerjaan_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pekerjaan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pekerjaan', TRUE));
        } else {
            $data = array(
		'id_pekerjaan' => $this->input->post('id_pekerjaan',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
	    );

            $this->Pekerjaan_model->update($this->input->post('id_pekerjaan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pekerjaan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pekerjaan_model->get_by_id($id);

        if ($row) {
            $this->Pekerjaan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pekerjaan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pekerjaan'));
        }
    }

    public function deletebulk(){
        $delete = $this->Pekerjaan_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('id_pekerjaan', 'id pekerjaan', 'trim|required');
	$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');

	$this->form_validation->set_rules('id_pekerjaan', 'id_pekerjaan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pekerjaan.php */
/* Location: ./application/controllers/Pekerjaan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-16 10:46:57 */
/* http://harviacode.com */