<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kecamatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Kecamatan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Kecamatan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Kecamatan' => '',
        ];
        $data['code_js'] = 'kecamatan/codejs';
        $data['page'] = 'kecamatan/Kecamatan_list';
        $this->load->view('template/backend', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Kecamatan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Kecamatan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kec' => $row->id_kec,
		'nama_kecamatan' => $row->nama_kecamatan,
	    );
        $data['title'] = 'Kecamatan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'kecamatan/Kecamatan_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kecamatan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kecamatan/create_action'),
	    'id_kec' => set_value('id_kec'),
	    'nama_kecamatan' => set_value('nama_kecamatan'),
	);
        $data['title'] = 'Kecamatan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'kecamatan/Kecamatan_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_kec' => $this->input->post('id_kec',TRUE),
		'nama_kecamatan' => $this->input->post('nama_kecamatan',TRUE),
	    );
if(! $this->Kecamatan_model->is_exist($this->input->post('id_kec'))){
                $this->Kecamatan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kecamatan'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id_kec is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Kecamatan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kecamatan/update_action'),
		'id_kec' => set_value('id_kec', $row->id_kec),
		'nama_kecamatan' => set_value('nama_kecamatan', $row->nama_kecamatan),
	    );
            $data['title'] = 'Kecamatan';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'kecamatan/Kecamatan_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kecamatan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kec', TRUE));
        } else {
            $data = array(
		'id_kec' => $this->input->post('id_kec',TRUE),
		'nama_kecamatan' => $this->input->post('nama_kecamatan',TRUE),
	    );

            $this->Kecamatan_model->update($this->input->post('id_kec', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kecamatan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kecamatan_model->get_by_id($id);

        if ($row) {
            $this->Kecamatan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kecamatan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kecamatan'));
        }
    }

    public function deletebulk(){
        $delete = $this->Kecamatan_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('id_kec', 'id kec', 'trim|required');
	$this->form_validation->set_rules('nama_kecamatan', 'nama kecamatan', 'trim|required');

	$this->form_validation->set_rules('id_kec', 'id_kec', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kecamatan.php */
/* Location: ./application/controllers/Kecamatan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-12 01:21:55 */
/* http://harviacode.com */