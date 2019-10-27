<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Faq extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Faq_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('faq/faq_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Faq_model->json();
    }

    public function read($id) 
    {
        $row = $this->Faq_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idfaq' => $row->idfaq,
		'judul' => $row->judul,
		'keterangan' => $row->keterangan,
		'createdate' => $row->createdate,
		'modifdate' => $row->modifdate,
	    );
            $this->load->view('faq/faq_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faq'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('faq/create_action'),
	    'idfaq' => set_value('idfaq'),
	    'judul' => set_value('judul'),
	    'keterangan' => set_value('keterangan'),
	    'createdate' => set_value('createdate'),
	    'modifdate' => set_value('modifdate'),
	);
        $this->load->view('faq/faq_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'judul' => $this->input->post('judul',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'createdate' => $this->input->post('createdate',TRUE),
		'modifdate' => $this->input->post('modifdate',TRUE),
	    );

            $this->Faq_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('faq'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Faq_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('faq/update_action'),
		'idfaq' => set_value('idfaq', $row->idfaq),
		'judul' => set_value('judul', $row->judul),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'createdate' => set_value('createdate', $row->createdate),
		'modifdate' => set_value('modifdate', $row->modifdate),
	    );
            $this->load->view('faq/faq_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faq'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idfaq', TRUE));
        } else {
            $data = array(
		'judul' => $this->input->post('judul',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'createdate' => $this->input->post('createdate',TRUE),
		'modifdate' => $this->input->post('modifdate',TRUE),
	    );

            $this->Faq_model->update($this->input->post('idfaq', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('faq'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Faq_model->get_by_id($id);

        if ($row) {
            $this->Faq_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('faq'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('faq'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('createdate', 'createdate', 'trim|required');
	$this->form_validation->set_rules('modifdate', 'modifdate', 'trim|required');

	$this->form_validation->set_rules('idfaq', 'idfaq', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "faq.xls";
        $judul = "faq";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Createdate");
	xlsWriteLabel($tablehead, $kolomhead++, "Modifdate");

	foreach ($this->Faq_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->judul);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->createdate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->modifdate);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=faq.doc");

        $data = array(
            'faq_data' => $this->Faq_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('faq/faq_doc',$data);
    }

}

/* End of file Faq.php */
/* Location: ./application/controllers/Faq.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-14 13:45:40 */
/* http://harviacode.com */