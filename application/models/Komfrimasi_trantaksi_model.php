<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Komfrimasi_trantaksi_model extends CI_Model
{

    public $table = 'komfrimasi_trantaksi';
    public $id = 'id_komfinmasi';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_komfinmasi,id_trantaksi,status_komfrimasi,tatal_pembayaran,bukti_pembayaran,create_by,create_date,modif_by,modif_date');
        $this->datatables->from('komfrimasi_trantaksi');
        //add this line for join
        //$this->datatables->join('table2', 'komfrimasi_trantaksi.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('komfrimasi_trantaksi/read/$1'),'Read')." | ".anchor(site_url('komfrimasi_trantaksi/update/$1'),'Update')." | ".anchor(site_url('komfrimasi_trantaksi/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_komfinmasi');
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
        $this->db->like('id_komfinmasi', $q);
	$this->db->or_like('id_trantaksi', $q);
	$this->db->or_like('status_komfrimasi', $q);
	$this->db->or_like('tatal_pembayaran', $q);
	$this->db->or_like('bukti_pembayaran', $q);
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
        $this->db->like('id_komfinmasi', $q);
	$this->db->or_like('id_trantaksi', $q);
	$this->db->or_like('status_komfrimasi', $q);
	$this->db->or_like('tatal_pembayaran', $q);
	$this->db->or_like('bukti_pembayaran', $q);
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

/* End of file Komfrimasi_trantaksi_model.php */
/* Location: ./application/models/Komfrimasi_trantaksi_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-05 10:04:01 */
/* http://harviacode.com */