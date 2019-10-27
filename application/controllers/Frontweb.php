<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontweb extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        //     $this->load->model('Articles_model');
        //     $this->load->library('form_validation');        
        // $this->load->library('datatables');


        //    if ($this->session->userdata('email')=="" )
        //   { redirect('auth'); }

    }
    public function index()
    {
        $data = array(

            'content'     => 'frontContent',
            'email'     =>  'novalsmith69@gmail.com',
            // 'breadcrumb' => $breadcrumb,
            //  'get_allKategori' => $this->Articles_model->get_allKategori(),
            'judul'      => 'Home HadiTerpal',

            'judul_sub' => 'Artikel',
            'judulBrand' => 'Silat Sampah',
            'judul_page' => 'Artikel'

        );

        $this->load->view('frontTemplate', $data);
    }
}
