<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Statuskawin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Statuskawin_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Statuskawin';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Statuskawin' => '',
        ];
        $data['code_js'] = 'statuskawin/codejs';
        $data['page'] = 'statuskawin/Statuskawin_list';
        $this->load->view('template/backend', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Statuskawin_model->json();
    }

    public function read($id) 
    {
        $row = $this->Statuskawin_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_statuskawin' => $row->id_statuskawin,
		'statuskawin' => $row->statuskawin,
	    );
        $data['title'] = 'Statuskawin';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'statuskawin/Statuskawin_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('statuskawin'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('statuskawin/create_action'),
	    'id_statuskawin' => set_value('id_statuskawin'),
	    'statuskawin' => set_value('statuskawin'),
	);
        $data['title'] = 'Statuskawin';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'statuskawin/Statuskawin_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_statuskawin' => $this->input->post('id_statuskawin',TRUE),
		'statuskawin' => $this->input->post('statuskawin',TRUE),
	    );
if(! $this->Statuskawin_model->is_exist($this->input->post('id_statuskawin'))){
                $this->Statuskawin_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('statuskawin'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Faild, id_statuskawin is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Statuskawin_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('statuskawin/update_action'),
		'id_statuskawin' => set_value('id_statuskawin', $row->id_statuskawin),
		'statuskawin' => set_value('statuskawin', $row->statuskawin),
	    );
            $data['title'] = 'Statuskawin';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'statuskawin/Statuskawin_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('statuskawin'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_statuskawin', TRUE));
        } else {
            $data = array(
		'id_statuskawin' => $this->input->post('id_statuskawin',TRUE),
		'statuskawin' => $this->input->post('statuskawin',TRUE),
	    );

            $this->Statuskawin_model->update($this->input->post('id_statuskawin', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('statuskawin'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Statuskawin_model->get_by_id($id);

        if ($row) {
            $this->Statuskawin_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('statuskawin'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('statuskawin'));
        }
    }

    public function deletebulk(){
        $delete = $this->Statuskawin_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('id_statuskawin', 'id statuskawin', 'trim|required');
	$this->form_validation->set_rules('statuskawin', 'statuskawin', 'trim|required');

	$this->form_validation->set_rules('id_statuskawin', 'id_statuskawin', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Statuskawin.php */
/* Location: ./application/controllers/Statuskawin.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-25 04:29:56 */
/* http://harviacode.com */