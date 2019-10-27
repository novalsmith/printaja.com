<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Contact_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        // $breadcrumb = array(
        // 	"Home" => "/welcome",
        // 	"Agenda" => ""
        // );
        $data = array(

            'content'       => 'contact/contact_about',
            'email'         =>  'novalsmith69@gmail.com',
            // 'breadcrumb' 	=> $breadcrumb,

            'judul'          => 'Contact & About',
            'judul_sub'     => 'Daftar Kategori',
            'judulweb'         => 'Silat Sampah',
            'judul_page'     => 'Kategori'

        );

        $this->load->view('template', $data);
    }

    public function jsonAbout()
    {
        header('Content-Type: application/json');
        $data = $this->db->get("about")->result();
        echo json_encode(array('data' => $data));
    }

    public function jsonContact()
    {
        header('Content-Type: application/json');
        $data = $this->db->get("contact")->result();
        echo json_encode(array('data' => $data));
    }

    public function jsonBantuan()
    {
        header('Content-Type: application/json');

        $data = array(
            'judul' => $this->input->post('judul'),
            'keterangan' => $this->input->post('ket'),
        );

        $this->db->insert('faq', $data);

        echo json_encode(array('status' => 'sukses', 'data' => $data));
    }
    public function jsonBantuanGetAll()
    {
        $data =  $this->db->get('faq')->result();
        echo json_encode($data);
    }

    public function JsonCekstatus($id)
    {


        $this->db->where('idpesanan', $id);
        $data = $this->db->get('pesanan');
        if ($data->num_rows() > 0) {

            $row = $data->row();
            $pesan = array('status' => $row->status);
            echo json_encode($pesan);
        } else {
            $pesan = array('status' => "kosong");
            echo json_encode($pesan);
        }
        // echo json_encode(array('status' => $data->status));

    }

    public function JsonKategori($id)
    {

        $data = $this->db->query('select 
                                idkategori, 
                                nama_kategori,
                                 status,hargaBW,
                                 hargaColor,hargajilid 
                                 from kategori where idkategori = ' . $id . '  ')->result();

        echo json_encode($data);
    }


    public function JsonFitur()
    {



        $data = $this->db->query('select 
                                idkategori, 
                                nama_kategori,
                                 status,hargaBW,
                                 hargaColor,hargajilid 
                                 from kategori   ')->result();

        echo json_encode($data);
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('contact/create_action'),
            'di' => set_value('di'),
            'judul' => set_value('judul'),
            'keterangan' => set_value('keterangan'),
        );
        $this->load->view('contact/contact_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'judul' => $this->input->post('judul', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
            );

            $this->Contact_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('contact'));
        }
    }

    public function update($id)
    {
        $row = $this->Contact_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('contact/update_action'),
                'di' => set_value('di', $row->di),
                'judul' => set_value('judul', $row->judul),
                'keterangan' => set_value('keterangan', $row->keterangan),
            );
            $this->load->view('contact/contact_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('contact'));
        }
    }

    public function update_action()
    {
        $data = array(

            'keterangan' => $this->input->post('isiartikel')
        );

        $this->db->where('id', 1);
        $this->db->update('contact', $data);

        $pesan  = array('success' => 'ok');
        echo json_encode($pesan);
    }

    public function update_action_about()
    {
        $data = array(

            'keterangan' => $this->input->post('isiproduk')
        );

        $this->db->where('id', 1);
        $this->db->update('about', $data);

        $pesan  = array('success' => 'ok');
        echo json_encode($pesan);
    }

    public function update_action_faq()
    {
        $pesan = array(

            'judul' => $this->input->post('judul'),

            'keterangan' => $this->input->post('ket')
        );

        $this->db->where('idfaq', $this->input->post('id'));
        $this->db->update('faq', $pesan);

        echo json_encode(array('status' => 'sukses', 'data' => $pesan));

        // echo json_encode($pesan);
    }

    public function updateFaq()
    {
        $this->db->where('idfaq', $this->input->post('id'));
        $datas =   $this->db->get('faq')->row();

        $pesan = array(
            'status' => 'ok',
            'judul' => $datas->judul,
            'keterangan' => $datas->keterangan
        );

        echo json_encode($pesan);
    }

    public function deletefaq($id)
    {
        $this->db->where('idfaq', $id);
        $hasil =   $this->db->get('faq')->row();


        $this->db->where('idfaq', $id);
        $this->db->delete('faq');

        echo json_encode(array('status' => true, 'data' => $hasil->judul));
    }

    public function _rules()
    {
        $this->form_validation->set_rules('judul', 'judul', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

        $this->form_validation->set_rules('di', 'di', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "contact.xls";
        $judul = "contact";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Judul");
        xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

        foreach ($this->Contact_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->judul);
            xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=contact.doc");

        $data = array(
            'contact_data' => $this->Contact_model->get_all(),
            'start' => 0
        );

        $this->load->view('contact/contact_doc', $data);
    }
}

/* End of file Contact.php */
/* Location: ./application/controllers/Contact.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-14 20:22:05 */
/* http://harviacode.com */
