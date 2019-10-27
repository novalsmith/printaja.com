<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stok extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Stok_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('stok/stok_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Stok_model->json();
    }

    public function read($id) 
    {
        $row = $this->Stok_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_stok' => $row->id_stok,
		'id_barang' => $row->id_barang,
		'stok_barang' => $row->stok_barang,
		'harga_satuan' => $row->harga_satuan,
		'create_by' => $row->create_by,
		'create_date' => $row->create_date,
		'modif_by' => $row->modif_by,
		'modif_date' => $row->modif_date,
	    );
            $this->load->view('stok/stok_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('stok'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('stok/create_action'),
	    'id_stok' => set_value('id_stok'),
	    'id_barang' => set_value('id_barang'),
	    'stok_barang' => set_value('stok_barang'),
	    'harga_satuan' => set_value('harga_satuan'),
	    'create_by' => set_value('create_by'),
	    'create_date' => set_value('create_date'),
	    'modif_by' => set_value('modif_by'),
	    'modif_date' => set_value('modif_date'),
	);
        $this->load->view('stok/stok_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_barang' => $this->input->post('id_barang',TRUE),
		'stok_barang' => $this->input->post('stok_barang',TRUE),
		'harga_satuan' => $this->input->post('harga_satuan',TRUE),
		'create_by' => $this->input->post('create_by',TRUE),
		'create_date' => $this->input->post('create_date',TRUE),
		'modif_by' => $this->input->post('modif_by',TRUE),
		'modif_date' => $this->input->post('modif_date',TRUE),
	    );

            $this->Stok_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('stok'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Stok_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('stok/update_action'),
		'id_stok' => set_value('id_stok', $row->id_stok),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'stok_barang' => set_value('stok_barang', $row->stok_barang),
		'harga_satuan' => set_value('harga_satuan', $row->harga_satuan),
		'create_by' => set_value('create_by', $row->create_by),
		'create_date' => set_value('create_date', $row->create_date),
		'modif_by' => set_value('modif_by', $row->modif_by),
		'modif_date' => set_value('modif_date', $row->modif_date),
	    );
            $this->load->view('stok/stok_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('stok'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_stok', TRUE));
        } else {
            $data = array(
		'id_barang' => $this->input->post('id_barang',TRUE),
		'stok_barang' => $this->input->post('stok_barang',TRUE),
		'harga_satuan' => $this->input->post('harga_satuan',TRUE),
		'create_by' => $this->input->post('create_by',TRUE),
		'create_date' => $this->input->post('create_date',TRUE),
		'modif_by' => $this->input->post('modif_by',TRUE),
		'modif_date' => $this->input->post('modif_date',TRUE),
	    );

            $this->Stok_model->update($this->input->post('id_stok', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('stok'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Stok_model->get_by_id($id);

        if ($row) {
            $this->Stok_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('stok'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('stok'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_barang', 'id barang', 'trim|required');
	$this->form_validation->set_rules('stok_barang', 'stok barang', 'trim|required');
	$this->form_validation->set_rules('harga_satuan', 'harga satuan', 'trim|required');
	$this->form_validation->set_rules('create_by', 'create by', 'trim|required');
	$this->form_validation->set_rules('create_date', 'create date', 'trim|required');
	$this->form_validation->set_rules('modif_by', 'modif by', 'trim|required');
	$this->form_validation->set_rules('modif_date', 'modif date', 'trim|required');

	$this->form_validation->set_rules('id_stok', 'id_stok', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "stok.xls";
        $judul = "stok";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Stok Barang");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga Satuan");
	xlsWriteLabel($tablehead, $kolomhead++, "Create By");
	xlsWriteLabel($tablehead, $kolomhead++, "Create Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Modif By");
	xlsWriteLabel($tablehead, $kolomhead++, "Modif Date");

	foreach ($this->Stok_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_barang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->stok_barang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->harga_satuan);
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
        header("Content-Disposition: attachment;Filename=stok.doc");

        $data = array(
            'stok_data' => $this->Stok_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('stok/stok_doc',$data);
    }

}

/* End of file Stok.php */
/* Location: ./application/controllers/Stok.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-05 10:04:01 */
/* http://harviacode.com */