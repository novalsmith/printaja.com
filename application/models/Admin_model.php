<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public $table = 'admin';
    public $id = 'id_admin';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_admin,nama,email,STATUS,tlp,username,PASSWORD,foto,create_by,create_date,modif_by,modif_date');
        $this->datatables->from('admin');
        //add this line for join
        //$this->datatables->join('table2', 'admin.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('admin/read/$1'),'Read')." | ".anchor(site_url('admin/update/$1'),'Update')." | ".anchor(site_url('admin/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_admin');
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
        $this->db->like('id_admin', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('STATUS', $q);
	$this->db->or_like('tlp', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('PASSWORD', $q);
	$this->db->or_like('foto', $q);
	$this->db->or_like('create_by', $q);
	$this->db->or_like('create_date', $q);
	$this->db->or_like('modif_by', $q);
	$this->db->or_like('modif_date', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_admin', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('STATUS', $q);
	$this->db->or_like('tlp', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('PASSWORD', $q);
	$this->db->or_like('foto', $q);
	$this->db->or_like('create_by', $q);
	$this->db->or_like('create_date', $q);
	$this->db->or_like('modif_by', $q);
	$this->db->or_like('modif_date', $q);
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

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-05 10:04:01 */
/* http://harviacode.com */