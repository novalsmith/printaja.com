<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Kategori extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Kategori_model');
		$this->load->library('form_validation');
		$this->load->library('datatables');
		if ($this->session->userdata('email') == "") {
			redirect('auth');
		}
	}

	public function index()
	{
		// $breadcrumb = array(
		// 	"Home" => "/welcome",
		// 	"Agenda" => ""
		// );
		$data = array(

			'content'   	=> 'kategori/kategori_list',
			'email'     	=>  'novalsmith69@gmail.com',
			// 'breadcrumb' 	=> $breadcrumb,

			'judul'      	=> 'Kategori',
			'judul_sub'     => 'Daftar Kategori',
			'judulweb' 		=> 'Silat Sampah',
			'judul_page' 	=> 'Kategori'

		);

		$this->load->view('template', $data);
	}

	public function json()
	{
		header('Content-Type: application/json');
		echo $this->Kategori_model->json();
	}

	public function read($id)
	{
		$row = $this->Kategori_model->get_by_id($id);
		if ($row) {
			$data = array(
				'idkategori' => $row->idkategori,
				'nama_kategori' => $row->nama_kategori,
				'status' => $row->status,
				'create_date' => $row->create_date,
				'modif_date' => $row->modif_date,
			);
			$this->load->view('kategori/kategori_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('kategori'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('kategori/create_action'),
			'idkategori' => set_value('idkategori'),
			'nama_kategori' => set_value('nama_kategori'),
			'status' => set_value('status'),
			'create_date' => set_value('create_date'),
			'modif_date' => set_value('modif_date'),
		);
		$this->load->view('kategori/kategori_form', $data);
	}



	public function kategoricheck($name)
	{
		$result = '';

		$datacek = $this->Kategori_model->alreadykategori($name);

		if ($datacek->num_rows() > 0) {

			$result  = array(
				'status'           => TRUE,
				'namakategori'     => $name,

				'pesan'            => $name . '<br/> Sudah Ada di Database'
			);
		} else {

			$result  = array(
				'status'           => FALSE,
				'namakategori'     => $name,
				'pesan'            => $name . ' Tersedia'
			);
		}

		echo json_encode($result);
	}

	public function kategoricreateaction()
	{

		$kategori = $this->input->post('nama_kategori', TRUE);

		$data = array(
			'nama_kategori' => $kategori,
			'status' => $this->input->post('status', TRUE),
			'hargaBW' => $this->input->post('bw_kategori', true),
			'hargaColor' => $this->input->post('color_kategori', true),
			'hargajilid' => $this->input->post('jilid_kategori', true),
			'create_date' => date('Y-m-d H:i:s')

		);

		$this->Kategori_model->insert($data);
		echo json_encode(array(
			"status"            => TRUE,
			"nama_kategori"       =>    $kategori

		));
	}

	public function update($id)
	{
		$row = $this->Kategori_model->get_by_id($id);

		if ($row) {
			$data = array(

				'id_kategori' => $row->idkategori,
				'nama_kategori' =>  $row->nama_kategori,
				'bw_kategori' =>  $row->hargaBW,
				'color_kategori' =>  $row->hargaColor,
				'jilid_kategori' =>  $row->hargajilid,
				'status' =>  $row->status,

			);

			echo json_encode($data);
		}
	}



	public function alreadykategoricheckupdate($kategori, $statusaktif)
	{
		$result = '';
		$status = "";
		$datacek = $this->Kategori_model->alreadykategoriupdate($kategori, $statusaktif);
		$datacek2 = $this->Kategori_model->alreadykategoriupdate($kategori, $statusaktif)->row();

		if ($statusaktif == 1) {
			$status = "Aktif";
		} else {
			$status = "Tidak";
		}

		if ($datacek->num_rows() > 0) {

			$result  = array(
				'status'           => TRUE,
				'namakategori'     => $kategori,
				// 'id_kategori'		=> $datacek2->idkategori,
				'pesan'            => $kategori . ' dengan Status ' . $status . ' <br/> Sudah Ada di Database'
			);
		} else {

			$result  = array(
				'status'          => FALSE,
				'namakategori'     => $kategori,
				// 'id_kategori'	=> $datacek2->idkategori,
				'pesan'           > $kategori . ' Berhasil Diubah'
			);
		}

		echo json_encode($result);
	}



	public function update_action($id)
	{
		// $id = $this->input->post('id');
		$data = array(
			'nama_kategori' 		=> $this->input->post('nama_kategori', TRUE),
			'status' 				=> $this->input->post('status', TRUE),
			'hargaBW' => $this->input->post('bw_kategori', true),
			'hargaColor' => $this->input->post('color_kategori', true),
			'hargajilid' => $this->input->post('jilid_kategori', true),
			'modif_date' 			=> date('Y-m-d H:i:s')
		);

		$this->Kategori_model->update($id, $data);



		echo json_encode(array(
			"status"            => TRUE,
			"namakategori"       =>  $this->input->post('nama_kategori', TRUE)
		));
	}

	public function delete($id)
	{

		$row = $this->Kategori_model->get_by_id($id);

		if ($row) {
			$this->Kategori_model->delete($id);
			$data =  array(
				"status"            => TRUE,
				"data"  => $row
			);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			$data =  array(
				"status"            => FALSE
			);
		}

		echo json_encode($data);
	}

	public function selectKategori()
	{
		$data = $this->Kategori_model->get_allKategori();

		echo json_encode($data);
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_kategori', 'nama kategori', 'trim|required');
		$this->form_validation->set_rules('status', 'status', 'trim|required');
		$this->form_validation->set_rules('create_date', 'create date', 'trim|required');
		$this->form_validation->set_rules('modif_date', 'modif date', 'trim|required');

		$this->form_validation->set_rules('idkategori', 'idkategori', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function excel()
	{
		$this->load->helper('exportexcel');
		$namaFile = "kategori.xls";
		$judul = "kategori";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Kategori");
		xlsWriteLabel($tablehead, $kolomhead++, "Status");
		xlsWriteLabel($tablehead, $kolomhead++, "Create Date");
		xlsWriteLabel($tablehead, $kolomhead++, "Modif Date");

		foreach ($this->Kategori_model->get_all() as $data) {
			$kolombody = 0;

			//ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
			xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->nama_kategori);
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
		header("Content-Disposition: attachment;Filename=kategori.doc");

		$data = array(
			'kategori_data' => $this->Kategori_model->get_all(),
			'start' => 0
		);

		$this->load->view('kategori/kat egori_   doc', $data);
	}
}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-05-11 11:09:54 */
/* http://harviacode.com */
