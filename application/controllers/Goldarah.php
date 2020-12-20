<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Goldarah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Goldarah_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Goldarah';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Goldarah' => '',
        ];
        $data['code_js'] = 'goldarah/codejs';
        $data['page'] = 'goldarah/Goldarah_list';
        $this->load->view('template/backend', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Goldarah_model->json();
    }

    public function read($id) 
    {
        $row = $this->Goldarah_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_golongandarah' => $row->id_golongandarah,
		'golongan_darah' => $row->golongan_darah,
	    );
        $data['title'] = 'Goldarah';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'goldarah/Goldarah_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('goldarah'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('goldarah/create_action'),
	    'id_golongandarah' => set_value('id_golongandarah'),
	    'golongan_darah' => set_value('golongan_darah'),
	);
        $data['title'] = 'Goldarah';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'goldarah/Goldarah_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_golongandarah' => $this->input->post('id_golongandarah',TRUE),
		'golongan_darah' => $this->input->post('golongan_darah',TRUE),
	    );
if(! $this->Goldarah_model->is_exist($this->input->post('id_golongandarah'))){
                $this->Goldarah_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('goldarah'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id_golongandarah is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Goldarah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('goldarah/update_action'),
		'id_golongandarah' => set_value('id_golongandarah', $row->id_golongandarah),
		'golongan_darah' => set_value('golongan_darah', $row->golongan_darah),
	    );
            $data['title'] = 'Goldarah';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'goldarah/Goldarah_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('goldarah'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_golongandarah', TRUE));
        } else {
            $data = array(
		'id_golongandarah' => $this->input->post('id_golongandarah',TRUE),
		'golongan_darah' => $this->input->post('golongan_darah',TRUE),
	    );

            $this->Goldarah_model->update($this->input->post('id_golongandarah', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('goldarah'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Goldarah_model->get_by_id($id);

        if ($row) {
            $this->Goldarah_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('goldarah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('goldarah'));
        }
    }

    public function deletebulk(){
        $delete = $this->Goldarah_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('id_golongandarah', 'id golongandarah', 'trim|required');
	$this->form_validation->set_rules('golongan_darah', 'golongan darah', 'trim|required');

	$this->form_validation->set_rules('id_golongandarah', 'id_golongandarah', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Goldarah.php */
/* Location: ./application/controllers/Goldarah.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-16 10:37:08 */
/* http://harviacode.com */