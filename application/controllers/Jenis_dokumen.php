<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_dokumen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Jenis_dokumen_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Jenis Dokumen';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Jenis Dokumen' => '',
        ];
        $data['code_js'] = 'jenis_dokumen/codejs';
        $data['page'] = 'jenis_dokumen/Jenis_dokumen_list';
        $this->load->view('template/backend', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Jenis_dokumen_model->json();
    }

    public function read($id) 
    {
        $row = $this->Jenis_dokumen_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_jenisdokumen' => $row->id_jenisdokumen,
		'jenisdokumen' => $row->jenisdokumen,
	    );
        $data['title'] = 'Jenis Dokumen';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'jenis_dokumen/Jenis_dokumen_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_dokumen'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenis_dokumen/create_action'),
	    'id_jenisdokumen' => set_value('id_jenisdokumen'),
	    'jenisdokumen' => set_value('jenisdokumen'),
	);
        $data['title'] = 'Jenis Dokumen';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'jenis_dokumen/Jenis_dokumen_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_jenisdokumen' => $this->input->post('id_jenisdokumen',TRUE),
		'jenisdokumen' => $this->input->post('jenisdokumen',TRUE),
	    );
if(! $this->Jenis_dokumen_model->is_exist($this->input->post('id_jenisdokumen'))){
                $this->Jenis_dokumen_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_dokumen'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id_jenisdokumen is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Jenis_dokumen_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenis_dokumen/update_action'),
		'id_jenisdokumen' => set_value('id_jenisdokumen', $row->id_jenisdokumen),
		'jenisdokumen' => set_value('jenisdokumen', $row->jenisdokumen),
	    );
            $data['title'] = 'Jenis Dokumen';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'jenis_dokumen/Jenis_dokumen_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_dokumen'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenisdokumen', TRUE));
        } else {
            $data = array(
		'id_jenisdokumen' => $this->input->post('id_jenisdokumen',TRUE),
		'jenisdokumen' => $this->input->post('jenisdokumen',TRUE),
	    );

            $this->Jenis_dokumen_model->update($this->input->post('id_jenisdokumen', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_dokumen'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenis_dokumen_model->get_by_id($id);

        if ($row) {
            $this->Jenis_dokumen_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_dokumen'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_dokumen'));
        }
    }

    public function deletebulk(){
        $delete = $this->Jenis_dokumen_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('id_jenisdokumen', 'id jenisdokumen', 'trim|required');
	$this->form_validation->set_rules('jenisdokumen', 'jenisdokumen', 'trim|required');

	$this->form_validation->set_rules('id_jenisdokumen', 'id_jenisdokumen', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jenis_dokumen.php */
/* Location: ./application/controllers/Jenis_dokumen.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-12 01:15:40 */
/* http://harviacode.com */