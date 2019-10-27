<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Artikel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Artikel_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('artikel/artikel_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Artikel_model->json();
    }

    public function read($id) 
    {
        $row = $this->Artikel_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_artikel' => $row->id_artikel,
		'id_kategori' => $row->id_kategori,
		'judul' => $row->judul,
		'slug_judul' => $row->slug_judul,
		'isi_artikel' => $row->isi_artikel,
		'foto_artikel' => $row->foto_artikel,
		'create_by' => $row->create_by,
		'create_date' => $row->create_date,
		'modif_by' => $row->modif_by,
		'modif_date' => $row->modif_date,
	    );
            $this->load->view('artikel/artikel_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('artikel'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('artikel/create_action'),
	    'id_artikel' => set_value('id_artikel'),
	    'id_kategori' => set_value('id_kategori'),
	    'judul' => set_value('judul'),
	    'slug_judul' => set_value('slug_judul'),
	    'isi_artikel' => set_value('isi_artikel'),
	    'foto_artikel' => set_value('foto_artikel'),
	    'create_by' => set_value('create_by'),
	    'create_date' => set_value('create_date'),
	    'modif_by' => set_value('modif_by'),
	    'modif_date' => set_value('modif_date'),
	);
        $this->load->view('artikel/artikel_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_kategori' => $this->input->post('id_kategori',TRUE),
		'judul' => $this->input->post('judul',TRUE),
		'slug_judul' => $this->input->post('slug_judul',TRUE),
		'isi_artikel' => $this->input->post('isi_artikel',TRUE),
		'foto_artikel' => $this->input->post('foto_artikel',TRUE),
		'create_by' => $this->input->post('create_by',TRUE),
		'create_date' => $this->input->post('create_date',TRUE),
		'modif_by' => $this->input->post('modif_by',TRUE),
		'modif_date' => $this->input->post('modif_date',TRUE),
	    );

            $this->Artikel_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('artikel'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Artikel_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('artikel/update_action'),
		'id_artikel' => set_value('id_artikel', $row->id_artikel),
		'id_kategori' => set_value('id_kategori', $row->id_kategori),
		'judul' => set_value('judul', $row->judul),
		'slug_judul' => set_value('slug_judul', $row->slug_judul),
		'isi_artikel' => set_value('isi_artikel', $row->isi_artikel),
		'foto_artikel' => set_value('foto_artikel', $row->foto_artikel),
		'create_by' => set_value('create_by', $row->create_by),
		'create_date' => set_value('create_date', $row->create_date),
		'modif_by' => set_value('modif_by', $row->modif_by),
		'modif_date' => set_value('modif_date', $row->modif_date),
	    );
            $this->load->view('artikel/artikel_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('artikel'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_artikel', TRUE));
        } else {
            $data = array(
		'id_kategori' => $this->input->post('id_kategori',TRUE),
		'judul' => $this->input->post('judul',TRUE),
		'slug_judul' => $this->input->post('slug_judul',TRUE),
		'isi_artikel' => $this->input->post('isi_artikel',TRUE),
		'foto_artikel' => $this->input->post('foto_artikel',TRUE),
		'create_by' => $this->input->post('create_by',TRUE),
		'create_date' => $this->input->post('create_date',TRUE),
		'modif_by' => $this->input->post('modif_by',TRUE),
		'modif_date' => $this->input->post('modif_date',TRUE),
	    );

            $this->Artikel_model->update($this->input->post('id_artikel', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('artikel'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Artikel_model->get_by_id($id);

        if ($row) {
            $this->Artikel_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('artikel'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('artikel'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_kategori', 'id kategori', 'trim|required');
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('slug_judul', 'slug judul', 'trim|required');
	$this->form_validation->set_rules('isi_artikel', 'isi artikel', 'trim|required');
	$this->form_validation->set_rules('foto_artikel', 'foto artikel', 'trim|required');
	$this->form_validation->set_rules('create_by', 'create by', 'trim|required');
	$this->form_validation->set_rules('create_date', 'create date', 'trim|required');
	$this->form_validation->set_rules('modif_by', 'modif by', 'trim|required');
	$this->form_validation->set_rules('modif_date', 'modif date', 'trim|required');

	$this->form_validation->set_rules('id_artikel', 'id_artikel', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "artikel.xls";
        $judul = "artikel";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kategori");
	xlsWriteLabel($tablehead, $kolomhead++, "Judul");
	xlsWriteLabel($tablehead, $kolomhead++, "Slug Judul");
	xlsWriteLabel($tablehead, $kolomhead++, "Isi Artikel");
	xlsWriteLabel($tablehead, $kolomhead++, "Foto Artikel");
	xlsWriteLabel($tablehead, $kolomhead++, "Create By");
	xlsWriteLabel($tablehead, $kolomhead++, "Create Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Modif By");
	xlsWriteLabel($tablehead, $kolomhead++, "Modif Date");

	foreach ($this->Artikel_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_kategori);
	    xlsWriteLabel($tablebody, $kolombody++, $data->judul);
	    xlsWriteLabel($tablebody, $kolombody++, $data->slug_judul);
	    xlsWriteLabel($tablebody, $kolombody++, $data->isi_artikel);
	    xlsWriteLabel($tablebody, $kolombody++, $data->foto_artikel);
	    xlsWriteLabel($tablebody, $kolombody++, $data->create_by);
	    xlsWriteLabel($tablebody, $kolombody++, $data->create_date);
	    xlsWriteLabel($tablebody, $kolombody++, $data->modif_by);
	    xlsWriteLabel($tablebody, $kolombody++, $data->modif_date);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=artikel.doc");

        $data = array(
            'artikel_data' => $this->Artikel_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('artikel/artikel_doc',$data);
    }

}

/* End of file Artikel.php */
/* Location: ./application/controllers/Artikel.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-05 10:04:01 */
/* http://harviacode.com */