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

    public function registlogin(){
        if ($this->session->userdata('email') == "") {
            echo json_encode(array('result' => "true"));
        }else{
            echo json_encode(array('result' => "false"));
        }
      
    }

    public function JsonKategori($id)
    {
       
        $data = $this->db->query('select   *  from kategori where idkategori = ' . $id . '  ')->result();

        echo json_encode($data);
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
            'idpesananduplicate' => $data->idpesananduplicate,
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
        $data = $this->Pesanan_model->get_all_All($id)->result();

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

    private function AutonumberPrint(){
        $number = "";
        $data = $this->db->query("select max(idpesanan) as getmax from pesanan")->row();
       
        if($data->getmax < 1){
            $number = "Printaja1".date("My");
        }else{
            $number = "Printaja".$data->getmax.date("my");
        }
        return  $number;
    }

    private function AutonumberPrintShow()
    {
        $number = "";
        $data = $this->db->query("select max(idpesanan-1) as getmaxshow from pesanan")->row();

        if ($data->getmaxshow < 1) {
            $number = "Printaja1" . date("My");
        } else {
            $number = "Printaja" . $data->getmaxshow . date("my");
        }
        return  $number;
    }

    public function _uploadImage()
    {
        $config['upload_path']          = './assets/img';
        $config['allowed_types']        = '*';
        $config['file_name']            = 'printaja_' . date('dMy H i s');
        $config['overwrite']            = true;
        // $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('fileprint') == "") {
            return null;
        } else {
            return $this->upload->data("file_name");
        }
    }


    public function create_action()
    {
      

        $tglambil = $this->input->post('tglambil');
        $jamambil = $this->input->post('jamambil');


        $simpan = array(
            'idpesananduplicate' => $this->AutonumberPrint(),
            'idorder' => $this->input->post('idorder'),
            'dateorder' => $tglambil." ".$jamambil,
            // 'datefinish' => ,
            'status' => 0,
            'idkategori' => $this->input->post('idkategori'),
            'qty' => $this->input->post('qty'),
            'warna' => $this->input->post('warna'),
            'hitamputih' => $this->input->post('hitamputih'),
            'datafilecetak' => 1,
            'total' => $this->input->post('total'),
            'keterangan' => $this->input->post('keterangan'),
            'fileprint' => $this->_uploadImage(),
            

           
        );
        // unlink('./assets/img/thumb/'. $gbr['file_name']);

        $this->db->insert('pesanan',$simpan); //kirim value ke model m_upload

        echo json_encode(array('idpesananduplicate'=> $this->AutonumberPrintShow()));
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
