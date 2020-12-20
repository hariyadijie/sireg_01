<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Biodatapenduduk_model extends CI_Model
{

    public $table = 'biodatapenduduk';
    var $kecamatan='kecamatan';
    var $desalurah='desalurah';
    var $pekerjaan='pekerjaan';
    var $agama='agama';
    public $id = 'id_biodatapenduduk';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_biodatapenduduk,nik,no_kk,nama,alamat,kecamatan,desa_lurah,tgl_lahir,tempat_lahir,nama_ayah,nama_ibu,pekerjaan,pendidikan,golongan_darah,agama,hubungan_dalam_keluarga,status_perkawinan,disabilitas');
        $this->datatables->from('biodatapenduduk');
        //add this line for join
        // $this->datatables->join('pekerjaan', 'biodatapenduduk.pekerjaan = pekerjaan.id_pekerjaan');
        $this->datatables->add_column('action', anchor(site_url('biodatapenduduk/read/$1'),'<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary"  data-toggle="tooltip" title="Detail"')."  ".anchor(site_url('biodatapenduduk/update/$1'),'<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"')."  ".anchor(site_url('biodatapenduduk/delete/$1'),'<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger" onclick="return confirmdelete(\'biodatapenduduk/delete/$1\')" data-toggle="tooltip" title="Delete"'), 'id_biodatapenduduk');
        return $this->datatables->generate();
    }

    
	public function ambil_kecamatan() {
		return $this->db->get('kecamatan')->result(); // Tampilkan semua data yang ada di tabel kecamatan
    }
    
    
	public function viewByKecamatan($id_kecamatan){
		$this->db->where('id_kecamatan', $id_kecamatan);
		$result = $this->db->get('desalurah')->result(); // Tampilkan semua data desa berdasarkan id desalurah
		return $result; 
    }
    
	public function viewByKecamatan2($id_kecamatan){
		$this->db->where('id_kecamatan', $id_kecamatan);
		$result = $this->db->get('desalurah')->result(); // Tampilkan semua data desa berdasarkan id desalurah
		return $result; 
    }
    
        // get data by pendidikan
	public function ambil_pendidikan() {
		return $this->db->get('pendidikan')->result(); // Tampilkan semua data yang ada di tabel pendidikan
	}
	
    // get data by pekerjaan
	public function ambil_pekerjaan() {
		return $this->db->get('pekerjaan')->result(); // Tampilkan semua data yang ada di tabel pekerjaan
	}

    // get data by pekerjaan
	public function ambil_goldarah() {
		return $this->db->get('goldarah')->result(); // Tampilkan semua data yang ada di tabel golongan darah
	}

    // get data by agama
	public function ambil_agama() {
		return $this->db->get('agama')->result(); // Tampilkan semua data yang ada di tabel agama
	}
    // get data by hubkel
	public function ambil_hubkel() {
		return $this->db->get('hubkel')->result(); // Tampilkan semua data yang ada di tabel hubkel
    }
    
    // get data by statuskawin
	public function ambil_statuskawin() {
		return $this->db->get('statuskawin')->result(); // Tampilkan semua data yang ada di tabel statuskawin
	}
    // get data by pencatatan_perkawinan
	public function ambil_pencatatanperkawinan() {
		return $this->db->get('pencatatan_perkawinan')->result(); // Tampilkan semua data yang ada di tabel pencatatan perkawinan
	}

    // get data by disabilitas
	public function ambil_disabilitas() {
		return $this->db->get('disabilitas')->result(); // Tampilkan semua data yang ada di tabel disabilitas
	}


    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_biodatapenduduk', $q);
        $this->db->or_like('id_biodatapenduduk', $q);
        $this->db->or_like('nik', $q);
        $this->db->or_like('no_kk', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('kecamatan', $q);
        $this->db->or_like('desa_lurah', $q);
        $this->db->or_like('tgl_lahir', $q);
        $this->db->or_like('tempat_lahir', $q);
        $this->db->or_like('nama_ayah', $q);
        $this->db->or_like('nama_ibu', $q);
        $this->db->or_like('pekerjaan', $q);
        $this->db->or_like('pendidikan', $q);
        $this->db->or_like('golongan_darah', $q);
        $this->db->or_like('agama', $q);
        $this->db->or_like('hubungan_dalam_keluarga', $q);
        $this->db->or_like('status_perkawinan', $q);
        $this->db->or_like('disabilitas', $q);
        $this->db->from($this->table);
            return $this->db->count_all_results();
        }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_biodatapenduduk', $q);
        $this->db->or_like('id_biodatapenduduk', $q);
        $this->db->or_like('nik', $q);
        $this->db->or_like('no_kk', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('alamat', $q);
        $this->db->or_like('kecamatan', $q);
        $this->db->or_like('desa_lurah', $q);
        $this->db->or_like('tgl_lahir', $q);
        $this->db->or_like('tempat_lahir', $q);
        $this->db->or_like('nama_ayah', $q);
        $this->db->or_like('nama_ibu', $q);
        $this->db->or_like('pekerjaan', $q);
        $this->db->or_like('pendidikan', $q);
        $this->db->or_like('golongan_darah', $q);
        $this->db->or_like('agama', $q);
        $this->db->or_like('hubungan_dalam_keluarga', $q);
        $this->db->or_like('status_perkawinan', $q);
        $this->db->or_like('disabilitas', $q);
        $this->db->limit($limit, $start);
            return $this->db->get($this->table)->result();
        }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    // delete bulkdata
    function deletebulk(){
        $data = $this->input->post('msg_', TRUE);
        $arr_id = explode(",", $data); 
        $this->db->where_in($this->id, $arr_id);
        return $this->db->delete($this->table);
    }

    //check pk data is exists 
    function is_exist($id){
        $query = $this->db->get_where($this->table, array($this->id => $id));
        $count = $query->num_rows();
        if($count > 0){
            return true;
        }else{
            return false;
        }
        }


}

/* End of file Biodatapenduduk_model.php */
/* Location: ./application/models/Biodatapenduduk_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-14 08:30:57 */
/* http://harviacode.com */