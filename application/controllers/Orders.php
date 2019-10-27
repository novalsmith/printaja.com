<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Orders extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Orders_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('orders/orders_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Orders_model->json();
    }

    public function read($id) 
    {
        $row = $this->Orders_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idorder' => $row->idorder,
		'name' => $row->name,
		'phone' => $row->phone,
		'email' => $row->email,
		'message' => $row->message,
		'status' => $row->status,
		'create_date' => $row->create_date,
		'modif_date' => $row->modif_date,
	    );
            $this->load->view('orders/orders_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('orders'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('orders/create_action'),
	    'idorder' => set_value('idorder'),
	    'name' => set_value('name'),
	    'phone' => set_value('phone'),
	    'email' => set_value('email'),
	    'message' => set_value('message'),
	    'status' => set_value('status'),
	    'create_date' => set_value('create_date'),
	    'modif_date' => set_value('modif_date'),
	);
        $this->load->view('orders/orders_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'phone' => $this->input->post('phone',TRUE),
		'email' => $this->input->post('email',TRUE),
		'message' => $this->input->post('message',TRUE),
		'status' => $this->input->post('status',TRUE),
		'create_date' => $this->input->post('create_date',TRUE),
		'modif_date' => $this->input->post('modif_date',TRUE),
	    );

            $this->Orders_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('orders'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Orders_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('orders/update_action'),
		'idorder' => set_value('idorder', $row->idorder),
		'name' => set_value('name', $row->name),
		'phone' => set_value('phone', $row->phone),
		'email' => set_value('email', $row->email),
		'message' => set_value('message', $row->message),
		'status' => set_value('status', $row->status),
		'create_date' => set_value('create_date', $row->create_date),
		'modif_date' => set_value('modif_date', $row->modif_date),
	    );
            $this->load->view('orders/orders_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('orders'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idorder', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'phone' => $this->input->post('phone',TRUE),
		'email' => $this->input->post('email',TRUE),
		'message' => $this->input->post('message',TRUE),
		'status' => $this->input->post('status',TRUE),
		'create_date' => $this->input->post('create_date',TRUE),
		'modif_date' => $this->input->post('modif_date',TRUE),
	    );

            $this->Orders_model->update($this->input->post('idorder', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('orders'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Orders_model->get_by_id($id);

        if ($row) {
            $this->Orders_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('orders'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('orders'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('phone', 'phone', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('message', 'message', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('create_date', 'create date', 'trim|required');
	$this->form_validation->set_rules('modif_date', 'modif date', 'trim|required');

	$this->form_validation->set_rules('idorder', 'idorder', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "orders.xls";
        $judul = "orders";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Phone");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Message");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Create Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Modif Date");

	foreach ($this->Orders_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->phone);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->message);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);
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
        header("Content-Disposition: attachment;Filename=orders.doc");

        $data = array(
            'orders_data' => $this->Orders_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('orders/orders_doc',$data);
    }

}

/* End of file Orders.php */
/* Location: ./application/controllers/Orders.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-11 11:09:54 */
/* http://harviacode.com */