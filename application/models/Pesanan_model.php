<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pesanan_model extends CI_Model
{

    public $table = 'pesanan';
    public $id = 'idpesanan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json()
    {
        $this->datatables->select('
        idpesanan,name, idpesananduplicate,
        pesanan.status, 
        sum(qty)as qty,sum(total)as total,bworcolor, datafilecetak,keterangan, fileprint
        ');
        $this->datatables->from('pesanan');
        $this->datatables->join('kategori', 'kategori.idkategori = pesanan.idkategori');
        $this->datatables->join('orders', 'orders.idorder = pesanan.idorder');
        $this->datatables->group_by('idpesananduplicate');

        $this->datatables->add_column('action', '
 		<a href="javascript:void(0);" class="view_pesanan  label label-sm label-info" data-code="$1" ><i class="fa fa-eye"></i> View</a>
            ',  'idpesanan');
        return $this->datatables->generate();
    }

    // get all
    function get_all($id)
    {
        $this->db->select('
        idpesanan,name,phone,email,dateorder,datefinish,idpesananduplicate,
        pesanan.status,nama_kategori,hargaBW,hargaColor,hargajilid,
        qty,total,bworcolor, datafilecetak,keterangan, fileprint,phone
        ');

        $this->db->from('pesanan');
        $this->db->join('kategori', 'kategori.idkategori = pesanan.idkategori', 'left');
        $this->db->join('orders', 'orders.idorder = pesanan.idorder', 'left');
        $this->db->where("idpesanan", $id);
        return $this->db->get();
    }

    function get_all_All($id)
    {
        $this->db->select('
        idpesanan,name,phone,email,dateorder,datefinish,idpesananduplicate,
        pesanan.status,nama_kategori,hargaBW,hargaColor,hargajilid,
        qty,total,bworcolor, datafilecetak,keterangan, fileprint,phone,warna, hitamputih,pengiriman
        ');

        $this->db->from('pesanan');
        $this->db->join('kategori', 'kategori.idkategori = pesanan.idkategori', 'left');
        $this->db->join('orders', 'orders.idorder = pesanan.idorder', 'left');
        // $this->db->where("pesanan.status", 0);
        // $this->db->where("pesanan.status", 1);
        $this->db->where("idpesananduplicate", $id);
     

        return $this->db->get();
    }

    function get_all_count($id)
    {
        return   $this->db->query('
        select sum(ok.totals) as totalsemua from (
SELECT 
  idpesanan,name,phone,email,dateorder,datefinish,
        pesanan.status,nama_kategori,hargaBW,hargaColor,hargajilid,
        qty,  IF(pesanan.pengiriman = 1,pesanan.total +2000,pesanan.total) AS totals,
    
        bworcolor, pengiriman,keterangan, fileprint
 FROM pesanan LEFT JOIN kategori ON kategori.idkategori = pesanan.idkategori 
 LEFT JOIN orders ON orders.idorder = pesanan.idorder 
 where   idpesananduplicate = "' . $id . '" )  ok
        ');
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('idpesanan', $q);
        $this->db->or_like('idorder', $q);
        $this->db->or_like('dateorder', $q);
        $this->db->or_like('datefinish', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('idkategori', $q);
        $this->db->or_like('qty', $q);
        $this->db->or_like('bworcolor', $q);
        $this->db->or_like('datafilecetak', $q);
        $this->db->or_like('total', $q);
        $this->db->or_like('keterangan', $q);
        $this->db->or_like('fileprint', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idpesanan', $q);
        $this->db->or_like('idorder', $q);
        $this->db->or_like('dateorder', $q);
        $this->db->or_like('datefinish', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('idkategori', $q);
        $this->db->or_like('qty', $q);
        $this->db->or_like('bworcolor', $q);
        $this->db->or_like('datafilecetak', $q);
        $this->db->or_like('total', $q);
        $this->db->or_like('keterangan', $q);
        $this->db->or_like('fileprint', $q);
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

/* End of file Pesanan_model.php */
/* Location: ./application/models/Pesanan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-19 12:38:11 */
/* http://harviacode.com */
