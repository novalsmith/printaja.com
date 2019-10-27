 <?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Articles extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Articles_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');

   if ($this->session->userdata('email')=="" )
      { redirect('auth'); }
    }

    public function index()
    {
        
  // $breadcrumb = array(
  //  "Dashboard" => "dashboard",
  //  "Artikel" => "" 
 // );
        $data = array(
            
            'content'     => 'articles/articles_list',
             'email'     =>  'novalsmith69@gmail.com',
               // 'breadcrumb' => $breadcrumb,
              //  'get_allKategori' => $this->Articles_model->get_allKategori(),
         'judul'      => 'Artikel',

         'judul_sub' => 'Artikel',
         'judulBrand' => 'Silat Sampah',
         'judul_page' => 'Artikel' 
        
        );

        $this->load->view('template', $data);
    }
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Articles_model->json();
    }



    public function read($id) 
    {
        $row = $this->Articles_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idartikel' => $row->idartikel,
		'idkategori' => $row->idkategori,
		'idtag' => $row->idtag,
		'title' => $row->title,
		'slug' => $row->slug,
		'body' => $row->body,
		'image' => $row->image,
		'status' => $row->status,
		'create_date' => $row->create_date,
		'modif_date' => $row->modif_date,
	    );
            $this->load->view('articles/articles_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('articles'));
        }
    }

    public function create() 
    {
       $breadcrumb = array(
   "Home" => "/welcome",
   "Agenda" => ""
   );
        $data = array(
            
            'content'     => 'articles/articles_form',
             'email'     =>  'novalsmith69@gmail.com',
               'breadcrumb' => $breadcrumb,
               'get_allKategori' => $this->Articles_model->get_allKategori(),
         'judul'      => 'Agenda List',

         'judul_sub' => 'Artikel',
         'judulBrand' => 'Silat Sampah',
         'judul_page' => 'Artikel' 
        
        );

        $this->load->view('template', $data);
    }
    
   

public function create_action(){
  
     $judul = $this->input->post('judul');
   
    
              $simpan = array(
                                  'idkategori' => $this->input->post('idkategori'),
                                  'tags' => $this->input->post('tags'),
                                  'title' => $judul,
                                  'slug' => strtolower(url_title($judul,'_')),
                                  'body' => $this->input->post('isiartikel'),
                                  
                                  'image' =>$this->_uploadImage(),
                                  'status' => $this->input->post('status'),
                                  
                                   
                                  'create_date' => date('Y-m-d H:i:s')
                                  
                                  // 'modifdate' => date('y m d H:i:s')
                            );
   // unlink('./assets/img/thumb/'. $gbr['file_name']);
              
            $this->Articles_model->insert($simpan); //kirim value ke model m_upload
            echo json_encode(array('judul' => $judul,
                                    'pesan' => "Berhasil Tersimpan",
                                    'status' => TRUE
        ));

        
        
       }


       
public function update_action(){
  
    $idarticles = $this->input->post('idartikel');
     $judul = $this->input->post('judul');
      $foto = $this->input->post('foto');
 
    if($this->_uploadImage() == null){
         $simpan = array(
      'idkategori' => $this->input->post('idkategori'),
      'tags' => $this->input->post('tags'),
      'title' => $judul,
      'slug' => strtolower(url_title($judul,'_')),
      'body' => $this->input->post('isiartikel'),
      
      // 'image' =>$this->_uploadImage(),
      'status' => $this->input->post('status'),
      
       
      'create_date' => date('Y-m-d H:i:s')
      
      // 'modifdate' => date('y m d H:i:s')
);
    }else{
  $simpan = array(
      'idkategori' => $this->input->post('idkategori'),
      'tags' => $this->input->post('tags'),
      'title' => $judul,
      'slug' => strtolower(url_title($judul,'_')),
      'body' => $this->input->post('isiartikel'),
      
      'image' =>$this->_uploadImage(),
      'status' => $this->input->post('status'),
      
       
      'create_date' => date('Y-m-d H:i:s')
      
      // 'modifdate' => date('y m d H:i:s')
);
    unlink('./assets/img/small/'. $foto);
    }

  
                  

                  $validasi =  $this->Articles_model->update($idarticles, $simpan);
                  if( $validasi){

                  echo json_encode(array('judul' => $judul,
                  'pesan' => "Berhasil Tersimpan",
                  'status' => TRUE  ));
                  }else{
                  echo json_encode(array('judul' => $judul,
                  'pesan' => "Gagal Tersimpan",
                  'status' => FALSE  ));

                  }

            
        
     
        
       }


private function _uploadImage()
{
    $config['upload_path']          = './assets/img/small';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['file_name']            = 'haditerpal_'.date('dMy H i s');
    $config['overwrite']            = true;
    // $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if($this->upload->do_upload('image') =="" ){
       return null;
     }else{
        return $this->upload->data("file_name");
      }
     
}





// public function update($id)
//   {
//     $row = $this->Articles_model->get_by_id($id);

//     if ($row) {
//       $data = array(

//         'id_kategori' => $row->idkategori,
//         'nama_kategori' =>  $row->nama_kategori,
//         'status' =>  $row->status,
       
//       );

//       echo json_encode($data);
//     }
//   }


 

    
    public function get_by_id() 
    {
        $judul = $this->input->post('judul');
      $slug = strtolower(url_title($judul,'_'));
        $row = $this->Articles_model->get_by_id($slug);
        if ($row) {
          
          $data = array( 
            'status' => true,
            'data'  =>$row
          );

          echo json_encode($data);
        }else{
           $dataerror = array( 
            'status' => false,
            'data'  =>$row
          );
           echo json_encode($dataerror);
        }

          
    }

     public function Editget_by_id($id) 
    {
       
     
        $row = $this->Articles_model->Editget_by_id($id);
        if ($row) {
          
          $data = array( 
            'status' => true,
            'data'  =>$row
          );

          echo json_encode($data);
        }else{
           $dataerror = array( 
            'status' => false,
            'data'  =>$row
          );
           echo json_encode($dataerror);
        }

          
    }
    
  //   public function update_action() 
  //   {
  //       $this->_rules();

  //       if ($this->form_validation->run() == FALSE) {
  //           $this->update($this->input->post('idartikel', TRUE));
  //       } else {
  //           $data = array(
		// 'idkategori' => $this->input->post('idkategori',TRUE),
		// 'idtag' => $this->input->post('idtag',TRUE),
		// 'title' => $this->input->post('title',TRUE),
		// 'slug' => $this->input->post('slug',TRUE),
		// 'body' => $this->input->post('body',TRUE),
		// 'image' => $this->input->post('image',TRUE),
		// 'status' => $this->input->post('status',TRUE),
		// 'create_date' => $this->input->post('create_date',TRUE),
		// 'modif_date' => $this->input->post('modif_date',TRUE),
	 //    );

  //           $this->Articles_model->update($this->input->post('idartikel', TRUE), $data);
  //           $this->session->set_flashdata('message', 'Update Record Success');
  //           redirect(site_url('articles'));
  //       }
  //   }
    
    public function delete($id) 
    {

    
        $row = $this->Articles_model->Editget_by_id($id);
      
        if ($row) {
           unlink('./assets/img/small/'.$row->image);
           $this->db->delete('articles', array('idartikel' =>$row->idartikel));

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
	$this->form_validation->set_rules('idtag', 'idtag', 'trim|required');
	$this->form_validation->set_rules('title', 'title', 'trim|required');
	$this->form_validation->set_rules('slug', 'slug', 'trim|required');
	$this->form_validation->set_rules('body', 'body', 'trim|required');
	$this->form_validation->set_rules('image', 'image', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('create_date', 'create date', 'trim|required');
	$this->form_validation->set_rules('modif_date', 'modif date', 'trim|required');

	$this->form_validation->set_rules('idartikel', 'idartikel', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "articles.xls";
        $judul = "articles";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Idtag");
	xlsWriteLabel($tablehead, $kolomhead++, "Title");
	xlsWriteLabel($tablehead, $kolomhead++, "Slug");
	xlsWriteLabel($tablehead, $kolomhead++, "Body");
	xlsWriteLabel($tablehead, $kolomhead++, "Image");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Create Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Modif Date");

	foreach ($this->Articles_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->idkategori);
	    xlsWriteNumber($tablebody, $kolombody++, $data->idtag);
	    xlsWriteLabel($tablebody, $kolombody++, $data->title);
	    xlsWriteLabel($tablebody, $kolombody++, $data->slug);
	    xlsWriteLabel($tablebody, $kolombody++, $data->body);
	    xlsWriteLabel($tablebody, $kolombody++, $data->image);
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
        header("Content-Disposition: attachment;Filename=articles.doc");

        $data = array(
            'articles_data' => $this->Articles_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('articles/articles_doc',$data);
    }

}

/* End of file Articles.php */
/* Location: ./application/controllers/Articles.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-11 11:09:53 */
/* http://harviacode.com */