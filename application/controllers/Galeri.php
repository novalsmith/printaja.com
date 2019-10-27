<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Galeri extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Galeri_model');
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

            'content'       => 'galeri/galeri_list',
            'email'         =>  'novalsmith69@gmail.com',
            // 'breadcrumb'     => $breadcrumb,

            'judul'         => 'Galeri',
            'judul_sub'     => 'Daftar Kategori',
            'judulweb'      => 'Silat Sampah',
            'judul_page'    => 'Kategori'

        );

        $this->load->view('template', $data);
    }

       public function create()
    {
        // $breadcrumb = array(
        //  "Home" => "/welcome",
        //  "Agenda" => ""
        // );
        $data = array(

                'button' => 'Save',
                'action' => site_url('galeri/upload_image'),
            'content'       => 'galeri/galeri_form',
            'email'         =>  'novalsmith69@gmail.com',
            // 'breadcrumb'     => $breadcrumb,
            'judul'         => 'Galeri',
            'judul_sub'     => 'Daftar Kategori',
            'judulweb'      => 'Silat Sampah',
            'judul_page'    => 'Kategori'

        );

        $this->load->view('template', $data);
    }



 







    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Galeri_model->json();
    }

    public function read($id) 
    {
        $row = $this->Galeri_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idgalery' => $row->idgalery,
		'idkategori' => $row->idkategori,
		'foto' => $row->foto,
		'create_date' => $row->create_date,
		'modif_date' => $row->modif_date,
	    );
            $this->load->view('galeri/galeri_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('galeri'));
        }
    }

  
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idkategori' => $this->input->post('idkategori',TRUE),
		'foto' => $this->input->post('foto',TRUE),
		'create_date' => $this->input->post('create_date',TRUE),
		'modif_date' => $this->input->post('modif_date',TRUE),
	    );

            $this->Galeri_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('galeri'));
        }
    }
 


public function upload_image(){

      
  
     $kategori = $this->input->post('kategori');
     $judulfoto = $this->input->post('judulfoto');
    
           
   // unlink('./assets/img/thumb/'. $gbr['file_name']);
  $status[] = array();
   foreach ($this->_uploadImage() as $key => $value) {
       $status[$key] = $value;
      // $status[$key] = $value;
   }

     

    if($status['status']== false){
          // $error =  $this->upload->display_errors();
           
       
           echo json_encode(array('judul' => $judulfoto,
                                    'pesan' => $status['pesan'],
                                    'status' => $status['status']
        ));
     }else{
            
    
          
                            $simpan = array(
                                  'idkategori' => $this->input->post('kategori'),
                                  'foto' => $status['pesan'],
                                  'judulfoto' => $this->input->post('judulfoto'),
                                  'create_date' => date('Y-m-d H:i:s')
                                  
                                  // 'modifdate' => date('y m d H:i:s')
                            );

       
                   $cek =    $this->Galeri_model->insert($simpan); //kirim value ke model m_upload
           
           if ($cek) {
                 echo json_encode(array('judul' => $judulfoto,
                                    'pesan' => "Berhasil Tersimpan",
                                    'status' => true
        ));

           }else{

               echo json_encode(array('judul' => $judulfoto,
                                    'pesan' => "Gagal Tersimpan",
                                    'status' => false
        ));

           }

      }
 
       }

       private function _uploadImage()
{
    $config['upload_path']          = './assets/img/galeri';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['file_name']            = 'haditerpal_'.date('dMyHis');

    $config['overwrite']            = true;
    $config['max_size']             = 3000; // 3MB
 
 

    $this->load->library('upload', $config);

    if(! $this->upload->do_upload('image')){
          // $error =  $this->upload->display_errors();
           $error = array('pesan' => $this->upload->display_errors(),
                          'status' => false  );
       return $error;
     }else{
            
 
             $error = array('pesan' => $this->upload->data("file_name"),
                          'status' => true  );
       return $error;
      }
     
} 
        
    

    
    public function totaldetail($kategori) 
    {
        $totaldetail = 
        $this->db->query("
            select idgalery,nama_kategori,g.idkategori,foto,judulfoto  from galeri g join kategori k on g.idkategori = k.idkategori
            where      g.idkategori = '".$kategori."'  
            ") ;
        $namegaleri = $totaldetail->row(); 
        $data = array(

            'content'       => 'galeri/totaldetail',
            'email'         =>  'novalsmith69@gmail.com',
            // 'breadcrumb'     => $breadcrumb,

            'totaldetail'         => $totaldetail,
            'judul'     => 'Galeri '.$namegaleri->nama_kategori,
            'judulweb'      => 'Silat Sampah',
            'judul_page'    => 'Kategori'

        );

        $this->load->view('template', $data);
    }
    
     
    
    // public function delete($id) 
    // {
    //     $row = $this->Galeri_model->get_by_id($id);

    //     if ($row) {
    //         $this->Galeri_model->delete($id);
    //         $this- >session->set_flashdata('message', 'Delete Record Success');
    //         redirect(site_url('galeri'));
    //     } else {
    //         $this->session->set_flashdata('message', 'Record Not Found');
    //         redirect(site_url('galeri'));
    //     }
    // }

     public function delete($id) 
    {

    
        $row = $this->Galeri_model->get_by_id($id);
      
        if ($row) {
           unlink('./assets/img/galeri/'.$row->foto);
            $this->Galeri_model->delete($id);

            $data = array(
              'status' => true,
              'data'   =>$row 
            );
            echo json_encode($data);
        } else {
          $data = array(
            'status' => false
            
          );
         echo json_encode($data);
            
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idkategori', 'idkategori', 'trim|required');
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');
	$this->form_validation->set_rules('create_date', 'create date', 'trim|required');
	$this->form_validation->set_rules('modif_date', 'modif date', 'trim|required');

	$this->form_validation->set_rules('idgalery', 'idgalery', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "galeri.xls";
        $judul = "galeri";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Idkategori");
	xlsWriteLabel($tablehead, $kolomhead++, "Foto");
	xlsWriteLabel($tablehead, $kolomhead++, "Create Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Modif Date");

	foreach ($this->Galeri_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->idkategori);
	    xlsWriteLabel($tablebody, $kolombody++, $data->foto);
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
        header("Content-Disposition: attachment;Filename=galeri.doc");

        $data = array(
            'galeri_data' => $this->Galeri_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('galeri/galeri_doc',$data);
    }

}

/* End of file Galeri.php */
/* Location: ./application/controllers/Galeri.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-11 11:09:53 */
/* http://harviacode.com */