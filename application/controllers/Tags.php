<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tags extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tags_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
     if ($this->session->userdata('email')=="" )
      { redirect('auth'); }
    }

    public function index()
    {
        $this->load->view('tags/tags_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tags_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tags_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idtag' => $row->idtag,
		'namaTag' => $row->namaTag,
		'status' => $row->status,
		'create_date' => $row->create_date,
		'modif_date' => $row->modif_date,
	    );
            $this->load->view('tags/tags_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tags'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tags/create_action'),
	    'idtag' => set_value('idtag'),
	    'namaTag' => set_value('namaTag'),
	    'status' => set_value('status'),
	    'create_date' => set_value('create_date'),
	    'modif_date' => set_value('modif_date'),
	);
        $this->load->view('tags/tags_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'namaTag' => $this->input->post('namaTag',TRUE),
		'status' => $this->input->post('status',TRUE),
		'create_date' => $this->input->post('create_date',TRUE),
		'modif_date' => $this->input->post('modif_date',TRUE),
	    );

            $this->Tags_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tags'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tags_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tags/update_action'),
		'idtag' => set_value('idtag', $row->idtag),
		'namaTag' => set_value('namaTag', $row->namaTag),
		'status' => set_value('status', $row->status),
		'create_date' => set_value('create_date', $row->create_date),
		'modif_date' => set_value('modif_date', $row->modif_date),
	    );
            $this->load->view('tags/tags_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tags'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idtag', TRUE));
        } else {
            $data = array(
		'namaTag' => $this->input->post('namaTag',TRUE),
		'status' => $this->input->post('status',TRUE),
		'create_date' => $this->input->post('create_date',TRUE),
		'modif_date' => $this->input->post('modif_date',TRUE),
	    );

            $this->Tags_model->update($this->input->post('idtag', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tags'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tags_model->get_by_id($id);

        if ($row) {
            $this->Tags_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tags'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tags'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('namaTag', 'namatag', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('create_date', 'create date', 'trim|required');
	$this->form_validation->set_rules('modif_date', 'modif date', 'trim|required');

	$this->form_validation->set_rules('idtag', 'idtag', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tags.xls";
        $judul = "tags";
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
	xlsWriteLabel($tablehead, $kolomhead++, "NamaTag");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Create Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Modif Date");

	foreach ($this->Tags_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->namaTag);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->create_date);
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
        header("Content-Disposition: attachment;Filename=tags.doc");

        $data = array(
            'tags_data' => $this->Tags_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tags/tags_doc',$data);
    }

}

/* End of file Tags.php */
/* Location: ./application/controllers/Tags.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-11 11:09:54 */
/* http://harviacode.com */