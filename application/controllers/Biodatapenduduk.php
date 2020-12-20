<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Biodatapenduduk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Biodatapenduduk_model');
        $this->load->model('Pekerjaan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Biodata Penduduk';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Biodatapenduduk' => '',
        ];
        $data['code_js'] = 'biodatapenduduk/codejs';
        $data['page'] = 'biodatapenduduk/Biodatapenduduk_list';
        $this->load->view('template/backend', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Biodatapenduduk_model->json();
    }

    public function read($id) 
    {
        $row = $this->Biodatapenduduk_model->get_by_id($id);
        if ($row) {
            $data = array(
            'id_biodatapenduduk' => $row->id_biodatapenduduk,
            'nik' => $row->nik,
            'no_kk' => $row->no_kk,
            'nama' => $row->nama,
            'alamat' => $row->alamat,
            'kecamatan' => $row->kecamatan,
            'desa_lurah' => $row->desa_lurah,
            'tgl_lahir' => $row->tgl_lahir,
            'tempat_lahir' => $row->tempat_lahir,
            'nama_ayah' => $row->nama_ayah,
            'nama_ibu' => $row->nama_ibu,
            'pekerjaan' => $row->pekerjaan,
            'pendidikan' => $row->pendidikan,
            'golongan_darah' => $row->golongan_darah,
            'agama' => $row->agama,
            'hubungan_dalam_keluarga' => $row->hubungan_dalam_keluarga,
            'status_perkawinan' => $row->status_perkawinan,
            'pencatatan_perkawinan' => $row->pencatatan_perkawinan,
            'disabilitas' => $row->disabilitas,
            ); 
        $data['title'] = 'Biodata Penduduk';
        $data['subtitle'] = 'Kabupaten Bantaeng';
        $data['crumb'] = [
            'Dashboard' => '',
        ];
        
        // $data['pekerjaan']=$this->Pekerjaan_model->get_all();
        // $data['kec'] = $this->Biodatapenduduk_model->kecamatan();

        $data['page'] = 'biodatapenduduk/Biodatapenduduk_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('biodatapenduduk'));
        }
    }


    public function create() 
    {
        $data = array(
            'button' => 'Input',
            'action' => site_url('biodatapenduduk/create_action'),
            'id_biodatapenduduk' => set_value('id_biodatapenduduk'),
            'nik'                => set_value('nik'),
            'no_kk'              => set_value('no_kk'),
            'nama'                  => set_value('nama'),
            'alamat'                => set_value('alamat'),
            'kecamatan'             => set_value('kecamatan'),
            'desa_lurah'            => set_value('listdesalurah'),
            'tgl_lahir'             => set_value('tgl_lahir'),
            'tempat_lahir'          => set_value('tempat_lahir'),
            'nama_ayah'             => set_value('nama_ayah'),
            'nama_ibu'              => set_value('nama_ibu'),
            'pekerjaan'             => set_value('pekerjaan'),
            'pendidikan'            => set_value('pendidikan'),
            'golongan_darah'        => set_value('golongan_darah'),
            'agama'                 => set_value('agama'),
            'hubungan_dalam_keluarga' => set_value('hubungan_dalam_keluarga'),
            'status_perkawinan' => set_value('status_perkawinan'),
            'pencatatan_perkawinan' => set_value('pencatatan_perkawinan'),
            'disabilitas' => set_value('disabilitas'),
        );
        $data['title'] = 'Biodata Penduduk';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

		$data['kecamatan']=$this->Biodatapenduduk_model->ambil_kecamatan();
        $data['pekerjaan']=$this->Biodatapenduduk_model->ambil_pekerjaan();
        $data['pendidikan']=$this->Biodatapenduduk_model->ambil_pendidikan();
        $data['goldarah']=$this->Biodatapenduduk_model->ambil_goldarah();
        $data['agama']=$this->Biodatapenduduk_model->ambil_agama();
        $data['hubkel']=$this->Biodatapenduduk_model->ambil_hubkel();
        $data['statuskawin']=$this->Biodatapenduduk_model->ambil_statuskawin();
        $data['pencatatan_perkawinan']=$this->Biodatapenduduk_model->ambil_pencatatanperkawinan();
        $data['disabilitas']=$this->Biodatapenduduk_model->ambil_disabilitas();
        $data['page'] = 'biodatapenduduk/Biodatapenduduk_form';
        $this->load->view('template/backend', $data);
    }

	
	// dijalankan saat kecamatan di klik
	public function listdesalurah(){
		// Ambil data ID Kecamatan yang dikirim via ajax post
		$id_kecamatan = $this->input->post('id_kec');
		$desalurah = $this->Biodatapenduduk_model->viewBykecamatan($id_kecamatan);
		// Buat variabel untuk menampung tag-tag option nya
		// Set defaultnya dengan tag option Pilih
		$lists = "<option value=''>Desa/Kelurahan</option>";
		foreach($desalurah as $data){
			$lists .= "<option value='".$data->id_desalurah."'>".$data->nama_desalurah."</option>"; // Tambahkan tag option ke variabel $lists
		}
		$callback = array('listdesalurah'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
		echo json_encode($callback); // konversi varibael $callback menjadi JSON
	}

    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_biodatapenduduk'    => $this->input->post('id_biodatapenduduk',TRUE),
		'nik'                   => $this->input->post('nik',TRUE),
		'no_kk'                 => $this->input->post('no_kk',TRUE),
		'nama'                  => $this->input->post('nama',TRUE),
		'alamat'                => $this->input->post('alamat',TRUE),
		'kecamatan'             => $this->input->post('kecamatan',TRUE),
		'desa_lurah'            => $this->input->post('listdesalurah',TRUE),
		'tgl_lahir'             => $this->input->post('tgl_lahir',TRUE),
		'tempat_lahir'          => $this->input->post('tempat_lahir',TRUE),
		'nama_ayah'             => $this->input->post('nama_ayah',TRUE),
		'nama_ibu'              => $this->input->post('nama_ibu',TRUE),
		'pekerjaan'             => $this->input->post('pekerjaan',TRUE),
		'pendidikan'            => $this->input->post('pendidikan',TRUE),
		'golongan_darah'        => $this->input->post('golongan_darah',TRUE),
		'agama'                     => $this->input->post('agama',TRUE),
		'hubungan_dalam_keluarga'   => $this->input->post('hubungan_dalam_keluarga',TRUE),
		'status_perkawinan'         => $this->input->post('status_perkawinan',TRUE),
		'pencatatan_perkawinan'         => $this->input->post('pencatatan_perkawinan',TRUE),
		'disabilitas'               => $this->input->post('disabilitas',TRUE),
	);
        if(! $this->Biodatapenduduk_model->is_exist($this->input->post('id_biodatapenduduk'))){
            $this->Biodatapenduduk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('biodatapenduduk'));
            }else{
                $this->create();
                $this->session->set_flashdata('message', 'Create Record Failed, id_biodatapenduduk is exist');
            }}
    }
    
    public function update($id) 
    {
        $row = $this->Biodatapenduduk_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('biodatapenduduk/update_action'),
            'id_biodatapenduduk'        => set_value('id_biodatapenduduk', $row->id_biodatapenduduk),
            'nik'                       => set_value('nik', $row->nik),
            'no_kk'                     => set_value('no_kk', $row->no_kk),
            'nama'                      => set_value('nama', $row->nama),
            'alamat'                    => set_value('alamat', $row->alamat),
            'kecamatan'                 => set_value('kecamatan', $row->kecamatan),
            'desa_lurah'                => set_value('desa_lurah', $row->desa_lurah),
            'tgl_lahir'                 => set_value('tgl_lahir', $row->tgl_lahir),
            'tempat_lahir'              => set_value('tempat_lahir', $row->tempat_lahir),
            'nama_ayah'                 => set_value('nama_ayah', $row->nama_ayah),
            'nama_ibu'                  => set_value('nama_ibu', $row->nama_ibu),
            'pekerjaan'                 => set_value('pekerjaan', $row->pekerjaan),
            'pendidikan'                => set_value('pendidikan', $row->pendidikan),
            'golongan_darah'            => set_value('golongan_darah', $row->golongan_darah),
            'agama'                     => set_value('agama', $row->agama),
            'hubungan_dalam_keluarga'   => set_value('hubungan_dalam_keluarga', $row->hubungan_dalam_keluarga),
            'status_perkawinan'         => set_value('status_perkawinan', $row->status_perkawinan),
            'pencatatan_perkawinan'         => set_value('status_perkawinan', $row->pencatatan_perkawinan),
            'disabilitas'               => set_value('disabilitas', $row->disabilitas),
            );
        $data['title'] = 'Biodata Penduduk';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];
		$data['kecamatan2']=$this->Biodatapenduduk_model->ambil_kecamatan();
        // $data['desalurah']=$this->Biodatapenduduk_model->ambil_desalurah();
        // $data['desalurah'] = $this->Biodatapenduduk_model->viewBykecamatan2('id_kecamatan');
        $data['pekerjaan2']=$this->Biodatapenduduk_model->ambil_pekerjaan();
        $data['pendidikan2']=$this->Biodatapenduduk_model->ambil_pendidikan();
        $data['goldarah2']=$this->Biodatapenduduk_model->ambil_goldarah();
        $data['agama2']=$this->Biodatapenduduk_model->ambil_agama();
        $data['hubkel2']=$this->Biodatapenduduk_model->ambil_hubkel();
        $data['statuskawin2']=$this->Biodatapenduduk_model->ambil_statuskawin();
        $data['pencatatanperkawinan']=$this->Biodatapenduduk_model->ambil_pencatatanperkawinan();
        $data['disabilitas2']=$this->Biodatapenduduk_model->ambil_disabilitas();
        $data['page'] = 'biodatapenduduk/Biodatapenduduk_update';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('biodatapenduduk'));
        }

        
    }
	// dijalankan saat kecamatan di klik
	public function listdesalurah2(){
		// Ambil data ID Kecamatan yang dikirim via ajax post
		$id_kecamatan = $this->input->post('id_kec');
		$desalurah = $this->Biodatapenduduk_model->viewBykecamatan2($id_kecamatan);
		// Buat variabel untuk menampung tag-tag option nya
		// Set defaultnya dengan tag option Pilih
		$lists = "<option value=''>Desa/Kelurahan</option>";
		foreach($desalurah as $data){
			$lists .= "<option value='".$data->id_desalurah."'>".$data->nama_desalurah."</option>"; // Tambahkan tag option ke variabel $lists
		}
		$callback = array('listdesalurah'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
		echo json_encode($callback); // konversi varibael $callback menjadi JSON
	}

    

    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_biodatapenduduk', TRUE));
        } else {
            $data = array(
            'id_biodatapenduduk' => $this->input->post('id_biodatapenduduk',TRUE),
            'nik' => $this->input->post('nik',TRUE),
            'no_kk' => $this->input->post('no_kk',TRUE),
            'nama' => $this->input->post('nama',TRUE),
            'alamat' => $this->input->post('alamat',TRUE),
            'kecamatan' => $this->input->post('kecamatan',TRUE),
            'desa_lurah' => $this->input->post('listdesalurah',TRUE),
            'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
            'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
            'nama_ayah' => $this->input->post('nama_ayah',TRUE),
            'nama_ibu' => $this->input->post('nama_ibu',TRUE),
            'pekerjaan' => $this->input->post('pekerjaan',TRUE),
            'pendidikan' => $this->input->post('pendidikan',TRUE),
            'golongan_darah' => $this->input->post('golongan_darah',TRUE),
            'agama' => $this->input->post('agama',TRUE),
            'hubungan_dalam_keluarga' => $this->input->post('hubungan_dalam_keluarga',TRUE),
            'status_perkawinan' => $this->input->post('status_perkawinan',TRUE),
            'pencatatan_perkawinan' => $this->input->post('pencatatan_perkawinan',TRUE),
            'disabilitas' => $this->input->post('disabilitas',TRUE),
            );

            $this->Biodatapenduduk_model->update($this->input->post('id_biodatapenduduk', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('biodatapenduduk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Biodatapenduduk_model->get_by_id($id);

        if ($row) {
            $this->Biodatapenduduk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('biodatapenduduk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('biodatapenduduk'));
        }
    }

    public function deletebulk(){
        $delete = $this->Biodatapenduduk_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('id_biodatapenduduk', 'id biodatapenduduk', 'trim|required');
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('no_kk', 'no kk', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
	$this->form_validation->set_rules('desa_lurah', 'desa lurah', 'trim');
	$this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('nama_ayah', 'nama ayah', 'trim|required');
	$this->form_validation->set_rules('nama_ibu', 'nama ibu', 'trim|required');
	$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');
	$this->form_validation->set_rules('pendidikan', 'pendidikan', 'trim|required');
	$this->form_validation->set_rules('golongan_darah', 'golongan darah', 'trim|required');
	$this->form_validation->set_rules('agama', 'agama', 'trim|required');
	$this->form_validation->set_rules('hubungan_dalam_keluarga', 'hubungan dalam keluarga', 'trim|required');
	$this->form_validation->set_rules('status_perkawinan', 'status perkawinan', 'trim|required');
	$this->form_validation->set_rules('disabilitas', 'disabilitas', 'trim|required');

	$this->form_validation->set_rules('id_biodatapenduduk', 'id_biodatapenduduk', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "biodatapenduduk.xls";
        $judul = "biodatapenduduk";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Biodatapenduduk");
	xlsWriteLabel($tablehead, $kolomhead++, "Nik");
	xlsWriteLabel($tablehead, $kolomhead++, "No Kk");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Kecamatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Desa Lurah");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Tempat Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Ayah");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Ibu");
	xlsWriteLabel($tablehead, $kolomhead++, "Pekerjaan");
	xlsWriteLabel($tablehead, $kolomhead++, "Pendidikan");
	xlsWriteLabel($tablehead, $kolomhead++, "Golongan Darah");
	xlsWriteLabel($tablehead, $kolomhead++, "Agama");
	xlsWriteLabel($tablehead, $kolomhead++, "Hubungan Dalam Keluarga");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Perkawinan");
	xlsWriteLabel($tablehead, $kolomhead++, "Disabilitas");

	foreach ($this->Biodatapenduduk_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_biodatapenduduk);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nik);
	    xlsWriteNumber($tablebody, $kolombody++, $data->no_kk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kecamatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->desa_lurah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tempat_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_ayah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_ibu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pekerjaan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pendidikan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->golongan_darah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->agama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hubungan_dalam_keluarga);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_perkawinan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->disabilitas);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=biodatapenduduk.doc");

        $data = array(
            'biodatapenduduk_data' => $this->Biodatapenduduk_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('biodatapenduduk/Biodatapenduduk_doc',$data);
    }

  public function printdoc(){
        $data = array(
            'biodatapenduduk_data' => $this->Biodatapenduduk_model->get_all(),
            'start' => 0
        );
        $this->load->view('biodatapenduduk/biodatapenduduk_print', $data);
    }

}

/* End of file Biodatapenduduk.php */
/* Location: ./application/controllers/Biodatapenduduk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-14 08:30:57 */
/* http://harviacode.com */