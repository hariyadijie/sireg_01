<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_pengurusan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Jenis_pengurusan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Jenis Pengurusan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Jenis Pengurusan' => '',
        ];
        $data['code_js'] = 'jenis_pengurusan/codejs';
        $data['page'] = 'jenis_pengurusan/Jenis_pengurusan_list';
        $this->load->view('template/backend', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Jenis_pengurusan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Jenis_pengurusan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_jenispengurusan' => $row->id_jenispengurusan,
		'jenis_pengurusan' => $row->jenis_pengurusan,
	    );
        $data['title'] = 'Jenis Pengurusan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'jenis_pengurusan/Jenis_pengurusan_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_pengurusan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenis_pengurusan/create_action'),
	    'id_jenispengurusan' => set_value('id_jenispengurusan'),
	    'jenis_pengurusan' => set_value('jenis_pengurusan'),
	);
        $data['title'] = 'Jenis Pengurusan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'jenis_pengurusan/Jenis_pengurusan_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_jenispengurusan' => $this->input->post('id_jenispengurusan',TRUE),
		'jenis_pengurusan' => $this->input->post('jenis_pengurusan',TRUE),
	    );
if(! $this->Jenis_pengurusan_model->is_exist($this->input->post('id_jenispengurusan'))){
                $this->Jenis_pengurusan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_pengurusan'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id_jenispengurusan is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Jenis_pengurusan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenis_pengurusan/update_action'),
		'id_jenispengurusan' => set_value('id_jenispengurusan', $row->id_jenispengurusan),
		'jenis_pengurusan' => set_value('jenis_pengurusan', $row->jenis_pengurusan),
	    );
            $data['title'] = 'Jenis Pengurusan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'jenis_pengurusan/Jenis_pengurusan_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_pengurusan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenispengurusan', TRUE));
        } else {
            $data = array(
		'id_jenispengurusan' => $this->input->post('id_jenispengurusan',TRUE),
		'jenis_pengurusan' => $this->input->post('jenis_pengurusan',TRUE),
	    );

            $this->Jenis_pengurusan_model->update($this->input->post('id_jenispengurusan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_pengurusan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenis_pengurusan_model->get_by_id($id);

        if ($row) {
            $this->Jenis_pengurusan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_pengurusan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_pengurusan'));
        }
    }

    public function deletebulk(){
        $delete = $this->Jenis_pengurusan_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('id_jenispengurusan', 'id jenispengurusan', 'trim|required');
	$this->form_validation->set_rules('jenis_pengurusan', 'jenis pengurusan', 'trim|required');

	$this->form_validation->set_rules('id_jenispengurusan', 'id_jenispengurusan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jenis_pengurusan.php */
/* Location: ./application/controllers/Jenis_pengurusan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-12 01:27:17 */
/* http://harviacode.com */