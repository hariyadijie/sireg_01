<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Statushubpengurus_model extends CI_Model
{

    public $table = 'statushubpengurus';
    public $id = 'id_statushubpengurus';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_statushubpengurus,status_hub_pengurus');
        $this->datatables->from('statushubpengurus');
        //add this line for join
        //$this->datatables->join('table2', 'statushubpengurus.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('statushubpengurus/read/$1'),'<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary"  data-toggle="tooltip" title="Detail"')."  ".anchor(site_url('statushubpengurus/update/$1'),'<i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"')."  ".anchor(site_url('statushubpengurus/delete/$1'),'<i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger" onclick="return confirmdelete(\'statushubpengurus/delete/$1\')" data-toggle="tooltip" title="Delete"'), 'id_statushubpengurus');
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
        $this->db->like('id_statushubpengurus', $q);
	$this->db->or_like('id_statushubpengurus', $q);
	$this->db->or_like('status_hub_pengurus', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_statushubpengurus', $q);
	$this->db->or_like('id_statushubpengurus', $q);
	$this->db->or_like('status_hub_pengurus', $q);
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

/* End of file Statushubpengurus_model.php */
/* Location: ./application/models/Statushubpengurus_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-11-14 04:58:09 */
/* http://harviacode.com */