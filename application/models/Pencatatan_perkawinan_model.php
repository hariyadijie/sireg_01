<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pencatatan_perkawinan_model extends CI_Model
{

    public $table = 'pencatatan_perkawinan';
    public $id = 'id_pencatatanperkawinan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_pencatatanperkawinan,pencatatan_perkawinan');
        $this->datatables->from('pencatatan_perkawinan');
        //add this line for join
        //$this->datatables->join('table2', 'pencatatan_perkawinan.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('pencatatan_perkawinan/read/$1'),'<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary"  data-toggle="tooltip" title="Detail"')."  ".anchor(site_url('pencatatan_perkawinan/update/$1'),'<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"')."  ".anchor(site_url('pencatatan_perkawinan/delete/$1'),'<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger" onclick="return confirmdelete(\'pencatatan_perkawinan/delete/$1\')" data-toggle="tooltip" title="Delete"'), 'id_pencatatanperkawinan');
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
        $this->db->like('id_pencatatanperkawinan', $q);
	$this->db->or_like('id_pencatatanperkawinan', $q);
	$this->db->or_like('pencatatan_perkawinan', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pencatatanperkawinan', $q);
	$this->db->or_like('id_pencatatanperkawinan', $q);
	$this->db->or_like('pencatatan_perkawinan', $q);
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

/* End of file Pencatatan_perkawinan_model.php */
/* Location: ./application/models/Pencatatan_perkawinan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-25 04:38:33 */
/* http://harviacode.com */