<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pesanan_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {

        $data = array(

            'content'       => 'pesanan/pesanan_list',
            'email'         =>  'novalsmith69@gmail.com',
            // 'breadcrumb' 	=> $breadcrumb,

            'judul'          => 'Pesanan',
            'judul_sub'     => 'Daftar Pesanan',
            'judulweb'         => 'Printmu',
            'judul_page'     => 'Pesanan'

        );

        $this->load->view('template', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Pesanan_model->json();
    }

    public function jsonPesanan($id)
    {
        // header('Content-Type: application/json');
        $data = $this->Pesanan_model->get_all($id)->row();
        $array = array(
            'idpesanan' => $data->idpesanan,
            'nama' => $data->name,
            'email' => $data->email,
            'phone'  => $data->phone,
            'dateorder' => $data->dateorder,
            'datefinish' => $data->datefinish,
            'status' => $data->status,
            'qty' => $data->qty,
            'bworcolor' => $data->bworcolor,
            'datafilecetak' => $data->datafilecetak,
            'total' => $data->total,
            'keterangan' => $data->keterangan,
            'fileprint' => $data->fileprint
        );
        echo  json_encode($array);
    }

    public function jsonPesananAll($id)
    {
        // header('Content-Type: application/json');
        $data = $this->Pesanan_model->get_all($id)->result();

        echo  json_encode($data);
    }

    public function jsonPesananCount($id)
    {
        // header('Content-Type: application/json');
        $data = $this->Pesanan_model->get_all_count($id)->row();

        echo  json_encode(array('total' => $data->totalsemua));
    }

    public function update_status()
    {
        $id     = $this->input->post('idpesanan');
        $status = $this->input->post('status');



        $this->db->where('idpesananduplicate', $id);

        $cek = $this->db->update('pesanan',  array('status' => $status));
        $pesan = array(
            'status' => 'sukses',
            'statushasil' => $status
        );
        if ($cek) {
            echo json_encode(array('status' => $status));
        } else {
            echo json_encode(array('status' => ''));
        }
    }


    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pesanan.xls";
        $judul = "pesanan";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Idorder");
        xlsWriteLabel($tablehead, $kolomhead++, "Dateorder");
        xlsWriteLabel($tablehead, $kolomhead++, "Datefinish");
        xlsWriteLabel($tablehead, $kolomhead++, "Status");
        xlsWriteLabel($tablehead, $kolomhead++, "Idkategori");
        xlsWriteLabel($tablehead, $kolomhead++, "Qty");
        xlsWriteLabel($tablehead, $kolomhead++, "Bworcolor");
        xlsWriteLabel($tablehead, $kolomhead++, "Datafilecetak");
        xlsWriteLabel($tablehead, $kolomhead++, "Total");
        xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
        xlsWriteLabel($tablehead, $kolomhead++, "Fileprint");

        foreach ($this->Pesanan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->idorder);
            xlsWriteLabel($tablebody, $kolombody++, $data->dateorder);
            xlsWriteLabel($tablebody, $kolombody++, $data->datefinish);
            xlsWriteNumber($tablebody, $kolombody++, $data->status);
            xlsWriteNumber($tablebody, $kolombody++, $data->idkategori);
            xlsWriteNumber($tablebody, $kolombody++, $data->qty);
            xlsWriteNumber($tablebody, $kolombody++, $data->bworcolor);
            xlsWriteNumber($tablebody, $kolombody++, $data->datafilecetak);
            xlsWriteNumber($tablebody, $kolombody++, $data->total);
            xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
            xlsWriteLabel($tablebody, $kolombody++, $data->fileprint);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=pesanan.doc");

        $data = array(
            'pesanan_data' => $this->Pesanan_model->get_all(),
            'start' => 0
        );

        $this->load->view('pesanan/pesanan_doc', $data);
    }
}

/* End of file Pesanan.php */
/* Location: ./application/controllers/Pesanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-19 12:38:11 */
/* http://harviacode.com */
