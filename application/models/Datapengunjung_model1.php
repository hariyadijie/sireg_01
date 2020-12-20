<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Datapengunjung_model extends CI_Model
{

    public $table = 'datapengunjung';
    public $id = 'nik';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_datapengunjung,nik,no_kk,nama_lengkap,kecamatan,desalurah,alamat,jenis_pengurusan,tgl_input_resepsionis,tgl_edit_operator,tgl_edit_registercetak,nomor_antrian,nama_pengurus,status_hub_pengurus,status_berkas,nomor_kontak_pengunjung,nama_pengambil_dokumen,tgl_pengambilan,user_resepsionis,user_operator,user_cetak,user_pengambilan,keterangan');
        $this->datatables->from('datapengunjung');
        //add this line for join
        //$this->datatables->join('table2', 'datapengunjung.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('datapengunjung/read/$1'),'<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary"  data-toggle="tooltip" title="Detail"')."  ".anchor(site_url('datapengunjung/update/$1'),'<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"')."  ".anchor(site_url('datapengunjung/delete/$1'),'<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger" onclick="return confirmdelete(\'datapengunjung/delete/$1\')" data-toggle="tooltip" title="Delete"'), 'nik');
        return $this->datatables->generate();
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
        $this->db->like('nik', $q);
        $this->db->or_like('id_datapengunjung', $q);
        $this->db->or_like('nik', $q);
        $this->db->or_like('no_kk', $q);
        $this->db->or_like('nama_lengkap', $q);
        $this->db->or_like('kecamatan', $q);
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
        $this->db->or_like('nik', $q);
        $this->db->or_like('no_kk', $q);
        $this->db->or_like('nama_lengkap', $q);
        $this->db->or_like('kecamatan', $q);
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

    function cari($id){
        $query= $this->db->get_where('biodatapenduduk',array('nik'=>$id));
        return $query;
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

/* End of file Datapengunjung_model.php */
/* Location: ./application/models/Datapengunjung_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-12-05 07:24:57 */
/* http://harviacode.com */