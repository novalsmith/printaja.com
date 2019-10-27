<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Products extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Products_model');
    $this->load->model('Articles_model');
    $this->load->library('form_validation');
    $this->load->library('datatables');
    if ($this->session->userdata('email') == "") {
      redirect('auth');
    }
  }


  public function index()
  {

    // $breadcrumb = array(
    //  "Dashboard" => "dashboard",
    //  "Artikel" => "" 
    // );
    $data = array(

      'content'     => 'products/products_list',
      'email'     =>  'novalsmith69@gmail.com',
      // 'breadcrumb' => $breadcrumb,
      //    'get_allKategori' => $this->Articles_model->get_allKategori(),
      'judul'      => 'Produk',

      'judul_sub' => 'Artikel',
      'judulBrand' => 'Silat Sampah',
      'judul_page' => 'Artikel'

    );

    $this->load->view('template', $data);
  }


  public function json()
  {
    header('Content-Type: application/json');
    echo $this->Products_model->json();
  }


  public function read($id)
  {
    $row = $this->Products_model->get_by_id($id);
    if ($row) {
      $data = array(
        'id' => $row->id,
        'name' => $row->name,
        'idkategori' => $row->idkategori,
        'description' => $row->description,
        'image' => $row->image,
        'slideshow' => $row->slideshow,
        'create_date' => $row->create_date,
        'modif_date' => $row->modif_date,
      );
      $this->load->view('products/products_read', $data);
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('products'));
    }
  }

  public function create()
  {
    $data = array(
      'button' => 'Create',
      'action' => site_url('products/create_action'),
      'id' => set_value('id'),
      'name' => set_value('name'),
      'idkategori' => set_value('idkategori'),
      'description' => set_value('description'),
      'image' => set_value('image'),
      'slideshow' => set_value('slideshow'),
      'create_date' => set_value('create_date'),
      'modif_date' => set_value('modif_date'),
    );
    $this->load->view('products/products_form', $data);
  }


  public function create_action()
  {

    $judul = $this->input->post('judulproduk');
    $slide =  $this->input->post('slideshow');




    $simpan = array(
      'name' => $judul,

      'idkategori' => $this->input->post('idkategoriproduk'),

      'create_date' => date('Y-m-d H:i:s')

      // 'modifdate' => date('y m d H:i:s')
    );



    // unlink('./assets/img/thumb/'. $gbr['file_name']);

    $this->Products_model->insert($simpan); //kirim value ke model m_upload
    echo json_encode(array(
      'judul' => $judul,
      'pesan' => "Berhasil Tersimpan",
      'status' => TRUE
    ));
  }

  public function Editget_by_id($id)
  {


    $row = $this->Articles_model->Editget_by_id($id);
    if ($row) {

      $data = array(
        'status' => true,
        'data'  => $row
      );

      echo json_encode($data);
    } else {
      $dataerror = array(
        'status' => false,
        'data'  => $row
      );
      echo json_encode($dataerror);
    }
  }

  public function update($id)
  {

    $row = $this->Products_model->get_by_id($id);
    if ($row) {

      $data = array(
        'status' => true,
        'data'  => $row
      );

      echo json_encode($data);
    } else {
      $dataerror = array(
        'status' => false,
        'data'  => $row
      );
      echo json_encode($dataerror);
    }
  }

  public function update_action()
  {

    $idarticles = $this->input->post('idproduk');
    $judul = $this->input->post('judulproduk');




    $simpan = array(
      'name' => $judul,

      'idkategori' => $this->input->post('idkategoriproduk'),

      'modif_date' => date('y m d H:i:s')
    );


    $validasi =  $this->Products_model->update($idarticles, $simpan);
    if ($validasi) {

      echo json_encode(
        array(
          'judul' => $judul,
          'pesan' => "Berhasil Tersimpan",
          'status' => TRUE
        )
      );
    } else {
      echo json_encode(
        array(
          'judul' => $judul,
          'pesan' => "Gagal Tersimpan",
          'status' => FALSE
        )
      );
    }
  }


  private function _uploadImage()
  {
    $config['upload_path']          = './assets/img/produk';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['file_name']            = 'haditerpal_' . date('dMy H i s');
    $config['overwrite']            = true;
    // $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('image') == "") {
      return null;
    } else {
      return $this->upload->data("file_name");
    }
  }


  private function _uploadImageSlideShow()
  {
    $config['upload_path']          = './assets/img/produk';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['file_name']            = 'haditerpal_' . date('dMy H i s');
    $config['overwrite']            = true;
    // $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1920;
    // $config['max_height']           = 720;

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!empty($_FILES['filefoto']['name'])) {

      if ($this->upload->do_upload('filefoto')) {
        $gbr = $this->upload->data();
        //Compress Image
        $config['image_library'] = 'gd2';
        $config['source_image'] = './assets/images/' . $gbr['file_name'];
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['quality'] = '50%';
        $config['width'] = 600;
        $config['height'] = 400;
        $config['new_image'] = './assets/images/' . $gbr['file_name'];
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

        $gambar = $gbr['file_name'];
        $judul = $this->input->post('xjudul');
        $this->m_upload->simpan_upload($judul, $gambar);
        echo "Image berhasil diupload";
      }
    } else {
      echo "Image yang diupload kosong";
    }

    if ($this->upload->do_upload('image') == "") {
      return null;
    } else if (!$this->upload->do_upload('image')) {
      return  $this->image_lib->display_errors();
    } else {
      return $this->upload->data("file_name");
    }
  }


  public function delete($id)
  {


    $row = $this->Products_model->get_by_id($id);

    if ($row) {

      $this->db->delete('products', array('id' => $row->id));

      $data = array(
        'status' => true,
        'data'   => $row
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
    $this->form_validation->set_rules('name', 'name', 'trim|required');
    $this->form_validation->set_rules('idkategori', 'idkategori', 'trim|required');
    $this->form_validation->set_rules('description', 'description', 'trim|required');
    $this->form_validation->set_rules('image', 'image', 'trim|required');
    $this->form_validation->set_rules('slideshow', 'slideshow', 'trim|required');
    $this->form_validation->set_rules('create_date', 'create date', 'trim|required');
    $this->form_validation->set_rules('modif_date', 'modif date', 'trim|required');

    $this->form_validation->set_rules('id', 'id', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }

  public function excel()
  {
    $this->load->helper('exportexcel');
    $namaFile = "products.xls";
    $judul = "products";
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
    xlsWriteLabel($tablehead, $kolomhead++, "Idkategori");
    xlsWriteLabel($tablehead, $kolomhead++, "Description");
    xlsWriteLabel($tablehead, $kolomhead++, "Image");
    xlsWriteLabel($tablehead, $kolomhead++, "Slideshow");
    xlsWriteLabel($tablehead, $kolomhead++, "Create Date");
    xlsWriteLabel($tablehead, $kolomhead++, "Modif Date");

    foreach ($this->Products_model->get_all() as $data) {
      $kolombody = 0;

      //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
      xlsWriteNumber($tablebody, $kolombody++, $nourut);
      xlsWriteLabel($tablebody, $kolombody++, $data->name);
      xlsWriteNumber($tablebody, $kolombody++, $data->idkategori);
      xlsWriteLabel($tablebody, $kolombody++, $data->description);
      xlsWriteLabel($tablebody, $kolombody++, $data->image);
      xlsWriteNumber($tablebody, $kolombody++, $data->slideshow);
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
    header("Content-Disposition: attachment;Filename=products.doc");

    $data = array(
      'products_data' => $this->Products_model->get_all(),
      'start' => 0
    );

    $this->load->view('products/products_doc', $data);
  }
}

/* End of file Products.php */
/* Location: ./application/controllers/Products.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-11 11:09:54 */
/* http://harviacode.com */
