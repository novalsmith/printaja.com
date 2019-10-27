<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Trsntaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Trsntaksi_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('trsntaksi/trsntaksi_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Trsntaksi_model->json();
    }

    public function read($id) 
    {
        $row = $this->Trsntaksi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_trantaksi' => $row->id_trantaksi,
		'id_barang' => $row->id_barang,
		'qty_beli' => $row->qty_beli,
		'create_by' => $row->create_by,
		'create_date' => $row->create_date,
		'modif_by' => $row->modif_by,
		'modif_date' => $row->modif_date,
	    );
            $this->load->view('trsntaksi/trsntaksi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('trsntaksi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('trsntaksi/create_action'),
	    'id_trantaksi' => set_value('id_trantaksi'),
	    'id_barang' => set_value('id_barang'),
	    'qty_beli' => set_value('qty_beli'),
	    'create_by' => set_value('create_by'),
	    'create_date' => set_value('create_date'),
	    'modif_by' => set_value('modif_by'),
	    'modif_date' => set_value('modif_date'),
	);
        $this->load->view('trsntaksi/trsntaksi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_barang' => $this->input->post('id_barang',TRUE),
		'qty_beli' => $this->input->post('qty_beli',TRUE),
		'create_by' => $this->input->post('create_by',TRUE),
		'create_date' => $this->input->post('create_date',TRUE),
		'modif_by' => $this->input->post('modif_by',TRUE),
		'modif_date' => $this->input->post('modif_date',TRUE),
	    );

            $this->Trsntaksi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('trsntaksi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Trsntaksi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('trsntaksi/update_action'),
		'id_trantaksi' => set_value('id_trantaksi', $row->id_trantaksi),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'qty_beli' => set_value('qty_beli', $row->qty_beli),
		'create_by' => set_value('create_by', $row->create_by),
		'create_date' => set_value('create_date', $row->create_date),
		'modif_by' => set_value('modif_by', $row->modif_by),
		'modif_date' => set_value('modif_date', $row->modif_date),
	    );
            $this->load->view('trsntaksi/trsntaksi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('trsntaksi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_trantaksi', TRUE));
        } else {
            $data = array(
		'id_barang' => $this->input->post('id_barang',TRUE),
		'qty_beli' => $this->input->post('qty_beli',TRUE),
		'create_by' => $this->input->post('create_by',TRUE),
		'create_date' => $this->input->post('create_date',TRUE),
		'modif_by' => $this->input->post('modif_by',TRUE),
		'modif_date' => $this->input->post('modif_date',TRUE),
	    );

            $this->Trsntaksi_model->update($this->input->post('id_trantaksi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('trsntaksi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Trsntaksi_model->get_by_id($id);

        if ($row) {
            $this->Trsntaksi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('trsntaksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('trsntaksi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_barang', 'id barang', 'trim|required');
	$this->form_validation->set_rules('qty_beli', 'qty beli', 'trim|required');
	$this->form_validation->set_rules('create_by', 'create by', 'trim|required');
	$this->form_validation->set_rules('create_date', 'create date', 'trim|required');
	$this->form_validation->set_rules('modif_by', 'modif by', 'trim|required');
	$this->form_validation->set_rules('modif_date', 'modif date', 'trim|required');

	$this->form_validation->set_rules('id_trantaksi', 'id_trantaksi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "trsntaksi.xls";
        $judul = "trsntaksi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Qty Beli");
	xlsWriteLabel($tablehead, $kolomhead++, "Create By");
	xlsWriteLabel($tablehead, $kolomhead++, "Create Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Modif By");
	xlsWriteLabel($tablehead, $kolomhead++, "Modif Date");

	foreach ($this->Trsntaksi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_barang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->qty_beli);
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
        header("Content-Disposition: attachment;Filename=trsntaksi.doc");

        $data = array(
            'trsntaksi_data' => $this->Trsntaksi_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('trsntaksi/trsntaksi_doc',$data);
    }

}

/* End of file Trsntaksi.php */
/* Location: ./application/controllers/Trsntaksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-05 10:04:02 */
/* http://harviacode.com */