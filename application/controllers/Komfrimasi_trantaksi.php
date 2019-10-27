<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Komfrimasi_trantaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Komfrimasi_trantaksi_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('komfrimasi_trantaksi/komfrimasi_trantaksi_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Komfrimasi_trantaksi_model->json();
    }

    public function read($id) 
    {
        $row = $this->Komfrimasi_trantaksi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_komfinmasi' => $row->id_komfinmasi,
		'id_trantaksi' => $row->id_trantaksi,
		'status_komfrimasi' => $row->status_komfrimasi,
		'tatal_pembayaran' => $row->tatal_pembayaran,
		'bukti_pembayaran' => $row->bukti_pembayaran,
		'create_by' => $row->create_by,
		'create_date' => $row->create_date,
		'modif_by' => $row->modif_by,
		'modif_date' => $row->modif_date,
	    );
            $this->load->view('komfrimasi_trantaksi/komfrimasi_trantaksi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('komfrimasi_trantaksi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('komfrimasi_trantaksi/create_action'),
	    'id_komfinmasi' => set_value('id_komfinmasi'),
	    'id_trantaksi' => set_value('id_trantaksi'),
	    'status_komfrimasi' => set_value('status_komfrimasi'),
	    'tatal_pembayaran' => set_value('tatal_pembayaran'),
	    'bukti_pembayaran' => set_value('bukti_pembayaran'),
	    'create_by' => set_value('create_by'),
	    'create_date' => set_value('create_date'),
	    'modif_by' => set_value('modif_by'),
	    'modif_date' => set_value('modif_date'),
	);
        $this->load->view('komfrimasi_trantaksi/komfrimasi_trantaksi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_trantaksi' => $this->input->post('id_trantaksi',TRUE),
		'status_komfrimasi' => $this->input->post('status_komfrimasi',TRUE),
		'tatal_pembayaran' => $this->input->post('tatal_pembayaran',TRUE),
		'bukti_pembayaran' => $this->input->post('bukti_pembayaran',TRUE),
		'create_by' => $this->input->post('create_by',TRUE),
		'create_date' => $this->input->post('create_date',TRUE),
		'modif_by' => $this->input->post('modif_by',TRUE),
		'modif_date' => $this->input->post('modif_date',TRUE),
	    );

            $this->Komfrimasi_trantaksi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('komfrimasi_trantaksi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Komfrimasi_trantaksi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('komfrimasi_trantaksi/update_action'),
		'id_komfinmasi' => set_value('id_komfinmasi', $row->id_komfinmasi),
		'id_trantaksi' => set_value('id_trantaksi', $row->id_trantaksi),
		'status_komfrimasi' => set_value('status_komfrimasi', $row->status_komfrimasi),
		'tatal_pembayaran' => set_value('tatal_pembayaran', $row->tatal_pembayaran),
		'bukti_pembayaran' => set_value('bukti_pembayaran', $row->bukti_pembayaran),
		'create_by' => set_value('create_by', $row->create_by),
		'create_date' => set_value('create_date', $row->create_date),
		'modif_by' => set_value('modif_by', $row->modif_by),
		'modif_date' => set_value('modif_date', $row->modif_date),
	    );
            $this->load->view('komfrimasi_trantaksi/komfrimasi_trantaksi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('komfrimasi_trantaksi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_komfinmasi', TRUE));
        } else {
            $data = array(
		'id_trantaksi' => $this->input->post('id_trantaksi',TRUE),
		'status_komfrimasi' => $this->input->post('status_komfrimasi',TRUE),
		'tatal_pembayaran' => $this->input->post('tatal_pembayaran',TRUE),
		'bukti_pembayaran' => $this->input->post('bukti_pembayaran',TRUE),
		'create_by' => $this->input->post('create_by',TRUE),
		'create_date' => $this->input->post('create_date',TRUE),
		'modif_by' => $this->input->post('modif_by',TRUE),
		'modif_date' => $this->input->post('modif_date',TRUE),
	    );

            $this->Komfrimasi_trantaksi_model->update($this->input->post('id_komfinmasi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('komfrimasi_trantaksi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Komfrimasi_trantaksi_model->get_by_id($id);

        if ($row) {
            $this->Komfrimasi_trantaksi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('komfrimasi_trantaksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('komfrimasi_trantaksi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_trantaksi', 'id trantaksi', 'trim|required');
	$this->form_validation->set_rules('status_komfrimasi', 'status komfrimasi', 'trim|required');
	$this->form_validation->set_rules('tatal_pembayaran', 'tatal pembayaran', 'trim|required');
	$this->form_validation->set_rules('bukti_pembayaran', 'bukti pembayaran', 'trim|required');
	$this->form_validation->set_rules('create_by', 'create by', 'trim|required');
	$this->form_validation->set_rules('create_date', 'create date', 'trim|required');
	$this->form_validation->set_rules('modif_by', 'modif by', 'trim|required');
	$this->form_validation->set_rules('modif_date', 'modif date', 'trim|required');

	$this->form_validation->set_rules('id_komfinmasi', 'id_komfinmasi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "komfrimasi_trantaksi.xls";
        $judul = "komfrimasi_trantaksi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Trantaksi");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Komfrimasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Tatal Pembayaran");
	xlsWriteLabel($tablehead, $kolomhead++, "Bukti Pembayaran");
	xlsWriteLabel($tablehead, $kolomhead++, "Create By");
	xlsWriteLabel($tablehead, $kolomhead++, "Create Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Modif By");
	xlsWriteLabel($tablehead, $kolomhead++, "Modif Date");

	foreach ($this->Komfrimasi_trantaksi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_trantaksi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_komfrimasi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tatal_pembayaran);
	    xlsWriteLabel($tablebody, $kolombody++, $data->bukti_pembayaran);
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
        header("Content-Disposition: attachment;Filename=komfrimasi_trantaksi.doc");

        $data = array(
            'komfrimasi_trantaksi_data' => $this->Komfrimasi_trantaksi_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('komfrimasi_trantaksi/komfrimasi_trantaksi_doc',$data);
    }

}

/* End of file Komfrimasi_trantaksi.php */
/* Location: ./application/controllers/Komfrimasi_trantaksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-05 10:04:01 */
/* http://harviacode.com */