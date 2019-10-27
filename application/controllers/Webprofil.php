<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Webprofil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Webprofil_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');

          if ($this->session->userdata('email')=="" )
      { redirect('auth'); }

    }
    

  
        public function index()
    {
        // $breadcrumb = array(
        //  "Home" => "/welcome",
        //  "Agenda" => ""
        // );
        $data = array(

            'content'       => 'webprofil/webprofil_list',
            'email'         =>  'novalsmith69@gmail.com',
            // 'breadcrumb'     => $breadcrumb,

            'judul'         => 'webprofil',
            'judul_sub'     => 'Daftar webprofil',
            'judulweb'      => 'Silat Sampah',
            'judul_page'    => 'Kategori'

        );

        $this->load->view('template', $data);
    }
    
    public function json() {
        // header ('Content-Type: application/json');
        $hasil = $this->Webprofil_model->json();
        echo json_encode($hasil);
    }

  public function jsonprofil() {
        // header ('Content-Type: application/json');
        $hasil = $this->Webprofil_model->jsonprofil();
        echo json_encode($hasil);
    }

    public function read($id) 
    {
        $row = $this->Webprofil_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idwebprofil' => $row->idwebprofil,
		'namaweb' => $row->namaweb,
		'email' => $row->email,
		'tlp1' => $row->tlp1,
		'tlp2' => $row->tlp2,
		'tlp3' => $row->tlp3,
		'fb' => $row->fb,
		'ig' => $row->ig,
		'create_date' => $row->create_date,
		'midif_date' => $row->midif_date,
	    );
            $this->load->view('webprofil/webprofil_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('webprofil'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('webprofil/create_action'),
	    'idwebprofil' => set_value('idwebprofil'),
	    'namaweb' => set_value('namaweb'),
	    'email' => set_value('email'),
	    'tlp1' => set_value('tlp1'),
	    'tlp2' => set_value('tlp2'),
	    'tlp3' => set_value('tlp3'),
	    'fb' => set_value('fb'),
	    'ig' => set_value('ig'),
	    'create_date' => set_value('create_date'),
	    'midif_date' => set_value('midif_date'),
	);
        $this->load->view('webprofil/webprofil_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'namaweb' => $this->input->post('namaweb',TRUE),
		'email' => $this->input->post('email',TRUE),
		'tlp1' => $this->input->post('tlp1',TRUE),
		'tlp2' => $this->input->post('tlp2',TRUE),
		'tlp3' => $this->input->post('tlp3',TRUE),
		'fb' => $this->input->post('fb',TRUE),
		'ig' => $this->input->post('ig',TRUE),
		'create_date' => $this->input->post('create_date',TRUE),
		'midif_date' => $this->input->post('midif_date',TRUE),
	    );

            $this->Webprofil_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('webprofil'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Webprofil_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('webprofil/update_action'),
		'idwebprofil' => set_value('idwebprofil', $row->idwebprofil),
		'namaweb' => set_value('namaweb', $row->namaweb),
		'email' => set_value('email', $row->email),
		'tlp1' => set_value('tlp1', $row->tlp1),
		'tlp2' => set_value('tlp2', $row->tlp2),
		'tlp3' => set_value('tlp3', $row->tlp3),
		'fb' => set_value('fb', $row->fb),
		'ig' => set_value('ig', $row->ig),
		'create_date' => set_value('create_date', $row->create_date),
		'midif_date' => set_value('midif_date', $row->midif_date),
	    );
            $this->load->view('webprofil/webprofil_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('webprofil'));
        }
    }
    
    
        public function updateuser()
    {
       
            $id     = $this->input->post('id');
            $nama   = $this->input->post('nama');
            $pwd    = $this->input->post('pwd');
            $email  = $this->input->post('email');
       
            $data = array(

                'name' => $nama,
                'password' =>  $pwd,
                'email' =>  $email,
                'modif_date' => date('Y-m-d H:i:s')
             
            );

           $row = $this->Webprofil_model->update_user($id,$data);

            echo json_encode($row);
      
    }

           public function updateprofil()
    {
       
            $id     = $this->input->post('id');
            $profil   = $this->input->post('profil');
            $namaweb    = $this->input->post('namaweb');
            $email  = $this->input->post('email');
            $tlp1  = $this->input->post('tlp1');
            $tlp2  = $this->input->post('tlp2');
            $tlp3  = $this->input->post('tlp3');
            $fb  = $this->input->post('fb');
            $ig  = $this->input->post('ig');
       
            $data = array(

                'namaweb' => $namaweb,
                'email' =>  $email,
                'tlp1' =>  $tlp1,
                'tlp2' =>  $tlp2,
                'tlp3' =>  $tlp3,
                'fb' =>  $fb,
                'ig' =>  $ig,
                'profil' =>  $profil,
                'midif_date' => date('Y-m-d H:i:s')
             
            );

           $row = $this->Webprofil_model->update_profil($id,$data);

            echo json_encode($row);
      
    }
    
    public function delete($id) 
    {
        $row = $this->Webprofil_model->get_by_id($id);

        if ($row) {
            $this->Webprofil_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('webprofil'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('webprofil'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('namaweb', 'namaweb', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('tlp1', 'tlp1', 'trim|required');
	$this->form_validation->set_rules('tlp2', 'tlp2', 'trim|required');
	$this->form_validation->set_rules('tlp3', 'tlp3', 'trim|required');
	$this->form_validation->set_rules('fb', 'fb', 'trim|required');
	$this->form_validation->set_rules('ig', 'ig', 'trim|required');
	$this->form_validation->set_rules('create_date', 'create date', 'trim|required');
	$this->form_validation->set_rules('midif_date', 'midif date', 'trim|required');

	$this->form_validation->set_rules('idwebprofil', 'idwebprofil', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "webprofil.xls";
        $judul = "webprofil";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Namaweb");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Tlp1");
	xlsWriteLabel($tablehead, $kolomhead++, "Tlp2");
	xlsWriteLabel($tablehead, $kolomhead++, "Tlp3");
	xlsWriteLabel($tablehead, $kolomhead++, "Fb");
	xlsWriteLabel($tablehead, $kolomhead++, "Ig");
	xlsWriteLabel($tablehead, $kolomhead++, "Create Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Midif Date");

	foreach ($this->Webprofil_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->namaweb);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tlp1);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tlp2);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tlp3);
	    xlsWriteLabel($tablebody, $kolombody++, $data->fb);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ig);
	    xlsWriteLabel($tablebody, $kolombody++, $data->create_date);
	    xlsWriteLabel($tablebody, $kolombody++, $data->midif_date);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=webprofil.doc");

        $data = array(
            'webprofil_data' => $this->Webprofil_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('webprofil/webprofil_doc',$data);
    }

}

/* End of file Webprofil.php */
/* Location: ./application/controllers/Webprofil.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-11 11:09:55 */
/* http://harviacode.com */