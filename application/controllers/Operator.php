<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Operator extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Operator_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Operator';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Operator' => '',
        ];
        $data['code_js'] = 'operator/codejs';
        $data['page'] = 'operator/Operator_list';
        $this->load->view('template/backend', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Operator_model->json();
    }

    public function read($id) 
    {
        $row = $this->Operator_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_operator' => $row->id_operator,
		'nik' => $row->nik,
		'nama' => $row->nama,
		'no_kontak' => $row->no_kontak,
		'email' => $row->email,
		'tugas_pokok' => $row->tugas_pokok,
		'image' => $row->image,
	    );
        $data['title'] = 'Operator';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'operator/Operator_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('operator'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('operator/create_action'),
	    'id_operator' => set_value('id_operator'),
	    'nik' => set_value('nik'),
	    'nama' => set_value('nama'),
	    'no_kontak' => set_value('no_kontak'),
	    'email' => set_value('email'),
	    'tugas_pokok' => set_value('tugas_pokok'),
	    'image' => set_value('image'),
	);
        $data['title'] = 'Operator';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'operator/Operator_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_operator' => $this->input->post('id_operator',TRUE),
		'nik' => $this->input->post('nik',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'no_kontak' => $this->input->post('no_kontak',TRUE),
		'email' => $this->input->post('email',TRUE),
		'tugas_pokok' => $this->input->post('tugas_pokok',TRUE),
		'image' => $this->input->post('image',TRUE),
	    );
if(! $this->Operator_model->is_exist($this->input->post('id_operator'))){
                $this->Operator_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('operator'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id_operator is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Operator_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('operator/update_action'),
		'id_operator' => set_value('id_operator', $row->id_operator),
		'nik' => set_value('nik', $row->nik),
		'nama' => set_value('nama', $row->nama),
		'no_kontak' => set_value('no_kontak', $row->no_kontak),
		'email' => set_value('email', $row->email),
		'tugas_pokok' => set_value('tugas_pokok', $row->tugas_pokok),
		'image' => set_value('image', $row->image),
	    );
            $data['title'] = 'Operator';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'operator/Operator_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('operator'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_operator', TRUE));
        } else {
            $data = array(
		'id_operator' => $this->input->post('id_operator',TRUE),
		'nik' => $this->input->post('nik',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'no_kontak' => $this->input->post('no_kontak',TRUE),
		'email' => $this->input->post('email',TRUE),
		'tugas_pokok' => $this->input->post('tugas_pokok',TRUE),
		'image' => $this->input->post('image',TRUE),
	    );

            $this->Operator_model->update($this->input->post('id_operator', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('operator'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Operator_model->get_by_id($id);

        if ($row) {
            $this->Operator_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('operator'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('operator'));
        }
    }

    public function deletebulk(){
        $delete = $this->Operator_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('id_operator', 'id operator', 'trim|required');
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('no_kontak', 'no kontak', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('tugas_pokok', 'tugas pokok', 'trim|required');
	$this->form_validation->set_rules('image', 'image', 'trim|required');

	$this->form_validation->set_rules('id_operator', 'id_operator', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Operator.php */
/* Location: ./application/controllers/Operator.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-17 01:28:44 */
/* http://harviacode.com */