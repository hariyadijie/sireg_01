<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hasilcetak_model extends CI_Model
{

    public $table = 'hasilcetak';
    public $id = 'id_cetak';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_cetak,nik,nama,kec,tgl_cetak,hasil_cetak,status_cetak,jns_blanko,alasan_cetak,hsl_blanko,ket,catatan');
        $this->datatables->from('hasilcetak');
        //add this line for join
        //$this->datatables->join('table2', 'hasilcetak.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('hasilcetak/read/$1'),'<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary"  data-toggle="tooltip" title="Detail"')."  ".anchor(site_url('hasilcetak/update/$1'),'<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"')."  ".anchor(site_url('hasilcetak/delete/$1'),'<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger" onclick="return confirmdelete(\'hasilcetak/delete/$1\')" data-toggle="tooltip" title="Delete"'), 'id_cetak');
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

    // get table kecamatan
    public function get_data($table)
    {
        return $this->db->get($table);
    }

    // get table hasil cetak
    public function get_hslcetak($table)
    {
        return $this->db->get($table);
    }

    // get table status cetak
    public function get_statuscetak($table)
    {
        return $this->db->get($table);
    }

        // get table jenis blanko
    public function get_jenisblanko($table)
    {
        return $this->db->get($table);
    }

    // get table alasan cetak
    public function get_alasancetak($table)
    {
        return $this->db->get($table);
    }

    // get table status hasil ktp
    public function get_statushasilktp($table)
    {
        return $this->db->get($table);
    }



    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_cetak', $q);
        $this->db->or_like('id_cetak', $q);
        $this->db->or_like('nik', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('kec', $q);
        $this->db->or_like('tgl_cetak', $q);
        $this->db->or_like('hasil_cetak', $q);
        $this->db->or_like('status_cetak', $q);
        $this->db->or_like('jns_blanko', $q);
        $this->db->or_like('alasan_cetak', $q);
        $this->db->or_like('hsl_blanko', $q);
        $this->db->or_like('ket', $q);
        $this->db->or_like('catatan', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_cetak', $q);
        $this->db->or_like('id_cetak', $q);
        $this->db->or_like('nik', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('kec', $q);
        $this->db->or_like('tgl_cetak', $q);
        $this->db->or_like('hasil_cetak', $q);
        $this->db->or_like('status_cetak', $q);
        $this->db->or_like('jns_blanko', $q);
        $this->db->or_like('alasan_cetak', $q);
        $this->db->or_like('hsl_blanko', $q);
        $this->db->or_like('ket', $q);
        $this->db->or_like('catatan', $q);
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

/* End of file Hasilcetak_model.php */
/* Location: ./application/models/Hasilcetak_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-22 05:50:36 */
/* http://harviacode.com */