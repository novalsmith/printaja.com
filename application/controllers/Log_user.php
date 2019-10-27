<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Log_user extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Log_user_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('log_user/log_user_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Log_user_model->json();
    }

    public function read($id) 
    {
        $row = $this->Log_user_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_login' => $row->id_login,
		'id_admin' => $row->id_admin,
		'login_date' => $row->login_date,
		'logout_date' => $row->logout_date,
		'prangkat_browser' => $row->prangkat_browser,
		'log_activity' => $row->log_activity,
		'log_activity_date' => $row->log_activity_date,
	    );
            $this->load->view('log_user/log_user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('log_user'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('log_user/create_action'),
	    'id_login' => set_value('id_login'),
	    'id_admin' => set_value('id_admin'),
	    'login_date' => set_value('login_date'),
	    'logout_date' => set_value('logout_date'),
	    'prangkat_browser' => set_value('prangkat_browser'),
	    'log_activity' => set_value('log_activity'),
	    'log_activity_date' => set_value('log_activity_date'),
	);
        $this->load->view('log_user/log_user_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_admin' => $this->input->post('id_admin',TRUE),
		'login_date' => $this->input->post('login_date',TRUE),
		'logout_date' => $this->input->post('logout_date',TRUE),
		'prangkat_browser' => $this->input->post('prangkat_browser',TRUE),
		'log_activity' => $this->input->post('log_activity',TRUE),
		'log_activity_date' => $this->input->post('log_activity_date',TRUE),
	    );

            $this->Log_user_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('log_user'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Log_user_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('log_user/update_action'),
		'id_login' => set_value('id_login', $row->id_login),
		'id_admin' => set_value('id_admin', $row->id_admin),
		'login_date' => set_value('login_date', $row->login_date),
		'logout_date' => set_value('logout_date', $row->logout_date),
		'prangkat_browser' => set_value('prangkat_browser', $row->prangkat_browser),
		'log_activity' => set_value('log_activity', $row->log_activity),
		'log_activity_date' => set_value('log_activity_date', $row->log_activity_date),
	    );
            $this->load->view('log_user/log_user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('log_user'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_login', TRUE));
        } else {
            $data = array(
		'id_admin' => $this->input->post('id_admin',TRUE),
		'login_date' => $this->input->post('login_date',TRUE),
		'logout_date' => $this->input->post('logout_date',TRUE),
		'prangkat_browser' => $this->input->post('prangkat_browser',TRUE),
		'log_activity' => $this->input->post('log_activity',TRUE),
		'log_activity_date' => $this->input->post('log_activity_date',TRUE),
	    );

            $this->Log_user_model->update($this->input->post('id_login', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('log_user'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Log_user_model->get_by_id($id);

        if ($row) {
            $this->Log_user_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('log_user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('log_user'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_admin', 'id admin', 'trim|required');
	$this->form_validation->set_rules('login_date', 'login date', 'trim|required');
	$this->form_validation->set_rules('logout_date', 'logout date', 'trim|required');
	$this->form_validation->set_rules('prangkat_browser', 'prangkat browser', 'trim|required');
	$this->form_validation->set_rules('log_activity', 'log activity', 'trim|required');
	$this->form_validation->set_rules('log_activity_date', 'log activity date', 'trim|required');

	$this->form_validation->set_rules('id_login', 'id_login', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "log_user.xls";
        $judul = "log_user";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Admin");
	xlsWriteLabel($tablehead, $kolomhead++, "Login Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Logout Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Prangkat Browser");
	xlsWriteLabel($tablehead, $kolomhead++, "Log Activity");
	xlsWriteLabel($tablehead, $kolomhead++, "Log Activity Date");

	foreach ($this->Log_user_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_admin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->login_date);
	    xlsWriteLabel($tablebody, $kolombody++, $data->logout_date);
	    xlsWriteLabel($tablebody, $kolombody++, $data->prangkat_browser);
	    xlsWriteLabel($tablebody, $kolombody++, $data->log_activity);
	    xlsWriteLabel($tablebody, $kolombody++, $data->log_activity_date);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=log_user.doc");

        $data = array(
            'log_user_data' => $this->Log_user_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('log_user/log_user_doc',$data);
    }

}

/* End of file Log_user.php */
/* Location: ./application/controllers/Log_user.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-05 10:04:01 */
/* http://harviacode.com */