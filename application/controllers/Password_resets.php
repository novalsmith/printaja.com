<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Password_resets extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Password_resets_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('password_resets/password_resets_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Password_resets_model->json();
    }

    public function read($id) 
    {
        $row = $this->Password_resets_model->get_by_id($id);
        if ($row) {
            $data = array(
		'email' => $row->email,
		'token' => $row->token,
		'created_at' => $row->created_at,
	    );
            $this->load->view('password_resets/password_resets_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('password_resets'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('password_resets/create_action'),
	    'email' => set_value('email'),
	    'token' => set_value('token'),
	    'created_at' => set_value('created_at'),
	);
        $this->load->view('password_resets/password_resets_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'email' => $this->input->post('email',TRUE),
		'token' => $this->input->post('token',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
	    );

            $this->Password_resets_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('password_resets'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Password_resets_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('password_resets/update_action'),
		'email' => set_value('email', $row->email),
		'token' => set_value('token', $row->token),
		'created_at' => set_value('created_at', $row->created_at),
	    );
            $this->load->view('password_resets/password_resets_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('password_resets'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'email' => $this->input->post('email',TRUE),
		'token' => $this->input->post('token',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
	    );

            $this->Password_resets_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('password_resets'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Password_resets_model->get_by_id($id);

        if ($row) {
            $this->Password_resets_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('password_resets'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('password_resets'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('token', 'token', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "password_resets.xls";
        $judul = "password_resets";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Token");
	xlsWriteLabel($tablehead, $kolomhead++, "Created At");

	foreach ($this->Password_resets_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->token);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created_at);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=password_resets.doc");

        $data = array(
            'password_resets_data' => $this->Password_resets_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('password_resets/password_resets_doc',$data);
    }

}

/* End of file Password_resets.php */
/* Location: ./application/controllers/Password_resets.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-11 11:09:54 */
/* http://harviacode.com */