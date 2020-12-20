<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Datapengunjung_model extends CI_Model
{

    public $table = 'datapengunjung';
    public $table2 = 'biodatapenduduk';
    public $id = 'nik';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    // get all biodata penduduk
    function get_all2()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table2)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    function cari($cari){
        $this->db->from("biodatapenduduk");

        switch($cari){
            case "":
                $this->db->like('nik', $cari);
                $this->db->or_like('nama', $cari);
                $this->db->or_like('alamat', $cari);
                $this->db->or_like('no_kk', $cari);
                $this->db->or_like('tgl_lahir', $cari);
                break;
        }
        $this->db->like($cari);
        return $this->db->get();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('nik', $q);
	$this->db->or_like('id_datapengunjung', $q);
	$this->db->or_like('nama_lengkap', $q);
	$this->db->or_like('desalurah', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('jenis_pengurusan', $q);
	$this->db->or_like('tgl_input_resepsionis', $q);
	$this->db->or_like('tgl_edit_operator', $q);
	$this->db->or_like('tgl_edit_registercetak', $q);
	$this->db->or_like('nomor_antrian', $q);
	$this->db->or_like('nama_pengurus', $q);
	$this->db->or_like('status_hub_pengurus', $q);
	$this->db->or_like('status_berkas', $q);
	$this->db->or_like('nomor_kontak_pengunjung', $q);
	$this->db->or_like('nama_pengambil_dokumen', $q);
	$this->db->or_like('tgl_pengambilan', $q);
	$this->db->or_like('user_resepsionis', $q);
	$this->db->or_like('user_operator', $q);
	$this->db->or_like('user_cetak', $q);
	$this->db->or_like('user_pengambilan', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('nik', $q);
	$this->db->or_like('id_datapengunjung', $q);
	$this->db->or_like('nama_lengkap', $q);
	$this->db->or_like('desalurah', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('jenis_pengurusan', $q);
	$this->db->or_like('tgl_input_resepsionis', $q);
	$this->db->or_like('tgl_edit_operator', $q);
	$this->db->or_like('tgl_edit_registercetak', $q);
	$this->db->or_like('nomor_antrian', $q);
	$this->db->or_like('nama_pengurus', $q);
	$this->db->or_like('status_hub_pengurus', $q);
	$this->db->or_like('status_berkas', $q);
	$this->db->or_like('nomor_kontak_pengunjung', $q);
	$this->db->or_like('nama_pengambil_dokumen', $q);
	$this->db->or_like('tgl_pengambilan', $q);
	$this->db->or_like('user_resepsionis', $q);
	$this->db->or_like('user_operator', $q);
	$this->db->or_like('user_cetak', $q);
	$this->db->or_like('user_pengambilan', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    // get data with limit and search
    function get_limit_data2($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('nik', $q);
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
        return $this->db->get($this->table2)->result();
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


}

/* End of file Datapengunjung_model.php */
/* Location: ./application/models/Datapengunjung_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-13 03:13:31 */
/* http://harviacode.com */