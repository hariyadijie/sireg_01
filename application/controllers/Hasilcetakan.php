<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hasilcetakan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Hasilcetakan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Hasilcetakan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Hasilcetakan' => '',
        ];
        $data['code_js'] = 'hasilcetakan/codejs';
        $data['page'] = 'hasilcetakan/Hasilcetakan_list';
        $this->load->view('template/backend', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Hasilcetakan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Hasilcetakan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_hasilcetak' => $row->id_hasilcetak,
		'hasilcetak' => $row->hasilcetak,
	    );
        $data['title'] = 'Hasilcetakan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'hasilcetakan/Hasilcetakan_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hasilcetakan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('hasilcetakan/create_action'),
	    'id_hasilcetak' => set_value('id_hasilcetak'),
	    'hasilcetak' => set_value('hasilcetak'),
	);
        $data['title'] = 'Hasilcetakan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'hasilcetakan/Hasilcetakan_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_hasilcetak' => $this->input->post('id_hasilcetak',TRUE),
		'hasilcetak' => $this->input->post('hasilcetak',TRUE),
	    );
if(! $this->Hasilcetakan_model->is_exist($this->input->post('id_hasilcetak'))){
                $this->Hasilcetakan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('hasilcetakan'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id_hasilcetak is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Hasilcetakan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('hasilcetakan/update_action'),
		'id_hasilcetak' => set_value('id_hasilcetak', $row->id_hasilcetak),
		'hasilcetak' => set_value('hasilcetak', $row->hasilcetak),
	    );
            $data['title'] = 'Hasilcetakan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'hasilcetakan/Hasilcetakan_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hasilcetakan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_hasilcetak', TRUE));
        } else {
            $data = array(
		'id_hasilcetak' => $this->input->post('id_hasilcetak',TRUE),
		'hasilcetak' => $this->input->post('hasilcetak',TRUE),
	    );

            $this->Hasilcetakan_model->update($this->input->post('id_hasilcetak', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('hasilcetakan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Hasilcetakan_model->get_by_id($id);

        if ($row) {
            $this->Hasilcetakan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('hasilcetakan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hasilcetakan'));
        }
    }

    public function deletebulk(){
        $delete = $this->Hasilcetakan_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('id_hasilcetak', 'id hasilcetak', 'trim|required');
	$this->form_validation->set_rules('hasilcetak', 'hasilcetak', 'trim|required');

	$this->form_validation->set_rules('id_hasilcetak', 'id_hasilcetak', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Hasilcetakan.php */
/* Location: ./application/controllers/Hasilcetakan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-12 01:23:45 */
/* http://harviacode.com */